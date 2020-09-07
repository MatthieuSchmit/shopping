<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Dashboard 3</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.4/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('css')
    @stack('style')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">Shop</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                            class="fas fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{ URL::asset('images/logo1.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Shop</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{\Auth::user()->first_name}} {{\Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <x-menu-item
                            :href="route('admin')"
                            icon="tachometer-alt"
                            :active="currentRouteActive('admin')">
                        Tableau de bord
                    </x-menu-item>

                    <!-- ADMINISTRATION -->
                    <li class="nav-item has-treeview {{ menuOpen('shop.edit', 'shop.update', 'countries.index','countries.edit', 'countries.create', 'range.edit', 'colissimos.edit', 'states.index', 'states.edit', 'states.create', 'states.destroy.alert', 'pages.index', 'pages.edit', 'pages.create', 'pages.destroy.alert', 'maintenance.edit') }}">
                        <a href="#" class="nav-link {{ currentRouteActive('shop.edit', 'shop.update', 'countries.index','countries.edit', 'countries.create', 'range.edit', 'colissimos.edit', 'states.index', 'states.edit', 'states.create', 'states.destroy.alert', 'pages.index', 'pages.edit', 'pages.create', 'pages.destroy.alert', 'maintenance.edit') }}">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Administration
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <x-menu-item
                                    :href="route('shop.edit')"
                                    sub=true
                                    :active="currentRouteActive('shop.edit', 'shop.update')">
                                Boutique
                            </x-menu-item>
                            <x-menu-item
                                    :href="route('states.index')"
                                    :sub=true
                                    :active="currentRouteActive('states.index', 'states.edit', 'states.create', 'states.destroy.alert')">
                                Etats de commande
                            </x-menu-item>
                            <x-menu-item
                                    :href="route('countries.index')"
                                    :sub=true
                                    :active="currentRouteActive('countries.index', 'countries.edit', 'countries.create')">
                                Pays
                            </x-menu-item>

                            <x-menu-item
                                    :href="route('pages.index')"
                                    :sub=true
                                    :active="currentRouteActive('pages.index', 'pages.edit', 'pages.create', 'pages.destroy.alert')">
                                Pages
                            </x-menu-item>

                            <li class="nav-item has-treeview {{ menuOpen('range.edit', 'colissimos.edit') }}">
                                <a href="#" class="nav-link {{ currentRouteActive('range.edit', 'colissimos.edit') }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>
                                        Expéditions
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <x-menu-item :href="route('range.edit')" :sub=false :subsub=true :active="currentRouteActive('range.edit')">
                                        Plages
                                    </x-menu-item>
                                    <x-menu-item :href="route('colissimos.edit')" :sub=false :subsub=true :active="currentRouteActive('colissimos.edit')">
                                        Tarifs
                                    </x-menu-item>
                                </ul>
                            </li>

                            <x-menu-item :href="route('maintenance.edit')" :sub=true :active="currentRouteActive('maintenance.edit')">
                                Maintenance
                            </x-menu-item>

                        </ul>
                    </li>

                    <!-- CATALOGUE -->
                    <li class="nav-item has-treeview {{ menuOpen('categories.index', 'categories.edit', 'categories.create' , 'categories.destroy.alert', 'products.create', 'products.index', 'products.edit' , 'products.destroy.alert') }}">
                        <a href="#" class="nav-link {{ currentRouteActive('categories.index', 'categories.edit', 'categories.create' , 'categories.destroy.alert', 'products.create', 'products.index', 'products.edit' , 'products.destroy.alert') }}">
                            <i class="nav-icon fas fa-store"></i>
                            <p>
                                Catalogue
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <x-menu-item :href="route('categories.index')" :sub=true :active="currentRouteActive('categories.index', 'categories.edit' , 'categories.destroy.alert', 'categories.create')">
                                Catégories
                            </x-menu-item>
                            <x-menu-item :href="route('products.index')" :sub=true :active="currentRouteActive('products.index', 'products.edit' , 'products.destroy.alert')">
                                Produits
                            </x-menu-item>
                            <x-menu-item :href="route('products.create')" :sub=true :active="currentRouteActive('products.create')">
                                Nouveau produit
                            </x-menu-item>
                        </ul>
                    </li>

                    <!-- CLIENTS -->
                    <li class="nav-item has-treeview {{ menuOpen('customers.index', 'customers.show', 'back.addresses.index', 'back.addresses.show')}}">
                        <a href="#" class="nav-link {{ currentRouteActive('customers.index', 'customers.show', 'back.addresses.index', 'back.addresses.show')}}">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Clients
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <x-menu-item :href="route('customers.index')" :sub=true :active="currentRouteActive('customers.index', 'customers.show')">
                                Clients
                            </x-menu-item>
                            <x-menu-item :href="route('back.addresses.index')" :sub=true :active="currentRouteActive('back.addresses.index', 'back.addresses.show')">
                                Adresses
                            </x-menu-item>
                        </ul>
                    </li>

                    <!-- ORDERS -->
                    <x-menu-item
                            :href="route('orders.index')"
                            icon="shopping-basket"
                            :active="currentRouteActive('orders.index', 'orders.show')">
                        Commandes
                    </x-menu-item>

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
                        <h1 class="m-0 text-dark">{{$title}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home Admin</a></li>
                            <li class="breadcrumb-item active">Route</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.5
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="{{ URL::asset('js/adminlte.js') }}"></script>

@yield('js')
@stack('script')
</body>
</html>

