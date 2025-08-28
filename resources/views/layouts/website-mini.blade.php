@php
$layoutElems = ['ltr', 'rtl'];
$layoutElem = $layoutElems[0];
$bodyClasses = [
    '3D-simulate-html-layout' => 'class="page uix-hidden-scrollbar"', // ajax-page-loader
    'mousewheel-interaction' => 'class="page mousewheel-interaction"',
    'one-page' => 'class="page uix-hidden-scrollbar onepage"',
    'typography-rtl' => 'class="page rtl"',
];
@endphp
<!DOCTYPE html>
<html lang="en-US" dir="{{$layoutElem}}">
<head>
@yield('dynamicMeta')
@include('layouts.website._header', ['layoutElem' => $layoutElem])
@yield('header')
<style>
.special-section {
  /*background-color:#e0e2ec
  background-color:#82eeff;
  background-color:#c4d5df;
  background-color:#eed8dd;*/
  background-color:#f5ecee;
  color:#ba1683;
}
.mobile .sub-section {
  font-size:10px;
  color:green;
}
.sub-section {
  font-size:16px;
  color:green;
}
</style>
</head>  
<body @yield('bodyClass')>
    @include('layouts.website._loader-mobile', ['layoutElem' => $layoutElem])
    <div class="uix-wrapper">
        @include('layouts.website._top', ['data' => ['siteName' => '经典和阅读']])
        <main id="uix-maincontent">
        @yield('content')
        </main>
        @include('layouts.website._footer-simple', ['classical' => true])

    </div>
    <!-- .uix-wrapper end -->
    @include('layouts.website._bottom')
</body>
</html>
