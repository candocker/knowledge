@if (isset($datas['topNavs']))
<div class="header navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="{{$headerClass?? 'container-fluid'}}">
      <a class="brand" href="/">
        <img src="{{$commonAssetUrl}}/metronic/media/image/logo.png" alt="logo" />
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
                @php $noSub = !isset($subData['subDatas']) || empty($subData['subDatas']); $liClass = $noSub ? '' : 'dropdown-submenu'; @endphp
                <li @if ($datas['currentNavCode'] == $subData['code'] && $datas['currentBigNavCode'] == $bCode) class="active {{$liClass}}" @endif class="{{$liClass}}">
                  @if ($noSub)
                  @php $url = $subData['url'] ?? "/{$bCode}-{$subData['code']}"; @endphp
                  <a href="{{$url}}">{{$subData['name']}}</a>
                  @else
                  <a href="javascript:;">{{$subData['name']}}<span class="arrow"></a>
                  <ul class="dropdown-menu">
                    @foreach ($subData['subDatas'] as $subSubData)
                    <li @if ($datas['currentSubCode'] == $subSubData['code'] && $datas['currentBigNavCode'] == $bCode) class="active" @endif>
                      @php $url = $subData['url'] ?? "/{$bCode}-{$subData['code']}_{$subSubData['code']}"; @endphp
                      <a href="{{$url}}">{{$subSubData['name']}}</a>
                    </li>
                    @endforeach
                  </ul>
                  @endif
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
