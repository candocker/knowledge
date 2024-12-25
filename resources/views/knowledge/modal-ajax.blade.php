@php
$baseData = $datas['baseData'];
@endphp
<div id="responsive" class="modal container" tabindex="-1">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h3>{!!$baseData['brief']!!}</h3>
  </div>
  <div class="modal-body ">
    <div class="" style="display: flex; justify-content: center; align-items: center;">
      <img src="{{$baseData['headerPicUrl']}}" width="300px" height="800px" alt="">
    </div>
  </div>
  <div class="modal-body " style="display: flex; justify-content: center; align-items: center;">
    <div class="portlet sale-summary span12">
      <div class="portlet-title" style="display: flex; justify-content: center; align-items: center;">
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
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn">Close</button>
  </div>
</div>
