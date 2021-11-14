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
                            <h1 class="main-title float-left">Cash Memo Info</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Cash Memo Info</li>
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

                                <h3><i class="fa fa-table"></i> Search Cash Memo</h3>
                            </div>

                            <div class="card-body">


                                    <form id="addNewCategories" action="#" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Enter Cash Memo No:</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <input class="form-control" id="invoice_no" name="invoice_no" type="text">

                                                        <div id="countryList">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{ csrf_field() }}
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="SearchInvoice()" class="btn btn-primary">Show Cash Memo Details</button>
                                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>




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
    $(document).ready(function () {

        $('#invoice_no').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('autocomplete.searchInvoiceByNo') }}",
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

    function setData(id) {
        $('#invoice_no').val(id);
        $('#countryList').fadeOut();
    }
    
    function SearchInvoice() {
       var invoice_no = $('#invoice_no').val();
       if (invoice_no!=""){
           showal(invoice_no);
       } else {
           swal({
               title: "Oops",
               text: "Select A Invoice No !!",
               timer: '2500'
           });
       }
    }

    function showal(invoice) {
        alert(invoice);
        var postURL1 = "{{url('CashMemo')}}"+'/'+invoice;
        postURL1 = postURL1.replace(/\s/g, '');
        alert(postURL1);
        window.location = postURL1;

    }
</script>


<!-- END Java Script for this page -->

</body>
</html>
