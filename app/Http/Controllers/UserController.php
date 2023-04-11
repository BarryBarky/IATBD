<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\PetSitter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function show () {
        return view('users.show', [
            "user" => Auth::user()
        ]);
    }

    public function showRequestedUser (Advertisement $advertisement, User $user) {
        $isAccepted = false;
        foreach ($advertisement->requests as $request) {
            if ($request->id === $user->pet_sitter_id) {
                if ($request->pivot->is_accepted) {
                    $isAccepted = true;
                }
            }
        }

        return view('users.show', [
            "user" => $user,
            "isAccepted" => $isAccepted,
            "breadcrumbs" => [
                [
                    "link" => "/dashboard/advertenties/" . $advertisement->id,
                    "label" => "Terug naar advertentie",
                ],
            ]
        ]);
    }

    public function showOthers (User $user) {
        if (!Auth::user()->hasRoles(["administrator"])) {
            return abort(403);
        }
        return view('users.show', [
            "user" => $user,
        ]);
    }

    public function block (Request $request) {
        if ($request->users) {
            User::whereNotIn('id', $request->users)->update(["is_blocked" => false]);
            User::whereIn('id', $request->users)->update(["is_blocked" => true]);
        } else {
            User::query()->update(["is_blocked" => false]);
        }
        return back()->with('message', 'Opgeslagen');
    }

    public function edit() {
        return view('users.edit', [
           "user" => Auth::user(),
            "breadcrumbs" => [
                [
                    "link" => "/dashboard/mijn-profiel",
                    "label" => "Mijn profiel",
                ],
                [
                    "label" => "Bewerken"
                ],
            ]
        ]);
    }

    //    create new user
    public function store (Request $request) {
        $formFields = $request->validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'city' => ['required', 'min:2'],
            'age' => ['required', 'min:2', 'numeric'],
            'sex' => ['required', 'min:2'],
            'street' => ['required', 'min:2'],
            'house_number' => ['required', 'numeric'],
            'postal_code' => ['required', 'min:1', 'max:6'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // profile picture
        if ($request->hasFile('profile_pic')) {
            $formFields['profile_pic'] = $request->file('profile_pic')->store('profile_pics', 'public');
        }

//        create user
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/dashboard')->with('message', 'Gebruiker aangemaakt. Je bent ook gelijk ingelogd!');
    }

    //    authenticate User
    public function authenticate (Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            if (Auth::user()->is_blocked){
                return back()->withErrors(['credentials' => 'Je bent geblokkeerd'])->onlyInput('input');
            }
            $request->session()->regenerate();
            return redirect('/dashboard')->with('message', 'Je bent ingelogd');
        }

        return back()->withErrors(['credentials' => 'Invalid Credentials'])->onlyInput('input');
    }

    public function update(Request $request, User $user) {

        if (Auth::id() !== $user->id) {
            abort(403);
        }

//        validate
            $formFields = $request->validate([
                'first_name' => ['required', 'min:2'],
                'last_name' => ['required', 'min:2'],
                'phone' => ['numeric'],
                'city' => ['required', 'min:2'],
                'age' => ['required', 'min:2', 'numeric'],
                'sex' => ['required', 'min:2'],
                'street' => ['required', 'min:2'],
                'house_number' => ['required', 'numeric'],
                'postal_code' => ['required', 'min:1', 'max:6'],
                'email' => ['required', 'email']
            ]);

            // profile picture
            if ($request->hasFile('profile_pic')) {
                $formFields['profile_pic'] = $request->file('profile_pic')->store('profile_pics', 'public');
            }
//        update user
            $user->update($formFields);

            return redirect('/dashboard/mijn-profiel')->with('message', 'De gebruiker is aangepast');
    }

    // logout user
    public function logout (Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been Logged Out');
    }

    public function manage () {
        $users = User::whereIn('role_id', [2, 3])->get();
        $petSitters = PetSitter::all();
        return view('dashboard.management.index', [
            'users' => $users,
            'petSitters' => $petSitters,
        ]);
    }
}
