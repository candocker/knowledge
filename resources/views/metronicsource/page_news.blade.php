@php $datas['layoutDatas'] = ['viewCode' => 'news', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12 news-page">
            <h1>Recent News</h1>
            <div class="row-fluid">
              <div class="span5">
                <div id="myCarousel" class="carousel slide">
                  <!-- Carousel indicators
                    <ol class="carousel-indicators">
                     <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                     <li data-target="#myCarousel" data-slide-to="1"></li>
                     <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    -->
                  <!-- Carousel items -->
                  <div class="carousel-inner">
                    <div class="active item">
                      <img src="{{$commonAssetUrl}}/metronic/media/image/image5.jpg" alt="">
                      <div class="carousel-caption">
                        <h4><a href="page_news_item.html">First Thumbnail label</a></h4>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor.</p>
                      </div>
                    </div>
                    <div class="item">
                      <img src="{{$commonAssetUrl}}/metronic/media/image/image2.jpg" alt="">
                      <div class="carousel-caption">
                        <h4><a href="page_news_item.html">Second Thumbnail label</a></h4>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor.</p>
                      </div>
                    </div>
                    <div class="item">
                      <img src="{{$commonAssetUrl}}/metronic/media/image/image1.jpg" alt="">
                      <div class="carousel-caption">
                        <h4><a href="page_news_item.html">Third Thumbnail label</a></h4>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor.</p>
                      </div>
                    </div>
                  </div>
                  <!-- Carousel nav -->
                  <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                  <i class="m-icon-big-swapleft m-icon-white"></i>
                  </a>
                  <a class="carousel-control right" href="#myCarousel" data-slide="next">
                  <i class="m-icon-big-swapright m-icon-white"></i>
                  </a>
                </div>
                <div class="top-news">
                  <a href="#" class="btn blue">
                  <span>Featured News</span>
                  <em>
                  <i class="icon-tags"></i>
                  USA, Business, Apple
                  </em>
                  <i class="icon- icon-bullhorn top-news-icon"></i>
                  </a>
                </div>
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Google Glass Technology..</a></h3>
                  <div class="news-block-tags">
                    <strong>CA, USA</strong>
                    <em>3 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image1.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Sint occaecati cupiditat</a></h3>
                  <div class="news-block-tags">
                    <strong>London, UK</strong>
                    <em>7 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image4.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Accusamus et iusto odio</a></h3>
                  <div class="news-block-tags">
                    <strong>CA, USA</strong>
                    <em>3 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image5.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
              </div>
              <!--end span5-->
              <div class="span4">
                <div class="top-news">
                  <a href="#" class="btn red">
                  <span>World News</span>
                  <em>
                  <i class="icon-tags"></i>
                  UK, Canada, Asia
                  </em>
                  <i class="icon-globe top-news-icon"></i>
                  </a>
                </div>
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Odio dignissimos ducimus</a></h3>
                  <div class="news-block-tags">
                    <strong>Berlin, Germany</strong>
                    <em>2 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image3.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Sanditiis praesentium vo</a></h3>
                  <div class="news-block-tags">
                    <strong>Ankara, Turkey</strong>
                    <em>5 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image5.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint praesentium voluptatum delenitioccaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
                <div class="top-news">
                  <a href="#" class="btn green">
                  <span>Finance</span>
                  <em>
                  <i class="icon-tags"></i>
                  Money, Business, Google
                  </em>
                  <i class="icon-briefcase top-news-icon"></i>
                  </a>
                </div>
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Odio dignissimos ducimus</a></h3>
                  <div class="news-block-tags">
                    <strong>Berlin, Germany</strong>
                    <em>2 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image3.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Sanditiis praesentium vo</a></h3>
                  <div class="news-block-tags">
                    <strong>Ankara, Turkey</strong>
                    <em>5 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image5.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint praesentium voluptatum delenitioccaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
              </div>
              <!--end span4-->
              <div class="span3">
                <div class="top-news">
                  <a href="#" class="btn purple">
                  <span>Science</span>
                  <em>
                  <i class="icon-tags"></i>
                  Hi-Tech, Medicine, Space
                  </em>
                  <i class="icon-beaker top-news-icon"></i>
                  </a>
                </div>
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Vero eos et accusam</a></h3>
                  <div class="news-block-tags">
                    <strong>CA, USA</strong>
                    <em>3 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image2.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Sias excepturi sint occae</a></h3>
                  <div class="news-block-tags">
                    <strong>Vancouver, Canada</strong>
                    <em>3 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image4.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
                <div class="top-news">
                  <a href="#" class="btn yellow">
                  <span>Sport</span>
                  <em>
                  <i class="icon-tags"></i>
                  Football, Swimming, Tennis
                  </em>
                  <i class="icon-trophy top-news-icon"></i>
                  </a>
                </div>
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Vero eos et accusam</a></h3>
                  <div class="news-block-tags">
                    <strong>CA, USA</strong>
                    <em>3 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image2.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
              </div>
              <!--end span3-->
            </div>
            <div class="space20"></div>
            <h2>News Option</h2>
            <div class="row-fluid">
              <div class="span3">
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Google Glass Technology..</a></h3>
                  <div class="news-block-tags">
                    <strong>LA, USA</strong>
                    <em>2 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image5.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Google Glass Technology..</a></h3>
                  <div class="news-block-tags">
                    <strong>Berlin, Germany</strong>
                    <em>6 hours ago</em>
                  </div>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
              </div>
              <!--end span3-->
              <div class="span3">
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Google Glass Technology..</a></h3>
                  <div class="news-block-tags">
                    <strong>CA, USA</strong>
                    <em>3 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image3.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Google Glass Technology..</a></h3>
                  <div class="news-block-tags">
                    <strong>CA, USA</strong>
                    <em>3 hours ago</em>
                  </div>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
              </div>
              <!--end span3-->
              <div class="span6">
                <div class="news-blocks">
                  <h3><a href="page_news_item.html">Pusto odio dignissimos ducimus i quos dolores et qui blanditiis praesentium..</a></h3>
                  <div class="news-block-tags">
                    <strong>CA, USA</strong>
                    <em>3 hours ago</em>
                  </div>
                  <p><img class="news-block-img pull-right" src="{{$commonAssetUrl}}/metronic/media/image/image2.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident iti.. </p>
                  <a href="page_news_item.html" class="news-block-btn">
                  Read more
                  <i class="m-icon-swapright m-icon-black"></i>
                  </a>
                </div>
                <div class="row-fluid">
                  <div class="span6 news-blocks">
                    <h3><a href="page_news_item.html">Vero eos et accusamus et iusto od qui..</a></h3>
                    <div class="news-block-tags">
                      <strong>CA, USA</strong>
                      <em>3 hours ago</em>
                    </div>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                    <a href="page_news_item.html" class="news-block-btn">
                    Read more
                    <i class="m-icon-swapright m-icon-black"></i>
                    </a>
                  </div>
                  <div class="span6 news-blocks">
                    <h3><a href="page_news_item.html">Google Glass Technology..</a></h3>
                    <div class="news-block-tags">
                      <strong>CA, USA</strong>
                      <em>3 hours ago</em>
                    </div>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                    <a href="page_news_item.html" class="news-block-btn">
                    Read more
                    <i class="m-icon-swapright m-icon-black"></i>
                    </a>
                  </div>
                </div>
              </div>
              <!--end span6-->
            </div>
            <div class="space20"></div>
            <h2>News Feeds</h2>
            <div class="row-fluid top-news">
              <div class="span3">
                <a href="#" class="btn red">
                <span>Metronic News</span>
                <em>Posted on: April 16, 2013</em>
                <em>
                <i class="icon-tags"></i>
                Money, Business, Google
                </em>
                <i class="icon-briefcase top-news-icon"></i>
                </a>
              </div>
              <div class="span3">
                <a href="#" class="btn green">
                <span>Top Week</span>
                <em>Posted on: April 15, 2013</em>
                <em>
                <i class="icon-tags"></i>
                Internet, Music, People
                </em>
                <i class="icon-music top-news-icon"></i>
                </a>
              </div>
              <div class="span3">
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
              <div class="span3">
                <a href="#" class="btn yellow">
                <span>Study Abroad</span>
                <em>Posted on: April 13, 2013</em>
                <em>
                <i class="icon-tags"></i>
                Education, Students, Canada
                </em>
                <i class="icon-book top-news-icon"></i>
                </a>
              </div>
            </div>
            <div class="row-fluid top-news">
              <div class="span3">
                <a href="#" class="btn green">
                <span>Top Week</span>
                <em>Posted on: April 15, 2013</em>
                <em>
                <i class="icon-tags"></i>
                Internet, Music, People
                </em>
                <i class="icon-music top-news-icon"></i>
                </a>
              </div>
              <div class="span3">
                <a href="#" class="btn yellow">
                <span>Study Abroad</span>
                <em>Posted on: April 13, 2013</em>
                <em>
                <i class="icon-tags"></i>
                Education, Students, Canada
                </em>
                <i class="icon-book top-news-icon"></i>
                </a>
              </div>
              <div class="span3">
                <a href="#" class="btn red">
                <span>Metronic News</span>
                <em>Posted on: April 16, 2013</em>
                <em>
                <i class="icon-tags"></i>
                Money, Business, Google
                </em>
                <i class="icon-briefcase top-news-icon"></i>
                </a>
              </div>
              <div class="span3">
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
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
