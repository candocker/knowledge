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
          <div class="caption"><i class="icon-{{$tableIcons[rand(0, 5)]}}"></i>Simple Table</div>
        </div>
        <div class="portlet-body">
          <table class="table table-striped table-bordered table-hover table-advance">
            <thead>
              <tr>
                <th>序号</th>
                <th>Last Name</th>
                <th class="hidden-480">Username</th>
                <th>Descrition</th>
                <th class="hidden-phone">Contact</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td class="hidden-480">lar</td>
                <td class="hidden-phone">Server hardware purchase</td>
                <td><span class="label label-success">Approved</span></td>
                <td>610.50$ <span class="label label-danger label-mini">Overdue</span></td>
                <td><a href="#">Pixel Ltd</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
