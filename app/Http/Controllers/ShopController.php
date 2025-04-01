<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $shops = Shop::all();
         return Inertia::render('Shop/index',['shops' => $shops]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::orderby('name', 'asc')->get();
        return Inertia::render('Shop/create', ['companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required',
            'shop_name' => 'required|max:50',
            'url' => '',
            'status' => 'required',
        ]);

        $shop = Shop::create([
            'company_id' => $request->company_id,
            'shop_name' => $request->shop_name,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        return redirect()->route('shop.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $shop = Shop::find($id);
        return Inertia::render('Shop/show',['shop' => $shop]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shop = Shop::find($id);
        $companies = Company::orderby('name', 'asc')->get();
        return Inertia::render('Shop/edit', [
            'shop' => $shop,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        $validated = $request->validate([
            'company_id' => 'required',
            'shop_name' => 'required|max:50',
            'url' => '',
            'status' => 'required',
        ]);

        $shop->update($validated);

        return redirect()->route('shop.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();

        return redirect()->route('shop.index');
    }
}
