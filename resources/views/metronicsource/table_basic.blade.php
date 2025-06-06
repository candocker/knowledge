@php $datas['layoutDatas'] = ['viewCode' => 'table', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
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
        <div class="row-fluid">
          <div class="span6">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-comments"></i>Striped Table</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <table class="table table-striped table-hover">
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
            <!-- BEGIN CONDENSED TABLE PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-picture"></i>Condensed Table</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <table class="table table-condensed table-hover">
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
                    <tr>
                      <td>4</td>
                      <td>Sandy</td>
                      <td>Lim</td>
                      <td class="hidden-480">sanlim</td>
                      <td><span class="label label-danger">Blocked</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END CONDENSED TABLE PORTLET-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span6">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption"><i class="icon-bell"></i>Advance Table</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                  <thead>
                    <tr>
                      <th><i class="icon-briefcase"></i> Company</th>
                      <th class="hidden-phone"><i class="icon-user"></i> Contact</th>
                      <th><i class="icon-shopping-cart"></i> Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="highlight">
                        <div class="success"></div>
                        <a href="#">RedBull</a>
                      </td>
                      <td class="hidden-phone">Mike Nilson</td>
                      <td>2560.60$</td>
                      <td><a href="#" class="btn mini purple"><i class="icon-edit"></i> Edit</a></td>
                    </tr>
                    <tr>
                      <td class="highlight">
                        <div class="info"></div>
                        <a href="#">Google</a>
                      </td>
                      <td class="hidden-phone">Adam Larson</td>
                      <td>560.60$</td>
                      <td><a href="#" class="btn mini black"><i class="icon-trash"></i> Delete</a></td>
                    </tr>
                    <tr>
                      <td class="highlight">
                        <div class="important"></div>
                        <a href="#">Apple</a>
                      </td>
                      <td class="hidden-phone">Daniel Kim</td>
                      <td>3460.60$</td>
                      <td><a href="#" class="btn mini purple"><i class="icon-edit"></i> Edit</a></td>
                    </tr>
                    <tr>
                      <td class="highlight">
                        <div class="warning"></div>
                        <a href="#">Microsoft</a>
                      </td>
                      <td class="hidden-phone">Nick </td>
                      <td>2560.60$</td>
                      <td><a href="#" class="btn mini blue"><i class="icon-share"></i> Share</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
          </div>
          <div class="span6">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption"><i class="icon-shopping-cart"></i>Advance Table</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                  <thead>
                    <tr>
                      <th><i class="icon-briefcase"></i> From</th>
                      <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                      <th><i class="icon-bookmark"></i> Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="#">Pixel Ltd</a></td>
                      <td class="hidden-phone">Server hardware purchase</td>
                      <td>52560.10$ <span class="label label-success label-mini">Paid</span></td>
                      <td><a href="#" class="btn mini green-stripe">View</a></td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#">
                        Smart House
                        </a>
                      </td>
                      <td class="hidden-phone">Office furniture purchase</td>
                      <td>5760.00$ <span class="label label-warning label-mini">Pending</span></td>
                      <td><a href="#" class="btn mini blue-stripe">View</a></td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#">
                        FoodMaster Ltd
                        </a>
                      </td>
                      <td class="hidden-phone">Company Anual Dinner Catering</td>
                      <td>12400.00$ <span class="label label-success label-mini">Paid</span></td>
                      <td><a href="#" class="btn mini blue-stripe">View</a></td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#">
                        WaterPure Ltd
                        </a>
                      </td>
                      <td class="hidden-phone">Payment for Jan 2013</td>
                      <td>610.50$ <span class="label label-danger label-mini">Overdue</span></td>
                      <td><a href="#" class="btn mini red-stripe">View</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
