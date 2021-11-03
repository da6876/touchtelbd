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
                                <form id="selladd" action="#" method="post"
                                      enctype="multipart/form-data">
                                    <input type="hidden" id="customer_id">
                                    <table class="table table-bordered" id="productStock">
                                        <thead>
                                        <tr>
                                            <th class="col-md-6">Name</th>
                                            <th class="col-md-2">Price</th>
                                            <th class="col-md-2">Quantity</th>
                                            <th class="col-md-2">Sub Total</th>
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
                                                <input class="form-control" id="subqnty" type="text" readonly>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="col-md-6" colspan="3"><b>Receive Amount </b></td>
                                            <td class="col-md-2" colspan="2">
                                                <input class="form-control" id="subqnty" type="number">
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="col-md-6" colspan="3"><b>Deu Amount </b></td>
                                            <td class="col-md-2" colspan="2">
                                                <input class="form-control" id="subqnty" type="number" readonly>
                                            </td>
                                        </tr>

                                        </tfoot>
                                    </table>

                                    <button type="button" onclick="addProductStock()" class="btn btn-info col-md-3 pull-right">
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
            '<input name="qnty" id="product_price_' + i + '"  class="form-control product_price" value="' + price + '" for="' + i + '" readonly/>' +
            '</td>' +
            '<td>' +
            '<input name="qnty" id="quantity_' + i + '" type="number" class="form-control quantity" value="0" for="' + i + '"/>' +
            '</td>' +
            '<td>' +
            '<input name="qnty" id="total_cost_' + i + '"  class="form-control total_cost" value="0.0" for="' + i + '" readonly/>' +
            '</td>' +
            '<td>' +
            '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>' +
            '</td>' +
            '</tr>' +
            '');
        i++;
    }

    $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

    // Add a generic event listener for any change on quantity or price classed inputs
    $("#productStock").on('input', 'input.quantity,input.product_price', function () {
        alert($(this).attr("for"));
        getTotalCost($(this).attr("for"));
    });

    // Using a new index rather than your global variable i
    function getTotalCost(ind) {
        var qty = $('#quantity_' + ind).val();
        var price = $('#product_price_' + ind).val();
        alert(price);
        var totNumber = (qty * price);
        var tot = totNumber.toFixed(2);
        $('#total_cost_' + ind).val(tot);
    }

    function addCustomer() {
        alert("aaa");

        $('#countryList').fadeOut()
        clearfrom();
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
