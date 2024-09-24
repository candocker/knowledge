<div class="tn">
    <nav class="navbar navbar-light bg-light navbar-expand-lg">
        <a class="navbar-brand" href="http://guozhivip.com/lab/">
            <!--<img src="{{$commonAssetUrl}}/nav/img/b359b-8779.png" width="30" height="30" class="d-inline-block align-top" alt="发现优质、实用、有趣站点">-->特色站点
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">导航<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rank">热榜</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tool">工具</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">自媒体</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($datas['categorys']['mediaCategorys'] as $pData)
                        <a class="dropdown-item" href="{{$pData['url']}}">{{$pData['name']}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">更多</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($datas['categorys']['categorys'] as $pData)
                        <a class="dropdown-item" href="{{$pData['url']}}">{{$pData['name']}}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
        <form class="form-inline" action="https://www.baidu.com/s" method="get">
            <style type="text/css">.bdsug_copy{display:none}</style>
            <input name="ie" type="hidden" value="utf-8">
            <input class="form-control mr-sm-2" type="text" name="word" baiduSug="1" placeholder="搜你所想" aria-label="搜你所想">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">百度一下</button>
        </form>
    </nav>
</div>
