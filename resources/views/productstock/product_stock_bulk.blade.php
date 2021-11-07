<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header_files')

    <style>

    </style>


</head>

<body class="adminbody">

<div id="main">

    <!-- top bar navigation -->
@include('layouts.header_bar')
<!-- End Navigation -->


    <!-- Left Sidebar -->
@include('layouts.left_main_sidebar')
<!-- End Sidebar -->


    @php
        $all_Product1 = DB::table('product_info')
            ->where('product_status', 'Active')
            ->get();
    @endphp
    <div class="content-page">

        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">


                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Bulk Add Stock</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Bulk Add Stock</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-table"></i> Add Stock Info</h3>

                                </span>
                            </div>
                            <div class="card-body" id="stockAddDataDtl">
                                <form id="stockAddMstData" action="#" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <input type="hidden" name="primaraynumber" id="primaraynumber">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Invoice No</label>
                                                <input class="form-control" id="invice_no" name="invice_no" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Products</label>
                                                <select name="product_id" id="product_id" class="form-control" required>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Qnty</label>
                                                <input class="form-control" id="qnty" name="qnty" type="number">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Company</label>
                                                <select name="company_id" id="company_id" class="form-control" required>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Short Info</label>
                                                <input class="form-control" name="shot_decs" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="product_stock_status" id="product_status"
                                                        class="form-control">
                                                    <option value="S">Select Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="InActive">InActive</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <span class="pull-right">
                                        <button class="btn btn-success btn-sm" type="button"
                                                onclick="addstockMasterData()">
                                        <i class="fa fa-plus-square bigfonts"></i>Add Row
                                        </button>
                                    </span>
                                    <hr>
                                    <div id="last-barcode"></div>
                                    <table class="table table-bordered" id="productStockMst" width="100%"
                                           cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Color</th>
                                            <th>Unit Price</th>
                                            <th>Sell Price</th>
                                            <th>BRCode</th>
                                            <th>IMEI</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                    <div class="modal-footer  d-flex justify-content-center">
                                        <button type="button"
                                                class="btn btn-info btn-outline-info col-md-6" onclick="savestockMasterData()">
                                            Save Stock Details
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
    function makeid() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        for (var i = 0; i < 20; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        return text;
    }

    document.getElementById('invice_no').value = makeid();
    document.getElementById('primaraynumber').value = makeid();

    url = "{{ url('showProductList') }}";
    $.ajax({
        url: url,
        type: 'GET',
        datatype: 'JSON',
        success: function (data) {
            var product_type = $.parseJSON(data);
            if (product_type != '') {
                var markup = "<option value=''>Select Product</option>";
                for (var x = 0; x < product_type.length; x++) {
                    markup += "<option value=" + product_type[x].product_id + ">" + product_type[x].product_name + "</option>";
                }
                $("#product_id").html(markup).show();
            } else {
                var markup = "<option value=''>Select Product</option>";
                $("#product_id").html(markup).show();
            }


        },
        error: function (data) {
            swal({
                title: "Oops",
                text: "Some Thing Is .... !!",
                icon: "error",
                timer: '1500'
            });
        }
    });

    url1 = "{{ url('showCompanyList') }}";
    $.ajax({
        url: url1,
        type: 'GET',
        datatype: 'JSON',
        success: function (data) {
            var product_type = $.parseJSON(data);
            if (product_type != '') {
                var markup = "<option value=''>Select Company</option>";
                for (var x = 0; x < product_type.length; x++) {
                    markup += "<option value=" + product_type[x].company_id + ">" + product_type[x].company_name + "</option>";
                }
                $("#company_id").html(markup).show();
            } else {
                var markup = "<option value=''>Select Company</option>";
                $("#company_id").html(markup).show();
            }


        },
        error: function (data) {
            swal({
                title: "Oops",
                text: "Some Thing Is .... !!",
                icon: "error",
                timer: '1500'
            });
        }
    });

    var mainInfoI = 0;

    function addDetailsStockInfo() {

        $('#productStockMst').append('' +
            '' +
            '<tr id="row' + mainInfoI + '" class="dynamic-added-mst">' +
            '<td>' +
            '<input name="color[]" placeholder="Color" type="text" class="form-control color" />' +
            '</td>' +
            '<td>' +
            '<input name="unit_price[]" placeholder="Unit Price" type="number" class="form-control unit_price" />' +
            '</td>' +
            '<td>' +
            '<input name="sell_price[]" placeholder="Sell Price" type="number" class="form-control sell_price" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="product_brcode[]" id="product_brcode' + mainInfoI + '" placeholder="BRCode Decs" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="product_imei[]" placeholder="IMEI" class="form-control product_imei" />' +
            '</td>' +
            '<td>' +
            '<button type="button" name="remove" onclick="removeRow(' + mainInfoI + ')" id="' + mainInfoI + '" class="btn btn-danger btn_remove">X</button>' +
            '</td>' +
            '</tr>' +
            '');
    }

    function addstockMasterData() {
        var invice_no = $('#invice_no').val();
        var product_id = $('#product_id').val();
        var qnty = $('#qnty').val();
        var company_id = $('#company_id').val();
        var product_status = $('#product_status').val();

        if (invice_no != "") {
            if (product_id != "") {
                if (qnty != "") {
                    if (company_id != "") {
                        if (product_status != "") {
                            addDetailsStockInfo();
                        } else {
                            swal({
                                text: "Select Product Stock Status",
                                timer: '2500'
                            });
                        }
                    } else {
                        swal({
                            text: "Select Company",
                            timer: '2500'
                        });
                    }
                } else {
                    swal({
                        text: "Enter Qty",
                        timer: '2500'
                    });
                }
            } else {
                swal({
                    text: "Select Product",
                    timer: '2500'
                });
            }
        } else {
            swal({
                text: "Enter Invoice NO",
                timer: '2500'
            });
        }

    }

    function removeRow(id) {
        $('#row' + id + '').remove();
    }

    function savestockMasterData() {
        urlSave = "{{ url('saveStockMasterData') }}";
        $.ajax({
            url: urlSave,
            method: "POST",
            data: $('#stockAddMstData').serialize(),
            type: 'json',
            success: function (data) {
                console.log(data);
                var dataResult = JSON.parse(data);
                if (dataResult.statusCode == 200) {

                    $('.dynamic-added-mst').remove();
                    $('#stockAddMstData')[0].reset();
                    swal("Success", dataResult.statusMsg);

                    document.getElementById('invice_no').value = makeid();
                } else {
                    swal({
                        title: "Oops",
                        text: "Bulk Data Insert Failed",
                        icon: "error",
                        timer: '1500'
                    });
                }
            }
        });
    }

</script>

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
        mainInfoI++;
        document.querySelector('#last-barcode').innerHTML = scanned_barcode;
        addstockMasterData();
        $('#product_brcode' + mainInfoI).val(scanned_barcode);
    }

</script>

<!-- END Java Script for this page -->

</body>
</html>
