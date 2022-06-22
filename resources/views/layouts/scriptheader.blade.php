<head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('assets/images/favicon.ico')}}">

        <!-- preloader css -->
        <link rel="stylesheet" href="{{url('assets/css/preloader.min.css')}}" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{url('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{url('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

        <!-- plugin css -->
        <link href="{{url('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

        <script src="{{url('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{url('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>         
        <script src="{{url('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{url('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{url('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{url('assets/libs/feather-icons/feather.min.js')}}"></script>
        <!-- pace js -->
        <script src="{{url('assets/libs/pace-js/pace.min.js')}}"></script>

        <!-- apexcharts -->
        <script src="{{url('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{url('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{url('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>


        <!-- Required datatable js -->
        <script src="{{url('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{url('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{url('assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{url('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{url('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{url('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{url('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{url('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

        <!-- Responsive examples -->
        <script src="{{url('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>        
</head>