<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();
            
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        return view('checkout.index', compact('cartItems', 'total'));
    }
    
    public function process(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);
        
        // Simpan informasi pengiriman ke session
        session(['shipping_info' => $validated]);
        
        return redirect()->route('payment');
    }
    
    public function payment()
    {
        if (!session()->has('shipping_info')) {
            return redirect()->route('checkout');
        }
        
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();
            
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        return view('checkout.payment', compact('total'));
    }
    
    public function success()
    {
        // Hapus semua item di keranjang setelah pembayaran berhasil
        Cart::where('user_id', Auth::id())->delete();
        
        // Hapus informasi pengiriman dari session
        session()->forget('shipping_info');
        
        return view('checkout.success');
    }
}