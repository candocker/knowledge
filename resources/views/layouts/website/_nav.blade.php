<nav class="uix-menu__container">
<!--<nav class="uix-menu__container uix-trans">-->
  <div class="uix-menu__inner">
    <span class="uix-brand--mobile">
      <a class="navbar-brand" href="/"><span>融会贯通</span></a>
    </span>
    <ul class="uix-menu"> 
      @foreach ($datas['navDatas'] as $navCode => $navData)
      @php $pUrl = $navData['url'] ?? (isset($navData['noUrl']) ? 'javascript: void(0)' : "/{$navCode}"); @endphp
      <li class="@if (isset($navData['subNavs'])) multi-column @endif @if ($navCode == $datas['bigNav']) current-menu-item is-active @endif"><a href="{{$pUrl}}">{{$navData['name']}}</a>
        @if (isset($navData['subNavs']))
        <ul class="sub-menu">
          <li>
            <ul class="sub-menu">
              @foreach ($navData['subNavs'] as $subCode => $subData)
              @php $pUrl = $subData['url'] ?? (isset($subData['noUrl']) ? 'javascript: void(0)' : "/{$navCode}-{$subCode}"); @endphp
              <li><a href="{{$pUrl}}" style="@if ($subCode == $datas['currentNav']) color:blue; @endif">{{$subData['name']}}</a></li> 
              @endforeach
            </ul>
          </li>
        </ul>
        @endif
      </li>
      @endforeach
    </ul>
    @include('layouts.website._nav-share', ['data' => []])
  </div>
</nav>
