<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bakery POS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets') }}/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/metisMenu.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/typography.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/default-css.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/styles.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   
        
    <!-- modernizr css -->
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->

    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="{{ route('home')}}" aria-expanded="true"><i class="ti-dashboard"></i>
                                    <span>dashboard</span></a>

                                    <!-- kategori -->
                             <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                                    <span>Pendataan</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('kategori.index')}}">Kategori</a></li>
                                    <li><a href="{{ route('produk.index')}}">Produk</a></li>
                                </ul>
                            </li>
                            <!-- penjamanan -->
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i>
                                    <span>Transaksi</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('transaksi.index')}}">Transaksi</a></li>
                                    <li><a href="{{ route('laporan.harian')}}">Laporan Harian</a></li> 
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i>
                                    <span>Pengajuan Barang</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('pengajuan-barang.index')}}">Pengajuan Barang</a></li>
                                    
                                </ul>
                            </li>

                            
                            <!-- laporan -->
                            
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i>
                                    <span>Laporan</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('pemasok.index')}}">Pemasok</a></li>
                                    <li><a href="{{ route('pembelian.index')}}">Pembelian</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i>
                                    <span>Member</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('member.index')}}">Member</a></li>
                                    
                                </ul>
                            </li>
                    
                            
                            
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        
                    </div> 
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                           
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h5 class="fw-bold m-6">Dashboard</h5>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{ url('home') }}">Home</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">My User <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <form  action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Log Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <section class="content">
                @yield('content')
            <endsection>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        
       
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="{{ asset('assets') }}/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    
    <script src="{{ asset('assets') }}/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="{{ asset('assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets') }}/js/metisMenu.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="{{ asset('assets') }}/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="{{ asset('assets') }}/js/pie-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="{{ asset('assets') }}/js/bar-chart.js"></script>
    <!-- others plugins -->
    <script src="{{ asset('assets') }}/js/plugins.js"></script>
    <script src="{{ asset('assets') }}/js/scripts.js"></script>


    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/chartist/js/chartist.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                dom: "<'row mb-3'<'col-md-6'l><'col-md-6 text-end'f>>" + // Search kanan, kasih margin bawah
                    "<'row'<'col-md-12 text-center mb-2'B>>" + // Tombol ditengah & ada margin bawah
                    "<'row'<'col-md-12'tr>>" +
                    "<'row mt-3'<'col-md-5'i><'col-md-7'p>>", // Info & Pagination dikasih margin atas
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        className: 'btn btn-danger btn-sm mx-1'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        className: 'btn btn-success btn-sm mx-1'
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        className: 'btn btn-primary btn-sm mx-1'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Print',
                        className: 'btn btn-secondary btn-sm mx-1'
                    }
                ],
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan MENU data",
                    info: "Menampilkan START sampai END dari TOTAL data",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    }
                },
                responsive: true,
                pageLength: 10,
                autoWidth: false
            });

            // Tambah padding pada table supaya tidak nempel
            $('.dataTables_wrapper').css('padding', '15px');
            $('.table').css('border-radius', '10px'); // Biar smooth
        });

    </script>
    
    @yield('scripts')

</body>



</html>

