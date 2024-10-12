@php $datas['layoutDatas'] = ['viewCode' => 'charts', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN CHART PORTLETS-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN BASIC CHART PORTLET-->
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Basic Chart</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div id="chart_1" class="chart"></div>
              </div>
            </div>
            <!-- END BASIC CHART PORTLET-->
            <!-- BEGIN TRACKING CURVES PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Tracking Curves</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div id="chart_3" class="chart"></div>
              </div>
            </div>
            <!-- END TRACKING CURVES PORTLET-->
            <!-- BEGIN DYNAMIC CHART PORTLET-->
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Dynamic Chart</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div id="chart_4" class="chart"></div>
              </div>
            </div>
            <!-- END DYNAMIC CHART PORTLET-->
            <!-- BEGIN STACK CHART CONTROLS PORTLET-->
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Stack Chart Controls</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div id="chart_5" style="height:350px;"></div>
                <div class="btn-toolbar">
                  <div class="btn-group stackControls">
                    <input type="button" class="btn blue" value="With stacking" />
                    <input type="button" class="btn red" value="Without stacking" />
                  </div>
                  <div class="space5"></div>
                  <div class="btn-group graphControls">
                    <input type="button" class="btn" value="Bars" />
                    <input type="button" class="btn" value="Lines" />
                    <input type="button" class="btn" value="Lines with steps" />
                  </div>
                </div>
              </div>
            </div>
            <!-- END STACK CHART CONTROLS PORTLET-->
            <!-- BEGIN INTERACTIVE CHART PORTLET-->
            <div class="portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Interactive Chart</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div id="chart_2" class="chart"></div>
              </div>
            </div>
            <!-- END INTERACTIVE CHART PORTLET-->
          </div>
        </div>
        <!-- END CHART PORTLETS-->
        <!-- BEGIN PIE CHART PORTLET-->
        <div class="row-fluid">
          <div class="span6">
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Default</div>
                <div class="tools">
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>Default Pie with Legend.</h4>
                <div id="pie_chart" class="chart"></div>
              </div>
            </div>
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Graph1</div>
                <div class="tools">
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>Default Pie without Legend</h4>
                <div id="pie_chart_1" class="chart"></div>
              </div>
            </div>
          </div>
          <div class="span6">
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Graph2</div>
                <div class="tools">
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>Added a semi-transparent background to the labels and a custom labelFormatter function.</h4>
                <div id="pie_chart_2" class="chart"></div>
              </div>
            </div>
            <div class="portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Graph3</div>
                <div class="tools">
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>Slightly more transparent label backgrounds and adjusted the radius values to place them within the pie.</h4>
                <div id="pie_chart_3" class="chart"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- END PIE CHART PORTLET-->
        <!-- BEGIN PIE CHART PORTLET-->
        <div class="row-fluid">
          <div class="span6">
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Graph4</div>
                <div class="tools">
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>Semi-transparent, black-colored label background.</h4>
                <div id="pie_chart_4" class="chart"></div>
              </div>
            </div>
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Graph5</div>
                <div class="tools">
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>Semi-transparent, black-colored label background placed at pie edge.</h4>
                <div id="pie_chart_5" class="chart"></div>
              </div>
            </div>
          </div>
          <div class="span6">
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Graph6</div>
                <div class="tools">
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>Added a semi-transparent background to the labels and a custom labelFormatter function.</h4>
                <div id="pie_chart_6" class="chart"></div>
              </div>
            </div>
            <div class="portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Graph7</div>
                <div class="tools">
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>Labels can be hidden if the slice is less than a given percentage of the pie (10% in this case).</h4>
                <div id="pie_chart_7" class="chart"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- END PIE CHART PORTLET-->
        <!-- BEGIN PIE CHART PORTLET-->
        <div class="row-fluid">
          <div class="span6">
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Graph8</div>
                <div class="tools">
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>The radius can also be set to a specific size (even larger than the container itself).</h4>
                <div id="pie_chart_8" class="chart"></div>
              </div>
            </div>
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Graph9</div>
                <div class="tools">
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>SThe pie can be tilted at an angle.</h4>
                <div id="pie_chart_9" class="chart"></div>
              </div>
            </div>
          </div>
          <div class="span6">
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Graph10</div>
                <div class="tools">
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>A donut hole can be added.</h4>
                <div id="donut" class="chart"></div>
              </div>
            </div>
            <div class="portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Graph11</div>
                <div class="tools">
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>The pie can be made interactive with hover and click events.</h4>
                <div id="interactive" class="chart"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- END PIE CHART PORTLET-->
        <!-- END PAGE CONTENT-->
      </div>
@endsection
