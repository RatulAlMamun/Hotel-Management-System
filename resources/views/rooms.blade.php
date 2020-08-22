@extends('master')

@section('content')
    <!-- ROOMS -->
    <section class="rooms py-5 bg-white">
        <h1 class="h1 text-center text-uppercase pt-5 font-weight-bold">Our Rooms</h1>
        <hr class="mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="text-center mb-3">Single Room</h2>
                </div>
                @if(!empty($roomssingle))
                @foreach($roomssingle as $sroom)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{asset('')}}/uploads/{{$sroom->picture}}" alt="room1" class="img-fluid card-img-top">
                        <div class="card-footer d-flex justify-content-between">
                            <span>&#2547; {{$sroom->price}}/night</span>
                        
                        </div>
                    </div>
                </div>
                @endforeach
               @endif
         
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="text-center mb-3">Double Room</h2>
                </div>
                    @if(!empty($roomsdouble))
                @foreach($roomsdouble as $droom)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{asset('')}}/uploads/{{$droom->picture}}" alt="room1" class="img-fluid card-img-top">
                        <div class="card-footer d-flex justify-content-between">
                            <span>&#2547; {{$droom->price}}/night</span>
                        
                        </div>
                    </div>
                </div>
                @endforeach
               @endif

                
            </div>

            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-3">Family Room</h2>
                </div>
                     @if(!empty($roomsdouble))
                @foreach($roomsfamily as $froom)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{asset('')}}/uploads/{{$froom->picture}}" alt="room1" class="img-fluid card-img-top">
                        <div class="card-footer d-flex justify-content-between">
                            <span>&#2547; {{$froom->price}}/night</span>
                        
                        </div>
                    </div>
                </div>
                @endforeach
               @endif

                
            </div>
        </div>
    </section>\
    <!-- ./ROOMS -->
@endsection