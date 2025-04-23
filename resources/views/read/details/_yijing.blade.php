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
$contents = $datas['contents'];
$cChapter = $datas['currentChapterData'];
$bookData = $datas['bookData'];
$symbolDatas = explode(',', $cChapter['description']);
@endphp

<div class="col-12 uix-spacing--no-bottom uix-t-c" style="padding-top:20px;padding-bottom:0px;font-size:10px">
  <div class="col-12 uix-spacing--no">
    <h4 class="uix-heading--pinline uix-t-c title" style="padding-top:5px;">{{$contents['serial']}} {{$cChapter['title']}}</h4>
    <h6 class=" uix-spacing--no" style="text-align: center; padding: 0px; color: green;">{{$cChapter['name']}}: {{$contents['gua']}}</h6>
    @if (isset($cChapter['descriptiono']))
    <p class=" uix-spacing--no" style="text-align: center; padding: 0px; color: green;">{{$cChapter['description']}}</p>
    @endif
  </div>
  <hr>
</div>

@foreach ($showElems as $pointKey => $pointElem)
  <p class="{{$pointElem['class']}}" style="margin-bottom:3px;"><big>{{$pointElem['name']}}</big><span>{{$contents[$pointKey]}}</span></p>
  @foreach ($authors as $aCode => $author)
    @if (isset($contents[$aCode]) && isset($contents[$aCode][$pointKey]) && !empty($contents[$aCode][$pointKey]))
      @foreach ((array) $contents[$aCode][$pointKey] as $i => $elemStr)
      <div class="yiwen {{$aCode}} "><p>【{{$author['name']}}】{!!$elemStr!!}</p></div>
      @endforeach
    @endif
  @endforeach
@endforeach

@if (in_array($contents['serial'], [1, 2]))
@php $topYao = array_pop($contents['yao']); @endphp
<div style="text-align:center;margin: 0 auto; color:red;padding:0px;">{{$topYao}}</div>
@endif

<div style="margin: 0 auto;">
<span class="baguatext" >{{$contents['up']}}上<br>{{$contents['down']}}下</span>
<span class="baguatu">
  @foreach ($symbolDatas as $symbol) {{$symbols[$symbol]}}<br>@endforeach
</span>
<pre class="yaoci">
@foreach (array_reverse($contents['yao']) as $elem)
{{$elem}}
@endforeach
</pre>
</div>
<hr />

<hr />
@foreach ($contents['yao'] as $key => $elem)
<p class="xiang">
  <big>爻辞</big> <span class="yin">{{$elem}}</span><br>
  @foreach ($authors as $aCode => $author)
  @if (isset($contents[$aCode]['yao']) && isset($contents[$aCode]['yao'][$key]) && !empty($contents[$aCode]['yao'][$key]))
  <div class="yiwen {{$aCode}}"><p>【{{$author['name']}}】{!!$contents[$aCode]['yao'][$key]!!}</p></div>
  @endif
  @endforeach

  <span class="xiaoxiang"><big>象曰</big> <span style="">{{$contents['xiaoxiang'][$key]}}</span><br /></span>
  @foreach ($authors as $aCode => $author)
  @if (isset($contents[$aCode]['xiaoxiang']) && isset($contents[$aCode]['xiaoxiang'][$key]) && !empty($contents[$aCode]['xiaoxiang'][$key]))
  <div class="yiwen {{$aCode}}"><p>【{{$author['name']}}】{!!$contents[$aCode]['xiaoxiang'][$key]!!}</p></div>
  @endif
  @endforeach
</p>
@endforeach


@if (isset($contents['vernacular']) && isset($contents['vernacular']['notes']))
  @foreach ($contents['vernacular']['notes'] as $note)
  <div id="comment1" class="comment"><p>【注释】{{$note}}</p></div>
  @endforeach
@endif
