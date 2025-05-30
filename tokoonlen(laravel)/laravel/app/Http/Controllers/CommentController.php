<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        
        $validated = $request->validate([
            'content' => 'required|string'
        ]);
        
        Comment::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'content' => $validated['content']
        ]);
        
        return redirect()->route('product.show', $product->id)
            ->with('success', 'Comment added successfully');
    }
    
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        
        if ($comment->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }
        
        $productId = $comment->product_id;
        $comment->delete();
        
        return redirect()->route('product.show', $productId)
            ->with('success', 'Comment deleted successfully');
    }
}