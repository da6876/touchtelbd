<!DOCTYPE html>
<html lang="en">

@include('layouts.header_files')
@section('title', 'Home')
<body class="adminbody" onload="startTime()">

<div id="main">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">User Login</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><h5 id="txt" class="" ></h5></li>
                            <li class="breadcrumb-item active">User Login</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->





            <div class="row d-flex justify-content-center">


                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-4 align-items-center center">
                    <div class="card mb-6">

                        <div class="card-header">
                            <h3><i class="fa fa-hand-pointer-o"></i> User Login Here</h3>
                        </div>

                        <div class="card-body UserLogin">
                            <div class="alert alert-success text-center" role="alert">
                                <h5 class="alert-heading">Welcome To-<b>TouchTel</b> Login Panel</h5>
                            </div>
                            <form action="#" data-parsley-validate novalidate enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" name="user_id" id="user_id" data-parsley-trigger="change" required placeholder="Enter User ID" class="form-control" id="userName">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="user_password" id="user_password" data-parsley-trigger="change" required placeholder="Enter Password" class="form-control" id="emailAddress">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <input id="remember-1" type="checkbox">
                                        <label for="remember-1"> Remember me </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary col-md-12" type="button" onclick="checkLogin()">
                                        Login
                                    </button>
                                </div>

                            </form>

                        </div>
                        <div class="card-footer small text-muted text-center" ><b id='time'></b></div>
                    </div><!-- end card-->
                </div>

            </div>


        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
<!-- END main -->


<!-- END Java Script for this page -->
@include('layouts.footer_files')
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        var session = "AM";
        if(h == 0){
            h = 12;
        }

        if(h > 12){
            h = h - 12;
            session = "PM";
        }
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
            "Time : "+h + ":" + m + ":" + s+ " " + session;;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
</script>
<script>
    var date = new Date();
    var n = date.toDateString();
    document.getElementById('time').innerHTML = 'Date : '+n ;

    function checkLogin() {
        var UseId  = $("#user_id").val();
        var UseUser  = $("#user_password").val();

        if (UseId!=''){
            if (UseUser!=''){
                loginNow();
            } else{
                swal({
                    text: "Enter Your Password Here !!",
                    icon: "error",
                    timer: '3000'
                });
            }
        } else{
            swal({
                text: "Enter Your User ID Here !!",
                icon: "error",
                timer: '3000'
            });
        }

    }

    function loginNow() {
        url = "{{ url('UserLogin') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData($(".UserLogin form")[0]),
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var dataResult = JSON.parse(data);
                if (dataResult.statusCode == 200) {

                    window.location.href = 'Home';
                    $('.UserLogin form')[0].reset();
                } else if (dataResult.statusCode == 201) {
                    swal({
                        text: "Login Failed",
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
