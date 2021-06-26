@extends('layouts.main')
@section('content')
@include('admin.inc.sidebar')
<div class="content-page">
        <div class="content">
            <div class="container-fluid">
                    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box widget-inline p-0">

                <div class="row">
                    <div class="col-sm-6 col-xl-3 col-lg-6 col-md-6 col-6">
                        <a href="{{ url('admin/members') }}">
                            <div class="p-2 text-center">
                                <i data-feather="users" class="fa fa-users icons-xl icon-dual-success"></i>
                                <h3><span data-plugin="counterup">{{ $total }}</span></h3>
                                <p class="text-muted font-15 mb-0">Total Members </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6 col-md-6 col-6">
                        <a href="{{ url('admin/members?is_paid=2') }}">
                            <div class="p-2 text-center">
                                <i data-feather="user-check" class="fa fa-user icons-xl icon-dual-success"></i>
                                <h3><span data-plugin="counterup">{{ $paid }}</span></h3>
                                <p class="text-muted font-15 mb-0">Paid Members</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6 col-md-6 col-6">
                        <a href="{{ url('admin/members?status=3') }}">
                            <div class="p-2 text-center">
                                <i data-feather="user-x" class="fas fa-user-slash icons-xl icon-dual-danger"></i>
                                <h3><span data-plugin="counterup">{{ $blocked }} </span></h3>
                                <p class="text-muted font-15 mb-0">Blocked Members</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6 col-md-6 col-6">
                        <a href="{{ url('admin/members?activated_at='.date('Y-m-d')) }}">
                            <div class="p-2 text-center">
                                <i data-feather="user-plus" class="fa fa-user icons-xl icon-dual-warning"></i>
                                <h3><span data-plugin="counterup">{{ $today_activate }}</span></h3>
                                <p class="text-muted font-15 mb-0">Today's Activation</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card-box bg-pink p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="dashboard-icon">
                                        <i class="fa fa-image"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <a href="{{ url('admin/kycs?status=1') }}">
                                        <div class="text-right">
                                            <h3 class="text-white my-1">
                                                <span data-plugin="counterup">{{ $kycs }}</span>
                                            </h3>
                                            <p class="text-white font-weight-bold mb-1 text-truncate">Pending KYCs</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card-box bg-blue p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="dashboard-icon">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <a href="{{ url('admin/orders?status=1') }}">
                                        <div class="text-right">
                                            <h3 class="text-white my-1">
                                                <span data-plugin="counterup">{{ $orders }}</span>
                                            </h3>
                                            <p class="text-white font-weight-bold mb-1 text-truncate">Pending Orders</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <div class="card-box text-nowrap">
                <h4 class="header-title mb-3">Last 5 Registration</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-centered m-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Sponsor Code</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($registered as $register)
                                
                           
                            <tr>
                                <td>
                                    <button class="btn btn-link p-0 font-weight-bold text-dark font-weight-normal"
                                            type="button">
                                        <i class="fe-calendar"></i> {{ $register->registerdate }}
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-link p-0 font-weight-bold text-dark font-weight-normal"
                                            type="button">
                                        <i class="fe-user"></i> {{ $register->fullname }}
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-link p-0 font-weight-bold" type="button"
                                            data-clipboard-text="{{ $register->member_id }}"
                                            data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom">
                                            {{ $register->member_id }}
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-link p-0 font-weight-bold text-danger" type="button"
                                            data-clipboard-text="{{ $register->tracking_id }}"
                                            data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom">
                                            {{ $register->tracking_id }}
                                    </button>
                                </td>
                            </tr>
                            @endforeach 
                                                </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-6">
            <div class="card-box text-nowrap">
                <h4 class="header-title mb-3">Last 5 Activation</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-centered m-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Sponsor Code</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($actives as $user)
                                
                           
                            <tr>
                                <td>
                                    <button class="btn btn-link p-0 font-weight-bold text-dark font-weight-normal"
                                            type="button">
                                        <i class="fe-calendar"></i> {{ $user->registerdate }}
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-link p-0 font-weight-bold text-dark font-weight-normal"
                                            type="button">
                                        <i class="fe-user"></i> {{ $user->fullname }}
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-link p-0 font-weight-bold" type="button"
                                            data-clipboard-text="{{ $user->member_id }}"
                                            data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom">
                                            {{ $user->member_id }}
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-link p-0 font-weight-bold text-danger" type="button"
                                            data-clipboard-text="{{ $user->tracking_id }}"
                                            data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom">
                                            {{ $user->tracking_id }}
                                    </button>
                                </td>
                            </tr>
                            @endforeach 
                                 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end table div-->
    <div class="row">
        <div class="col-lg-6">
            <div class="card-box" dir="ltr">
                <h4 class="header-title mb-3">Daily Income</h4>
                <canvas id="dailyIncomeChart" height="350vw" width="500vw"></canvas>
            </div> <!-- card-box -->
        </div> <!-- end row -->

        <div class="col-lg-6">
            <div class="card-box" dir="ltr">
                <h4 class="header-title mb-3">Daily Joining</h4>
                <canvas id="dailyJoining" height="350vw" width="500vw"></canvas>
            </div> <!-- end card-box-->
        </div> <!-- end col-->

        <div class="col-lg-6">
            <div class="card-box" dir="ltr">
                <h4 class="header-title mb-3">Monthly Joining</h4>
                <canvas id="monthlyJoining" height="350vw" width="500vw"></canvas>
            </div> <!-- end card-box-->
        </div> <!-- end col-->
        <div class="col-lg-6">
            <div class="card-box" dir="ltr">
                <h4 class="header-title mb-3">Best Seller Packages</h4>
                <canvas id="bestpack" height="350vw" width="500vw"></canvas>
            </div> <!-- end card-box-->
        </div> <!-- end col-->

    </div>
        
            </div>
        </div>
