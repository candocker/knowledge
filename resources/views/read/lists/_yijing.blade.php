@php
$rowCount = $mobileClass ? 4 : 8;
//$infos = $datas['infos'];
$symbols = [0 => '■■■■■　■■■■■', 1 => '■■■■■■■■■■■'];
$rand = time();
@endphp
<style>
.baguatu {
  position: relation;
  height:60px;
  letter-spacing:-5px;
  font-size:9px;
  line-height:11px;
  float:left;
  margin-top:10px;
  margin-bottom:10px;
  padding-right: 5px;
  @if ($mobileClass)
  margin-left:25%;
  margin-right:10%;
  @else
  margin-left:30%;
  margin-right:20%;
  @endif
  background-color:yellow;
  font-family: "宋体";
}
</style>

<div class="{{$mobileClass}}">
@foreach ($datas['chapterDatas'] as $pData)
<section class="uix-spacing--s" style="padding-top:0px; padding-bottom:25px">
  <div class="container" style="padding-left:5px;padding-right:3px;">
    <div class="row">
      <div class="col-12">
        <div class="uix-table uix-table--bordered">
          <div class="col-12" style="">
            <h4 class="uix-heading--pinline">{{$pData['bigData']['name']}}</h4>
          </div>
          <table>
            <tbody class="uix-t-l--md">
              @php $i = 1; @endphp
              @foreach ($pData['subInfos'] as $subData)
              @php $pCode = $subData['code']; @endphp
              @if ($i % $rowCount == 1)<tr>@endif
              <td style="vertical-align: middle;text-align:center;padding-left:5px;padding-right:1px;padding-bottom:3px; padding-top:5px;">
                <div class="baguatu" style="clear:both;align:center">
                @foreach (array_reverse($subData['symbol']) as $symbol) {{$symbols[$symbol]}}<br>@endforeach
                </div>
<br />
                <div style="clear:both;text-align:center;font-size:@if ($mobileClass) 11pt @else 14pt @endif;">
                  <a href="/show-yijing-{{$pCode}}">
                    {{$subData['serial']}}-{{$subData['brief']}}
                  </a>
                  @if (isset($subData['spell']) && $subData['spell'])<!--<br />(<span class="piny">{{$subData['spell']}}</span>)-->@endif
                </div>
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
</div>

<section class="uix-spacing--s" style="padding-top:0px; padding-bottom:25px">
  <div class="container" style="padding-left:5px;padding-right:3px;">
    <div class="row">
      <div class="col-12">
        <div class="uix-table uix-table--bordered">
          <div class="col-12" style="">
            <h4 class="uix-heading--pinline">易传</h4>
          </div>
          <table>
            <tbody class="uix-t-l--md">
              @foreach (['wenyan' => '文言', 'xici1' => '系辞上', 'xici2' => '系辞下', 'shuogua' => '说卦', 'xugua' => '序卦', 'zagua' => '杂卦'] as $code => $name)
              <td style="text-align:center;padding-left:3px;padding-right:1px;padding-bottom:3px; padding-top:5px;">
                <span style="margin: 0px;font-size:@if ($mobileClass) 9pt @else 14pt @endif;">
                  <a href="/show-yizhuan-{{$code}}">
                    {{$name}}传
                  </a>
                </span>
              </td>
              @endforeach
            </tbody>
          </table>  
        </div>      
      </div>
    </div>
  </div>
</section>  
