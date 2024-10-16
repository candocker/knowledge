@php $datas['layoutDatas'] = ['viewCode' => 'lock', 'bodyClass' => '', 'footerView' => 'no', 'onlyContent' => true]; @endphp
@extends('layouts.metronic-simple')
@section('content')
  <div class="page-lock">
    <div class="page-logo">
      <a class="brand" href="index.html">
      <img src="{{$commonAssetUrl}}/metronic/media/image/logo-big.png" alt="logo" />
      </a>
    </div>
    <div class="page-body">
      <img class="page-lock-img" src="{{$commonAssetUrl}}/metronic/media/image/profile.jpg" alt="">
      <div class="page-lock-info">
        <h1>Bob Nilson</h1>
        <span>bob@keenthemes.com</span>
        <span><em>Locked</em></span>
        <form class="form-search" action="index.html">
          <div class="input-append">
            <input type="text" class="m-wrap" placeholder="Password">
            <button type="submit" class="btn blue icn-only"><i class="m-icon-swapright m-icon-white"></i></button>
          </div>
          <div class="relogin">
            <a href="login.html">Not Bob Nilson ?</a>
          </div>
        </form>
      </div>
    </div>
    <div class="page-footer">
      2013 &copy; Metronic. Admin Dashboard Template.
    </div>
  </div>
@endsection
