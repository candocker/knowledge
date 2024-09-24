@extends('layouts.main')
@section('dynamicMeta')@include('modules._meta', $datas['tdkData'])@endsection
@section('header')@include('navigation.common/_pagecss', ['view' => 'home'])@endsection
@section('content')
{{--@include('navigation.modules._home-signupin', ['data' => ''])--}}
{{--@include('navigation.modules._home-addsite', ['data' => ''])--}}
@include('navigation.modules._home-header', ['data' => ''])
@include('navigation.modules._home-recommend', ['datas' => $datas['recommendDatas']])
<div class="container content" data-spy="scroll" data-target="#list-example" data-offset="0">
    {{--@include('navigation.modules._home-toolbar', ['data' => ''])--}}
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3">
        @foreach ($datas['categorys'] as $pIndex => $pElems)
        @foreach ($pElems as $pElem)
        @foreach ($pElem as $pData)
        @if (!in_array($pData['code'], ['rank', 'search']))
        <div class="col subs">
            <h5 class="tit">
                <i class="fa {{$pData['icon']}}" style="color: #7CCD7C;"></i> {{$pData['name']}}
                @if (isset($pData['focusDatas']))
                @foreach ($pData['focusDatas'] as $focusData)
                <a href="{{$focusData['url']}}" class="yule tg" target="_blank" style="margin-left: 13px">{{$focusData['title']}}</a>
                @endforeach
                @endif
                <!--<a href="https://m.bilibili.com/ranking" class="rd"><img src="{{$commonAssetUrl}}/nav/img/93824-4007.png" class="simg">热门视频</a>
                <a href="https://www.kuaishou.com/" class="yule tg" target="_blank" style="margin-left: 12px">快手</a>-->
                <a href="{{$pData['url']}}" style="color: #999; margin-left: 140px;" title="{{$pData['name']}}">更多>> </a>
            </h5>
            <div class="row row-cols-3 row-cols-sm-3 row-cols-md-3 row-cols-lg-3">
                @foreach ($pData['websites'] as $subIndex => $subData)
                @if ($subData['name'] == '邮箱')
                <div class="col yx">
                    <a href="https://mail.qq.com/" target="_blank" class="cy">
                        <img src="{{$subData['logo_path']}}" class="img">邮箱
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <div class="emlist">
                        <a href="https://mail.qq.com/" target="_blank">@qq.com</a>
                        <a href="https://mail.163.com/" target="_blank">@163.com</a>
                        <a href="https://www.126.com/" target="_blank">@126.com</a>
                        <a href="https://mail.sina.com.cn/" target="_blank">@sina.com</a>
                        <a href="https://mail.sohu.com/" target="_blank">@sohu.com</a>
                        <a href="https://mail.google.com/" target="_blank">@gmail.com</a>
                        <a href="https://outlook.live.com/owa/" target="_blank">@outlook.com</a>
                        <a href="https://mail.10086.cn/" target="_blank">@139.com</a>
                    </div>
                </div>
                @else
                <div class="col">
                    <a href="{{$subData['url']}}" target="_blank" class="cy">
                        @if ($subData['logo_path']) <img src="{{$subData['logo_path']}}" class="img"> @endif
                        {{$subData['name']}}
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        @endif
        @endforeach
        @endforeach
        @endforeach
    </div>
    @include('navigation.modules._home-footer-recommend', ['datas' => $datas])
</div>
@include('navigation.modules._home-footer-mobile', ['datas' => $datas['mobileBottom']])
@include('navigation.common._footer-simple', ['data' => ''])
{{--@include('navigation.modules._home-float', ['data' => ''])--}}
@include('navigation.modules._home-js', ['data' => ''])
@endsection
