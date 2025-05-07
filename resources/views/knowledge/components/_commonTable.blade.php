@php
$colors = ['#c8dade', '#6dc1d3'];
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
  <div class="portlet-body">
      <h4 style="display: flex; justify-content: center; align-items: center;"><em>{{$tData['name']}}</em></h4>
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
        @php $fExts = []; if (isset($pData['fExts'])) { $fExts = $pData['fExts']; unset($pData['fExts']); } @endphp
        <tr>
          @foreach ($pData as $pIndex => $vName)
          <td @if (isset($fExts[$pIndex . '_col'])) colspan="{{$fExts[$pIndex . '_col']}}" @endif  @if (isset($fExts[$pIndex . '_row'])) rowspan="{{$fExts[$pIndex . '_row']}}" @endif style="text-align: center; border-left-width:1px;vertical-align:middle;">{!!$vName!!}</td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif
  @endforeach
</div>
