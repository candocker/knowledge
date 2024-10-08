@foreach ($tableDatas as $tData)
<div class="portlet box {{$tableColors[rand(0, 2)]}}">
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
          @foreach ($tData['titles'] as $tTitle)
          <th>{{$tTitle}}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($tData['infos'] as $pData)
        <tr>
          @foreach ($pData as $vName)
          <th>{!!$vName!!}</th>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endforeach
