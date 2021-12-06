<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\ComponentGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CatalogueController extends Controller
{
    public function index()
    {
        $group = ComponentGroup::all();

        return view('user.katalog', compact('group'));
    }

    public function add(Request $request, $id)
    {
        if($cart = Cookie::get('cart')){
            $cart = json_decode($cart, TRUE);
            if(in_array($id, array_keys($cart))){
                $cart[$id]++;
            }else{
                $cart[$id] = 1;
            }
        }else{
            $cart = [$id => 1];
        }

        return redirect()->route('cart.index')->cookie(
            'cart', json_encode($cart), 60*24*30
        );
    }
}
