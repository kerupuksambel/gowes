<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Order;
use App\Models\OrderComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function index()
    {
        $cart = json_decode(Cookie::get('cart'), TRUE);
        $components = Component::whereIn('id', array_keys($cart))
        ->get();
        foreach ($components as $c) {
            $c->jumlah = $cart[$c->id];
        }
        
        return view('user.cart', array('cart' => $components));
    }

    public function confirmation()
    {
        $cart = json_decode(Cookie::get('cart'), TRUE);
        $components = Component::whereIn('id', array_keys($cart))
        ->get();
        foreach ($components as $c) {
            $c->jumlah = $cart[$c->id];
        }
        
        return view('user.confirm', array('cart' => $components));
    }

    public function checkout(Request $request)
    {
        if($request->dirakit){
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'biaya_rakit' => $request->biaya_servis,
                'status' => 'dipesan', 
                'durasi' => 5,
                'is_dirakit' => TRUE,
            ]);
        }else{
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'biaya_rakit' => NULL,
                'status' => 'dipesan', 
                'durasi' => 2,
                'is_dirakit' => FALSE,
            ]);
        }


        $cart = json_decode(Cookie::get('cart'), TRUE);
        $components = Component::whereIn('id', array_keys($cart))
        ->get();

        // dd($order->id);

        $inserted = [];
        foreach ($components as $c) {
            $inserted[] = [
                'order_id' => $order->id,
                'jumlah' => $cart[$c->id],
                'harga_satuan' => $c->harga,
                'component_id' => $c->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        OrderComponent::insert($inserted);

        return redirect()->route('cart.history')->with('msg', 'Order berhasil dikirim.');
    }

    public function history()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        foreach ($orders as $o) {
            $sum = 0;
            foreach ($o->components as $c) {
                $sum += $c->jumlah * $c->harga_satuan;
            } 
            $o->subtotal = $sum;
        }

        return view('user.history', compact('orders'));
    }

    public function historyDetail($id)
    {
        $order = Order::where('user_id', Auth::user()->id)
        ->find($id);
        
        $order->subtotal = 0;
        foreach ($order->components as $c) {
            $order->subtotal += $c->jumlah * $c->harga_satuan;
        } 

        return view('user.history_detail', compact('orders'));
    }
}
