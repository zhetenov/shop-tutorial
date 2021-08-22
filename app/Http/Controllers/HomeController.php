<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->get('q');

        if(empty($searchQuery)) {
            $products = Product::orderBy('title')->get();
        }
        else {
            $products = DB::table('products')
                ->select(['products.id', 'products.title', 'products.price', 'products.description', 'products.image_url'])
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->orWhere('products.title', 'like', "%$searchQuery%")
                ->orWhere('categories.title', 'like', "%$searchQuery%")
                ->get();
        }

        return view('layouts.main', compact('products'));
    }

    public function productDetail(Product $product)
    {
        $comments = Comment::where('product_id', $product->id)->get();

        return view('layouts.detail', compact('product', 'comments'));
    }
}
