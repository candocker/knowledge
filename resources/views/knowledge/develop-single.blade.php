@php
$datas['layoutDatas'] = [
  'viewCode' => 'pointsingle',
  'bodyClass' => 'page-header-fixed page-full-width',
  'footerView' => 'center'
];

$isMobile = $datas['isMobile'] ?? false;
$detailDatas = $datas['detailDatas'] ?? [];
//print_r($detailDatas);exit();

$baseData = $detailDatas['baseData'] ?? [];
$pageData = $detailDatas['pageData'] ?? [];
$pageTitle = $pageData['title'] ?? '';
if (isset($pageData['url'])) {
    $pageTitle = "<a href='{$pageData['url']}'>{$pageData['title']}</a>";
}
@endphp
@extends('layouts.metronic-simple')
@section('content')

<div class="page-content no-min-height">
  @if (!empty($pageData))
  <div class="container">
    <div class="span12">
      <h3 class="page-title" style="text-align: center; margin-bottom:0px">{!!$pageTitle!!} </h3>
      @if (isset($pageData['brief']))<h3 class="page-title" style="text-align: center; margin-top:0px"> <small>{!!$pageData['brief']!!}</small></h3>@endif
    </div>
  </div>
  @endif
  @if (!empty($baseData))
  <div class="container container-fluid promo-page " style="min-height:0px">
    <div class="row-fluid no-min-height">
      <div class="span12">
        @include('knowledge.components._baseinfo', ['baseData' => $baseData, 'isMobile' => $isMobile])
      </div>
    </div>
  </div>
  <hr />
  @endif

  @foreach ($detailDatas as $ddKey => $ddDatas)
  @php if ($ddKey == 'simpleFixed') { $ddKey = $isMobile ? 'simpleFixed' : 'simpleTable'; } @endphp
  @php if (strpos($ddKey, 'commonFixTable') !== false) { $ddKey = $isMobile ? 'commonFixed' : 'commonTable'; } @endphp
  @php if (in_array($ddKey, ['simpleText', 'simpleText1', 'simpleText2'])) { $ddKey = 'simpleText'; } @endphp
  @if (in_array($ddKey, ['image', 'simpleTable', 'askwiki', 'commonFixed', 'advanced', 'commonTable', 'simpleFixed', 'timeline', 'simpleText']))
  <div class="container">
    @if (isset($ddDatas['title']))
    <div class="span12">
      <h5 class="page-title" style="text-align: center; margin-bottom:5px; margin-top:0px;">{!!$ddDatas['title']!!} </h5>
      <h3 class="page-title" style="text-align: center; margin-top:0px"> <small>@if (isset($ddDatas['brief'])) {!!$ddDatas['brief']!!} @endif</small></h3>
    </div>
    @endif
    <div class="row-fluid margin-bottom-20">
      @include('knowledge.components._' . $ddKey, [$ddKey . 'Datas' => $ddDatas, 'isMobile' => $isMobile])
    </div>
  </div>
  @endif
  @endforeach


  @if (isset($detailDatas['modal']) && !empty($detailDatas['modal']))
    @include('knowledge.components._modal', ['modalDatas' => $detailDatas['modal'], 'isMobile' => $isMobile])
  @endif
  <div class="ajax-modal modal container hide fade" tabindex="-1"></div>

</div>
@endsection
