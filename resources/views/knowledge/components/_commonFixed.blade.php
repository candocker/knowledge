@php
$commonTitles = $commonFixedDatas['titles'] ?? []; 
$formatedExtDatas = [];
@endphp
<div class="portlet box green">
  @if (isset($commonFixedDatas['topName']))
  <div class="portlet-title">
    <div class="caption">
      <b>{!!$commonFixedDatas['topName']!!}</b>
    </div>
    <div class="tools">
      @if (isset($commonFixedDatas['showUrl']) && !empty($commonFixedDatas['showUrl']))<a href="{{$commonFixedDatas['showUrl']}}" style="color:red;">详情</a>@endif
    </div>
  </div>
  @endif
  @foreach ($commonFixedDatas as $tData)
  @if (isset($tData['infos']))
  @php
  $tTitles = $tData['titles'] ?? $commonTitles;
  $tInfos = $tData['infos'] ?? $tData['fixed'];
  $extDetails = $tData['extDetails'] ?? [];
  @endphp
  <!--<div class="portlet-title">
    <div class="caption">
      <b>{{$tData['name']}}</b>
    </div>
    <div class="tools">
      @if (isset($tData['showUrl']) && !empty($tData['showUrl']))<a href="{{$tData['showUrl']}}" style="color:red;">详情</a>@endif
    </div>
  </div>-->
  <div class="portlet-body flip-scroll">
    <h4 style="display: flex; justify-content: center; align-items: center;"><em>{!!$tData['name']!!}</em></h4>
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
        @foreach ($tInfos as $pIndex => $pData)
        <tr>
          @foreach ($pData as $ppIndex => $vName)
          @php
          $pointLabel = false;
          if ($pIndex == count($tInfos) - 1 && !empty($extDetails[$ppIndex])) {
            $pointLabel = md5(uniqid(rand(), true));
            $formatedExtDatas[$pointLabel] = $extDetails[$ppIndex];
          }
          @endphp
          <td>
            {!!$vName!!}
            @if ($pointLabel)
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
  <div class="portlet-body flip-scroll">
    <table class="table-bordered table-striped table-condensed flip-content table-bordered">
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
    </dev>
    @endif
    @if (isset($feData['brief'])) 
    <h4 style="display: flex; justify-content: center; align-items: center;"><em>{!!$feData['brief']!!}</em></h4>
    @endif
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
  </div>
</div>
@endforeach
@endif
