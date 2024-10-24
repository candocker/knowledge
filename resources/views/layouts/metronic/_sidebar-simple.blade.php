@if (isset($datas['topNavs']))
@php $leftNavs = $datas['leftNavs']; @endphp

<div class="page-sidebar nav-collapse collapse visible-phone visible-tablet">
  <ul class="page-sidebar-menu">
    <!--<li><div class="sidebar-toggler hidden-phone"></div></li>-->
    <li class="start ">
      <a href="javascript:;"><i class="icon-home"></i><span class="title">一级分类</span></a>
    </li>
    @foreach ($datas['topNavs'] as $bCode => $pData)
    <li @if ($datas['currentBigNavCode'] == $bCode) class="active" @endif>
      <a href="javascript:;">
        <span class="title">{{$pData['name']}}</span><span class="selected"></span><span class="arrow open"></span>
      </a>
      <ul class="sub-menu">
        @foreach ($pData['subDatas'] as $subData)
        <li @if ($datas['currentNavCode'] == $subData['code']) class="active" @endif>
          @if (isset($subData['subDatas']) && !empty($subData['subDatas']))
          <a class="active" href="javascript:;">
            <span class="title">{{$subData['name']}}</span><span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            @foreach ($subData['subDatas'] as $subSubData)
            <li @if ($datas['currentSubCode'] == $subSubData['code']) class="active" @endif>
              <a href="{{$subSubData['url']}}">{{$subSubData['name']}}</a>
            </li>
            @endforeach
          </ul>
          @else
          <a href="{{$subData['url']}}">{{$subData['name']}}</a>
          @endif
        </li>
        @endforeach
      </ul>
    </li>
    @endforeach
  </ul>
<hr />
</div>
@if ($leftNavs)
<div class="page-sidebar nav-collapse collapse  {{$sidebarClass ?? ''}}">
  <ul class="page-sidebar-menu">
    <!--<li><div class="sidebar-toggler hidden-phone"></div></li>-->
    <li class="start ">
      <a href="index.html">
      <i class="icon-home"></i>
      <span class="title">{{$leftNavs['name']}}</span>
      </a>
    </li>
    <li class="active ">
      <ul class="sub-menu">
        @foreach ($leftNavs['subDatas'] as $subData)
        <li @if ($datas['currentLeftNavCode'] == $subData['code']) class="active" @endif>
          <a href="{{$subData['url']}}">{{$subData['name']}}</a>
        </li>
        @endforeach
      </ul>
    </li>
  </ul>
</div>
@endif
@endif
