@php
$datas['layoutDatas'] = [
    'viewCode' => '',
    'bodyClass' => 'page-header-fixed page-sidebar-fixed page-boxed',
    'footerView' => 'no',
    'onlyContent' => true,
];
@endphp
@extends('layouts.metronic-simple')
@section('content')
  @include('metronicsource.elems._header', ['datas' => $datas])
  {{--<meta content="width=device-width, initial-scale=1.0" name="viewport" />--}}
  <div class="container">
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid">
      @include('metronicsource.elems._sidebar', ['datas' => $datas])
      <!-- BEGIN PAGE -->
      <div class="page-content">
        @include('metronicsource.elems._modal', ['datas' => $datas])
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
          @include('metronicsource.elems._breadcrumb', ['datas' => $datas])
          <!-- BEGIN PAGE CONTENT-->
          <div class="row-fluid">
            <div class="span12">
              <span class="label label-success">NOTE:</span>&nbsp;
              To use other template page contents in the non-responsive boxed layout,
              you have to replace bootstrap classes <code>row-fluid</code> with <code>row</code> and <code>container-fluid</code> with <code>container</code>.
            </div>
          </div>
          <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
    </div>
    <!-- END CONTAINER -->
    @include('metronicsource.elems._footer', ['datas' => $datas])
  </div>
@endsection
