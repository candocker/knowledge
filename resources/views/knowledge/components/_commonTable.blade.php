@php
$colors = ['#c8dade', '#6dc1d3'];
@endphp
@php $commonTitles = $commonTableDatas['titles'] ?? []; @endphp
@foreach ($commonTableDatas as $tData)
@if (isset($tData['infos']))
@php $tTitles = $tData['titles'] ?? $commonTitles; @endphp
<div class="portlet box green">
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
</div>
@endif
@endforeach
