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
                                <li class="breadcrumb-item active">Cash Memo</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3><i class="fa fa-users"></i> Cash Memo Process</h3>
                            </div>

                            <div class="card-body">
                                <div class="page-header text-blue-d2">
                                    <h4 class="page-title text-secondary-d1">
                                        Invoice No : {{$invoice_no}}
                                    </h4>
                                    <div class="page-tools">
                                        <div class="action-buttons">
                                            <a onclick="printDiv('printMe')"
                                               class="btn bg-white btn-light mx-1px text-95" href="#"
                                               data-title="Print">
                                                <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                                                Print
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="container bootdey"  id='printMe'>
                                        <div class="row invoice row-printable">
                                            <div class="col-md-12">
                                                <!-- col-lg-12 start here -->
                                                <div class="panel panel-default plain" id="dash_0">
                                                    <!-- Start .panel -->
                                                    <div class="panel-body p30">
                                                        <div class="row">
                                                            <!-- Start .row -->
                                                            <div class="col-lg-2">
                                                                <!-- col-lg-6 start here -->
                                                                <div class="invoice-logo"><img width="100" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Invoice logo"></div>
                                                            </div>
                                                            <!-- col-lg-6 end here -->
                                                            <div class="col-lg-8">
                                                                <!-- col-lg-6 start here -->
                                                                <div class="invoice-from">
                                                                    <ul class="list-unstyled text-center">
                                                                        <li>Dash LLC</li>
                                                                        <li>2500 Ridgepoint Dr, Suite 105-C</li>
                                                                        <li>Austin TX 78754</li>
                                                                        <li>VAT Number EU826113958</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <!-- col-lg-6 start here -->
                                                            </div>
                                                            <!-- col-lg-6 end here -->
                                                            <div class="col-md-12">
<br>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                            <ul class="list-unstyled">
                                                                                <li><strong>Invoice</strong> #{{$invoice_no}}</li>
                                                                                <li><strong>Invoice Date:</strong> {{$create_Date}}</li>
                                                                                <li><strong>Invoice By:</strong> {{$create_by}}</li>
                                                                                <li><strong>Status:</strong> <span class="label label-danger">UNPAID</span></li>
                                                                            </ul>
                                                                    </div>
                                                                    <div class="col-md-6 text-right">
                                                                        <ul class="list-unstyled">
                                                                            <li><strong>Invoiced To</strong></li>
                                                                            <li><strong>Name    : </strong>{{$customer_name}}</li>
                                                                            <li><strong>Phone   : </strong>{{$customer_phone}}</li>
                                                                            <li><strong>Email   : </strong>{{$customer_email}}</li>
                                                                            <li><strong>Address : </strong>{{$customer_address}}</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                                <div class="invoice-items">
                                                                    <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                            <tr>
                                                                                <th class="per70 text-center">Description</th>
                                                                                <th class="per5 text-center">Qty</th>
                                                                                <th class="per25 text-center">Total</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td>1024MB Cloud 2.0 Server - elisium.dynamic.com (12/04/2014 - 01/03/2015)</td>
                                                                                <td class="text-center">1</td>
                                                                                <td class="text-center">$25.00 USD</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Logo design</td>
                                                                                <td class="text-center">1</td>
                                                                                <td class="text-center">$200.00 USD</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Backup - 1024MB Cloud 2.0 Server - elisium.dynamic.com</td>
                                                                                <td class="text-center">12</td>
                                                                                <td class="text-center">$12.00 USD</td>
                                                                            </tr>
                                                                            </tbody>
                                                                            <tfoot>
                                                                            <tr>
                                                                                <th colspan="2" class="text-right">Sub Total:</th>
                                                                                <th class="text-center">$237.00 USD</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th colspan="2" class="text-right">20% VAT:</th>
                                                                                <th class="text-center">$47.40 USD</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th colspan="2" class="text-right">Credit:</th>
                                                                                <th class="text-center">$00.00 USD</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th colspan="2" class="text-right">Total:</th>
                                                                                <th class="text-center">$284.4.40 USD</th>
                                                                            </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                                <div class="">
                                                                    <p class="text-center">After Sales Service Will be Provided By SAMSUNG Service Center</p>
                                                                    <p class="text-center">No Exchange No Return, Thanks For Shopping</p>
                                                                    <p class="text-center"><b>Help Line :- 09612-300-300, 08000-300-300 (toll free)</b></p>
                                                                    <p class="text-center">Generated on {{$create_Date}} </p>
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
