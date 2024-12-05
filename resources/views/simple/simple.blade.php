@php
$datas['layoutDatas'] = [
'viewCode' => 'pointsingle',
'bodyClass' => 'page-header-fixed page-full-width',
'footerView' => 'center'
];

$isMobile = $datas['isMobile'] ?? false;

$commonTableDatas = $datas['commonTableDatas'] ?? [];
$commonFixedDatas = $datas['commonFixedDatas'] ?? [];
//print_r($commonFixedDatas);exit();
$pageData = $datas['datas']['pageData'] ?? [];
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

  @if (!empty($commonFixedDatas))
  <div class="container">
    <div class="row-fluid margin-bottom-20">
      @include('knowledge.components._commonfix-table', ['fixedDatas' => $commonFixedDatas, 'isMobile' => $isMobile])
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


</div>
@endsection
