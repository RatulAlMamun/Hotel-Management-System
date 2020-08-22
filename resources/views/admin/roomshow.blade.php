@extends('admin.master')

@section('content')


    <!-- DETAILS -->
    <section class="common-shadow">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h1 class="card-text">Rooms</h1>
                                    <button class="btn btn-lg btn-success ml-auto" data-toggle="modal" data-target="#addRoomModal"><i class="fas fa-plus-circle"></i> Add Room</button>
                                </div>
                                <div class="card-body">
                                     @if(session('roomadd'))
                                   <div class="alert alert-success">{{session('roomadd')}}</div>
                                   @endif
                                    @if(session('roomremove'))
                                   <div class="alert alert-success">{{session('roomremove')}}</div>
                                   @endif
                                   @if(session('uroom'))
                                   <div class="alert alert-success">{{session('uroom')}}</div>
                                   @endif

                                   @if(session('roomexist'))
                                   <div class="alert alert-danger">{{session('roomexist')}}</div>
                                   @endif
                                    <table class="table table-responsive table-striped text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Room ID</th>
                                                
                                                <th scope="col">Room Type</th>
                                                <th scope="col">Room No.</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Room Image</th>
                                                
                                                
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                            <?php
                                              $x = 0;
                                             ?>
                                            @if(!empty($rooms))
                                             @foreach($rooms as $room)
                                             <?php $x++?>
                                            <tr>
                                                <th scope="row">{{ $x }}</th>
                                                <td>{{$room->roomtype}}</td>
                                                <td>{{$room->romnumber}}</td>
                                                <td>{{$room->price}}</td>
                                               
                                                <td><img src="{{asset('')}}/uploads/{{$room->picture}}" class="img-fluid" width="150"></td>
                                               
                                                <td><button class="btn btn-md btn-success" data-toggle="modal" data-target="#editRoomModal{{$room->id}}">Edit</button>




                                                    <div class="modal fade" id="editRoomModal{{$room->id}}">
        <div class="modal-dialog modal-lg">
             <form action="{{route('doeditroom.submit')}}" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title">Edit Room</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                   
                      @csrf
                        <div class="form-group">
                            <label for="roomtype">Room Type</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="roomtype">
                                
                                    <option value="{{$room->roomtype}}">{{$room->roomtype}}</option>
                                    <option value="Single Room">Single Room</option>
                                    <option value="Double Room">Double Room</option>
                                    <option value="Family Room">Family Room</option>
                              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="roomno">Room No.</label>
                            <input type="text" class="form-control" name="roomnum" value="{{$room->romnumber}}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" value="{{$room->price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Room Image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="roomfile">
                        </div>

                        <input type="hidden" name="oldimage" value="{{$room->picture}}">
                        <input type="hidden" name="roomid" value="{{$room->id}}">
                   
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
             </form>
        </div>
    </div>

                                                  

                                                                       <a class="btn btn-md btn-danger" data-toggle="modal" data-target="#deletepost{{$room->id}}" href="#"><i class="fa fa-trash-o fa-lg"></i> Delete</a>

                                                   <div class="modal fade" id="deletepost{{$room->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Room</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="lead">Are You Sure Delete This?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success rounded-0" type="button" data-dismiss="modal">No</button>
                                        <a href='{{url("/removeroom/{$room->id}")}}' class="btn btn-danger rounded-0">Yes</a>
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
    </section><!-- ./DETAILS-->


    <!-- MODAL -->
    <div class="modal fade" id="sign-out">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Want to leave?</h4>
                    <button type="button" class="close text-light" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <p class="lead">Press logout to leave</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-dismiss="modal">Stay Here</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Logout</button>
                </div>
            </div>
        </div>
    </div><!-- ./MODAL -->

    <!-- ROOM MODAL -->
    <div class="modal fade" id="addRoomModal">
        <div class="modal-dialog modal-lg">
             <form action="{{route('doaddroom.submit')}}" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title">Add Room</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                   
                      @csrf
                        <div class="form-group">
                            <label for="roomtype">Room Type</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="roomtype">
                                
                                    <option value="">--Select Room Type--</option>
                                    <option value="Single Room">Single Room</option>
                                    <option value="Double Room">Double Room</option>
                                    <option value="Family Room">Family Room</option>
                              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="roomno">Room No.</label>
                            <input type="text" class="form-control" name="roomnum">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Room Image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="roomfile">
                        </div>
                        
                   
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Save Changes</button>
                </div>
            </div>
             </form>
        </div>
    </div><!-- ./ROOM MODAL -->





    @endsection