</div>
 
@endsection
@section('scripts')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"
            integrity="sha256-TQq84xX6vkwR0Qs1qH5ADkP+MvH0W+9E7TdHJsoIQiM=" crossorigin="anonymous"></script>
    <script>
        var ctx = document.getElementById('dailyIncomeChart');

        ctx.height = 350;

        var dailyTurnOverChart = new Chart(ctx, {
            responsive: true,
            type: 'line',
            data: {
                labels: [
                    @foreach($incomes as $key=>$income)
                    "{{ $key }}",
                    @endforeach
                    ],
                datasets: [{
                    label: 'Daily Turn Over',
                    data: [@foreach($incomes as $key=>$income)
                    "{{ $income }}",
                    @endforeach],
                    backgroundColor: 'rgba(255, 255, 255, 0)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Date'
                        },
                        ticks: {
                            major: {
                                fontStyle: 'bold',
                                fontColor: '#FF0000'
                            }
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            },
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Amount'
                        }
                    }]
                }
            }
        });

        var ctx = document.getElementById('dailyJoining');

        ctx.height = 350;

        var dailyTurnOverChart = new Chart(ctx, {
            responsive: true,
            type: 'bar',
            data: {
                labels: [ @foreach($users as $key=>$user)
                    "{{ $key }}",
                    @endforeach],
                datasets: [{
                    label: 'Daily Joining',
                    data: [@foreach($users as $key=>$user)
                    "{{ $user }}",
                    @endforeach],
                    backgroundColor: 'rgba(255, 255,132, 1)',
                    borderColor: 'rgba(255, 255,132, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Date'
                        },
                        ticks: {
                            major: {
                                fontStyle: 'bold',
                                fontColor: '#FF0000'
                            }
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            },
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Members'
                        }
                    }]
                }
            }
        });

        var ctx = document.getElementById('monthlyJoining');

        ctx.height = 350;

        var dailyTurnOverChart = new Chart(ctx, {
            responsive: true,
            type: 'bar',
            data: {
                labels: [ @foreach($musers as $key=>$user)
                    "{{ $key }}",
                    @endforeach],
                datasets: [{
                    label: 'Month Joining',
                    data: [@foreach($musers as $key=>$user)
                    "{{ $user }}",
                    @endforeach],
                    backgroundColor: 'rgba(255, 255,132, 1)',
                    borderColor: 'rgba(255, 255,132, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        },
                        ticks: {
                            major: {
                                fontStyle: 'bold',
                                fontColor: '#FF0000'
                            }
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            },
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Members'
                        }
                    }]
                }
            }
        });
        var ctx = document.getElementById('bestpack');

        ctx.height = 350;

        var dailyTurnOverChart = new Chart(ctx, {
            responsive: true,
            type: 'bar',
            data: {
                labels: [ @foreach($package as $key=>$pack)
                    "{{ $key }}",
                    @endforeach],
                datasets: [{
                    label: 'Best Pack Month',
                    data: [@foreach($package as $key=>$pack)
                    "{{ $pack }}",
                    @endforeach],
                    backgroundColor: 'rgba(255, 255,132, 1)',
                    borderColor: 'rgba(255, 255,132, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        },
                        ticks: {
                            major: {
                                fontStyle: 'bold',
                                fontColor: '#FF0000'
                            }
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            },
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Orders'
                        }
                    }]
                }
            }
        });
    </script>
@endsection