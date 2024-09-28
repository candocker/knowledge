@php $leftNavs = $datas['leftNavs']; @endphp
<div class="page-sidebar nav-collapse collapse">
  <ul class="page-sidebar-menu">
    <li>
      <div class="sidebar-toggler hidden-phone"></div>
    </li>
    <li class="start ">
      <a href="index.html">
      <i class="icon-home"></i>
      <span class="title">{{$leftNavs['name']}}</span>
      </a>
    </li>
    <li class="active ">
      <!--<a href="javascript:;">
      <i class="icon-th"></i>
      <span class="title">Data Tables</span>
      <span class="selected"></span>
      <span class="arrow open"></span>
      </a>-->
      <ul class="sub-menu">
        @foreach ($leftNavs['subDatas'] as $subData)
        <li @if ($datas['currentVolumeId'] == $subData['id']) class="active" @endif>
          <a href="/bookstore-{{$leftNavs['code']}}-{{$subData['id']}}">{{$subData['name']}}</a>
        </li>
        @endforeach
      </ul>
    </li>
    <li class=" ">
      <a href="charts.html">
      <i class="icon-bar-chart"></i>
      <span class="title">Visual Charts</span>
      </a>
    </li>
  </ul>
</div>
