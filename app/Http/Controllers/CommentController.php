<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request, $product_id, $user_id)
    {
        $comment = Comment::create([
            'product_id'    => $product_id,
            'user_id'       => $user_id,
            'text'          => $request->get('comment')
        ]);
        $comment->save();

        return redirect()->back();
    }
}
