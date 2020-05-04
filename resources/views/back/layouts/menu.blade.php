<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">

            <div class="sidebar-brand-text ">Admin Panel</div>
        </a>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item @if(Request::segment(2)=="panel") active  @endif">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Panel</span></a>
        </li>
        <li class="nav-item @if(Request::segment(2)=="getRegister") active  @endif">
            <a class="nav-link" href="{{route('getRegister')}}">
                <i class="fas fa-fw fa-user-plus"></i>
                <span>Qeydiyyat</span></a>
        </li>
        <li class="nav-item @if(Request::segment(2)=="getLogin") active  @endif">
            <a class="nav-link" href="{{route('getLogin')}}">
                <i class="fas fa-sign-in-alt"></i>
                <span>Daxil Ol</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            İçerik Yönetimi
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link  @if(Request::segment(2)=="makeleler") in @else collapsed @endif" href="{{asset('back/')}}/#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-edit"></i>
                <span>Məqalələr</span>
            </a>
            <div id="collapseTwo" class="collapse @if(Request::segment(2)=="makaleler") show  @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Məqalə Prosesləri</h6>
                    <a class="collapse-item @if(Request::segment(2)=="makaleler" and !Request::segment(3)) active  @endif" href="{{route('makaleler.index')}}">Bütün Məqalələr</a>
                    <a class="collapse-item @if(Request::segment(2)=="makaleler" and Request::segment(3)=="create") active  @endif" href="{{route('makaleler.create')}}">Məqalə Yarat</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" @if(Request::segment(2)=="kategoriler") style="color: white!important;" @endif  href="{{route('category.index')}}">
                <i class="fas fa-fw fa-list" @if(Request::segment(2)=="kategoriler") style="color: white!important;" @endif></i>
                <span>Kategoriyalar</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  @if(Request::segment(2)=="sayfalar") in @else collapsed @endif" href="" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
                <i class="fas fa-fw fa-folder"></i>
                <span>Səhifələr</span>
            </a>
            <div id="collapsePage" class="collapse @if(Request::segment(2)=="sayfalar") show  @endif" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Səhifə Prosesləri</h6>
                    <a class="collapse-item @if(Request::segment(2)=="sayfalar" and !Request::segment(3)) active  @endif" href="{{route('page.index')}}">Bütün Səhifələr</a>
                    <a class="collapse-item @if(Request::segment(2)=="sayfalar" and Request::segment(3)=="olustur") active  @endif" href="{{route('page.create')}}">Səhifə Yarat</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Sayt Ayarlari
        </div>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('config.index')}}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Ayarlar</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <!-- Nav Item - Messages -->

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{\Illuminate\Support\Facades\Auth::user()->name ?? ""}}</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route("logout")}}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Çıxış
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>


            <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                    <a href="{{route('homepage')}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-globe fa-sm text-white-50"></i> Saytı Görüntülə</a>
                </div>

