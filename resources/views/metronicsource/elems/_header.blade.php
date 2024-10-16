  <div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
      {{--<div class="container">--}}
      <div class="container-fluid">
        <!-- BEGIN LOGO -->
        <a class="brand" href="index.html">
        <img src="media/image/logo.png" alt="logo" />
        </a>
        @include('metronicsource.elems.__headerbase-menu', ['datas' => $datas])
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
        <img src="media/image/menu-toggler.png" alt="" />
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        @include('metronicsource.elems.__headerbase-right', ['datas' => $datas])
      </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
  </div>
