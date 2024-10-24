@php
$datas['layoutDatas'] = [
'viewCode' => 'pointsingle',
'bodyClass' => 'page-header-fixed page-full-width',
'footerView' => 'center'
];

$isMobile = $datas['isMobile'] ?? false;
$detailDatas = $datas['detailDatas'] ?? [];
$baseData = $detailDatas['baseData'] ?? [];
$simpleTableDatas = $detailDatas['simpleTableDatas'] ?? [];
//print_r($detail);exit();
@endphp
@extends('layouts.metronic-simple')
@section('content')
<div class="page-content no-min-height">
  @if (!empty($baseData))
  <div class="container-fluid promo-page">
    <div class="row-fluid">
      <div class="span12">
        @include('knowledge.components._baseinfo', ['baseData' => $baseData])
      </div>
    </div>
  </div>
  @endif
  @if (!empty($simpleTableDatas))
  <div class="container">
    <div class="row-fluid margin-bottom-20">
      @include('knowledge.components._simple-table', ['simpleTableDatas' => $simpleTableDatas, 'isMobile' => $isMobile])
    </div>
  </div>
  @endif
  <div class="ajax-modal" class="modal hide fade" tabindex="-1"></div>
</div>
@endsection
