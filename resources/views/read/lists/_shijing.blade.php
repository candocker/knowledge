@php
$rowCount = $mobileClass ? $datas['rowCountMobile'] : $datas['rowCount'];
$infos = $datas['infos'];
@endphp

@foreach ($datas['chapters'] as $chapter)
<section class="uix-spacing--s" style="padding-top:0px; padding-bottom:25px">
  <div class="container" style="padding-left:5px;padding-right:3px;">
    <div class="row">
      <div class="col-12">
        <div class="uix-table uix-table--bordered">
          <div class="col-12" style="">
            <h4 class="uix-heading--pinline">{{$chapter['name']}}</h4>
          </div>
          <table>
            <tbody class="uix-t-l--md">
              @foreach ($chapter['elems'] as $key => $elem)
              @foreach ($elem['infos'] as $pIndex => $pCode)
              @if ($pIndex % $rowCount == 0)<tr>@endif
              @if ($pIndex == 0)

              <td style="vertical-align: middle;text-align:center;" rowspan="{{ceil(count($elem['infos']) / $rowCount)}} width:{{$datas['rowspan']}}%">
                {{$elem['name']}}<!--<br/>{{$elem['spell']}}-->
              </td>
              @endif

              <td style="text-align:center;padding-left:3px;padding-right:1px;padding-bottom:3px; padding-top:5px;">
                <span style="margin: 0px;font-size:@if ($mobileClass) 9pt @else 14pt @endif;">
                  <a @if (!isset($infos[$pCode]['isLost']))href="/show-{{$datas['bookCode']}}-{{$pCode}}"@endif>
                    @if (!isset($datas['bookData']['onlyName'])){{$pCode}}@endif {{$infos[$pCode]['name']}}
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
