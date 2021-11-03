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
</script>
<!-- END Java Script for this page -->

</body>
</html>
