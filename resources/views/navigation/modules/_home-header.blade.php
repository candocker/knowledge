<div class="top-cont">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="http://guozhivip.com/">
            <!--<img src="{{$commonAssetUrl}}/nav/img/d9a9c-4402.png" width="32" height="32" class="d-inline-block align-top" alt="导航" title="导航，精选优质实用网络资源" />--> 可定制导航
        </a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link date" href="https://qq.ip138.com/day/" target="_blank" title="点击查看日历">
                    <script>var weekDayLabels = new Array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六");
                        var now = new Date();
                        var year = now.getFullYear();
                        var month = now.getMonth() + 1;
                        var day = now.getDate();
                        var currentime = '<span class="special">' + year + '年' + month + '月' + day + '日 ' + weekDayLabels[now.getDay()] + '</span><br>';
                        document.write(currentime)
                    </script>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link tq">
                    <iframe allowtransparency="true" frameborder="0" width="180" height="33" scrolling="no" src="//tianqi.2345.com/plugin/widget/index.htm?s=3&z=2&t=0&v=0&d=1&bd=0&k=400000&f=ffffff&ltf=009944&htf=cc0000&q=1&e=1&a=1&c=54511&w=180&h=33&align=center"></iframe>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">自媒体</a>
                <div class="dropdown-menu dropdown-menu-right more" aria-labelledby="navbarDropdown">
                    @foreach ($datas['categorys']['mediaCategorys'] as $tIndex => $tData)
                    <div class="row row-cols-4 row-cols-sm-4 row-cols-md-4 row-cols-lg-4">
                        @foreach ($tData as $pKey => $pData)
                        <div class="col">
                            <a href="{{$pData['url']}}">
                                <img src="{{$commonAssetUrl}}{{$pData['icon_path']}}" />
                                <p>{{$pData['name_short']}}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @if ($tIndex == 1) <hr style="margin-top: 7px;"> @endif
                    @endforeach
                    <!--<hr style="margin-top: 7px;margin-bottom: 7px;">
                    <h6 style="font-size: 13px;">
                        <a href="/products/27320">反馈</a>·
                        <a href="/tc/">捐助</a>·
                        <a href="https://wj.qq.com/s2/7137862/9f15/">合作</a>
                    </h6>-->
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">更多</a>
                <div class="dropdown-menu dropdown-menu-right more" aria-labelledby="navbarDropdown">
                    @foreach ($datas['categorys']['categorys'] as $tIndex => $tData)
                    <div class="row row-cols-4 row-cols-sm-4 row-cols-md-4 row-cols-lg-4">
                        @foreach ($tData as $pKey => $pData)
                        <div class="col">
                            <a href="{{$pData['url']}}">
                                <img src="{{$commonAssetUrl}}{{$pData['icon_path']}}" />
                                <p>{{$pData['name_short']}}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @if ($tIndex == 1) <hr style="margin-top: 7px;"> @endif
                    @endforeach
                    <!--<hr style="margin-top: 7px;margin-bottom: 7px;">
                    <h6 style="font-size: 13px;">
                        <a href="/products/27320">反馈</a>·
                        <a href="/tc/">捐助</a>·
                        <a href="https://wj.qq.com/s2/7137862/9f15/">合作</a>
                    </h6>-->
                </div>
            </li>
            <!--<li class="nav-item jd">
                <a class="nav-link" href="http://guozhivip.com/yy/">一言</a>
            </li>
            <li class="nav-item jd">
                <a href="#renyimen" class="nav-link anchor-scroll" data-class-to="body">任意门</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#Login" title="注册登录后可添加自己常用的网站、云同步">
                    <i class="fa fa-user" style="color: #F90"></i> 登录</a>
                </a>
            </li>
            <li class="nav-item dropdown">
                <div class="btn-group">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-display="static" href="#">
                        <i class="fa fa-smile-o" style="color: #F90"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right tlg">
                        <a class="dropdown-item"><i class="fa fa-user"></i> 13811974106</a>
                        <a class="dropdown-item" href="php/logout.php"><i class="fa fa-sign-out"></i> 退出</a>
                    </div>
                </div>
            </li>-->
        </ul>
    </nav>
    <div id="search_bg" class="container so">
        <h2>Overall Simple Practical</h2>
        <div id="button_bg">
            <div class="searchChoice" id="themess">
                <div class="sChoiceBtn bgss1" id="contentss" title="切换搜索引擎"></div>
                <div class="scBigBox " style="overflow: hidden;">
                    <div style="height: 100%;overflow: auto;">
                        @foreach ($datas['searchElems'] as $pKey => $pData)
                        <div class="scSmallBox" data-bgssid="{{$pData['ssid']}}" @if ($pKey == 'baidu') id="haha" @endif>
                            <span class="scImg {{$pData['ssid']}}" /></span>
                            <span class="scName">{{$pData['name']}}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <form class="input-group" action="https://www.baidu.com/s" method="GET" id="searchCheck">
                <style type="text/css">.bdsug_copy{display:none}</style>
                <input type="hidden" name="type" value="2" autocomplete="off">
                <input class="form-control" type="text" value="" x-webkit-speech="" lang="zh-CN" placeholder="请输入搜索内容" baiduSug="1" name="wd" id="search" class="textb" autocomplete="off" autofocus="autofocus" />
                <input type="hidden" name="enc" value="UTF-8" />
                <div class="input-group-append">
                    <input class="btn btn-outline-secondary" type="submit" value="" id="searchBtn" title="搜索" /></div>
            </form>
        </div>
        <h6 class="tit">
            @foreach ($datas['homeFocus'] as $pData)
            <a href="{{$pData['url']}}" style="{{$pData['icon_color']}}">
                @if ($pData['icon']) <i class="fa fa-lightbulb-o"></i> @endif 
                {{$pData['name']}}
            </a>&nbsp;&nbsp;
            @endforeach
        </h6>
        <div class="mob-tj">
            @foreach ($datas['mobileDatas'] as $subData)
            <div class="row">
                @foreach ($subData as $pData)
                <div class="col">
                    <a href="{{$pData['url']}}">
                        <span><i class="fa {{$pData['icon']}}" style="{{$pData['icon_color']}}"></i></span>
                        <p>{{$pData['title']}}</p>
                    </a>
                </div>
                @endforeach 
            </div>
            @endforeach 
        </div>
    </div>
</div>
