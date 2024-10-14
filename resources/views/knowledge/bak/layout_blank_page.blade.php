@php $datas['layoutDatas'] = ['viewCode' => '', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            Blank page content goes here
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
