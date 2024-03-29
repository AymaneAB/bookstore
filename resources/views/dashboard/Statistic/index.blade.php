@extends('layouts.admin.base')

@section('content')




<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('dash/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('dash/img/favicon.png')}}">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="{{ asset ('dash/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset ('dash/css/nucleo-svg.css')}}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('dash/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />

    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>


</head>

<body class="g-sidenav-show  bg-gray-100">


<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-7 position-relative z-index-2">
            <div class="card card-plain mb-4">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <h2 class="font-weight-bolder mb-0">General Statistics</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-5 col-sm-5">
            <div class="card  mb-2">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Bookings</p>
                        <h4 class="mb-0">281</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                </div>
            </div>
            <div class="card  mb-2">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">leaderboard</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                        <h4 class="mb-0">2,300</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-sm-5 mt-sm-0 mt-4">
            <div class="card  mb-2">
                <div class="card-header p-3 pt-2 bg-transparent">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">store</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize ">Revenue</p>
                        <h4 class="mb-0 ">34k</h4>
                    </div>
                </div>
                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                    <p class="mb-0 "><span class="text-success text-sm font-weight-bolder">+1% </span>than yesterday</p>
                </div>
            </div>
            <div class="card ">
                <div class="card-header p-3 pt-2 bg-transparent">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">person_add</i>
                </div>
                <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize ">Followers</p>
                <h4 class="mb-0 ">+91</h4>
                </div>
            </div>
            <hr class="horizontal my-0 dark">
            <div class="card-footer p-3">
                <p class="mb-0 ">Just updated</p>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-10">
            <div class="card mb-4 ">
                <div class="d-flex">
                    <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-xl mt-n3 ms-4">
                        <i class="material-icons opacity-10" aria-hidden="true">language</i>
                    </div>
                    <h6 class="mt-3 mb-2 ms-3 ">Sales by Country</h6>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-7">
                            <div class="table-responsive">
                                <table class="table align-items-center ">
                                    <tbody>
                                        <tr>
                                            <td class="w-30">
                                                <div class="d-flex px-2 py-1 align-items-center">
                                                    <div>
                                                        <img src="{{asset('dash/img/icons/flags/US.png')}}" alt="Country flag">
                                                    </div>
                                                    <div class="ms-4">
                                                        <p class="text-xs font-weight-bold mb-0 ">Country:</p>
                                                        <h6 class="text-sm font-weight-normal mb-0 ">United States</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0 ">Sales:</p>
                                                    <h6 class="text-sm font-weight-normal mb-0 ">2500</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0 ">Value:</p>
                                                    <h6 class="text-sm font-weight-normal mb-0 ">$230,900</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <div class="col text-center">
                                                    <p class="text-xs font-weight-bold mb-0 ">Bounce:</p>
                                                    <h6 class="text-sm font-weight-normal mb-0 ">29.9%</h6>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w-30">
                                                <div class="d-flex px-2 py-1 align-items-center">
                                                    <div>
                                                        <img src="{{asset('dash/img/icons/flags/DE.png')}}" alt="Country flag">
                                                    </div>
                                                    <div class="ms-4">
                                                        <p class="text-xs font-weight-bold mb-0 ">Country:</p>
                                                        <h6 class="text-sm font-weight-normal mb-0 ">Germany</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0 ">Sales:</p>
                                                    <h6 class="text-sm font-weight-normal mb-0 ">3.900</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0 ">Value:</p>
                                                    <h6 class="text-sm font-weight-normal mb-0 ">$440,000</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <div class="col text-center">
                                                    <p class="text-xs font-weight-bold mb-0 ">Bounce:</p>
                                                    <h6 class="text-sm font-weight-normal mb-0 ">40.22%</h6>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-30">
                                                <div class="d-flex px-2 py-1 align-items-center">
                                                    <div>
                                                        <img src="{{asset('dash/img/icons/flags/GB.png')}}" alt="Country flag">
                                                    </div>
                                                    <div class="ms-4">
                                                        <p class="text-xs font-weight-bold mb-0 ">Country:</p>
                                                        <h6 class="text-sm font-weight-normal mb-0 ">Great Britain</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0 ">Sales:</p>
                                                    <h6 class="text-sm font-weight-normal mb-0 ">1.400</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0 ">Value:</p>
                                                    <h6 class="text-sm font-weight-normal mb-0 ">$190,700</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <div class="col text-center">
                                                    <p class="text-xs font-weight-bold mb-0 ">Bounce:</p>
                                                    <h6 class="text-sm font-weight-normal mb-0 ">23.44%</h6>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-30">
                                                <div class="d-flex px-2 py-1 align-items-center">
                                                    <div>
                                                        <img src="{{asset('dash/img/icons/flags/BR.png')}}" alt="Country flag">
                                                    </div>
                                                    <div class="ms-4">
                                                        <p class="text-xs font-weight-bold mb-0 ">Country:</p>
                                                        <h6 class="text-sm font-weight-normal mb-0 ">Brasil</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0 ">Sales:</p>
                                                    <h6 class="text-sm font-weight-normal mb-0 ">562</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0 ">Value:</p>
                                                        <h6 class="text-sm font-weight-normal mb-0 ">$143,960</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <div class="col text-center">
                                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:</p>
                                                        <h6 class="text-sm font-weight-normal mb-0 ">32.14%</h6>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div id="map" class="mt-0 mt-lg-n4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="row mt-4">
        <div class="col-lg-5 mb-lg-0 mb-4">
            <div class="card z-index-2 mt-4">
        <div class="card-body mt-n5 px-3">
            <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1 mb-3">
            <div class="chart">
                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
            </div>
            </div>
            <h6 class="ms-2 mt-4 mb-0"> Active Users </h6>
            <p class="text-sm ms-2"> (<span class="font-weight-bolder">+11%</span>) than last week </p>
            <div class="container border-radius-lg">
            <div class="row">
                <div class="col-3 py-3 ps-0">
                <div class="d-flex mb-2">
                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">groups</i>
                    </div>
                    <p class="text-xs my-auto font-weight-bold">Users</p>
                </div>
                <h4 class="font-weight-bolder">42K</h4>
                <div class="progress w-75">
                    <div class="progress-bar bg-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>
                <div class="col-3 py-3 ps-0">
                <div class="d-flex mb-2">
                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-info text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">ads_click</i>
                    </div>
                    <p class="text-xs mt-1 mb-0 font-weight-bold">Clicks</p>
                </div>
                <h4 class="font-weight-bolder">1.7m</h4>
                <div class="progress w-75">
                    <div class="progress-bar bg-dark w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>
                <div class="col-3 py-3 ps-0">
                <div class="d-flex mb-2">
                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-warning text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">receipt</i>
                    </div>
                    <p class="text-xs mt-1 mb-0 font-weight-bold">Sales</p>
                </div>
                <h4 class="font-weight-bolder">399$</h4>
                <div class="progress w-75">
                    <div class="progress-bar bg-dark w-30" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>
                <div class="col-3 py-3 ps-0">
                <div class="d-flex mb-2">
                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-danger text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">category</i>
                    </div>
                    <p class="text-xs mt-1 mb-0 font-weight-bold">Items</p>
                </div>
                <h4 class="font-weight-bolder">74</h4>
                <div class="progress w-75">
                    <div class="progress-bar bg-dark w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        </div>
        <div class="col-lg-7">
            <div class="card z-index-2">
        <div class="card-header pb-0">
            <h6>Sales overview</h6>
            <p class="text-sm">
            <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">4% more</span> in 2024
            </p>
        </div>
        <div class="card-body p-3">
            <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
            </div>
        </div>
        </div>

        </div>
        </div>

        <div class="row">
        <div class="col-12">
            <div id="globe" class="position-absolute end-0 top-10 mt-sm-3 mt-7 me-lg-7">
            <canvas width="700" height="600" class="w-lg-100 h-lg-100 w-75 h-75 me-lg-0 me-n10 mt-lg-5"></canvas>
            </div>
        </div>
        </div>
                    </div>

                
            </main>
                    <!-- Sidebar Backgrounds -->
                    <div>
                        <h6 class="mb-0">Sidebar Colors</h6>
                    </div>
                        <a href="javascript:void(0)" class="switch-trigger background-color">
                            <div class="badge-colors my-2 text-start">
                                <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                                <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                                <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                                <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                                <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                                <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="{{ asset ('dash/js/core/popper.min.js')}}" ></script>
        <script src="{{ asset ('dash/js/core/bootstrap.min.js')}}" ></script>
        <script src="{{ asset ('dash/js/plugins/perfect-scrollbar.min.js')}}" ></script>
        <script src="{{ asset ('dash/js/plugins/smooth-scrollbar.min.js')}}" ></script>

        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>

        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>

        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset ('dash/js/material-dashboard.min.js?v=3.1.0')}}"></script>
    </body>

</html>

@endsection