@php $datas['layoutDatas'] = ['viewCode' => 'tableEditable', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-edit"></i>Editable Table</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="clearfix">
                  <div class="btn-group">
                    <button id="sample_editable_1_new" class="btn green">
                    Add New <i class="icon-plus"></i>
                    </button>
                  </div>
                  <div class="btn-group pull-right">
                    <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right">
                      <li><a href="#">Print</a></li>
                      <li><a href="#">Save as PDF</a></li>
                      <li><a href="#">Export to Excel</a></li>
                    </ul>
                  </div>
                </div>
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Full Name</th>
                      <th>Points</th>
                      <th>Notes</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="">
                      <td>alex</td>
                      <td>Alex Nilson</td>
                      <td>1234</td>
                      <td class="center">power user</td>
                      <td><a class="edit" href="javascript:;">Edit</a></td>
                      <td><a class="delete" href="javascript:;">Delete</a></td>
                    </tr>
                    <tr class="">
                      <td>lisa</td>
                      <td>Lisa Wong</td>
                      <td>434</td>
                      <td class="center">new user</td>
                      <td><a class="edit" href="javascript:;">Edit</a></td>
                      <td><a class="delete" href="javascript:;">Delete</a></td>
                    </tr>
                    <tr class="">
                      <td>nick12</td>
                      <td>Nick Roberts</td>
                      <td>232</td>
                      <td class="center">power user</td>
                      <td><a class="edit" href="javascript:;">Edit</a></td>
                      <td><a class="delete" href="javascript:;">Delete</a></td>
                    </tr>
                    <tr class="">
                      <td>goldweb</td>
                      <td>Sergio Jackson</td>
                      <td>132</td>
                      <td class="center">elite user</td>
                      <td><a class="edit" href="javascript:;">Edit</a></td>
                      <td><a class="delete" href="javascript:;">Delete</a></td>
                    </tr>
                    <tr class="">
                      <td>webriver</td>
                      <td>Antonio Sanches</td>
                      <td>462</td>
                      <td class="center">new user</td>
                      <td><a class="edit" href="javascript:;">Edit</a></td>
                      <td><a class="delete" href="javascript:;">Delete</a></td>
                    </tr>
                    <tr class="">
                      <td>gist124</td>
                      <td>Nick Roberts</td>
                      <td>62</td>
                      <td class="center">new user</td>
                      <td><a class="edit" href="javascript:;">Edit</a></td>
                      <td><a class="delete" href="javascript:;">Delete</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT -->
      </div>
@endsection
