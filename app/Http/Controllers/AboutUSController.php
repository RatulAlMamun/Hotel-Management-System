<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUSController extends Controller
{
    public function about(){
    	return view('about');
    }
}
