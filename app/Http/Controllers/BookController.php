<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('home', compact('books'));
    }

    public function show(Request $request, $id)
    {

        // getting the book with its categories, reviews, and the user who posted the reviews

        $book = Book::with("categories", "reviews.user")->find($id);

        // Find other books with at least one of the same categories
        $categories = $book->categories()->pluck('id')->toArray();

        $similarBooks = Book::whereHas('categories', function ($query) use ($categories) {
            $query->whereIn('id', $categories);
        })->where('id', '!=', $book->id)->limit(6)->inRandomOrder()->get();

        // putting the reviews in a variable in order to pass it to the view
        $reviews = $book->reviews()->cursorPaginate(3);

        return view('books.show', compact('book', "similarBooks", "reviews"));
    }


    public function search(Request $request)
    {
        $search = $request->search;
        $books = Book::whereAny([
            'title',
            'description',
            "author"
        ], 'LIKE', '%' . $search . '%')->get();
        return view('books.search', compact('books'));
    }
}
