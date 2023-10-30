<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Lab Admin </title>
    <link rel="icon" type="image/x-icon" href="http://demo.neptuneapp.xyz/common-assets/img/favicon.ico" />
    <!-- Common Styles Starts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('admin-theme/common-assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-theme/assets/css/main.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-theme/assets/css/structure.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-theme/common-assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-theme/common-assets/plugins/highlight/styles/monokai-sublime.css')}}" rel="stylesheet" type="text/css" />
    <!-- Common Styles Ends -->
    <!-- Common Icon Starts -->
    <link rel="stylesheet" href="{{ asset('admin-theme/maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css')}}">
    <!-- Common Icon Ends -->
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{ asset('admin-theme/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ asset('admin-theme/common-assets/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css"> -->
    <link href="{{ asset('admin-theme/assets/css/dashboard/dashboard_1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-theme/common-assets/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin-theme/common-assets/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin-theme/assets/css/elements/tooltip.css')}}" rel="stylesheet" type="text/css" />
    <!-- Page Level Plugin/Style Ends -->

    <link rel="stylesheet" type="text/css" href="{{ asset('admin-theme/common-assets/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-theme/common-assets/plugins/table/datatable/dt-global_style.css')}}">
</head>

<body>
    <!-- Loader Starts -->
    <div id="load_screen">
        <div class="boxes">
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <p class="neptune-loader-heading">Neptune</p>
    </div>
    <!--  Loader Ends -->
    @include('teacher.layouts.header')
    <!--  Main Container Starts  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <div class="rightbar-overlay"></div>
        @include('teacher.layouts.side_bar')

        <div id="content" class="main-content">
            @yield('content')
        
        </div>
        @include('teacher.layouts.right_bar')
    </div>

    <!-- Common Script Starts -->
    <script src="{{ asset('admin-theme/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('admin-theme/common-assets/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('admin-theme/common-assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin-theme/common-assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('admin-theme/assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('admin-theme/assets/js/custom.js')}}"></script>
    <!-- Common Script Ends -->
    <!-- Page Level Plugin/Script Starts -->
    <script src="{{ asset('admin-theme/assets/js/loader.js')}}"></script>
    <!-- <script src="{{ asset('admin-theme/common-assets/plugins/apex/apexcharts.min.js')}}"></script> -->
    <script src="{{ asset('admin-theme/common-assets/plugins/flatpickr/flatpickr.js')}}"></script>
    <script src="{{ asset('admin-theme/assets/js/dashboard/dashboard_1.js')}}"></script>
    <!-- Page Level Plugin/Script Ends -->

    <script src="{{ asset('admin-theme/common-assets/plugins/table/datatable/datatables.js')}}"></script>
    <!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
    <script src="{{ asset('admin-theme/common-assets/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('admin-theme/common-assets/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
    <script src="{{ asset('admin-theme/common-assets/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('admin-theme/common-assets/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
    <!-- The following JS library files are loaded to use PDF Options-->
    <script src="{{ asset('admin-theme/common-assets/plugins/table/datatable/button-ext/pdfmake.min.js')}}"></script>
    <script src="{{ asset('admin-theme/common-assets/plugins/table/datatable/button-ext/vfs_fonts.js')}}"></script>

    <script src="{{ asset('admin-theme/common-assets/plugins/chartjs/Chart.min.js')}}"></script>
    <script src="{{ asset('admin-theme/common-assets/plugins/chartjs/utils.js')}}"></script>
    <script src="{{ asset('admin-theme/assets/js/charts/chart-js.js')}}"></script>
    
    <script>
        $(document).ready(function() {
            $('#basic-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5,10,15,20],
                "pageLength": 5 
            });
            $('#dropdown-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5,10,15,20],
                "pageLength": 5 
            });
            $('#last-page-dt').DataTable({
                "pagingType": "full_numbers",
                "language": {
                    "paginate": {
                        "first": "<i class='las la-angle-double-left'></i>",
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>",
                        "last": "<i class='las la-angle-double-right'></i>"
                    }
                },
                "lengthMenu": [3,6,9,12],
                "pageLength": 3 
            });
            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex ) {
                    var min = parseInt( $('#min').val(), 10 );
                    var max = parseInt( $('#max').val(), 10 );
                    var age = parseFloat( data[3] ) || 0; // use data for the age column
                    if ( ( isNaN( min ) && isNaN( max ) ) ||
                        ( isNaN( min ) && age <= max ) ||
                        ( min <= age   && isNaN( max ) ) ||
                        ( min <= age   && age <= max ) )
                    {
                        return true;
                    }
                    return false;
                }
            ); 
            var table = $('#range-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5,10,15,20],
                "pageLength": 5 
            });
            $('#min, #max').keyup( function() { table.draw(); } );
            $('#export-dt').DataTable( {
                dom: '<"row"<"col-md-6"B><"col-md-6"f> ><""rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'btn btn-primary' },
                        { extend: 'csv', className: 'btn btn-primary' },
                        { extend: 'excel', className: 'btn btn-primary' },
                        { extend: 'pdf', className: 'btn btn-primary' },
                        { extend: 'print', className: 'btn btn-primary' }
                    ]
                },
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7 
            } );
            // Add text input to the footer
            $('#single-column-search tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
            } );
            // Generate Datatable
            var table = $('#single-column-search').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5,10,15,20],
                "pageLength": 5
            });
            // Search
            table.columns().every( function () {
                var that = this;
                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
            var table = $('#toggle-column').DataTable( {
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5,10,15,20],
                "pageLength": 5
            } );
            $('a.toggle-btn').on( 'click', function (e) {
                e.preventDefault();
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );
                // Toggle the visibility
                column.visible( ! column.visible() );
                $(this).toggleClass("toggle-clicked");
            } );
        } );
    </script>
</body>

</html>