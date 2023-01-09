<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.table.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableStoreRequest $request)
    {
        $validate = [
            "name" => $request->name,
            "guest_number" => $request->guest_number,
            "status" => $request->status,
            "location" => $request->location,
        ];

        Table::create($validate);
        return to_route('admin.table.index')->with('success', 'Add Table Success');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view('admin.table.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        $request->validate([
            "name" => "required",
            "guest_number" => "required|integer",
            "status" => "required",
            "location" => "required"
        ]);

        $table->update([
            "name" => $request->name,
            "guest_number" => $request->guest_number,
            "status" => $request->status,
            "location" => $request->location,
        ]);

        return to_route('admin.table.index')->with('edit', 'Edit Table Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        Table::destroy($table->id);
        return to_route('admin.table.index')->with('delete', 'Delete Table Success');
    }
}