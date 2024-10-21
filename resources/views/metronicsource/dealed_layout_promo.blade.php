@php
$datas['layoutDatas'] = [
    'viewCode' => 'single',
    'bodyClass' => 'page-header-fixed page-full-width',
    'footerView' => 'center'
];
@endphp
@extends('layouts.metronic-simple')
@section('content')
    <!-- BEGIN PAGE -->
    <div class="page-content no-min-height">
      @include('metronicsource.elems._modal', ['datas' => $datas])
      <!-- BEGIN PAGE CONTAINER-->
      <div class="container-fluid promo-page">
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            @include('metronicsource.contentelems._articlepicture-slide', ['datas' => $datas])
            @include('metronicsource.contentelems._articlepicture', ['datas' => $datas])
            @include('metronicsource.contentelems._articlelist', ['datas' => $datas])
            @include('metronicsource.contentelems._homefooter', ['datas' => $datas])
          </div>
        </div>
      </div>
      <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
@endsection
