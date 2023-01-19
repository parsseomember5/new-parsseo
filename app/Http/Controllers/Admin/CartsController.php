<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Darryldecode\Cart\CartCollection;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function has($key)
    {
        return Cart::find($key);
    }

    public static function get($key)
    {
        return self::has($key) ? new CartCollection(Cart::find($key)->cart_data) : [];
    }

    public function put($key, $value)
    {
        if($row = Cart::find($key))
        {
            // update
            $row->cart_data = $value;
            $row->save();
        } else {
            Cart::create([
                'id' => $key,
                'cart_data' => $value
            ]);
        }
    }
}
