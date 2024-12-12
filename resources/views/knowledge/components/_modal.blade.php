@php
$baseData = ['headerPicUrl' => 'ss', 'title' => '少时诵诗书', 'infos' => ['a' => 'b', 'c' => 'd'], 'desc' => 'dddd'];
@endphp
<div id="responsives" class="modal hide fade" tabindex="-1" data-width="760">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h3>{!!$baseData['title']!!}</h3>
  </div>
  <div class="modal-body">
      <div class="span12 margin-bottom-20" style="display: flex; justify-content: center; align-items: center;">
<div class="span5">
                    <img src="{{$commonAssetUrl}}/metronic/media/image/profile-img.png" alt="" />
      </div>
      </div>
      <div class="span12" style="">
        <div class="portlet sale-summary">
          <div class="portlet-title" style="display: flex; justify-content: center; align-items: center;">
            <div class="caption">{!!$baseData['title']!!}</div>
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
    <div class="row-fluid">
      <div class="span6">
        <h4>Some Input</h4>
        <p><input type="text" class="span12 m-wrap"></p>
        <p><input type="text" class="span12 m-wrap"></p>
        <p><input type="text" class="span12 m-wrap"></p>
      </div>
      <div class="span6">
        <h4>Some More Input</h4>
        <p><input type="text" class="span12 m-wrap"></p>
        <p><input type="text" class="span12 m-wrap"></p>
        <p><input type="text" class="span12 m-wrap"></p>
        <p><input type="text" class="span12 m-wrap"></p>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn">Close</button>
  </div>
</div>
