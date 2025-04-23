<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use App\Models\Appliance;
use Inertia\Inertia;


class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'appliance_id' => 'required',
            'record_date' => 'required',
            'title' => 'required',
            'note' => 'required',
        ]);

         $record = Record::create($validated);
         
        return redirect()->route('appliance.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $validated = $request->validate([
            'appliance_id' => 'required',
            'title' => 'required',
            'note' => 'required',
        ]);

          $record->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
         $record->delete();

        return redirect()->route('appliance.index');
    }
}
