<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function index()
    {
        $userReviews =
            Review::with("user", "book")->where('user_id',  auth()->id())->get();
        return view("reviews.index", compact("userReviews"));
    }


    public function create(Request $request, $book_id)
    {
        $review = new Review;



        $review->book_id = $book_id;
        $review->user_id = auth()->id();
        $review->content = $request->review_content;

        $review->save();
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        $review->content = $request->review_modified;
        $review->update();
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {

        $review = Review::find($id);
        $review->delete();
        return redirect()->back();
    }
}
