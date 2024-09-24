@extends('layouts.main')
@section('header')@include('navigation.common/_pagecss', ['view' => 'coolsite'])@endsection
@section('content')
@include('navigation.common._header-' . $datas['currentSort'], ['data' => ''])
@foreach ($datas['sorts'] as $pIndex => $pData)
<div class="container sub @if ($pIndex == 'ydys') first @endif">
    <div class="title">
        <i class="fa {{$pData['icon']}}"></i>&nbsp;{{$pData['name']}} &nbsp;
        <span class="djt" style="font-size: 14px;color: #f70">{{$pData['description']}}</span>
    </div>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
        <!--<div class="col">
        <a href="https://docs.qq.com/doc/DQVBCUHBjcktlR0xE" class="card-link" target="_blank">
        <div class="card-tit"><img src="{{$commonAssetUrl}}/nav/img/c1195-9273.png"><span class="name" style="color: #F70">重要公告</span></div>
        <div class="card-desc">赶快去看看</div></a>
        </div>-->
        @foreach ($pData['navDatas'] as $subIndex => $subData)
        <div class="col">
            <a href="{{$subData['url']}}" class="card-link" target="_blank">
                <div class="card-tit">
                    <img src="{{$subData['logo_path']}}">
                    <span class="name">{{$subData['name']}}</span>
                </div>
                <div class="card-desc">{{$subData['description']}}</div>
            </a>
        </div>
        @endforeach
        <!--<div class="col">
        <a href="https://www.boredpanda.com/" class="card-link" target="_blank">
        <div class="card-tit"><img src="{{$commonAssetUrl}}/nav/img/72fcb-9508.png"><span class="name">Boredpanda</span></div>
        <div class="card-desc">分享全球有趣的图片故事</div></a>
        </div>-->
    </div>
</div>
@endforeach
@include('navigation.common._footer-simple', ['data' => ''])
<a href="javascript:;" id="btn" title="返回顶部" class="bts tui">
    <i class="fa fa-chevron-up"></i>
</a>
<a href="https://wj.qq.com/s2/3881997/233a/" class="tui" target="_blank" title="推荐/提交自己的网站至果汁实验室">
    <i class="fa fa-plus"></i>
</a>
<!--本站严禁抄袭上线，抄袭可耻！-->
<script type='text/javascript' src='{{$commonAssetUrl}}/nav/js/65/jquery-1.11.1.min.js'></script>
<script type='text/javascript' src='{{$commonAssetUrl}}/nav/js/70/bootstrap.min.js'></script>
<script type='text/javascript' src='{{$commonAssetUrl}}/nav/js/74/back.js'></script>
<script charset="gbk" src="{{$commonAssetUrl}}/nav/js/opensug.js"></script>
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
