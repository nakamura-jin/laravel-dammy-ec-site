<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();

        if(!$menu) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['menus' => $menus], 200);
    }

    public function store(MenuRequest $request)
    {
        $input = $request->validated();

        $menu = Menu::create([
            'name' => $input['name'],
            'description' => $input['description'],
            'image' => $input['image'],
            'price' => $input['price'],
            'genre_id' => $input['genre_id'],
        ]);

        if(!$menu) {
            return response ()->json(['message' => 'Could not create menu'], 404);
        }

        return reponse()->json(['menu' => $menu], 201);
    }

    public function show(Request $request)
    {
        $menu = Menu::find($request->id);

        if(!$menu) {
            return response ()->json(['message' => 'Menu not found'], 404);
        }

        return repsonse()->json(['menu' => $menu], 200);
    }

    public function edit(Request $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'price' => $request->price,
            'genre_id' => $request->genre_id,
        ];

        $menu = Menu::where('id', $request->id)->update($data);

        if(!$menu) {
            return response()->json(['message' => 'Could not update menu'], 404);
        }

        return response()->json(['message' => 'Menu updated successfully'], 200);
    }

    public function delete(Request $request)
    {
        $menu = Menu::where('id', $request->id)->delete();

        if(!$menu) {
            return response ()->json(['message' => 'Could not delete menu'], 404);
        }

        return response()->json(['message' => 'Menu deleted successfully'], 200);
    }
}
