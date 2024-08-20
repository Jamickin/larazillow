<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Listing;
use Illuminate\Http\Request;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }
    
    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];

        return inertia(
            'Realtor/Index',
            [
                'filters' => $filters,
                'listings' => Auth::user()
                    ->listings()
                    ->filter($filters)
                    ->withCount('images')
                    ->withCount('offers')
                    ->paginate(5)
                    ->withQueryString()
            ]
        );
    }
    
    public function show(Listing $listing)
    {
        return inertia(
            'Realtor/Show',
            ['listing' => $listing->load('offers')]
        );
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $this->authorize('create', Listing::class);

        return inertia('Realtor/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $this->validateListing($request);

        $request->user()->listings()->create($validated);

        return redirect()->route('listing.index')
            ->with('success', 'Listing was created!');
    }


        /**
     * Show the form for editing the specified resource.
     *
     * @param  Listing  $listing
     * @return \Inertia\Response
     */
    public function edit(Listing $listing)
    {
        return inertia('Realtor/Edit', [
            'listing' => $listing,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Listing  $listing
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Listing $listing)
    {
        $validated = $this->validateListing($request);

        $listing->update($validated);

        return redirect()->route('listing.index')
            ->with('success', 'Listing was updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Listing  $listing
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->back()->with('success', 'Listing was deleted!');
    }

    public function restore(Listing $listing)
    {
        $listing->restore();

        return redirect()->back()->with('success', 'Listing was restored!');
    }

       /**
     * Validate the listing request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function validateListing(Request $request)
    {
        return $request->validate([
            'beds' => 'required|integer|min:0|max:20',
            'baths' => 'required|integer|min:0|max:20',
            'area' => 'required|integer|min:15|max:1500',
            'city' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'street' => 'required|string|max:255',
            'street_nr' => 'required|integer|min:1|max:1000',
            'price' => 'required|integer|min:1|max:20000000',
        ]);
    }
}
