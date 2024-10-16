@extends('layouts._metronic-base')
@section('layoutcontent')

@if (isset($datas['layoutDatas']['onlyContent']))
@yield('content')
@else

@include('metronicsource.elems._header-home', ['datas' => $datas])
<div class="page-container row-fluid">
  @include('metronicsource.elems._sidebar-home', ['datas' => $datas])
  @yield('content')
</div>

@endif
@endsection
