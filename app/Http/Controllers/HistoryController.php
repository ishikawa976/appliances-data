<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return Inertia::render('History/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('History/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'detail' =>  'required|max:250',
        ]);

        $history = History::create([
            'title' => $request->title,
            'detail' => $request->detail,
        ]);


        return redirect()->route('history.create');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        return Inertia::render('history.show', compact('history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        return Inertia::render('History/edit', compact('history'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $history)
    {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'body' =>  'required|max:250'
        ]);

        $history->update($validated);

        return redirect()->route('history.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        $history->delete();

        return redirect()->route('history.index');
    }
}
