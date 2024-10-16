@php $datas['layoutDatas'] = ['viewCode' => 'news', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12 news-page blog-page">
            <div class="row-fluid">
              <div class="span8 blog-tag-data">
                <h1>Recent News</h1>
                <img src="{{$commonAssetUrl}}/metronic/media/image/item_img1.jpg" alt="">
                <div class="row-fluid">
                  <div class="span6">
                    <ul class="unstyled inline blog-tags">
                      <li>
                        <i class="icon-tags"></i>
                        <a href="#">Technology</a>
                        <a href="#">Education</a>
                        <a href="#">Internet</a>
                      </li>
                    </ul>
                  </div>
                  <div class="span6 blog-tag-data-inner">
                    <ul class="unstyled inline">
                      <li><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></li>
                      <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>
                    </ul>
                  </div>
                </div>
                <div class="news-item-page">
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culp orem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus.</p>
                  <blockquote class="hero">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit posuere erat a ante.</p>
                     <small>Someone famous <cite title="Source Title">Source Title</cite></small>
                  </blockquote>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique dimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus.</p>
                </div>
                <hr>
                <div class="media">
                  <h3>Comments</h3>
                  <a href="#" class="pull-left">
                  <img alt="" src="{{$commonAssetUrl}}/metronic/media/image/9.jpg" class="media-object">
                  </a>
                  <div class="media-body">
                    <h4 class="media-heading">Media heading <span>5 hours ago / <a href="#">Reply</a></span></h4>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <hr>
                    <!-- Nested media object -->
                    <div class="media">
                      <a href="#" class="pull-left">
                      <img alt="" src="{{$commonAssetUrl}}/metronic/media/image/5.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">Media heading <span>17 hours ago / <a href="#">Reply</a></span></h4>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                      </div>
                    </div>
                    <!--end media-->
                    <hr>
                    <div class="media">
                      <a href="#" class="pull-left">
                      <img alt="" src="{{$commonAssetUrl}}/metronic/media/image/7.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">Media heading <span>2 days ago / <a href="#">Reply</a></span></h4>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                      </div>
                    </div>
                    <!--end media-->
                  </div>
                </div>
                <hr>
                <div class="post-comment">
                  <h3>Leave a Comment</h3>
                  <form>
                    <label>Name</label>
                    <input type="text" class="span7 m-wrap">
                    <label>Email <span class="color-red">*</span></label>
                    <input type="text" class="span7 m-wrap">
                    <label>Message</label>
                    <textarea class="span10 m-wrap" rows="8"></textarea>
                    <p><button class="btn blue" type="submit">Post a Comment</button></p>
                  </form>
                </div>
              </div>
              <div class="span4">
                <h2>News Feeds</h2>
                <div class="top-news">
                  <a href="#" class="btn green">
                  <span>Top Week</span>
                  <em>Posted on: April 15, 2013</em>
                  <em>
                  <i class="icon-tags"></i>
                  Internet, Music, People
                  </em>
                  <i class="icon-music top-news-icon"></i>
                  </a>
                  <a href="#" class="btn yellow">
                  <span>Study Abroad</span>
                  <em>Posted on: April 13, 2013</em>
                  <em>
                  <i class="icon-tags"></i>
                  Education, Students, Canada
                  </em>
                  <i class="icon-book top-news-icon"></i>
                  </a>
                  <a href="#" class="btn red">
                  <span>Metronic News</span>
                  <em>Posted on: April 16, 2013</em>
                  <em>
                  <i class="icon-tags"></i>
                  Money, Business, Google
                  </em>
                  <i class="icon-briefcase top-news-icon"></i>
                  </a>
                  <a href="#" class="btn blue">
                  <span>Gold Price Falls</span>
                  <em>Posted on: April 14, 2013</em>
                  <em>
                  <i class="icon-tags"></i>
                  USA, Business, Apple
                  </em>
                  <i class="icon-globe top-news-icon"></i>
                  </a>
                </div>
                <div class="space20"></div>
                <h2>News Tags</h2>
                <ul class="unstyled inline sidebar-tags">
                  <li><a href="#"><i class="icon-tags"></i> Business</a></li>
                  <li><a href="#"><i class="icon-tags"></i> Music</a></li>
                  <li><a href="#"><i class="icon-tags"></i> Internet</a></li>
                  <li><a href="#"><i class="icon-tags"></i> Money</a></li>
                  <li><a href="#"><i class="icon-tags"></i> Google</a></li>
                  <li><a href="#"><i class="icon-tags"></i> TV Shows</a></li>
                  <li><a href="#"><i class="icon-tags"></i> Education</a></li>
                  <li><a href="#"><i class="icon-tags"></i> People</a></li>
                  <li><a href="#"><i class="icon-tags"></i> People</a></li>
                  <li><a href="#"><i class="icon-tags"></i> Math</a></li>
                  <li><a href="#"><i class="icon-tags"></i> Photos</a></li>
                  <li><a href="#"><i class="icon-tags"></i> Electronics</a></li>
                  <li><a href="#"><i class="icon-tags"></i> Apple</a></li>
                  <li><a href="#"><i class="icon-tags"></i> Canada</a></li>
                </ul>
                <div class="space20"></div>
                <h2>Tabs</h2>
                <div class="tabbable tabbable-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab_1_1">Section 1</a></li>
                    <li class=""><a data-toggle="tab" href="#tab_1_2">Section 2</a></li>
                    <li class=""><a data-toggle="tab" href="#tab_1_3">Section 3</a></li>
                  </ul>
                  <div class="tab-content">
                    <div id="tab_1_1" class="tab-pane active">
                      <p>I'm in Section 1.</p>
                      <p>
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                      </p>
                    </div>
                    <div id="tab_1_2" class="tab-pane">
                      <p>Howdy, I'm in Section 2.</p>
                      <p>
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
                      </p>
                    </div>
                    <div id="tab_1_3" class="tab-pane">
                      <p>Howdy, I'm in Section 3.</p>
                      <p>
                        Duis autem vel eum iriure dolor in hendrerit in vulputate.
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat
                      </p>
                    </div>
                  </div>
                </div>
                <div class="space20"></div>
                <h2>Recent Twitts</h2>
                <div class="blog-twitter">
                  <div class="blog-twitter-block">
                    <a href="">@keenthemes</a>
                    <p>At vero eos et accusamus et iusto odio.</p>
                    <a href="#"><em>http://t.co/sBav7dm</em></a>
                    <span>5 hours ago</span>
                    <i class="icon-twitter blog-twiiter-icon"></i>
                  </div>
                  <div class="blog-twitter-block">
                    <a href="">@keenthemes</a>
                    <p>At vero eos et accusamus et iusto odio.</p>
                    <a href="#"><em>http://t.co/sBav7dm</em></a>
                    <span>8 hours ago</span>
                    <i class="icon-twitter blog-twiiter-icon"></i>
                  </div>
                  <div class="blog-twitter-block">
                    <a href="">@keenthemes</a>
                    <p>At vero eos et accusamus et iusto odio.</p>
                    <a href="#"><em>http://t.co/sBav7dm</em></a>
                    <span>12 hours ago</span>
                    <i class="icon-twitter blog-twiiter-icon"></i>
                  </div>
                </div>
                <div class="space20"></div>
                <h2>Flickr</h2>
                <ul class="unstyled blog-images">
                  <li>
                    <a class="fancybox-button" data-rel="fancybox-button" title="390 x 220 - keenthemes.com" href="media/image/1.jpg">
                    <img alt="" src="{{$commonAssetUrl}}/metronic/media/image/1.jpg">
                    </a>
                  </li>
                  <li><a href="#"><img alt="" src="{{$commonAssetUrl}}/metronic/media/image/2.jpg"></a></li>
                  <li><a href="#"><img alt="" src="{{$commonAssetUrl}}/metronic/media/image/3.jpg"></a></li>
                  <li><a href="#"><img alt="" src="{{$commonAssetUrl}}/metronic/media/image/4.jpg"></a></li>
                  <li><a href="#"><img alt="" src="{{$commonAssetUrl}}/metronic/media/image/5.jpg"></a></li>
                  <li><a href="#"><img alt="" src="{{$commonAssetUrl}}/metronic/media/image/6.jpg"></a></li>
                  <li><a href="#"><img alt="" src="{{$commonAssetUrl}}/metronic/media/image/8.jpg"></a></li>
                  <li><a href="#"><img alt="" src="{{$commonAssetUrl}}/metronic/media/image/10.jpg"></a></li>
                  <li><a href="#"><img alt="" src="{{$commonAssetUrl}}/metronic/media/image/11.jpg"></a></li>
                  <li><a href="#"><img alt="" src="{{$commonAssetUrl}}/metronic/media/image/1.jpg"></a></li>
                  <li><a href="#"><img alt="" src="{{$commonAssetUrl}}/metronic/media/image/2.jpg"></a></li>
                  <li><a href="#"><img alt="" src="{{$commonAssetUrl}}/metronic/media/image/7.jpg"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
