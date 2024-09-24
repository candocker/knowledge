@php $j = 1; @endphp
@foreach ($datas['chapters'] as $chapter)

@if (count($datas['chapters']) > 1)
<div class="uix-nav uix-nav--separation uix-t-c" style="padding: 0px">
  <ul><li class=""><a style="color:#a1887f;">@if (isset($chapter['name'])) {{$chapter['name']}} @else 第{{$j}} 节 @endif </a></li></ul>
</div>
@endif

@foreach ((array) $chapter['content'] as $key => $cContent)
@if (isset($datas['bookData']['spell']) && isset($chapter['spell']))
@if (isset($chapter['spell'][$key]))<div class="jingwen spellclass" style="display: none;">{{$chapter['spell'][$key]}}</div>@endif
@endif
<div class="jingwen">{!!$cContent!!}</div>
@endforeach
@php $j++; @endphp
<div id="comment1" class="comment" style="display: none;">
  @if (isset($chapter['notes']) && $chapter['notes'])
  @foreach ((array) $chapter['notes'] as $i => $note)
  <p>【注释】 {{$note}}</p>
  @endforeach
  @endif
</div>
<div id="yiwen1" class="yiwen" style="display: none;">
  @if (isset($chapter['vernacular']) && $chapter['vernacular'])
  @foreach ((array) $chapter['vernacular'] as $i => $vernacular)
  <p>【译文】 {{$vernacular}}</p>
  @endforeach
  @endif
</div>
<div id="jiedu1" class="jiedu" style="display: none;">
  @if (isset($chapter['unscramble']) && $chapter['unscramble'])
  @foreach ((array) $chapter['unscramble'] as $i => $unscramble)
  <p>【解读】 {{$unscramble}}</p>
  @endforeach
  @endif
</div>
@endforeach
<div id="yiwen1" class="yiwen" style="display: none;">
  @if (isset($datas['notes']))
  @foreach ((array) $datas['notes'] as $i => $note)
  <p>【译文】 {{$note}}</p>
  @endforeach
  @endif
</div>
<div id="jiedu1" class="jiedu" style="display: none;">
  @if (isset($datas['unscramble']))
  @foreach ((array) $datas['unscramble'] as $i => $unscramble)
  <p>【解读】 {{$unscramble}}</p>
  @endforeach
  @endif
</div>
