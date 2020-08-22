<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;
use App\Reservations;
use App\Staffs;
use App\Categorys;
use App\Expenses;
use App\Admin;
use App\Confarmations;
use App\User;
use App\Contacts;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $countguest = 0;
        $guest = Reservations::get();
        foreach ($guest as $value){
            $countguest += $value->numberofperson;
        }
        $countreservation = count(Reservations::get());
        $countroom = count(Rooms::get());
        $rinitprice = 0;
        $einitprice = 0;
        $reservations = Reservations::get();
        foreach ($reservations as $value){
            $rinitprice += $value->totalprice;
        }
        $expense = Expenses::get();
        foreach ($expense as $value) {
            $einitprice += $value->expenseamount;
        }
        $revenue = $rinitprice - $einitprice;
        $latestbookings = Reservations::orderBy('id', 'DESC')->limit(8)->get();
        return view('admin.home', [
                'countreservation' => $countreservation,
                'countroom' => $countroom,
                'countguest' => $countguest,
                'revenue' => $revenue,
                'latestbookings' => $latestbookings
        ]);
    }


    public function showrooms()
    {
        $rooms = Rooms::orderBy('id', 'DESC')->paginate(30);
        return view('admin.roomshow', ['rooms' => $rooms]);
    }


    public function doaddroom(Request $request)
    {
        if(Rooms::where('romnumber', '=', $request->roomnum)->count() > 0){
            return redirect('/showrooms')->with("roomexist", "Room is Already Exist");
        } else {
            $image = $request->roomfile;
            $new_name = rand().'.'.$image->getClientOriginalExtension();

            $image->move('uploads/', $new_name);
            $data = array(
                'roomtype' =>  $request->roomtype,
                'romnumber'  => $request->roomnum,
                'price'   => $request->price,
                'picture'   => $new_name
            );
            Rooms::create($data);
            return redirect('/showrooms')->with("roomadd", "Room is successfully Saved");
        }
    }


    public function removeroom($id)
    {
        $rooms = Rooms::find($id);
        unlink('uploads/'.$rooms->picture);
        Rooms::where('id', $id)->delete();
        return redirect('/showrooms')->with("roomremove", "Room is successfully Removed");
    }


    public function doeditroom(Request $request){
        $image = $request->roomfile;
        $id  = $request->roomid;
        $oldimg = $request->oldimage;
        if(isset($image)){
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/', $new_name);
            $data = array(
                'roomtype' =>  $request->roomtype,
                'romnumber'  => $request->roomnum,
                'price'   => $request->price,
                'picture'   => $new_name
            );
            Rooms::where('id', $id)->update($data);
            unlink('uploads/'.$oldimg);
            return redirect('/showrooms')->with("uroom", "room is successfully Updated");
        } else {
            $data = array(
                'roomtype' =>  $request->roomtype,
                'romnumber'  => $request->roomnum,
                'price'   => $request->price,
                'picture'   => $oldimg
            );
            Rooms::where('id', $id)->update($data);
            return redirect('/showrooms')->with("uroom", "room is successfully Updated");
        }
    }


    public function showbooking()
    {
        $reservations = Reservations::orderBy('id', 'DESC')->paginate(30);
        return view('admin.viewbooking', ['reservations' => $reservations]);
    }


    public function showbookingconfrimed($id){
        $data = array('status' => 1);
        $con = Reservations::find($id);
        Reservations::where('id', $id)->update($data);
        $userid = $con->user_id;
        $username = User::find($userid);
        $getname = $username->name;
        $array = array(
            'user_id' => $userid,
            'name' => $getname,
            'message' => 'Your Order is successfully confrimed',
            'status' => 0
        );
        Confarmations::create($array);
        return redirect('/showbooking')->with("confrimed", "Booking is successfully Confrimed");
    }


    public function removebooking($id){
        Reservations::where('id', $id)->delete();
        return redirect('/showbooking')->with("bookingremove", "Booking is successfully Declined");
    }



    public function viewguest()
    {
        $reservations = Reservations::orderBy('id', 'DESC')->paginate(30);
        return view('admin.guest', ['reservations' => $reservations]);
    }


    public function viewstaff()
    {
        $staffs = Staffs::orderBy('id', 'DESC')->paginate(30);
        return view('admin.staff', ['staffs' => $staffs]);
    }


    public function doaddstaff(Request $request)
    {
        $data = array(
            'name' =>  $request->name,
            'designation'  => $request->designation,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address'   => $request->address,
            'salary'   => $request->salary,
        );
        Staffs::create($data);
        return redirect('/staff')->with("crestaff", "Staff is successfully Saved");
    }


    public function removestaff($id)
    {
        Staffs::where('id', $id)->delete();
        return redirect('/staff')->with("rstaff", "Staff is successfully Removed");
    }

    public function doeditstaff(Request $request)
    {
        $staffid = $request->staffid;
        $data = array(
            'name' =>  $request->name,
            'designation'  => $request->designation,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address'   => $request->address,
            'salary'   => $request->salary,
        );
        Staffs::where('id', $staffid)->update($data);
        return redirect('/staff')->with("editstaff", "Staff is successfully Updated");
    }


    public function expense(){
        $categorys = Categorys::get();
        $expenses = Expenses::orderBy('id', 'DESC')->paginate(30);
        return view('admin.expense', ['categorys' => $categorys, 'expenses' => $expenses]);
    }

    public function addcategory(Request $request)
    {
        $data = array('category' =>  $request->category);
        Categorys::create($data);
        return redirect('/expense')->with("acategory", "Category is successfully Save");
    }


    public function addexpense(Request $request){
        $data = array(
            'expensecategory' =>  $request->expensecategory,
            'expenseamount'  => $request->expenseamount,
            'expensedate'   => $request->expensedate,
        );
        Expenses::create($data);
        return redirect('/expense')->with("aexpense", "Expense is successfully Save");
    }


    public function editexpense(Request $request){
        $id = $request->expenseid;
        $data = array(
            'expensecategory' =>  $request->expensecategory,
            'expenseamount'  => $request->expenseamount,
            'expensedate'   => $request->expensedate,
        );
        Expenses::where('id', $id)->update($data);
        return redirect('/expense')->with("edexpense", "Expense is successfully Updated");
    }


    public function removeexpense($id){
        Expenses::where('id', $id)->delete();
        return redirect('/expense')->with("rexpense", "Expense is successfully Removed");
    }


    public function revenue(){
        return view("admin.revenue");
    }


    public function messages(){
        $contacts = Contacts::get();
        return view("admin.messages", ['contacts' => $contacts]);
    }
}
