@php $commonTitles = $fixedDatas['titles'] ?? []; @endphp
@foreach ($fixedDatas as $tData)
@if (isset($tData['infos']))
@php $tTitles = $TData['titles'] ?? $commonTitles; $tInfos = $tData['infos'] ?? $tData['fixed']; @endphp
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
  <div class="portlet-body flip-scroll">
    <table class="table-bordered table-striped table-condensed flip-content table-bordered">
      <thead class="flip-content">
        <tr>
          @foreach ($tTitles as $tName)
          <th>{{$tName}}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($tInfos as $pData)
        <tr>
          @foreach ($pData as $vName)
          <td>{!!$vName!!}</td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif
@endforeach