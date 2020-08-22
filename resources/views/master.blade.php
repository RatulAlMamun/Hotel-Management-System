<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="{{asset('')}}/css/all.min.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="{{asset('')}}/css/gijgo.min.css">
    <link rel="stylesheet" href="{{asset('')}}/css/bootstrap.min.css">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{asset('')}}/css/style.css">
    <title>Hotel Management System</title>
    <link rel="shortcut icon" href="favicon.ico" type="{{asset('')}}/image/x-icon">
</head>
<body>
    <!-- HEADER -->
    <header class="header">
        <div class="container p-0">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-sm navbar-dark fixed-top py-3">
                        <a href="index.html" class="navbar-brand text-white text-uppercase">
                            <img src="{{asset('')}}/images/logo.png" alt="logo" class="img-fluid">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                            <i class="fas fa-align-right text-white"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a href="{{url('/')}}" class="nav-link text-uppercase">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/about')}}" class="nav-link text-uppercase">About us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/facilities')}}" class="nav-link text-uppercase">Facilities</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/reservation')}}" class="nav-link text-uppercase">Reservation</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/rooms')}}" class="nav-link text-uppercase">Rooms</a>
                                </li>
                                    @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                       <a class="dropdown-item" href="{{url('/profile') }}">Profile</a>
                                       <a class="dropdown-item" href="{{url('/confirmation') }}">Confirmation</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                                <li class="nav-item">
                                    <a href="{{url('/contact')}}" class="nav-link text-uppercase">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header><!-- HEADER-->



  @yield('content')







        <!-- FOOTER -->
    <footer class="footer py-5">
        <div class="container p-0">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            
                            <h5 class="card-title">Location</h5>
                            <p>
                                Road-13, Sector-10,<br> Uttara, Dhaka,<br> Bangladesh
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-links">
                        <h5 class="text-light">Services</h5>
                        <nav class="nav flex-column">
                            <a href="#">Restaurant</a>
                            <a href="#">Laundry</a>
                            <a href="#">Pickup and Drop</a>
                            <a href="#">Gymnesium</a>
                            <a href="#">Minibar</a>
                        </nav>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="social-media">
                        <ul>
                            <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a> <span>Facebook</span></li>
                            <li><a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a> <span>Twitter</span></li>
                            <li><a href="https://www.plus.google.com" target="_blank"><i class="fab fa-google-plus"></i></a> <span>Google+</span></li>
                            <li><a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a> <span>Linkedin</span></li>
                            <li><a href="https://www.pinterest.com" target="_blank"><i class="fab fa-pinterest"></i></a><span>Pinterest</span></li>
                            <li><a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a><span>Youtube</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-5">
        <p class="text-light text-center">&copy; 2019 All Rights Reserved</p>
    </footer><!-- ./FOOTER -->



    <!-- BOOTSTRAP -->
    <script src="{{asset('')}}/js/jquery-3.3.1.slim.min.js"></script>
    <script src="{{asset('')}}js/jquery-1.11.1.min.js"></script>
    <script src="{{asset('')}}/js/popper.min.js"></script>
    <script src="{{asset('')}}/js/gijgo.min.js"></script>
    <script src="{{asset('')}}/js/bootstrap.min.js"></script>
    <!-- CUSTOM JAVASCRIPT -->
    <script src="{{asset('')}}/js/datapickerapp.js"></script>
       <script type="text/javascript">
     $(document).ready(function(){


$('button').prop('disabled', true); 

     $(".chooseroom").click(function(){
        var html = '';
        
         var value = $(this).attr('id');

   
     $('button').prop('disabled', false); 

      
         html +='<label>Your Selected Room: </label><input type="text" class="form-control" name="roomdetails" id="roomdetails" value='+value+' required="true" readonly>';
       
     
         $('#showres').html(html);
        });
    });

</script>

    <script type="text/javascript">

$(document).ready(function(){

 $('button').prop('disabled', true); 

$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
   
    $('#orderDate').attr('min', maxDate);
});

$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
   
    $('#checkoutDate').attr('min', maxDate);
});



$('#numper').click(function(){
var checkin = $('#orderDate').val();
var checkout = $('#checkoutDate').val();
     const date1 = new Date(checkin);
        const date2 = new Date(checkout); 
        if(date1 <= date2){
          $('button').prop('disabled', false); 
        } else {
            alert("Your checkout date is invalid. Please choose a valid date.");
             $('button').prop('disabled', true);
        }
});

});

    // function datevalidation(){
    //     var checkin = document.getElementById('orderDate').value;
    //     var checkout = document.getElementById('checkoutDate').value;
    //     const date1 = new Date(checkin);
    //     const date2 = new Date(checkout); 
    //     if(date1 <= date2){
          
    //     } else {
    //         alert("bal kow, checkout thik kor haramzada");
    //     }
    // }
</script>
<script type="text/javascript">
 $(document).ready(function(){

  $('#printinfo').click(function(){
   //$("#printarea").show();
    window.print();
  });
 });   


</script>
</body>
</html>