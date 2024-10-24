@php $datas['layoutDatas'] = ['viewCode' => 'timeline', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
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
              Timeline <small>coming soon page with date countdown</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
              </li>
              <li>
                <a href="#">Pages</a>
                <i class="icon-angle-right"></i>
              </li>
              <li><a href="#">Timeline</a></li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
          </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <ul class="timeline">
              <li class="timeline-yellow">
                <div class="timeline-time">
                  <span class="date">4/10/13</span>
                  <span class="time">18:30</span>
                </div>
                <div class="timeline-icon"><i class="icon-trophy"></i></div>
                <div class="timeline-body">
                  <h2>ICT 2013 20th International Conference</h2>
                  <div class="timeline-content">
                    <img class="timeline-img pull-left" src="{{$commonAssetUrl}}/metronic/media/image/2.jpg" alt="">
                    Ricebean black-eyed pea maize scallion green bean spinach cabbage jicama bell pepper carrot onion corn plantain garbanzo. Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress.
                    Parsley amaranth tigernut silver beet maize fennel spinach. Ricebean black-eyed pea maize scallion green bean spinach cabbage jicama bell pepper carrot onion corn plantain garbanzo.
                  </div>
                  <div class="timeline-footer">
                    <a href="#" class="nav-link pull-right">
                    Read more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                  </div>
                </div>
              </li>
              <li class="timeline-blue">
                <div class="timeline-time">
                  <span class="date">4/11/13</span>
                  <span class="time">12:04</span>
                </div>
                <div class="timeline-icon"><i class="icon-facetime-video"></i></div>
                <div class="timeline-body">
                  <h2>Management Meeting</h2>
                  <div class="timeline-content">
                    <img class="timeline-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/1.jpg" alt="">
                    Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi..
                  </div>
                  <div class="timeline-footer">
                    <a href="#" class="nav-link">
                    Read more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                  </div>
                </div>
              </li>
              <li class="timeline-green">
                <div class="timeline-time">
                  <span class="date">4/13/13</span>
                  <span class="time">05:36</span>
                </div>
                <div class="timeline-icon"><i class="icon-comments"></i></div>
                <div class="timeline-body">
                  <h2>New Project Launch</h2>
                  <div class="timeline-content">
                    <img class="timeline-img pull-left" src="{{$commonAssetUrl}}/metronic/media/image/3.jpg" alt="">
                    Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Pea sprouts wattle seed rutabaga okra yarrow cress avocado grape radish bush tomato ricebean. Pea sprouts wattle seed rutabaga okra yarrow cress avocado grape radish bush tomato ricebean.
                  </div>
                  <div class="timeline-footer">
                    <a href="#" class="nav-link">
                    Read more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                  </div>
                </div>
              </li>
              <li class="timeline-purple">
                <div class="timeline-time">
                  <span class="date">4/15/13</span>
                  <span class="time">13:15</span>
                </div>
                <div class="timeline-icon"><i class="icon-music"></i></div>
                <div class="timeline-body">
                  <h2>Promotion Day</h2>
                  <div class="timeline-content">
                    <div class="scroller" data-height="175px" data-always-visible="1" data-rail-visible1="1">
                      <p>
                        <img class="timeline-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/4.jpg" alt="">
                        Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi. coriander bitterleaf epazote radicchio shallot winter purslane collard.
                      </p>
                      <p>
                        Coriander bitterleaf epazote radicchio shallot winter purslane collard.
                        Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.
                      </p>
                      <p>
                        <img class="timeline-img pull-left" src="{{$commonAssetUrl}}/metronic/media/image/6.jpg" alt="">
                        Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi radicchio shallot winter purslane collard greens spring onion squash lentil.
                      </p>
                      <p>
                        Coriander bitterleaf epazote radicchio shallot winter purslane collard.
                        Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.
                      </p>
                    </div>
                  </div>
                  <div class="timeline-footer">
                    <a href="#" class="btn blue">
                    Read more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                  </div>
                </div>
              </li>
              <li class="timeline-red">
                <div class="timeline-time">
                  <span class="date">4/16/13</span>
                  <span class="time">21:30</span>
                </div>
                <div class="timeline-icon"><i class="icon-rss"></i></div>
                <div class="timeline-body">
                  <h2>Daily Feeds</h2>
                  <div class="timeline-content">
                    <img class="timeline-img pull-left" src="{{$commonAssetUrl}}/metronic/media/image/5.jpg" alt="">
                    Parsley amaranth tigernut silver beet maize fennel spinach. Ricebean black-eyed pea maize scallion green bean spinach cabbage jicama bell pepper carrot onion corn plantain garbanzo. Sierra leone bologi komatsuna celery peanut swiss chard silver beet squash dandelion maize chicory burdock tatsoi dulse radish wakame beetroot.
                  </div>
                  <div class="timeline-footer">
                    <a href="#" class="btn green pull-right">
                    Read more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                  </div>
                </div>
              </li>
              <li class="timeline-grey">
                <div class="timeline-time">
                  <span class="date">4/17/13</span>
                  <span class="time">12:11</span>
                </div>
                <div class="timeline-icon"><i class="icon-time"></i></div>
                <div class="timeline-body">
                  <h2>Staff Meeting</h2>
                  <div class="timeline-content">
                    Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.
                  </div>
                  <div class="timeline-footer">
                    <a href="#" class="nav-link pull-right">
                    Read more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                  </div>
                </div>
              </li>
              <li class="timeline-blue">
                <div class="timeline-time">
                  <span class="date">4/18/13</span>
                  <span class="time">09:56</span>
                </div>
                <div class="timeline-icon"><i class="icon-bar-chart"></i></div>
                <div class="timeline-body">
                  <h2>Demo Europe 2013</h2>
                  <div class="timeline-content">
                    <img class="timeline-img pull-left" src="{{$commonAssetUrl}}/metronic/media/image/2.jpg" alt="">
                    Parsnip lotus root celery yarrow seakale tomato collard greens tigernut epazote ricebean melon tomatillo soybean chicory broccoli beet greens peanut salad. Lotus root burdock bell pepper chickweed shallot groundnut pea sprouts welsh onion wattle seed pea salsify turnip scallion peanut arugula bamboo shoot onion swiss chard.
                  </div>
                  <div class="timeline-footer">
                    <a href="#" class="nav-link">
                    Read more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
      <!-- END PAGE CONTAINER-->
@endsection
