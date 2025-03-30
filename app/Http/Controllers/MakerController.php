<?php

namespace App\Http\Controllers;

use App\Models\Maker;
use Illuminate\Http\Request;

class MakerController extends Controller
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
            'name' => 'required|max:50',
        ]);

        $maker = Maker::create([
            'name' => $request->name,
        ]);


        return redirect()->route('config.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maker $maker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maker $maker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maker $maker)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);

        $maker->update($validated);

        return redirect()->route('config.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maker $maker)
    {
        $maker->delete();

       return redirect()->route('config.index');
    }
}
