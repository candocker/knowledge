@foreach ($simpleTableDatas as $tData)
<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <b>{{$tData['name']}}</b>
      @if (isset($tData['brief']) && !empty($tData['brief']))
      <small style="margin-left: 15px; color:red; font-weight:normal; text-decoration:underline; font-style:oblique;">{{$tData['brief']}}</small>
      @endif
    </div>
    <div class="tools">
      @if (isset($tData['showUrl']) && !empty($tData['showUrl']))<a href="{{$tData['showUrl']}}" style="color:red;">详情</a>@endif
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover">
    <!--<table class="table table-striped table-bordered table-hover table-advance">-->
      <tbody>
        @foreach ($tData['infos'] as $pData)
        <tr>
          @foreach ($pData as $vData)
          <td @if (isset($vData['colspan'])) colspan="{{$vData['colspan']}}" @endif style="text-align: center;">
            @if (!empty($vData['url']) || !empty($vData['modalUrl']))
            <a href="{{$vData['url']}}" @if (isset($vData['modalUrl'])) modal-url="{{$vData['modalUrl']}}" class="modal_ajax_btn" @endif>{!!$vData['name']!!}</a>
            @else
            <span >{!!$vData['name']!!}</span>
            @endif
            @if (isset($vData['nameExt']))
            <span >{!!$vData['nameExt']!!}</span>
            @endif
          </td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endforeach
