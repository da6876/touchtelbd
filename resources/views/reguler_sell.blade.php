<!DOCTYPE html>
<html lang="en">

@include('layouts.header_files')
@section('title', 'Home')
<style type="text/css">
    .box {
        width: 600px;
        margin: 0 auto;
    }
</style>
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


                <div class="row">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3><i class="fa fa-users"></i> Order Process</h3>
                            </div>

                            <div class="card-body">

                                <hr>
                                <table class="table" id="ProductsdataTabel">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                            </div>
                        </div><!-- end card-->
                    </div>


                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-star-o"></i> Order progress</h3>
                            </div>

                            <div class="card-body">
                                <div class="text-center">
                                    <h4>Scan QR Code</h4>
                                    <div id="last-barcode"></div>
                                    <p>OR</p>
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <input class="form-control" id="product_barcode" name="bar_code"
                                                       type="text" placeholder="Enter QR or Product Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <button class="btn btn-outline-info" onclick="checkBarCode()"> Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Customer : </label>
                                            <input class="form-control" placeholder="Customer Name" id="customer_name"
                                                   type="text">
                                            <div id="countryList">
                                            </div>
                                        </div>

                                        {{ csrf_field() }}
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Moblie NO : </label>
                                            <input class="form-control" placeholder="Moblie NO" id="mobile_no"
                                                   type="text" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Customer Address : </label>
                                            <input class="form-control" placeholder="Customer Address"
                                                   id="customer_address" type="text" readonly>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <form id="orderConfirm" action="#" method="post"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" id="customer_id" name="customer_id">

                                    <table class="table table-bordered" id="productStock">
                                        <thead>
                                        <tr>
                                            <th class="col-md-5">Name</th>
                                            <th class="col-md-3">Price</th>
                                            <th class="col-md-1">Quantity</th>
                                            <th class="col-md-3">Sub Total</th>
                                            <th>SAA</th>
                                        </tr>
                                        </thead>
                                        <tr class="noItemHere">
                                            <th colspan="5" class="text-center">No Item Added Here !!</th>
                                        </tr>
                                        <tfoot>
                                        <tr>

                                            <td class="col-md-6" colspan="3"><b>Grand Total</b></td>
                                            <td class="col-md-2" colspan="2">
                                                <input class="form-control" name="GrandTotal" id="GrandTotal" type="text" readonly>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="col-md-6" colspan="3"><b>Receive Amount </b></td>
                                            <td class="col-md-2" colspan="2">
                                                <input class="form-control AmountReceive" name="ReceiveAmount" id="ReceiveAmount"
                                                       type="number">
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="col-md-6" colspan="3"><b>Deu Amount </b></td>
                                            <td class="col-md-2" colspan="2">
                                                <input class="form-control" name="DeuAmount" id="DeuAmount" type="number" readonly>
                                            </td>
                                        </tr>

                                        </tfoot>
                                    </table>

                                    <button type="button" onclick="confrimOrder()"
                                            class="btn btn-info col-md-3 pull-right">
                                        Confirm Order
                                    </button>
                                </form>

                            </div>
                            <div class="card-footer small text-muted"></div>
                        </div><!-- end card-->
                    </div>


                </div>


            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->

    <div class="modal fade bd-example-modal-lg categoriesAdd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Add Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addNewCategories" action="#" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <input class="form-control" id="customer_name" name="customer_name" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Customer Phone</label>
                                        <input class="form-control" id="customer_phone" name="customer_phone"
                                               type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Customer Email</label>
                                        <input class="form-control" id="customer_email" name="customer_email"
                                               type="text">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Customer Photo</label>
                                        <input class="form-control" name="customer_photo" type="file">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Customer Address</label>
                                        <input class="form-control" id="customer_address" name="customer_address"
                                               type="text">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Categories Status</label>
                                        <select id="customer_status" name="customer_status" class="form-control">
                                            <option value="S">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="InActive">InActive</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" onclick="addcategoriesData()" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer bar-page -->
@include('layouts.footer_bar')
<!-- END Footer bar-page -->


</div>
<!-- END main -->


