@php
$datas['layoutDatas'] = [
    'viewCode' => '',
    'bodyClass' => 'page-header-fixed page-full-width',
    'footerView' => 'no',
    'onlyContent' => true,
];
@endphp
@extends('layouts.metronic-simple')
@section('content')
  @include('metronicsource.elems._header-home', ['datas' => $datas])
  <!-- BEGIN CONTAINER -->
  <div class="page-container row-fluid" >
    @include('metronicsource.elems._sidebar-home', ['datas' => $datas])

    <!-- BEGIN PAGE -->
    <div class="page-content">
      <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <div id="portlet-config" class="modal hide">
        <div class="modal-header">
          <button data-dismiss="modal" class="close" type="button"></button>
          <h3>portlet Settings</h3>
        </div>
        <div class="modal-body">
          <p>Here will be a configuration form</p>
        </div>
      </div>
      <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <!-- BEGIN PAGE CONTAINER-->
      <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN STYLE CUSTOMIZER -->
            <div class="color-panel hidden-phone">
              <div class="color-mode-icons icon-color"></div>
              <div class="color-mode-icons icon-color-close"></div>
              <div class="color-mode">
                <p>THEME COLOR</p>
                <ul class="inline">
                  <li class="color-black current color-default" data-style="default"></li>
                  <li class="color-blue" data-style="blue"></li>
                  <li class="color-brown" data-style="brown"></li>
                  <li class="color-purple" data-style="purple"></li>
                  <li class="color-grey" data-style="grey"></li>
                  <li class="color-white color-light" data-style="light"></li>
                </ul>
                <label>
                  <span>Layout</span>
                  <select class="layout-option m-wrap small">
                    <option value="fluid" selected>Fluid</option>
                    <option value="boxed">Boxed</option>
                  </select>
                </label>
                <label>
                  <span>Header</span>
                  <select class="header-option m-wrap small">
                    <option value="fixed" selected>Fixed</option>
                    <option value="default">Default</option>
                  </select>
                </label>
                <label>
                  <span>Sidebar</span>
                  <select class="sidebar-option m-wrap small">
                    <option value="fixed">Fixed</option>
                    <option value="default" selected>Default</option>
                  </select>
                </label>
                <label>
                  <span>Footer</span>
                  <select class="footer-option m-wrap small">
                    <option value="fixed">Fixed</option>
                    <option value="default" selected>Default</option>
                  </select>
                </label>
              </div>
            </div>
            <!-- END BEGIN STYLE CUSTOMIZER -->
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
              Horzontal Menu 1 <small>horizontal menu layout</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
              </li>
              <li>
                <a href="#">Layouts</a>
                <i class="icon-angle-right"></i>
              </li>
              <li><a href="#">Horzontal Menu 1</a></li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
          </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid margin-bottom-20">
          <div class="span12">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>
          </div>
        </div>
        <div class="row-fluid">
          <div class="span6">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Simple Table</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th class="hidden-480">Username</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td class="hidden-480">makr124</td>
                      <td><span class="label label-success">Approved</span></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Jacob</td>
                      <td>Nilson</td>
                      <td class="hidden-480">jac123</td>
                      <td><span class="label label-info">Pending</span></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Larry</td>
                      <td>Cooper</td>
                      <td class="hidden-480">lar</td>
                      <td><span class="label label-warning">Suspended</span></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Sandy</td>
                      <td>Lim</td>
                      <td class="hidden-480">sanlim</td>
                      <td><span class="label label-danger">Blocked</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
          </div>
          <div class="span6">
            <!-- BEGIN BORDERED TABLE PORTLET-->
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-coffee"></i>Bordered Table</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th class="hidden-480">Username</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td class="hidden-480">makr124</td>
                      <td><span class="label label-success">Approved</span></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Jacob</td>
                      <td>Nilson</td>
                      <td class="hidden-480">jac123</td>
                      <td><span class="label label-info">Pending</span></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Larry</td>
                      <td>Cooper</td>
                      <td class="hidden-480">lar</td>
                      <td><span class="label label-warning">Suspended</span></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Sandy</td>
                      <td>Lim</td>
                      <td class="hidden-480">sanlim</td>
                      <td><span class="label label-danger">Blocked</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END BORDERED TABLE PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
      <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
  </div>
  <!-- END CONTAINER -->
  <!-- BEGIN FOOTER -->
  <div class="footer">
    <div class="footer-inner">
      2013 &copy; Metronic by keenthemes.
    </div>
    <div class="footer-tools">
      <span class="go-top">
      <i class="icon-angle-up"></i>
      </span>
    </div>
  </div>
@endsection
