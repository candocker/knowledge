<div class="cont" style="overflow: visible">
    @if ($datas['currentSort'] == 'operation')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{$datas['bigSort']['url']}}" style="color: #fff" title="新媒体运营资源导航">
            <!--<img src="{{$commonAssetUrl}}/nav/img/e0a62-6012.png" width="30" height="30" class="d-inline-block align-top" alt="果汁运营" />-->{{$datas['bigSort']['name']}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/rank">热榜</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">导航</a>
                </li>
                <li class="nav-item dropdown" style="z-index:20000">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">自媒体</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($datas['categorys']['mediaCategorys'] as $pData)
                        <a class="dropdown-item" href="{{$pData['url']}}">{{$pData['name']}}</a>
                        @endforeach
                        <!--<div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/tc/">联系/吐槽/捐助</a>-->
                    </div>
                </li>
                <li class="nav-item dropdown" style="z-index:20000">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">更多</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($datas['categorys']['categorys'] as $pData)
                        <a class="dropdown-item" href="{{$pData['url']}}">{{$pData['name']}}</a>
                        @endforeach
                        <!--<div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/tc/">联系/吐槽/捐助</a>-->
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="https://weixin.sogou.com/weixin" method="get">
                <input type="hidden" name="type" value="2" autocomplete="off">
                <input class="form-control mr-sm-2" aria-label="Search" type="text" name="query" class="s" id="sogouInput" autocomplete="off" placeholder="搜文章/公众号" baiduSug="1">
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="搜狗微信" id="sogou" /></form>
        </div>
    </nav>
    @else
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{$datas['bigSort']['url']}}">{{$datas['bigSort']['name']}}</a>
        <ul class="nav justify-content-end">
            <li class="nav-item"><a class="nav-link" href="/">导航</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">自媒体</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($datas['categorys']['mediaCategorys'] as $pData)
                    <a class="dropdown-item" href="{{$pData['url']}}">{{$pData['name']}}</a>
                    @endforeach
                    <!--<div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/tc/">联系/吐槽/捐助</a>-->
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">更多</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($datas['categorys']['categorys'] as $pData)
                    <a class="dropdown-item" href="{{$pData['url']}}">{{$pData['name']}}</a>
                    @endforeach
                    <!--<div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/tc/">联系/吐槽/捐助</a>-->
                </div>
            </li>
            <!--<li class="nav-item"><a class="nav-link" href="/search">搜索</a></li>-->
        </ul>
    </nav>
    @endif
    <div class="container so">
        @include('navigation.common._search-form', ['currentSort' => $datas['currentSort'], 'sortName' => $datas['bigSort']['name']])
        @if ($datas['focusDatas'])
        <h6 @if ($datas['currentSort'] == 'operation') class="hs" @else class="mob-hs" @endif>
            @foreach ($datas['focusDatas'] as $pData)
            <a href="{{$pData['url']}}">{{$pData['name']}}</a>&nbsp;
            @endforeach
        </h6>
        @endif
        @if ($datas['mobileLists'])
        <div class="tj">
            @foreach ($datas['mobileLists'] as $subData)
            <div class="row">
                @foreach ($subData as $pData)
                <div class="col">
                    <a href="{{$pData['url']}}">
                        <img src="{{$commonAssetUrl}}{{$pData['logo_path']}}">
                        <p>{{$pData['title']}}</p>
                    </a>
                </div>
                @endforeach 
            </div>
            @endforeach 
        </div>
        @endif
    </div>
</div>
{{--<img src="{{$commonAssetUrl}}/nav/img/f8f5c-5716.png" title="免费好用的在线工具大全" />果汁工具
<img src="{{$commonAssetUrl}}/nav/img/6cd27-5337.png" title="果汁导航漫画专栏" />漫画
<img src="{{$commonAssetUrl}}/nav/img/59da9-6231.png" title="免费好用的在线工具大全" />设计
<img src="{{$commonAssetUrl}}/nav/img/49372-2250.png" title="果汁导航游戏专栏" />游戏
<img src="{{$commonAssetUrl}}/nav/img/b3b98-5587.png" title="果汁导航新闻专栏" />新闻
<img src="{{$commonAssetUrl}}/nav/img/d9a9c-4402.png" title="果汁导航，精选优质实用网络资源" />图片
<img src="{{$commonAssetUrl}}/nav/img/f501c-9438.png" title="果汁导航小说专栏" />小说
<img src="{{$commonAssetUrl}}/nav/img/744f7-4446.png" title="官网便宜购" />惠购
<img src="{{$commonAssetUrl}}/nav/img/16226-2102.png" title="果汁教育专栏" />教育
<img src="{{$commonAssetUrl}}/nav/img/d9a9c-4402.png" title="果汁导航，精选优质实用网络资源" /> 影视--}}