<!-- END Java Script for this page -->
@include('layouts.footer_files')
<script>
    var barcode = '';
    var interval;
    document.addEventListener('keydown', function (evt) {
        if (interval)
            clearInterval(interval);
        if (evt.code == 'Enter') {
            if (barcode)
                handleBarcode(barcode);
            barcode = '';
            return;
        }
        if (evt.key != 'Shift')
            barcode += evt.key;
        interval = setInterval(() => barcode = '', 20);
    });

    function handleBarcode(scanned_barcode) {
        document.querySelector('#last-barcode').innerHTML = scanned_barcode;
        searchOrderDetails(scanned_barcode);
    }
</script>

<script>

    var ii = 0;

    function checkBarCode() {

        var product_barcode = $("#product_barcode").val();
        searchOrderDetails(product_barcode);
    }

    function searchOrderDetails(product_barcode) {

        ii++;
        var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
        url = "{{ url('ShowProductByBarCode') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {'ViewType': 'BarCode', 'code': product_barcode, "_token": csrf_tokens},
            datatype: 'JSON',
            success: function (data) {
                console.log(data);
                if (data!='[]') {
                    var resultData = $.parseJSON(data);
                    var bodyData = '';

                    for (var x = 0; x < resultData.length; x++) {
                        bodyData += "<tr id='row" + ii + "' class='dynamic-added'>"
                        bodyData += "<td>" +
                            " Name : " + resultData[x].product_name + "<br>" +
                            " IME : " + resultData[x].product_ime + "<br>" +
                            " Color : " + resultData[x].color + "" +
                            "</td>" +
                            "<td> " +
                            "<input type='hidden' name='product_id[]' id='product_id_" + ii + "'  class='form-control product_id' value='" + resultData[x].product_stock_id + "' for='" + ii + "'/> " +
                            "<input type='number' name='product_price[]' id='product_price_" + ii + "'  class='form-control product_price' value='" + resultData[x].sell_price + "' for='" + ii + "' readonly/> " +
                            "</td>" +
                            "<td> <input type='number' min='0' name='quantity[]' id='quantity_" + ii + "'  class='form-control quantity' value='0'  for='" + ii + "'/> </td>" +
                            "<td> <input type='number' name='total_cost[]' id='total_cost_" + ii + "'  class='form-control total_cost' value='0.0'  for='" + ii + "' readonly/> </td>" +
                            "<td> <button type='button' name='remove' id='" + ii + "' class='btn btn-danger btn_remove'><i class='fa fa-trash-o' aria-hidden='true'></i></button> </td>";
                        bodyData += "</tr>";

                    }
                    if (resultData.length != 0) {
                        $('.noItemHere').hide();
                        $("#productStock").append(bodyData);
                    }
                }else {
                    swal({
                        title: "Oops!! Sorry ",
                        text: "No Product Found !!",
                        timer: '2500'
                    });
                }


            },
            error: function (data) {
                console.log(data);
                swal({
                    title: "Oops",
                    text: "Some Thing Is .... !!",
                    icon: "error",
                    timer: '1500'
                });
            }
        });

    }

    $(document).ready(function () {

        $('#customer_name').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('autocomplete.fetch') }}",
                    method: "POST",
                    data: {query: query, _token: _token},
                    success: function (data) {
                        $('#countryList').fadeIn();
                        $('#countryList').html(data);
                    }
                });
            }
        });
    });

</script>

