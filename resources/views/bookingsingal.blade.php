@extends('master')


@section('content')

    <section class="container-fluid py-3" id="services"><br><br>
        <h1 class="text-center">Bill</h1>
        <div class="title-bottom"></div>
       
        <div class="container">
            <div class="row py-4">
                @if(!empty($reservations))

                <div class="col-md-3">
                    
                </div>
                
                <div class="col-md-6 col-12 mt-2">
                    <div class="card">
                       <p class="text-center lead ml-3 mt-2"><b>CheckIn:</b>  {{ $reservations->checkin }}</p>

                       <p class="text-center lead ml-3 mt-2"><b>CheckOut:</b>  {{ $reservations->checkout }}</p>

                       <p class="text-center lead ml-3 mt-2"><b>Total Night:</b>  {{ '4' }}</p>

                       <p class="text-center lead ml-3 mt-2"><b>Room Number:</b>  {{ $reservations->roomnumber }}</p>
                       <p class="text-center lead ml-3 mt-2"><b>Room Price:</b>  {{ $reservations->roomprice }}</p>

                       <p class="text-center lead ml-3 mt-2"><b>Room Sub price:</b>{{ $reservations->roomprice  }}* 4 = {{ $reservations->roomprice * 4 }}</p>
                       <?php 
                        $roomp = $reservations->roomprice *4;

                        ?>
                       <p class="text-center lead ml-3 mt-2"><b>Utilities:</b>  {{ $reservations->utilities }}</p>

                       <?php
                       $ut = explode(', ', $reservations->utilities );
                        $x = 0;
                        $utp = 0;
                       ?>


                       
                         @foreach($ut as $key)
                        <?php $x++?>

                        <?php 
                        
                        
                        
                        ?>
                         
                          @endforeach  
                  <p class="text-center lead ml-3 mt-2"><b>Utilities Charge:</b>{{'10' }}*{{ $x}} = {{10 * $x}}*4 ={{4 * $x *10}}
                     </p>
               
                  <?php
                   $newut = 4 * $x *10;

                  ?>

                  <p class="text-center lead ml-3 mt-2"><b>Total Amount:</b> {{ $roomp}}+{{$newut}}= {{$roomp + $newut}}</p>
                      
                    </div>
                    <a id="printinfo" class="waves-effect waves-light btn green m-b-xs"><i class="fa fa-print left"></i>print</a>
                </div>

                <div class="col-md-3">
                    
                </div>
                 
               @endif
                
            </div>
            <div class="row">
           
            </div>
        </div>
    </section><!-- ./SERVICE -->




@endsection
@push('scripts')

<!-- $("#printinfo").click(function () {
    //Hide all other elements other than printarea.
    $("#printarea").show();
    window.print();
}); -->
@endpush