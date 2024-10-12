@extends('layouts._metronic-base')
@section('layoutcontent')

@include('layouts.metronic._header-simple', ['datas' => $datas])
<div class="page-container row-fluid">
  @include('layouts.metronic._sidebar-simple', ['datas' => $datas])
  <div class="page-content">
    {{--@include('knowledge.metronic._portlet-config', ['datas' => $datas])--}}
    @yield('content')
  </div>
</div>
@endsection
