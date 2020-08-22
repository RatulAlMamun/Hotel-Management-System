<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Rooms;
class IndexHomeController extends Controller
{
    public function index()
    {
        //Session::forget('token');
    	$rooms = Rooms::orderBy('id', 'DESC')->paginate(6);
   
    	return view('index', ['rooms' => $rooms]);
    }
}
