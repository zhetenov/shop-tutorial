<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Comment;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('title')->get()->toArray();

        return view('layouts.main', compact('products'));
    }

    public function productDetail(Product $product)
    {
        $comments = Comment::where('product_id', $product->id)
        ->get();
        return view('layouts.detail', compact('product', 'comments'));
    }
}
