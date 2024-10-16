@php $datas['layoutDatas'] = ['viewCode' => 'errorbase', 'bodyClass' => 'page-404-3', 'footerView' => 'no', 'onlyContent' => true]; @endphp
@extends('layouts.metronic-simple')
@section('content')
  <div class="page-inner">
    <img src="{{$commonAssetUrl}}/metronic/media/image/earth.jpg" alt="">
  </div>
  <div class="container error-404">
    <h1>404</h1>
    <h2>Houston, we have a problem.</h2>
    <p>
      Actually, the page you are looking for does not exist.
    </p>
    <p>
      <a href="index.html">Return home</a>
      <br>
    </p>
  </div>
@endsection
