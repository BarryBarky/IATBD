<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    public function index () {
        $advertisements = Advertisement::latest()->filter(request(['zoeken', 'sorteren_op', 'periode_start', 'periode_eind',]))->paginate(6);
        return view('dashboard.advertisements.index', [
            'advertisements' => $advertisements
        ]);
    }

    public function show (Advertisement $advertisement) {
        return view('dashboard.advertisements.show', [
            "ad" => $advertisement,
            "breadcrumbs" => [
                [
                    "link" => "/dashboard/advertenties",
                    "label" => "Advertenties"
                ],
                [
                    "label" => $advertisement->title
                ],
            ]
        ]);
    }

    public function create () {
        $user = Auth::user();
        $pets = $user->pets;
        return view('dashboard.advertisements.create', [
            "pets" => $pets,
            "breadcrumbs" => [
            [
                "link" => "/dashboard/advertenties",
                "label" => "Advertenties"
            ],
            [
                "label" => "Aanmaken"
            ],
        ]
        ]);
    }

    public function store (Request $request) {
        $formFields = $request->validate([
            'title' => ['required', 'min:2'],
            'starting_period' => ['required', 'min:2'],
            'ending_period' => ['required', 'min:2'],
            'price_in_euros' => ['required', 'min:2', 'numeric'],
        ]);

        // profile picture
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('advertisements', 'public');
        }

        // connect to user
        $formFields['user_id'] = Auth::id();

        $advertisement = Advertisement::create($formFields);

//        connect the pets to the advertisement
        if (count($request->pets) >= 1) {
            foreach ($request->pets as $pet_id) {
                $advertisement->pets()->attach($pet_id);
            }
        } else {
            return back()->withErrors(["pets" => "Select at least one pet"]);
        }

        return redirect('/dashboard/advertenties')->with('message', 'Advertentie Aangemaakt');
    }

    public function edit (Advertisement $advertisement) {
        if ($advertisement->user_id !== Auth::id()) {
            abort(403);
        }

        return view('dashboard.advertisements.edit', [
            "ad" => $advertisement,
            "breadcrumbs" => [
                [
                    "link" => "/dashboard/advertenties",
                    "label" => "Advertenties"
                ],
                [
                    "label" => "Bewerken"
                ],
            ]
        ]);
    }

    public function update (Request $request, Advertisement $advertisement) {
        if ($advertisement->user_id !== Auth::id()) {
            abort(403);
        }

        $formFields = $request->validate([
            'title' => ['required', 'min:2'],
            'starting_period' => ['required', 'min:2'],
            'ending_period' => ['required', 'min:2'],
            'price_in_euros' => ['required', 'min:2', 'numeric'],
        ]);

        // profile picture
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('advertisements', 'public');
        }

        $advertisement->update($formFields);

//        connect the pets to the advertisement
        if (count($request->pets) >= 1) {
            $advertisement->pets()->detach();
            foreach ($request->pets as $pet_id) {
                $advertisement->pets()->attach($pet_id);
            }
        } else {
            return back()->withErrors(["pets" => "Select at least one pet"]);
        }

        return redirect('/dashboard/advertenties/'. $advertisement->id)->with('message', 'Advertentie Bijgewerkt');
    }

    public function destroy(Advertisement $advertisement) {
        if ($advertisement->user_id !== Auth::id()) {
            abort(403);
        }
        $advertisement->pets()->detach();
        $advertisement->delete();

        return redirect('/dashboard/advertenties')->with('message', 'Advertentie Verwijderd');
    }

    public function request(Advertisement $advertisement) {
        if ($advertisement->user_id === Auth::id()) {
            abort(403);
        }
        $user = Auth::user();
        $advertisement->requests()->detach($user->pet_sitter_id);
        $advertisement->requests()->attach($user->pet_sitter_id);

        return redirect('/dashboard/advertenties/'. $advertisement->id)->with('message', 'Aanvraag gedaan op de advertentie');
    }

    public function acceptRequest(Request $request, Advertisement $advertisement) {
        if ($advertisement->user_id !== Auth::id()) {
            abort(403);
        }
        $petSitterId = $request->petSitter;
//        dd($petSitterId);
        $advertisement->requests()->updateExistingPivot($petSitterId, [
            'is_accepted' => true,
        ]);

        return redirect('/dashboard/advertenties/'. $advertisement->id)->with('message', 'Oppasser Geaccepteerd');
    }
}
