@foreach ($onlinereadDatas as $tData)
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
    <table class="table table-striped table-bordered table-hover table-advance">
      <tbody>
        @foreach ($tData['infos'] as $pData)
        <tr>
          @foreach ($pData as $vData)
          @php $vName = $vData['name']; if (!empty($vData['bookCode'])) { $url = $isMobile ? "http://book.canliang.wang/pages/book/info?book_code={$vData['bookCode']}" : "/{$vData['bookCode']}/list.html"; $vName = "<a href='{$url}'>{$vName}</a>"; } @endphp
          <td @if (isset($vData['colspan'])) colspan="{{$vData['colspan']}}" @endif style="text-align: center;">{!!$vName!!}</td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endforeach
