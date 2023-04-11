<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function index() {
        $user = Auth::user();
        $pets = Pet::where('user_id', $user->id)->latest()->filter(request(['zoeken', 'geslacht', 'soort']))->paginate(6);
        return view('dashboard.pets.index', [
            "pets" => $pets
        ]);
    }

    public function create() {
        return view('dashboard.pets.create', [
            "breadcrumbs" => [
                [
                    "link" => "/dashboard/huisdieren",
                    "label" => "Eigen huisdieren"
                ],
                [
                    "label" => "Aanmaken"
                ],
            ]
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:2'],
            'age' => ['required', 'numeric'],
            'sex' => ['required', 'min:2'],
            'description' => ['required', 'min:2'],
            'pet_type_id' => ['required', 'min:1', 'max:6'],
        ]);


        // profile picture
        if ($request->hasFile('profile_pic')) {
            $formFields['profile_pic'] = $request->file('profile_pic')->store('pets/profile_pics', 'public');
        }

        // connect to user
        $formFields['user_id'] = Auth::id();

        Pet::create($formFields);

        return redirect('/dashboard/huisdieren')->with('message', 'Huisdier aangemaakt');
    }

    public function show(Pet $pet) {
        return view('dashboard.pets.show', [
            "pet" => $pet,
            "breadcrumbs" => [
                [
                    "link" => "/dashboard/huisdieren",
                    "label" => "Eigen huisdieren"
                ],
                [
                    "label" => "$pet->name"
                ],
            ]
        ]);
    }

    public function edit(Pet $pet) {
        return view('dashboard.pets.edit', [
            "pet" => $pet,
            "breadcrumbs" => [
                [
                    "link" => "/dashboard/huisdieren",
                    "label" => "Eigen huisdieren"
                ],
                [
                    "label" => "Bewerken"
                ],
            ]
        ]);
    }

    public function update(Request $request, Pet $pet) {
        $formFields = $request->validate([
            'name' => ['required', 'min:2'],
            'age' => ['required', 'min:2', 'numeric'],
            'sex' => ['required', 'min:2'],
            'description' => ['required', 'min:2'],
            'pet_type_id' => ['required', 'min:1', 'max:6'],
        ]);


        // profile picture
        if ($request->hasFile('profile_pic')) {
            $formFields['profile_pic'] = $request->file('profile_pic')->store('pets/profile_pics', 'public');
        }

        $pet->update($formFields);

        return redirect('/dashboard/huisdieren')->with('message', 'Huisdier ' . $pet->name . ' bewerkt');
    }

    public function destroy(Pet $pet) {
        $pet->delete();

        return redirect('/dashboard/huisdieren')->with('message', 'Huisdier ' . $pet->name . ' verwijderd');
    }

}
