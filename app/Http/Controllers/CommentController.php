<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CommentController extends Controller
{
    public function addComment(CommentRequest $request, Product $product)
    {

         Comment::create([
            'user_id'       => Auth::id(),
            'product_id'    => $product->id,
            'text'          => $request->get('comment'),
        ]);

        return redirect()->back();
    }
}
