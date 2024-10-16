@php $datas['layoutDatas'] = ['viewCode' => 'comingsoon', 'bodyClass' => '', 'footerView' => 'no', 'onlyContent' => true]; @endphp
@extends('layouts.metronic-simple')
@section('content')
  <div class="container">
    <div class="row-fluid">
      <div class="span12 coming-soon-header">
        <a class="brand" href="index.html">
        <img src="{{$commonAssetUrl}}/metronic/media/image/logo-big.png" alt="logo" />
        </a>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span6 coming-soon-content">
        <h1>Coming Soon!</h1>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi vehicula sem ut volutpat. Ut non libero magna fusce condimentum eleifend enim a feugiat.</p>
        <br>
        <form class="form-search" action="#">
          <div class="input-append">
            <input type="text" class="m-wrap" placeholder="Your Email">
            <button type="button" class="btn blue btn-subscribe"><span>Subscribe</span> <i class="m-icon-swapright m-icon-white"></i></button>
          </div>
        </form>
        <ul class="social-icons">
          <li><a href="#" data-original-title="Feed" class="rss"></a></li>
          <li><a href="#" data-original-title="Facebook" class="facebook"></a></li>
          <li><a href="#" data-original-title="Twitter" class="twitter"></a></li>
          <li><a href="#" data-original-title="Goole Plus" class="googleplus"></a></li>
          <li><a href="#" data-original-title="Pinterest" class="pintrest"></a></li>
          <li><a href="#" data-original-title="Linkedin" class="linkedin"></a></li>
          <li><a href="#" data-original-title="Vimeo" class="vimeo"></a></li>
        </ul>
      </div>
      <div class="span6 coming-soon-countdown">
        <div id="defaultCountdown"></div>
      </div>
    </div>
    <!--/end row-fluid-->
    <div class="row-fluid">
      <div class="span12 coming-soon-footer">
        2013 &copy; Metronic. Admin Dashboard Template.
      </div>
    </div>
  </div>
@endsection
