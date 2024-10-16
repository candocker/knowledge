@php
$icons = [
    'briefcase', 'time', 'comments', 'font', 'coffee', 'bell', 'group', 'envelope-alt', 'calendar',
    'bookmark-empty', 'table', 'gift', 'user', 'th', 'file-text', 'cogs', 'th-list', 'map-marker'
];
@endphp
    {{--<div class="page-sidebar nav-collapse collapse visible-phone visible-tablet">--}}
    <div class="page-sidebar nav-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <ul class="page-sidebar-menu">
      {{--<ul class="page-sidebar-menu visible-phone visible-tablet">--}}
      {{--<ul class="page-sidebar-menu hidden-phone hidden-tablet">--}}
        <li>
          <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
          <div class="sidebar-toggler hidden-phone"></div>
          <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <li>
        {{--<li class="visible-phone visible-tablet">--}}
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
          <a href="index.html"><i class="icon-home"></i><span class="title">Dashboard</span></a>
          <!--<a class="active" href="index.html">Dashboard</a>
          <a class="ajaxify start" href="layout_ajax_content_1.html">
            <i class="icon-home"></i><span class="title">Dashboard</span><span class="selected"></span>
          </a>-->
        </li>
        <li>
          <a class="active" href="javascript:;">
            <i class="icon-sitemap"></i><span class="title">3 Level Menu</span><span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="javascript:;">Item 1<span class="arrow"></span></a>
              <ul class="sub-menu">
                <li><a href="#">Sample Link 1</a></li>
              </ul>
            </li>
            <li>
              <a href="javascript:;">Item 1<span class="arrow"></span></a>
              <ul class="sub-menu">
                <li><a href="#">Sample Link 1</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Item 3</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:;">
            <i class="icon-folder-open"></i><span class="title">4 Level Menu</span><span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="javascript:;"><i class="icon-cogs"></i>Item 1<span class="arrow"></span></a>
              <ul class="sub-menu">
                <li>
                  <a href="javascript:;"><i class="icon-user"></i>Sample Link 1<span class="arrow"></span></a>
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
            <li>
              <a href="javascript:;"><i class="icon-globe"></i>Item 2<span class="arrow"></span></a>
              <ul class="sub-menu">
                <li><a href="#"><i class="icon-user"></i>  Sample Link 1</a></li>
                <li><a href="#"><i class="icon-external-link"></i>  Sample Link 1</a></li>
                <li><a href="#"><i class="icon-bell"></i>  Sample Link 1</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="icon-folder-open"></i>Item 3</a>
            </li>
          </ul>
        </li>
        <li class="active">
          <a href="javascript:;">
            <i class="icon-{{$icons[rand(0, 10)]}}"></i><span class="title">UI Features</span><span class="selected"></span><span class="arrow open"></span>
          </a>
          <ul class="sub-menu">
            <li ><a href="ui_general.html">General</a></li>
            <li ><a href="ui_nestable.html">Nestable List</a></li>
            <li ><a href="page_timeline.html"><i class="icon-{{$icons[rand(0, 10)]}}"></i> Timeline</a></li>
            <li><a class="ajaxify" href="layout_ajax_content_2.html">Ajax Link Sample 1</a></li>
            <li class="active"><a href="layout_horizontal_sidebar_menu.html">Horzontal & Sidebar Menu</a></li>
          </ul>
        </li>

        <li class="last ">
          <a href="charts.html"><i class="icon-bar-chart"></i><span class="title">Visual Charts</span></a>
        </li>
        <li class="last"><a href="login.html"><i class="icon-user"></i><span class="title">Login Page</span></a></li>
      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
