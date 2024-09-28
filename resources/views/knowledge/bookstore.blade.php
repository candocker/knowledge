@php
$tableColors = ['red', 'green', 'purple', 'yellow'];
$tableIcons = ['cogs', 'coffee', 'comments', 'picture', 'bell', 'shopping'];
$icons = ['briefcase', 'bookmark', 'briefcase', 'shopping-cart', 'question-sign', 'user'];
$labels = ['success', 'info', 'warning', 'danger']; //'mini',
//$tableTypes = ['', 'table-advance', 'table-striped', 'table-bordered', 'table-condensed']
@endphp
@extends('layouts.metronic')
@section('content')
<div class="container-fluid">
  @include('knowledge.metronic._setting', ['datas' => $datas])
  <div class="row-fluid">
    <div class="span12">
      <div class="portlet box {{$tableColors[rand(0, 3)]}}">
        <div class="portlet-title">
          <div class="caption"><i class="icon-{{$tableIcons[rand(0, 5)]}}"></i>{{$datas['currentVolume']['name']}}</div>
        </div>
        <div class="portlet-body">
          <table class="table table-striped table-bordered table-hover table-advance">
            <thead>
              <tr>
                @foreach ($datas['tableTitles'] as $pData)
                <th>{{$pData}}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach ($datas['bookListings'] as $pData)
              <tr>
                @foreach ($datas['tableTitles'] as $tField => $tName)
                <th>{{$pData[$tField]}}</th>
                @endforeach
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
