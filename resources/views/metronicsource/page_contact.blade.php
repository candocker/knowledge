@php $datas['layoutDatas'] = ['viewCode' => 'contact', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <!-- Google Map -->
            <div class="row-fluid">
              <div id="map" class="gmaps margin-bottom-40" style="height:400px;"></div>
            </div>
            <div class="row-fluid margin-bottom-20">
              <div class="span6">
                <div class="space20"></div>
                <h3 class="form-section">Contacts</h3>
                <p>Lorem ipsum dolor sit amet, Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                <div class="well">
                  <h4>Address</h4>
                  <address>
                    <strong>Loop, Inc.</strong><br>
                    795 Park Ave, Suite 120<br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">P:</abbr> (234) 145-1810
                  </address>
                  <address>
                    <strong>Email</strong><br>
                    <a href="mailto:#">first.last@email.com</a>
                  </address>
                  <ul class="social-icons margin-bottom-10">
                    <li><a href="#" data-original-title="facebook" class="facebook"></a></li>
                    <li><a href="#" data-original-title="github" class="github"></a></li>
                    <li><a href="#" data-original-title="Goole Plus" class="googleplus"></a></li>
                    <li><a href="#" data-original-title="linkedin" class="linkedin"></a></li>
                    <li><a href="#" data-original-title="rss" class="rss"></a></li>
                    <li><a href="#" data-original-title="skype" class="skype"></a></li>
                    <li><a href="#" data-original-title="twitter" class="twitter"></a></li>
                    <li><a href="#" data-original-title="youtube" class="youtube"></a></li>
                  </ul>
                </div>
              </div>
              <div class="span6">
                <div class="space20"></div>
                <!-- BEGIN FORM-->
                <form action="#" class="horizontal-form">
                  <h3 class="form-section">Feedback Form</h3>
                  <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                      <input type="text" class="m-wrap span12" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" >Email</label>
                    <div class="controls">
                      <input type="text" class="m-wrap span12" >
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" >Nessage</label>
                    <div class="controls">
                      <textarea class="m-wrap span12" rows="3"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn blue"><i class="icon-ok"></i> Send</button>
                  <button type="button" class="btn">Cancel</button>
                </form>
                <!-- END FORM-->
              </div>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
