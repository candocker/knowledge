@php $datas['layoutDatas'] = ['viewCode' => 'uigeneral', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN ALERTS PORTLET-->
            <div class="portlet ">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Alerts</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Warning!</strong> Your monthly traffic is reaching limit.
                </div>
                <div class="alert alert-success">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success!</strong> The page has been added.
                </div>
                <div class="alert alert-info">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Info!</strong> You have 198 unread messages.
                </div>
                <div class="alert alert-error">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Error!</strong> The daily cronjob has failed.
                </div>
              </div>
            </div>
            <!-- END ALERTS PORTLET-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span6">
            <!-- BEGIN INLINE NOTIFICATIONS PORTLET-->
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Inline Notifications</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload hidden-phone"></a>
                  <a href="javascript:;" class="remove hidden-phone"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="alert alert-block alert-error fade in">
                  <button type="button" class="close" data-dismiss="alert"></button>
                  <h4 class="alert-heading">Error!</h4>
                  <p>
                    Duis mollis, est non commodo luctus,
                    nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                  </p>
                  <p>
                    <a class="btn red" href="#">Do this</a> <a class="btn blue" href="#">Or do this</a>
                  </p>
                </div>
                <div class="alert alert-block alert-success fade in">
                  <button type="button" class="close" data-dismiss="alert"></button>
                  <h4 class="alert-heading">Success!</h4>
                  <p>
                    Duis mollis, est non commodo luctus,
                    nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                  </p>
                  <p>
                    <a class="btn green" href="#">Do this</a> <a class="btn black" href="#">Or do this</a>
                  </p>
                </div>
                <div class="alert alert-block alert-info fade in">
                  <button type="button" class="close" data-dismiss="alert"></button>
                  <h4 class="alert-heading">Info!</h4>
                  <p>
                    Duis mollis, est non commodo luctus,
                    nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                  </p>
                  <p>
                    <a class="btn purple" href="#">Do this</a> <a class="btn black" href="#">Or do this</a>
                  </p>
                </div>
                <div class="alert alert-block alert-warning fade in">
                  <button type="button" class="close" data-dismiss="alert"></button>
                  <h4 class="alert-heading">Warning!</h4>
                  <p>
                    Duis mollis, est non commodo luctus,
                    nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                  </p>
                  <p>
                    <a class="btn red" href="#">Do this</a> <a class="btn blue" href="#">Or do this</a>
                  </p>
                </div>
              </div>
            </div>
            <!-- END INLINE NOTIFICATIONS PORTLET-->
            <!-- BEGIN GRITTER NOTIFICATIONS PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Gritter Notifications</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload hidden-phone"></a>
                  <a href="javascript:;" class="remove hidden-phone"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h5>Click on below buttons to check it out.</h5>
                <p>
                  <a href="javascript:;" class="btn " id="gritter-regular">Regular</a>
                  <a href="javascript:;" class="btn green" id="gritter-sticky">Sticky</a>
                  <a href="javascript:;" class="btn blue" id="gritter-without-image">Imageless</a>
                </p>
                <p>
                  <a href="javascript:;" class="btn purple" id="gritter-light">Light</a>
                  <a href="javascript:;" class="btn black" id="gritter-max">Max of 3</a>
                  <a href="javascript:;" class="btn blue" id="gritter-remove-all">Remove all</a>
                </p>
              </div>
            </div>
            <!-- END GRITTER NOTIFICATIONS PORTLET-->
            <!-- BEGIN PULSATE PORTLET-->
            <div class="portlet box grey">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Pulsate</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h5>Pulsate any page elements.</h5>
                <div id="pulsate-regular" style="padding:5px;">
                  Repeating Pulsate
                </div>
                <div class="space20"></div>
                <button class="btn green" id="pulsate-once">Pulsate Once</button>
                <button class="btn red" id="pulsate-crazy">Crazy Pulsate :)</button>
                <div class="space10"></div>
                <span class="label label-important">NOTE!</span>
                <span>
                Pulsate is
                supported in Latest Firefox, Chrome, Opera,
                Safari and Internet Explorer 9 and Internet Explorer 10 only.
                </span>
              </div>
            </div>
            <!-- END PULSATE PORTLET-->
            <!-- BEGIN MODAL DIALOG PORTLET-->
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Modal Dialogs</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h5>Click on below buttons to check it out.</h5>
                <!-- Button to trigger modal -->
                <a href="#myModal1" role="button" class="btn btn-primary" data-toggle="modal">Modal Dialog</a>
                <a href="#myModal2" role="button" class="btn btn-danger" data-toggle="modal">Alert</a>
                <a href="#myModal3" role="button" class="btn btn-warning" data-toggle="modal">Confirm</a>
                <!-- Modal -->
                <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h3 id="myModalLabel1">Modal Header</h3>
                  </div>
                  <div class="modal-body">
                    <p>Body goes here...</p>
                  </div>
                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn yellow">Save</button>
                  </div>
                </div>
                <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h3 id="myModalLabel2">Alert Header</h3>
                  </div>
                  <div class="modal-body">
                    <p>Body goes here...</p>
                  </div>
                  <div class="modal-footer">
                    <button data-dismiss="modal" class="btn green">OK</button>
                  </div>
                </div>
                <div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h3 id="myModalLabel3">Confirm Header</h3>
                  </div>
                  <div class="modal-body">
                    <p>Body goes here...</p>
                  </div>
                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button data-dismiss="modal" class="btn blue">Confirm</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- END MODAL DIALOG PORTLET-->
            <!-- BEGIN TOOLTIPS PORTLET-->
            <div class="portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Tooltips</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <p>
                  Tight pants next level keffiyeh
                  <a href="#" class="tooltips" data-original-title="Default tooltip">you probably</a>
                  haven't heard of them.
                  Photo booth beard raw denim letterpress vegan messenger bag stumptown. Farm-to-table seitan, mcsweeney's fixie sustainable quinoa 8-bit american apparel
                  <a href="#" class="tooltips" data-original-title="Another tooltip">have a</a>
                  terry richardson vinyl chambray.
                  <a href="#" class="tooltips" title="12" data-original-title="The last tip!">twitter handle</a>
                  freegan cred raw denim single-origin coffee viral.
                </p>
                <p>
                  <button class="btn tooltips" data-placement="top" data-original-title="Tooltip in top">Top</button>
                  <button class="btn tooltips" data-placement="left" data-original-title="Tooltip in left">Left</button>
                  <button class="btn tooltips" data-placement="right" data-original-title="Tooltip in right">Right</button>
                  <button class="btn tooltips" data-placement="bottom" data-original-title="Tooltip in bottom">Bottom</button>
                </p>
              </div>
            </div>
            <!-- END TOOLTIPS PORTLET-->
            <!-- BEGIN POPOVERS PORTLET-->
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Popovers</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <p>
                  Tight pants next level keffiyeh
                  <a href="javascript:;" class="popovers" data-content="Popover body goes here! Popover body goes here!" data-original-title="Default Popover">trigger me on click</a> haven't heard of them.
                  Photo booth beard raw denim letterpress vegan messenger bag stumptown. Farm-to-table seitan, mcsweeney's fixie sustainable quinoa 8-bit american apparel
                  <a href="javascript:;" class="popovers" data-trigger="hover" data-content="Popover body goes here! Popover body goes here!" data-original-title="Another Popover">trigger me on hover</a>
                  terry richardson vinyl chambray. Beard stumptown, cardigans banh mi lomo thundercats. Tofu biodiesel williamsburg marfa.
                </p>
                <p>
                  <button class="btn popovers" id="test" data-trigger="hover" data-placement="top" data-content="Popover body goes here! Popover body goes here!" data-original-title="Popover in top">Top</button>
                  <button class="btn popovers" data-trigger="hover" data-placement="left" data-content="Popover body goes here! Popover body goes here!" data-original-title="Popover in left">Left</button>
                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Popover body goes here! Popover body goes here!" data-original-title="Popover in right">Right</button>
                  <button class="btn popovers" data-trigger="hover" data-placement="bottom" data-content="Popover body goes here! Popover body goes here!" data-original-title="Popover in bottom">Bottom</button>
                </p>
              </div>
            </div>
            <!-- END POPOVERS PORTLET-->
          </div>
          <div class="span6">
            <!-- BEGIN PROGRESS BARS PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Popovers</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="alert">
                  Progress bars use CSS3 gradients, transitions, and animations to achieve all their effects. These features are not supported in IE7-9 or older versions of Firefox. Versions earlier than Internet Explorer 10 and Opera 12 do not support animations.
                </div>
                <h3>Basic</h3>
                <div class="progress">
                  <div style="width: 60%;" class="bar"></div>
                </div>
                <div class="progress progress-success">
                  <div style="width: 60%;" class="bar"></div>
                </div>
                <div class="progress progress-warning">
                  <div style="width: 60%;" class="bar"></div>
                </div>
                <div class="progress progress-danger">
                  <div style="width: 60%;" class="bar"></div>
                </div>
                <h3>Striped</h3>
                <div class="progress progress-striped">
                  <div style="width: 60%;" class="bar"></div>
                </div>
                <div class="progress progress-striped progress-success">
                  <div style="width: 60%;" class="bar"></div>
                </div>
                <div class="progress progress-striped progress-warning">
                  <div style="width: 60%;" class="bar"></div>
                </div>
                <div class="progress progress-striped progress-danger">
                  <div style="width: 60%;" class="bar"></div>
                </div>
                <h3>Animated</h3>
                <div class="progress progress-striped active">
                  <div style="width: 60%;" class="bar"></div>
                </div>
                <div class="progress progress-striped progress-success active">
                  <div style="width: 60%;" class="bar"></div>
                </div>
                <div class="progress progress-striped progress-warning active">
                  <div style="width: 60%;" class="bar"></div>
                </div>
                <div class="progress progress-striped progress-danger active">
                  <div style="width: 60%;" class="bar"></div>
                </div>
                <h3>Stacked</h3>
                <div class="progress">
                  <div class="bar bar-success" style="width: 35%;"></div>
                  <div class="bar bar-warning" style="width: 20%;"></div>
                  <div class="bar bar-danger" style="width: 10%;"></div>
                </div>
              </div>
            </div>
            <!-- END PROGRESS BARS PORTLET-->
            <!-- BEGIN LABELS AND BADGES PORTLET-->
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Labels and Badges</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Labels</th>
                      <th>Badges</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        Default
                      </td>
                      <td>
                        <span class="badge">1</span>
                      </td>
                      <td>
                        <span class="label">Default</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Success
                      </td>
                      <td>
                        <span class="badge badge-success">2</span>
                      </td>
                      <td>
                        <span class="label label-success">Success</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Warning
                      </td>
                      <td>
                        <span class="badge badge-warning">4</span>
                      </td>
                      <td>
                        <span class="label label-warning">Warning</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Important
                      </td>
                      <td>
                        <span class="badge badge-important">6</span>
                      </td>
                      <td>
                        <span class="label label-important">Important</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Info
                      </td>
                      <td>
                        <span class="badge badge-info">8</span>
                      </td>
                      <td>
                        <span class="label label-info">Info</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Inverse
                      </td>
                      <td>
                        <span class="badge badge-inverse">10</span>
                      </td>
                      <td>
                        <span class="label label-inverse">Inverse</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END LABELS AND BADGES PORTLET-->
            <!-- BEGIN PAGINATION PORTLET-->
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Pagination</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="pagination pagination-large">
                  <ul>
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                  </ul>
                </div>
                <div class="pagination">
                  <ul>
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">»</a></li>
                  </ul>
                </div>
                <div class="pagination pagination-small">
                  <ul>
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">»</a></li>
                  </ul>
                </div>
                <div class="pagination pagination-mini">
                  <ul>
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">»</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- END PAGINATION PORTLET-->
            <!-- BEGIN PAGINATION PORTLET-->
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Dynamic Pagination</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div>
                  <h4>Basic Pagination</h4>
                  <p id="dynamic_pager_content1" class="well">Page 1 content here</p>
                  <p id="dynamic_pager_demo1" class="pagination"></p>
                </div>
                <hr>
                <div>
                  <h4>Advance Pagination</h4>
                  <p id="dynamic_pager_content2" class="well">Page 1 content here</p>
                  <p id="dynamic_pager_demo2" class="pagination"></p>
                </div>
              </div>
            </div>
            <!-- END PAGINATION PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
