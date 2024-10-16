@php $datas['layoutDatas'] = ['viewCode' => 'about', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid margin-bottom-30">
          <div class="span6">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
            <ul class="unstyled margin-top-10 margin-bottom-10">
              <li><i class="icon-ok"></i> Nam liber tempor cum soluta</li>
              <li><i class="icon-ok"></i> Mirum est notare quam</li>
              <li><i class="icon-ok"></i> Lorem ipsum dolor sit amet</li>
              <li><i class="icon-ok"></i> Mirum est notare quam</li>
            </ul>
            <!-- Blockquotes -->
            <blockquote class="hero">
              <p>Lorem ipsum dolor sit amet, consectetuer sed diam nonummy nibh euismod tincidunt. </p>
               <small>Bob Nilson</small>
            </blockquote>
          </div>
          <div class="span6">
            <iframe src="{{$commonAssetUrl}}/metronic/http://player.vimeo.com/video/22439234" style="width:100%; height:327px;border:0" allowfullscreen></iframe>
          </div>
        </div>
        <!--/row-fluid-->
        <!-- Meer Our Team -->
        <div class="headline">
          <h3>Meet Our Team</h3>
        </div>
        <ul class="thumbnails">
          <li class="span3">
            <div class="meet-our-team">
              <h3>Bob Nilson  <small>Chief Executive Officer / CEO</small></h3>
              <img src="{{$commonAssetUrl}}/metronic/media/image/2.jpg" alt="" />
              <div class="team-info">
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                <ul class="social-icons pull-right">
                  <li><a href="#" data-original-title="twitter" class="twitter"></a></li>
                  <li><a href="#" data-original-title="facebook" class="facebook"></a></li>
                  <li><a href="#" data-original-title="linkedin" class="linkedin"></a></li>
                  <li><a href="#" data-original-title="Goole Plus" class="googleplus"></a></li>
                  <li><a href="#" data-original-title="skype" class="skype"></a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="span3">
            <div class="meet-our-team">
              <h3>Marta Doe  <small>Project Manager</small></h3>
              <img src="{{$commonAssetUrl}}/metronic/media/image/3.jpg" alt="" />
              <div class="team-info">
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                <ul class="social-icons pull-right">
                  <li><a href="#" data-original-title="twitter" class="twitter"></a></li>
                  <li><a href="#" data-original-title="facebook" class="facebook"></a></li>
                  <li><a href="#" data-original-title="linkedin" class="linkedin"></a></li>
                  <li><a href="#" data-original-title="Goole Plus" class="googleplus"></a></li>
                  <li><a href="#" data-original-title="skype" class="skype"></a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="span3">
            <div class="meet-our-team">
              <h3>Bob Nilson  <small>Chief Executive Officer / CEO</small></h3>
              <img src="{{$commonAssetUrl}}/metronic/media/image/2.jpg" alt="" />
              <div class="team-info">
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                <ul class="social-icons pull-right">
                  <li><a href="#" data-original-title="twitter" class="twitter"></a></li>
                  <li><a href="#" data-original-title="facebook" class="facebook"></a></li>
                  <li><a href="#" data-original-title="linkedin" class="linkedin"></a></li>
                  <li><a href="#" data-original-title="Goole Plus" class="googleplus"></a></li>
                  <li><a href="#" data-original-title="skype" class="skype"></a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="span3">
            <div class="meet-our-team">
              <h3>Marta Doe  <small>Project Manager</small></h3>
              <img src="{{$commonAssetUrl}}/metronic/media/image/3.jpg" alt="" />
              <div class="team-info">
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                <ul class="social-icons pull-right">
                  <li><a href="#" data-original-title="twitter" class="twitter"></a></li>
                  <li><a href="#" data-original-title="facebook" class="facebook"></a></li>
                  <li><a href="#" data-original-title="linkedin" class="linkedin"></a></li>
                  <li><a href="#" data-original-title="Goole Plus" class="googleplus"></a></li>
                  <li><a href="#" data-original-title="skype" class="skype"></a></li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
        <!--/thumbnails-->
        <!-- //End Meer Our Team -->
        <!-- END PAGE CONTENT-->
      </div>
@endsection
