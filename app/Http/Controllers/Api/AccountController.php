<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function store(Request $request)
    {
        
        $account = Account::create($request->validate([
            'category_id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'description' => 'string|nullable'
        ]));

        return response()->json($account, 200);
    }
}
