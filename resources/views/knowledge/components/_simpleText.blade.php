@foreach ($simpleTextDatas as $subDatas)
@php $spanNum = ceil(12 / count($subDatas)); @endphp
<div class="portlet box blue">
  <div class="portlet-title"></div>
  <div class="portlet-body">
    <div class="row-fluid">
      @foreach ($subDatas as $tData)
      <div class="span{{$spanNum}}">
        <h3><a @if (isset($tData['url'])) href="{{$tData['url']}}" @endif>{!!$tData['title']!!}</a></h3>
        @foreach ($tData['infos'] as $ttData)
        <p>{!!$ttData!!}</p>
        @endforeach
      </div>
      @endforeach
    </div>
  </div>
</div>
@endforeach
