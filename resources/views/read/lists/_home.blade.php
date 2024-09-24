@php $rowCount = 4 @endphp
@foreach ($datas['chapters'] as $chapter)
<section class="uix-spacing--s" style="padding-top:0px; padding-bottom:25px">
  <div class="container" style="padding-left:5px;padding-right:3px;">
    <div class="row">
      <div class="col-12">
        <div class="uix-table uix-table--bordered">
          <div class="col-12">
            <h4 class="uix-heading--pinline" style="font-size: 16px; color: lightblue;">{{$chapter['name']}}</h4>
            @if (isset($chapter['brief']))<p class="uix-heading--pinline" style="color: green;font-size:14px;">{{$chapter['brief']}}</p>@endif
          </div>
          <table>
            <tbody class="uix-t-l--md">
              @php $i = 1; @endphp
              @foreach ($chapter['books'] as $bCode => $pInfo)
              @if ($i % $rowCount == 1)<tr>@endif
              <td style="text-align:center;padding-left:3px;padding-right:1px;padding-bottom:3px; padding-top:5px;">
                <span style="margin: 0px;font-size:@if ($mobileClass) 10pt @else 14pt @endif;">
                  <a href="/book-{{$bCode}}">{{$pInfo['name']}}</a>
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
