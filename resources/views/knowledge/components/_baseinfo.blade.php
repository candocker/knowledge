<div class="block-yellow" style="background-color:#cbcac6">
  <div class="container">
    <div class="row-fluid">
      <div class="span5 margin-bottom-20" style="display: flex; justify-content: center; align-items: center;">
        <a href="index.html"><img src="{{$baseData['headerPicUrl']}}" width="300px" height="800px" alt=""></a>
      </div>
      <div class="span6" style="">
        <div class="portlet sale-summary">
          <div class="portlet-title">
            <div class="caption">{!!$baseData['brief']!!}</div>
          </div>
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
        <!--<div style="font-size:18px;margin-bottom:10px"><p>{{$baseData['desc']}}</p></div>-->
      </div>
    </div>
  </div>
</div>
