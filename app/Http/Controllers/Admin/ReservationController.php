<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use Carbon\Carbon;
use App\Models\Table;
use App\Rules\DateRule;
use App\Rules\TimeRule;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::where("status", TableStatus::Available)->get();
        return view('admin.reservation.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id); //table info

        // check capacity
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Overload Capacity');
        }

        //check date
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'Table Already Booked');
            }
        }

        $validate = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "phone" => $request->phone,
            "res_date" => $request->res_date,
            "table_id" => $request->table_id,
            "guest_number" => $request->guest_number,
        ];

        Reservation::create($validate);
        return to_route('admin.reservation.index')->with('success', 'Add Reservation Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $tables = Table::where("status", TableStatus::Available)->get();
        return view('admin.reservation.edit', compact('reservation', 'tables'));
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
        $table = Table::findOrFail($request->table_id);

        // check capacity
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Overload Capacity');
        }


        //check date
        $request_date = Carbon::parse($request->res_date);
        $data = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach ($data as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'Table Already Booked');
            }
        }

        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email:dns",
            "phone" => "required",
            "res_date" => ['required', 'date', new DateRule, new TimeRule],
            "table_id" => "required",
            "guest_number" => "required|integer",
        ]);

        $reservation->update([
            "first_name" => $request->first_name,
            "last_name" =>  $request->last_name,
            "email" =>  $request->email,
            "phone" =>  $request->phone,
            "res_date" =>  $request->res_date,
            "table_id" =>  $request->table_id,
            "guest_number" => $request->guest_number,
        ]);

        return to_route('admin.reservation.index')->with('edit', 'Edit Reservation Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        Reservation::destroy($reservation->id);
        return to_route('admin.reservation.index')->with('delete', 'Delete Reservation Success');
    }
}