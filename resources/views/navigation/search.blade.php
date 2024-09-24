@php
$buttons = ['success', 'warning', 'default', 'danger', 'info'];
@endphp
@extends('layouts.main')
@section('dynamicMeta')@include('modules._meta', $datas['tdkData'])@endsection
@section('header')@include('navigation.common/_pagecss', ['view' => 'search'])@endsection
@section('content')
<div class="mob">
    <div class="mobbc" style="height: 130px;">
        <!--<img src="{{$commonAssetUrl}}/nav/img/cd01a-1683.png" class="logo" alt="logo" />-->
    </div>
    <div class="search">
        <form action="https://www.baidu.com/s" target="_blank" class="search" method="get">
            <style type="text/css">.bdsug_copy{display:none}</style>
            <input name="ie" type="hidden" value="utf-8">
            <ul>
                <li class="words">
                    <input type="text" class="inputwords" id="inword" name="word" size="30" baiduSug="1" placeholder="随时百度一下">
                </li>
                <li class="go">
                    <input type="submit" class="gosearch" value="搜索" onMouseOver="this.style.opacity='1'" onMouseOut="this.style.opacity='0.9'">
                </li>
            </ul>
        </form>
    </div>
    <div class="container tj">
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
    <div class="cmd">
        <ul>
            @foreach ($datas['searchHots'] as $pKey => $pData)
            <li class="{{$pData['class_style']}}"><a href="{{$pData['url']}}">{{$pData['name']}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tu"></div>
</div>
<ul class="tq">
    <li>
        <a href="https://qq.ip138.com/day/" target="_blank" title="点击查看日历">
            <script>var weekDayLabels = new Array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六");
                var now = new Date();
                var year = now.getFullYear();
                var month = now.getMonth() + 1;
                var day = now.getDate(); var currentime = '<span class="special">' + year + '年' + month + '月' + day + '日 ' + weekDayLabels[now.getDay()] + '</span><br>';document.write(currentime)</script></a>
    </li>
    <li class="tqq">
        <iframe allowtransparency="true" frameborder="0" width="180" height="32" scrolling="no" src="//tianqi.2345.com/plugin/widget/index.htm?s=3&z=2&t=0&v=0&d=3&bd=0&k=&f=&ltf=009944&htf=cc0000&q=1&e=1&a=1&c=54511&w=180&h=32&align=center"></iframe>
    </li>
    <!--<li><a href="https://union.115.com/?ac=space_seal_list&share_code=059df4d38630b2da8d1ac52078739aa3" target="_blank" style="color: #f60"><i class="fa fa-diamond"></i>115网盘会员</a></li>-->
</ul>
<div class="top"></div>
<div class="logos">
    <img src="{{$commonAssetUrl}}/common/images/search.png" title="输入关键词，点击搜索框下方按钮/回车即可搜索">
</div>
<div class="jumbotron">
    <div class="container">
        <form action="https://www.baidu.com/s" method="get" target="_blank">
            <div class="input-group">
                <style type="text/css">.bdsug_copy{display:none}</style>
                <input name="ie" type="hidden" value="utf-8" id="ipt1">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <b>聚合搜索</b>
                    </span>
                </div>
                <input type="text" class="form-control" name="search" id="search" placeholder="回车默认百度，点击下方按钮可切换搜索" baiduSug="0" value="" autofocus="autofocus" onmouseover="focus()" />
            </div>
            <P style="margin-top: -8px;">
                <center>
                    @foreach ($datas['searchElems'] as $pKey => $pData)
                    <input type="submit" value="{{$pData['name']}}" id="{{$pKey}}" button type="button" class="btn btn-@php echo $buttons[rand(0, 4)]; @endphp" onClick="clickElem(this.id);"/>
                    @endforeach
                </center>
            </P>
        </form>
    </div>
</div>
<div class="container t-link">
    <div class="row row-cols-3 row-cols-sm-4 row-cols-md-6 row-cols-lg-6">
        @foreach ($datas['pcDatas'] as $pData)
        <div class="col">
            <a href="{{$pData['url']}}" target="_blank">
                @if ($pData['logo_path']) <img src="{{$commonAssetUrl}}/{{$pData['logo_path']}}" class="ico"> @endif
                {{$pData['name']}}
            </a>
        </div>
        @endforeach 
    </div>
</div>
<a href="https://support.qq.com/products/27320/faqs/49713" class="tc jq" target="_blank" title="小技巧" style="bottom: 230px;">
    <i class="fa fa-lightbulb-o"></i>
</a>
<!--<a href="https://union.115.com/?ac=space_seal_list&share_code=059df4d38630b2da8d1ac52078739aa3" class="tc wp" target="_blank" title="115网盘会员"><i class="fa fa-diamond"></i></a>-->
<a href="http://guozhivip.com/tc/" class="tc" target="_blank" title="联系/吐槽/捐助" style="bottom: 180px;">
    <i class="fa fa-commenting-o"></i>
</a>
@include('navigation.common._footer-simple', ['data' => ''])
<script type='text/javascript' src="{{$commonAssetUrl}}/nav/js/jquery-3.1.0.min.js"></script>
<!--<script type='text/javascript' src='{{$commonAssetUrl}}/nav/js/80/bootstrap.min.js'></script>-->
<script type='text/javascript' src="{{$commonAssetUrl}}/nav/js/jquery-migrate-3.0.0.min.js"></script>
<script type='text/javascript' charset="gbk" src="{{$commonAssetUrl}}/nav/js/opensug.js"></script>
<script>
document.getElementById("search").focus();
var txtObj = document.getElementById("alertSpan");
//回调函数，用于获取用户当前选择的文字
function show(str) {
    txtObj.innerHTML = str;
}
var params = {
    "XOffset": 0,
    //提示框位置横向偏移量,单位px
    "YOffset": 0,
    //提示框位置纵向偏移量,单位px
    "fontColor": "#555",
    //提示框文字颜色
    "fontColorHI": "#f70",
    //提示框高亮选择时文字颜色
    "fontSize": "15px",
    //文字大小
    "fontFamily": "微软雅黑",
    //文字字体
    "borderColor": "#d8d8d8",
    //提示框的边框颜色
    "bgcolorHI": "#f5f5f5",
    //提示框高亮选择的颜色
    "sugSubmit": false //在选择提示词条是是否提交表单 
};
BaiduSuggestion.bind("ipt1", params, show);
</script>
<script>
var sAddress = document.getElementsByTagName("form")[1];
var sInfor = document.getElementById("search");
var sElems = @php echo json_encode($datas['searchElems']) @endphp ;

function clickElem(value) {
    console.log(sElems, 'iiiiiiii');
    var cElem = sElems[value];
    var query = $('#search').val();
    if (cElem.withOpen) {
        window.open(cElem.url + query, "_blank");
        return false;
    }
    sAddress.action = cElem.url;
    sInfor.name = cElem.formName;
}
</script>

@include('navigation.common._footer-js', ['view' => 'search'])
@endsection
