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
                    </div>
                </div>
                <!-- end row -->

                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <span class="pull-right">
                                    <button class="btn btn-primary btn-sm" onclick="printDiv('printMe')">
                                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i> Print</button>
                                </span>
                                <h3><i class="fa fa-users"></i> Stock Details Info</h3>
                            </div>

                            <div class="card-body">
                                <div class="container bootdey" id='printMe'>
                                    <div class="row invoice row-printable">
                                        <div class="col-md-12">
                                            <!-- col-lg-12 start here -->
                                            <div class="panel panel-default plain" id="dash_0">
                                                <!-- Start .panel -->
                                                <div class="panel-body p30">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <br>
                                                            <div class="row">

                                                            </div>
                                                            <div class="invoice-items">
                                                                <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                                                    <table width="100%">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <img width="100"
                                                                                     src="{{asset('public/assets/img/touchtel.png')}}"
                                                                                     alt="Invoice logo">
                                                                            </td>
                                                                            <td colspan="6">
                                                                                <div class="invoice-from">
                                                                                    <ul class="list-unstyled text-center">
                                                                                        <li><h4>SAMSUNG Authorised Outlet</h4></li>
                                                                                        <li>Touchtelbd Shop</li>
                                                                                        <li>2500 Ridgepoint Dr, Suite 105-C</li>
                                                                                        <li>Mobile No: 520000000</li>
                                                                                        <li>Email : touchtelbd@gmail.com</li>
                                                                                        <li>Bin : 265105150000</li>
                                                                                        <li><h3>Stock Details Info</h3></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </td>
                                                                            <td style="width: 100px;">
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table class="table table-bordered">
                                                                        <tbody>
                                                                        <tr>
                                                                            <th class="text-center">ID</th>
                                                                            <th class="text-center">Product Name</th>
                                                                            <th class="text-center">Color</th>
                                                                            <th class="text-center">Unit Price No</th>
                                                                            <th class="text-center">Sell Price</th>
                                                                            <th class="text-center">BR Code</th>
                                                                            <th class="text-center">IMEI</th>
                                                                            <th class="text-center">Available Status</th>
                                                                            <th class="text-center">Create By</th>
                                                                        </tr>
                                                                        <?php
                                                                        $size = count($stockDetails);
                                                                        for ($x = 0; $x < $size; $x++) { ?>

                                                                        <tr>
                                                                            <td>{{$x}}</td>
                                                                            <td>{{$stockDetails[$x]->product_name}}</td>
                                                                            <td>{{$stockDetails[$x]->color}}</td>
                                                                            <td>{{$stockDetails[$x]->unit_price}}</td>
                                                                            <td>{{$stockDetails[$x]->sell_price}}</td>
                                                                            <td>{{$stockDetails[$x]->product_brcode}}</td>
                                                                            <td>{{$stockDetails[$x]->product_imei}}</td>
                                                                            <td class="text-center">{{$stockDetails[$x]->sell_status}}</td>
                                                                            <td>{{$stockDetails[$x]->user_name}}</td>
                                                                        </tr>
                                                                        <?php  }  ?>

                                                                        </tbody>

                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col-lg-12 end here -->
                                                    </div>
                                                    <!-- End .row -->
                                                </div>
                                            </div>
                                            <!-- End .panel -->
                                        </div>
                                        <!-- col-lg-12 end here -->
                                    </div>
                                </div>


                            </div>
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
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

    }
</script>
</body>
</html>
