@php
$rowspan = 15;
$rowCount = $mobileClass ? 3 : 5;//$datas['rowCountMobile'] : $datas['rowCount'];
@endphp

@foreach ($datas['chapterDatas'] as $chapter)
<section class="uix-spacing--s" style="padding-top:0px; padding-bottom:25px">
  <div class="container" style="padding-left:5px;padding-right:3px;">
    <div class="row">
      <div class="col-12">
        <div class="uix-table uix-table--bordered">
          <div class="col-12" style="">
            <h4 class="uix-heading--pinline">{{$chapter['topData']['name']}}</h4>
          </div>
          <table>
            <tbody class="uix-t-l--md">
              @foreach ($chapter['secondDatas'] as $key => $elem)
              @foreach ($elem['subInfos'] as $pIndex => $pData)
              @if ($pIndex % $rowCount == 0)<tr>@endif
              @if ($pIndex == 0)

              <td style="vertical-align: middle;text-align:center;" rowspan="{{ceil(count($elem['subInfos']) / $rowCount)}} width:{{$rowspan}}%">
                {{$elem['bigData']['name']}}<!--<br/>{{$elem['bigData']['name']}}-->
              </td>
              @endif

              <td style="text-align:center;padding-left:3px;padding-right:1px;padding-bottom:3px; padding-top:5px;">
                <span style="margin: 0px;font-size:@if ($mobileClass) 9pt @else 14pt @endif;">
                  <a @if (!isset($pData['isLost']))href="/show-{{$pData['book_code']}}-{{$pData['code']}}"@endif>
                    @if (!isset($datas['bookData']['onlyName'])){{$pData['code']}}@endif {{$pData['name']}}
                  </a>
                </span>
              </td>
              @if ($pIndex % $rowCount == $rowCount - 1)</tr>@endif
              @endforeach
              @if ($pIndex % $rowCount != $rowCount - 1)</tr>@endif
              @endforeach
            </tbody>
          </table>  
        </div>      
      </div>
    </div>
  </div>
</section>  
@endforeach
