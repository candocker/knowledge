@php
$colors = ['green', 'grey'];//, 'yellow', 'blue', 'purple'];
$icons = ['trophy', 'facetime-video', 'comments', 'rss', 'time', 'chart', 'music'];
@endphp
@foreach ($timelineDatas as $tData)
<div class="row-fluid">
  <div class="span12">
    <div class="portlet box purple">
      <div class="portlet-title">
        <div class="caption">
          <b>{{$tData['name']}}</b>
        </div>
        <div class="tools">
          @if (isset($tData['showUrl']) && !empty($tData['showUrl']))<a href="{{$tData['showUrl']}}" style="color:red;">详情</a>@endif
        </div>
      </div>
      <div class="portlet-body">
        <ul class="timeline">
          @foreach ($tData['infos'] as $tKey => $tInfo)
          @php $descs = $tData['descs'][$tKey] ?? []; $color = $colors[$tKey % 2]; @endphp
          <li class="timeline-{{$color}}">
            <div class="timeline-time">
              <span class="time" style="margin-top:10px;font-size:14px">{!!$tInfo['name']!!}</span>
              <span class="date" style="margin-top:10px;color:#588fae;font-size:12px">{!!$tInfo['brief']!!}</span>
            </div>
            <div class="timeline-icon"><i class="icon-time"></i></div>
            <div class="timeline-body">
              <h2 style="font-size:16px">{!!$tInfo['title']!!}</h2>
              <div class="timeline-content">
                <!--<div class="scroller" data-height="175px" data-always-visible="1" data-rail-visible1="1"></div>
                <img class="timeline-img pull-left" src="{{$commonAssetUrl}}/metronic/media/image/3.jpg" alt="">
                <img class="timeline-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/1.jpg" alt="">-->
                @foreach ($descs as $tDesc)
                <p>{!!$tDesc!!}</p>
                @endforeach
              </div>
              @if (isset($tInfo['url'])) {
              <div class="timeline-footer">
                <!--<a href="#" class="nav-link ">-->
                <a href="{{$tInfo['url']}}" class="btn blue pull-right">更多信息<i class="m-icon-swapright m-icon-white"></i></a>
              </div>
              @endif
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endforeach
