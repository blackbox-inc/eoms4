<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class accountController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.accounts', compact('users'));
    }
}
