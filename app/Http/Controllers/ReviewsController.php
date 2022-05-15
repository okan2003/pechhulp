<?php

namespace App\Http\Controllers;

use App\Models\Aantal;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
//        $reviews = Review::join('users', 'users.id', '=', 'reviews.user_id')
//        ->get(['reviews.user_id', 'reviews.score', 'reviews.omschrijving', 'reviews.status', 'users.name']);

        $reviews = Review::with('user')->get();

        return view('reviews', [
            'reviews' => $reviews,
        ]);
    }

    public function showReviews()
    {
        $reviews = Review::join('users', 'users.id', '=', 'reviews.user_id')
        ->get(['reviews.id','reviews.user_id','reviews.score', 'reviews.omschrijving','reviews.status', 'users.name']);

//          $reviews = Review::with('user')->get();

        return view('review.review-check', [
            'reviews' => $reviews,
        ]);
    }

    public function changeReviewStatus(Request $request)
    {
        $reviews = Review::find($request->id);
        $reviews->status = $request->status;
        $reviews->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function totalReviews()
    {
        $avgReview = Review::count();
    }
}



