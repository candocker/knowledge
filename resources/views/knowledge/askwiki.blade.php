@php
$datas['layoutDatas'] = [
  'viewCode' => 'pointsingle',
  'bodyClass' => 'page-header-fixed page-full-width',
  'footerView' => 'center'
];

$isMobile = $datas['isMobile'] ?? false;
$detailDatas = $datas['detailDatas']['datas'];
unset($datas['detailDatas']['datas']);
$baseInfo = $datas['detailDatas'];

$pageData = $datas['detailDatas']['pageData'] ?? [];
$pageTitle = $pageData['title'] ?? '';
if (isset($pageData['url'])) {
    $pageTitle = "<a href='{$pageData['url']}'>{$pageData['title']}</a>";
}
@endphp
@extends('layouts.metronic-simple')
@section('content')

<div class="page-content no-min-height">
  <div class="container">
    <div class="span12">
      <h3 class="page-title" style="text-align: center; margin-bottom:0px">{{$baseInfo['title']}} </h3>
      @if (isset($baseInfo['brief']) && !empty($baseInfo['brief']))<h3 class="page-title" style="text-align: center; margin-top:0px"> <small>{{$baseInfo['brief']}}</small></h3>@endif
    </div>
  </div>

  <div class="container">
    <div class="row-fluid margin-bottom-20">
      @include('knowledge.components._askwiki', ['askwikiDatas' => $detailDatas, 'isMobile' => $isMobile])
    </div>
  </div>
</div>
@endsection
