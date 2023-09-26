<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OfferReservationsExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Reservation::query();

        if ($this->request->has('report_search')) {
            $query->where('customerName', 'like', '%' . $this->request->get('report_search') . '%');  // Adjust this field as needed
        }
        if ($this->request->has('from_date')) {
            $query->whereDate('created_at', '>=', $this->request->get('from_date'));
        }
        if ($this->request->has('to_date')) {
            $query->whereDate('created_at', '<=', $this->request->get('to_date'));
        }
        $isOfferValue =1;
        if ($isOfferValue !== null) {
            $query->where('isOffer', $isOfferValue);
        }
        // Default isOffer value
    

        return $query->get();
    }

    public function headings(): array
    {
        return  ['customerName', 'phone', 'email', 'branch_id', 'survey', 'isOffer', 'offer_id'];
    }
}
