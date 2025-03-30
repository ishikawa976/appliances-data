<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category; 
use App\Models\Maker; 
use App\Models\Company; 

class ConfigController extends Controller
{
    public function index()
    {
        $categories = Category::orderby('name', 'asc')->get();
        $makers = Maker::orderby('name', 'asc')->get();
        $companies = Company::orderby('name', 'asc')->get();
         return Inertia::render('Config/index',[
            'categories'=>$categories,
            'makers'=>$makers,
            'companies'=>$companies
        ]);
    }
}
