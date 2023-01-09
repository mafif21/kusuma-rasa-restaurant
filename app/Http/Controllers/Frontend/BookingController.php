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
            $reservation->fill($validateData);
            $request->session()->put('reservation', $reservation);
        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validateData);
            $request->session()->put('reservation', $reservation);
        }

        return to_route('booking.step.two');
    }
    
    public function stepTwo(Request $request)
    {
        // session data from step 1
        $reservation = $request->session()->get('reservation');

        // check available date
        $res_table = Reservation::orderBy('res_date')->get()->filter(function ($value) use ($reservation) {
            return $value->res_date->format('Y-m-d') == $reservation->res_date->format('Y-m-d');
        })->pluck('table_id');

        // filtering table
        $tables = Table::where('status', TableStatus::Available)
            ->where('guest_number', '>=', $reservation->guest_number)
            ->whereNotIn('id', $res_table)->get();


        return view('booking.step-two', compact('tables'));
    }
    public function storeStepTwo(Request $request)
    {
        $validateData = $request->validate([
            "table_id" => ['required'],
        ]);


        $reservation = $request->session()->get('reservation');
        $reservation->fill($validateData);
        $reservation->save();
        $request->session()->forget('reservation');

        return to_route('home');
    }
}