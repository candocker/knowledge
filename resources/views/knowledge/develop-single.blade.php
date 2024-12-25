@php
$datas['layoutDatas'] = [
'viewCode' => 'pointsingle',
'bodyClass' => 'page-header-fixed page-full-width',
'footerView' => 'center'
];

$isMobile = $datas['isMobile'] ?? false;
$detailDatas = $datas['detailDatas'] ?? [];

$baseData = $detailDatas['baseData'] ?? [];
$simpleFixedDatas = $detailDatas['simpleFixedDatas'] ?? [];
$advancedDatas = $detailDatas['advancedDatas'] ?? [];
$commonFixedDatas = $detailDatas['commonFixedDatas'] ?? [];
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
  @switch ($ddKey)
  @case ('simpleTable')
  @case ('askwiki')
  @case ('commonFixed')
  @case ('advanced')
  @case ('commonTable')
  <div class="container">
    <div class="row-fluid margin-bottom-20">
      @include('knowledge.components._' . $ddKey, [$ddKey . 'Datas' => $ddDatas, 'isMobile' => $isMobile])
    </div>
  </div>
  @break
  @endswitch
  @endforeach


  @if (!empty($simpleFixedDatas))
  <div class="container">
    <div class="row-fluid margin-bottom-20">
      @if ($isMobile)
      @include('knowledge.components._fix-table', ['fixedDatas' => $simpleFixedDatas, 'isMobile' => $isMobile])
      @else
      @include('knowledge.components._simpleTable', ['simpleTableDatas' => $simpleFixedDatas, 'isMobile' => $isMobile])
      @endif
    </div>
  </div>
  @endif


  @if (isset($detailDatas['modal']) && !empty($detailDatas['modal']))
    @include('knowledge.components._modal', ['modalDatas' => $detailDatas['modal'], 'isMobile' => $isMobile])
  @endif
  <div class="ajax-modal modal container hide fade" tabindex="-1"></div>

</div>
@endsection
