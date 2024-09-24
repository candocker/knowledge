@php $j = 1; @endphp
@foreach ($datas['chapters'] as $chapter)
@php $cUnit = $datas['bookData']['cUnit'] ?? '节'; @endphp
@php $cName = isset($chapter['name']) ? $chapter['name'] : "第 {$j} {$cUnit}"; @endphp
@if (count($datas['chapters']) > 1)
<div class="uix-nav uix-nav--separation uix-t-c" style="padding: 0px">
  <ul><li class="current-cat"><a style="color:#a1887f;">{{$cName}}</a></li></ul>
  <!--<ul><li class="is-activ"><a style="background-color:#eceff1;color:#a1887f;">{{$cName}}</a></li></ul>-->
</div>
@endif
@foreach ((array) $chapter['content'] as $cContent)
<div class="jingwen">{!!$cContent!!}</div>
@endforeach
@if (isset($datas['bookData']['spell']) && isset($chapter['spell']))
@foreach ((array) $chapter['spell'] as $spellStr)
<div class="jingwen spellclass" style="display: none;">{{$spellStr}}</div>
@endforeach
@endif
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
<div class="zhuxi" style="display: none;">
<div id="jiedu1" class="jiedu">
  @if (isset($chapter['zhuxi']) && $chapter['zhuxi'])
  @foreach ((array) $chapter['zhuxi'] as $i => $zhuxi)
  <p>【朱熹】 {!!$zhuxi!!}</p>
  @endforeach
  @endif
</div>
</div>
<div id="jiedu1" class="jiedu" style="display: none;">
  @if (isset($chapter['unscramble']) && $chapter['unscramble'])
  @foreach ((array) $chapter['unscramble'] as $i => $unscramble)
  <p>【解读】 {{$unscramble}}</p>
  @endforeach
  @endif
</div>
@php $j++; @endphp
@endforeach
<!--<div id="yiwen1" class="yiwen">
  @if (isset($datas['notes']))
  @foreach ((array) $datas['notes'] as $i => $note)
  <p>【译文】 {{$note}}</p>
  @endforeach
  @endif
</div>-->
<div id="jiedu1" class="jiedu" style="display:none;">
  @if (isset($datas['unscramble']))
  <hr />
  @foreach ((array) $datas['unscramble'] as $i => $unscramble)
  <p>【解读】 {{$unscramble}}</p>
  @endforeach
  @endif
</div>
