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
                                    <h1 class="card-title text-center">Confrimation Message</h1>
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
                                                    <th scope="col">Message ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Message</th>
                                                    
                                                </tr>
                                            </thead>
            
                                            <tbody>
                                                  <?php
                                              $x = 0;
                                             ?>
                                            @if(!empty($messages))
                                             @foreach($messages as $message)
                                             <?php $x++?>
                                                <tr>
                                                    <th scope="row">{{ $x }}</th>
                                                    <td>{{ $message->name }}</td>
                                                    <td>{{ $message->message }}</td>          
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