<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Listing;

class RealtorListingController extends Controller
{
public function index(){
    // dd(Auth::user()->listings);

return inertia(
    'Realtor/Index',
    ['listings' => Auth::user()->listings]
);
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

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}
