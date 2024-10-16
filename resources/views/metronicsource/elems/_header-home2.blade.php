  <!-- BEGIN HEADER -->
  <div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
      <div class="container-fluid">
        <!-- BEGIN LOGO -->
        <a class="brand" href="index.html">
        <img src="media/image/logo.png" alt="logo" />
        </a>
        <!-- END LOGO -->
        <!-- BEGIN HORIZANTAL MENU -->
        <div class="navbar hor-menu hidden-phone hidden-tablet">
          <div class="navbar-inner">
            <ul class="nav">
              <li class="visible-phone visible-tablet">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search">
                  <div class="input-box">
                    <a href="javascript:;" class="remove"></a>
                    <input type="text" placeholder="Search..." />
                    <input type="button" class="submit" value=" " />
                  </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
              </li>
              <li class="active"><a href="index.html">Dashboard<span class="selected"></span></a></li>
              <li>
                <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                  Sections<span class="arrow"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Section 1</a></li>
                  <li><a href="#">Section 2</a></li>
                </ul>
                <b class="caret-out"></b>
              </li>
              <li><a href="">Tables</a></li>
              <li>
                <a data-toggle="dropdown" class="dropdown-toggle" href="">Extra<span class="arrow"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="index.html">About Us</a></li>
                  <li><a href="index.html">Services</a></li>
                </ul>
                <b class="caret-out"></b>
              </li>
              <li>
                <span class="hor-menu-search-form-toggler">&nbsp;</span>
                <div class="search-form hidden-phone hidden-tablet">
                  <form class="form-search">
                    <div class="input-append">
                      <input type="text" placeholder="Search..." class="m-wrap">
                      <button type="button" class="btn"></button>
                    </div>
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- END HORIZANTAL MENU -->
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
  <!-- END HEADER -->
