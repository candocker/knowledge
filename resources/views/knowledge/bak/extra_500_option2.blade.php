@php $datas['layoutDatas'] = ['viewCode' => 'error500', 'bodyClass' => 'page-500-full-page', 'footerView' => 'no', 'onlyContent' => true]; @endphp
@extends('layouts.metronic-simple')
@section('content')
  <div class="row-fluid">
    <div class="span12 page-500">
      <div class=" number">
        500
      </div>
      <div class=" details">
        <h3>Opps, Something went wrong.</h3>
        <p>
          We are fixing it!<br />
          Please come back in a while.<br /><br />
        </p>
      </div>
    </div>
  </div>
@endsection
