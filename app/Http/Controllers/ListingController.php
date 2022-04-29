<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listings
    public function index() {
        // dd($request);
        return view('listings.index', [
            // 'listings' => Listing::all()
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(5)
        ]);
    }

    // Show individual listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show Create Listing Form
    public function create() {
        return view('listings.create');
    }

    // Store the listing data
    public function store(Request $request) {
        // validate data
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required|unique:listings,company',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required'
        ]);

       if( $request->hasFile('logo') ) {
           // saving the uploaded file in the DB and make it public to app/storage/public/logos
           $formFields['logo'] = $request->file('logo')->store('logos', 'public');
       }

       // add id to the User
       $formFields['user_id'] = auth()->id();

        // store in the Database
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // Show edit form
    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update the Listing
    public function update(Request $request, Listing $listing) {
        // validate data
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required'
        ]);
 
        if( $request->hasFile('logo') ) {
            // saving the uploaded file in the DB and make it public to app/storage/public/logos
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
    
        // store in the Database
        $listing->update($formFields);
    
        return back()->with('message', 'Listing updated successfully!');
    }

    // delete a Listing
    public function destroy(Listing $listing) {
        $listing->delete();
        
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }

    // Manage listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
