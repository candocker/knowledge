@php $datas['layoutDatas'] = ['viewCode' => 'email', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <div class="mail-template">
              <h4>Marketing Email Templates</h4>
              <ul class="inline">
                <li class="color-black tooltips" data-original-title="Click to preview the template" ><a href="email1.html" target="_blank">&nbsp;</a></li>
                <li class="color-darkblue tooltips" data-original-title="Click to preview the template"><a href="email2.html" target="_blank">&nbsp;</a></li>
                <li class="color-lightblue tooltips" data-original-title="Click to preview the template"><a href="email3.html" target="_blank">&nbsp;</a></li>
                <li class="color-red tooltips" data-original-title="Click to preview the template"><a href="email4.html" target="_blank">&nbsp;</a></li>
                <li class="color-green tooltips" data-original-title="Click to preview the template"><a href="email5.html" target="_blank">&nbsp;</a></li>
              </ul>
            </div>
            <div class="mail-template">
              <h4>System Email Template</h4>
              <ul class="inline">
                <li class="color-black tooltips" data-original-title="Click to preview the template"><a href="email6.html" target="_blank">&nbsp;</a></li>
              </ul>
            </div>
            <!--end span9-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
