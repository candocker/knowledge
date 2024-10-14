@php $datas['layoutDatas'] = ['viewCode' => 'jqueryui', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>jQuery UI Dialogs</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body form">
                <div id="dialog_basic1" title="Basic dialog" class="hide">
                  <p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
                </div>
                <div id="dialog_basic2" title="Basic dialog" class="hide">
                  <p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
                </div>
                <div id="dialog_basic3" title="Basic dialog" class="hide">
                  <p>This is a animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
                </div>
                <div id="dialog_basic4" title="Basic dialog" class="hide">
                  <p>This is a dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
                </div>
                <div id="dialog_confirm" title="Empty the recycle bin?" class="hide">
                  <p><span class="icon icon-warning-sign"></span>
                    These items will be permanently deleted and cannot be recovered. Are you sure?
                  </p>
                </div>
                <div id="dialog_info" title="Download complete" class="hide">
                  <p>
                    <span class="icon icon-bullhorn"></span>
                    Your files have downloaded successfully into the My Downloads folder.
                  </p>
                  Currently using 36% of your storage space.
                  <div class="progress progress-striped">
                    <div style="width: 36%;" class="bar"></div>
                  </div>
                </div>
                <table class="table table-hover table-striped table-bordered">
                  <tr>
                    <td>Basic Dialog with Animation 1</td>
                    <td><button id="basic_opener1" class="btn yellow">Open Dialog</button></td>
                  </tr>
                  <tr>
                    <td>Basic Dialog with Animation 2</td>
                    <td><button id="basic_opener2" class="btn purple">Open Dialog</button></td>
                  </tr>
                  <tr>
                    <td>Basic Dialog with Animation 3</td>
                    <td><button id="basic_opener3" class="btn grey">Open Dialog</button></td>
                  </tr>
                  <tr>
                    <td>Basic Draggable & Resiable Dialog</td>
                    <td><button id="basic_opener4" class="btn red">Open Dialog</button></td>
                  </tr>
                  <tr>
                    <td>Info Modal Dialog</td>
                    <td><button id="info_opener" class="btn blue">Open Dialog</button></td>
                  </tr>
                  <tr>
                    <td>Confirm Modal Dialog</td>
                    <td><button id="confirm_opener" class="btn green">Open Dialog</button></td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- END PORTLET-->
            <!-- BEGIN PORTLET-->
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>jQuery UI Date Pickers</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="#" class="form-horizontal form-row-seperated">
                  <div class="control-group">
                    <label class="control-label">Default datepicker</label>
                    <div class="controls">
                      <input class="m-wrap" size="16" type="text" value="" id="ui_date_picker"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Custom Trigger</label>
                    <div class="controls">
                      <div class="input-append" id="ui_date_picker_trigger">
                        <input type="text" class="m-wrap medium" /><span class="add-on"><i class="icon-calendar"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">With Button Bar</label>
                    <div class="controls">
                      <input class="m-wrap" size="16" type="text" value="" id="ui_date_picker_with_button_bar"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Display month & year menus</label>
                    <div class="controls">
                      <input class="m-wrap" size="16" type="text" value="" id="ui_date_picker_change_year_month"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Multiple Months</label>
                    <div class="controls">
                      <input class="m-wrap" size="16" type="text" value="" id="ui_date_picker_multiple"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Date Range</label>
                    <div class="controls">
                      <input class="m-wrap small" size="16" type="text" value="" id="ui_date_picker_range_from"/>
                      <span class="text-inline">&nbsp;to&nbsp;</span>
                      <input class="m-wrap small" size="16" type="text" value="" id="ui_date_picker_range_to"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Week of the Year</label>
                    <div class="controls">
                      <input class="m-wrap" size="16" type="text" value="" id="ui_date_picker_week_year"/>
                    </div>
                  </div>
                  <div class="control-group last">
                    <label class="control-label">Inline</label>
                    <div class="controls">
                      <div id="ui_date_picker_inline"></div>
                    </div>
                  </div>
                </form>
                <!-- END FORM-->
              </div>
            </div>
            <!-- END PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
