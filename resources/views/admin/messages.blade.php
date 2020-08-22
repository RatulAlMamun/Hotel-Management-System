@extends('admin.master')

@section('content')


 <section class="guest">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="card-text text-center">Guest</h1>
                                </div>
                                <div class="card-body mx-auto">
                                    <table class="table table-responsive table-striped text-center">
                                        <thead class="thead-dark">
                                        	
                                            <tr>
                                                <th scope="col">Message ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone Number</th>
                                                <th scope="col">Messages</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        	<?php
                                              $x = 0;
                                             ?>
                                            @if(!empty($contacts))
                                             @foreach($contacts as $contact)
                                             <?php $x++?>
                                            <tr>
                                                <th scope="row">{{ $x }}</th>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>{{ $contact->message }}</td>
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
    </section>
@endsection