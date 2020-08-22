@extends('master')

@section('content')

    <!-- RESERVATION STEPS -->
    <div class="booking py-5 p-0">
        <div class="container p-0">
            <div class="row p-0">
                <div class="col-md-4 col-12 p-0 mb-5">
                    <div class="card">
                        <div class="card-body mt-5 p-0">
                            <a href="{{url('/reservation')}}" class="btn btn-md btn-block ribbon ribbon-active">
                                <h2 class="h2">Step-1</h2>
                                <h5 class="h5">Booking</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-12 p-0 mb-5">
                    <div class="card">
                        <div class="card-body mt-5 p-0">
                            <a href="{{url('/step2')}}" class="btn btn-md btn-block ribbon">
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

    <!-- RESERVATION -->
    <section class="reseration py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="h2 text-uppercase font-weight-bold mt-2 text-center mt-3">Book Your Room</h2>
                    <div class="card py-3">
                        <div class="card-body">
                            <form class="py-3" action="{{route('doreservation.submit')}}" method="POST">
                                @csrf
                                <div class="input-group mb-2">
                                    <input type="date" class="form-control" id="orderDate" name="checkin" placeholder="Check in">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="date" class="form-control" id="checkoutDate" name="checkout" placeholder="Check out">
                                </div>
                                <select class="custom-select mb-2" name="roomper" id="numper">
                                	<option value="">--Number of Person--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3">4</option>
                                </select>
        
                                <select class="custom-select mb-2" name="roomtype">
                                	<option value="">--Select Room Type--</option>
                                    <option value="Single Room">Single Room</option>
                                    <option value="Double Room">Double Room</option>
                                    <option value="Family Room">Family Room</option>
                                </select>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-dark btn-sm"> Continue</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 d-none d-md-block">
                    <img src="images/gallery/10.jpg" alt="hotel-room" class="img-fluid rounded-circle" style="margin-top: -2rem;">
                </div>
            </div>
        </div>
    </section><!-- ./RESERTATION -->



@endsection