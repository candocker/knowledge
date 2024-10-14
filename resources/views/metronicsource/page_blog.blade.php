@php $datas['layoutDatas'] = ['viewCode' => 'blog', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12 blog-page">
            <div class="row-fluid">
              <div class="span9 article-block">
                <h1>Latest Blog</h1>
                <div class="row-fluid">
                  <div class="span4 blog-img blog-tag-data">
                    <img src="{{$commonAssetUrl}}/metronic/media/image/image4.jpg" alt="">
                    <ul class="unstyled inline">
                      <li><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></li>
                      <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>
                    </ul>
                    <ul class="unstyled inline blog-tags">
                      <li>
                        <i class="icon-tags"></i>
                        <a href="#">Technology</a>
                        <a href="#">Education</a>
                        <a href="#">Internet</a>
                      </li>
                    </ul>
                  </div>
                  <div class="span8 blog-article">
                    <h2><a href="page_blog_item.html">Hello here will be some recent news..</a></h2>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>
                    <a class="btn blue" href="page_blog_item.html">
                    Read more
                    <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                  </div>
                </div>
                <hr>
                <div class="row-fluid">
                  <div class="span4 blog-img blog-tag-data">
                    <img src="{{$commonAssetUrl}}/metronic/media/image/image3.jpg" alt="">
                    <ul class="unstyled inline">
                      <li><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></li>
                      <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>
                    </ul>
                    <ul class="unstyled inline blog-tags">
                      <li>
                        <i class="icon-tags"></i>
                        <a href="#">Technology</a>
                        <a href="#">Education</a>
                        <a href="#">Internet</a>
                      </li>
                    </ul>
                  </div>
                  <div class="span8 blog-article">
                    <h2><a href="page_blog_item.html">Hello here will be some recent news..</a></h2>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>
                    <a class="btn blue" href="page_blog_item.html">
                    Read more
                    <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                  </div>
                </div>
                <hr>
                <div class="row-fluid">
                  <div class="span4 blog-img blog-tag-data">
                    <img src="{{$commonAssetUrl}}/metronic/media/image/image4.jpg" alt="">
                    <ul class="unstyled inline">
                      <li><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></li>
                      <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>
                    </ul>
                    <ul class="unstyled inline blog-tags">
                      <li>
                        <i class="icon-tags"></i>
                        <a href="#">Technology</a>
                        <a href="#">Education</a>
                        <a href="#">Internet</a>
                      </li>
                    </ul>
                  </div>
                  <div class="span8 blog-article">
                    <h2><a href="page_blog_item.html">Hello here will be some recent news..</a></h2>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>
                    <a class="btn blue" href="page_blog_item.html">
                    Read more
                    <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                  </div>
                </div>
                <hr>
                <div class="row-fluid">
                  <div class="span4 blog-img blog-tag-data">
                    <img src="{{$commonAssetUrl}}/metronic/media/image/image3.jpg" alt="">
                    <ul class="unstyled inline">
                      <li><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></li>
                      <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>
                    </ul>
                    <ul class="unstyled inline blog-tags">
                      <li>
                        <i class="icon-tags"></i>
                        <a href="#">Technology</a>
                        <a href="#">Education</a>
                        <a href="#">Internet</a>
                      </li>
                    </ul>
                  </div>
                  <div class="span8 blog-article">
                    <h2><a href="page_blog_item.html">Hello here will be some recent news..</a></h2>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>
                    <a class="btn blue" href="page_blog_item.html">
                    Read more
                    <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                  </div>
                </div>
              </div>
              <!--end span9-->
              <div class="span3 blog-sidebar">
                <h2>Top Entiries</h2>
                <div class="top-news">
                  <a href="#" class="btn red">
                  <span>Metronic News</span>
                  <em>Posted on: April 16, 2013</em>
                  <em>
                  <i class="icon-tags"></i>
                  Money, Business, Google
                  </em>
                  <i class="icon-briefcase top-news-icon"></i>
                  </a>
                  <a href="#" class="btn green">
                  <span>Top Week</span>
                  <em>Posted on: April 15, 2013</em>
                  <em>
                  <i class="icon-tags"></i>
                  Internet, Music, People
                  </em>
                  <i class="icon-music top-news-icon"></i>
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
                  <a href="#" class="btn yellow">
                  <span>Study Abroad</span>
                  <em>Posted on: April 13, 2013</em>
                  <em>
                  <i class="icon-tags"></i>
                  Education, Students, Canada
                  </em>
                  <i class="icon-book top-news-icon"></i>
                  </a>
                  <a href="#" class="btn purple">
                  <span>Top Destinations</span>
                  <em>Posted on: April 12, 2013</em>
                  <em>
                  <i class="icon-tags"></i>
                  Places, Internet, Google Map
                  </em>
                  <i class="icon-bolt top-news-icon"></i>
                  </a>
                </div>
                <div class="space20"></div>
                <h2>Flickr</h2>
                <ul class="unstyled blog-images">
                  <li>
                    <a  class="fancybox-button" data-rel="fancybox-button" title="390 x 220 - keenthemes.com" href="media/image/1.jpg">
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
                    <span>2 hours ago</span>
                    <i class="icon-twitter blog-twiiter-icon"></i>
                  </div>
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
                    <span>7 hours ago</span>
                    <i class="icon-twitter blog-twiiter-icon"></i>
                  </div>
                </div>
              </div>
              <!--end span3-->
            </div>
            <div class="pagination pagination-right">
              <ul>
                <li><a href="#">Prev</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li class="active"><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">Next</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
