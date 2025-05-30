<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ImageController extends Controller
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
        ]);
    
        if($request->file('image_file')){
            $imageName = $request->file('image_file')->getClientOriginalName();
            $request->file('image_file')->storeAs('image', $imageName, 'public');
        }

        $validated['image_title'] = $imageName;
        $image = Image::create($validated);

        return redirect()->route('appliance.show',  $request->appliance_id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $image = Image::with('appliance')->find($id);
        return Inertia::render('Image/show',['image' => $image]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
