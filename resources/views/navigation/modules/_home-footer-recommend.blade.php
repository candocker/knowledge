<div class="tuijian" id="renyimen">
    <ui class="tj">
        @foreach ($datas['homeButtoms'] as $pKey => $pData)
        <li @if ($pKey === 0) class="first-one" @endif>
            <a href="{{$pData['url']}}" target="_blank">
                <i class="fa {{$pData['icon']}}" style="color: {{$pData['icon_color']}}"></i>  {{$pData['name']}}
            </a>
        </li>
        @endforeach 
    </ui>
</div>
<div class="random" style="height:200px">
    <ul>
        @foreach ($datas['homeRandoms'] as $pKey => $pData)
        <li>
            <a href="{{$pData['url']}}" target="_blank" class="{{$pData['class_style']}}">{{$pData['name']}}</a>
        </li>
        @endforeach 
    </ul>
</div>
