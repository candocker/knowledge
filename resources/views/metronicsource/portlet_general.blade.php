@php $datas['layoutDatas'] = ['viewCode' => '', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span4 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box grey">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet1</div>
                <div class="actions">
                  <a href="#" class="btn yellow mini"><i class="icon-pencil"></i> Edit</a>
                  <a href="#" class="btn green mini"><i class="icon-plus"></i> Add</a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="scroller" data-height="200px">
                  <strong>Scroll is hidden</strong><br />
                  Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                  consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                </div>
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
          <div class="span4 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet2</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                </div>
                <div class="actions">
                  <a href="#" class="btn blue mini"><i class="icon-pencil"></i> Edit</a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="scroller" data-height="200px" data-always-visible="1">
                  <strong>Scroll is always visible</strong><br />
                  Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                </div>
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
          <div class="span4 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet3</div>
                <div class="actions">
                  <a href="#" class="btn blue"><i class="icon-pencil"></i> Edit</a>
                  <div class="btn-group">
                    <a class="btn green" href="#" data-toggle="dropdown">
                    <i class="icon-user"></i> User
                    <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                      <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                      <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                      <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="i"></i> Make admin</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="portlet-body">
                <div class="scroller" data-height="200px" data-always-visible="1" data-rail-visible="1">
                  <strong>Scroll and rail are always visible</strong><br />
                  Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                </div>
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span6 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="actions">
                  <a href="#" class="btn yellow"><i class="icon-pencil"></i> Edit</a>
                  <a href="#" class="btn green"><i class="icon-plus"></i> Add</a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="scroller" data-height="200px">
                  <strong>Scroll is hidden</strong><br />
                  Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                  consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                </div>
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
          <div class="span6 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="pagination pagination-small">
                  <ul>
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                  </ul>
                </div>
              </div>
              <div class="portlet-body">
                <div class="scroller" data-height="200px">
                  <strong>Scroll is hidden</strong><br />
                  Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                  consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                </div>
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span6 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet solid blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="actions">
                  <a href="#" class="btn grey mini"><i class="icon-pencil icon-black"></i> Edit</a>
                  <div class="btn-group">
                    <a class="btn mini red" href="#" data-toggle="dropdown">
                    <i class="icon-user"></i> User
                    <i class="icon-angle-down "></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                      <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                      <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                      <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="i"></i> Make admin</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.nisi erat porttitor ligula, eget lacinia odio sem nec elit. nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum
              </div>
            </div>
            <!-- END GRID PORTLET-->
          </div>
          <div class="span6 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box blue tabbable">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
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
                        Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.ut laoreet dolore magna ut laoreet dolore magna. ut laoreet dolore magna.
                        ut laoreet dolore magna.
                      </p>
                    </div>
                    <div class="tab-pane" id="portlet_tab2">
                      <p>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo.
                      </p>
                    </div>
                    <div class="tab-pane" id="portlet_tab3">
                      <p>
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row-fluid">
          <div class="span12 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet solid purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="actions">
                  <a href="#" class="btn blue mini"><i class="icon-pencil"></i> Edit</a>
                  <div class="btn-group">
                    <a class="btn mini green" href="#" data-toggle="dropdown">
                    <i class="icon-user"></i> User
                    <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                      <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                      <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                      <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="i"></i> Make admin</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="portlet-body">
                <div class="scroller" data-height="200px">
                  <p>
                    Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                  </p>
                  <p>
                    Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                  </p>
                  <p>
                    Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                  </p>
                </div>
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span3 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box grey">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
          <div class="span3 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
          <div class="span3 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
          <div class="span3 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Collapsed</div>
                <div class="tools">
                  <a href="javascript:;" class="expand"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body hide">
                <strong>Default Collapsed Portlet</strong>
                <p>
                  Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                </p>
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span4 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="actions">
                  <a href="#" class="btn grey mini"><i class="icon-share icon-black"></i> Share</a>
                  <div class="btn-group">
                    <a class="btn mini red" href="#" data-toggle="dropdown">
                    <i class="icon-user"></i> User
                    <i class="icon-angle-down "></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                      <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                      <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                      <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="i"></i> Make admin</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis.
              </div>
            </div>
          </div>
          <div class="span8 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="actions">
                  <a href="#" class="btn blue mini"><i class="icon-share"></i> Share</a>
                  <div class="btn-group">
                    <a class="btn mini purple" href="#" data-toggle="dropdown">
                    <i class="icon-user"></i> User
                    <i class="icon-angle-down "></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                      <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                      <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                      <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="i"></i> Make admin</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span7 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
          <div class="span5 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Collapsed</div>
                <div class="tools">
                  <a href="javascript:;" class="expand"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body hide">
                <strong>Default Collapsed</strong>
                <p>
                  Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                </p>
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
