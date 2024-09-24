@extends('layouts.main')
@section('dynamicMeta')@include('modules._meta', $datas['tdkData'])@endsection
@section('header')@include('navigation.common/_pagecss', ['view' => 'rank'])@endsection
@section('content')
<div class="top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/" title="全面，简约，优质实用的资源导航平台" target="_blank">
                        <i class="fa fa-paper-plane"></i> 导航
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/search" title="聚合搜索" target="_blank">
                        <i class="fa fa-search"></i> 搜索
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sub-tool" title="免费好用的在线工具大全" target="_blank">
                        <i class="fa fa-wrench"></i> 工具
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/coolsite" title="发现国内外优质实用的资源" target="_blank">
                        <i class="fa fa-eye"></i> 实验室
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sub-operation" title="运营、产品、设计资源导航" target="_blank">
                        <i class="fa fa-pencil-square"></i> 运营
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">自媒体</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($datas['categorys']['mediaCategorys'] as $pData)
                        <a class="dropdown-item" href="{{$pData['url']}}" target="_blank">{{$pData['name']}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">更多</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($datas['categorys']['categorys'] as $pData)
                        <a class="dropdown-item" href="{{$pData['url']}}" target="_blank">{{$pData['name']}}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="logo">
        <!--<img src="{{$commonAssetUrl}}/nav/img/90bc6-7690.png" title="掌握权威、热门、优质信息，高效生活！">-->
    </div>
    <div class="container so">
        <form class="input-group" action="https://www.baidu.com/s" target="_blank" method="get">
            <style type="text/css">.bdsug_copy{display:none}</style>
            <input name="ie" type="hidden" value="utf-8">
            <input type="text" class="form-control" id="inword" name="word" size="30" baiduSug="1" placeholder="随时百度一下" aria-describedby="button-addon4">
            <div class="input-group-append" id="button-addon4">
                <input class="btn btn-outline-secondary" type="submit" value="百度一下" />
                <!--<a href="http://guozhivip.com/so/"><input class="btn btn-outline-secondary soo" type="button" value="果汁搜索" /></a>-->
            </div>
        </form>
        <h6 class="hot">
            <!--<i class="fa fa-lightbulb-o" style="color: #f80"></i>&nbsp;-->
            <a href="https://www.douyin.com/" target="_blank">抖音</a>&nbsp;
            <a href="https://www.kuaishou.com/" target="_blank">快手</a>&nbsp;
            <a href="https://u.jd.com/3MUJlL9" style="color: #f60" target="_blank">京东双11</a>&nbsp;
            <a href="https://top.baidu.com/board?tab=realtime" target="_blank">今日新鲜事</a>&nbsp;
            <a href="https://s.click.taobao.com/DY43eeu" style="color: #f70" target="_blank">天猫双11</a>&nbsp;
            <a href="http://q.10jqka.com.cn/" target="_blank">股市行情</a>&nbsp;
            <a href="https://t.vip.com/BVBGjIBlt28" style="color: #f80" target="_blank">唯品会特卖</a>
        </h6>
    </div>
    <div class="container cd">
        <div class="row">
            <div class="col">
                <a href="http://guozhivip.com/rank/" style="color: #f80;">
                    <i class="fa fa-th-large"></i>全部</a>
            </div>
            <div class="col">
                <a href="rs.html">
                    <i class="fa fa-search" style="color: #bc763c"></i>热搜榜</a>
            </div>
            <div class="col">
                <a href="ry.html">
                    <i class="fa fa-commenting-o" style="color: #53727d"></i>热议榜</a>
            </div>
            <div class="col">
                <a href="ys.html">
                    <i class="fa fa-youtube-play" style="color: #0094c8"></i>影视榜</a>
            </div>
            <div class="col">
                <a href="yy.html">
                    <i class="fa fa-music" style="color: #bc763c"></i>音乐榜</a>
            </div>
            <div class="col">
                <a href="sy.html">
                    <i class="fa fa-camera" style="color: #53727d"></i>摄影榜</a>
            </div>
            <div class="col">
                <a href="sj.html">
                    <i class="fa fa-pencil" style="color: #0094c8"></i>设计榜</a>
            </div>
            <div class="col">
                <a href="cf.html">
                    <i class="fa fa-dollar" style="color: #b88884"></i>财富榜</a>
            </div>
            <div class="col">
                <a href="cp.html">
                    <i class="fa fa-cube" style="color: #bc763c"></i>产品榜</a>
            </div>
            <div class="col">
                <a href="yx.html">
                    <i class="fa fa-gamepad" style="color: #53727d"></i>游戏榜</a>
            </div>
            <div class="col">
                <a href="dsj.html">
                    <i class="fa fa-pie-chart" style="color: #0094c8"></i>大数据</a>
            </div>
            <div class="col lastrow">
                <a href="qt.html">
                    <i class="fa fa-paper-plane-o" style="color: #bc763c"></i>其他榜</a>
            </div>
        </div>
    </div>
</div>
<div class="container content">
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
        <div class="col pc">
            <a href="https://weibo.com/newlogin?tabtype=search&url=" target="_blank">微博热搜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/fa5b6-5695.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://top.baidu.com/board" target="_blank" class="b">百度风云榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/0e997-2445.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://top.sogou.com/" target="_blank" class="c">搜狗热搜榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/e4d82-9846.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://trends.so.com/hot" target="_blank" class="d">360实时热点
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/9b5b4-7087.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://weixin.sogou.com/" target="_blank" class="e">微信热门
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/7e444-4330.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://weibo.com/newlogin?tabtype=topic&url=" target="_blank" class="f">微博话题榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/fa5b6-5695.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.weibo.cn/p/106003type=25&t=3&disable_hot=1&filter_type=realtimehot" target="_blank">微博热搜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/fa5b6-5695.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://top.baidu.com/board?tab=realtime" target="_blank" class="b">百度热搜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/0e997-2445.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://ib.snssdk.com/rogue/aladdin_landingpage/template/aladdin_landingpage/hot_words.html?isBrowser=true&traffic_source=" target="_blank" class="f">头条热点
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/07648-7782.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.sogou.com/web/searchList.jsp?keyword=%E4%BB%8A%E6%97%A5%E7%83%AD%E7%82%B9" target="_blank" class="c">搜狗热搜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/e4d82-9846.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.so.com/s?q=%E4%BB%8A%E6%97%A5%E7%83%AD%E7%82%B9" target="_blank" class="d">360热搜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/9b5b4-7087.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://weixin.sogou.com/" target="_blank" class="e">微信热门
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/7e444-4330.png"></div></a>
        </div>
        <div class="col">
            <a href="https://www.zhihu.com/billboard" target="_blank" class="g">知乎热榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/48ea2-1355.png"></div></a>
        </div>
        <div class="col pc">
            <a href="http://c.tieba.baidu.com/hottopic/browse/topicList?res_type=1" target="_blank" class="h">贴吧热议榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/fd2ab-9987.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://dig.chouti.com/zone/news" target="_blank" class="j">抽屉新热榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/6e75c-9496.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.chouti.com/all/hot" target="_blank" class="j">抽屉新热榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/6e75c-9496.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.douban.com/group/explore" target="_blank" class="k">豆瓣热门讨论
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/8294d-8792.png"></div></a>
        </div>
        <div class="col">
            <a href="https://user.guancha.cn/main/index?click=24-hot-list" target="_blank" class="n">观察者热评
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/0b072-3957.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://bbs.hupu.com/" target="_blank" class="m">虎扑社区热帖
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/a7c39-7973.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.hupu.com/bbs/34-1?postdate=0" target="_blank" class="m">虎扑热帖
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/a7c39-7973.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://new.qq.com/ch/topic/" target="_blank" class="p">腾讯话题榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/bca86-6447.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://3g.163.com/touch/cm/news/hot/newsList" target="_blank" class="p">网易新闻榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/e53fe-6328.png"></div></a>
        </div>
        <div class="col">
            <a href="https://www.chinaz.com/hotnode/" target="_blank" class="q">站长之家热点
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/69047-8232.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://www.pearvideo.com/popular" target="_blank" class="m">梨视频热门资讯
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/266e2-8918.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.acfun.cn/v/list63/index.htm" target="_blank" class="g">A站话题热议
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/242c8-2073.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.bilibili.com/read/ranking#type=3" target="_blank" class="h">B站专栏排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/51dd4-7127.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://post.smzdm.com/hot_1/" target="_blank" class="j">今日文章头条
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/6c62b-6029.png"></div></a>
        </div>
        <div class="col">
            <a href="https://www.zhihu.com/topic/19776749/top-answers" target="_blank" class="k">知乎话题榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/48ea2-1355.png"></div></a>
        </div>
        <div class="col">
            <a href="https://xueqiu.com/" target="_blank" class="p">雪球财经热议
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/29d36-9360.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.cnbeta.com/top10.htm" target="_blank" class="n">cnBeta TOP10
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/fce8b-6027.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.cnbeta.com/top" target="_blank" class="n">cnBeta TOP10
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/fce8b-6027.png"></div></a>
        </div>
        <div class="col">
            <a href="https://www.tmtpost.com/hot" target="_blank" class="m">钛媒体热文
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/ad8eb-5634.ico"></div></a>
        </div>
        <div class="col pc">
            <a href="https://36kr.com/hot-list/catalog" target="_blank" class="g">36Kr资讯热榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/a46e5-4518.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://36kr.com/newsflashes" target="_blank" class="g">36Kr快讯
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/a46e5-4518.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.huxiu.com/article/" target="_blank" class="q">虎嗅热文推荐
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/0c991-7097.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.huxiu.com/channel/107.html" target="_blank" class="q">虎嗅热点
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/0c991-7097.png"></div></a>
        </div>
        <div class="col">
            <a href="https://www.hurun.net/zh-CN/Rank/HsRankDetails?num=QWDD234E" target="_blank" class="r">胡润百富榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/2faea-5730.jpg"></div></a>
        </div>
        <div class="col">
            <a href="http://www.fortunechina.com/rankings/index.htm" target="_blank" class="s">财富榜单
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/e8565-9358.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://www.forbeschina.com/lists" target="_blank" class="t">福布斯榜单
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/a1c2c-8299.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://v.qq.com/biu/ranks/?t=hotsearch" target="_blank" class="u">全网影视排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/085f8-3401.png"></div></a>
        </div>
        <div class="col">
            <a href="https://www.iqiyi.com/ranks/hotplay" target="_blank" class="v">爱奇艺风云榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/a83c3-3675.png"></div></a>
        </div>
        <div class="col">
            <a href="https://acz.youku.com/wow/ykpage/act/top_hot" target="_blank" class="w">优酷热搜榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/17790-8399.png"></div></a>
        </div>
        <div class="col">
            <a href="https://tv.sohu.com/hothdtv/" target="_blank" class="x">搜狐视频榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/71faf-4242.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://piaofang.maoyan.com/dashboard" target="_blank" class="y">电影票房榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/63670-8551.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://piaofang.maoyan.com/box-office?ver=normal" target="_blank" class="y">电影票房榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/63670-8551.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://movie.douban.com/chart" target="_blank" class="z">豆瓣电影榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/8294d-8792.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.douban.com/movie/" target="_blank" class="z">豆瓣电影榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/8294d-8792.png"></div></a>
        </div>
        <div class="col">
            <a href="https://www.imdb.com/chart/top" target="_blank" class="l">IMDb Top 250
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/b8b09-8533.png"></div></a>
        </div>
        <div class="col">
            <a href="https://maoyan.com/board" target="_blank" class="u">热映口碑榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/63670-8551.png"></div></a>
        </div>
        <div class="col">
            <a href="http://list.mtime.com/listIndex" target="_blank" class="v">时光电影热门
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/dc8b6-8965.jpg"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.kuaishou.com/brilliant" target="_blank" class="y">快手短视频热榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/2e636-3419.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.ixigua.com/" target="_blank" class="y">西瓜热门视频
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/cce7e-5365.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.bilibili.com/v/popular/rank/all" target="_blank" class="w">B站热门视频
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/51dd4-7127.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.bilibili.com/ranking" target="_blank" class="w">B站热门视频
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/51dd4-7127.png"></div></a>
        </div>
        <div class="col">
            <a href="https://www.acfun.cn/rank/list/#cid=-1;range=1" target="_blank" class="x">A站排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/242c8-2073.png"></div></a>
        </div>
        <div class="col">
            <a href="https://movie.douban.com/tv/#!type=tv&tag=%E7%83%AD%E9%97%A8&sort=recommend&page_limit=20&page_start=0" target="_blank" class="y">热门电视剧
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/8294d-8792.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.vmovier.com/hot#rotate-nav" target="_blank" class="z">热门短视频
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/6336b-9864.jpg"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://tuchong.com/video/" target="_blank" class="z">热门短视频
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/6336b-9864.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://y.qq.com/n/yqq/toplist/4.html" target="_blank">QQ音乐流行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/5f3a1-1284.png"></div></a>
        </div>
        <div class="col">
            <a href="https://music.163.com/#/discover/toplist" target="_blank" class="b">云音乐飙升榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/df3b8-2002.png"></div></a>
        </div>
        <div class="col">
            <a href="https://www.kugou.com/yy/rank/home/1-8888.html?from=rank" target="_blank" class="d">酷狗TOP500
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/9ad2c-7388.png"></div></a>
        </div>
        <div class="col pc">
            <a href="http://music.migu.cn/v3/music/top/jianjiao_newsong" target="_blank" class="e">咪咕新歌榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/4fbfc-9484.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.music.migu.cn/v3/music/top" target="_blank" class="d">咪咕音乐榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/4fbfc-9484.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.kuwo.cn/rankList" target="_blank" class="d">酷我飙升榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/7583c-3913.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://www.kuwo.cn/rankList" target="_blank" class="e">酷我飙升榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/7583c-3913.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://music.douban.com/chart" target="_blank" class="c">豆瓣音乐榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/8294d-8792.png"></div></a>
        </div>
        <div class="col pc">
            <a href="http://www.poco.cn/works/works_list?classify_type=0&works_type=week" target="_blank" class="g">POCO人气摄影
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/f91fe-6024.ico"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://wap.poco.cn/works/works_list" target="_blank" class="g">POCO人气摄影
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/f91fe-6024.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://she.xitek.com/visual/" target="_blank" class="h">她视觉影像
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/12d58-2148.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://500px.com.cn/community/discover?t=rating" target="_blank" class="j">热门摄影作品
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/1ef20-3971.png"></div></a>
        </div>
        <div class="col">
            <a href="http://www.cnu.cc/discoveryPage/hot-0" target="_blank" class="n">CNU原创摄影榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/f7e70-7509.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://tuchong.com/explore/" target="_blank" class="k">图虫摄影榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/85b87-4421.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://unsplash.com/" target="_blank" class="m">Unsplash
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/c028c-4029.png"></div></a>
        </div>
        <div class="col">
            <a href="https://photo.fengniao.com/" target="_blank" class="m">蜂鸟摄影榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/92001-9217.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://bbs.vivo.com.cn/vpai.php" target="_blank" class="p">vivo热门摄影
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/be088-5581.png"></div></a>
        </div>
        <div class="col">
            <a href="https://tu.fengniao.com/" target="_blank" class="q">热门人像摄影
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/92001-9217.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://photos.oneplus.com/cn#/" target="_blank" class="g">一加摄影榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/5c1de-3148.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://h.bilibili.com/p" target="_blank" class="h">B站摄影榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/51dd4-7127.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://h.bilibili.com/ywh/h5/home#/draw" target="_blank" class="h">B站画友榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/51dd4-7127.png"></div></a>
        </div>
        <div class="col">
            <a href="https://bcy.net/illust/toppost100" target="_blank" class="j">半次元绘画榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/5d69c-9953.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://www.zcool.com.cn/discover?cate=33&subCate=0&page=1" target="_blank" class="k">站酷摄影精选
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/54f84-2096.png"></div></a>
        </div>
        <div class="col">
            <a href="https://huaban.com/discovery/photography/" target="_blank" class="m">花瓣摄影榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/a7aa6-6184.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://www.zcool.com.cn/top/index.do" target="_blank" class="r">站酷榜单
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/54f84-2096.png"></div></a>
        </div>
        <div class="col">
            <a href="https://top10.ui.cn/" target="_blank" class="s">UI中国TOP10
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/411d1-6700.png"></div></a>
        </div>
        <div class="col">
            <a href="https://www.ycyui.com/ulist.html" target="_blank" class="t">创意设计榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/a1d06-3081.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://www.ycyui.com/cool.html" target="_blank" class="r">前沿网页设计
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/a1d06-3081.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://www.zhisheji.com/paihang/zan/" target="_blank" class="s">致设计榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/96c07-3286.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://www.ycyui.com/works.html" target="_blank" class="t">创意设计
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/a1d06-3081.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://gracg.com/works?type=hot" target="_blank" class="s">热门创意插画
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/485d2-3446.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://uiiiuiii.com/inspiration" target="_blank" class="r">优设灵感
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/1f517-3587.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://union-click.jd.com/jdc?e=&p=AyIGZRprFDJWWA1FBCVbV0IUWVALHFdZFAQAQB1AWQkrG2dhegQxXV9wRXBcU0QidnRnfxxsDRkOIgJUGloXBhEOXRxrFgMTDlETXBEEEDdlG1olSXwGZRlaFAEbB1wYXxYyEgNdE10UBRUBXBpaFjIVB1wrjLqvxIT2zPS41ZK3VBlrJTIRN2UrWiUCIlgRRgYlABMGURI%3D" target="_blank" class="u">京东排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/fef2c-7755.png"></div></a>
        </div>
        <div class="col">
            <a href="https://product.pconline.com.cn/hot/" target="_blank" class="v">热门IT产品榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/0584d-8621.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://phat.jd.com/10-124.html" target="_blank" class="w">京东新机首发
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/fef2c-7755.png"></div></a>
        </div>
        <div class="col">
            <a href="http://top.zol.com.cn/" target="_blank" class="x">ZOL产品指数
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/136ff-4724.jpg"></div></a>
        </div>
        <div class="col">
            <a href="http://top.zol.com.cn/compositor/cell_phone.html" target="_blank" class="y">手机排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/136ff-4724.jpg"></div></a>
        </div>
        <div class="col">
            <a href="http://tb.g2h3.com/3A6XV" target="_blank" class="z">图书畅销榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/82418-5811.png"></div></a>
        </div>
        <div class="col">
            <a href="http://top.17173.com/" target="_blank">游戏排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/bc348-3019.ico"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.ali213.net/paihb.html" target="_blank" class="b">单机游戏排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/d8254-6881.ico"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://3g.ali213.net/paihb.html" target="_blank" class="b">单机游戏排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/d8254-6881.ico"></div></a>
        </div>
        <div class="col pc">
            <a href="http://top.sina.com.cn/" target="_blank" class="c">新浪游戏榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/3c790-5900.jpg"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://www.taptap.com/top/ios/played" target="_blank" class="c">IOS游戏榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/c7857-2198.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://www.taptap.com/top/played" target="_blank" class="d">Android游戏榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/c7857-2198.ico"></div></a>
        </div>
        <div class="col">
            <a href="http://www.4399.com/flash/ph.htm" target="_blank" class="e">小游戏排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/db10f-3002.ico"></div></a>
        </div>
        <div class="col">
            <a href="http://www.toubang.tv/anchor/mutile.html" target="_blank" class="f">主播排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/53b01-7887.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://wanplus.com/ranking" target="_blank" class="c">战队排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/9cfe4-3099.jpg"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.qidian.com/rank" target="_blank" class="g">热门小说榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/c48d8-4280.ico"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.qidian.com/rank/male" target="_blank" class="g">热门小说榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/c48d8-4280.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://weread.qq.com/web/category/all" target="_blank" class="h">微信读书榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/54a45-6554.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.kuaikanmanhua.com/ranking/" target="_blank" class="j">快看漫画榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/53a1e-1001.ico"></div></a>
        </div>
        <div class="col mobs">
            <a href="http://m.kuaikanmanhua.com/mob/rank" target="_blank" class="j">快看漫画榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/53a1e-1001.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://www.dm5.com/manhua-rank/" target="_blank" class="k">漫画排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/468f7-1186.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://manga.bilibili.com/ranking/ninnki" target="_blank" class="m">哔哩漫画榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/d07e8-4868.jpg"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.ximalaya.com/top/" target="_blank" class="n">热门电台榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/768e0-5858.png"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.ximalaya.com/top/free/all" target="_blank" class="n">热门电台榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/768e0-5858.png"></div></a>
        </div>
        <div class="col">
            <a href="https://www.iimedia.cn/c880" target="_blank" class="r">艾媒金榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/22432-2611.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://index.baidu.com/v2/rank/index.html?#/industryrank" target="_blank" class="s">百度行业指数
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/0e997-2445.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.newrank.cn/public/info/list.html?period=bilibili_day&type=data" target="_blank" class="t">B站UP主排名
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/51dd4-7127.png"></div></a>
        </div>
        <div class="col">
            <a href="https://appgallery1.huawei.com/#/Top" target="_blank" class="s">安卓应用榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/ee985-1191.png"></div></a>
        </div>
        <div class="col">
            <a href="http://www.aldzs.com/toplist" target="_blank" class="r">小程序排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/91e9a-3057.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://top.chinaz.com/" target="_blank" class="s">网站排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/69047-8232.ico"></div></a>
        </div>
        <div class="col pc">
            <a href="https://creator.douyin.com/" target="_blank" class="t">抖音排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/d7552-6295.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.newrank.cn/public/info/list.html?period=kuaishou_day&type=data" target="_blank" class="r">快手排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/2e636-3419.png"></div></a>
        </div>
        <div class="col">
            <a href="https://www.newrank.cn/public/info/list.html?period=day&type=data" target="_blank" class="s">自媒体排名
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/cd015-9255.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://index.iresearch.com.cn/new/#/" target="_blank" class="r">艾瑞指数榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/e0908-9202.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://mi.talkingdata.com/app-rank.html" target="_blank" class="t">移动APP指数
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/2af62-2303.jpg"></div></a>
        </div>
        <div class="col pc">
            <a href="http://zhishu.58.com/zhaopin/" target="_blank" class="r">58招聘指数
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/b60d7-1801.png"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.autohome.com.cn/newbrand/" target="_blank" class="n">上市新车榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/f7763-6175.ico"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://car.m.autohome.com.cn/carseriesrank/list/?typeid=1" target="_blank" class="n">汽车销量榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/f7763-6175.ico"></div></a>
        </div>
        <div class="col pc">
            <a href="https://price.pcauto.com.cn/top/r45/" target="_blank" class="m">汽车排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/ef709-3586.ico"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.pcauto.com.cn/auto/top/sales.html" target="_blank" class="m">汽车排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/ef709-3586.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://auto.sina.com.cn/zhishu/" target="_blank" class="k">新浪汽车指数
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/b9788-8297.jpg"></div></a>
        </div>
        <div class="col pc">
            <a href="https://www.dongchedi.com/sales" target="_blank" class="n">懂车帝排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/e670a-6547.jpg"></div></a>
        </div>
        <div class="col mobs">
            <a href="https://m.dcdapp.com/motor/m/car_series/rank" target="_blank" class="n">懂车帝排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/e670a-6547.jpg"></div></a>
        </div>
        <div class="col">
            <a href="http://www.pc6.com/rank/" target="_blank" class="u">软件下载排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/018fa-3435.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://www.onlinedown.net/hits/" target="_blank" class="w">热门软件下载榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/9736f-5352.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://juejin.cn/?sort=three_days_hottest" target="_blank" class="v">掘金热门
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/30915-3237.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://github.com/trending" target="_blank" class="x">Github热门
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/1c99b-4924.png"></div></a>
        </div>
        <div class="col">
            <a href="https://top.chinaz.com/gongsi/" target="_blank" class="y">公司排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/69047-8232.ico"></div></a>
        </div>
        <div class="col">
            <a href="https://www.dxsbb.com/news/list_75.html" target="_blank" class="z">中国大学排名
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/1f37b-5925.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://www.dxsbb.com/news/list_142.html" target="_blank" class="v">世界大学排名
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/1f37b-5925.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://www.shanghairanking.cn/" target="_blank" class="l">大学及学科排名
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/0de42-4071.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://report.amap.com/index.do" target="_blank" class="u">城市拥堵榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/98fa0-1469.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://www.iyiou.com/company" target="_blank" class="w">亿欧企业排名
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/0efc3-3873.ico"></div></a>
        </div>
        <div class="col">
            <a href="http://www.xiachufang.com/explore/" target="_blank" class="c">美食菜谱榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/bca53-5964.png"></div></a>
        </div>
        <div class="col">
            <a href="http://eye.kuyun.com/" target="_blank" class="b">电视直播关注榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/28be2-4395.jpg"></div></a>
        </div>
        <div class="col">
            <a href="http://www.tvtv.hk/" target="_blank" class="c">收视率排行榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/4d0bc-1345.jpg"></div></a>
        </div>
        <div class="col">
            <a href="https://sugs.suning.com/outstation.htm?p=BFYHRwtcVQlCR0M4eXgyXBQbAhFRTno7ZnlcDnNnISNbSVINYzkoIhwXEBAfExASZRNaIhQISRQ8V1UPUFoKGFVSGEJPCEoKWEtSLjo7aUtdCwgSChFhKiAhAAEmfScpDFwaDS5md30JFBgUGQcZHngXFH4UR0NZdFxRQUVP" target="_blank" class="d">苏宁疯抢榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/13a06-2575.png"></div></a>
        </div>
        <div class="col">
            <a href="https://youhui.pinduoduo.com/?pid=10266509_138219114&fromCustomerMall=1&cpsSign=CM_200422_10266509_138219114_d1c60b4aa1275027e3063ea1f3c6011f&duoduo_type=2" target="_blank" class="e">拼多多热销榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/c9f9c-8663.png"></div></a>
        </div>
        <div class="col">
            <a href="https://union-click.jd.com/jdc?e=&p=AyIGZRprFDJWWA1FBCVbV0IUWVALHE5fBUUZTFINXAAECUteIkFVZwlPZ1JhNkklT0ATejNPA09icVFZF2sQAxMGVx9YHAoVN1YaWhwGGgBRHVklMhIGZVA1FDIQBlQYUhULEQNWK1sRChoBVBxSEwYRAVErXBULItD6to2WocWo%2BMzbpQMQN2UrWCUyIgZlG2tKRk9aZRlaFAYb" target="_blank" class="f">京东秒杀榜
                <div class="slogo">
                    <img src="{{$commonAssetUrl}}/nav/img/fef2c-7755.png"></div></a>
        </div>
    </div>
</div>
@include('navigation.common._footer-simple', ['data' => ''])
<!--<a href="https://docs.qq.com/doc/DQVR6YkJsUXlEcmhy" class="tz bts" title="果汁排行榜改版啦！点击看详情哦" target="_blank">公告</a>-->
<a href="javascript:;" id="btn" class="yq bts" title="返回顶部">
    <i class="fa fa-chevron-up"></i>
</a>
<a href="http://guozhivip.com/tc/" class="cot bts" title="吐个槽" target="_blank">
    <i class="fa fa-commenting-o"></i>
</a>
<a href="javascript:;" class="saoyisao bts" title="微信扫一扫">
    <i class="fa fa-qrcode"></i>
</a>
<div class="erweima">
    <img src="{{$commonAssetUrl}}/nav/img/b50cf-8503.jpg" alt="果汁官方公众号" />
    <p>果汁官方公众号</p>
</div>
<script type='text/javascript' src='{{$commonAssetUrl}}/nav/js/18/jquery-1.11.1.min.js'></script>
<script type='text/javascript' src='{{$commonAssetUrl}}/nav/js/68/popper.min.js'></script>
<script type='text/javascript' src='{{$commonAssetUrl}}/nav/js/36/bootstrap.min.js'></script>
<script type="text/javascript" src="{{$commonAssetUrl}}/nav/js/74/back.js"></script>
<script type="text/javascript" src="{{$commonAssetUrl}}/nav/js/69/jquery.anchorscroll.min.js"></script>
<script charset="gbk" src="{{$commonAssetUrl}}/nav/js/opensug.js"></script>
<script>$(function() {
        $(".saoyisao").mouseover(function() {
            $(".erweima").show("fast");
        });
        $(".saoyisao").mouseleave(function() {
            $(".erweima").hide("slow");
        });
    });</script>
<!--pb-->
<script>document.oncontextmenu = function(event) {
        if (window.event) {
            event = window.event;
        }
        try {
            var the = event.srcElement;
            if (! ((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) {
                return false;
            }
            return true;
        } catch(e) {
            return false;
        }
    }</script>
<script type="text/javascript">if (self == top) {
        var theBody = document.getElementsByTagName('body')[0];
        theBody.style.display = "block";
    } else {
        top.location = self.location;
    }</script>
@endsection
