<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class rrController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }
}
