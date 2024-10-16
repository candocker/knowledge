@if (isset($datas['topNavs']))
<div class="header navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
    {{--<div class="container">--}}
      <a class="brand" href="index.html">
        <!--<img src="{{$commonAssetUrl}}/metronic/media/image/logo.png" alt="logo" />-->
      </a>

      <div class="navbar hor-menu hidden-phone hidden-tablet">
        <div class="navbar-inner">
          <ul class="nav">
            @foreach ($datas['topNavs'] as $bCode => $pData)
            <li @if ($datas['currentBigNavCode'] == $bCode) class="active" @endif>
              @if (!isset($pData['subDatas']) || empty($pData['subDatas']))
              <a href="javascript:;">{{$pData['name']}}</a>
              @else
              <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                <span class="selected"></span>{{$pData['name']}}<span class="arrow"></span>
              </a>
              <ul class="dropdown-menu">
                @foreach ($pData['subDatas'] as $subData)
                <li @if ($datas['currentNavCode'] == $subData['code']) class="active" @endif>
                  <a href="{{$subData['url']}}">{{$subData['name']}}</a>
                </li>
                @endforeach
              </ul>
              <b class="caret-out"></b>
              @endif
            </li>
            @endforeach
          </ul>
        </div>
      </div>

      {{--@include('metronicsource.elems.__headerbase-menu', ['datas' => $datas])--}}
      {{--@include('metronicsource.elems.__headerbase-right', ['datas' => $datas])--}}

      <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
        <img src="{{$commonAssetUrl}}/metronic/media/image/menu-toggler.png" alt="" />
      </a>
    </div>
  </div>
</div>
@endif
