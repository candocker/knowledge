@extends('layouts._metronic-base')
@section('layoutcontent')

@if (isset($datas['layoutDatas']['onlyContent']))
@yield('content')
@else

@include('layouts.metronic._header-simple', ['datas' => $datas, 'headerClass' => 'container'])
<div class="page-container row-fluid">
  @include('layouts.metronic._sidebar-simple', ['sidebarClass' => 'visible-phone visible-tablet', 'datas' => $datas])
  @yield('content')
</div>

@endif
@endsection
