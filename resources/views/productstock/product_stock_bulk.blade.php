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
                                <h3><i class="fa fa-table"></i> Bulk Add Stock</h3>
                                <span class="pull-right">
                                <button class="btn btn-primary btn-sm" id="add">
                                <i class="fa fa-plus-square bigfonts"></i> Add Row</button>
                            </span>
                            </div>
                            <div class="card-body" id="stockAddData">
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

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Invoice No</label>
                                                    <input class="form-control" id="invice_no" name="invice_no"
                                                           type="text">
                                                </div>
                                            </div>

                                        </div>

                                        <table class="table table-bordered" id="productStock" width="100%"
                                               cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>Unit Price</th>
                                                <th>Sell Price</th>
                                                <th>BR Code</th>
                                                <th>IME</th>
                                                <th>Color</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="modal-footer  d-flex justify-content-center">
                                        <button type="button" id="submit"
                                                class="btn btn-primary col-md-12">
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


<script>

    var postURL = "<?php echo url('addmore'); ?>";

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

    function makeid() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        for (var i = 0; i < 20; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        return text;
    }

    document.getElementById('invice_no').value = makeid();


    $('#add').click(function () {
        i++;
        $('#productStock').append('' +
            '' +
            '<tr id="row' + i + '" class="dynamic-added">' +
            '<td>' +
            '<select id="product_id" name="product_id[]" class="form-control selectProducts' + i + '">' +
            "<option value=''>Select Product</option>" +
            "@foreach($all_Product as $product)" +
            "<option value='{{ $product->product_id }}'>{{ $product->product_name }}</option>" +
            "@endforeach>" +
            '</select>' +
            '</td>' +
            '<td>' +
            '<input name="qnty[]" placeholder="Qnty" type="number" class="form-control name_list" />' +
            '</td>' +
            '<td>' +
            '<input name="unit_price[]" placeholder="Unit Price" type="number" class="form-control name_list" />' +
            '</td>' +
            '<td>' +
            '<input name="sell_price[]" placeholder="Sell Pric" type="number" class="form-control name_list" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="bar_code[]" placeholder="BAR Cod" class="form-control name_list" />' +
            '</td>' +
            '<td>' +
            '<input type="number" name="ime[]" placeholder="IME" class="form-control name_list" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="color[]" placeholder="Color" class="form-control name_list" />' +
            '</td>' +
            '<td>' +
            '<select name="product_stock_status[]" id="product_statuss" class="form-control">\n' +
            '    <option value="S">Select Status</option>\n' +
            '    <option value="Active">Active</option>\n' +
            '    <option value="InActive">InActive</option>\n' +
            '</select>' +
            '</td>' +
            '<td>' +
            '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button>' +
            '</td>' +
            '</tr>' +
            '');
    });

    $('#submit').click(function(){

        $.ajax({
            url:postURL,
            method:"POST",
            data:$('#stockAdd').serialize(),
            type:'json',
            success:function(data)
            {
                console.log(data);
                var dataResult = JSON.parse(data);
                if (dataResult.statusCode == 200) {

                    $('.dynamic-added').remove();
                    $('#stockAdd')[0].reset();
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
    });

    $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

</script>

<!-- END Java Script for this page -->

</body>
</html>
