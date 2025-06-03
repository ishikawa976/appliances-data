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
            'manual_pdf' => ''
        ]);

        
        if ($request->file('manual')) {
            $filename = $request->manual_pdf;
            $request->file('manual')->storeAs('manual', $filename, 'public');
        }

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
        }],)->with('images')->find($id);
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
            'manufacture_year' => '',
            'maker_id' => '',
            'maker_url' => '',
            'purchase_date' => '',
            'shop_id' => '',
            'disposal' => 'required',
            'disposal_date' => '',
            'manual_pdf' => ''
        ]);
        
        if ($request->file('manual')) {
            $oldFilename = $appliance->manual_pdf;
            
            if ($oldFilename) {
                unlink(storage_path('app/public/manual/').$oldFilename);
            }
            $filename = $request->manual_pdf;
            $request->file('manual')->storeAs('manual', $filename, 'public');
        }

        $appliance->update($validated);

        return redirect()->route('appliance.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appliance $appliance)
    {
        //取扱説明書のファイルを削除
        $manualFile = $appliance->manual_pdf;
        if ($manualFile) {
            unlink(storage_path('app/public/manual/').$manualFile);
        }

        $appliance->delete();

        return redirect()->route('appliance.index');
    }
}
