<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>CMS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>CMS</b>LARAVEL</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{URL::asset('images/admin.jpg')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">Kaan Karaca</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="images/admin.jpg" class="img-circle" alt="User Image">

                            <p>
                                Kaan Karaca - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="min-height: 100%;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{URL::asset('images/admin.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Kaan Karaca</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Yönetim</li>
            <li>
                <a href="/">
                    <i class="fa fa-dashboard"></i> <span>Anasayfa</span>
                </a>
            </li>
            <li class="treeview {{active(['admin.getgeneralsettings', 'admin.getsitesettings'])}}">
                <a href="#">
                    <i class="fa fa-gear"></i><span>Ayarlar</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{active('admin.getgeneralsettings')}}"><a
                                href="{{route('admin.getgeneralsettings')}}"><i class="fa fa-circle-o"></i>
                            Genel Ayarlar </a></li>
                    <li class="{{active('admin.getsitesettings')}}"><a href="{{route('admin.getsitesettings')}}"><i
                                    class="fa fa-circle-o"></i> Site Ayarları </a></li>
                </ul>
            </li>

            @foreach(App\Http\Controllers\SideBarController::getElementsAction() as $element)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pencil-square-o"></i> <span>{{$element->name}}</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.getaddelementtopic', ['id' => $element->id])}}"><i
                                        class="fa fa-circle-o"></i>{{$element->name}} Ekle</a></li>
                        <li><a href="{{route('admin.getallelementtopic', ['id' => $element->id])}}"><i
                                        class="fa fa-circle-o"></i> Tüm {{$element->name}} </a></li>
                        <li><a href="{{route('admin.getsidemenus', ['id' => $element->id])}}"><i
                                        class="fa fa-circle-o"></i> Özel Alan Yönetimi</a>
                        </li>
                        @if($element->isCategory)
                            <li class="active"><a
                                        href="{{route('admin.getaddelementcategory', ['id' => $element->id])}}"><i
                                            class="fa fa-circle-o"></i> Kategori Yönetimi
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endforeach
            <li class="header">Linkler</li>
            <li><a href="{{route('admin.getelement')}}"><i class="fa fa-circle-o text-red"></i>
                    <span>Yan Menü Ekle</span></a></li>
            <li><a href="{{route('contact')}}"><i class="fa fa-circle-o text-yellow"></i> <span>İletişim</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

@section('style')
    <style>
        .sidebar .sidebar-menu .active .treeview-menu {
            display: block;
        }
    </style>

    <script>
        var url = window.location;
        // Will only work if string in href matches with location
        $('ul.nav a[href="' + url + '"]').parent().addClass('active');

        // Will also work for relative and absolute hrefs
        $('ul.nav a').filter(function () {
            return this.href == url;
        }).parent().addClass('active');
    </script>
@endsection