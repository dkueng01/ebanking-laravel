<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return Account::all();
    }

    public function getAccountByOwner(Request $request)
    {
        return Account::where('user_id', $request->user_id)->first();
    }

}
