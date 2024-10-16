@php
$datas['layoutDatas'] = [
    'viewCode' => 'ajax',
    'bodyClass' => 'page-header-fixed',
    'footerView' => 'no',
    'onlyContent' => true,
];
@endphp
@extends('layouts.metronic-simple')
@section('content')
  @include('metronicsource.elems._header', ['datas' => $datas])
  <!-- BEGIN CONTAINER -->
  <div class="page-container row-fluid">
    @include('metronicsource.elems._modal', ['datas' => $datas])
    @include('metronicsource.elems._sidebar', ['datas' => $datas])
    <!-- BEGIN PAGE -->
    <div class="page-content">
      <!-- BEGIN PAGE CONTAINER-->
      <div class="container-fluid">
        @include('metronicsource.elems._breadcrumb', ['datas' => $datas])
        <div class="page-content-body">
        </div>
      </div>
      <!-- HERE WILL BE LOADED AN AJAX CONTENT -->
    </div>
    <!-- BEGIN PAGE -->
  </div>
  <!-- END CONTAINER -->
  @include('metronicsource.elems._footer', ['datas' => $datas])
@endsection
