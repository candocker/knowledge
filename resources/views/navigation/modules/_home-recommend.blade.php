@php
$classDatas = ['one', 'two', 'three', 'four', 'five', 'six', 'seven'];
@endphp
<div class="container tj">
    <div class="d-flex justify-content-between">
        @foreach ($datas as $pIndex => $pData)
        <a class="sub {{$pData['class_style']}}" href="{{$pData['url']}}" target="_blank">
            <div class="p-2 bd-highlight">{{$pData['name']}}</div>
        </a>
        @endforeach 
    </div>
</div>
