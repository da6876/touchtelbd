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
                            <h1 class="main-title float-left">Product Type</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Product Type</li>
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
                                <span class="pull-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" onclick="resetFrom()" data-target=".addProductTypeAdd">
                                    <i class="fa fa-plus-square bigfonts"></i> Add New Product Type</button>
                                </span>
                                <h3><i class="fa fa-table"></i> Product Type Info</h3>
                            </div>

                            <div class="modal fade bd-example-modal-lg addProductTypeAdd" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white" >
                                            <h5 class="modal-title">Add Product Type</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="addNewUserType" action="#" method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Product Type Name</label>
                                                                <input name="product_type_id" id="product_type_id" type="hidden">
                                                                <input class="form-control" name="product_type_name" id="product_type_name" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Active</label>
                                                                <select id="Statuss" name="product_type_status" class="form-control">
                                                                    <option value="S">Select Status</option>
                                                                    <option value="A">YES</option>
                                                                    <option value="I">NO</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="addProductTypeData()" class="btn btn-primary btnSaveChnage">Save changes</button>
                                            <button type="button" onclick="editProductType()" class="btn btn-info btnEdit">Update changes</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="productType-dataTabel" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Type Name</th>
                                            <th>Status</th>
                                            <th>Create Info</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                    </table>
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

    $(".btnEdit").hide();
    $(".btnSaveChnage").show();
    //Show Data useign Yajratable
    var table1 = $('#productType-dataTabel').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('all.ProductType') !!}',
        columns: [
            {data: 'product_type_id', name: 'product_type_id'},
            {data: 'product_type_name', name: 'product_type_name'},
            {data: 'product_type_status', name: 'product_type_status'},
            {data: 'create_info', name: 'create_info'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    //Show User Type Data By Ajax
    function showproduct_typeData(id) {

        $('.addProductTypeAdd form')[0].reset();
        $.ajax({
            url: "{{ url('ProductType') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('.addProductTypeAdd').modal('show');
                $('.modal-title').text(data[0].product_type_name + ' Information');
                $('#product_type_name').val(data[0].product_type_name);
                $('#product_type_id').val(data[0].product_type_id);
                $('#Statuss option[value="' + data[0].product_type_status + '"]').prop('selected', true);
                document.getElementById('product_type_name').disabled = true;
                $('#Statuss').attr('disabled', 'disabled');
                $(".btnSaveChnage").hide();
                $(".btnEdit").show();
                $(".btnEdit").text('Edit Info');
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
    function resetFrom() {
        $('.addProductTypeAdd form')[0].reset();
    }
    //insert User Type Data By Ajax
    function addProductTypeData() {
        url = "{{ url('ProductType') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData($(".addProductTypeAdd form")[0]),
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var dataResult = JSON.parse(data);
                if (dataResult.statusCode == 200) {
                    $('.addProductTypeAdd').modal('hide');
                    $('#productType-dataTabel').DataTable().ajax.reload();
                    swal("Success", dataResult.statusMsg);
                    $('.addProductTypeAdd form')[0].reset();
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

    //Delete User Type Data By Ajax
    function  deleteproduct_typeData(id) {
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
                        url: "{{ url('ProductType') }}" + '/' + id,
                        type: "POST",
                        data: {'_method': 'DELETE', '_token': csrf_token},
                        success: function (data) {
                            console.log(data);
                            var dataResult = JSON.parse(data);
                            if (dataResult.statusCode == 200) {
                                $('#productType-dataTabel').DataTable().ajax.reload();
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
    
    function  editProductType() {
        $(".btnSaveChnage").show();
        $(".btnEdit").hide();
        document.getElementById('product_type_name').disabled = false;
        $('#Statuss').attr('disabled', false);
        $(".btnSaveChnage").text('Update Info');
    }





</script>

</body>
</html>
