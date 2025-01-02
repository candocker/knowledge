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
$pageData = $datas['detailDatas']['pageData'] ?? [];
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
      @if (isset($pageData['brief']))<h3 class="page-title" style="text-align: center; margin-top:0px"> <small>{{$pageData['brief']}}</small></h3>@endif
    </div>
  </div>
  @endif
  @if (!empty($baseData))
  <div class="container-fluid promo-page">
    <div class="row-fluid">
      <div class="span12">
        @include('knowledge.components._baseinfo', ['baseData' => $baseData])
      </div>
    </div>
  </div>
  @endif

  @foreach ($detailDatas as $ddKey => $ddDatas)
  @php if ($ddKey == 'simpleFixed') { $ddKey = $isMobile ? 'simpleFixed' : 'simpleTable'; } @endphp
  @if (in_array($ddKey, ['simpleTable', 'askwiki', 'commonFixed', 'advanced', 'commonTable', 'simpleFixed', 'timeline']))
  <div class="container">
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
