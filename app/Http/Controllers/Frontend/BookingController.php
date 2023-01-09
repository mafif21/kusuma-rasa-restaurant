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


      
    }
}