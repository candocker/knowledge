@php $datas['layoutDatas'] = ['viewCode' => 'errorbase', 'bodyClass' => 'page-header-fixed page-sidebar-fixed page-sidebar-closed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
<body class="">
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <span class="label label-success">TIP:</span>&nbsp;Just add "page-sidebar-closed" class to the body element.
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
