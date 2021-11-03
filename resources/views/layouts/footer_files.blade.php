<script src="{{asset('public/assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/js/moment.min.js')}}"></script>

<script src="{{asset('public/assets/js/popper.min.js')}}"></script>
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('public/assets/js/detect.js')}}"></script>
<script src="{{asset('public/assets/js/fastclick.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.nicescroll.js')}}"></script>

<!-- App js -->
<script src="{{asset('public/assets/js/pikeadmin.js')}}"></script>

<!-- BEGIN Java Script for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!-- Counter-Up-->
<script src="{{asset('public/assets/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>


<!-- BEGIN Java Script for this page -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('public/assets/plugins/switchery/switchery.min.js')}}"></script>

<script>
    $(document).ready(function() {
        // data-tables
        $('#example1').DataTable();

        // counter-up
        $('.counter').counterUp({
            delay: 10,
            time: 600
        });
    } );
</script>

