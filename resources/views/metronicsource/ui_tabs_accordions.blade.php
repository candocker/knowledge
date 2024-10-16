@php $datas['layoutDatas'] = ['viewCode' => '', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid ">
          <div class="span6">
            <!-- BEGIN TAB PORTLET-->
            <div class="portlet box blue tabbable">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet Tabs</div>
              </div>
              <div class="portlet-body">
                <div class="tabbable portlet-tabs">
                  <ul class="nav nav-tabs">
                    <li><a href="#portlet_tab3" data-toggle="tab">Tab 3</a></li>
                    <li><a href="#portlet_tab2" data-toggle="tab">Tab 2</a></li>
                    <li class="active"><a href="#portlet_tab1" data-toggle="tab">Tab 1</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="portlet_tab1">
                      <p>
                        Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent.
                      </p>
                      <div class="alert">
                        <p>
                          There is a known issue where the dropdown menu appears to be a clipping if it placed in tabbed content.
                          By far there is no flaxible fix for this issue as per discussion here: <a target="_blank" href="https://github.com/twitter/bootstrap/issues/3661">https://github.com/twitter/bootstrap/issues/3661</a>
                        </p>
                        <p>
                          But you can check out the below dropdown menu. Don't worry it won't get chopped out by the tab content.
                          Instead it will be opened as dropup menu
                        </p>
                      </div>
                      <div class="btn-group">
                        <a class="btn purple" href="#" data-toggle="dropdown">
                        <i class="icon-user"></i> Settings
                        <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu bottom-up">
                          <li><a href="#"><i class="icon-plus"></i> Add</a></li>
                          <li><a href="#"><i class="icon-trash"></i> Edit</a></li>
                          <li><a href="#"><i class="icon-remove"></i> Delete</a></li>
                          <li class="divider"></li>
                          <li><a href="#"><i class="i"></i> Full Settings</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="tab-pane" id="portlet_tab2">
                      <p>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo.
                      </p>
                      <p>
                        <a class="btn red" href="ui_tabs_accordions.html#portlet_tab2" target="_blank">Activate this tab via URL</a>
                      </p>
                    </div>
                    <div class="tab-pane" id="portlet_tab3">
                      <p>
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                      </p>
                      <p>
                        <a class="btn blue" href="ui_tabs_accordions.html#portlet_tab3" target="_blank">Activate this tab via URL</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END TAB PORTLET-->
          </div>
          <div class="span6">
            <!-- BEGIN TAB PORTLET-->
            <div class="portlet box green tabbable">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet Tabs</div>
              </div>
              <div class="portlet-body">
                <div class="tabbable portlet-tabs">
                  <ul class="nav nav-tabs">
                    <li><a href="#portlet_tab2_3" data-toggle="tab">Tab 3</a></li>
                    <li><a href="#portlet_tab2_2" data-toggle="tab">Tab 2</a></li>
                    <li class="active"><a href="#portlet_tab2_1" data-toggle="tab">Tab 1</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="portlet_tab2_1">
                      <div class="alert">
                        Check out the below dropdown menu. It will be opened as usual since there is enough space at the bottom.
                      </div>
                      <div class="btn-group">
                        <a class="btn red" href="#" data-toggle="dropdown">
                        <i class="icon-user"></i> Settings
                        <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="#"><i class="icon-plus"></i> Add</a></li>
                          <li><a href="#"><i class="icon-trash"></i> Edit</a></li>
                          <li><a href="#"><i class="icon-remove"></i> Delete</a></li>
                          <li class="divider"></li>
                          <li><a href="#"><i class="i"></i> Full Settings</a></li>
                        </ul>
                      </div>
                      <p>
                        Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait.
                      </p>
                      <p>
                        Deros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.
                      </p>
                    </div>
                    <div class="tab-pane" id="portlet_tab2_2">
                      <p>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo.
                      </p>
                      <p>
                        <a class="btn red" href="ui_tabs_accordions.html#portlet_tab2_2" target="_blank">Activate this tab via URL</a>
                      </p>
                    </div>
                    <div class="tab-pane" id="portlet_tab2_3">
                      <p>
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                      </p>
                      <p>
                        <a class="btn purple" href="ui_tabs_accordions.html#portlet_tab2_3" target="_blank">Activate this tab via URL</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END TAB PORTLET-->
          </div>
        </div>
        <div class="row-fluid ">
          <div class="span12">
            <!-- BEGIN INLINE TABS PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Inline Tabs</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="row-fluid">
                  <div class="span6">
                    <!--BEGIN TABS-->
                    <div class="tabbable tabbable-custom">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1_1" data-toggle="tab">Section 1</a></li>
                        <li><a href="#tab_1_2" data-toggle="tab">Section 2</a></li>
                        <li><a href="#tab_1_3" data-toggle="tab">Section 3</a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                          <p>I'm in Section 1.</p>
                          <p>
                            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                          </p>
                          <div class="alert ">
                            Check out the below dropdown menu. Don't worry it won't get chopped out by the tab content.
                            Instead it will be opened as dropup menu.
                          </div>
                          <div class="btn-group">
                            <a class="btn green" href="#" data-toggle="dropdown">
                            Options
                            <i class="icon-angle-down"></i>
                            </a>
                            <div class="dropdown-menu bottom-up hold-on-click dropdown-checkboxes">
                              <label><input type="checkbox">Option 1</label>
                              <label><input type="checkbox">Option 2</label>
                              <label><input type="checkbox">Option 3</label>
                              <label><input type="checkbox">Option 4</label>
                              <label><input type="checkbox">Option 5</label>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab_1_2">
                          <p>Howdy, I'm in Section 2.</p>
                          <p>
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
                          </p>
                          <p>
                            <a class="btn green" href="ui_tabs_accordions.html#tab_1_2" target="_blank">Activate this tab via URL</a>
                          </p>
                        </div>
                        <div class="tab-pane" id="tab_1_3">
                          <p>Howdy, I'm in Section 3.</p>
                          <p>
                            Duis autem vel eum iriure dolor in hendrerit in vulputate.
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat
                          </p>
                          <p>
                            <a class="btn yellow" href="ui_tabs_accordions.html#tab_1_3" target="_blank">Activate this tab via URL</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <!--END TABS-->
                  </div>
                  <div class="space10 visible-phone"></div>
                  <div class="span6">
                    <!--BEGIN TABS-->
                    <div class="tabbable tabbable-custom tabs-below">
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_2_1">
                          <p>I'm in Section 1.</p>
                          <div class="alert">
                            Check out the below dropdown menu. It will be opened as usual since there is enough space at the bottom.
                          </div>
                          <div class="btn-group">
                            <a class="btn red" href="#" data-toggle="dropdown">
                            <i class="icon-user"></i> Settings
                            <i class="icon-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="#"><i class="icon-plus"></i> Add</a></li>
                              <li><a href="#"><i class="icon-trash"></i> Edit</a></li>
                              <li><a href="#"><i class="icon-remove"></i> Delete</a></li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="i"></i> Full Settings</a></li>
                            </ul>
                          </div>
                          <p>
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                          </p>
                          <p>
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                          </p>
                        </div>
                        <div class="tab-pane" id="tab_2_2">
                          <p>Howdy, I'm in Section 2.</p>
                          <p>
                            Duis autem vel eum iriure dolor in hendrerit in vulputate.
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                          </p>
                          <p>
                            <a class="btn yellow" href="ui_tabs_accordions.html#tab_2_2" target="_blank">Activate this tab via URL</a>
                          </p>
                        </div>
                        <div class="tab-pane" id="tab_2_3">
                          <p>Howdy, I'm in Section 3.</p>
                          <p>
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate.
                          </p>
                          <p>
                            <a  class="btn purple" href="ui_tabs_accordions.html#tab_2_3" target="_blank">Activate this tab via URL</a>
                          </p>
                        </div>
                      </div>
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_2_1" data-toggle="tab">Section 1</a></li>
                        <li><a href="#tab_2_2" data-toggle="tab">Section 2</a></li>
                        <li><a href="#tab_2_3" data-toggle="tab">Section 3</a></li>
                      </ul>
                    </div>
                    <!--END TABS-->
                  </div>
                </div>
                <div class="row-fluid">
                  <div class="span6">
                    <!--BEGIN TABS-->
                    <div class="tabbable tabbable-custom tabs-left">
                      <!-- Only required for left/right tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#tab_3_1" data-toggle="tab">Section 1</a></li>
                        <li ><a href="#tab_3_2" data-toggle="tab">Section 2</a></li>
                        <li><a href="#tab_3_3" data-toggle="tab">Section 3</a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_3_1">
                          <p>I'm in Section 1. Less content here</p>
                        </div>
                        <div class="tab-pane " id="tab_3_2">
                          <p>Howdy, I'm in Section 2.</p>
                          <p>
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                          </p>
                          <p>
                            <a  class="btn blue" href="ui_tabs_accordions.html#tab_3_2" target="_blank">Activate this tab via URL</a>
                          </p>
                        </div>
                        <div class="tab-pane" id="tab_3_3">
                          <p>Howdy, I'm in Section 3.</p>
                          <p>
                            Less content here.
                          </p>
                          <p>
                            <a class="btn green" href="ui_tabs_accordions.html#tab_3_3" target="_blank">Activate this tab via URL</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <!--END TABS-->
                  </div>
                  <div class="space10 visible-phone"></div>
                  <div class="span6">
                    <!--BEGIN TABS-->
                    <div class="tabbable tabbable-custom tabs-right">
                      <!-- Only required for left/right tabs -->
                      <ul class="nav nav-tabs tabs-right">
                        <li class="active"><a href="#tab_4_1" data-toggle="tab">Section 1</a></li>
                        <li><a href="#tab_4_2" data-toggle="tab">Section 2</a></li>
                        <li><a href="#tab_4_3" data-toggle="tab">Section 3</a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_4_1">
                          <p>I'm in Section 1.</p>
                          <p>
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                          </p>
                        </div>
                        <div class="tab-pane" id="tab_4_2">
                          <p>Howdy, I'm in Section 2.</p>
                          <p>
                            Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                          </p>
                          <p>
                            <a  class="btn grey" href="ui_tabs_accordions.html#tab_4_1" target="_blank">Activate this tab via URL</a>
                          </p>
                        </div>
                        <div class="tab-pane" id="tab_4_3">
                          <p>Howdy, I'm in Section 3.</p>
                          <p>
                            Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.   Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.
                          </p>
                          <p>
                            <a  class="btn black" href="ui_tabs_accordions.html#tab_4_3" target="_blank">Activate this tab via URL</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <!--END TABS-->
                  </div>
                </div>
              </div>
            </div>
            <!-- END INLINE TABS PORTLET-->
          </div>
        </div>
        <div class="row-fluid ">
          <div class="span6">
            <!-- BEGIN ACCORDION PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Accordions</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="accordion" id="accordion1">
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
                      <i class="icon-angle-left"></i>
                      Collapsible Group Item #1
                      </a>
                    </div>
                    <div id="collapse_1" class="accordion-body collapse in">
                      <div class="accordion-inner">
                        <p>
                          Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                        </p>
                        <p>
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2">
                      <i class="icon-angle-left"></i>
                      Collapsible Group Item #2
                      </a>
                    </div>
                    <div id="collapse_2" class="accordion-body collapse">
                      <div class="accordion-inner">
                        <p>
                          Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                        </p>
                        <p>
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                        </p>
                        <p>
                          Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                        </p>
                        <p>
                          <a  class="btn blue" href="ui_tabs_accordions.html#collapse_2" target="_blank">Activate this section via URL</a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3">
                      <i class="icon-angle-left"></i>
                      Collapsible Group Item #3
                      </a>
                    </div>
                    <div id="collapse_3" class="accordion-body collapse">
                      <div class="accordion-inner">
                        <p>
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                        </p>
                        <p>
                          Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                        </p>
                        <p>
                          <a  class="btn green" href="ui_tabs_accordions.html#collapse_3" target="_blank">Activate this section via URL</a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4">
                      <i class="icon-angle-left"></i>
                      Collapsible Group Item #4
                      </a>
                    </div>
                    <div id="collapse_4" class="accordion-body collapse">
                      <p>
                        Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                      </p>
                      <p>
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                      </p>
                      <p>
                        Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                      </p>
                      <p>
                        <a  class="btn red" href="ui_tabs_accordions.html#collapse_4" target="_blank">Activate this section via URL</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END ACCORDION PORTLET-->
          </div>
          <div class="span6">
            <!-- BEGIN ACCORDION PORTLET-->
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Scrollable Accordions</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="accordion scrollable" id="accordion2">
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_1">
                      <i class="icon-angle-left"></i>
                      Collapsible Group Item #1
                      </a>
                    </div>
                    <div id="collapse_2_1" class="accordion-body collapse in">
                      <div class="accordion-inner">
                        <p>
                          Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                        </p>
                        <p>
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_2">
                      <i class="icon-angle-left"></i>
                      Collapsible Group Item #2
                      </a>
                    </div>
                    <div id="collapse_2_2" class="accordion-body collapse">
                      <div class="accordion-inner">
                        <p>
                          Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                        </p>
                        <p>
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                        </p>
                        <p>
                          Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                        </p>
                        <p>
                          <a  class="btn green" href="ui_tabs_accordions.html#collapse_2_2" target="_blank">Activate this section via URL</a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_3">
                      <i class="icon-angle-left"></i>
                      Collapsible Group Item #3
                      </a>
                    </div>
                    <div id="collapse_2_3" class="accordion-body collapse">
                      <div class="accordion-inner">
                        <p>
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                        </p>
                        <p>
                          Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                        </p>
                        <p>
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                        </p>
                        <p>
                          <a  class="btn blue" href="ui_tabs_accordions.html#collapse_2_3" target="_blank">Activate this section via URL</a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_4">
                      <i class="icon-angle-left"></i>
                      Collapsible Group Item #4
                      </a>
                    </div>
                    <div id="collapse_2_4" class="accordion-body collapse">
                      <div class="accordion-inner">
                        <p>
                          Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                        </p>
                        <p>
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                        </p>
                        <p>
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                        </p>
                        <p>
                          <a  class="btn red" href="ui_tabs_accordions.html#collapse_2_4" target="_blank">Activate this section via URL</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END ACCORDION PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
