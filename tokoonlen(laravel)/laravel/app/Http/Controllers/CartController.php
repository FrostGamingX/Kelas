<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();
            
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        return view('cart.index', compact('cartItems', 'total'));
    }
    
    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        
        $userId = Auth::id();
        $productId = $validated['product_id'];
        $quantity = $validated['quantity'];
        
        $existingCart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
            
        if ($existingCart) {
            $existingCart->update([
                'quantity' => $existingCart->quantity + $quantity
            ]);
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }
        
        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }
    
    public function remove(Request $request)
    {
        $validated = $request->validate([
            'cart_id' => 'required|exists:carts,id'
        ]);
        
        $cart = Cart::findOrFail($validated['cart_id']);
        
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }
        
        $cart->delete();
        
        return redirect()->route('cart.index')->with('success', 'Product removed from cart');
    }
}