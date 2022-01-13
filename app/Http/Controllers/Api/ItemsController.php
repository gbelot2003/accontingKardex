<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemsController extends Controller
{
    public function store(Request $request)
    {
        $item = Item::create($request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]));

        return response()->json($item, 200);
    }
}
