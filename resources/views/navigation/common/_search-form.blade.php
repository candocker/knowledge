@php
$sorts = [
    'tool' => '免费好用的在线工具大全',
    'tvfilm' => '<span style="color: #f90;">免费影视专栏</span>',
    'shop' => '官网便宜购，发现特价好物',
    'picture' => '<span style="color: #fff;">免费图片专栏</span>',
    'design' => '精选优质设计资源大全',
    'cartoon' => '漫画专栏',
    'game' => '游戏专栏',
    'news' => '新闻专栏',
    'study' => '教育资源专栏',
    'readnav' => '小说·电子书·文库',
    'operation' => 'Make work more efficient',
];
$currentTitle = $sorts[$currentSort] ?? $sortName;
$actions = [
    'cartoon' => 'https://m.u17.com/wap/Search/Search',
    'readnav' => 'https://m.zhangyue.com/search',
    'shop' => 'https://search.jd.com/Search?enc=utf-8&keyword=',
];
$currentAction = $actions[$currentSort] ?? 'https://www.baidu.com/s';
$inputIds = ['shop' => 'search'];
$currentInputId = $inputIds[$currentSort] ?? 'inword';
$inputInputNames = [
    'cartoon' => 'q', 
    'game' => 'wd', 
    'news' => 'wd',
    'study' => 'wd',
    'readnav' => 'keyWord',
    'shop' => 'search',
];
$currentInputName = $inputNames[$currentSort] ?? 'word';
$placeholders = [
    'cartoon' => '请输入搜索关键字',
    'shop' => '京东搜索一下',
    'readnav' => '请输入书名/作者名',
];
$currentPlaceholder = $placeholders[$currentSort] ?? '随时百度一下';
$inputValues = [
    'cartoon' => '漫画搜索',
    'readnav' => '掌阅搜索',
    'shop' => '京东搜索',
];
$currentInputValue = $inputValues[$currentSort] ?? '百度一下';
@endphp
<h2>{!!$currentTitle!!}</h2>
<form class="input-group" action="{{$currentAction}}" target="_blank" method="get">
    <style type="text/css">.bdsug_copy{display:none}</style>
    <input name="ie" type="hidden" value="utf-8">
    <input type="text" class="form-control" id="{{$currentInputId}}" name="{{$currentInputName}}" size="30" baiduSug="1" placeholder="{{$currentPlaceholder}}" aria-describedby="button-addon4">
    <div class="input-group-append" id="button-addon4">
        <input class="btn btn-outline-secondary" type="submit" value="{{$currentInputValue}}" />
        <!--<a href="/so/"><input class="btn btn-outline-secondary soo" type="button" value="聚合搜索" /></a>-->
    </div>
</form>
