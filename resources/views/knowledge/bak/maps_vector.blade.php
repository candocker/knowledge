@php $datas['layoutDatas'] = ['viewCode' => 'vector', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span6">
            <!-- BEGIN WORLD PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>World</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div id="vmap_world" class="vmaps"></div>
              </div>
            </div>
            <!-- END WORLD PORTLET-->
          </div>
          <div class="span6">
            <!-- BEGIN USA PORTLET-->
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>USA</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div id="vmap_usa" class="vmaps "></div>
              </div>
            </div>
            <!-- END USA PORTLET-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span6">
            <!-- BEGIN EUROPE PORTLET-->
            <div class="portlet box grey">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Europe</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div id="vmap_europe" class="vmaps"></div>
              </div>
            </div>
            <!-- END EUROPE PORTLET-->
          </div>
          <div class="span6">
            <!-- BEGIN RUSSIA PORTLET-->
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Russia</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div id="vmap_russia" class="vmaps "></div>
              </div>
            </div>
            <!-- END RUSSIA PORTLET-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span6">
            <!-- BEGIN GERMANY PORTLET-->
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Germany</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div id="vmap_germany" class="vmaps"></div>
              </div>
            </div>
            <!-- END GERMANY PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
