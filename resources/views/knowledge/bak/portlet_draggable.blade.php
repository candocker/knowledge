@php $datas['layoutDatas'] = ['viewCode' => 'draggable', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid" id="sortable_portlets">
          <div class="span4 column sortable">
            <!-- BEGIN Portlet PORTLET-->
            <div class=" portlet box grey">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="actions">
                  <a href="#" class="btn yellow mini"><i class="icon-pencil"></i> Edit</a>
                  <a href="#" class="btn green mini"><i class="icon-plus"></i> Add</a>
                </div>
              </div>
              <div class="portlet-body">
                <div>
                  Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                  Cras mattis consectetur purus sit amet fermentum. Duis mollis.
                </div>
              </div>
            </div>
            <!-- END Portlet PORTLET-->
            <!-- BEGIN Portlet PORTLET-->
            <div class=" portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="actions">
                  <a href="#" class="btn yellow mini"><i class="icon-pencil"></i> Edit</a>
                  <a href="#" class="btn green mini"><i class="icon-plus"></i> Add</a>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                Cras mattis consectetur purus sit amet fermentum. Duis mollis.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
            <!-- BEGIN Portlet PORTLET-->
            <div class=" portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="actions">
                  <a href="#" class="btn yellow mini"><i class="icon-pencil"></i> Edit</a>
                  <a href="#" class="btn green mini"><i class="icon-plus"></i> Add</a>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                Cras mattis consectetur purus sit amet fermentum. Duis mollis.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
          <div class="span4 column sortable">
            <!-- BEGIN Portlet PORTLET-->
            <div class=" portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                </div>
                <div class="actions">
                  <a href="#" class="btn blue mini"><i class="icon-pencil"></i> Edit</a>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                Cras mattis consectetur purus sit amet fermentum.Duis mollis.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                </div>
                <div class="actions">
                  <a href="#" class="btn blue mini"><i class="icon-pencil"></i> Edit</a>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                Cras mattis consectetur purus sit amet fermentum.Duis mollis.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
            <!-- BEGIN Portlet PORTLET-->
            <div class=" portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="actions">
                  <a href="#" class="btn yellow mini"><i class="icon-pencil"></i> Edit</a>
                  <a href="#" class="btn green mini"><i class="icon-plus"></i> Add</a>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                Cras mattis consectetur purus sit amet fermentum. Duis mollis.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
          <div class="span4 column sortable">
            <!-- BEGIN Portlet PORTLET-->
            <div class=" portlet box yellow">
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
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                Cras mattis consectetur purus sit amet fermentum. Duis mollis.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
            <!-- BEGIN Portlet PORTLET-->
            <div class=" portlet box red">
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
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentumDuis mollis, est non commodo luctus.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
            <!-- BEGIN Portlet PORTLET-->
            <div class=" portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Portlet</div>
                <div class="actions">
                  <a href="#" class="btn yellow mini"><i class="icon-pencil"></i> Edit</a>
                  <a href="#" class="btn green mini"><i class="icon-plus"></i> Add</a>
                </div>
              </div>
              <div class="portlet-body">
                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                Cras mattis consectetur purus sit amet fermentum. Duis mollis.
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
