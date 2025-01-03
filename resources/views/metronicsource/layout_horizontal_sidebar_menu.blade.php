@php
$datas['layoutDatas'] = [
    'viewCode' => '',
    'bodyClass' => 'page-header-fixed',
    'footerView' => 'no',
    'onlyContent' => true,
];
@endphp
@extends('layouts.metronic-simple')
@section('content')
  @include('metronicsource.elems._header', ['datas' => $datas])
  <!-- BEGIN CONTAINER -->
  <div class="page-container row-fluid" >
    @include('metronicsource.elems._sidebar', ['datas' => $datas])
    <!-- BEGIN PAGE -->
    <div class="page-content">
      @include('metronicsource.elems._modal', ['datas' => $datas])
      <!-- BEGIN PAGE CONTAINER-->
      <div class="container-fluid">
        @include('metronicsource.elems._breadcrumb', ['datas' => $datas])
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
            <div class="portlet box blue">
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
  @include('metronicsource.elems._footer', ['datas' => $datas])
@endsection
