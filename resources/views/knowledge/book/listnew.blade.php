@php
$datas['layoutDatas'] = [
  'viewCode' => 'pointsingle',
  'bodyClass' => 'page-header-fixed page-full-width',
  'footerView' => 'center'
];

$isMobile = $datas['isMobile'] ?? false;
$bookData = $datas['bookData'];
$chapterDatas = $datas['chapterDatas'];
//print_r($datas);exit();
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
  <div class="container">
    <div class="span12">
      <h3 class="page-title" style="text-align: center; margin-bottom:0px">{!!$bookData['name']!!} </h3>
      {{--@if (isset($bookData['description']))<h3 class="page-title" style="text-align: center; margin-top:0px"> <small>{{$bookData['description']}}</small></h3>@endif--}}
    </div>
  </div>

  <div class="container">
    <div class="row-fluid margin-bottom-20">
      <div class="portlet box green">
        <div class="portlet-title"></div>
        <div class="portlet-body">
          <table class="table table-striped table-bordered table-hover table-advance">
            <tbody>
              @foreach ($chapterDatas as $pData)
              @php
                $align = $pData['chapter_type'] == 'top' ? 'center' : 'left';
                $pName = $pData['name'];
                if (in_array($pData['chapter_type'], ['big'])) {
                    $pName = "<b>{$pName}</b>";
                }
                if (in_array($pData['chapter_type'], ['top'])) {
                    $pName = "<b style='color:red'>{$pName}</b>";
                }
                if (!empty($pData['url'])) {
                    $pName = "<a href='{$pData['url']}'>{$pName}</a>";
                }
              @endphp
              <tr>
                <td style="text-align: {{$align}}; border-left-width:1px;vertical-align:middle;">{!!$pName!!}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

</div>
@endsection
