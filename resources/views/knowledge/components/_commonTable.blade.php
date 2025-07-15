@php
$colors = ['#c8dade', '#6dc1d3'];
$formatedExtDatas = [];
@endphp
@php $commonTitles = $commonTableDatas['titles'] ?? []; @endphp
<div class="portlet box green">
  @if (isset($commonTableDatas['topName']))
  <div class="portlet-title">
    <div class="caption">
      <b>{{$commonTableDatas['topName']}}</b>
    </div>
    <div class="tools">
      @if (isset($commonTableDatas['showUrl']) && !empty($commonTableDatas['showUrl']))<a href="{{$commonTableDatas['showUrl']}}" style="color:red;">详情</a>@endif
    </div>
  </div>
  @endif
  @foreach ($commonTableDatas as $tData)
  @if (isset($tData['infos']))
  @php $tTitles = $tData['titles'] ?? $commonTitles; @endphp
  <div class="portlet-body" style="overflow: hidden">
      <h4 style="display: flex; justify-content: center; align-items: center;"><em>{!!$tData['name']!!}</em></h4>
    @if (isset($tData['brief']))<p class="page-title" style="text-align: center; margin-top:0px;color:red; font-weight:normal; font-style:oblique;"> <small>{!!$tData['brief']!!}</small></p>@endif
    <table class="table table-striped table-bordered table-hover table-advance">
      <thead>
        <tr>
          @php $fExts = []; if (isset($tTitles['fExts'])) { $fExts = $tTitles['fExts']; unset($tTitles['fExts']); } @endphp
          @foreach ($tTitles as $pIndex => $tTitle)
          <th @if (isset($fExts[$pIndex . '_col'])) colspan="{{$fExts[$pIndex . '_col']}}" @endif  @if (isset($fExts[$pIndex . '_row'])) rowspan="{{$fExts[$pIndex . '_row']}}" @endif style="text-align: center; border-left-width:1px;vertical-align:middle;">{!!$tTitle!!}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($tData['infos'] as $pData)
        @php 
        $fExts = [];
        if (isset($pData['fExts'])) {
            $fExts = $pData['fExts'];
            unset($pData['fExts']);
        }
        $tTitles = isset($tData['ignoreTitle']) ? array_keys($pData) : $tTitles;  
        $extDetails =$pData['extDetails'] ?? false;
        $pointLabel = false;
        if (!empty($extDetails)) {
            $pointLabel = md5(uniqid(rand(), true));
            $formatedExtDatas[$pointLabel] = $extDetails;
        }
        $pNum = 0;
        @endphp
        <tr>
          @foreach ($tTitles as $pIndex => $tTitle)
          @php $vName = $pData[$pIndex] ?? ''; $pNum++; @endphp
          <td @if (isset($fExts[$pIndex . '_col'])) colspan="{{$fExts[$pIndex . '_col']}}" @endif  @if (isset($fExts[$pIndex . '_row'])) rowspan="{{$fExts[$pIndex . '_row']}}" @endif style="text-align: center; border-left-width:1px;vertical-align:middle;white-space: nowrap; overflow: hidden;">
          {!!$vName!!}
          @if ($pointLabel && count($tTitles) == $pNum)
          <span data-toggle="modal" href="#{{$pointLabel}}" style="color:blue">更多</span>
          @endif
          </td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif
  @endforeach
</div>

@if (!empty($formatedExtDatas))
@foreach ($formatedExtDatas as $pLabel => $feData)
<div id="{{$pLabel}}" class="modal container hide fade in" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    @if (!empty($edTitle)) <h3 >{{$edTitle}}r</h3> @endif
  </div>
  <div class="modal-body">
    @if (isset($feData['infos']))
    <table class="table table-striped table-bordered table-hover">
      <tbody>
        @foreach ($feData['infos'] as $extDetail)
        <tr>
          @foreach ($extDetail as $vData)
          <td>
            <span >{!!$vData!!}</span>
          </td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
    @if (isset($feData['brief'])) 
    <h4 style="display: flex; justify-content: center; align-items: center;"><em>{!!$feData['brief']!!}</em></h4>
    @endif
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
@endforeach
@endif
