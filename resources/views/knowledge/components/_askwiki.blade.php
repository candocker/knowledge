@php
//print_r($askwikiDatas);exit();
@endphp
    <div class="row-fluid profile">
      <div class="span12">
        <div class="tabbable tabbable-custom tabbable-full-width">
          @if (count($askwikiDatas) > 1)
          <ul class="nav nav-tabs">
            @php $i = 1; @endphp
            @foreach ($askwikiDatas as $askwikiData)
            @php $topData = $askwikiData['topData']; $topKey = $topData['code'] ?? $i; $topName = $topData['name'] ?? '大分类' . $i; @endphp
            <li @if ($i == 1) class="active" @endif><a href="#toptab_{{$topKey}}" data-toggle="tab">{{$topName}}</a></li>
            @php $i++; @endphp
            @endforeach
          </ul>
          @endif
          <div class="tab-content">
            @php $i = 1; @endphp
            @foreach ($askwikiDatas as $askwikiData)
            @php $topData = $askwikiData['topData']; $topKey = $topData['code'] ?? $i; $topName = $topData['name'] ?? '分类' . $i; @endphp
            <div class="tab-pane row-fluid @if ($i == 1) active @endif" id="toptab_{{$topKey}}">
              <div class="row-fluid">
                <div class="span12">
                  <div class="span3">
                    @if (count($askwikiData['secondDatas']) > 1)
                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                      @php $j = 1; @endphp
                      @foreach ($askwikiData['secondDatas'] as $secondData)
                      @php $bigData = $secondData['bigData']; $bigKey = isset($bigData['code']) && !empty($bigData['code']) ? $bigData['code'] : $j; $bigName = isset($bigData['name']) ? $bigData['name'] : '默认'; @endphp
                      <li @if ($j == 1) class="active" @endif>
                        <a href="#bigtab_{{$bigKey}}" data-toggle="tab">
                          <i class="icon-info-sign"></i> {{$bigName}}
                        </a>
                        @if ($j == 1)<span class="after"></span>@endif
                      </li>
                      @php $j++; @endphp
                      @endforeach
                    </ul>
                    @endif
                  </div>
                  <div class="span9">
                    <div class="tab-content">
                      @php $j = 1; @endphp
                      @foreach ($askwikiData['secondDatas'] as $secondData)
                      @php $bigData = $secondData['bigData']; $bigKey = isset($bigData['code']) && !empty($bigData['code']) ? $bigData['code'] : $j; $bigName = isset($bigData['name']) ? $bigData['name'] : '默认'; @endphp
                      <div id="bigtab_{{$bigKey}}" class="tab-pane @if ($j == 1) active @endif">
                        <div style="height: auto;" id="accordion{{$bigKey}}" class="accordion collapse">
                          @php $k = 1; @endphp
                          @foreach ($secondData['subInfos'] as $subData)
                          <div class="accordion-group">
                            <div class="accordion-heading">
                              <a href="#collapse_{{$subData['code']}}" ask-elem="current_{{$subData['knowledge_code']}}_{{$subData['code']}}" ask-url="/ask-{{$subData['knowledge_code']}}-{{$subData['code']}}.html" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed ask_ajax_btn">
                              {{$subData['name']}}
                              </a>
                            </div>
                            <div class="accordion-body collapse @if ($k == 1) in-o @endif" id="collapse_{{$subData['code']}}">
                              <div class="accordion-inner" id="current_{{$subData['knowledge_code']}}_{{$subData['code']}}"></div>
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
