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
                                <span class="pull-right">
                                    <button class="btn btn-primary btn-sm" onclick="printDiv('printMe')">
                                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i> Print Cash Memo</button>
                                </span>
                                <h3><i class="fa fa-users"></i> Invoice No : {{$invoice_no}}</h3>
                            </div>

                            <div class="card-body">
                                <div class="container bootdey" id='printMe'>
                                    <div class="row invoice row-printable">
                                        <div class="col-md-12">
                                            <!-- col-lg-12 start here -->
                                            <div class="panel panel-default plain" id="dash_0">
                                                <!-- Start .panel -->
                                                <div class="panel-body p30">

                                                    <table width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <img width="100"
                                                                     src="{{asset('public/assets/img/touchtel.png')}}"
                                                                     alt="Invoice logo">
                                                            </td>
                                                            <td colspan="2">
                                                                <div class="invoice-from">
                                                                    <ul class="list-unstyled text-center">
                                                                        <li><h3>SAMSUNG Authorised Outlet</h3></li>
                                                                        <li>Touchtelbd Shop</li>
                                                                        <li>2500 Ridgepoint Dr, Suite 105-C</li>
                                                                        <li>Mobile No: 520000000</li>
                                                                        <li>Email : touchtelbd@gmail.com</li>
                                                                        <li>Bin : 265105150000</li>
                                                                        <li><h2>CASH MEMO</h2></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                            <td style="width: 100px;">
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <br>
                                                            <div class="row">

                                                            </div>
                                                            <div class="invoice-items">
                                                                <div class="table-responsive"
                                                                     style="overflow: hidden; outline: none;"
                                                                     tabindex="0">
                                                                    <table class="table table-bordered">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <div class="row">
                                                                                    <div class="col-md-9">
                                                                                        <ul class="list-unstyled" style="text-align: justify;">
                                                                                            <li><strong>Invoice </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;#{{$invoice_no}}</li>
                                                                                            <li><strong>Invoice Date</strong> &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{$create_Date}}</li>
                                                                                            <li><strong>Invoice By</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{$create_by}}</li>
                                                                                            <li><strong>Status</strong><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{$product_order_status}}</span>
                                                                                            <li><strong>Pay Type</strong><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{$payment_type}}</span>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <ul class="list-unstyled">
                                                                                            <li><strong>Invoiced To</strong></li>
                                                                                            <li><strong>Name</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$customer_name}} </li>
                                                                                            <li><strong>Phone</strong>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$customer_phone}} </li>
                                                                                            <li><strong>Email</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$customer_email}}</li>
                                                                                            <li><strong>Address</strong>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$customer_address}}</li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            {{--
                                                                                                                                                        <th class="per5 text-center">SL</th>
                                                                            --}}
                                                                            <th class="per70 text-center">Description
                                                                            </th>
                                                                            <th class="per5 text-center">Sold Qty</th>
                                                                            <th class="per10 text-center">Unit Price
                                                                            </th>
                                                                            <th class="per10 text-center">Amount</th>
                                                                        </tr>
                                                                        <?php
                                                                        $sub_total= 0;
                                                                        $size = count($product_id);
                                                                        for ($x = 0; $x < $size; $x++) { ?>

                                                                        <tr>
                                                                            {{--
                                                                                                                                                        <td>{{$x}}</td>
                                                                            --}}
                                                                            <td>
                                                                                Name : {{$product_name[$x]}}<br>
                                                                                IMEI : {{$product_imei[$x]}}<br>
                                                                                Color : {{$color[$x]}}<br>
                                                                            </td>
                                                                            <td class="text-center">1</td>
                                                                            @php
                                                                            $sub_total= $sub_total+ $sell_price[$x];
                                                                            @endphp
                                                                            <td class="text-center">{{$sell_price[$x]}}
                                                                                TK
                                                                            </td>
                                                                            <td class="text-center">{{$sell_price[$x]}}
                                                                                TK
                                                                            </td>
                                                                        </tr>
                                                                        <?php } ?>

                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr>
                                                                            <th colspan="3" class="text-right">Sub Amount : </th>

                                                                            <th class="text-center">{{ $sub_total}} TK</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan="3" class="text-right">Add
                                                                                Installation /Service Charges:
                                                                            </th>
                                                                            <th class="text-center">{{($service_price != 0) ? $service_price : '0.0'}} TK</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan="3" class="text-right">
                                                                                Discount Amount:
                                                                            </th>
                                                                            <th class="text-center">{{($discount_price != 0) ? $discount_price : '0.0'}} TK</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan="3" class="text-right">Dew Amount : </th>
                                                                            <th class="text-center">{{($deu_amount != 0) ? $deu_amount : '0.0'}} TK</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan="3" class="text-right">Net Payable Amount:
                                                                            </th>
                                                                            <th class="text-center">{{ ($grand_total != 0) ? $grand_total : '0.0'}}</th>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="invoice-from">
                                                                <ul class="list-unstyled text-center">
                                                                    <li class="text-center">After Sales Service Will be
                                                                        Provided By SAMSUNG Service Center
                                                                    </li>
                                                                    <li class="text-center">No Exchange No Return,
                                                                        Thanks For Shopping
                                                                    </li>
                                                                    <li class="text-center"><b>Help Line :-
                                                                            09612-300-300, 08000-300-300 (toll free)</b>
                                                                    </li>
                                                                    <li class="text-center">Generated
                                                                        on {{$create_Date}} </li>
                                                                </ul>
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
