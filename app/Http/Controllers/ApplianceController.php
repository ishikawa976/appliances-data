<?php

namespace App\Http\Controllers;

use App\Models\Appliance;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Maker;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplianceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appliances = Appliance::all();
        return Inertia::render('Appliance/index',['appliances' => $appliances]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderby('name', 'asc')->get();
        $makers = Maker::orderby('name', 'asc')->get();
        $shops = Shop::orderby('shop_name', 'asc')->get();
        
        return Inertia::render('Appliance/create',
        [
            'categories'=>$categories,
            'makers'=>$makers,
            'shops'=>$shops,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'item_number' => '',
            'serial_number' => '',
            'manufacture_year' => 'integer',
            'maker_id' => '',
            'maker_url' => '',
            'purchase_date' => '',
            'shop_id' => '',
            'disposal' => 'required',
            'disposal_date' => '',
        ]);

        
        
            //$filename = $request->file('manual_pdf')->getClientOriginalName();
            //$filename = $request->file('manual_pdf')->$request('item_number').'.pdf';
            //$request->file('manual_pdf')->storeAs('manual', $filename, 'public');
        

        $appliance = Appliance::create($validated);

        return redirect()->route('appliance.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $appliance = Appliance::with(['records' => function($query){
            $query->orderBy('record_date', 'desc');
        }])->find($id);
        //dd($appliance);
        return Inertia::render('Appliance/show',['appliance' => $appliance]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $appliance = Appliance::find($id);
        $categories = Category::orderby('name', 'asc')->get();
        $makers = Maker::orderby('name', 'asc')->get();
        $shops = Shop::orderby('shop_name', 'asc')->get();
        return Inertia::render('Appliance/edit', [
            'appliance'=>$appliance,
            'categories'=>$categories,
            'makers'=>$makers,
            'shops'=>$shops
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appliance $appliance)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'item_number' => '',
            'serial_number' => '',
            'maker_id' => '',
            'maker_url' => '',
            'purchase_date' => '',
            'shop_id' => '',
            'disposal' => 'required',
            'disposal_date' => ''
        ]);

        if($request->manual_pdf) {
            $filename = $request->file('manual_pdf')->getClientOriginalName();
            $request->file('manual_pdf')->storeAs('manual', $filename, 'public');
        }
        /*if ($manual = $request->file('manual_pdf')) {
            $validated['manual_pdf'] = $manual->store('manual', $filename, 'public');
        }*/
        dd($request->manual_pdf);
        $appliance->update($validated);

        return redirect()->route('appliance.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appliance $appliance)
    {
        $appliance->delete();

        return redirect()->route('appliance.index');
    }
}
