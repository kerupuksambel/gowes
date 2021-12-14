<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        foreach ($orders as $o) {
            $sum = 0;
            foreach ($o->components as $c) {
                $sum += $c->jumlah * $c->harga_satuan;
            }
            $o->subtotal = $sum;
        }

        return view('admin.order', compact('orders'));
    }
}
