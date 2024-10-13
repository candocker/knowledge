@php $datas['layoutDatas'] = ['viewCode' => 'dropzone', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <p>
              <span class="label label-important">NOTE:</span>&nbsp;
              This plugins works only on Latest Chrome, Firefox, Safari, Opera & Internet Explorer 10.
            </p>
            <form action="assets/plugins/dropzone/upload.php" class="dropzone" id="my-awesome-dropzone"></form>
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
