@php $datas['layoutDatas'] = ['viewCode' => 'sliders', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN PORTLET-->
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Sliders</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <table class="table sliders table-striped">
                  <tbody>
                    <tr>
                      <td style="width:15%">Basic</td>
                      <td>
                        <div class="slider slider-basic bg-red"></div>
                      </td>
                    </tr>
                    <tr>
                      <td>Snap to increments</td>
                      <td>
                        <div id="slider-snap-inc" class="slider bg-green"></div>
                        <div class="slider-value">
                          Amount ($100 increments):
                          <span id="slider-snap-inc-amount"></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Range</td>
                      <td>
                        <div id="slider-range" class="slider bg-blue"></div>
                        <div class="slider-value">
                          Price range:
                          <span id="slider-range-amount"></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Maximum</td>
                      <td>
                        <div id="slider-range-max" class="slider bg-purple"></div>
                        <div class="slider-value">
                          Maximum Value:
                          <span id="slider-range-max-amount"></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Minimum</td>
                      <td>
                        <div id="slider-range-min" class="slider bg-yellow"></div>
                        <div class="slider-value">
                          Minimum Value:
                          <span class="slider-value" id="slider-range-min-amount"></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Graphic EQ</td>
                      <td>
                        <div id="slider-eq" class="slider-eq">
                          <span>88</span>
                          <span>77</span>
                          <span>55</span>
                          <span>33</span>
                          <span>40</span>
                          <span>45</span>
                          <span>90</span>
                          <span>40</span>
                          <span>60</span>
                          <span>20</span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Vertical</td>
                      <td>
                        <div class="slider-vertical-value">
                          Value:
                          <span  class="slider-value" id="slider-vertical-amount"></span>
                        </div>
                        <div id="slider-vertical" class="slider bg-green" style="height: 200px;"></div>
                      </td>
                    </tr>
                    <tr>
                      <td>Range(Vertical)</td>
                      <td>
                        <div class="slider-vertical-value">
                          Target(Millions):
                          <span  class="slider-value" id="slider-range-vertical-amount"></span>
                        </div>
                        <div id="slider-range-vertical" class="slider bg-grey" style="height: 200px;"></div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END PORTLET-->
            <!-- BEGIN PORTLET-->
            <div class="portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Circle Dials</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="row-fluid visible-ie8">
                  <div class="span12">
                    <span class="label label-important">NOTE:</span>
                    The Circle Dial plugin is not compatible with Internet Explorer 8 and older.
                  </div>
                </div>
                <div class="row-fluid">
                  <div class="span4">
                    <h4>Disable display input</h4>
                    <input class="knob" data-width="100" data-displayInput=false value="35">
                  </div>
                  <div class="span4">
                    <h4>Cursor Mode</h4>
                    <input class="knob" data-width="150" data-cursor=true data-fgColor="#222222" data-thickness=.3 value="29">
                  </div>
                  <div class="span4">
                    <h4>Display previous value</h4>
                    <input class="knob" data-width="200" data-min="-100" data-displayPrevious=true value="44">
                  </div>
                </div>
                <div class="row-fluid">
                  <div class="span4">
                    <h4>Angle offset</h4>
                    <input class="knob" data-angleOffset=90 value="35">
                  </div>
                  <div class="span4">
                    <h4>Angle offset and arc</h4>
                    <input class="knob" data-angleOffset=-125 data-angleArc=250 data-fgColor="#66EE66" value="35">
                  </div>
                  <div class="span4">
                    <h4>5-digit values</h4>
                    <input class="knob" data-min="-15000" data-max="15000" value="-11000">
                  </div>
                </div>
              </div>
            </div>
            <!-- END PORTLET-->
            <!-- BEGIN PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Circle Stats</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="row-fluid visible-ie8">
                  <div class="span12">
                    <span class="label label-important">NOTE:</span>
                    The Circle Dial plugin is not compatible with Internet Explorer 8 and older.
                  </div>
                </div>
                <div class="row-fluid">
                  <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                    <div class="circle-stat">
                      <div class="visual">
                        <input class="knobify" data-width="115" data-fgcolor="#4b8df8" data-thickness=".2" data-skin="tron" data-displayprevious="true" value="+89" data-max="100" data-min="-100" />
                      </div>
                      <div class="details">
                        <div class="title">Unique Visits <i class="icon-caret-up"></i></div>
                        <div class="number">10112</div>
                        <span class="label label-success"><i class="icon-map-marker"></i> 123</span>
                        <span class="label label-warning"><i class="icon-comment"></i> 3</span>
                        <span class="label label-info"><i class="icon-bullhorn"></i> 3</span>
                      </div>
                    </div>
                  </div>
                  <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                    <div class="circle-stat block">
                      <div class="visual">
                        <input class="knobify" data-width="115" data-fgcolor="#852b99" data-thickness=".2" data-skin="tron" data-displayprevious="true" value="+19" data-max="100" data-min="-100" />
                      </div>
                      <div class="details">
                        <div class="title">New Users <i class="icon-caret-up"></i></div>
                        <div class="number">987</div>
                        <span class="label label-important"><i class="icon-bullhorn"></i> 567</span>
                        <span class="label"><i class="icon-plus"></i> 16</span>
                      </div>
                    </div>
                  </div>
                  <div class="span3 responsive" data-tablet="span6 fix-margin" data-desktop="span3">
                    <div class="circle-stat block">
                      <div class="visual">
                        <input class="knobify" data-width="115" data-fgcolor="#ffb848" data-thickness=".2" data-skin="tron" data-displayprevious="true" value="-12" data-max="100" data-min="-100" />
                      </div>
                      <div class="details">
                        <div class="title">Downtime <i class="icon-caret-down down"></i></div>
                        <div class="number">0.01%</div>
                        <span class="label label-info"><i class="icon-bookmark-empty"></i> 23</span>
                        <span class="label label-warning"><i class="icon-ok"></i> 31</span>
                        <span class="label label-success"><i class="icon-briefcase"></i> 39</span>
                      </div>
                    </div>
                  </div>
                  <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                    <div class="circle-stat block">
                      <div class="visual">
                        <input class="knobify" data-width="115" data-fgcolor="#e02222" data-thickness=".2" data-skin="tron" data-displayprevious="true" value="+58" data-max="100" data-min="-100" />
                      </div>
                      <div class="details">
                        <div class="title">Profit <i class="icon-caret-up"></i></div>
                        <div class="number">1120.32$</div>
                        <span class="label label-success"><i class="icon-comment"></i> 453</span>
                        <span class="label label-inverse"><i class="icon-globe"></i> 123</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
