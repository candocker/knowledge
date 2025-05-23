@php
$topName = '';
if (isset($imageDatas['topName'])) {
$topName = $imageDatas['topName'];
unset($imageDatas['topName']);
}
@endphp
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="portlet box purple">
        <div class="portlet-title">
          @if (!empty($topName))<div class="caption"><i class="icon-reorder"></i>{!!$topName!!}</div>@endif
        </div>
        @foreach ($imageDatas as $pData)
        <div class="portlet-body">
          <div class="row-fluid">
            <div class="span4">
              <h4>{!!$pData['name']!!}</h4>
            </div>
          </div>
          <hr class="clearfix" />
          <div class="row-fluid">
              @foreach ($pData['infos'] as $iData)
            <div class="span3">
              <div class="item">
                <a class="fancybox-button" data-rel="fancybox-button" title="{{$iData['title']}}" href="{{$iData['url']}}" style="text-align: center; margin-top:0px">
                  <div class="zoom">
                    <img src="{{$iData['url']}}" alt="{{$iData['title']}}" style="width:383px; height:267px"/>
                    <div class="zoom-icon"></div>
                  </div>
                  <span style="display: flex; justify-content: center; align-items: center;"><em>{{$iData['title']}}</em></span>
                </a>
              </div>
            </div>
              @endforeach
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
