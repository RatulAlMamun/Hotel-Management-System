@extends('admin.master')

@section('content')

    <!-- DETAILS -->
    <section class="common-shadow">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            	@if(session('crestaff'))
                                   <div class="alert alert-success">{{session('crestaff')}}</div>
                                   @endif

                                   @if(session('rstaff'))
                                   <div class="alert alert-success">{{session('rstaff')}}</div>
                                   @endif

                                   @if(session('editstaff'))
                                   <div class="alert alert-success">{{session('editstaff')}}</div>
                                   @endif
                                <div class="card-header d-flex justify-content-between">
                                    <h1 class="card-text">Stuff</h1>
                                    <button class="btn btn-lg btn-success ml-auto" data-toggle="modal" data-target="#addUserModal"><i class="fas fa-plus-circle"></i> Add Stuff</button>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-striped text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Stuff ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Salary</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                        	<?php
                                              $x = 0;
                                             ?>
                                            @if(!empty($staffs))
                                             @foreach($staffs as $staff)
                                             <?php $x++?>
                                            <tr>
                                                <th scope="row">{{ $x }}</th>
                                                <td>{{ $staff->name }}</td>
                                                <td>{{ $staff->designation }}</td>
                                                <td>{{ $staff->email }}</td>
                                                <td>{{ $staff->phone }}</td>
                                                <td>{{ $staff->address }}</td>
                                                <td>{{ $staff->salary }}</td>
                                                <td><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addstaffModal{{$staff->id}}">Edit</button>



                                                	<!-- STUFF MODAL -->
    <div class="modal fade" id="addstaffModal{{$staff->id}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title">Edit Staff</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                 <form action="{{route('doeditstaff.submit')}}" method="POST">
                <div class="modal-body">
                    @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $staff->name }}">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" name="designation" value="{{ $staff->designation }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $staff->email }}">
                        </div>
                        <div class="form-group">
                            <label for="text">Phone</label>
                            <input type="tel" class="form-control" name="phone" value="{{ $staff->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="text">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $staff->address }}">
                        </div>
                        <div class="form-group">
                            <label for="text">Salary</label>
                            <input type="text" class="form-control" name="salary" value="{{ $staff->salary }}">
                        </div>
                    
                </div>

                <input type="hidden" name="staffid" value="{{ $staff->id }}">
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Update</button>
                </div>

                </form>
            </div>
        </div>
    </div><!-- ./STUFF MODAL -->


                                                     <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletestaff{{$staff->id}}" href="#"> Delete</a>

                        <div class="modal fade" id="deletestaff{{$staff->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Staff</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="lead">Are You Sure Delete This?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success rounded-0" type="button" data-dismiss="modal">No</button>
                                        <a href='{{url("/removestaff/{$staff->id}")}}' class="btn btn-danger rounded-0">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                	</td>
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
    </section><!-- ./DETAILS -->
    <!-- STUFF MODAL -->
    <div class="modal fade" id="addUserModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title">Add Staff</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                 <form action="{{route('doaddstaff.submit')}}" method="POST">
                <div class="modal-body">
                    @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" name="designation">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="text">Phone</label>
                            <input type="tel" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="text">Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label for="text">Salary</label>
                            <input type="text" class="form-control" name="salary">
                        </div>
                    
                </div>


                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Save Changes</button>
                </div>

                </form>
            </div>
        </div>
    </div><!-- ./STUFF MODAL -->
  @endsection