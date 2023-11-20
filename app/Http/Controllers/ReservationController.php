<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Exports\ReservationsExport;
use App\Exports\OfferReservationsExport;
use App\Mail\RservationConfirmationEmail;
use App\Models\Offer;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // dump($request->all());
        // Basic reservation query


        if ($request->input('action') == 'downloadReservations') {
            $messages = [
                'from_date.required' => 'تاريخ البداية مطلوب.',
                'from_date.date' => 'تاريخ البداية يجب أن يكون بتنسيق صالح للتاريخ.',
                'to_date.required' => 'تاريخ النهاية مطلوب.',
                'to_date.date' => 'تاريخ النهاية يجب أن يكون بتنسيق صالح للتاريخ.',
            ];

            $validatedData = $request->validate([
                'from_date' => 'required|date',
                'to_date' => 'required|date',
            ], $messages);


            return $this->downloadReservations($request);
        }
        if ($request->input('action') == 'downloadoffersReservations') {
            $messages = [
                'offer_from_date.required' => 'تاريخ البداية مطلوب.',
                'offer_from_date.date' => 'تاريخ البداية يجب أن يكون بتنسيق صالح للتاريخ.',
                'offer_to_date.required' => 'تاريخ النهاية مطلوب.',
                'offer_to_date.date' => 'تاريخ النهاية يجب أن يكون بتنسيق صالح للتاريخ.',
            ];

            $validatedData = $request->validate([
                'offer_from_date' => 'required|date',
                'offer_to_date' => 'required|date',
            ], $messages);

            return $this->downloadOfferReservations($request);
        }


        $reservationsQuery = Reservation::where('isOffer', 0);
        $offerReservationsQuery = Reservation::where('isOffer', 1);

        // Date filtering for reservations
        if ($request->has('from_date') && $request->input('from_date') != '') {
            $reservationsQuery->whereDate('created_at', '>=', $request->input('from_date'));
        }

        if ($request->has('to_date') && $request->input('to_date') != '') {
            $reservationsQuery->whereDate('created_at', '<=', $request->input('to_date'));
        }

        // Date filtering for offer reservations
        if ($request->has('offer_from_date') && $request->input('offer_from_date') != '') {
            $offerReservationsQuery->whereDate('created_at', '>=', $request->input('offer_from_date'));
        }

        if ($request->has('offer_to_date') && $request->input('offer_to_date') != '') {
            $offerReservationsQuery->whereDate('created_at', '<=', $request->input('offer_to_date'));
        }

        // Search functionality for reservations
        if ($request->has('table_search') && $request->input('table_search') != '') {
            $searchTerm = $request->input('table_search');
            $reservationsQuery->where(function ($subQuery) use ($searchTerm) {
                $subQuery->where('customerName', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('phone', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        // Search functionality for offer reservations
        if ($request->has('offer_table_search') && $request->input('offer_table_search') != '') {
            $offerSearchTerm = $request->input('offer_table_search');
            $offerReservationsQuery->where(function ($subQuery) use ($offerSearchTerm) {
                $subQuery->where('customerName', 'LIKE', '%' . $offerSearchTerm . '%')
                    ->orWhere('email', 'LIKE', '%' . $offerSearchTerm . '%')
                    ->orWhere('phone', 'LIKE', '%' . $offerSearchTerm . '%');
            });
        }

        $reservations = $reservationsQuery->paginate(20);
        $offerReservations = $offerReservationsQuery->paginate(20);

        return view('dashboard.reservations.index', compact('reservations', 'offerReservations'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reserve', ["doctors"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        // dd($request->all());
        $request->validate([
            'customerName' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|string|email|max:255',
            'branch_id' => 'required|integer|exists:branches,id',
            'offer_id' => 'nullable|integer|exists:offers,id',
            'survey' => 'nullable|in:internet,sms,WordOfMouth',  // validation for the new field
            'isOffer' => 'nullable|in:0,1',  // validation for the new field
        ]);



        // Check if reservation should be under an offer's start and end time
        if ($request->isOffer && $request->isOffer == '1') {
            $offer = Offer::find($request->offer_id);

            if (!$offer) {
                return redirect()->back()->withErrors(['offer_id' => 'Offer not found.']);
            }

            $now = now();

            if ($now->lt($offer->startTime) || $now->gt($offer->endTime)) {
                return redirect()->back()->withErrors(['offer_id' => 'The reservation is outside the offer\'s valid period.']);
            }
        }


        // Create a new reservation using the request data
        $reservation = new Reservation;
        $reservation->customerName = $request->customerName;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email?? 'empty';
        $reservation->servey = $request->servey;
        $reservation->branch_id = $request->branch_id;
        $reservation->offer_id = $request->offer_id;
        if ($request->isOffer) {
            $reservation->isOffer = boolval($request->isOffer);
        } else {
            $reservation->isOffer = false;
        }
        $reservation->save();
        
        Mail::to($reservation->email)->send(new RservationConfirmationEmail($reservation));

        // Redirect with a success message
        return redirect()->back()->with('success', 'Reservation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
    private function downloadReservations(Request $request)
    {
        return Excel::download(new ReservationsExport($request), 'reservations.xlsx');
    }

    public function downloadOfferReservations(Request $request)
    {
        return Excel::download(new OfferReservationsExport($request), 'offer_reservations.xlsx');
    }
}
