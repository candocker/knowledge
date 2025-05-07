@php $commonTitles = $commonFixedDatas['titles'] ?? []; @endphp
<div class="portlet box green">
  @if (isset($commonFixedDatas['topName']))
  <div class="portlet-title">
    <div class="caption">
      <b>{{$commonFixedDatas['topName']}}</b>
    </div>
    <div class="tools">
      @if (isset($commonFixedDatas['showUrl']) && !empty($commonFixedDatas['showUrl']))<a href="{{$commonFixedDatas['showUrl']}}" style="color:red;">详情</a>@endif
    </div>
  </div>
  @endif
  @foreach ($commonFixedDatas as $tData)
  @if (isset($tData['infos']))
  @php $tTitles = $tData['titles'] ?? $commonTitles; $tInfos = $tData['infos'] ?? $tData['fixed']; @endphp
  <!--<div class="portlet-title">
    <div class="caption">
      <b>{{$tData['name']}}</b>
    </div>
    <div class="tools">
      @if (isset($tData['showUrl']) && !empty($tData['showUrl']))<a href="{{$tData['showUrl']}}" style="color:red;">详情</a>@endif
    </div>
  </div>-->
  <div class="portlet-body flip-scroll">
    <h4 style="display: flex; justify-content: center; align-items: center;"><em>{{$tData['name']}}</em></h4>
    @if (isset($tData['brief']))<p class="page-title" style="text-align: center; margin-top:0px;color:red; font-weight:normal; font-style:oblique;"> <small>{!!$tData['brief']!!}</small></p>@endif
    <table class="table-bordered table-striped table-condensed flip-content table-bordered">
      <thead class="flip-content">
        <tr>
          @foreach ($tTitles as $tName)
          <th>{!!$tName!!}</th>
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
  @endif
  @endforeach
</div>
