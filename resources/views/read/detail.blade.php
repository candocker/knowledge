@php
$rand = time();
$currentName = isset($datas['nameFull']) && !empty($datas['nameFull']) ? $datas['nameFull'] : $datas['name'];
$currentName .= isset($datas['bookData']['withAuthor']) ? "( {$datas['author']} )" : '';
$currentName .= isset($datas['nameSpell']) ? "<span class='spellclass' style='display: none;'> ( {$datas['nameSpell']} )</span>" : '';

$tabNames = ['spellclass' => '拼音', 'commentinner' => '注释', 'comment' => '注释', 'yiwen' => '译文', 'jiedu' => '解读', 'zhuxi' => '朱熹', 'wangbi' => '王弼', 'sushi' => '苏轼', 'simple' => '原文'];
if (isset($datas['bookData']['tabs'])) {
  $tabs = $datas['bookData']['tabs'];
} else {
  $tabs = [];
  if (isset($datas['bookData']['spell'])) {
    $tabs[] = 'spellclass';
  }
  $tabs[] = isset($datas['bookData']['noteType']) && $datas['bookData']['noteType'] == 'inner' ? 'commentinner' : 'comment';
  $tabs[] = 'yiwen';
  $tabs[] = 'jiedu';
}
@endphp

@extends('layouts.website-mini')
@section('dynamicMeta')@include('modules._meta', $datas['tdkData'])@endsection
@section('content')

{{--<link rel="stylesheet" href="{{$commonAssetUrl}}/classical/css/base.css?v={{$rand}}" type="text/css">
<link rel="stylesheet" href="{{$commonAssetUrl}}/classical/css/show.css?v={{$rand}}" type="text/css">
<link rel="stylesheet" href="{{$commonAssetUrl}}/classical/css/showext.css?v={{$rand}}" type="text/css">--}}
<link rel="stylesheet" href="{{$commonAssetUrl}}/classical/style.css?v={{$rand}}" type="text/css">
<script type="text/javascript" src="{{$commonAssetUrl}}/classical/index.js?v={{$rand}}"></script>

<section class="uix-spacing--s uix-spacing--no-bottom " style="padding-top:5px;pading-bottom:2px;">
  <div class="container" style="text-align:right;padding-right:0px; margin-left: auto; margin-right: auto;">
    <div class="js-uix-sticky-el" style="text-align:center;width:100%;background-color:#e0f2f1; z-index: 100; padding-top:12px; ">
      @foreach ($tabs as $tab)
      <a style="text-align:center" href="javascript: showElems('{{$tab}}');" tabindex="0" class="uix-btn uix-btn__border--thin uix-btn__margin--b uix-btn__size--t uix-btn__bg--primary is-pill is-transparent">{{$tabNames[$tab]}}</a>
      @endforeach
    </div>
  </div>
</section>

<article class="uix-spacing--s uix-spacing--no-bottom uix-spacing--no-top" style="padding-bottom:0px;">
  <div class="container " >
    <div class="offset-md-1 @if ($mobileClass != 'mobile') col-md-10 @endif " style="margin-color: green">
      <div class="{{$mobileClass}} uix-spacing--no">
        @if ($datas['pageCode'] != 'yijing')
        <div class="col-12 uix-spacing--no">
          <h4 class="uix-heading--pinline uix-t-c title" style="padding-top:5px;">{{$currentName}}</h4>
          @if (isset($datas['brief']))
          <h5 class=" uix-spacing--no" style="text-align: center; padding: 0px; color: grey;font-size:14px;">{{$datas['brief']}}</h5>
          @endif
        </div>
        <hr>
        @endif
        @include('read.details._' . $datas['pageCode'], ['datas' => $datas])
      </div>
    </div>  
    <div class="uix-entry__box uix-entry__box--top uix-entry__box--mark uix-spacing--no">
      <hr>
      <div class="row">
        <div class="col-4 uix-t-l" style="padding-right:0px;font-size:12px;">
          <a class="" @if ($datas['pre']['code'])href="/show-{{$datas['bookCode']}}-{{$datas['pre']['code']}}"@endif>&larr; {{$datas['pre']['name']}}</a>
        </div>
        <div class="col-4 uix-t-c" style="padding-right:0px; padding-left:0px; font-size:12px;">
 　 <a href="/book-{{$datas['bookCode']}}">{{$datas['bookData']['name']}}</a> @if (isset($datas['bookData']['author']))<span class="foot_key">作者:</span>{{$datas['bookData']['author']}} @endif
        </div>
        <div class="col-4 uix-t-r" style="padding-left:0px; font-size:12px;">
          <a class="" @if ($datas['next']['code'])href="/show-{{$datas['bookCode']}}-{{$datas['next']['code']}}"@endif>{{$datas['next']['name']}} &rarr;</a>
        </div>             
      </div>
      {{--<div class="uix-entry__box__share uix-t-c">
        <hr>
        <a class="uix-btn uix-btn__border--medium uix-btn__size--s is-pill uix-social-bg uix-social-bg--google" href="//plus.google.com/share?url=https://uiux.cc" target="_blank">
          <i class="fa fa-google-plus"></i> Share on Google+
        </a>  
        <a class="uix-btn uix-btn__border--medium uix-btn__size--s is-pill uix-social-bg uix-social-bg--twitter" href="//twitter.com/intent/tweet?url=https://uiux.cc&text=Shortcodes" target="_blank">
          <i class="fa fa-twitter"></i> Share on Twitter
        </a>  
        <a class="uix-btn uix-btn__border--medium uix-btn__size--s is-pill uix-social-bg uix-social-bg--facebook" href="//www.facebook.com/sharer/sharer.php?u=https://uiux.cc" target="_blank">
          <i class="fa fa-facebook"></i> Share on Facebook
        </a>
      </div>--}}
    </div>  
  </div>
</article>

<script>
function showElems(type) 
{
  if (type == 'simple') {
    var obj = $('.yiwen');
    console.log(obj, 'ooooo');
    obj.hide();
    return ;
  }
  var obj = $('.' + type);
  obj.toggle();
  return ;
}
showElems('simple');
</script>
@endsection
