@php
$datas['layoutDatas'] = [
'viewCode' => 'pointsingle',
'bodyClass' => 'page-header-fixed page-full-width',
'footerView' => 'center'
];

$detail = $datas['detailData'] ?? [];
//print_r($detail);exit();
@endphp
@extends('layouts.metronic-simple')
@section('content')
<div class="page-content no-min-height">
  <div class="container-fluid promo-page">
    <div class="row-fluid">
      <div class="span12">
        @if (!empty($detail)) @include('knowledge.components._articlepicture', ['datas' => $datas]) @endif
      </div>
    </div>
  </div>
</div>
@endsection
