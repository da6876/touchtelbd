<!DOCTYPE html>
<html lang="en">

@include('layouts.header_files')
@section('title', 'Home')

<body class="adminbody">

<div id="main">

    <!-- top bar navigation -->
@include('layouts.header_bar')
<!-- End Navigation -->

    <!-- Left Sidebar -->
@include('layouts.left_main_sidebar')
<!-- End Sidebar -->


    <!-- content-page -->
    <div class="content-page">

        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Dashboard</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="alert alert-success" role="alert">
                    <h5 class="alert-heading">WELCOME!</h5>
                    <p><h3>
                            @if(Session::get('user_name')!="")
                                {{Session::get('user_name')}}
                            @endif
                        </h3></p>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-default">
                            <i class="fa fa-file-text-o float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Orders</h6>
                            <h1 class="m-b-20 text-white counter">1,587</h1>
                            <span class="text-white">15 New Orders</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-warning">
                            <i class="fa fa-bar-chart float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Visitors</h6>
                            <h1 class="m-b-20 text-white counter">250</h1>
                            <span class="text-white">Bounce rate: 25%</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-info">
                            <i class="fa fa-user-o float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Users</h6>
                            <h1 class="m-b-20 text-white counter">120</h1>
                            <span class="text-white">25 New Users</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-danger">
                            <i class="fa fa-bell-o float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Alerts</h6>
                            <h1 class="m-b-20 text-white counter">58</h1>
                            <span class="text-white">5 New Alerts</span>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3><i class="fa fa-users"></i> Last Selling Info</h3>
                            </div>

                            <div class="card-body">

                                <table id="LastSellInfo"
                                       class="table">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Product</th>
                                        <th>Sell By</th>
                                        <th>Invoice</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                            </div>
                        </div><!-- end card-->
                    </div>


                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-star-o"></i> Tasks progress</h3>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>

                            <div class="card-body">
                                <p class="font-600 m-b-5">Task 1 <span class="text-primary pull-right"><b>95%</b></span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-xs bg-primary"
                                         role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0"
                                         aria-valuemax="95"></div>
                                </div>

                                <div class="m-b-20"></div>

                                <p class="font-600 m-b-5">Task 2 <span class="text-primary pull-right"><b>88%</b></span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-xs bg-primary"
                                         role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0"
                                         aria-valuemax="88"></div>
                                </div>


                            </div>
                            <div class="card-footer small text-muted">Updated today at 11:59 PM</div>
                        </div><!-- end card-->
                    </div>


                </div>


            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->


    <!-- Footer bar-page -->
@include('layouts.footer_bar')
<!-- END Footer bar-page -->


</div>
<!-- END main -->


<!-- END Java Script for this page -->
@include('layouts.footer_files')

<script>
    var table1 = $('#LastSellInfo').DataTable({
        "processing": true,
        "serverSide": true,
        searching: false,
        ajax: '{!! route('all.LastSellInfo') !!}',
        columns: [
            {data: 'customer_name', name: 'customer_name'},
            {data: 'product_name', name: 'product_name'},
            {data: 'user_name', name: 'user_name'},
            {data: 'invoice_no', name: 'invoice_no'}
        ]
    });

</script>
</body>
</html>
