<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Offer;
use App\Models\Reservation;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::paginate(9);
        return view('dashboard.offers.index', ["offers" => $offers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'startTime' => 'required|date_format:Y-m-d\TH:i',
            'endTime' => 'required|date_format:Y-m-d\TH:i|after:startTime',
            // 'offerPeriod' => 'required|integer|min:1',
        ]);

        // Handle image upload if provided
        $image = $request->file('image');
        $imageName = null;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/offers'), $imageName);
        }

        // Create the new offer
        $offer = new Offer([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'active' => $request->input('active') === 'true' ? true : false,
            'startTime' => $request->input('startTime'),
            'endTime' => $request->input('endTime'),
            'image' => $imageName,
            'updated_by' => Auth::user()->id,
        ]);

        $offer->save();

        return redirect()->route('offer.index')->with('success', 'Offer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        $reservations = $offer->reservations;
        // dd($reservations);
        return view('dashboard.offers.show', ["offer" => $offer, "reservations" => $reservations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view('dashboard.offers.edit', ["offer" => $offer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active' => 'required|in:true,false',
            'offerPeriod' => 'required|integer|min:1',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/offers'), $imageName);

            // Optional: Delete the old image file if it exists
            $oldImage = $offer->image;
            if ($oldImage && file_exists(public_path('images/offers/' . $oldImage))) {
                unlink(public_path('images/offers/' . $oldImage));
            }

            $offer->image = $imageName;
        }

        $offer->title = $request->input('title');
        $offer->description = $request->input('description');
        $offer->active = $request->input('active') === 'true' ? true : false;
        $offer->offerPeriod = $request->input('offerPeriod');
        $offer->updated_by = Auth::user()->id;

        $offer->save();

        return redirect()->route('offer.index')->with('success', 'Offer updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offer.index')->with('success', "offer deleted successfully");
    }
}
