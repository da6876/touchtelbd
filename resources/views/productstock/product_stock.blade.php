<!DOCTYPE html>
<html lang="en">
<head>

@include('layouts.header_files')

    <!-- END CSS for this page -->
</head>

<body class="adminbody">

<div id="main">

    <!-- top bar navigation -->
@include('layouts.header_bar')
<!-- End Navigation -->


    <!-- Left Sidebar -->
@include('layouts.left_main_sidebar')
<!-- End Sidebar -->


    <div class="content-page">

        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">


                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Product Stock</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Product Stock</li>
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
                            <h3><i class="fa fa-table"></i>  Add New Stock</h3>
                        </div>
                        <div class="card-body">
                            <form id="stockAdd" action="#" method="post"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="modal-body">

                                    @php
                                        $all_Product = DB::table('product_info')
                                            ->where('product_status', 'Active')
                                            ->get();
                                    @endphp

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

                                                <select name="product_id"  id="product_id" class="form-control selectProducts" required>
                                                    <option value="S">Select Product</option>
                                                    @foreach($all_Product as $all_Product)
                                                        <option
                                                            value="{{$all_Product->product_id}}">{{$all_Product->product_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Qnty</label>
                                                <input class="form-control" name="qnty" type="number">
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Short Info</label>
                                                <input class="form-control" name="shot_decs" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Color</label>
                                                <input class="form-control" name="color" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Product BR Code Price</label>
                                                <input type="text" name="product_br_code" class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Product IME</label>
                                                <input type="number" name="product_ime" class="form-control">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Unit Price</label>
                                                <input type="number" name="unit_price" class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Sell Price</label>
                                                <input class="form-control" name="sell_price" type="number">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="product_stock_status" id="product_statuss"
                                                        class="form-control">
                                                    <option value="S">Select Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="InActive">InActive</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer  d-flex justify-content-center">
                                    <button type="button" onclick="addProductStock()" class="btn btn-primary col-md-6">
                                        Add To Sock
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

<script src="{{asset('public/assets/plugins/datetimepicker/js/daterangepicker.js')}}"></script>
<script src="{{asset('public/assets/plugins/select2/js/select2.min.js')}}"></script>
<script>

    $(document).ready(function() {
        $('.selectProducts').select2();
    });

    function makeid() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        for (var i = 0; i < 15; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        return text;
    }

    document.getElementById('invice_no').value=makeid();


</script>
<script>
    //insert User Type Data By Ajax
    function addProductStock() {
        url = "{{ url('ProductStock') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData($("#stockAdd")[0]),
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var dataResult = JSON.parse(data);
                if (dataResult.statusCode == 200) {
                    //$('.ProductStockAdd').modal('hide');
                    $('#ProductStock-dataTabel').DataTable().ajax.reload();
                    swal("Success", dataResult.statusMsg);
                    $('#stockAdd')[0].reset();

                    $("#product_id").val("");
                    $("#product_id").trigger("change");

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
<!-- END Java Script for this page -->

</body>
</html>
