<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard </title>

    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" class="nav-link">Aller sur le site</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->



            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">

                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <!-- SidebarSearch Form -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @if (Auth::user()->isAdmin())
                            <h2>Admin</h2>
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Accueil
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/mes-factures') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-invoice"></i>
                                    <p>
                                        Mes factures
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/ajouter-utilisateur') }}" class="nav-link">
                                    <i class="nav-icon fas fa-user-plus"></i>
                                    <p>
                                        Ajouter un utilisateur
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/gerer-utilisateur') }}" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Gérer utilisateur
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/ajouter-service') }}" class="nav-link">
                                    <i class="nav-icon fas fa-briefcase"></i>
                                    <p>
                                        Ajouter un service
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/gerer-service') }}" class="nav-link">
                                    <i class="nav-icon fas fa-briefcase"></i>
                                    <p>
                                        Gérer service
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/ajouter-facture') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-invoice"></i>
                                    <p>
                                        Ajouter un facture
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/gerer-facture') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-invoice"></i>
                                    <p>
                                        Gérer facture
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/payements') }}" class="nav-link">
                                    <i class="nav-icon fas fa-sack-dollar"></i>
                                    <p>
                                        Payements
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->isClient())
                            <h2>Client</h2>
                            <li class="nav-item">
                                <a href="{{ url('/mes-factures') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-invoice"></i>
                                    <p>
                                        Mes factures
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->isComptable())
                            <h2>Comptable</h2>
                            <li class="nav-item">
                                <a href="{{ url('/mes-factures') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-invoice"></i>
                                    <p>
                                        Mes factures
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/ajouter-facture') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-invoice"></i>
                                    <p>
                                        Ajouter un facture
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/gerer-facture') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-invoice"></i>
                                    <p>
                                        Gérer facture
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/payements') }}" class="nav-link">
                                    <i class="nav-icon fas fa-sack-dollar"></i>
                                    <p>
                                        Payements
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->isSecretaire())
                            <h2>Secretaire</h2>
                            <li class="nav-item">
                                <a href="{{ url('/mes-factures') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-invoice"></i>
                                    <p>
                                        Mes factures
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/ajouter-utilisateur') }}" class="nav-link">
                                    <i class="nav-icon fas fa-user-plus"></i>
                                    <p>
                                        Ajouter un utilisateur
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/gerer-utilisateur') }}" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Gérer utilisateur
                                    </p>
                                </a>
                            </li>
                        @endif






                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-right-from-bracket"></i>
                                <p>
                                    Se déconnecter
                                </p>
                            </a>
                        </li>

                        {{-- ----------------------------------------------------------------------------------------------------------------------------- --}}


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"></h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content --------------------------------------------------------------------------------------------->
            <div class="content">
                @yield('contenu')
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
