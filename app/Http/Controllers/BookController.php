<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Book::class, 'book');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */ 
    public function index(Request $request)
    {
        // $filters = $request->only([
        //     'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        // ]);

        $books = Book::mostRecent()
            // ->filter($filters)
            ->paginate(9)
            ->withQueryString();

        return inertia('Book/Index', [
            // 'filters' => $filters,
            'books' => $books,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  Book  $book
     * @return \Inertia\Response
     */
    public function show(Book $book)
    {
        // $book->load(['images']);
        // $offer = !Auth::user() ?
        //     null : $book->offers()->byMe()->first();

        return inertia('Listing/Show', [
            'book' => $book,
            // 'offerMade' => $offer
        ]);
    }
}
