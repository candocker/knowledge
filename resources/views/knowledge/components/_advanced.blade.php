@php $commonTitles = $advancedDatas['titles'] ?? []; @endphp
@foreach ($advancedDatas as $tData)
@if (isset($tData['infos']))
@php $tTitles = $tData['titles'] ?? $commonTitles; @endphp
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
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
        <table class="table table-striped table-bordered table-hover table-full-width" id="table_self_advanced">
          <thead>
            <tr>
              @php $i = 1; @endphp
              @foreach ($tTitles as $tTitle)
              <th @if ($i >2) class="hidden-480" @endif>{{$tTitle}}</th>
              @php $i++; @endphp
              @endforeach

              @if (isset($tData['titleExts']))
              @foreach ($tData['titleExts'] as $eTitle)
              <th style="display:none">{{$eTitle}}</th>
              @endforeach
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach ($tData['infos'] as $pData)
            <tr>
              @php $j = 1; $index = 0; @endphp
              @foreach ($tTitles as $key => $tTitle)
              @php $pStr = $pData[$key] ?? $pData[$index]; $index++; @endphp
              <td @if ($j >2) class="hidden-480" @endif>{!!$pStr!!}</td>
              @php $j++; @endphp
              @endforeach

              @if (isset($tData['titleExts']))
              @foreach ($tData['titleExts'] as $key => $eTitle)
              @php $pStr = $pData[$index] ?? ''; $index++; @endphp
              <td style="display:none">{!!$pStr!!}</td>
              @endforeach
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endif
@endforeach
