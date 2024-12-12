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
$simpleFixedDatas = $detailDatas['simpleFixedDatas'] ?? [];
$commonTableDatas = $detailDatas['commonTableDatas'] ?? [];
$advancedDatas = $detailDatas['advancedDatas'] ?? [];
$commonFixedDatas = $detailDatas['commonFixedDatas'] ?? [];
$askwikiDatas = $detailDatas['askwikiDatas'] ?? [];
$modalDatas = $detailDatas['modalDatas'] ?? [];
//print_r($detail);exit();
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
  @if (!empty($commonTableDatas))
  <div class="container">
    <div class="row-fluid margin-bottom-20">
      @include('knowledge.components._common-table', ['commonTableDatas' => $commonTableDatas, 'isMobile' => $isMobile])
    </div>
  </div>
  @endif
  @if (!empty($advancedDatas))
  <div class="container">
    <div class="row-fluid margin-bottom-20">
      @include('knowledge.components._advanced-table', ['advancedDatas' => $advancedDatas, 'isMobile' => $isMobile])
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
  @if (!empty($commonFixedDatas))
  <div class="container">
    <div class="row-fluid margin-bottom-20">
      @include('knowledge.components._commonfix-table', ['fixedDatas' => $commonFixedDatas, 'isMobile' => $isMobile])
    </div>
  </div>
  @endif

  @if (!empty($simpleFixedDatas))
  <div class="container">
    <div class="row-fluid margin-bottom-20">
      @if ($isMobile)
      @include('knowledge.components._fix-table', ['fixedDatas' => $simpleFixedDatas, 'isMobile' => $isMobile])
      @else
      @include('knowledge.components._simple-table', ['simpleTableDatas' => $simpleFixedDatas, 'isMobile' => $isMobile])
      @endif
    </div>
  </div>
  @endif

  @if (!empty($askwikiDatas))
      @include('knowledge.components._askwiki', ['askwikiDatas' => $askwikiDatas, 'isMobile' => $isMobile])
  @endif

  @if (!empty($modalDatas))
    @include('knowledge.components._modal', ['modalDatas' => $modalDatas, 'isMobile' => $isMobile])
  @endif
  <div class="ajax-modal modal container hide fade" tabindex="-1"></div>
</div>
@endsection
