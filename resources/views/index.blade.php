@extends('master')
@section('title','Hotel management')


@section('content')
        
<section class="slider">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-12">
            
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/cover.jpg" class="d-block w-100 img-fluid" alt="...">
                            </div>

                            <div class="carousel-item">
                                <img src="images/facility.jpg" class="d-block w-100" alt="...">
                            </div>
                          
                            <div class="carousel-item">
                                <img src="images/showcase.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="slider">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-md-12">
            
                     @if(session('reservationadd'))
               <div class="alert alert-success">{{session('reservationadd')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            @endif
            </div>
        </div>
    </section>
  <!-- BOOKING -->

  <form action="{{route('doreservation.submit')}}" method="POST">
                                @csrf
    <section class="book">
        <div class="container">
            <div class="row text-white book">
                 
                <div class="col-md-6 col-lg-3">
                    <h2 class="h2 text-uppercase font-weight-bold mt-2">Book <br> Your Room</h2>
                </div>
        
                <div class="col-md-6 col-lg-3">
                    <div class="input-group mb-2">
                        <input type="date" class="form-control" id="orderDate" name="checkin" placeholder="Arrival Date">
                    </div>
        
                    <div class="input-group mb-2">
                        <input type="date" class="form-control" id="checkoutDate" name="checkout" placeholder="Departure Date">
                    </div>
                </div>
        
                <div class="col-md-6 col-lg-3">
                    <select class="custom-select mb-2" name="roomper">
                        <option value="1">-- Number of Person --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="3">4</option>
                    </select>
        
                    <select class="custom-select mb-2" name="roomtype">
                        <option value="1">-- Select Room Type --</option>
                        <option value="Single Room">Single Room</option>
                        <option value="Double Room">Double Room</option>
                        <option value="Family Room">Family Room</option>
                        <option value="Multiple Room">Multiple Room</option>
                    </select>
                </div>
        
                <div class="col-md-6 col-lg-3">
                    <input class="btn btn-dark btn-lg text-uppercase font-weight-bold btn-block" value="Book Now" type="submit">
                </div>
            </div>
               
        </div>
    </section><!-- ./BOOKING -->
</form>

        <!-- SERVICE -->
    <section class="container-fluid py-3" id="services">
        <h1 class="text-center">Our Rooms</h1>
        <div class="title-bottom"></div>
        <p class="text-center lead">We all live in an age that belongs to the young at heart. Life that is becoming extremely fast.</p>
        <div class="container">
            <div class="row py-4">
                @if(!empty($rooms))
                @foreach($rooms as $room)
                <div class="col-md-4 col-12 mt-2">
                    <div class="card">
                        <img src="{{asset('')}}/uploads/{{$room->picture}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <a href="" class="text-dark text-center text-decoration-none"><h6>{{$room->roomtype}}</h6></a>
                            <p class="text-center font-weight-bold">Taka: {{$room->price}} <small class="text-muted">/night</small></p>
                        </div>
                    </div>
                </div>
                 @endforeach
               @endif
                
            </div>
            <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">{{$rooms->links()}}</div>
            
            <div class="col-md-3"></div>
            </div>
        </div>
    </section><!-- ./SERVICE -->

        <section class="facility">
        <div class="overlay">
            <h1 class="text-center pt-5 text-white">Our Facilities</h1>
            <p class="text-center lead mb-5 text-light">Who are in extremely love with eco friendly system.</p>
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="card-body">
                                <h6 class="mb-3"><a href="" class="text-decoration-none text-white"><i class="fas fa-utensils fa-lg text-warning"></i> Restaurant</a></h6>
                                <p class="text-white">Usage of the Internet is becoming more common due to rapid advancement of technology.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="card-body">
                                <h6 class="mb-3"><a href="" class="text-decoration-none text-white"><i class="fas fa-tshirt fa-lg text-warning"></i> Laundry</a></h6>
                                <p class="text-white">We have our own laundry plant inside the Hotel premises to facilitate the honorable guest.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="card-body">
                                <h6 class="mb-3"><a href="" class="text-decoration-none text-white"><i class="fas fa-layer-group fa-lg text-warning"></i> Pickup and Drop</a></h6>
                                <p class="text-white">Usage of the Internet is becoming more common due to rapid advancement of technology.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row py-5">
                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="card-body">
                                <h6 class="mb-3"><a href="" class="text-decoration-none text-white"><i class="fas fa-building fa-lg text-warning"></i> Maaravi Hall</a></h6>
                                <p class="text-white">The Banquet/conference 150 pax seating capacity is under construction for the time being.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="card-body">
                                <h6 class="mb-3"><a href="" class="text-decoration-none text-white"><i class="fas fa-dumbbell fa-lg text-warning"></i> Gymnesium</a></h6>
                                <p class="text-white">Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="card-body">
                                <h6 class="mb-3"><a href="" class="text-decoration-none text-white"><i class="fas fa-ice-cream fa-lg text-warning"></i> Minibar</a></h6>
                                <p class="text-white">You may enjoy Mini Bar items which is filled-up with Soft Drinks (Can), Chocolates.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- FACILITIES -->




    @endsection