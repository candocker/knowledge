@php
//print_r($askwikiDatas);exit();
@endphp
<div class="row-fluid profile">
  <div class="span12">
    <div class="tabbable tabbable-custom tabbable-full-width">
      @if (count($askwikiDatas) > 1)
      <ul class="nav nav-tabs">
        @php $i = 1; @endphp
        @foreach ($askwikiDatas as $topKey => $askwikiData)
        <li @if ($i == 1) class="active" @endif><a href="#toptab_{{$topKey}}" data-toggle="tab">{{$askwikiData['name']}}</a></li>
        @php $i++; @endphp
        @endforeach
      </ul>
      @endif
      <div class="tab-content">
        @php $i = 1; @endphp
        @foreach ($askwikiDatas as $topKey => $askwikiData)
        <div class="tab-pane row-fluid @if ($i == 1) active @endif" id="toptab_{{$topKey}}">
          <div class="row-fluid">
            <div class="span12">
              <div class="span3">
                <ul class="ver-inline-menu tabbable margin-bottom-10">
                  @php $j = 1; @endphp
                  @foreach ($askwikiData['infos'] as $bigKey => $iData)
                  <li @if ($j == 1) class="active" @endif>
                    <a href="#bigtab_{{$topKey}}_{{$bigKey}}" data-toggle="tab">
                      <i class="icon-info-sign"></i> {{$iData['name']}}
                    </a>
                    @if ($j == 1)<span class="after"></span>@endif
                  </li>
                  @php $j++; @endphp
                  @endforeach
                </ul>
              </div>
              <div class="span9">
                <div class="tab-content">
                  @php $j = 1; @endphp
                  @foreach ($askwikiData['infos'] as $bigKey => $iData)
                  <div id="bigtab_{{$topKey}}_{{$bigKey}}" class="tab-pane @if ($j == 1) active @endif">
                    <div style="height: auto;" id="accordion{{$bigKey}}" class="accordion collapse">
                      @php $k = 1; @endphp
                      @foreach ($iData['subInfos'] as $subKey => $subData)
                      @php $currentKey = $topKey . '_' . $bigKey . '_' . $subKey . '_' . $k; @endphp
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a href="#collapse_{{$currentKey}}" ask-elem="current_{{$currentKey}}" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
                            {{$k}} {{$subData['ask']}}
                          </a>
                        </div>
                        <div class="accordion-body collapse @if ($k == 1) in-o @endif" id="collapse_{{$currentKey}}">
                          @php $answers = $subData['answer'] ?? []; $answers = (array) $answers; @endphp
                          @foreach ($answers as $answer)
                          <div class="accordion-inner" id="current_{{$currentKey}}">{{$answer}}</div>
                          @endforeach
                        </div>
                      </div>
                      @php $k++; @endphp
                      @endforeach
                    </div>
                  </div>
                  @php $j++; @endphp
                  @endforeach
                </div>
              </div>
              <!--end span9-->
            </div>
          </div>
        </div>
        @php $i++; @endphp
        @endforeach
      </div>
    </div>
  </div>
</div>
