@extends('layouts.website-mini')
@section('dynamicMeta')@include('modules._meta', $datas['tdkData'])@endsection
@section('content')

<script type="text/javascript" src="{{$commonAssetUrl}}/classical/index.js"></script>
<section>
  <div class="container .uix-spacing--s" style="padding-top:10px">
    <div class="row">
      <div class="col-12">
        <h4 class="uix-heading--pinline">{{$datas['name']}}</h4>
        <p class="uix-heading--pinline">{{$datas['brief']}}</p>
        <hr>
      </div>
    </div>
  </div>
</section>
@include('read.lists._' . $datas['pageCode'], ['datas' => $datas])

@endsection
