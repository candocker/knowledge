@php
$datas['layoutDatas'] = [
    'viewCode' => '',
    'bodyClass' => 'page-header-fixed page-boxed',
    'footerView' => 'no',
    'onlyContent' => true,
];
@endphp
@extends('layouts.metronic-simple')
@section('content')
  @include('metronicsource.elems._header-other', ['datas' => $datas])
  <div class="container">
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid">
      @include('metronicsource.elems._sidebar-other', ['datas' => $datas])
      <!-- BEGIN PAGE -->
      <div class="page-content">
        <!-- BEGIN PAGE CONTAINER-->
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
          @include('metronicsource.elems._breadcrumb', ['datas' => $datas])
          <!-- BEGIN PAGE CONTENT-->
          <div class="row-fluid">
            <div class="span12">
              Page content goes here
            </div>
          </div>
          <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
    </div>
  </div>
  <!-- END CONTAINER -->
  @include('metronicsource.elems._footer-home', ['datas' => $datas])
@endsection
