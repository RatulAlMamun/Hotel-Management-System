<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('')}}/css/all.min.css">
    <link rel="stylesheet" href="{{asset('')}}/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="{{asset('')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('')}}/css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-light p-0">
        <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#navbarNav">
            <i class="fas fa-align-right fa-lg text-info"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="container-fluid">
                <div class="row">
                    <!-- SIDEBAR -->
                    <div class="col-xl-2 col-lg-3 col-md-4 fixed-top sidebar text-light p-0">
                        <a href="dashboard.html" class="navbar-brand text-light d-block mx-auto mb-3 button-border p-2">
                            HOTEL MANAGEMENT
                        </a>

                        <div class="my-3">
                            <i class="ml-3 fas fa-user mr-2"></i>
                            <a href="#" class="text-decoration-none text-white">{{ Auth::user()->name }}</a>
                        </div>

                        <ul class="navbar-nav flex-column">
                            <li class="nav-item current">
                                <a href="{{url('/home')}}" class="nav-link text-white mb-2">
                                    <i class="fas fa-tachometer-alt fa-lg mr-2"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/showbooking')}}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-sign-out-alt fa-lg mr-2"></i>Booking
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/guest')}}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-user-circle fa-lg mr-2"></i>Guest
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/showrooms')}}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-home fa-lg mr-2"></i>Rooms
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/staff')}}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-users fa-lg mr-2"></i>Staff
                                </a>
                            </li>
                            <li class="nav-item dropright">
                                <a href="{{ url('/messages') }}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-envelope fa-lg mr-2"></i>Messages
                                </a>
                            </li>
                            <li class="nav-item dropright">
                                <a href="{{ url('/revenue') }}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-bookmark fa-lg mr-2"></i>Revenue Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/expense')}}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-dollar-sign fa-lg mr-2"></i>Expense
                                </a>
                            </li>
                            <li class="nav-item">

                                    <a class="nav-link text-white mb-2 sidebar-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt fa-lg mr-2"></i>Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.adminlogout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                              
                         
                            </li>
                        </ul>
                    </div><!-- ./SIDEBAR -->
                </div>
            </div>
        </div>
    </nav><!-- ./NAVBAR -->



    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col">
                   <?php 

        $expense = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $revenue = array(0,0,0,0,0,0,0,0,0,0,0,0);

        $newrevenue = array();
        $newrevenueprice = array();
        $reservation = App\Reservations::get();
        foreach ($reservation as $r) {
            $newrevenue[] = $r->created_at->format('m');
            $newrevenueprice[] = $r->totalprice;
        }
        for ($i=0; $i<count($newrevenue); $i++) {
            $revenue[$newrevenue[$i]-1] += $newrevenueprice[$i];
        }

        $newexpense = array();
        $newexpenseprice = array();
        $expenses = App\Expenses::get();
        foreach ($expenses as $e) {
            $newexpense[] = $e->created_at->format('m');
            $newexpenseprice[] = $e->expenseamount;
        }
        for ($i=0; $i<count($newexpense); $i++) {
            $expense[$newexpense[$i]-1] += $newexpenseprice[$i];
        }

    ?>
            </div>
        </div>
    </div>

@yield('content')





    <script src="{{asset('')}}/js/jquery-3.3.1.slim.min.js"></script>
    <script src="{{asset('')}}/js/popper.min.js"></script>
    <script src="{{asset('')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('')}}/js/Chart.bundle.min.js"></script>
    <!-- CUSTOM JAVASCRIPT -->
    <script type="text/javascript">
        var jan = <?php echo $revenue[0]?>;
        var feb = <?php echo $revenue[1]?>;
        var mar = <?php echo $revenue[2]?>;
        var apr = <?php echo $revenue[3]?>;
        var may = <?php echo $revenue[4]?>;
        var jun = <?php echo $revenue[5]?>;
        var jul = <?php echo $revenue[6]?>;
        var aug = <?php echo $revenue[7]?>;
        var sep = <?php echo $revenue[8]?>;
        var oct = <?php echo $revenue[9]?>;
        var nov = <?php echo $revenue[10]?>;
        var dec = <?php echo $revenue[11]?>;
        var ejan = <?php echo $expense[0]?>;
        var efeb = <?php echo $expense[1]?>;
        var emar = <?php echo $expense[2]?>;
        var eapr = <?php echo $expense[3]?>;
        var emay = <?php echo $expense[4]?>;
        var ejun = <?php echo $expense[5]?>;
        var ejul = <?php echo $expense[6]?>;
        var eaug = <?php echo $expense[7]?>;
        var esep = <?php echo $expense[8]?>;
        var eoct = <?php echo $expense[9]?>;
        var enov = <?php echo $expense[10]?>;
        var edec = <?php echo $expense[11]?>;
        let ctx = document.getElementById('donught').getContext('2d');
        let chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
            labels: ['July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Revenue Line',
                borderColor: 'rgb(101, 201, 123)',
                backgroundColor: 'rgb(101, 201, 123)',
                fill: 'true',
                data: [jul, aug, sep, oct, nov, dec]
            },{
                label: 'Expense Line',
                borderColor: 'rgb(224, 105, 119)',
                backgroundColor: 'rgb(224, 105, 119)',
                fill: 'true',
                data: [ejul, eaug, esep, eoct, enov, edec]
            }]
        },


        // Configuration options go here
        options: {}
        });

    </script>

</body>
</html>