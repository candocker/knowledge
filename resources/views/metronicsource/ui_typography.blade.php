@php $datas['layoutDatas'] = ['viewCode' => '', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span8">
            <div>
              <!-- BEGIN GENERAL PORTLET-->
              <div class="portlet">
                <div class="portlet-title">
                  <div class="caption"><i class="icon-reorder"></i>General</div>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="portlet-body">
                  <div class="row-fluid">
                    <div class="span6">
                      <h3>Sample text with lead body</h3>
                      <p class="lead">
                        Lead body. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      </p>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. Nulla tellus elit, varius non commodo eget, mattis vel eros. In sed ornare nulla.
                      </p>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. Nulla tellus elit, varius non commodo eget, mattis vel eros. In sed ornare nulla.
                      </p>
                    </div>
                    <div class="span6">
                      <h3>Sample text</h3>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. Nulla tellus elit, varius non commodo eget, mattis vel eros. In sed ornare nulla.
                      </p>
                      <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                      <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec sed odio dui.</p>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span6">
                      <h3>Texts</h3>
                      <p class="muted">Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.</p>
                      <p class="text-warning">Etiam porta sem malesuada magna mollis euismod.</p>
                      <p class="text-error">Donec ullamcorper nulla non metus auctor fringilla.</p>
                      <p class="text-info">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.</p>
                      <p class="text-success">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                    </div>
                    <div class="span6">
                      <h3>Headings</h3>
                      <h1>h1. Heading 1</h1>
                      <h2>h2. Heading 2</h2>
                      <h3>h3. Heading 3</h3>
                      <h4>h4. Heading 4</h4>
                      <h5>h5. Heading 5</h5>
                      <h6>h6. Heading 6</h6>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span6">
                      <h3>Address</h3>
                      <div class="well">
                        <address>
                          <strong>Loop, Inc.</strong><br />
                          795 Park Ave, Suite 120<br />
                          San Francisco, CA 94107<br />
                          <abbr title="Phone">P:</abbr> (234) 145-1810
                        </address>
                        <address>
                          <strong>Full Name</strong><br />
                          <a href="mailto:#">first.last@email.com</a>
                        </address>
                      </div>
                    </div>
                    <div class="span6">
                      <h3>Some more text here</h3>
                      <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                      <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec sed odio dui.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END GENERAL PORTLET-->
            <div>
              <!-- BEGIN BLOCKQUOTES PORTLET-->
              <div class="portlet">
                <div class="portlet-title">
                  <div class="caption"><i class="icon-reorder"></i>Blockquotes</div>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="portlet-body">
                  <h3></h3>
                  <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Duis mollis, est non commodo luctus, nisi erat porttitor ligula integer posuere erat a ante.</p>
                  </blockquote>
                  <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                     <small>Someone famous <cite title="Source Title">Source Title</cite></small>
                  </blockquote>
                  <div class="clearfix">
                    <blockquote class="pull-right">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                       <small>Someone famous <cite title="Source Title">Source Title</cite></small>
                    </blockquote>
                  </div>
                </div>
              </div>
              <!-- END BLOCKQUOTES PORTLET-->
            </div>
            <!-- BEGIN WELLS PORTLET-->
            <div>
              <div class="portlet">
                <div class="portlet-title">
                  <div class="caption"><i class="icon-reorder"></i>Wells</div>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="portlet-body">
                  <div class="well">
                    <h4>Default well</h4>
                    Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.Integer molestie lorem at massa Integer molestie lorem at massa Integer molestie lorem at massa Integer molestie lorem at massa.
                  </div>
                  <div class="well well-large">
                    <h4>Large Well</h4>
                    Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet. Integer molestie lorem at massa Integer molestie lorem at massa  Integer molestie lorem at massa
                  </div>
                </div>
              </div>
            </div>
            <!-- END WELLS PORTLET-->
          </div>
          <div class="span4">
            <!-- BEGIN UNORDERED LISTS PORTLET-->
            <div class="portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Unordered Lists</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                </div>
              </div>
              <div class="portlet-body">
                <ul>
                  <li>Lorem ipsum dolor sit amet</li>
                  <li>Consectetur adipiscing elit</li>
                  <li>Integer molestie lorem at massa</li>
                  <li>Facilisis in pretium nisl aliquet</li>
                  <li>
                    Nulla volutpat aliquam velit
                    <ul>
                      <li>Phasellus iaculis neque</li>
                      <li>Purus sodales ultricies</li>
                      <li>Vestibulum laoreet porttitor sem</li>
                      <li>Ac tristique libero volutpat at</li>
                    </ul>
                  </li>
                  <li>Faucibus porta lacus fringilla vel</li>
                  <li>Aenean sit amet erat nunc</li>
                  <li>Eget porttitor lorem</li>
                </ul>
              </div>
            </div>
            <!-- END UNORDERED LISTS PORTLET-->
            <!-- BEGIN ORDERED LISTS PORTLET-->
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Ordered Lists</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                </div>
              </div>
              <div class="portlet-body">
                <ol>
                  <li>Lorem ipsum dolor sit amet</li>
                  <li>Consectetur adipiscing elit</li>
                  <li>Integer molestie lorem at massa</li>
                  <li>Facilisis in pretium nisl aliquet</li>
                  <li>Nulla volutpat aliquam velit</li>
                  <li>Faucibus porta lacus fringilla vel</li>
                  <li>Aenean sit amet erat nunc</li>
                  <li>Eget porttitor lorem</li>
                </ol>
              </div>
            </div>
            <!-- END ORDERED LISTS PORTLET-->
            <!-- BEGIN UNSTYLED LISTS PORTLET-->
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Unstyled Lists</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                </div>
              </div>
              <div class="portlet-body">
                <ul class="unstyled">
                  <li>Lorem ipsum dolor sit amet</li>
                  <li>Consectetur adipiscing elit</li>
                  <li>Integer molestie lorem at massa</li>
                  <li>Facilisis in pretium nisl aliquet</li>
                  <li>
                    Nulla volutpat aliquam velit
                    <ul>
                      <li>Phasellus iaculis neque</li>
                      <li>Purus sodales ultricies</li>
                      <li>Vestibulum laoreet porttitor sem</li>
                      <li>Ac tristique libero volutpat at</li>
                    </ul>
                  </li>
                  <li>Faucibus porta lacus fringilla vel</li>
                  <li>Aenean sit amet erat nunc</li>
                  <li>Eget porttitor lorem</li>
                </ul>
              </div>
            </div>
            <!-- END UNSTYLED LISTS PORTLET-->
            <!-- BEGIN DESCRIPTION LISTS PORTLET-->
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Description Lists</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                </div>
              </div>
              <div class="portlet-body">
                <dl>
                  <dt>Description lists</dt>
                  <dd>A description list is perfect for defining terms.</dd>
                  <dt>Euismod</dt>
                  <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                  <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                  <dt>Malesuada porta</dt>
                  <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                </dl>
              </div>
            </div>
            <!-- END DESCRIPTION LISTS PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
