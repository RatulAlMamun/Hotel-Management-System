
@extends('master')

@section('content')

    <!-- RESERVATION STEPS -->
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
                                <a href="{{url('/step3')}}" class="btn btn-md btn-block ribbon ribbon-active">
                                    <h2 class="h2">Step-3</h2>
                                    <h5 class="h5">Personal Details</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div><!-- ./RESERVATION STEPS -->

    <!-- PERSONAL INFO -->
    <div class="personal-info py-5">
        <div class="container p-0">
            <div class="row">
                <div class="col-md-6 col-12 mx-auto">
                    <form action="{{route('step3update.submit')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="@if(Auth::check()){{ Auth::user()->name }}@else{{ '' }}@endif" placeholder="Type your full name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="@if(Auth::check()){{ Auth::user()->email }}@else{{ '' }}@endif" placeholder="Enter your email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Give your Phone Number" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" class="btn btn-lg btn-dark justify-content-end" value="Finish">
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div><!-- ./PERSONAL INFO -->



    @endsection