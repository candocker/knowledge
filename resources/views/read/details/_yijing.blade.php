@php
$authors = [
  'zhuxi' => ['name' => '朱熹', 'nameFull' => '朱熹解易'],
  'wangbi' => ['name' => '王弼', 'nameFull' => '王弼周易注'],
  'sushi' => ['name' => '苏轼', 'nameFull' => '东坡易传'],
  'vernacular' => ['name' => '译文', 'nameFull' => '译文'],
];
$showElems = [
  'gua' => ['class' => 'guaci', 'name' => '卦辞'], 
  'tuan' => ['class' => 'tuan', 'name' => '彖曰'],
  'xiang' => ['class' => 'daxiang', 'name' => '象曰'],
];
$symbols = [0 => '■■■■　■■■■', 1 => '■■■■■■■■■'];
@endphp

<div class="col-12 uix-spacing--no-bottom uix-t-c" style="padding-top:20px;padding-bottom:0px;font-size:10px">
  <div class="col-12 uix-spacing--no">
    <h4 class="uix-heading--pinline uix-t-c title" style="padding-top:5px;">{{$datas['serial']}} {{$datas['brief']}}</h4>
    @if (isset($datas['brief']))
    <h6 class=" uix-spacing--no" style="text-align: center; padding: 0px; color: green;">{{$datas['name']}}: {{$datas['gua']}}</h6>
    @endif
    @if (isset($datas['description']))
    <p class=" uix-spacing--no" style="text-align: center; padding: 0px; color: green;">{{$datas['description']}}</p>
    @endif
  </div>
  <hr>
</div>
@if (in_array($datas['serial'], [1, 2]))
@php $topYao = array_pop($datas['yao']); @endphp
<div style="text-align:center;margin: 0 auto; color:red;padding:0px;">{{$topYao}}</div>
@endif
<div style="margin: 0 auto;">
<span class="baguatext" >{{$datas['up']}}上<br>{{$datas['down']}}下</span>
<span class="baguatu">
  @foreach (array_reverse($datas['symbol']) as $symbol) {{$symbols[$symbol]}}<br>@endforeach
</span>
<pre class="yaoci">
@foreach (array_reverse($datas['yao']) as $elem)
{{$elem}}
@endforeach
</pre>
</div>
<hr />

@foreach ($showElems as $pointKey => $pointElem)
  <p class="{{$pointElem['class']}}" style="margin-bottom:3px;"><big>{{$pointElem['name']}}</big><span>{{$datas[$pointKey]}}</span></p>
  @foreach ($authors as $aCode => $author)
    @if (isset($datas[$aCode]) && isset($datas[$aCode][$pointKey]) && !empty($datas[$aCode][$pointKey]))
      @foreach ((array) $datas[$aCode][$pointKey] as $i => $elemStr)
      <div class="yiwen {{$aCode}} "><p>【{{$author['name']}}】{!!$elemStr!!}</p></div>
      @endforeach
    @endif
  @endforeach
@endforeach

<hr />
@foreach ($datas['yao'] as $key => $elem)
<p class="xiang">
  <big>爻辞</big> <span class="yin">{{$elem}}</span><br>
  @foreach ($authors as $aCode => $author)
  @if (isset($datas[$aCode]['yao']) && isset($datas[$aCode]['yao'][$key]) && !empty($datas[$aCode]['yao'][$key]))
  <div class="yiwen {{$aCode}}"><p>【{{$author['name']}}】{!!$datas[$aCode]['yao'][$key]!!}</p></div>
  @endif
  @endforeach

  <span class="xiaoxiang"><big>象曰</big> <span style="">{{$datas['xiaoxiang'][$key]}}</span><br /></span>
  @foreach ($authors as $aCode => $author)
  @if (isset($datas[$aCode]['xiaoxiang']) && isset($datas[$aCode]['xiaoxiang'][$key]) && !empty($datas[$aCode]['xiaoxiang'][$key]))
  <div class="yiwen {{$aCode}}"><p>【{{$author['name']}}】{!!$datas[$aCode]['xiaoxiang'][$key]!!}</p></div>
  @endif
  @endforeach
</p>
@endforeach

@if (isset($datas['vernacular']) && isset($datas['vernacular']['notes']))
  @foreach ($datas['vernacular']['notes'] as $note)
  <div id="comment1" class="comment"><p>【注释】{{$note}}</p></div>
  @endforeach
@endif
