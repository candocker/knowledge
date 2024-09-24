@php
$rowCount = $mobileClass ? $datas['rowCountMobile'] : $datas['rowCount'];
$infos = $datas['infos'];
@endphp

@foreach ($datas['chapters'] as $pData)
<section class="uix-spacing--s" style="padding-top:0px; padding-bottom:25px">
  <div class="container" style="padding-left:5px;padding-right:3px;">
    <div class="row">
      <div class="col-12">
        <div class="uix-table uix-table--bordered">
          @if (isset($pData['name']))
          <div class="col-12" style="">
            <h5 class="uix-heading--pinline">{{$pData['name']}}</h5>
            @if (isset($pData['brief']))<p class="uix-heading--pinline" style="color: green;font-size:14px;">{{$pData['brief']}}</p>@endif
          </div>
          @endif
          <table>
            <tbody class="uix-t-l--md">
              @php $i = 1; @endphp
              @foreach ($pData['infos'] as $pCode)
              @if ($i % $rowCount == 1)<tr>@endif
              <td style="text-align:center;padding-left:3px;padding-right:1px;padding-bottom:3px; padding-top:5px;">
                <span style="margin: 0px;font-size:@if ($mobileClass) 10pt @else 14pt @endif;">
                  <a href="/show-{{$datas['bookCode']}}-{{$pCode}}">
                    {{$infos[$pCode]['name']}}
                    @if (isset($datas['bookData']['withAuthor'])) ( {{$infos[$pCode]['author']}} )@endif
                  </a>
                  @if (isset($datas['bookData']['chapterList'])) 
                    <a href="/show-{{$datas['bookCode']}}-{{$pCode}}"> 列表</a>
                  @endif
                </span>
              </td>
              @if ($i % $rowCount == $rowCount)</tr>@endif
              @php $i += 1; @endphp
              @endforeach
              @if ($i % $rowCount != $rowCount)</tr>@endif
            </tbody>
          </table>  
        </div>      
      </div>
    </div>
  </div>
</section>  
@endforeach