<script>
    var grandTotal = 0.0;
    var table1 = $('#ProductsdataTabel').DataTable({
        "processing": true,
        "serverSide": true,
        searching: false,
        ajax: '{!! route('all.ProductList') !!}',
        columns: [
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action'}
        ]
    });

    setInterval(function () {
        table1.ajax.reload();
    }, 60000);

    function setData(id, name, phn, addres) {
        $('#customer_name').val(name);
        $('#customer_names').val(name);
        $('#mobile_no').val(phn);
        $('#customer_address').val(addres);
        $('#customer_id').val(id);
        $('#countryList').fadeOut();


    }

    var i = 0;

    function showProductData(id, name, price, ime, color) {
        $('.noItemHere').hide();
        $('#productStock').append('' +
            '' +
            '<tr id="row' + i + '" class="dynamic-added">' +
            '<td>' +
            '<label>' + name + '<br> IME : ' + ime + '<br>Color : ' + color + '</label>' +
            '</td>' +
            '<td>' +
            '<input name="product_price[]" id="product_price_' + i + '"  class="form-control product_price" value="' + price + '" for="' + i + '" readonly/>' +
            '</td>' +
            '<td>' +
            '<input name="qnty[]" id="quantity_' + i + '" type="number" class="form-control quantity" value="0" for="' + i + '"/>' +
            '</td>' +
            '<td>' +
            '<input name="total_cost[]" id="total_cost_' + i + '"  class="form-control total_cost" value="0.0" for="' + i + '" readonly/>' +
            '</td>' +
            '<td>' +
            '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>' +
            '</td>' +
            '</tr>' +
            '');
        i++;
    }

    $(document).on('click', '.btn_remove', function () {
        alert($(this).attr("id"));
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
        calculateSubTotal();
    });

    $("#productStock").on('input', 'input.quantity', function () {
        getTotalCost($(this).attr("for"));
    });

    $("#productStock").on('input', 'input.AmountReceive', function () {
        var TotalPrice = $('#GrandTotal').val();
        var GivenMoney = $('#ReceiveAmount').val();
        if (TotalPrice != "" && GivenMoney != "") {
            var DueAmount = TotalPrice - GivenMoney;
            $('#DeuAmount').val(DueAmount.toFixed(2));
        } else {
            swal({
                title: "Oops",
                text: "Please Add A Product And Enter The Given Money",
                timer: '2500'
            });
            $('#ReceiveAmount').val('0.0')
        }
    });

    // Using a new index rather than your global variable i
    function getTotalCost(ind) {
        var qty = $('#quantity_' + ind).val();
        var price = $('#product_price_' + ind).val();
        var totNumber = (qty * price);
        var tot = totNumber.toFixed(2);
        $('#total_cost_' + ind).val(tot);
        calculateSubTotal();
    }

    function calculateSubTotal() {
        var subtotal = 0;
        $('.total_cost').each(function () {
            subtotal += parseFloat($(this).val());
        });
        $('#GrandTotal').val(subtotal.toFixed(2));
    }

    var postURL = "<?php echo url('PlaceOrder'); ?>";

    function confrimOrder() {
        var customer_name = $('#customer_name').val();
        var customer_id = $('#customer_id').val();
        var ReceiveAmount = $('#ReceiveAmount').val();
        if (customer_id != "" && customer_name != "") {
            if (ReceiveAmount != "") {
                $.ajax({
                    url:postURL,
                    method:"POST",
                    data:$('#orderConfirm').serialize(),
                    type:'json',
                    success:function(data)
                    {
                        console.log(data);
                        var dataResult = JSON.parse(data);
                        if (dataResult.statusCode == 200) {

                            $('.dynamic-added').remove();
                            $('#orderConfirm')[0].reset();
                            swal("Success", dataResult.statusMsg);

                            document.getElementById('invice_no').value = makeid();
                        }else  {
                            swal({
                                title: "Oops",
                                text: "Bulk Data Insert Failed",
                                icon: "error",
                                timer: '1500'
                            });
                        }
                    }
                });
            } else {
                swal({
                    title: "Oops",
                    text: "Please Enter The Receive Amount !!",
                    timer: '2500'
                });
            }
        } else {
            swal({
                title: "Oops",
                text: "Please Select A Customer",
                timer: '2500'
            });
        }
    }

    function clearfrom() {
        $('.categoriesAdd form')[0].reset();
        $('.categoriesAdd').modal('show');
    }

    function addcategoriesData() {
        url = "{{ url('CustomerInfo') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData($(".categoriesAdd form")[0]),
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var dataResult = JSON.parse(data);
                if (dataResult.statusCode == 200) {
                    $('.categoriesAdd').modal('hide');
                    $('#Categories-dataTabel').DataTable().ajax.reload();
                    swal("Success", dataResult.statusMsg);
                    $('.categoriesAdd form')[0].reset();
                } else if (dataResult.statusCode == 201) {
                    swal({
                        title: "Oops",
                        text: dataResult.statusMsg,
                        icon: "error",
                        timer: '1500'
                    });
                }
            }, error: function (data) {
                swal({
                    title: "Oops",
                    text: "Error occured",
                    icon: "error",
                    timer: '1500'
                });
            }
        });
        return false;


    };

</script>
</body>
</html>
