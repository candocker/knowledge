@php
$classDatas = ['one', 'two', 'three', 'four', 'five', 'six'];
@endphp
<div class="container content" data-spy="scroll" data-target="#navs" data-offset="0">
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
        @foreach ($datas['recommendDatas'] as $pIndex => $pData)
        <div class="col send">
            <a class="{{$classDatas[$pIndex]}}" href="{{$pData['url']}}" target="_blank">{{$pData['name']}}</a>
        </div>
        @endforeach 
    </div>
    @foreach ($datas['sorts'] as $pIndex => $pData)
    <h5 class="tit fst" id="{{$pData['code']}}">
        <b><i class="fa {{$pData['icon']}}" style="{{$pData['icon_color']}}"></i> {{$pData['name']}}</b>
        <!--<span class="remark"><a href="" target="_blank"  style="color: #f60"><i class="fa fa-diamond"></i>115网盘会员</a></span>-->
        <!--<span class="remark"><a href="http://guozhivip.com" target="_blank"  style="color: #f60"><i class="fa fa-jpy"></i>代理推广收益</a></span>-->
        <span class="remark">{{$pData['description']}}</span>
    </h5>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
        @foreach ($pData['navDatas'] as $subIndex => $subData)
        <div class="col">
            <a href="{{$subData['url']}}" target="_blank">
                @if ($subData['logo_path']) <img src="{{$subData['logo_path']}}" class="ico"> @endif
                {{$subData['name']}}
            </a>
        </div>
        @endforeach 
    </div>
    @endforeach 
</div>
