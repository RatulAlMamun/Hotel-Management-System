    
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
                                    <h1 class="card-text">Expense</h1>
                                    <button class="btn btn-lg btn-success ml-auto" data-toggle="modal" data-target="#addExpenseModal"><i class="fas fa-plus-circle"></i> Add Expense</button>
                                    <button class="btn btn-lg btn-success ml-2" data-toggle="modal" data-target="#addCategoryModal"><i class="fas fa-plus-circle"></i> Add Category</button>
                                </div>
                                <div class="card-body mx-auto">
                                      @if(session('acategory'))
                                   <div class="alert alert-success">{{session('acategory')}}</div>
                                   @endif

                                   @if(session('aexpense'))
                                   <div class="alert alert-success">{{session('aexpense')}}</div>
                                   @endif

                                   @if(session('edexpense'))
                                   <div class="alert alert-success">{{session('edexpense')}}</div>
                                   @endif

                                   @if(session('rexpense'))
                                   <div class="alert alert-success">{{session('rexpense')}}</div>
                                   @endif
                                    <table class="table table-responsive table-striped text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Expense ID</th>
                                                <th scope="col">Expense Category</th>
                                                <th scope="col">Expense Amount</th>
                                                <th scope="col">Expense Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                            <?php
                                              $x = 0;
                                             ?>
                                            @if(!empty($expenses))
                                             @foreach($expenses as $expense)
                                             <?php $x++?>
                                            <tr>
                                                <th scope="row">{{ $x }}</th>
                                                <td>{{ $expense->expensecategory}}</td>
                                                <td>{{ $expense->expenseamount}}<span class="h3"> &#2547;</span></td>
                                                <td>{{ $expense->expensedate}}</td>
                                                <td><button class="btn btn-md btn-success" data-toggle="modal" data-target="#editExpenseModal{{$expense->id}}">Edit</button>

<!-- Expense MODAL -->
    <div class="modal fade" id="editExpenseModal{{$expense->id}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Update Expense</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="{{route('editexpense.submit')}}" method="POST">
                <div class="modal-body">
                    @csrf
                        <div class="form-group">
                            <label for="title">Expense Category</label>
                            <select class="custom-select mb-2" name="expensecategory">
                                    <option value="{{ $expense->expensecategory}}">{{ $expense->expensecategory}}</option>

                                    @if(!empty($categorys))
                                    @foreach($categorys as $category)
                                    <option value="{{$category->category}}">{{$category->category}}</option>
                                    @endforeach
                                    @endif
                                
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Expense Amount</label>
                            <input type="number" class="form-control" name="expenseamount" value="{{ $expense->expenseamount}}">
                        </div>
                        <div class="form-group">
                            <label for="title">Expense Date</label>
                            <input type="date" class="form-control" name="expensedate" value="{{ $expense->expensedate}}">
                        </div>
                        <input type="hidden" name="expenseid" value="{{$expense->id}}">
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- ./Expense MODAL -->






                                                    


  <a class="btn btn-md btn-danger" data-toggle="modal" data-target="#deletepost{{$expense->id}}" href="#"><i class="fa fa-trash-o fa-lg"></i> Delete</a>

                                                   <div class="modal fade" id="deletepost{{$expense->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Expense</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="lead">Are You Sure Delete This?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success rounded-0" type="button" data-dismiss="modal">No</button>
                                        <a href='{{url("/removeexpense/{$expense->id}")}}' class="btn btn-danger rounded-0">Yes</a>
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

        <!-- CATEGORY MODAL -->
    <div class="modal fade" id="addCategoryModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Add Category</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="{{route('addcategory.submit')}}" method="POST">
                <div class="modal-body">
                    @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="category">
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Save Category</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- ./CATEGORY MODAL -->
    
    <!-- Expense MODAL -->
    <div class="modal fade" id="addExpenseModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Add Expense</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="{{route('addexpense.submit')}}" method="POST">
                <div class="modal-body">
                    @csrf
                        <div class="form-group">
                            <label for="title">Expense Category</label>
                            <select class="custom-select mb-2" name="expensecategory">
                                    <option value="">--Select Category--</option>

                                    @if(!empty($categorys))
                                    @foreach($categorys as $category)
                                    <option value="{{$category->category}}">{{$category->category}}</option>
                                    @endforeach
                                    @endif
                                
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Expense Amount</label>
                            <input type="number" class="form-control" name="expenseamount">
                        </div>
                        <div class="form-group">
                            <label for="title">Expense Date</label>
                            <input type="date" class="form-control" name="expensedate">
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Save Expense</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- ./Expense MODAL -->


    @endsection