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
        $data = $request->validate([
            'rating' => 'required',
            'content' => 'nullable|string|max:255|min:1',
        ]);

        $review = new Review;


        $review->rating = $request->rating;
        $content = $request->review_content;
        if ($content === null) {
            $content = "";
        }

        $review->user_id = auth()->id();
        $review->book_id = $book_id;
        $review->content = $content;

        $review->save();
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'rating' => 'required',
            'content' => 'nullable|string|max:255|min:1',
        ]);

        $review = Review::find($id);
        $review->rating = $request->rating;
        $content = $request->review_modified;
        if ($content === null) {
            $content = "";
        }

        $review->content = $content;

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
