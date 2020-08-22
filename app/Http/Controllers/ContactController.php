<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;
class ContactController extends Controller
{
    public function contact(){
    	return view('contact');
    }

    public function docontact(Request $request){


            $data = array(
            'name' =>  $request->name,
            'email'  => $request->email,
            'phone'   => $request->phone,
            'message'   => $request->subject
             );

            Contacts::create($data);

       return redirect('/contact')->with("contactadd", "Your message successfully Sent");
    }
}
