@extends('master')

@section('content')
    <div class="booking py-5 p-0">
            <div class="container p-0">
                <div class="row p-0">
                    <div class="col-md-4 col-12 p-0 mb-5">
                        <div class="card">
                            <div class="card-body mt-5 p-0">
                                <a href="{{url('/reservation')}}" class="btn btn-md btn-block ribbon">
                                    <h2 class="h2">Step-1</h2>
                                    <h5 class="h5">Booking</h5>
                                </a>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4 col-12 p-0 mb-5">
                        <div class="card">
                            <div class="card-body mt-5 p-0">
                                <a href="{{url('/step2')}}" class="btn btn-md btn-block ribbon ribbon-active">
                                    <h2 class="h2">Step-2</h2>
                                    <h5 class="h5">Room Details</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-12 p-0 mb-5">
                        <div class="card">
                            <div class="card-body mt-5 p-0">
                                <a href="{{url('/step3')}}" class="btn btn-md btn-block ribbon">
                                    <h2 class="h2">Step-3</h2>
                                    <h5 class="h5">Personal Details</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div><!-- ./RESERVATION STEPS -->

    <!-- ROOM DETAILS -->
    <div class="room-info py-5">
        <div class="container p-0">
            <div class="row mb-3">
                <div class="col-md-10">
                    <h1 class="h1 text-center mb-4 font-weight-bold">Choose Your Room</h1>
                    <div class="row mb-3">
                        @if(!empty($rooms))
                           @foreach($rooms as $room)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <figure>
                                        <img src="{{asset('')}}uploads/{{$room->picture}}" alt="" class="img-fluid">
                                        <figcaption class="text-center py-2">
                                        	<span style="float: left;" class="p-3">
                                        		<p class="d-inline">Room - {{$room->romnumber}}</p>
                                        		<p class="d-inline text-white badge badge-pill bg-primary">&#2547; {{$room->price}}</p>
                                        	</span>
                                        	<span style="float: right; font-size: 25px;">
                                        		<i class="fas fa-plus bg-success p-2 rounded-circle m-2 text-white chooseroom" id="{{$room->romnumber}}-{{$room->price}}"></i>
                                        	</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>



                    <div class="continue d-flex justify-content-between py-3">
                                                
                    </div>
                </div>

                <div class="col-md-2">
                    <h1 class="h1 font-weight-bold pb-3">Utilities</h1>
                    <form action="{{route('step2update.submit')}}" method="POST"> 
                        @csrf
                          <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="utilities[]" value="SmokingRoom">
                            <label class="form-check-label" for="exampleCheck1">Smoking Room</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="utilities[]" value="Reasturant">
                            <label class="form-check-label" for="exampleCheck1">Restaurant</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="utilities[]" value="Laundry">
                            <label class="form-check-label" for="exampleCheck1">Laundry</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="utilities[]" value="PickupAndDrop">
                            <label class="form-check-label" for="exampleCheck1">Pickup and Drop</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="utilities[]" value="Gymnesium">
                            <label class="form-check-label" for="exampleCheck1">Gymnesium</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="utilities[]" value="Minibar">
                            <label class="form-check-label" for="exampleCheck1">Minibar</label>
                        </div>
                         
                         <div class="form-group" id="showres">
                        
                       

                        </div><br/>
                       
                        <button type="submit" id="step2continue" class="btn btn-dark btn-md">Continue</button>

                    </form>
                </div>
            </div>
        </div>
    </div><!-- ./ROOM DETAILS -->



@endsection