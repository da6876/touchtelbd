<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header_files')


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
                            <h1 class="main-title float-left">Product Info</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Product Info</li>
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
                                <h3><i class="fa fa-table"></i> Add Product</h3>
                                <span class="pull-right">
                                    <button class="btn btn-primary btn-sm" onclick="addNewAction()">
                                    <i class="fa fa-plus-square bigfonts"></i> Add New Product</button>
                                </span>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="Products-dataTabel" width="100%"
                                           cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>

                        </div><!-- end card-->
                    </div>


                </div>

                <div class="modal fade bd-example-modal-lg productUpdate" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white" >
                                <h5 class="modal-title">Add Categories</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addNewProduct" action="#" method="post"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input name="product_id" id="product_id" type="hidden">
                                                    <input class="form-control" id="product_name" name="product_name"
                                                           type="text" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Product Desc.</label>
                                                    <div>
                                                                    <textarea id="decs" name="decs" required=""
                                                                              class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Product Type</label>
                                                    <select id="product_type" name="product_type_id"
                                                            class="form-control">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Categories</label>
                                                    <select id="Categories" name="Categorie_id" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Photo</label>
                                                    <input class="form-control" name="product_image"type="file"  accept="image/*" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select id="product_status" name="product_status" class="form-control">
                                                        <option value="S">Select Status</option>
                                                        <option value="Active">Active</option>
                                                        <option value="InActive">InActive</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" onclick="updateProductInfo()">
                                            Update Product
                                        </button>
                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close
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
    //Show Data useign Yajratable
    url = "{{ url('getProductType') }}";
    $.ajax({
        url: url,
        type: 'GET',
        datatype: 'JSON',
        success: function (data) {
            var product_type = $.parseJSON(data);
            if (product_type != '') {
                var markup = "<option value=''>Select Product Type</option>";
                for (var x = 0; x < product_type.length; x++) {
                    markup += "<option value=" + product_type[x].product_type_id + ">" + product_type[x].product_type_name + "</option>";
                }
                $("#product_type").html(markup).show();
            } else {
                var markup = "<option value=''>Select Product Type</option>";
                $("#product_type").html(markup).show();
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

    url = "{{ url('getCategories') }}";
    $.ajax({
        url: url,
        type: 'GET',
        datatype: 'JSON',
        success: function (data) {
            var Categoriesss = $.parseJSON(data);
            if (Categoriesss != '') {
                var markup = "<option value=''>Select Categories</option>";
                for (var x = 0; x < Categoriesss.length; x++) {
                    markup += "<option value=" + Categoriesss[x].categories_id + ">" + Categoriesss[x].categories_name + "</option>";
                }
                $("#Categories").html(markup).show();
            } else {
                var markup = "<option value=''>Select Categories</option>";
                $("#Categories").html(markup).show();
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

    var table1 = $('#Products-dataTabel').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('all.ProductInfo') !!}',
        columns: [
            {data: 'product_id', name: 'product_id'},
            {data: 'product_name', name: 'product_name'},
            {data: 'product_status', name: 'product_status'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    function  addNewAction() {
        window.location.href = 'AddProduct';
    }
    
    function  editProductData(id) {

        $.ajax({
            url: "{{ url('ProductInfo') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                $('.productUpdate').modal('show');
                $('.modal-title').text(data[0].product_name + ' Information');
                $('#product_id').val(data[0].product_id);
                $('#product_name').val(data[0].product_name);
                $('#decs').val(data[0].decs);
                $('#Categories option[value="' + data[0].Categorie_id + '"]').prop('selected', true);
                $('#product_type option[value="' + data[0].product_type_id + '"]').prop('selected', true);
                $('#product_status option[value="' + data[0].product_status + '"]').prop('selected', true);
                // document.getElementById('categories_name').disabled = true;
                //  $('#Statuss').attr('disabled', 'disabled');
                //   $('#btnUpdate').hide();

            }, error: function () {
                swal({
                    title: "Oops",
                    text: "aa",
                    icon: "error",
                    timer: '1500'
                });
            }
        });
    }

    function updateProductInfo() {
        url = "{{ url('ProductInfo') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData($(".productUpdate form")[0]),
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var dataResult = JSON.parse(data);
                if (dataResult.statusCode == 200) {
                    $('#Products-dataTabel').DataTable().ajax.reload();
                    swal("Success", dataResult.statusMsg);
                    $('.productUpdate form')[0].reset();
                    $('.productUpdate').modal('hide');
                    $('#Products-dataTabel').DataTable().ajax.reload();
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
    }

    function deleteProductData(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ url('ProductInfo') }}" + '/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function (data) {
                        console.log(data);
                        var dataResult = JSON.parse(data);
                        if (dataResult.statusCode == 200) {
                            $('#Products-dataTabel').DataTable().ajax.reload();
                            swal({
                                title: "Delete Done",
                                text: "Poof! Your data file has been deleted!",
                                icon: "success",
                                button: "Done"
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    }, error: function (data) {
                        swal({
                            title: "Opps...",
                            text: "Error occured !",
                            icon: "error",
                            button: 'Ok ',
                        });
                    }
                });
            }

            else {
                swal("Your imaginary file is safe!");
            }
        });
    }
</script>
<!-- END Java Script for this page -->

</body>
</html>
