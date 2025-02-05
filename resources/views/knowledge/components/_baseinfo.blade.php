<div class="block-yellow" style="background-color:#cbcac6; padding: 30px 10px 0px 10px;">
  <div class="container">
    <!--<div class="portlet-title">
      @if (isset($baseData['brief'])) <div class="caption">{!!$baseData['brief']!!}</div> @endif
    </div>-->
    <div class="row-fluid">
    <div @if (empty($isMobile)) style="display: flex; justify-content: center; align-items: center;" @endif>
      <div class="span5 margin-bottom-20" style="display: flex; justify-content: center; align-items: center;">
        <a ><img src="{{$baseData['headerPicUrl']}}" width="300px" height="100%" alt=""></a>
      </div>
      <div class="span6" style="">
        <div class="portlet sale-summary">
          <ul class="unstyled">
            @foreach ($baseData['infos'] as $bKey => $bValue)
            <li>
              <span class="sale-info">{{$bKey}} <i class="icon-img-up"></i></span>
              <span class="sale-num" style="color:#ce1f1f;font-size:16px">{!!$bValue!!}</span>
            </li>
            @endforeach
            <li>
          </ul>
        </div>
        @if (isset($baseData['brief'])) <!--<div style="font-size:18px;margin-bottom:10px"><p>{{$baseData['desc']}}</p></div>--> @endif
      </div>
    </div>
    </div>
  </div>
</div>
