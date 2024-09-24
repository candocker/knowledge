@php
$siteName = $data['siteName'] ?? '融会贯通';
@endphp
<style>
.navbar-brand {
    color: #dddcdc;
    text-transform: uppercase;
    font-size: 24px;
    font-weight: 700;
    line-height: 1em;
    letter-spacing: -1px;
    margin-top: 20px;
    padding: 0 0 15px;
}
</style>
<header class="uix-header__container @if (isset($datas['navOverlay'])) uix-header__container--overlay @endif">
    <div class="uix-header">
        <div class="container">
            <div class="uix-brand">
                <a class="navbar-brand" href="/"><span>{{$siteName}}</span></a>
            </div>
            @include('layouts.website._nav', ['data' => []])
        </div>
        <div class="uix-clearfix"></div>
    </div>
</header>
@if (!isset($datas['navAuto']))
<div class="uix-header__placeholder js-uix-header__placeholder-autoheight"></div>
@endif
