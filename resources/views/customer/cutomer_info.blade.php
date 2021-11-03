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
                            <h1 class="main-title float-left">Customer Info</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Customer Info</li>
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
{{--                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".categoriesAdd">--}}
                                    <button class="btn btn-primary btn-sm" onclick="clearfrom()">
                                    <i class="fa fa-plus-square bigfonts"></i> Add New Categories</button>
                                </span>
                                <h3><i class="fa fa-table"></i> Customer Info</h3>
                            </div>

                            <div class="modal fade bd-example-modal-lg categoriesAdd" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white" >
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
                                                                <input class="form-control" id="customer_phone" name="customer_phone" type="text">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Customer Email</label>
                                                                <input class="form-control" id="customer_email"  name="customer_email" type="text">
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
                                                                <input class="form-control" id="customer_address" name="customer_address" type="text">
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

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="Categories-dataTabel" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Customer Name</th>
                                            <th>Phone No</th>
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
    //Show Data useign Yajratable
    var table1 = $('#Categories-dataTabel').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('all.Customer') !!}',
        columns: [
            {data: 'customer_info_id', name: 'customer_info_id'},
            {data: 'customer_name', name: 'customer_name'},
            {data: 'customer_phone', name: 'customer_phone'},
            {data: 'create_by', name: 'create_by'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });


    //insert User Type Data By Ajax
    function clearfrom() {

        $('.categoriesAdd form')[0].reset();

        document.getElementById('customer_name').disabled = false;
        document.getElementById('customer_phone').disabled = false;
        document.getElementById('customer_email').disabled = false;
        document.getElementById('customer_address').disabled = false;
        $('#customer_status').attr('disabled', false);
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

    //Show User Type Data By Ajax
    function showcategoriesData(id) {

        $.ajax({
            url: "{{ url('CustomerInfo') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('.categoriesAdd').modal('show');
                $('.categoriesAdd form')[0].reset();
                $('.modal-titles').text(data[0].customer_name + ' Information');
                $('#customer_name').val(data[0].customer_name);
                $('#customer_phone').val(data[0].customer_phone);
                $('#customer_email').val(data[0].customer_email);
                $('#customer_address').val(data[0].customer_address);
                document.getElementById('customer_name').disabled = true;
                document.getElementById('customer_phone').disabled = true;
                document.getElementById('customer_email').disabled = true;
                document.getElementById('customer_address').disabled = true;
                $('#customer_status').attr('disabled', 'disabled');
                $('#customer_status option[value="' + data[0].customer_status + '"]').prop('selected', true);
                $('#btnUpdate').hide();

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

    //Edit User Type Data By Ajax
    function editcategoriesData(id) {

        $.ajax({
            url: "{{ url('CategoriesInfo') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('.showCategoriesData').modal('show');
                $('.modal-titles').text(data[0].categories_name + ' Information');
                $('#categories_name').val(data[0].categories_name);
                $('#Statuss option[value="' + data[0].categories_status + '"]').prop('selected', true);
                document.getElementById('categories_name').disabled = false;
                $('#Statuss').prop('disabled', false);
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

    //Delete User Type Data By Ajax
    function  deletecategoriesData(id) {
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
                    url: "{{ url('CustomerInfo') }}" + '/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function (data) {
                        console.log(data);
                        var dataResult = JSON.parse(data);
                        if (dataResult.statusCode == 200) {
                            $('#Categories-dataTabel').DataTable().ajax.reload();
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
