<div id="responsive" class="modal " tabindex="-1" data-width="760">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h3>{!!$datas['baseData']['brief']!!}</h3>
  </div>
  <div class="modal-body">
    @include('knowledge.components._baseinfo', ['baseData' => $datas['baseData']])
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn">Close</button>
  </div>
</div>
