@php $datas['layoutDatas'] = ['viewCode' => 'errorbase', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12 page-500">
            <div class=" number">
              500
            </div>
            <div class=" details">
              <h3>Opps, Something went wrong.</h3>
              <p>
                We are fixing it!<br />
                Please come back in a while.<br /><br />
              </p>
            </div>
          </div>
        </div>
      </div>
@endsection
