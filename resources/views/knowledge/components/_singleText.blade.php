<div class="portlet box yellow">
  <div class="portlet-title"></div>
  <div class="portlet-body">
    <div class="row-fluid">
      <div class="span12">
        @foreach ($singleTextDatas as $tData)
        <p>{!!$tData!!}</p>
        @endforeach
      </div>
    </div>
  </div>
</div>
