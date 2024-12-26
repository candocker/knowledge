@php
$datas['layoutDatas'] = [
  'viewCode' => '',
  'bodyClass' => 'page-header-fixed'
];
@endphp
@extends('layouts._metronic-base')
@section('layoutcontent')

@include('layouts.metronic._header-simple', ['datas' => $datas])
<div class="page-container">
{{--<div class="page-container row-fluid">--}}
  @include('layouts.metronic._sidebar-simple', ['datas' => $datas])
  <div class="page-content">
    {{--@include('knowledge.metronic._portlet-config', ['datas' => $datas])--}}

      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <div id="dashboard">
          <!-- BEGIN DASHBOARD STATS -->
          <div class="row-fluid">
            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
              <div class="dashboard-stat blue">
                <div class="visual">
                  <i class="icon-comments"></i>
                </div>
                <div class="details">
                  <div class="number">
                    1349
                  </div>
                  <div class="desc">
                    New Feedbacks
                  </div>
                </div>
                <a class="more" href="#">
                View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
              </div>
            </div>
            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
              <div class="dashboard-stat green">
                <div class="visual">
                  <i class="icon-shopping-cart"></i>
                </div>
                <div class="details">
                  <div class="number">549</div>
                  <div class="desc">New Orders</div>
                </div>
                <a class="more" href="#">
                View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
              </div>
            </div>
            <div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">
              <div class="dashboard-stat purple">
                <div class="visual">
                  <i class="icon-globe"></i>
                </div>
                <div class="details">
                  <div class="number">+89%</div>
                  <div class="desc">Brand Popularity</div>
                </div>
                <a class="more" href="#">
                View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
              </div>
            </div>
            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
              <div class="dashboard-stat yellow">
                <div class="visual">
                  <i class="icon-bar-chart"></i>
                </div>
                <div class="details">
                  <div class="number">12,5M$</div>
                  <div class="desc">Total Profit</div>
                </div>
                <a class="more" href="#">
                View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
