@extends('admin.master')

@section('content')
    <section>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mb-5">
                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common text-light">
                                <div class="card-body text-center">
                                    <h6><i class="fas fa-align-justify"></i>
                                   @if(!empty($countreservation))
                                    {{$countreservation}}

                                    @endif
                                 </h6>
                                    <h4>Booking</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common text-light">
                                <div class="card-body text-center">
                                    <h6><i class="fas fa-dollar-sign"></i> 

                                    @if(!empty($revenue))
                                    {{$revenue}}

                                    @endif


                                </h6>
                                    <h4>Revenue total</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common text-light">
                                <div class="card-body text-center">
                                    <h6><i class="fas fa-home"></i>
                                     @if(!empty($countroom))
                                    {{$countroom}}

                                    @endif

                                    </h6>
                                    <h4>Rooms Available</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common text-light">
                                <div class="card-body text-center">
                                    <h6><i class="fas fa-user-tie"></i>
                                     @if(!empty($countguest))
                                    {{$countguest}}

                                    @endif
                                    </h6>
                                    <h4>Guest</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ./CARDS -->

    <!-- CHARTS -->
    <section class="chart">
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                        <div class="row mb-5">
                            <div class="col-xl-6 col-sm-6 p-2">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Monthly Revenue Report</h3>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="donught" style="display: block; width: 392px;" width="392" height="250" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-xl-6 col-sm-6 p-2">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Latest Booking</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-hover text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">BookID</th>
                                                <th scope="col">Guest Name</th>
                                                <th scope="col">Room</th>
                                                <th scope="col">Payment</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if(!empty($latestbookings))
                                            @foreach($latestbookings as $lb)
                                            <tr>
                                                <th scope="row">{{ $lb->id }}</th>
                                                <td>{{ $lb->name }}</td>
                                                <td>{{ $lb->roomnumber }}</td>
                                                <td>{{ $lb->totalprice }}</td>
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
        </section><!-- CHART -->

    <!-- REVIEW -->
    <section class="review">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row">
                        

                    </div>
                </div>
            </div>
        </div>
    </section><!-- REVIEW -->
@endsection
