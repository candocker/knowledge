@extends('layouts._metronic-base')
@section('layoutcontent')

@if (isset($datas['layoutDatas']['onlyContent']))
@yield('content')
@else

@include('knowledge.bak.elems._header-home', ['datas' => $datas])
<div class="page-container row-fluid">
  @include('knowledge.bak.elems._sidebar-home', ['datas' => $datas])
  @yield('content')
</div>

@endif
@endsection
