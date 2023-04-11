<?php

namespace App\Http\Controllers;

use App\Models\PetSitter;
use App\Models\PetSittersImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PetSitterController extends Controller
{
    public function create()
    {
        return view('dashboard.pet_sitter.create', [
            "breadcrumbs" => [
                [
                    "link" => "/dashboard/mijn-profiel",
                    "label" => "Mijn profiel",
                ],
                [
                    "label" => "Als oppasser aanmelden"
                ],
            ]
        ]);
    }

    public function store(Request $request)
    {
//        if its already there
        $user = Auth::user();
        if ($user->pet_sitter_id) {
            return redirect('/dashboard/mijn-profiel')->with('message', 'je hebt je al aangemeld als oppasser');
        }
//        validate description
        $formFields = $request->validate([
            'description' => ['required', 'min:2'],
        ]);

//        create care taker
        $petSitter = PetSitter::create([
            'description' => $formFields['description']
        ]);

//        save the images from the care taker
//        validate
        if (count($request->files) >= 1) {
            for ($i = 1; $i <= 3; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $formFields['image' . $i] = $request->file('image' . $i)->store('images', 'public');
                    PetSittersImage::create([
                        "url" => $formFields['image' . $i],
                        "number" => $i,
                        "pet_sitter_id" => $petSitter->id
                    ]);
                }
            }
        } else {
            return back()->withErrors(['images' => 'Not enough images selected'])->onlyInput('input');
        }

//        connect the care taker to the user
        $user->update(["pet_sitter_id" => $petSitter->id]);

//        update role
        if ($user->role_id === 3) {
            $user->update(["role_id" => 2]);
        }

        return redirect('/dashboard/mijn-profiel')->with('message', 'Oppasser aangemaakt');
    }

    public function edit()
    {
        return view('dashboard.pet_sitter.edit', [
            "petSitter" => Auth::user()->petSitter,
            "breadcrumbs" => [
                [
                    "link" => "/dashboard/mijn-profiel",
                    "label" => "Mijn profiel",
                ],
                [
                    "label" => "Oppasser bewerken"
                ],
            ]
        ]);
    }

    public function update(Request $request, PetSitter $petSitter)
    {
        $user = Auth::user();
        if ($user->petSitter->id !== $petSitter->id) {
            abort(403);
        }
//        validate description
        $formFields = $request->validate([
            'description' => ['required', 'min:2'],
        ]);

//        create care taker
        $petSitter->update([
            'description' => $formFields['description']
        ]);

//        save the images from the care taker
//        validate
        if (count($request->files) >= 1) {
            for ($i = 1; $i <= 3; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $formFields['image' . $i] = $request->file('image' . $i)->store('images', 'public');
                    $petSitter->images->where('number', $i)->first()->update([
                        "url" => $formFields['image' . $i],
                    ]);
                }
            }
        }

        return redirect('/dashboard/mijn-profiel')->with('message', 'Oppasser aangepast');
    }

    public function destroy(PetSitter $petSitter)
    {
        $user = Auth::user();
        if ($user->pet_sitter_id !== $petSitter->id) {
            abort(403);
        }
        $petSitter->delete();

//        update role
        $user->update(["role_id" => 3]);

        return redirect('/dashboard/mijn-profiel')->with('message', 'Als oppasser afgemeld');
    }

}
