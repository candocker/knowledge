<div class="portlet box yellow">
  @foreach ($simpleTextDatas as $tData)
  <div class="portlet-title"></div>
  <div class="portlet-body">
    <div class="row-fluid">
      <div class="span12">
        <h3><a @if (isset($tData['url'])) href="{{$tData['url']}}" @endif>{!!$tData['title']!!}</a></h3>
        @foreach ($tData['infos'] as $ttData)
        <p>{!!$ttData!!}</p>
        @endforeach
      </div>
    </div>
  </div>
  @endforeach
</div>
