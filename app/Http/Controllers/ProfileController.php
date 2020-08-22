<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservations;
use App\Confarmations;
use Auth;

class ProfileController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }


    public function profile(){
       $id = Auth::user()->id;
    	$reservations = Reservations::where('user_id', $id)->where('status', 1)->orderBy('id', 'DESC')->paginate(30);

    	return view('profile', ['reservations' => $reservations]);
    }

    public function bsingel($id){
    	$reservations = Reservations::find($id);
     return view('bookingsingal', ['reservations' => $reservations]);
    }

    public function confirmation(){
        $userid = Auth::user()->id;
        $messages = Confarmations::where('user_id', $userid)->orderBy('id', 'DESC')->get();
        return view('confirmation', ['messages' => $messages]);
    }
}
