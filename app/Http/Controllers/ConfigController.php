<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category; 

class ConfigController extends Controller
{
    public function index()
    {
        $categories = Category::orderby('name', 'asc')->get();
         return Inertia::render('Config/index',['categories'=>$categories]);
    }
}
