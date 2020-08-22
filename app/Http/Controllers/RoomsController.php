<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rooms;

class RoomsController extends Controller
{
    public function room(){
     $roomssingle = Rooms::where('roomtype', 'Single Room')->get();
     $roomsdouble = Rooms::where('roomtype', 'Double Room')->get();
     $roomsfamily = Rooms::where('roomtype', 'Family Room')->get();
     $roomsmultiple = Rooms::where('roomtype', 'Multiple Room')->get();
    	return view('rooms', ['roomssingle' => $roomssingle, 'roomsdouble' => $roomsdouble, 'roomsfamily' => $roomsfamily, 'roomsmultiple' => $roomsmultiple,]);
    }
}
