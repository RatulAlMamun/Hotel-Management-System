<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Reservations;
use App\Rooms;
use Auth;
class ReservationController extends Controller
{
	public function reservation(){
	//Session::forget('token');

		return view('reservation');
	}

    public function step2(){

          $usertoken = '';
     if(empty(Session::get('token'))){
     return redirect('/reservation');
     }else{
      $session = Session::get('token');
        foreach ($session as $key) {
          $usertoken .= $key;
        }



  $roomtype = '';
   
      $try = Reservations::where('usertoken', $usertoken)->get();

      foreach ($try as $key) {
      $roomtype .= $key->roomtype;
      }     
 
      $rooms = Rooms::where('roomtype', $roomtype)->get();
      return view('step2', ['rooms' => $rooms]);
     }
      
    }

    public function step3(){
           if(empty(Session::get('token'))){
     return redirect('/reservation');
     }else{
    	return view('step3');
     }
    }

    public function doreservation(Request $request){
      if(Auth::check()){
        $id = Auth::user()->id;
    	$uid = uniqid();
        $usertoken = '';
          Session::push('token', $uid);
          $session = Session::get('token');
      foreach ($session as $key) {
      	$usertoken .= $key;
      }
         
            $data = array(
            'user_id' => $id,
            'usertoken' =>  $usertoken,
            'checkin'  => $request->checkin,
            'checkout'   => $request->checkout,
            'numberofperson'   => $request->roomper,
            'roomtype' => $request->roomtype,
            'roomnumber' => 0,
            'roomprice' => 0,
            'utilities' => '',
            'utilitiescharge' => 0,
            'totalprice' => 0,
            'name' => '',
            'email' => '',
            'phone' => '',
            'status' => 0
            
           
             );
         // print_r($data);
       Reservations::create($data);

       return redirect('/step2')->with("reservationadd", "Product is successfully removed in your cart");

      }else{
        return redirect('/login');
      }

    }

    public function step2update(Request $request){


		
		$usertoken = '';
    	$session = Session::get('token');
      	foreach ($session as $key) {
      		$usertoken .= $key;
      	}
		
		$roomtype = $request->roomdetails;
		$new =  explode("-", $roomtype);
		$roomnumber = $new[0];
		$price = $new[1];
		
		$ut = $request->utilities;
    	if ($ut == '') {
    		$utilities = '';
    		$utilitiescharge = 0;
    	} else {
    		$utilities = implode(', ', $ut);
    		$utilitiescharge = 0;
    		foreach ($ut as $key) {
    			switch ($key) {
    				case 'SmokingRoom':
    					$utilitiescharge += 10;
    					break;
    				case 'Reasturant':
    					$utilitiescharge += 10;
    					break;
    				case 'Laundry':
    					$utilitiescharge += 10;
    					break;
    				case 'PickupAndDrop':
    					$utilitiescharge += 10;
    					break;
    				case 'Gymnesium':
    					$utilitiescharge += 10;
    					break;
    				case 'Minibar':
    					$utilitiescharge += 10;
    					break;
    			}
    		}
    	}

    	//echo $utilitiescharge;
    	$data = array(
           
            'roomnumber' => $roomnumber,
            'roomprice' => $price,
            'utilities' => $utilities,
            'utilitiescharge' => $utilitiescharge,
            'totalprice' => $price+$utilitiescharge,
            
           
             );


      Reservations::where('usertoken', $usertoken)->update($data);
        return redirect('/step3')->with("reservationadd", "Product is successfully removed in your cart");
    }


    public function step3update(Request $request)
    {
      		$usertoken = '';
    	$session = Session::get('token');
      	foreach ($session as $key) {
      		$usertoken .= $key;
      	}

      	    	$data = array(
           
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
             );


      Reservations::where('usertoken', $usertoken)->update($data);
      Session::forget('token');

    return redirect('/')->with("reservationadd", "Your booking is complete");

    }


}
