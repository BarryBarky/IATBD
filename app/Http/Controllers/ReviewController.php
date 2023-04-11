<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, User $user) {
        $formFields = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'stars' => ['required', 'numeric'],
        ]);

        // connect to user
        $formFields['user_id'] = $user->id;

        // connect to owner
        $formFields['owner_id']= Auth::id();

        Review::create($formFields);

        return back()->with('message', 'Review Geplaatst');
    }

    public function destroy(User $user, Review $review) {
        $review->delete();

        return back()->with('message', 'Review Verwijderd');
    }
}
