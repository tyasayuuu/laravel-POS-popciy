<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>POS Application</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/images/favicon.png">
        <!-- Pignose Calender -->
        <link href="{{ asset('assets') }}/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
        <!-- Chartist -->
        <link rel="stylesheet" href="{{ asset('assets') }}/plugins/chartist/css/chartist.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
        <!-- Custom Stylesheet -->
        <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets') }}/css/custom.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">




    </head>
        <!-- Tambahin jQuery (kalau belum ada) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Tempat untuk script tambahan -->
        @yield('scripts')

    <body>

        <!--*******************
            Preloader start
        ********************-->
        <div id="preloader">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>
        <!--*******************
            Preloader end
        ********************-->


        <!--**********************************
            Main wrapper start
        ***********************************-->
        <div id="main-wrapper">

            <!--**********************************
                Nav header start
            ***********************************-->
            <div class="nav-header">
                <div class="brand-logo">
                    <a class="d-flex align-items-center">
                        <b class="logo-abbr" style="font-size: 24px; font-weight: bold; color: white;">P</b>
                        <span class="brand-title" style="font-size: 20px; font-weight: bold; color: white; margin-left: 5px;">
                            Popciy
                        </span>
                    </a>
                </div>
            </div>

            <!--**********************************
                Nav header end
            ***********************************-->

            <!--**********************************
                Header start
            ***********************************-->
            <div class="header">
                <div class="header-content clearfix">

                    <div class="nav-control">
                        <div class="hamburger">
                            <span class="toggle-icon"><i class="icon-menu"></i></span>
                        </div>
                    </div>
                    <div class="header-left">
                        <div class="input-group icons">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                            </div>
                            <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                            <div class="drop-down animated flipInX d-md-none">
                                <form action="#">
                                    <input type="text" class="form-control" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="header-right">
                        <ul class="clearfix">
                            <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                    <i class="mdi mdi-email-outline"></i>
                                    <span class="badge badge-pill gradient-1">3</span>
                                </a>
                                <div class="drop-down animated fadeIn dropdown-menu">
                                    <div class="dropdown-content-heading d-flex justify-content-between">
                                        <span class="">3 New Messages</span>
                                        <a href="javascript:void()" class="d-inline-block">
                                            <span class="badge badge-pill gradient-1">3</span>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="javascript:void()">
                                                    <img class="float-left mr-3 avatar-img" src="{{ asset('assets') }}/images/avatar/1.jpg" alt="">
                                                    <div class="notification-content">
                                                        <div class="notification-heading">Saiful Islam</div>
                                                        <div class="notification-timestamp">08 Hours ago</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="javascript:void()">
                                                    <img class="float-left mr-3 avatar-img" src="{{ asset('assets') }}/images/avatar/2.jpg" alt="">
                                                    <div class="notification-content">
                                                        <div class="notification-heading">Adam Smith</div>
                                                        <div class="notification-timestamp">08 Hours ago</div>
                                                        <div class="notification-text">Can you do me a favour?</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void()">
                                                    <img class="float-left mr-3 avatar-img" src="{{ asset('assets') }}/images/avatar/3.jpg" alt="">
                                                    <div class="notification-content">
                                                        <div class="notification-heading">Barak Obama</div>
                                                        <div class="notification-timestamp">08 Hours ago</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void()">
                                                    <img class="float-left mr-3 avatar-img" src="{{ asset('assets') }}/images/avatar/4.jpg" alt="">
                                                    <div class="notification-content">
                                                        <div class="notification-heading">Hilari Clinton</div>
                                                        <div class="notification-timestamp">08 Hours ago</div>
                                                        <div class="notification-text">Hello</div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </li>
                            <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                    <i class="mdi mdi-bell-outline"></i>
                                    <span class="badge badge-pill gradient-2">3</span>
                                </a>
                                <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                    <div class="dropdown-content-heading d-flex justify-content-between">
                                        <span class="">2 New Notifications</span>
                                        <a href="javascript:void()" class="d-inline-block">
                                            <span class="badge badge-pill gradient-2">5</span>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="javascript:void()">
                                                    <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                    <div class="notification-content">
                                                        <h6 class="notification-heading">Events near you</h6>
                                                        <span class="notification-text">Within next 5 days</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void()">
                                                    <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                    <div class="notification-content">
                                                        <h6 class="notification-heading">Event Started</h6>
                                                        <span class="notification-text">One hour ago</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void()">
                                                    <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                    <div class="notification-content">
                                                        <h6 class="notification-heading">Event Ended Successfully</h6>
                                                        <span class="notification-text">One hour ago</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void()">
                                                    <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                    <div class="notification-content">
                                                        <h6 class="notification-heading">Events to Join</h6>
                                                        <span class="notification-text">After two days</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </li>
                            <li class="icons dropdown d-none d-md-flex">
                                <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                    <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                                </a>
                                <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li><a href="javascript:void()">English</a></li>
                                            <li><a href="javascript:void()">Dutch</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="icons dropdown">
                                <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                    <span class="activity active"></span>
                                    <img src="{{ asset('assets') }}/images/user/1.png" height="40" width="40" alt="">
                                </div>
                                <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                    <div class="dropdown-content-body">

                                    <form  action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Log Out</button>
                                    </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--**********************************
                Header end ti-comment-alt
            ***********************************-->

            <!--**********************************
                Sidebar start
            ***********************************-->
            <div class="nk-sidebar">
                <div class="nk-nav-scroll">
                    <ul class="metismenu" id="menu">
                        <li class="nav-label">Dashboard</li>
                        <li>
                            <a href="{{ route('home') }}" aria-expanded="false">
                                <i class="fas fa-home"></i><span class="nav-text"> Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-label">Produk</li>
                        <li>
                            <a href="{{ route('produk.index')}}" aria-expanded="false">
                                <i class="fas fa-ice-cream"></i><span class="nav-text"> Produk</span>
                            </a>
                        </li>
                        <li class="nav-label">Kategori</li>
                        <li>
                            <a href="{{ route('kategori.index')}}" aria-expanded="false">
                                <i class="fas fa-cookie-bite"></i><span class="nav-text"> Kategori</span>
                            </a>
                        </li>
                        <li class="nav-label">Member</li>
                        <li>
                            <a href="{{ route('members.index')}}" aria-expanded="false">
                                <i class="fas fa-users"></i><span class="nav-text"> Member</span>
                            </a>
                        </li>
                        <li class="nav-label">Pemasok</li>
                        <li>
                            <a href="{{ route('pengajuan-barang.index')}}" aria-expanded="false">
                                <i class="fas fa-truck"></i><span class="nav-text"> Pengajuan</span>
                            </a>
                        </li>
                        <li class="nav-label">Pengajuan</li>
                        <li>
                            <a href="{{ route('pemasok.index')}}" aria-expanded="false">
                                <i class="fas fa-truck"></i><span class="nav-text"> Pemasok</span>
                            </a>
                            <a href="{{ route('pembelian.index')}}" aria-expanded="false">
                                <i class="fas fa-cart-arrow-down"></i><span class="nav-text"> Pembelian</span>
                            </a>
                        </li>
                        <li class="nav-label">Transaksi</li>
                        <li>
                            <a href="{{ route('transaksi.index')}}" aria-expanded="false">
                                <i class="fas fa-money-bill-wave"></i><span class="nav-text"> Transaksi</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--**********************************
                Sidebar end
            ***********************************-->

            <!--**********************************
                Content body start
            ***********************************-->
            <section class="content">
                @yield('content')
            </section>
            <!--**********************************
                Content body end
            ***********************************-->


            <!--**********************************
                Footer start
            ***********************************-->
            <div class="footer">
                <div class="copyright">
                    <p>Copyright &copy; Designed by Pacar Jaemin 2025</p>
                </div>
            </div>
            <!--**********************************
                Footer end
            ***********************************-->
        </div>
        <!--**********************************
            Main wrapper end
        ***********************************-->

        <!--**********************************
            Scripts
            ***********************************-->
            <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="{{ asset('assets') }}/plugins/chartist/js/chartist.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/chart.js/Chart.bundle.min.js"></script>

        <!-- DataTables -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


        <script src="{{ asset('assets') }}/plugins/common/common.min.js"></script>
        <script src="{{ asset('assets') }}/js/custom.min.js"></script>
        <script src="{{ asset('assets') }}/js/settings.js"></script>
        <script src="{{ asset('assets') }}/js/gleek.js"></script>
        <script src="{{ asset('assets') }}/js/styleSwitcher.js"></script>

        <!-- Chartjs -->
        <script src="{{ asset('assets') }}/plugins/chart.js/Chart.bundle.min.js"></script>
        <!-- Circle progress -->
        <script src="{{ asset('assets') }}/plugins/circle-progress/circle-progress.min.js"></script>
        <!-- Datamap -->
        <script src="{{ asset('assets') }}/plugins/d3v3/index.js"></script>
        <script src="{{ asset('assets') }}/plugins/topojson/topojson.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datamaps/datamaps.world.min.js"></script>
        <!-- Morrisjs -->
        <script src="{{ asset('assets') }}/plugins/raphael/raphael.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/morris/morris.min.js"></script>
        <!-- Pignose Calender -->
        <script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
        <!-- ChartistJS -->
        <script src="{{ asset('assets') }}/plugins/chartist/js/chartist.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

        <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

        <script src="{{ asset('assets') }}/js/dashboard/dashboard-1.js"></script>

        <!-- DataTables Buttons -->
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

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
                        lengthMenu: "Tampilkan _MENU_ data",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
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

    </body>

</html>
