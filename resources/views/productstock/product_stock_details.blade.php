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
                            <h1 class="main-title float-left">Product Stock Details Info</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Product Stock Details Info</li>
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
                                <h3><i class="fa fa-table"></i> Stock Details info</h3>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="Categories-dataTabel">
                                        <thead>
                                        <tr>
                                            <th>Invoice No</th>
                                            <th>Product Name</th>
                                            <th>Color</th>
                                            <th>Unit Price</th>
                                            <th>Sell Price</th>
                                            <th>BR Code</th>
                                            <th>IMEI</th>
                                            <th>Available Status</th>
                                            <th>Create By</th>
                                            {{--<th>Action</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $sub_total= 0;
                                        $size = count($stockDetails);
                                        for ($x = 0; $x < $size; $x++) { ?>
                                        <tr>
                                            <td>{{$stockDetails[$x]->invice_no}}</td>
                                            <td>{{$stockDetails[$x]->product_name}}</td>
                                            <td>{{$stockDetails[$x]->color}}</td>
                                            <td>{{$stockDetails[$x]->unit_price}}</td>
                                            <td>{{$stockDetails[$x]->sell_price}}</td>
                                            <td>{{$stockDetails[$x]->product_brcode}}</td>
                                            <td>{{$stockDetails[$x]->product_imei}}</td>
                                            <td>{{$stockDetails[$x]->sell_status}}</td>
                                            <td>{{$stockDetails[$x]->user_name}}</td>
                                           {{-- <td>
                                                <a onclick="deleteData('{{$stockDetails[$x]->product_stock_dtl_id}}')" role="button" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </td>
--}}
                                        </tr>

                                        <?php } ?>
                                        </tbody>
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


    function  deleteData(id) {
        alert(id);
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
                    url: "{{ url('ProductStock') }}" + '/' + id,
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

    function showDetals(masterId) {
            var postURL1 = "{{ url('StockDetails') }}" + '/' + masterId;
            window.location = postURL1;
    }
</script>
<!-- END Java Script for this page -->

</body>
</html>
