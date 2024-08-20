<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */ 
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        $listings = Listing::mostRecent()
            ->filter($filters)
            ->paginate(9)
            ->withQueryString();

        return inertia('Listing/Index', [
            'filters' => $filters,
            'listings' => $listings,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  Listing  $listing
     * @return \Inertia\Response
     */
    public function show(Listing $listing)
    {
        $listing->load(['images']);
        $offer = !Auth::user() ?
            null : $listing->offers()->byMe()->first();

        return inertia('Listing/Show', [
            'listing' => $listing,
            'offerMade' => $offer
        ]);
    }
}
