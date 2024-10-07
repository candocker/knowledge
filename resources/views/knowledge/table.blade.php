@extends('layouts.table')
@section('content')
  <!-- BEGIN HEADER -->
  <div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
      <div class="container-fluid">
        <!-- BEGIN LOGO -->
        <a class="brand" href="index.html">
        <img src="{{$commonAssetUrl}}/metronic/media/image/logo.png" alt="logo" />
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
        <img src="{{$commonAssetUrl}}/metronic/media/image/menu-toggler.png" alt="" />
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav pull-right">
          <!-- BEGIN NOTIFICATION DROPDOWN -->
          <li class="dropdown" id="header_notification_bar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-warning-sign"></i>
            <span class="badge">6</span>
            </a>
            <ul class="dropdown-menu extended notification">
              <li>
                <p>You have 14 new notifications</p>
              </li>
              <li>
                <a href="#">
                <span class="label label-success"><i class="icon-plus"></i></span>
                New user registered.
                <span class="time">Just now</span>
                </a>
              </li>
              <li>
                <a href="#">
                <span class="label label-important"><i class="icon-bolt"></i></span>
                Server #12 overloaded.
                <span class="time">15 mins</span>
                </a>
              </li>
              <li>
                <a href="#">
                <span class="label label-warning"><i class="icon-bell"></i></span>
                Server #2 not respoding.
                <span class="time">22 mins</span>
                </a>
              </li>
              <li>
                <a href="#">
                <span class="label label-info"><i class="icon-bullhorn"></i></span>
                Application error.
                <span class="time">40 mins</span>
                </a>
              </li>
              <li>
                <a href="#">
                <span class="label label-important"><i class="icon-bolt"></i></span>
                Database overloaded 68%.
                <span class="time">2 hrs</span>
                </a>
              </li>
              <li>
                <a href="#">
                <span class="label label-important"><i class="icon-bolt"></i></span>
                2 user IP blocked.
                <span class="time">5 hrs</span>
                </a>
              </li>
              <li class="external">
                <a href="#">See all notifications <i class="m-icon-swapright"></i></a>
              </li>
            </ul>
          </li>
          <!-- END NOTIFICATION DROPDOWN -->
          <!-- BEGIN INBOX DROPDOWN -->
          <li class="dropdown" id="header_inbox_bar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-envelope"></i>
            <span class="badge">5</span>
            </a>
            <ul class="dropdown-menu extended inbox">
              <li>
                <p>You have 12 new messages</p>
              </li>
              <li>
                <a href="inbox.html?a=view">
                <span class="photo"><img src="{{$commonAssetUrl}}/metronic/media/image/avatar2.jpg" alt="" /></span>
                <span class="subject">
                <span class="from">Lisa Wong</span>
                <span class="time">Just Now</span>
                </span>
                <span class="message">
                Vivamus sed auctor nibh congue nibh. auctor nibh
                auctor nibh...
                </span>
                </a>
              </li>
              <li>
                <a href="inbox.html?a=view">
                <span class="photo"><img src="{{$commonAssetUrl}}/metronic/media/image/avatar3.jpg" alt="" /></span>
                <span class="subject">
                <span class="from">Richard Doe</span>
                <span class="time">16 mins</span>
                </span>
                <span class="message">
                Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh
                auctor nibh...
                </span>
                </a>
              </li>
              <li>
                <a href="inbox.html?a=view">
                <span class="photo"><img src="{{$commonAssetUrl}}/metronic/media/image/avatar1.jpg" alt="" /></span>
                <span class="subject">
                <span class="from">Bob Nilson</span>
                <span class="time">2 hrs</span>
                </span>
                <span class="message">
                Vivamus sed nibh auctor nibh congue nibh. auctor nibh
                auctor nibh...
                </span>
                </a>
              </li>
              <li class="external">
                <a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a>
              </li>
            </ul>
          </li>
          <!-- END INBOX DROPDOWN -->
          <!-- BEGIN TODO DROPDOWN -->
          <li class="dropdown" id="header_task_bar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-tasks"></i>
            <span class="badge">5</span>
            </a>
            <ul class="dropdown-menu extended tasks">
              <li>
                <p>You have 12 pending tasks</p>
              </li>
              <li>
                <a href="#">
                <span class="task">
                <span class="desc">New release v1.2</span>
                <span class="percent">30%</span>
                </span>
                <span class="progress progress-success ">
                <span style="width: 30%;" class="bar"></span>
                </span>
                </a>
              </li>
              <li>
                <a href="#">
                <span class="task">
                <span class="desc">Application deployment</span>
                <span class="percent">65%</span>
                </span>
                <span class="progress progress-danger progress-striped active">
                <span style="width: 65%;" class="bar"></span>
                </span>
                </a>
              </li>
              <li>
                <a href="#">
                <span class="task">
                <span class="desc">Mobile app release</span>
                <span class="percent">98%</span>
                </span>
                <span class="progress progress-success">
                <span style="width: 98%;" class="bar"></span>
                </span>
                </a>
              </li>
              <li>
                <a href="#">
                <span class="task">
                <span class="desc">Database migration</span>
                <span class="percent">10%</span>
                </span>
                <span class="progress progress-warning progress-striped">
                <span style="width: 10%;" class="bar"></span>
                </span>
                </a>
              </li>
              <li>
                <a href="#">
                <span class="task">
                <span class="desc">Web server upgrade</span>
                <span class="percent">58%</span>
                </span>
                <span class="progress progress-info">
                <span style="width: 58%;" class="bar"></span>
                </span>
                </a>
              </li>
              <li>
                <a href="#">
                <span class="task">
                <span class="desc">Mobile development</span>
                <span class="percent">85%</span>
                </span>
                <span class="progress progress-success">
                <span style="width: 85%;" class="bar"></span>
                </span>
                </a>
              </li>
              <li class="external">
                <a href="#">See all tasks <i class="m-icon-swapright"></i></a>
              </li>
            </ul>
          </li>
          <!-- END TODO DROPDOWN -->
          <!-- BEGIN USER LOGIN DROPDOWN -->
          <li class="dropdown user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img alt="" src="{{$commonAssetUrl}}/metronic/media/image/avatar1_small.jpg" />
            <span class="username">Bob Nilson</span>
            <i class="icon-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a></li>
              <li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
              <li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>
              <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
              <li class="divider"></li>
              <li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>
              <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
            </ul>
          </li>
          <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
      </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
  </div>
  <!-- END HEADER -->
  <!-- BEGIN CONTAINER -->
  <div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar nav-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <ul class="page-sidebar-menu">
        <li>
          <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
          <div class="sidebar-toggler hidden-phone"></div>
          <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <li>
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
        <li class="start ">
          <a href="index.html">
          <i class="icon-home"></i>
          <span class="title">Dashboard</span>
          </a>
        </li>
        <li class="">
          <a href="javascript:;">
          <i class="icon-cogs"></i>
          <span class="title">Layouts</span>
          <span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li >
              <a href="layout_horizontal_sidebar_menu.html">
              Horzontal & Sidebar Menu</a>
            </li>
            <li >
              <a href="layout_horizontal_menu1.html">
              Horzontal Menu 1</a>
            </li>
            <li >
              <a href="layout_horizontal_menu2.html">
              Horzontal Menu 2</a>
            </li>
            <li >
              <a href="layout_promo.html">
              Promo Page</a>
            </li>
            <li >
              <a href="layout_email.html">
              Email Templates</a>
            </li>
            <li >
              <a href="layout_ajax.html">
              Content Loading via Ajax</a>
            </li>
            <li >
              <a href="layout_sidebar_closed.html">
              Sidebar Closed Page</a>
            </li>
            <li >
              <a href="layout_blank_page.html">
              Blank Page</a>
            </li>
            <li >
              <a href="layout_boxed_page.html">
              Boxed Page</a>
            </li>
            <li >
              <a href="layout_boxed_not_responsive.html">
              Non-Responsive Boxed Layout</a>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="javascript:;">
          <i class="icon-bookmark-empty"></i>
          <span class="title">UI Features</span>
          <span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li >
              <a href="ui_general.html">
              General</a>
            </li>
            <li >
              <a href="ui_buttons.html">
              Buttons</a>
            </li>
            <li >
              <a href="ui_modals.html">
              Enhanced Modals</a>
            </li>
            <li >
              <a href="ui_tabs_accordions.html">
              Tabs & Accordions</a>
            </li>
            <li >
              <a href="ui_jqueryui.html">
              jQuery UI Components</a>
            </li>
            <li >
              <a href="ui_sliders.html">
              Sliders</a>
            </li>
            <li >
              <a href="ui_tiles.html">
              Tiles</a>
            </li>
            <li >
              <a href="ui_typography.html">
              Typography</a>
            </li>
            <li >
              <a href="ui_tree.html">
              Tree View</a>
            </li>
            <li >
              <a href="ui_nestable.html">
              Nestable List</a>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="javascript:;">
          <i class="icon-table"></i>
          <span class="title">Form Stuff</span>
          <span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li >
              <a href="form_layout.html">
              Form Layouts</a>
            </li>
            <li >
              <a href="form_samples.html">
              Advance Form Samples</a>
            </li>
            <li >
              <a href="form_component.html">
              Form Components</a>
            </li>
            <li >
              <a href="form_wizard.html">
              Form Wizard</a>
            </li>
            <li >
              <a href="form_validation.html">
              Form Validation</a>
            </li>
            <li >
              <a href="form_fileupload.html">
              Multiple File Upload</a>
            </li>
            <li >
              <a href="form_dropzone.html">
              Dropzone File Upload</a>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="javascript:;">
          <i class="icon-briefcase"></i>
          <span class="title">Pages</span>
          <span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li >
              <a href="page_timeline.html">
              <i class="icon-time"></i>
              Timeline</a>
            </li>
            <li >
              <a href="page_coming_soon.html">
              <i class="icon-cogs"></i>
              Coming Soon</a>
            </li>
            <li >
              <a href="page_blog.html">
              <i class="icon-comments"></i>
              Blog</a>
            </li>
            <li >
              <a href="page_blog_item.html">
              <i class="icon-font"></i>
              Blog Post</a>
            </li>
            <li >
              <a href="page_news.html">
              <i class="icon-coffee"></i>
              News</a>
            </li>
            <li >
              <a href="page_news_item.html">
              <i class="icon-bell"></i>
              News View</a>
            </li>
            <li >
              <a href="page_about.html">
              <i class="icon-group"></i>
              About Us</a>
            </li>
            <li >
              <a href="page_contact.html">
              <i class="icon-envelope-alt"></i>
              Contact Us</a>
            </li>
            <li >
              <a href="page_calendar.html">
              <i class="icon-calendar"></i>
              Calendar</a>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="javascript:;">
          <i class="icon-gift"></i>
          <span class="title">Extra</span>
          <span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li >
              <a href="extra_profile.html">
              User Profile</a>
            </li>
            <li >
              <a href="extra_lock.html">
              Lock Screen</a>
            </li>
            <li >
              <a href="extra_faq.html">
              FAQ</a>
            </li>
            <li >
              <a href="inbox.html">
              Inbox</a>
            </li>
            <li >
              <a href="extra_search.html">
              Search Results</a>
            </li>
            <li >
              <a href="extra_invoice.html">
              Invoice</a>
            </li>
            <li >
              <a href="extra_pricing_table.html">
              Pricing Tables</a>
            </li>
            <li >
              <a href="extra_image_manager.html">
              Image Manager</a>
            </li>
            <li >
              <a href="extra_404_option1.html">
              404 Page Option 1</a>
            </li>
            <li >
              <a href="extra_404_option2.html">
              404 Page Option 2</a>
            </li>
            <li >
              <a href="extra_404_option3.html">
              404 Page Option 3</a>
            </li>
            <li >
              <a href="extra_500_option1.html">
              500 Page Option 1</a>
            </li>
            <li >
              <a href="extra_500_option2.html">
              500 Page Option 2</a>
            </li>
          </ul>
        </li>
        <li>
          <a class="active" href="javascript:;">
          <i class="icon-sitemap"></i>
          <span class="title">3 Level Menu</span>
          <span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="javascript:;">
              Item 1
              <span class="arrow"></span>
              </a>
              <ul class="sub-menu">
                <li><a href="#">Sample Link 1</a></li>
                <li><a href="#">Sample Link 2</a></li>
                <li><a href="#">Sample Link 3</a></li>
              </ul>
            </li>
            <li>
              <a href="javascript:;">
              Item 1
              <span class="arrow"></span>
              </a>
              <ul class="sub-menu">
                <li><a href="#">Sample Link 1</a></li>
                <li><a href="#">Sample Link 1</a></li>
                <li><a href="#">Sample Link 1</a></li>
              </ul>
            </li>
            <li>
              <a href="#">
              Item 3
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:;">
          <i class="icon-folder-open"></i>
          <span class="title">4 Level Menu</span>
          <span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="javascript:;">
              <i class="icon-cogs"></i>
              Item 1
              <span class="arrow"></span>
              </a>
              <ul class="sub-menu">
                <li>
                  <a href="javascript:;">
                  <i class="icon-user"></i>
                  Sample Link 1
                  <span class="arrow"></span>
                  </a>
                  <ul class="sub-menu">
                    <li><a href="#"><i class="icon-remove"></i> Sample Link 1</a></li>
                    <li><a href="#"><i class="icon-pencil"></i> Sample Link 1</a></li>
                    <li><a href="#"><i class="icon-edit"></i> Sample Link 1</a></li>
                  </ul>
                </li>
                <li><a href="#"><i class="icon-user"></i>  Sample Link 1</a></li>
                <li><a href="#"><i class="icon-external-link"></i>  Sample Link 2</a></li>
                <li><a href="#"><i class="icon-bell"></i>  Sample Link 3</a></li>
              </ul>
            </li>
            <li>
              <a href="javascript:;">
              <i class="icon-globe"></i>
              Item 2
              <span class="arrow"></span>
              </a>
              <ul class="sub-menu">
                <li><a href="#"><i class="icon-user"></i>  Sample Link 1</a></li>
                <li><a href="#"><i class="icon-external-link"></i>  Sample Link 1</a></li>
                <li><a href="#"><i class="icon-bell"></i>  Sample Link 1</a></li>
              </ul>
            </li>
            <li>
              <a href="#">
              <i class="icon-folder-open"></i>
              Item 3
              </a>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="javascript:;">
          <i class="icon-user"></i>
          <span class="title">Login Options</span>
          <span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li >
              <a href="login.html">
              Login Form 1</a>
            </li>
            <li >
              <a href="login_soft.html">
              Login Form 2</a>
            </li>
          </ul>
        </li>
        <li class="active ">
          <a href="javascript:;">
          <i class="icon-th"></i>
          <span class="title">Data Tables</span>
          <span class="selected"></span>
          <span class="arrow open"></span>
          </a>
          <ul class="sub-menu">
            <li >
              <a href="table_basic.html">
              Basic Tables</a>
            </li>
            <li class="active">
              <a href="table_responsive.html">
              Responsive Tables</a>
            </li>
            <li >
              <a href="table_managed.html">
              Managed Tables</a>
            </li>
            <li >
              <a href="table_editable.html">
              Editable Tables</a>
            </li>
            <li >
              <a href="table_advanced.html">
              Advanced Tables</a>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="javascript:;">
          <i class="icon-file-text"></i>
          <span class="title">Portlets</span>
          <span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li >
              <a href="portlet_general.html">
              General Portlets</a>
            </li>
            <li >
              <a href="portlet_draggable.html">
              Draggable Portlets</a>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="javascript:;">
          <i class="icon-map-marker"></i>
          <span class="title">Maps</span>
          <span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li >
              <a href="maps_google.html">
              Google Maps</a>
            </li>
            <li >
              <a href="maps_vector.html">
              Vector Maps</a>
            </li>
          </ul>
        </li>
        <li class="last ">
          <a href="charts.html">
          <i class="icon-bar-chart"></i>
          <span class="title">Visual Charts</span>
          </a>
        </li>
      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content">
      <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <div id="portlet-config" class="modal hide">
        <div class="modal-header">
          <button data-dismiss="modal" class="close" type="button"></button>
          <h3>portlet Settings</h3>
        </div>
        <div class="modal-body">
          <p>Here will be a configuration form</p>
        </div>
      </div>
      <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <!-- BEGIN PAGE CONTAINER-->
      <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN STYLE CUSTOMIZER -->
            <div class="color-panel hidden-phone">
              <div class="color-mode-icons icon-color"></div>
              <div class="color-mode-icons icon-color-close"></div>
              <div class="color-mode">
                <p>THEME COLOR</p>
                <ul class="inline">
                  <li class="color-black current color-default" data-style="default"></li>
                  <li class="color-blue" data-style="blue"></li>
                  <li class="color-brown" data-style="brown"></li>
                  <li class="color-purple" data-style="purple"></li>
                  <li class="color-grey" data-style="grey"></li>
                  <li class="color-white color-light" data-style="light"></li>
                </ul>
                <label>
                  <span>Layout</span>
                  <select class="layout-option m-wrap small">
                    <option value="fluid" selected>Fluid</option>
                    <option value="boxed">Boxed</option>
                  </select>
                </label>
                <label>
                  <span>Header</span>
                  <select class="header-option m-wrap small">
                    <option value="fixed" selected>Fixed</option>
                    <option value="default">Default</option>
                  </select>
                </label>
                <label>
                  <span>Sidebar</span>
                  <select class="sidebar-option m-wrap small">
                    <option value="fixed">Fixed</option>
                    <option value="default" selected>Default</option>
                  </select>
                </label>
                <label>
                  <span>Footer</span>
                  <select class="footer-option m-wrap small">
                    <option value="fixed">Fixed</option>
                    <option value="default" selected>Default</option>
                  </select>
                </label>
              </div>
            </div>
            <!-- END BEGIN STYLE CUSTOMIZER -->
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
              Responsive Tables <small>responsive table samples</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
              </li>
              <li>
                <a href="#">Data Tables</a>
                <i class="icon-angle-right"></i>
              </li>
              <li><a href="#">Responsive Tables</a></li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
          </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <div class="alert alert-success">
              <button class="close" data-dismiss="alert"></button>
              Please try to re-size your browser window in order to see the tables in responsive mode.<br>
              <span class="label label-important">NOTE:</span>&nbsp;This feature is supported by Internet Explorer 10, Latest Firefox, Chrome, Opera and Safari
            </div>
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Flip Scroll</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body flip-scroll">
                <table class="table-bordered table-striped table-condensed flip-content">
                  <thead class="flip-content">
                    <tr>
                      <th>Code</th>
                      <th>Company</th>
                      <th class="numeric">Price</th>
                      <th class="numeric">Change</th>
                      <th class="numeric">Change %</th>
                      <th class="numeric">Open</th>
                      <th class="numeric">High</th>
                      <th class="numeric">Low</th>
                      <th class="numeric">Volume</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>AAC</td>
                      <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                      <td class="numeric">$1.38</td>
                      <td class="numeric">-0.01</td>
                      <td class="numeric">-0.36%</td>
                      <td class="numeric">$1.39</td>
                      <td class="numeric">$1.39</td>
                      <td class="numeric">$1.38</td>
                      <td class="numeric">9,395</td>
                    </tr>
                    <tr>
                      <td>AAD</td>
                      <td>ARDENT LEISURE GROUP</td>
                      <td class="numeric">$1.15</td>
                      <td class="numeric">  +0.02</td>
                      <td class="numeric">1.32%</td>
                      <td class="numeric">$1.14</td>
                      <td class="numeric">$1.15</td>
                      <td class="numeric">$1.13</td>
                      <td class="numeric">56,431</td>
                    </tr>
                    <tr>
                      <td>AAX</td>
                      <td>AUSENCO LIMITED</td>
                      <td class="numeric">$4.00</td>
                      <td class="numeric">-0.04</td>
                      <td class="numeric">-0.99%</td>
                      <td class="numeric">$4.01</td>
                      <td class="numeric">$4.05</td>
                      <td class="numeric">$4.00</td>
                      <td class="numeric">90,641</td>
                    </tr>
                    <tr>
                      <td>ABC</td>
                      <td>ADELAIDE BRIGHTON LIMITED</td>
                      <td class="numeric">$3.00</td>
                      <td class="numeric">  +0.06</td>
                      <td class="numeric">2.04%</td>
                      <td class="numeric">$2.98</td>
                      <td class="numeric">$3.00</td>
                      <td class="numeric">$2.96</td>
                      <td class="numeric">862,518</td>
                    </tr>
                    <tr>
                      <td>ABP</td>
                      <td>ABACUS PROPERTY GROUP</td>
                      <td class="numeric">$1.91</td>
                      <td class="numeric">0.00</td>
                      <td class="numeric">0.00%</td>
                      <td class="numeric">$1.92</td>
                      <td class="numeric">$1.93</td>
                      <td class="numeric">$1.90</td>
                      <td class="numeric">595,701</td>
                    </tr>
                    <tr>
                      <td>ABY</td>
                      <td>ADITYA BIRLA MINERALS LIMITED</td>
                      <td class="numeric">$0.77</td>
                      <td class="numeric">  +0.02</td>
                      <td class="numeric">2.00%</td>
                      <td class="numeric">$0.76</td>
                      <td class="numeric">$0.77</td>
                      <td class="numeric">$0.76</td>
                      <td class="numeric">54,567</td>
                    </tr>
                    <tr>
                      <td>ACR</td>
                      <td>ACRUX LIMITED</td>
                      <td class="numeric">$3.71</td>
                      <td class="numeric">  +0.01</td>
                      <td class="numeric">0.14%</td>
                      <td class="numeric">$3.70</td>
                      <td class="numeric">$3.72</td>
                      <td class="numeric">$3.68</td>
                      <td class="numeric">191,373</td>
                    </tr>
                    <tr>
                      <td>ADU</td>
                      <td>ADAMUS RESOURCES LIMITED</td>
                      <td class="numeric">$0.72</td>
                      <td class="numeric">0.00</td>
                      <td class="numeric">0.00%</td>
                      <td class="numeric">$0.73</td>
                      <td class="numeric">$0.74</td>
                      <td class="numeric">$0.72</td>
                      <td class="numeric">8,602,291</td>
                    </tr>
                    <tr>
                      <td>AGG</td>
                      <td>ANGLOGOLD ASHANTI LIMITED</td>
                      <td class="numeric">$7.81</td>
                      <td class="numeric">-0.22</td>
                      <td class="numeric">-2.74%</td>
                      <td class="numeric">$7.82</td>
                      <td class="numeric">$7.82</td>
                      <td class="numeric">$7.81</td>
                      <td class="numeric">148</td>
                    </tr>
                    <tr>
                      <td>AGK</td>
                      <td>AGL ENERGY LIMITED</td>
                      <td class="numeric">$13.82</td>
                      <td class="numeric">  +0.02</td>
                      <td class="numeric">0.14%</td>
                      <td class="numeric">$13.83</td>
                      <td class="numeric">$13.83</td>
                      <td class="numeric">$13.67</td>
                      <td class="numeric">846,403</td>
                    </tr>
                    <tr>
                      <td>AGO</td>
                      <td>ATLAS IRON LIMITED</td>
                      <td class="numeric">$3.17</td>
                      <td class="numeric">-0.02</td>
                      <td class="numeric">-0.47%</td>
                      <td class="numeric">$3.11</td>
                      <td class="numeric">$3.22</td>
                      <td class="numeric">$3.10</td>
                      <td class="numeric">5,416,303</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>No More Tables</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body no-more-tables">
                <table class="table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
                      <th>Code</th>
                      <th>Company</th>
                      <th class="numeric">Price</th>
                      <th class="numeric">Change</th>
                      <th class="numeric">Change %</th>
                      <th class="numeric">Open</th>
                      <th class="numeric">High</th>
                      <th class="numeric">Low</th>
                      <th class="numeric">Volume</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-title="Code">AAC</td>
                      <td data-title="Company">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                      <td data-title="Price" class="numeric">$1.38</td>
                      <td data-title="Change" class="numeric">-0.01</td>
                      <td data-title="Change %" class="numeric">-0.36%</td>
                      <td data-title="Open" class="numeric">$1.39</td>
                      <td data-title="High" class="numeric">$1.39</td>
                      <td data-title="Low" class="numeric">$1.38</td>
                      <td data-title="Volume" class="numeric">9,395</td>
                    </tr>
                    <tr>
                      <td data-title="Code">AAD</td>
                      <td data-title="Company">ARDENT LEISURE GROUP</td>
                      <td data-title="Price" class="numeric">$1.15</td>
                      <td data-title="Change" class="numeric">  +0.02</td>
                      <td data-title="Change %" class="numeric">1.32%</td>
                      <td data-title="Open" class="numeric">$1.14</td>
                      <td data-title="High" class="numeric">$1.15</td>
                      <td data-title="Low" class="numeric">$1.13</td>
                      <td data-title="Volume" class="numeric">56,431</td>
                    </tr>
                    <tr>
                      <td data-title="Code">AAX</td>
                      <td data-title="Company">AUSENCO LIMITED</td>
                      <td data-title="Price" class="numeric">$4.00</td>
                      <td data-title="Change" class="numeric">-0.04</td>
                      <td data-title="Change %" class="numeric">-0.99%</td>
                      <td data-title="Open" class="numeric">$4.01</td>
                      <td data-title="High" class="numeric">$4.05</td>
                      <td data-title="Low" class="numeric">$4.00</td>
                      <td data-title="Volume" class="numeric">90,641</td>
                    </tr>
                    <tr>
                      <td data-title="Code">ABC</td>
                      <td data-title="Company">ADELAIDE BRIGHTON LIMITED</td>
                      <td data-title="Price" class="numeric">$3.00</td>
                      <td data-title="Change" class="numeric">  +0.06</td>
                      <td data-title="Change %" class="numeric">2.04%</td>
                      <td data-title="Open" class="numeric">$2.98</td>
                      <td data-title="High" class="numeric">$3.00</td>
                      <td data-title="Low" class="numeric">$2.96</td>
                      <td data-title="Volume" class="numeric">862,518</td>
                    </tr>
                    <tr>
                      <td data-title="Code">ABP</td>
                      <td data-title="Company">ABACUS PROPERTY GROUP</td>
                      <td data-title="Price" class="numeric">$1.91</td>
                      <td data-title="Change" class="numeric">0.00</td>
                      <td data-title="Change %" class="numeric">0.00%</td>
                      <td data-title="Open" class="numeric">$1.92</td>
                      <td data-title="High" class="numeric">$1.93</td>
                      <td data-title="Low" class="numeric">$1.90</td>
                      <td data-title="Volume" class="numeric">595,701</td>
                    </tr>
                    <tr>
                      <td data-title="Code">ABY</td>
                      <td data-title="Company">ADITYA BIRLA MINERALS LIMITED</td>
                      <td data-title="Price" class="numeric">$0.77</td>
                      <td data-title="Change" class="numeric">  +0.02</td>
                      <td data-title="Change %" class="numeric">2.00%</td>
                      <td data-title="Open" class="numeric">$0.76</td>
                      <td data-title="High" class="numeric">$0.77</td>
                      <td data-title="Low" class="numeric">$0.76</td>
                      <td data-title="Volume" class="numeric">54,567</td>
                    </tr>
                    <tr>
                      <td data-title="Code">ACR</td>
                      <td data-title="Company">ACRUX LIMITED</td>
                      <td data-title="Price" class="numeric">$3.71</td>
                      <td data-title="Change" class="numeric">  +0.01</td>
                      <td data-title="Change %" class="numeric">0.14%</td>
                      <td data-title="Open" class="numeric">$3.70</td>
                      <td data-title="High" class="numeric">$3.72</td>
                      <td data-title="Low" class="numeric">$3.68</td>
                      <td data-title="Volume" class="numeric">191,373</td>
                    </tr>
                    <tr>
                      <td data-title="Code">ADU</td>
                      <td data-title="Company">ADAMUS RESOURCES LIMITED</td>
                      <td data-title="Price" class="numeric">$0.72</td>
                      <td data-title="Change" class="numeric">0.00</td>
                      <td data-title="Change %" class="numeric">0.00%</td>
                      <td data-title="Open" class="numeric">$0.73</td>
                      <td data-title="High" class="numeric">$0.74</td>
                      <td data-title="Low" class="numeric">$0.72</td>
                      <td data-title="Volume" class="numeric">8,602,291</td>
                    </tr>
                    <tr>
                      <td data-title="Code">AGG</td>
                      <td data-title="Company">ANGLOGOLD ASHANTI LIMITED</td>
                      <td data-title="Price" class="numeric">$7.81</td>
                      <td data-title="Change" class="numeric">-0.22</td>
                      <td data-title="Change %" class="numeric">-2.74%</td>
                      <td data-title="Open" class="numeric">$7.82</td>
                      <td data-title="High" class="numeric">$7.82</td>
                      <td data-title="Low" class="numeric">$7.81</td>
                      <td data-title="Volume" class="numeric">148</td>
                    </tr>
                    <tr>
                      <td data-title="Code">AGK</td>
                      <td data-title="Company">AGL ENERGY LIMITED</td>
                      <td data-title="Price" class="numeric">$13.82</td>
                      <td data-title="Change" class="numeric">  +0.02</td>
                      <td data-title="Change %" class="numeric">0.14%</td>
                      <td data-title="Open" class="numeric">$13.83</td>
                      <td data-title="High" class="numeric">$13.83</td>
                      <td data-title="Low" class="numeric">$13.67</td>
                      <td data-title="Volume" class="numeric">846,403</td>
                    </tr>
                    <tr>
                      <td data-title="Code">AGO</td>
                      <td data-title="Company">ATLAS IRON LIMITED</td>
                      <td data-title="Price" class="numeric">$3.17</td>
                      <td data-title="Change" class="numeric">-0.02</td>
                      <td data-title="Change %" class="numeric">-0.47%</td>
                      <td data-title="Open" class="numeric">$3.11</td>
                      <td data-title="High" class="numeric">$3.22</td>
                      <td data-title="Low" class="numeric">$3.10</td>
                      <td data-title="Volume" class="numeric">5,416,303</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
      <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
  </div>
  <!-- END CONTAINER -->
  <!-- BEGIN FOOTER -->
  <div class="footer">
    <div class="footer-inner">
      2013 &copy; Metronic by keenthemes.
    </div>
    <div class="footer-tools">
      <span class="go-top">
      <i class="icon-angle-up"></i>
      </span>
    </div>
  </div>
  <!-- END FOOTER -->
@endsection