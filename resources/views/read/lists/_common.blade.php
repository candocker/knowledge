@php
$rowCount = $mobileClass ? 3 : 4;//$datas['rowCountMobile'] : $datas['rowCount'];
@endphp

@foreach ($datas['chapterDatas'] as $pData)
<section class="uix-spacing--s" style="padding-top:0px; padding-bottom:25px">
  <div class="container" style="padding-left:5px;padding-right:3px;">
    <div class="row">
      <div class="col-12">
        <div class="uix-table uix-table--bordered">
          @if (isset($pData['bigData']['name']))
          <div class="col-12" style="">
            <h5 class="uix-heading--pinline">{{$pData['bigData']['name']}}</h5>
            @if (isset($pData['bigData']['brief']))<p class="uix-heading--pinline" style="color: green;font-size:14px;">{{$pData['bigData']['brief']}}</p>@endif
          </div>
          @endif
          <table>
            <tbody class="uix-t-l--md">
              @php $i = 1; @endphp
              @foreach ($pData['subInfos'] as $subData)
              @if ($i % $rowCount == 1)<tr>@endif
              <td style="text-align:center;padding-left:3px;padding-right:1px;padding-bottom:3px; padding-top:5px;">
                <span style="margin: 0px;font-size:@if ($mobileClass) 10pt @else 14pt @endif;">
                  <a href="/show-{{$subData['book_code']}}-{{$subData['code']}}">
                    {{$subData['name']}}
                    @if (isset($datas['bookData']['withAuthor'])) ( {{$subData['author']}} )@endif
                  </a>
                  @if (isset($datas['bookData']['chapterList']))
                    <a href="/show-{{$subData['book_code']}}-{{$pCode}}"> 列表</a>
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
