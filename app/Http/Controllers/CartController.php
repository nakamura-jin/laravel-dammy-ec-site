<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Genre;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function index() {
        $carts = Cart::with('menus')->get();

        if(!$carts) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['carts' => $carts], 200);
    }

    public function store(CartRequest $request)
    {
        $input = $request->validated();

        $cart  = Cart::create([
            'user_id' => $input['user_id'],
            'quantity' => $input['quantity'],
            'menu_id' => $input['menu_id'],
        ]);

        if(!$cart) {
            return response()->json(['message' => 'Could not create cart'], 404);
        }

        return response()->json(['cart' => $cart], 200);
    }

    public function show(Request $request)
    {
        $user_cart = Cart::where('user_id', $request->id)->get();

        foreach($user_cart as $cart) {
            $menu = Menu::where('id', $cart->menu_id)->get();
            $genre = Genre::where('id', $menu[0]->genre_id)->get();
            $menu[0]->genre = $genre[0]->name;
            $cart->menu = $menu;
        }
        return response()->json(['cart' => $user_cart], 200);
    }

    public function edit(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'menu_id' => $request->menu_id,
            'quantity' => $request->quantity,
        ];

        $cart = Cart::where('id', $request->id)->update($data);

        if(!$cart) {
            return response()->json(['messege' => 'Could not update cart'], 404);
        }

        return response()->json(['message' => 'Update successfully'], 200);

    }

    public function destroy(Request $request)
    {
        $cart = Cart::where('id', $request->id)->delete();

        if(!$cart) {
            return response()->json(['messege' => 'Could not delete cart'], 404);
        }

        return response()->json(['message' => 'Delete successfully'], 200);
    }
}
