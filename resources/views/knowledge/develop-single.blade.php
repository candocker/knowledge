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
$commonFixedDatas = $detailDatas['commonFixedDatas'] ?? [];
$askwikiDatas = $detailDatas['askwikiDatas'] ?? [];
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

  <div class="ajax-modal modal container hide fade" tabindex="-1"></div>

        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i>Responsive Table With Expandable details</div>
                <div class="tools">
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                  <thead>
                    <tr>
                      <th>Reoondering engine</th>
                      <th>Broiiwser</th>
                      <th class="hidden-480">Platform(s)</th>
                      <th class="hidden-480">Engine version</th>
                      <th class="hidden-480">CSS grade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td >Woin 95+</td>
                      <td class="hidden-480">4</td>
                      <td class="hidden-480">X</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>Internet
                        Explorer 5.0
                      </td>
                      <td class="hidden-480">Win 95+</td>
                      <td class="hidden-480">5</td>
                      <td class="hidden-480">C</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>Internet
                        Explorer 5.5
                      </td>
                      <td class="hidden-480">Win 95+</td>
                      <td class="hidden-480">5.5</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>Internet
                        Explorer 6
                      </td>
                      <td class="hidden-480">Win 98+</td>
                      <td class="hidden-480">6</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>Internet Explorer 7</td>
                      <td class="hidden-480">Win XP SP2+</td>
                      <td class="hidden-480">7</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>AOL browser (AOL desktop)</td>
                      <td class="hidden-480">Win XP</td>
                      <td class="hidden-480">6</td>
                      <td class="hidden-480">A</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection
