@php
$datas['layoutDatas'] = [
'viewCode' => 'pointsingle',
'bodyClass' => 'page-header-fixed page-full-width',
'footerView' => 'center'
];

$isMobile = $datas['isMobile'] ?? false;
$detail = $datas['detailData'] ?? [];
$onlinereadDatas = $datas['onlinereadDatas'] ?? [];
//print_r($detail);exit();
@endphp
@extends('layouts.metronic-simple')
@section('content')
<div class="page-content no-min-height">
  @if (!empty($detail))
  <div class="container-fluid promo-page">
    <div class="row-fluid">
      <div class="span12">
        @include('knowledge.components._articlepicture', ['datas' => $datas])
      </div>
    </div>
  </div>
  @endif
  @if (!empty($onlinereadDatas))
  <div class="container">
    <div class="row-fluid margin-bottom-20">
      @include('knowledge.components._onlineread', ['onlinereadDatas' => $onlinereadDatas, 'isMobile' => $isMobile])
    </div>
  </div>
  @endif
</div>
@endsection
