<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view('home_user');
    }

    public function upload(){
        $indikator = Indikator::where('user_id', auth()->user()->id)->get();

        return view('form_user', ['indikator' => $indikator]);
    }
}
