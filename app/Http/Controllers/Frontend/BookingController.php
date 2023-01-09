<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Table;
use App\Rules\DateRule;
use App\Rules\TimeRule;
use App\Enums\TableStatus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function stepOne(Request $request)
    {
        // data if user go previous
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();

        return view('booking.step-one', compact('reservation', 'min_date', 'max_date'));
    }
    public function storeStepOne(Request $request)
    {
        $validateData = $request->validate([
            "first_name" => ['required'],
            "last_name" => ['required'],
            "email" => ['required', 'email:dns'],
            "phone" => ['required'],
            "res_date" => ['required', 'date', new DateRule, new TimeRule],
            "guest_number" => ['required', 'integer'],
        ]);

        if (empty($request->session()->get('reservation'))) {
            $reservation = new Reservation();
         
        } else {
            $reservation = $request->session()->get('reservation');
           
        }

        return to_route('booking.step.two');
    }
}