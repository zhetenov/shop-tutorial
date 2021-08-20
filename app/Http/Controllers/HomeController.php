<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('title')->get()->toArray();

        return view('layouts.main', compact('products'));
    }
}
