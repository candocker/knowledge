@php
$datas['layoutDatas'] = [
'viewCode' => 'pointsingle',
'bodyClass' => 'page-header-fixed page-full-width',
'footerView' => 'center'
];

$isMobile = $datas['isMobile'] ?? false;
$knowledge = $datas['knowledge'];
$detailDatas = $datas['detailDatas'];

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
      <h3 class="page-title" style="text-align: center; margin-bottom:0px">{{$knowledge['name']}} </h3>
      @if (!empty($knowledge['brief']))<h3 class="page-title" style="text-align: center; margin-top:0px"> <small>{{$knowledge['brief']}}</small></h3>@endif
    </div>
  </div>

  <div class="container">
    <div class="row-fluid margin-bottom-20">
      @include('knowledge.components._askwiki', ['askwikiDatas' => $detailDatas, 'isMobile' => $isMobile])
    </div>
  </div>
</div>
@endsection
