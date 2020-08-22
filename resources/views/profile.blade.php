@extends('master')


@section('content')



    <section class="booking">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 ml-auto">
                    <div class="row no-gutters">
                        <div class="col-12 col-lg-12 p-0 mx-auto">
                            <div class="card">
                                <div class="card-header mt-5">
                                    <h1 class="card-title text-center">Booking</h1>
                                </div>
                                <div class="card-body">
                                    @if(session('confrimed'))
                                   <div class="alert alert-success">{{session('confrimed')}}</div>
                                   @endif

                                   @if(session('bookingremove'))
                                   <div class="alert alert-success">{{session('bookingremove')}}</div>
                                   @endif

                                    <table class="table table-responsive table-striped text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Booking ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Person No.</th>
                                                    <th scope="col">Room Type</th>
                                                    <th scope="col">Utilities</th>
                                                    <th scope="col">Check In</th>
                                                    <th scope="col">Check Out</th>
                                                    <th scope="col">Order Stuts</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
            
                                            <tbody>
                                                  <?php
                                              $x = 0;
                                             ?>
                                            @if(!empty($reservations))
                                             @foreach($reservations as $reservation)
                                             <?php $x++?>
                                                <tr>
                                                    <th scope="row">{{ $x }}</th>
                                                    <td>{{ $reservation->name }}</td>
                                                    <td>{{ $reservation->numberofperson }}</td>
                                                    <td>{{ $reservation->roomtype }}</td>
                                                    <td>{{ $reservation->utilities }}</td>
                                                    <td>{{ $reservation->checkin }}</td>
                                                    <td>{{ $reservation->checkout }}</td>

                                                    <td>

                                                        @if($reservation->status == 0)
                                                        {{ 'Pending'}}

                                                        @else
                                                        {{'Confrimed'}}
                                                        @endif
                                                    </td>
                                                    <td><a href='{{url("/bookingsingelview/{$reservation->id}")}}' class="btn btn-md btn-success mr-2">Bill</a>

                                                      
                                                </tr>
                                              
                                              
                                              @endforeach
                                             @endif
                                                
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ./DETAILS-->

        <!-- SERVICE -->



@endsection