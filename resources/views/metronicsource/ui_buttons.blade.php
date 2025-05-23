@php $datas['layoutDatas'] = ['viewCode' => 'uibuttons', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span6">
            <!-- BEGIN BUTTONS PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Buttons</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <p>
                  <button type="button" class="btn">Default</button>
                  <button type="button" class="btn red">Primary</button>
                  <button type="button" class="btn blue">Info</button>
                  <button type="button" class="btn green">Success</button>
                </p>
                <div class="btn-group">
                  <button class="btn">Left</button>
                  <button class="btn">Middle</button>
                  <button class="btn">Right</button>
                </div>
                <p>
                  <a href="#" class="btn red-stripe">Red Stripe</a>
                  <a href="#" class="btn purple-stripe">Purple stripe</a>
                </p>
                <p>
                  <a href="#" class="btn disabled">Disabled</a>
                  <a href="#" class="btn blue disabled">Disabled</a>
                  <a href="#" class="btn red disabled">Disabled</a>
                  <a href="#" class="btn green disabled">Disabled</a>
                </p>
                <p>
                  <a href="#" class="btn red mini">Mini size</a>
                  <a href="#" class="btn blue">Default size</a>
                  <a href="#" class="btn green big">Large size</a>
                </p>
                <p>
                  <button class="btn purple">Button <i class="m-icon-swapright m-icon-white"></i></button>
                  <input type="submit" class="btn red" value="Submit"/>
                  <a href="#" class="btn black">Link <i class="m-icon-swapright m-icon-white"></i></a>
                </p>
              </div>
            </div>
            <!-- END BUTTONS PORTLET-->
            <!-- BEGIN BUTTONS WITH ICONS PORTLET-->
            <div class="portlet box red">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Icon Buttons</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <p>Examples to use buttons with font awesome icons.</p>
                <p>
                  <a href="#" class="btn icn-only"><i class="icon-share"></i></a>
                  <a href="#" class="btn red icn-only"><i class="icon-remove icon-white"></i></a>
                  <a href="#" class="btn blue icn-only"><i class="m-icon-swapright m-icon-white"></i></a>
                  <a href="#" class="btn green icn-only"><i class="icon-user icon-white"></i></a>
                </p>
                <p>Examples to use buttons with glyphicon halflings icons.</p>
                <p>
                  <a href="#" class="btn icn-only"><i class="halflings-icon share"></i></a>
                  <a href="#" class="btn red icn-only"><i class="halflings-icon remove white"></i></a>
                  <a href="#" class="btn blue icn-only"><i class="halflings-icon user white"></i></a>
                  <a href="#" class="btn green icn-only"><i class="halflings-icon white"></i></a>
                </p>
                <p>Buttons with both text and icon.</p>
                <p>
                  <a href="#" class="btn mini red"><i class="icon-trash"></i> Delete Item</a>
                  <a href="#" class="btn"><i class="icon-plus"></i> Add Item</a>
                  <a class="btn purple-stripe">Listen <i class="icon-headphones"></i></a>
                </p>
                <p>
                  <a href="#" class="btn blue"><i class="icon-plus"></i> Submit Entry</a>
                  <a class="btn purple big">pricing options <i class="m-icon-big-swapright m-icon-white"></i></a>
                </p>
                <p>Navigation icons.</p>
                <p>
                  <a href="#" class="btn bigicn-only"><i class="m-icon-big-swapleft"></i></a>
                  <a href="#" class="btn bigicn-only green"><i class="m-icon-big-swapright m-icon-white"></i></a>
                  <a href="#" class="btn bigicn-only blue"><i class="m-icon-big-swapdown m-icon-white"></i></a>
                  <a href="#" class="btn bigicn-only black"><i class="m-icon-big-swapup m-icon-white"></i></a>
                </p>
                <p>
                  <a href="#" class="btn icn-only"><i class="m-icon-swapleft"></i></a>
                  <a href="#" class="btn icn-only green"><i class="m-icon-swapright m-icon-white"></i></a>
                  <a href="#" class="btn icn-only blue"><i class="m-icon-swapdown m-icon-white"></i></a>
                  <a href="#" class="btn icn-only black"><i class="m-icon-swapup m-icon-white"></i></a>
                </p>
                <p>Toolbar icon example</p>
                <div class="btn-group hidden-phone">
                  <a href="javascript:;" class="btn">Tools</a>
                  <a href="javascript:;" class="btn">Settings</a>
                  <a href="javascript:;" class="btn active">About</a>
                  <a href="javascript:;" class="btn">Help</a>
                  <a href="javascript:;" class="btn">Contact</a>
                </div>
                <div class="btn-group visible-phone">
                  <a href="javascript:;" class="btn">Tools</a>
                  <a href="javascript:;" class="btn">Settings</a>
                  <a href="javascript:;" class="btn active">About</a>
                </div>
                <div class="btn-group visible-phone">
                  <a href="javascript:;" class="btn">Help</a>
                  <a href="javascript:;" class="btn">Contact</a>
                </div>
                <div class="btn-group hidden-phone">
                  <button class="btn"><i class="icon-step-backward"></i></button>
                  <button class="btn"><i class="icon-fast-backward"></i></button>
                  <button class="btn"><i class="icon-backward"></i></button>
                  <button class="btn"><i class="icon-play"></i></button>
                  <button class="btn"><i class="icon-stop"></i></button>
                  <button class="btn"><i class="icon-forward"></i></button>
                  <button class="btn"><i class="icon-fast-forward"></i></button>
                  <button class="btn"><i class="icon-step-forward"></i></button>
                </div>
                <div class="btn-group visible-phone">
                  <button class="btn"><i class="icon-step-backward"></i></button>
                  <button class="btn"><i class="icon-fast-backward"></i></button>
                  <button class="btn"><i class="icon-backward"></i></button>
                  <button class="btn"><i class="icon-play"></i></button>
                </div>
                <div class="btn-group visible-phone">
                  <button class="btn"><i class="icon-stop"></i></button>
                  <button class="btn"><i class="icon-forward"></i></button>
                  <button class="btn"><i class="icon-fast-forward"></i></button>
                  <button class="btn"><i class="icon-step-forward"></i></button>
                </div>
                <p>Star Rating Example</p>
                <div>
                  <span class="rating">
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                  </span>
                </div>
              </div>
            </div>
            <!-- END BUTTONS WITH ICONS PORTLET-->
          </div>
          <div class="span6">
            <!-- BEGIN BLOCK BUTTONS PORTLET-->
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Social Icons</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <ul class="social-icons ">
                  <li><a href="#" data-original-title="amazon" class="amazon"></a></li>
                  <li><a href="#" data-original-title="behance" class="behance"></a></li>
                  <li><a href="#" data-original-title="blogger" class="blogger"></a></li>
                  <li><a href="#" data-original-title="deviantart" class="deviantart"></a></li>
                  <li><a href="#" data-original-title="dribbble" class="dribbble"></a></li>
                  <li><a href="#" data-original-title="dropbox" class="dropbox"></a></li>
                  <li><a href="#" data-original-title="facebook" class="facebook"></a></li>
                  <li><a href="#" data-original-title="forrst" class="forrst"></a></li>
                  <li><a href="#" data-original-title="github" class="github"></a></li>
                  <li><a href="#" data-original-title="Goole Plus" class="googleplus"></a></li>
                  <li><a href="#" data-original-title="jolicloud" class="jolicloud"></a></li>
                  <li><a href="#" data-original-title="last-fm" class="last-fm"></a></li>
                  <li><a href="#" data-original-title="linkedin" class="linkedin"></a></li>
                  <li><a href="#" data-original-title="picasa" class="picasa"></a></li>
                  <li><a href="#" data-original-title="pintrest" class="pintrest"></a></li>
                  <li><a href="#" data-original-title="rss" class="rss"></a></li>
                  <li><a href="#" data-original-title="skype" class="skype"></a></li>
                  <li><a href="#" data-original-title="spotify" class="spotify"></a></li>
                  <li><a href="#" data-original-title="stumbleupon" class="stumbleupon"></a></li>
                  <li><a href="#" data-original-title="tumblr" class="tumblr"></a></li>
                  <li><a href="#" data-original-title="twitter" class="twitter"></a></li>
                  <li><a href="#" data-original-title="vimeo" class="vimeo"></a></li>
                  <li><a href="#" data-original-title="wordpress" class="wordpress"></a></li>
                  <li><a href="#" data-original-title="xing" class="xing"></a></li>
                  <li><a href="#" data-original-title="yahoo" class="yahoo"></a></li>
                  <li><a href="#" data-original-title="youtube" class="youtube"></a></li>
                  <li><a href="#" data-original-title="vk" class="vk"></a></li>
                  <li><a href="#" data-original-title="instagram" class="instagram"></a></li>
                </ul>
              </div>
            </div>
            <!-- BEGIN BLOCK BUTTONS PORTLET-->
            <!-- BEGIN BLOCK BUTTONS PORTLET-->
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Block Buttons</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <p>
                  <button class="btn blue btn-block">Button <i class="m-icon-swapright m-icon-white"></i></button>
                  <input type="submit" class="btn blue btn-block" value="Submit"/>
                  <a href="#" class="btn blue btn-block">Link <i class="m-icon-swapright m-icon-white"></i></a>
                </p>
                <p>
                  <button class="btn green big btn-block">Button(big)<i class="m-icon-big-swapright m-icon-white"></i></button>
                  <input type="submit" class="btn green big btn-block" value="Submit(big)"/>
                  <a href="#" class="btn green big btn-block">Link(big)<i class="m-icon-big-swapright m-icon-white"></i></a>
                </p>
              </div>
            </div>
            <!-- BEGIN BLOCK BUTTONS PORTLET-->
            <!-- BEGIN DROPDOWNS PORTLET-->
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Dropdowns</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <h4>Dropdown buttons</h4>
                <div class="btn-group">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                  Tools <i class="icon-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Preferences</a></li>
                    <li><a href="#">Window Options</a></li>
                    <li><a href="#">Help</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button class="btn red dropdown-toggle" data-toggle="dropdown">Primary <i class="icon-angle-down"></i></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button class="btn purple dropdown-toggle" data-toggle="dropdown">Success <i class="icon-angle-down"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <div class="btn-toolbar hide">
                  <div class="btn-group">
                    <button class="btn green dropdown-toggle" data-toggle="dropdown">Success <i class="icon-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="btn-group">
                    <button class="btn blue dropdown-toggle" data-toggle="dropdown">Info <i class="icon-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="btn-group">
                    <button class="btn black dropdown-toggle" data-toggle="dropdown">Inverse <i class="icon-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu opens-left">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                </div>
                <h4>Dropdown button with icons</h4>
                <div class="btn-toolbar">
                  <div class="btn-group">
                    <a class="btn green" href="#" data-toggle="dropdown">
                    <i class="icon-user"></i> User
                    <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                      <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                      <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="i"></i> Make admin</a></li>
                    </ul>
                  </div>
                  <div class="btn-group">
                    <a class="btn purple" href="#" data-toggle="dropdown">
                    <i class="icon-user"></i> Settings
                    <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="#"><i class="icon-plus"></i> Add</a></li>
                      <li><a href="#"><i class="icon-trash"></i> Edit</a></li>
                      <li><a href="#"><i class="icon-remove"></i> Delete</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="i"></i> Full Settings</a></li>
                    </ul>
                  </div>
                </div>
                <h4>Dropdown with checkboxes.</h4>
                <div class="btn-group">
                  <a class="btn green" href="#" data-toggle="dropdown">
                  Options #1
                  <i class="icon-angle-down"></i>
                  </a>
                  <div class="dropdown-menu hold-on-click dropdown-checkboxes">
                    <label><input type="checkbox">Option 1</label>
                    <label><input type="checkbox">Option 2</label>
                    <label><input type="checkbox">Option 3</label>
                    <label><input type="checkbox">Option 4</label>
                    <label><input type="checkbox">Option 5</label>
                  </div>
                </div>
                <div class="btn-group">
                  <a class="btn red" href="#" data-toggle="dropdown">
                  Options #2
                  <i class="icon-angle-down"></i>
                  </a>
                  <div class="dropdown-menu hold-on-click dropdown-checkboxes">
                    <label><input type="checkbox">Option 1</label>
                    <label><input type="checkbox" checked>Option 2</label>
                    <label><input type="checkbox">Option 3</label>
                    <label><input type="checkbox" checked>Option 4</label>
                    <label><input type="checkbox">Option 5</label>
                  </div>
                </div>
                <p>
                  <span class="label label-success">NOTE:</span>&nbsp;
                  By adding <code>hold-on-click</code> class you can avoid closing the dropdown on click
                </p>
                <h4>Dropup menu options.</h4>
                <!-- /btn-group -->
                <div class="btn-group">
                  <button class="btn blue dropdown-toggle" data-toggle="dropdown">Info <i class="icon-angle-down"></i>
                  </button>
                  <ul class="dropdown-menu bottom-up">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <!-- /btn-group -->
                <div class="btn-group">
                  <button class="btn black dropdown-toggle" data-toggle="dropdown">Inverse <i class="icon-angle-down"></i>
                  </button>
                  <ul class="dropdown-menu bottom-up">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <!-- /btn-group -->
                <p>
                  <span class="label label-success">NOTE:</span>&nbsp;
                  By adding <code>bottom-up</code> class you make dropup menu.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row-fluid">
          <div class="span12">
            <!-- END DROPDOWNS PORTLET-->
            <!-- BEGIN CUSTOM BUTTONS WITH ICONS PORTLET-->
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Responsive Font Awesome Buttons</div>
              </div>
              <div class="portlet-body">
                <div class="row-fluid">
                  <a href="#" class="icon-btn span2">
                    <i class="icon-group"></i>
                    <div>Users</div>
                    <span class="badge badge-important">2</span>
                  </a>
                  <a href="#" class="icon-btn span4">
                    <i class="icon-barcode"></i>
                    <div>Products</div>
                    <span class="badge badge-success">4</span>
                  </a>
                  <a href="#" class="icon-btn span3">
                    <i class="icon-bar-chart"></i>
                    <div>Reports</div>
                  </a>
                  <a href="#" class="icon-btn span3">
                    <i class="icon-sitemap"></i>
                    <div>Categories</div>
                  </a>
                </div>
                <div class="row-fluid">
                  <a href="#" class="icon-btn span3">
                    <i class="icon-calendar"></i>
                    <div>Calendar</div>
                    <span class="badge badge-success">4</span>
                  </a>
                  <a href="#" class="icon-btn span3">
                    <i class="icon-envelope"></i>
                    <div>Inbox</div>
                    <span class="badge badge-info">12</span>
                  </a>
                  <a href="#" class="icon-btn span2">
                    <i class="icon-bullhorn"></i>
                    <div>Notification</div>
                    <span class="badge badge-important">3</span>
                  </a>
                  <a href="#" class="icon-btn span4">
                    <i class="icon-map-marker"></i>
                    <div>Locations</div>
                  </a>
                </div>
                <div class="row-fluid">
                  <a href="#" class="icon-btn span2">
                    <i class="icon-money"><i></i></i>
                    <div>Finance</div>
                  </a>
                  <a href="#" class="icon-btn span2">
                    <i class="icon-plane"></i>
                    <div>Projects</div>
                    <span class="badge badge-info">21</span>
                  </a>
                  <a href="#" class="icon-btn span2">
                    <i class="icon-thumbs-up"></i>
                    <div>Feedback</div>
                    <span class="badge badge-info">2</span>
                  </a>
                  <a href="#" class="icon-btn span2">
                    <i class="icon-cloud"></i>
                    <div>Servers</div>
                    <span class="badge badge-important">2</span>
                  </a>
                  <a href="#" class="icon-btn span2">
                    <i class="icon-globe"></i>
                    <div>Regions</div>
                  </a>
                  <a href="#" class="icon-btn span2">
                    <i class="icon-heart-empty"></i>
                    <div>Popularity</div>
                    <span class="badge badge-info">221</span>
                  </a>
                </div>
              </div>
            </div>
            <!-- END CUSTOM BUTTONS WITH ICONS PORTLET-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span12">
            <div class="tabbable tabbable-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1_1" data-toggle="tab">Font Awesome Icons</a></li>
                <li><a href="#tab_1_2" data-toggle="tab">Glyphicons Pro Icons</a></li>
                <li><a href="#tab_1_3" data-toggle="tab">Glyphicons Pro Halfing Icons</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">
                  <div class="row-fluid">
                    <div class="span12">
                      <h3>New Icons in 3.2.0</h3>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-compass"></i> icon-compass</li>
                        <li><i class="icon-eur"></i> icon-eur</li>
                        <li><i class="icon-dollar"></i> icon-dollar <span class="muted">(alias)</span></li>
                        <li><i class="icon-yen"></i> icon-yen <span class="muted">(alias)</span></li>
                        <li><i class="icon-won"></i> icon-won <span class="muted">(alias)</span></li>
                        <li><i class="icon-file-text"></i> icon-file-text</li>
                        <li><i class="icon-sort-by-attributes-alt"></i> icon-sort-by-attributes-alt</li>
                        <li><i class="icon-thumbs-down"></i> icon-thumbs-down</li>
                        <li><i class="icon-xing-sign"></i> icon-xing-sign</li>
                        <li><i class="icon-instagram"></i> icon-instagram</li>
                        <li><i class="icon-bitbucket-sign"></i> icon-bitbucket-sign</li>
                        <li><i class="icon-long-arrow-up"></i> icon-long-arrow-up</li>
                        <li><i class="icon-windows"></i> icon-windows</li>
                        <li><i class="icon-skype"></i> icon-skype</li>
                        <li><i class="icon-male"></i> icon-male</li>
                        <li><i class="icon-archive"></i> icon-archive</li>
                        <li><i class="icon-renren"></i> icon-renren</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-collapse"></i> icon-collapse</li>
                        <li><i class="icon-euro"></i> icon-euro <span class="muted">(alias)</span></li>
                        <li><i class="icon-inr"></i> icon-inr</li>
                        <li><i class="icon-cny"></i> icon-cny</li>
                        <li><i class="icon-btc"></i> icon-btc</li>
                        <li><i class="icon-sort-by-alphabet"></i> icon-sort-by-alphabet</li>
                        <li><i class="icon-sort-by-order"></i> icon-sort-by-order</li>
                        <li><i class="icon-youtube-sign"></i> icon-youtube-sign</li>
                        <li><i class="icon-youtube-play"></i> icon-youtube-play</li>
                        <li><i class="icon-flickr"></i> icon-flickr</li>
                        <li><i class="icon-tumblr"></i> icon-tumblr</li>
                        <li><i class="icon-long-arrow-left"></i> icon-long-arrow-left</li>
                        <li><i class="icon-android"></i> icon-android</li>
                        <li><i class="icon-foursquare"></i> icon-foursquare</li>
                        <li><i class="icon-gittip"></i> icon-gittip</li>
                        <li><i class="icon-bug"></i> icon-bug</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-collapse-top"></i> icon-collapse-top</li>
                        <li><i class="icon-gbp"></i> icon-gbp</li>
                        <li><i class="icon-rupee"></i> icon-rupee <span class="muted">(alias)</span></li>
                        <li><i class="icon-renminbi"></i> icon-renminbi <span class="muted">(alias)</span></li>
                        <li><i class="icon-bitcoin"></i> icon-bitcoin <span class="muted">(alias)</span></li>
                        <li><i class="icon-sort-by-alphabet-alt"></i> icon-sort-by-alphabet-alt</li>
                        <li><i class="icon-sort-by-order-alt"></i> icon-sort-by-order-alt</li>
                        <li><i class="icon-youtube"></i> icon-youtube</li>
                        <li><i class="icon-dropbox"></i> icon-dropbox</li>
                        <li><i class="icon-adn"></i> icon-adn</li>
                        <li><i class="icon-tumblr-sign"></i> icon-tumblr-sign</li>
                        <li><i class="icon-long-arrow-right"></i> icon-long-arrow-right</li>
                        <li><i class="icon-linux"></i> icon-linux</li>
                        <li><i class="icon-trello"></i> icon-trello</li>
                        <li><i class="icon-sun"></i> icon-sun</li>
                        <li><i class="icon-vk"></i> icon-vk</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-expand"></i> icon-expand</li>
                        <li><i class="icon-usd"></i> icon-usd</li>
                        <li><i class="icon-jpy"></i> icon-jpy</li>
                        <li><i class="icon-krw"></i> icon-krw</li>
                        <li><i class="icon-file"></i> icon-file</li>
                        <li><i class="icon-sort-by-attributes"></i> icon-sort-by-attributes</li>
                        <li><i class="icon-thumbs-up"></i> icon-thumbs-up</li>
                        <li><i class="icon-xing"></i> icon-xing</li>
                        <li><i class="icon-stackexchange"></i> icon-stackexchange</li>
                        <li><i class="icon-bitbucket"></i> icon-bitbucket</li>
                        <li><i class="icon-long-arrow-down"></i> icon-long-arrow-down</li>
                        <li><i class="icon-apple"></i> icon-apple</li>
                        <li><i class="icon-dribble"></i> icon-dribble</li>
                        <li><i class="icon-female"></i> icon-female</li>
                        <li><i class="icon-moon"></i> icon-moon</li>
                        <li><i class="icon-weibo"></i> icon-weibo</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <h3>Web Application Icons</h3>
                  </div>
                  <div class="row-fluid">
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-adjust"></i> icon-adjust</li>
                        <li><i class="icon-asterisk"></i> icon-asterisk</li>
                        <li><i class="icon-ban-circle"></i> icon-ban-circle</li>
                        <li><i class="icon-bar-chart"></i> icon-bar-chart</li>
                        <li><i class="icon-barcode"></i> icon-barcode</li>
                        <li><i class="icon-beaker"></i> icon-beaker</li>
                        <li><i class="icon-bell"></i> icon-bell</li>
                        <li><i class="icon-bolt"></i> icon-bolt</li>
                        <li><i class="icon-book"></i> icon-book</li>
                        <li><i class="icon-bookmark"></i> icon-bookmark</li>
                        <li><i class="icon-bookmark-empty"></i> icon-bookmark-empty</li>
                        <li><i class="icon-briefcase"></i> icon-briefcase</li>
                        <li><i class="icon-bullhorn"></i> icon-bullhorn</li>
                        <li><i class="icon-calendar"></i> icon-calendar</li>
                        <li><i class="icon-camera"></i> icon-camera</li>
                        <li><i class="icon-camera-retro"></i> icon-camera-retro</li>
                        <li><i class="icon-certificate"></i> icon-certificate</li>
                        <li><i class="icon-check"></i> icon-check</li>
                        <li><i class="icon-check-empty"></i> icon-check-empty</li>
                        <li><i class="icon-cloud"></i> icon-cloud</li>
                        <li><i class="icon-cog"></i> icon-cog</li>
                        <li><i class="icon-cogs"></i> icon-cogs</li>
                        <li><i class="icon-comment"></i> icon-comment</li>
                        <li><i class="icon-comment-alt"></i> icon-comment-alt</li>
                        <li><i class="icon-comments"></i> icon-comments</li>
                        <li><i class="icon-comments-alt"></i> icon-comments-alt</li>
                        <li><i class="icon-credit-card"></i> icon-credit-card</li>
                        <li><i class="icon-dashboard"></i> icon-dashboard</li>
                        <li><i class="icon-download"></i> icon-download</li>
                        <li><i class="icon-download-alt"></i> icon-download-alt</li>
                        <li><i class="icon-edit"></i> icon-edit</li>
                        <li><i class="icon-envelope"></i> icon-envelope</li>
                        <li><i class="icon-envelope-alt"></i> icon-envelope-alt</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-exclamation-sign"></i> icon-exclamation-sign</li>
                        <li><i class="icon-external-link"></i> icon-external-link</li>
                        <li><i class="icon-eye-close"></i> icon-eye-close</li>
                        <li><i class="icon-eye-open"></i> icon-eye-open</li>
                        <li><i class="icon-facetime-video"></i> icon-facetime-video</li>
                        <li><i class="icon-film"></i> icon-film</li>
                        <li><i class="icon-filter"></i> icon-filter</li>
                        <li><i class="icon-fire"></i> icon-fire</li>
                        <li><i class="icon-flag"></i> icon-flag</li>
                        <li><i class="icon-folder-close"></i> icon-folder-close</li>
                        <li><i class="icon-folder-open"></i> icon-folder-open</li>
                        <li><i class="icon-gift"></i> icon-gift</li>
                        <li><i class="icon-glass"></i> icon-glass</li>
                        <li><i class="icon-globe"></i> icon-globe</li>
                        <li><i class="icon-group"></i> icon-group</li>
                        <li><i class="icon-hdd"></i> icon-hdd</li>
                        <li><i class="icon-headphones"></i> icon-headphones</li>
                        <li><i class="icon-heart"></i> icon-heart</li>
                        <li><i class="icon-heart-empty"></i> icon-heart-empty</li>
                        <li><i class="icon-home"></i> icon-home</li>
                        <li><i class="icon-inbox"></i> icon-inbox</li>
                        <li><i class="icon-info-sign"></i> icon-info-sign</li>
                        <li><i class="icon-key"></i> icon-key</li>
                        <li><i class="icon-leaf"></i> icon-leaf</li>
                        <li><i class="icon-legal"></i> icon-legal</li>
                        <li><i class="icon-lemon"></i> icon-lemon</li>
                        <li><i class="icon-lock"></i> icon-lock</li>
                        <li><i class="icon-unlock"></i> icon-unlock</li>
                        <li><i class="icon-magic"></i> icon-magic</li>
                        <li><i class="icon-magnet"></i> icon-magnet</li>
                        <li><i class="icon-map-marker"></i> icon-map-marker</li>
                        <li><i class="icon-minus"></i> icon-minus</li>
                        <li><i class="icon-minus-sign"></i> icon-minus-sign</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-money"></i> icon-money</li>
                        <li><i class="icon-move"></i> icon-move</li>
                        <li><i class="icon-music"></i> icon-music</li>
                        <li><i class="icon-off"></i> icon-off</li>
                        <li><i class="icon-ok"></i> icon-ok</li>
                        <li><i class="icon-ok-circle"></i> icon-ok-circle</li>
                        <li><i class="icon-ok-sign"></i> icon-ok-sign</li>
                        <li><i class="icon-pencil"></i> icon-pencil</li>
                        <li><i class="icon-picture"></i> icon-picture</li>
                        <li><i class="icon-plane"></i> icon-plane</li>
                        <li><i class="icon-plus"></i> icon-plus</li>
                        <li><i class="icon-plus-sign"></i> icon-plus-sign</li>
                        <li><i class="icon-print"></i> icon-print</li>
                        <li><i class="icon-pushpin"></i> icon-pushpin</li>
                        <li><i class="icon-qrcode"></i> icon-qrcode</li>
                        <li><i class="icon-question-sign"></i> icon-question-sign</li>
                        <li><i class="icon-random"></i> icon-random</li>
                        <li><i class="icon-refresh"></i> icon-refresh</li>
                        <li><i class="icon-remove"></i> icon-remove</li>
                        <li><i class="icon-remove-circle"></i> icon-remove-circle</li>
                        <li><i class="icon-remove-sign"></i> icon-remove-sign</li>
                        <li><i class="icon-reorder"></i> icon-reorder</li>
                        <li><i class="icon-resize-horizontal"></i> icon-resize-horizontal</li>
                        <li><i class="icon-resize-vertical"></i> icon-resize-vertical</li>
                        <li><i class="icon-retweet"></i> icon-retweet</li>
                        <li><i class="icon-road"></i> icon-road</li>
                        <li><i class="icon-rss"></i> icon-rss</li>
                        <li><i class="icon-screenshot"></i> icon-screenshot</li>
                        <li><i class="icon-search"></i> icon-search</li>
                        <li><i class="icon-share"></i> icon-share</li>
                        <li><i class="icon-share-alt"></i> icon-share-alt</li>
                        <li><i class="icon-shopping-cart"></i> icon-shopping-cart</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-signal"></i> icon-signal</li>
                        <li><i class="icon-signin"></i> icon-signin</li>
                        <li><i class="icon-signout"></i> icon-signout</li>
                        <li><i class="icon-sitemap"></i> icon-sitemap</li>
                        <li><i class="icon-sort"></i> icon-sort</li>
                        <li><i class="icon-sort-down"></i> icon-sort-down</li>
                        <li><i class="icon-sort-up"></i> icon-sort-up</li>
                        <li><i class="icon-star"></i> icon-star</li>
                        <li><i class="icon-star-empty"></i> icon-star-empty</li>
                        <li><i class="icon-star-half"></i> icon-star-half</li>
                        <li><i class="icon-tag"></i> icon-tag</li>
                        <li><i class="icon-tags"></i> icon-tags</li>
                        <li><i class="icon-tasks"></i> icon-tasks</li>
                        <li><i class="icon-thumbs-down"></i> icon-thumbs-down</li>
                        <li><i class="icon-thumbs-up"></i> icon-thumbs-up</li>
                        <li><i class="icon-time"></i> icon-time</li>
                        <li><i class="icon-tint"></i> icon-tint</li>
                        <li><i class="icon-trash"></i> icon-trash</li>
                        <li><i class="icon-trophy"></i> icon-trophy</li>
                        <li><i class="icon-truck"></i> icon-truck</li>
                        <li><i class="icon-umbrella"></i> icon-umbrella</li>
                        <li><i class="icon-upload"></i> icon-upload</li>
                        <li><i class="icon-upload-alt"></i> icon-upload-alt</li>
                        <li><i class="icon-user"></i> icon-user</li>
                        <li><i class="icon-user-md"></i> icon-user-md</li>
                        <li><i class="icon-volume-off"></i> icon-volume-off</li>
                        <li><i class="icon-volume-down"></i> icon-volume-down</li>
                        <li><i class="icon-volume-up"></i> icon-volume-up</li>
                        <li><i class="icon-warning-sign"></i> icon-warning-sign</li>
                        <li><i class="icon-wrench"></i> icon-wrench</li>
                        <li><i class="icon-zoom-in"></i> icon-zoom-in</li>
                        <li><i class="icon-zoom-out"></i> icon-zoom-out</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span12">
                      <h3>Currency Icons</h3>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-bitcoin"></i> icon-bitcoin <span class="muted">(alias)</span></li>
                        <li><i class="icon-eur"></i> icon-eur</li>
                        <li><i class="icon-jpy"></i> icon-jpy</li>
                        <li><i class="icon-usd"></i> icon-usd</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-btc"></i> icon-btc</li>
                        <li><i class="icon-euro"></i> icon-euro <span class="muted">(alias)</span></li>
                        <li><i class="icon-krw"></i> </li>
                        <li><i class="icon-won"></i> icon-won <span class="muted">(alias)</span></li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-cny"></i> icon-cny</li>
                        <li><i class="icon-gbp"></i> icon-gbp</li>
                        <li><i class="icon-renminbi"></i> icon-renminbi <span class="muted">(alias)</span></li>
                        <li><i class="icon-yen"></i> <span class="muted">(alias)</span></li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-dollar"></i> icon-dollar</li>
                        <li><i class="icon-inr"></i> icon-inr</li>
                        <li><i class="icon-rupee"></i> icon-rupee <span class="muted">(alias)</span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span12">
                      <h3>Text Editor Icons</h3>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-file"></i> icon-file</li>
                        <li><i class="icon-cut"></i> icon-cut</li>
                        <li><i class="icon-copy"></i> icon-copy</li>
                        <li><i class="icon-paste"></i> icon-paste</li>
                        <li><i class="icon-save"></i> icon-save</li>
                        <li><i class="icon-undo"></i> icon-undo</li>
                        <li><i class="icon-repeat"></i> icon-repeat</li>
                        <li><i class="icon-paper-clip"></i> icon-paper-clip</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-text-height"></i> icon-text-height</li>
                        <li><i class="icon-text-width"></i> icon-text-width</li>
                        <li><i class="icon-align-left"></i> icon-align-left</li>
                        <li><i class="icon-align-center"></i> icon-align-center</li>
                        <li><i class="icon-align-right"></i> icon-align-right</li>
                        <li><i class="icon-align-justify"></i> icon-align-justify</li>
                        <li><i class="icon-indent-left"></i> icon-indent-left</li>
                        <li><i class="icon-indent-right"></i> icon-indent-right</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-font"></i> icon-font</li>
                        <li><i class="icon-bold"></i> icon-bold</li>
                        <li><i class="icon-italic"></i> icon-italic</li>
                        <li><i class="icon-strikethrough"></i> icon-strikethrough</li>
                        <li><i class="icon-underline"></i> icon-underline</li>
                        <li><i class="icon-link"></i> icon-link</li>
                        <li><i class="icon-columns"></i> icon-columns</li>
                        <li><i class="icon-table"></i> icon-table</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-th-large"></i> icon-th-large</li>
                        <li><i class="icon-th"></i> icon-th</li>
                        <li><i class="icon-th-list"></i> icon-th-list</li>
                        <li><i class="icon-list"></i> icon-list</li>
                        <li><i class="icon-list-ol"></i> icon-list-ol</li>
                        <li><i class="icon-list-ul"></i> icon-list-ul</li>
                        <li><i class="icon-list-alt"></i> icon-list-alt</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span12">
                      <h3>Directional Icons</h3>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-arrow-down"></i> icon-arrow-down</li>
                        <li><i class="icon-arrow-left"></i> icon-arrow-left</li>
                        <li><i class="icon-arrow-right"></i> icon-arrow-right</li>
                        <li><i class="icon-arrow-up"></i> icon-arrow-up</li>
                        <li><i class="icon-chevron-down"></i> icon-chevron-down</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-circle-arrow-down"></i> icon-circle-arrow-down</li>
                        <li><i class="icon-circle-arrow-left"></i> icon-circle-arrow-left</li>
                        <li><i class="icon-circle-arrow-right"></i> icon-circle-arrow-right</li>
                        <li><i class="icon-circle-arrow-up"></i> icon-circle-arrow-up</li>
                        <li><i class="icon-chevron-left"></i> icon-chevron-left</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-caret-down"></i> icon-caret-down</li>
                        <li><i class="icon-caret-left"></i> icon-caret-left</li>
                        <li><i class="icon-caret-right"></i> icon-caret-right</li>
                        <li><i class="icon-caret-up"></i> icon-caret-up</li>
                        <li><i class="icon-chevron-right"></i> icon-chevron-right</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-hand-down"></i> icon-hand-down</li>
                        <li><i class="icon-hand-left"></i> icon-hand-left</li>
                        <li><i class="icon-hand-right"></i> icon-hand-right</li>
                        <li><i class="icon-hand-up"></i> icon-hand-up</li>
                        <li><i class="icon-chevron-up"></i> icon-chevron-up</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span12">
                      <h3>Video Player Icons</h3>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-play-circle"></i> icon-play-circle</li>
                        <li><i class="icon-play"></i> icon-play</li>
                        <li><i class="icon-pause"></i> icon-pause</li>
                        <li><i class="icon-stop"></i> icon-stop</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-step-backward"></i> icon-step-backward</li>
                        <li><i class="icon-fast-backward"></i> icon-fast-backward</li>
                        <li><i class="icon-backward"></i> icon-backward</li>
                        <li><i class="icon-forward"></i> icon-forward</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-fast-forward"></i> icon-fast-forward</li>
                        <li><i class="icon-step-forward"></i> icon-step-forward</li>
                        <li><i class="icon-eject"></i> icon-eject</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-fullscreen"></i> icon-fullscreen</li>
                        <li><i class="icon-resize-full"></i> icon-resize-full</li>
                        <li><i class="icon-resize-small"></i> icon-resize-small</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span12">
                      <h3>Brand Icons</h3>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-adn"></i> icon-adn</li>
                        <li><i class="icon-bitbucket-sign"></i> icon-bitbucket-sign</li>
                        <li><i class="icon-dribble"></i> icon-dribble</li>
                        <li><i class="icon-flickr"></i> icon-flickr</li>
                        <li><i class="icon-github-sign"></i> icon-github-sign</li>
                        <li><i class="icon-html5"></i> icon-html5</li>
                        <li><i class="icon-linux"></i> icon-linux</li>
                        <li><i class="icon-renren"></i> icon-renren</li>
                        <li><i class="icon-tumblr"></i> icon-tumblr</li>
                        <li><i class="icon-vk"></i> icon-vk</li>
                        <li><i class="icon-xing-sign"></i> icon-xing-sign</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-android"></i> icon-android</li>
                        <li><i class="icon-bitcoin"></i> icon-bitcoin</li>
                        <li><i class="icon-dropbox"></i> icon-dropbox</li>
                        <li><i class="icon-foursquare"></i> icon-foursquare</li>
                        <li><i class="icon-gittip"></i> icon-gittip</li>
                        <li><i class="icon-instagram"></i> icon-instagram</li>
                        <li><i class="icon-maxcdn"></i> icon-maxcdn</li>
                        <li><i class="icon-skype"></i> icon-skype</li>
                        <li><i class="icon-tumblr-sign"></i> icon-tumblr-sign</li>
                        <li><i class="icon-weibo"></i> icon-weibo</li>
                        <li><i class="icon-youtube"></i> icon-youtube</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-apple"></i> icon-apple</li>
                        <li><i class="icon-facebook"></i> icon-facebook</li>
                        <li><i class="icon-github"></i> icon-github</li>
                        <li><i class="icon-google-plus"></i> icon-google-plus</li>
                        <li><i class="icon-linkedin"></i> icon-linkedin</li>
                        <li><i class="icon-pinterest"></i> icon-pinterest</li>
                        <li><i class="icon-stackexchange"></i> icon-stackexchange</li>
                        <li><i class="icon-twitter"></i> icon-twitter</li>
                        <li><i class="icon-windows"></i> icon-windows</li>
                        <li><i class="icon-youtube-play"></i> icon-youtube-play</li>
                        <li><i class="icon-bitbucket"></i> icon-bitbucket</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-css3"></i> icon-css3</li>
                        <li><i class="icon-facebook-sign"></i> icon-facebook-sign</li>
                        <li><i class="icon-github-alt"></i> icon-github-alt</li>
                        <li><i class="icon-google-plus-sign"></i> icon-google-plus-sign</li>
                        <li><i class="icon-linkedin-sign"></i> icon-linkedin-sign</li>
                        <li><i class="icon-pinterest-sign"></i> icon-pinterest-sign</li>
                        <li><i class="icon-trello"></i> icon-trello</li>
                        <li><i class="icon-twitter-sign"></i> icon-twitter-sign</li>
                        <li><i class="icon-xing"></i> icon-xing</li>
                        <li><i class="icon-youtube-sign"></i> icon-youtube-sign</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span12">
                      <h3>Medical Icons</h3>
                    </div>
                  </div>
                  <div class="row-fluid">
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-ambulance"></i> icon-ambulance</li>
                        <li><i class="icon-plus-sign-alt"></i> icon-plus-sign-alt</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-h-sign"></i> icon-h-sign</li>
                        <li><i class="icon-stethoscope"></i> icon-stethoscope</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-hospital"></i> icon-hospital</li>
                        <li><i class="icon-user-md"></i> icon-user-md</li>
                      </ul>
                    </div>
                    <div class="span3">
                      <ul class="unstyled">
                        <li><i class="icon-medkit"></i> icon-medkit</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_1_2">
                  <div class="glyphicons-demo">
                    <a href="#" class="glyphicons no-js glass"><i></i>glass</a>
                    <a href="#" class="glyphicons no-js leaf"><i></i>leaf</a>
                    <a href="#" class="glyphicons no-js dog"><i></i>dog</a>
                    <a href="#" class="glyphicons no-js user"><i></i>user</a>
                    <a href="#" class="glyphicons no-js girl"><i></i>girl</a>
                    <a href="#" class="glyphicons no-js car"><i></i>car</a>
                    <a href="#" class="glyphicons no-js user_add"><i></i>user_add</a>
                    <a href="#" class="glyphicons no-js user_remove"><i></i>user_remove</a>
                    <a href="#" class="glyphicons no-js film"><i></i>film</a>
                    <a href="#" class="glyphicons no-js magic"><i></i>magic</a>
                    <a href="#" class="glyphicons no-js envelope"><i></i>envelope</a>
                    <a href="#" class="glyphicons no-js camera"><i></i>camera</a>
                    <a href="#" class="glyphicons no-js heart"><i></i>heart</a>
                    <a href="#" class="glyphicons no-js beach_umbrella"><i></i>beach_umbrella</a>
                    <a href="#" class="glyphicons no-js train"><i></i>train</a>
                    <a href="#" class="glyphicons no-js print"><i></i>print</a>
                    <a href="#" class="glyphicons no-js bin"><i></i>bin</a>
                    <a href="#" class="glyphicons no-js music"><i></i>music</a>
                    <a href="#" class="glyphicons no-js note"><i></i>note</a>
                    <a href="#" class="glyphicons no-js heart_empty"><i></i>heart_empty</a>
                    <a href="#" class="glyphicons no-js home"><i></i>home</a>
                    <a href="#" class="glyphicons no-js snowflake"><i></i>snowflake</a>
                    <a href="#" class="glyphicons no-js fire"><i></i>fire</a>
                    <a href="#" class="glyphicons no-js magnet"><i></i>magnet</a>
                    <a href="#" class="glyphicons no-js parents"><i></i>parents</a>
                    <a href="#" class="glyphicons no-js binoculars"><i></i>binoculars</a>
                    <a href="#" class="glyphicons no-js road"><i></i>road</a>
                    <a href="#" class="glyphicons no-js search"><i></i>search</a>
                    <a href="#" class="glyphicons no-js cars"><i></i>cars</a>
                    <a href="#" class="glyphicons no-js notes_2"><i></i>notes_2</a>
                    <a href="#" class="glyphicons no-js pencil"><i></i>pencil</a>
                    <a href="#" class="glyphicons no-js bus"><i></i>bus</a>
                    <a href="#" class="glyphicons no-js wifi_alt"><i></i>wifi_alt</a>
                    <a href="#" class="glyphicons no-js luggage"><i></i>luggage</a>
                    <a href="#" class="glyphicons no-js old_man"><i></i>old_man</a>
                    <a href="#" class="glyphicons no-js woman"><i></i>woman</a>
                    <a href="#" class="glyphicons no-js file"><i></i>file</a>
                    <a href="#" class="glyphicons no-js coins"><i></i>coins</a>
                    <a href="#" class="glyphicons no-js airplane"><i></i>airplane</a>
                    <a href="#" class="glyphicons no-js notes"><i></i>notes</a>
                    <a href="#" class="glyphicons no-js stats"><i></i>stats</a>
                    <a href="#" class="glyphicons no-js charts"><i></i>charts</a>
                    <a href="#" class="glyphicons no-js pie_chart"><i></i>pie_chart</a>
                    <a href="#" class="glyphicons no-js group"><i></i>group</a>
                    <a href="#" class="glyphicons no-js keys"><i></i>keys</a>
                    <a href="#" class="glyphicons no-js calendar"><i></i>calendar</a>
                    <a href="#" class="glyphicons no-js router"><i></i>router</a>
                    <a href="#" class="glyphicons no-js camera_small"><i></i>camera_small</a>
                    <a href="#" class="glyphicons no-js dislikes"><i></i>dislikes</a>
                    <a href="#" class="glyphicons no-js star"><i></i>star</a>
                    <a href="#" class="glyphicons no-js link"><i></i>link</a>
                    <a href="#" class="glyphicons no-js eye_open"><i></i>eye_open</a>
                    <a href="#" class="glyphicons no-js eye_close"><i></i>eye_close</a>
                    <a href="#" class="glyphicons no-js alarm"><i></i>alarm</a>
                    <a href="#" class="glyphicons no-js clock"><i></i>clock</a>
                    <a href="#" class="glyphicons no-js stopwatch"><i></i>stopwatch</a>
                    <a href="#" class="glyphicons no-js projector"><i></i>projector</a>
                    <a href="#" class="glyphicons no-js history"><i></i>history</a>
                    <a href="#" class="glyphicons no-js truck"><i></i>truck</a>
                    <a href="#" class="glyphicons no-js cargo"><i></i>cargo</a>
                    <a href="#" class="glyphicons no-js compass"><i></i>compass</a>
                    <a href="#" class="glyphicons no-js keynote"><i></i>keynote</a>
                    <a href="#" class="glyphicons no-js paperclip"><i></i>paperclip</a>
                    <a href="#" class="glyphicons no-js power"><i></i>power</a>
                    <a href="#" class="glyphicons no-js lightbulb"><i></i>lightbulb</a>
                    <a href="#" class="glyphicons no-js tag"><i></i>tag</a>
                    <a href="#" class="glyphicons no-js tags"><i></i>tags</a>
                    <a href="#" class="glyphicons no-js cleaning"><i></i>cleaning</a>
                    <a href="#" class="glyphicons no-js ruller"><i></i>ruller</a>
                    <a href="#" class="glyphicons no-js gift"><i></i>gift</a>
                    <a href="#" class="glyphicons no-js umbrella"><i></i>umbrella</a>
                    <a href="#" class="glyphicons no-js book"><i></i>book</a>
                    <a href="#" class="glyphicons no-js bookmark"><i></i>bookmark</a>
                    <a href="#" class="glyphicons no-js wifi"><i></i>wifi</a>
                    <a href="#" class="glyphicons no-js cup"><i></i>cup</a>
                    <a href="#" class="glyphicons no-js stroller"><i></i>stroller</a>
                    <a href="#" class="glyphicons no-js headphones"><i></i>headphones</a>
                    <a href="#" class="glyphicons no-js headset"><i></i>headset</a>
                    <a href="#" class="glyphicons no-js warning_sign"><i></i>warning_sign</a>
                    <a href="#" class="glyphicons no-js signal"><i></i>signal</a>
                    <a href="#" class="glyphicons no-js retweet"><i></i>retweet</a>
                    <a href="#" class="glyphicons no-js refresh"><i></i>refresh</a>
                    <a href="#" class="glyphicons no-js roundabout"><i></i>roundabout</a>
                    <a href="#" class="glyphicons no-js random"><i></i>random</a>
                    <a href="#" class="glyphicons no-js heat"><i></i>heat</a>
                    <a href="#" class="glyphicons no-js repeat"><i></i>repeat</a>
                    <a href="#" class="glyphicons no-js display"><i></i>display</a>
                    <a href="#" class="glyphicons no-js log_book"><i></i>log_book</a>
                    <a href="#" class="glyphicons no-js adress_book"><i></i>adress_book</a>
                    <a href="#" class="glyphicons no-js building"><i></i>building</a>
                    <a href="#" class="glyphicons no-js eyedropper"><i></i>eyedropper</a>
                    <a href="#" class="glyphicons no-js adjust"><i></i>adjust</a>
                    <a href="#" class="glyphicons no-js tint"><i></i>tint</a>
                    <a href="#" class="glyphicons no-js crop"><i></i>crop</a>
                    <a href="#" class="glyphicons no-js vector_path_square"><i></i>vector_path_square</a>
                    <a href="#" class="glyphicons no-js vector_path_circle"><i></i>vector_path_circle</a>
                    <a href="#" class="glyphicons no-js vector_path_polygon"><i></i>vector_path_polygon</a>
                    <a href="#" class="glyphicons no-js vector_path_line"><i></i>vector_path_line</a>
                    <a href="#" class="glyphicons no-js vector_path_curve"><i></i>vector_path_curve</a>
                    <a href="#" class="glyphicons no-js vector_path_all"><i></i>vector_path_all</a>
                    <a href="#" class="glyphicons no-js font"><i></i>font</a>
                    <a href="#" class="glyphicons no-js italic"><i></i>italic</a>
                    <a href="#" class="glyphicons no-js bold"><i></i>bold</a>
                    <a href="#" class="glyphicons no-js text_underline"><i></i>text_underline</a>
                    <a href="#" class="glyphicons no-js text_strike"><i></i>text_strike</a>
                    <a href="#" class="glyphicons no-js text_height"><i></i>text_height</a>
                    <a href="#" class="glyphicons no-js text_width"><i></i>text_width</a>
                    <a href="#" class="glyphicons no-js text_resize"><i></i>text_resize</a>
                    <a href="#" class="glyphicons no-js left_indent"><i></i>left_indent</a>
                    <a href="#" class="glyphicons no-js right_indent"><i></i>right_indent</a>
                    <a href="#" class="glyphicons no-js align_left"><i></i>align_left</a>
                    <a href="#" class="glyphicons no-js align_center"><i></i>align_center</a>
                    <a href="#" class="glyphicons no-js align_right"><i></i>align_right</a>
                    <a href="#" class="glyphicons no-js justify"><i></i>justify</a>
                    <a href="#" class="glyphicons no-js list"><i></i>list</a>
                    <a href="#" class="glyphicons no-js text_smaller"><i></i>text_smaller</a>
                    <a href="#" class="glyphicons no-js text_bigger"><i></i>text_bigger</a>
                    <a href="#" class="glyphicons no-js embed"><i></i>embed</a>
                    <a href="#" class="glyphicons no-js embed_close"><i></i>embed_close</a>
                    <a href="#" class="glyphicons no-js table"><i></i>table</a>
                    <a href="#" class="glyphicons no-js message_full"><i></i>message_full</a>
                    <a href="#" class="glyphicons no-js message_empty"><i></i>message_empty</a>
                    <a href="#" class="glyphicons no-js message_in"><i></i>message_in</a>
                    <a href="#" class="glyphicons no-js message_out"><i></i>message_out</a>
                    <a href="#" class="glyphicons no-js message_plus"><i></i>message_plus</a>
                    <a href="#" class="glyphicons no-js message_minus"><i></i>message_minus</a>
                    <a href="#" class="glyphicons no-js message_ban"><i></i>message_ban</a>
                    <a href="#" class="glyphicons no-js message_flag"><i></i>message_flag</a>
                    <a href="#" class="glyphicons no-js message_lock"><i></i>message_lock</a>
                    <a href="#" class="glyphicons no-js message_new"><i></i>message_new</a>
                    <a href="#" class="glyphicons no-js inbox"><i></i>inbox</a>
                    <a href="#" class="glyphicons no-js inbox_plus"><i></i>inbox_plus</a>
                    <a href="#" class="glyphicons no-js inbox_minus"><i></i>inbox_minus</a>
                    <a href="#" class="glyphicons no-js inbox_lock"><i></i>inbox_lock</a>
                    <a href="#" class="glyphicons no-js inbox_in"><i></i>inbox_in</a>
                    <a href="#" class="glyphicons no-js inbox_out"><i></i>inbox_out</a>
                    <a href="#" class="glyphicons no-js cogwheel"><i></i>cogwheel</a>
                    <a href="#" class="glyphicons no-js cogwheels"><i></i>cogwheels</a>
                    <a href="#" class="glyphicons no-js picture"><i></i>picture</a>
                    <a href="#" class="glyphicons no-js adjust_alt"><i></i>adjust_alt</a>
                    <a href="#" class="glyphicons no-js database_lock"><i></i>database_lock</a>
                    <a href="#" class="glyphicons no-js database_plus"><i></i>database_plus</a>
                    <a href="#" class="glyphicons no-js database_minus"><i></i>database_minus</a>
                    <a href="#" class="glyphicons no-js database_ban"><i></i>database_ban</a>
                    <a href="#" class="glyphicons no-js folder_open"><i></i>folder_open</a>
                    <a href="#" class="glyphicons no-js folder_plus"><i></i>folder_plus</a>
                    <a href="#" class="glyphicons no-js folder_minus"><i></i>folder_minus</a>
                    <a href="#" class="glyphicons no-js folder_lock"><i></i>folder_lock</a>
                    <a href="#" class="glyphicons no-js folder_flag"><i></i>folder_flag</a>
                    <a href="#" class="glyphicons no-js folder_new"><i></i>folder_new</a>
                    <a href="#" class="glyphicons no-js edit"><i></i>edit</a>
                    <a href="#" class="glyphicons no-js new_window"><i></i>new_window</a>
                    <a href="#" class="glyphicons no-js check"><i></i>check</a>
                    <a href="#" class="glyphicons no-js unchecked"><i></i>unchecked</a>
                    <a href="#" class="glyphicons no-js more_windows"><i></i>more_windows</a>
                    <a href="#" class="glyphicons no-js show_big_thumbnails"><i></i>show_big_thumbnails</a>
                    <a href="#" class="glyphicons no-js show_thumbnails"><i></i>show_thumbnails</a>
                    <a href="#" class="glyphicons no-js show_thumbnails_with_lines"><i></i>show_thumbnails_with_lines</a>
                    <a href="#" class="glyphicons no-js show_lines"><i></i>show_lines</a>
                    <a href="#" class="glyphicons no-js playlist"><i></i>playlist</a>
                    <a href="#" class="glyphicons no-js imac"><i></i>imac</a>
                    <a href="#" class="glyphicons no-js macbook"><i></i>macbook</a>
                    <a href="#" class="glyphicons no-js ipad"><i></i>ipad</a>
                    <a href="#" class="glyphicons no-js iphone"><i></i>iphone</a>
                    <a href="#" class="glyphicons no-js iphone_transfer"><i></i>iphone_transfer</a>
                    <a href="#" class="glyphicons no-js iphone_exchange"><i></i>iphone_exchange</a>
                    <a href="#" class="glyphicons no-js ipod"><i></i>ipod</a>
                    <a href="#" class="glyphicons no-js ipod_shuffle"><i></i>ipod_shuffle</a>
                    <a href="#" class="glyphicons no-js ear_plugs"><i></i>ear_plugs</a>
                    <a href="#" class="glyphicons no-js phone"><i></i>phone</a>
                    <a href="#" class="glyphicons no-js step_backward"><i></i>step_backward</a>
                    <a href="#" class="glyphicons no-js fast_backward"><i></i>fast_backward</a>
                    <a href="#" class="glyphicons no-js rewind"><i></i>rewind</a>
                    <a href="#" class="glyphicons no-js play"><i></i>play</a>
                    <a href="#" class="glyphicons no-js pause"><i></i>pause</a>
                    <a href="#" class="glyphicons no-js stop"><i></i>stop</a>
                    <a href="#" class="glyphicons no-js forward"><i></i>forward</a>
                    <a href="#" class="glyphicons no-js fast_forward"><i></i>fast_forward</a>
                    <a href="#" class="glyphicons no-js step_forward"><i></i>step_forward</a>
                    <a href="#" class="glyphicons no-js eject"><i></i>eject</a>
                    <a href="#" class="glyphicons no-js facetime_video"><i></i>facetime_video</a>
                    <a href="#" class="glyphicons no-js download_alt"><i></i>download_alt</a>
                    <a href="#" class="glyphicons no-js mute"><i></i>mute</a>
                    <a href="#" class="glyphicons no-js volume_down"><i></i>volume_down</a>
                    <a href="#" class="glyphicons no-js volume_up"><i></i>volume_up</a>
                    <a href="#" class="glyphicons no-js screenshot"><i></i>screenshot</a>
                    <a href="#" class="glyphicons no-js move"><i></i>move</a>
                    <a href="#" class="glyphicons no-js more"><i></i>more</a>
                    <a href="#" class="glyphicons no-js brightness_reduce"><i></i>brightness_reduce</a>
                    <a href="#" class="glyphicons no-js brightness_increase"><i></i>brightness_increase</a>
                    <a href="#" class="glyphicons no-js circle_plus"><i></i>circle_plus</a>
                    <a href="#" class="glyphicons no-js circle_minus"><i></i>circle_minus</a>
                    <a href="#" class="glyphicons no-js circle_remove"><i></i>circle_remove</a>
                    <a href="#" class="glyphicons no-js circle_ok"><i></i>circle_ok</a>
                    <a href="#" class="glyphicons no-js circle_question_mark"><i></i>circle_question_mark</a>
                    <a href="#" class="glyphicons no-js circle_info"><i></i>circle_info</a>
                    <a href="#" class="glyphicons no-js circle_exclamation_mark"><i></i>circle_exclamation_mark</a>
                    <a href="#" class="glyphicons no-js remove"><i></i>remove</a>
                    <a href="#" class="glyphicons no-js ok"><i></i>ok</a>
                    <a href="#" class="glyphicons no-js ban"><i></i>ban</a>
                    <a href="#" class="glyphicons no-js download"><i></i>download</a>
                    <a href="#" class="glyphicons no-js upload"><i></i>upload</a>
                    <a href="#" class="glyphicons no-js shopping_cart"><i></i>shopping_cart</a>
                    <a href="#" class="glyphicons no-js lock"><i></i>lock</a>
                    <a href="#" class="glyphicons no-js unlock"><i></i>unlock</a>
                    <a href="#" class="glyphicons no-js electricity"><i></i>electricity</a>
                    <a href="#" class="glyphicons no-js ok_2"><i></i>ok_2</a>
                    <a href="#" class="glyphicons no-js remove_2"><i></i>remove_2</a>
                    <a href="#" class="glyphicons no-js cart_out"><i></i>cart_out</a>
                    <a href="#" class="glyphicons no-js cart_in"><i></i>cart_in</a>
                    <a href="#" class="glyphicons no-js left_arrow"><i></i>left_arrow</a>
                    <a href="#" class="glyphicons no-js right_arrow"><i></i>right_arrow</a>
                    <a href="#" class="glyphicons no-js down_arrow"><i></i>down_arrow</a>
                    <a href="#" class="glyphicons no-js up_arrow"><i></i>up_arrow</a>
                    <a href="#" class="glyphicons no-js resize_small"><i></i>resize_small</a>
                    <a href="#" class="glyphicons no-js resize_full"><i></i>resize_full</a>
                    <a href="#" class="glyphicons no-js circle_arrow_left"><i></i>circle_arrow_left</a>
                    <a href="#" class="glyphicons no-js circle_arrow_right"><i></i>circle_arrow_right</a>
                    <a href="#" class="glyphicons no-js circle_arrow_top"><i></i>circle_arrow_top</a>
                    <a href="#" class="glyphicons no-js circle_arrow_down"><i></i>circle_arrow_down</a>
                    <a href="#" class="glyphicons no-js play_button"><i></i>play_button</a>
                    <a href="#" class="glyphicons no-js unshare"><i></i>unshare</a>
                    <a href="#" class="glyphicons no-js share"><i></i>share</a>
                    <a href="#" class="glyphicons no-js chevron-right"><i></i>chevron-right</a>
                    <a href="#" class="glyphicons no-js chevron-left"><i></i>chevron-left</a>
                    <a href="#" class="glyphicons no-js bluetooth"><i></i>bluetooth</a>
                    <a href="#" class="glyphicons no-js euro"><i></i>euro</a>
                    <a href="#" class="glyphicons no-js usd"><i></i>usd</a>
                    <a href="#" class="glyphicons no-js gbp"><i></i>gbp</a>
                    <a href="#" class="glyphicons no-js retweet_2"><i></i>retweet_2</a>
                    <a href="#" class="glyphicons no-js moon"><i></i>moon</a>
                    <a href="#" class="glyphicons no-js sun"><i></i>sun</a>
                    <a href="#" class="glyphicons no-js cloud"><i></i>cloud</a>
                    <a href="#" class="glyphicons no-js direction"><i></i>direction</a>
                    <a href="#" class="glyphicons no-js brush"><i></i>brush</a>
                    <a href="#" class="glyphicons no-js pen"><i></i>pen</a>
                    <a href="#" class="glyphicons no-js zoom_in"><i></i>zoom_in</a>
                    <a href="#" class="glyphicons no-js zoom_out"><i></i>zoom_out</a>
                    <a href="#" class="glyphicons no-js pin"><i></i>pin</a>
                    <a href="#" class="glyphicons no-js albums"><i></i>albums</a>
                    <a href="#" class="glyphicons no-js rotation_lock"><i></i>rotation_lock</a>
                    <a href="#" class="glyphicons no-js flash"><i></i>flash</a>
                    <a href="#" class="glyphicons no-js google_maps"><i></i>google_maps</a>
                    <a href="#" class="glyphicons no-js anchor"><i></i>anchor</a>
                    <a href="#" class="glyphicons no-js conversation"><i></i>conversation</a>
                    <a href="#" class="glyphicons no-js chat"><i></i>chat</a>
                    <a href="#" class="glyphicons no-js male"><i></i>male</a>
                    <a href="#" class="glyphicons no-js female"><i></i>female</a>
                    <a href="#" class="glyphicons no-js asterisk"><i></i>asterisk</a>
                    <a href="#" class="glyphicons no-js divide"><i></i>divide</a>
                    <a href="#" class="glyphicons no-js snorkel_diving"><i></i>snorkel_diving</a>
                    <a href="#" class="glyphicons no-js scuba_diving"><i></i>scuba_diving</a>
                    <a href="#" class="glyphicons no-js oxygen_bottle"><i></i>oxygen_bottle</a>
                    <a href="#" class="glyphicons no-js fins"><i></i>fins</a>
                    <a href="#" class="glyphicons no-js fishes"><i></i>fishes</a>
                    <a href="#" class="glyphicons no-js boat"><i></i>boat</a>
                    <a href="#" class="glyphicons no-js delete"><i></i>delete</a>
                    <a href="#" class="glyphicons no-js sheriffs_star"><i></i>sheriffs_star</a>
                    <a href="#" class="glyphicons no-js qrcode"><i></i>qrcode</a>
                    <a href="#" class="glyphicons no-js barcode"><i></i>barcode</a>
                    <a href="#" class="glyphicons no-js pool"><i></i>pool</a>
                    <a href="#" class="glyphicons no-js buoy"><i></i>buoy</a>
                    <a href="#" class="glyphicons no-js spade"><i></i>spade</a>
                    <a href="#" class="glyphicons no-js bank"><i></i>bank</a>
                    <a href="#" class="glyphicons no-js vcard"><i></i>vcard</a>
                    <a href="#" class="glyphicons no-js electrical_plug"><i></i>electrical_plug</a>
                    <a href="#" class="glyphicons no-js flag"><i></i>flag</a>
                    <a href="#" class="glyphicons no-js credit_card"><i></i>credit_card</a>
                    <a href="#" class="glyphicons no-js keyboard-wireless"><i></i>keyboard-wireless</a>
                    <a href="#" class="glyphicons no-js keyboard-wired"><i></i>keyboard-wired</a>
                    <a href="#" class="glyphicons no-js shield"><i></i>shield</a>
                    <a href="#" class="glyphicons no-js ring"><i></i>ring</a>
                    <a href="#" class="glyphicons no-js cake"><i></i>cake</a>
                    <a href="#" class="glyphicons no-js drink"><i></i>drink</a>
                    <a href="#" class="glyphicons no-js beer"><i></i>beer</a>
                    <a href="#" class="glyphicons no-js fast_food"><i></i>fast_food</a>
                    <a href="#" class="glyphicons no-js cutlery"><i></i>cutlery</a>
                    <a href="#" class="glyphicons no-js pizza"><i></i>pizza</a>
                    <a href="#" class="glyphicons no-js birthday_cake"><i></i>birthday_cake</a>
                    <a href="#" class="glyphicons no-js tablet"><i></i>tablet</a>
                    <a href="#" class="glyphicons no-js settings"><i></i>settings</a>
                    <a href="#" class="glyphicons no-js bullets"><i></i>bullets</a>
                    <a href="#" class="glyphicons no-js cardio"><i></i>cardio</a>
                    <a href="#" class="glyphicons no-js t-shirt"><i></i>t-shirt</a>
                    <a href="#" class="glyphicons no-js pants"><i></i>pants</a>
                    <a href="#" class="glyphicons no-js sweater"><i></i>sweater</a>
                    <a href="#" class="glyphicons no-js fabric"><i></i>fabric</a>
                    <a href="#" class="glyphicons no-js leather"><i></i>leather</a>
                    <a href="#" class="glyphicons no-js scissors"><i></i>scissors</a>
                    <a href="#" class="glyphicons no-js bomb"><i></i>bomb</a>
                    <a href="#" class="glyphicons no-js skull"><i></i>skull</a>
                    <a href="#" class="glyphicons no-js celebration"><i></i>celebration</a>
                    <a href="#" class="glyphicons no-js tea_kettle"><i></i>tea_kettle</a>
                    <a href="#" class="glyphicons no-js french_press"><i></i>french_press</a>
                    <a href="#" class="glyphicons no-js coffe_cup"><i></i>coffe_cup</a>
                    <a href="#" class="glyphicons no-js pot"><i></i>pot</a>
                    <a href="#" class="glyphicons no-js grater"><i></i>grater</a>
                    <a href="#" class="glyphicons no-js kettle"><i></i>kettle</a>
                    <a href="#" class="glyphicons no-js hospital"><i></i>hospital</a>
                    <a href="#" class="glyphicons no-js hospital_h"><i></i>hospital_h</a>
                    <a href="#" class="glyphicons no-js microphone"><i></i>microphone</a>
                    <a href="#" class="glyphicons no-js webcam"><i></i>webcam</a>
                    <a href="#" class="glyphicons no-js temple_christianity_church"><i></i>temple_christianity_church</a>
                    <a href="#" class="glyphicons no-js temple_islam"><i></i>temple_islam</a>
                    <a href="#" class="glyphicons no-js temple_hindu"><i></i>temple_hindu</a>
                    <a href="#" class="glyphicons no-js temple_buddhist"><i></i>temple_buddhist</a>
                    <a href="#" class="glyphicons no-js bicycle"><i></i>bicycle</a>
                    <a href="#" class="glyphicons no-js life_preserver"><i></i>life_preserver</a>
                    <a href="#" class="glyphicons no-js share_alt"><i></i>share_alt</a>
                    <a href="#" class="glyphicons no-js comments"><i></i>comments</a>
                    <a href="#" class="glyphicons no-js flower"><i></i>flower</a>
                    <a href="#" class="glyphicons no-js baseball"><i></i>baseball</a>
                    <a href="#" class="glyphicons no-js rugby"><i></i>rugby</a>
                    <a href="#" class="glyphicons no-js ax"><i></i>ax</a>
                    <a href="#" class="glyphicons no-js table_tennis"><i></i>table_tennis</a>
                    <a href="#" class="glyphicons no-js bowling"><i></i>bowling</a>
                    <a href="#" class="glyphicons no-js tree_conifer"><i></i>tree_conifer</a>
                    <a href="#" class="glyphicons no-js tree_deciduous"><i></i>tree_deciduous</a>
                    <a href="#" class="glyphicons no-js more_items"><i></i>more_items</a>
                    <a href="#" class="glyphicons no-js sort"><i></i>sort</a>
                    <a href="#" class="glyphicons no-js filter"><i></i>filter</a>
                    <a href="#" class="glyphicons no-js gamepad"><i></i>gamepad</a>
                    <a href="#" class="glyphicons no-js playing_dices"><i></i>playing_dices</a>
                    <a href="#" class="glyphicons no-js calculator"><i></i>calculator</a>
                    <a href="#" class="glyphicons no-js tie"><i></i>tie</a>
                    <a href="#" class="glyphicons no-js wallet"><i></i>wallet</a>
                    <a href="#" class="glyphicons no-js piano"><i></i>piano</a>
                    <a href="#" class="glyphicons no-js sampler"><i></i>sampler</a>
                    <a href="#" class="glyphicons no-js podium"><i></i>podium</a>
                    <a href="#" class="glyphicons no-js soccer_ball"><i></i>soccer_ball</a>
                    <a href="#" class="glyphicons no-js blog"><i></i>blog</a>
                    <a href="#" class="glyphicons no-js dashboard"><i></i>dashboard</a>
                    <a href="#" class="glyphicons no-js certificate"><i></i>certificate</a>
                    <a href="#" class="glyphicons no-js bell"><i></i>bell</a>
                    <a href="#" class="glyphicons no-js candle"><i></i>candle</a>
                    <a href="#" class="glyphicons no-js pushpin"><i></i>pushpin</a>
                    <a href="#" class="glyphicons no-js iphone_shake"><i></i>iphone_shake</a>
                    <a href="#" class="glyphicons no-js pin_flag"><i></i>pin_flag</a>
                    <a href="#" class="glyphicons no-js turtle"><i></i>turtle</a>
                    <a href="#" class="glyphicons no-js rabbit"><i></i>rabbit</a>
                    <a href="#" class="glyphicons no-js globe"><i></i>globe</a>
                    <a href="#" class="glyphicons no-js briefcase"><i></i>briefcase</a>
                    <a href="#" class="glyphicons no-js hdd"><i></i>hdd</a>
                    <a href="#" class="glyphicons no-js thumbs_up"><i></i>thumbs_up</a>
                    <a href="#" class="glyphicons no-js thumbs_down"><i></i>thumbs_down</a>
                    <a href="#" class="glyphicons no-js hand_right"><i></i>hand_right</a>
                    <a href="#" class="glyphicons no-js hand_left"><i></i>hand_left</a>
                    <a href="#" class="glyphicons no-js hand_up"><i></i>hand_up</a>
                    <a href="#" class="glyphicons no-js hand_down"><i></i>hand_down</a>
                    <a href="#" class="glyphicons no-js fullscreen"><i></i>fullscreen</a>
                    <a href="#" class="glyphicons no-js shopping_bag"><i></i>shopping_bag</a>
                    <a href="#" class="glyphicons no-js book_open"><i></i>book_open</a>
                    <a href="#" class="glyphicons no-js nameplate"><i></i>nameplate</a>
                    <a href="#" class="glyphicons no-js nameplate_alt"><i></i>nameplate_alt</a>
                    <a href="#" class="glyphicons no-js vases"><i></i>vases</a>
                    <a href="#" class="glyphicons no-js bullhorn"><i></i>bullhorn</a>
                    <a href="#" class="glyphicons no-js dumbbell"><i></i>dumbbell</a>
                    <a href="#" class="glyphicons no-js suitcase"><i></i>suitcase</a>
                    <a href="#" class="glyphicons no-js file_import"><i></i>file_import</a>
                    <a href="#" class="glyphicons no-js file_export"><i></i>file_export</a>
                    <a href="#" class="glyphicons no-js bug"><i></i>bug</a>
                    <a href="#" class="glyphicons no-js crown"><i></i>crown</a>
                    <a href="#" class="glyphicons no-js smoking"><i></i>smoking</a>
                    <a href="#" class="glyphicons no-js cloud-upload"><i></i>cloud-upload</a>
                    <a href="#" class="glyphicons no-js cloud-download"><i></i>cloud-download</a>
                    <a href="#" class="glyphicons no-js restart"><i></i>restart</a>
                    <a href="#" class="glyphicons no-js security_camera"><i></i>security_camera</a>
                    <a href="#" class="glyphicons no-js expand"><i></i>expand</a>
                    <a href="#" class="glyphicons no-js collapse"><i></i>collapse</a>
                    <a href="#" class="glyphicons no-js collapse_top"><i></i>collapse_top</a>
                    <a href="#" class="glyphicons no-js globe_af"><i></i>globe_af</a>
                    <a href="#" class="glyphicons no-js global"><i></i>global</a>
                    <a href="#" class="glyphicons no-js spray"><i></i>spray</a>
                    <a href="#" class="glyphicons no-js nails"><i></i>nails</a>
                    <a href="#" class="glyphicons no-js claw_hammer"><i></i>claw_hammer</a>
                    <a href="#" class="glyphicons no-js classic_hammer"><i></i>classic_hammer</a>
                    <a href="#" class="glyphicons no-js hand_saw"><i></i>hand_saw</a>
                    <a href="#" class="glyphicons no-js riflescope"><i></i>riflescope</a>
                    <a href="#" class="glyphicons no-js electrical_socket_eu"><i></i>electrical_socket_eu</a>
                    <a href="#" class="glyphicons no-js electrical_socket_us"><i></i>electrical_socket_us</a>
                    <a href="#" class="glyphicons no-js pinterest"><i></i>pinterest</a>
                    <a href="#" class="glyphicons no-js dropbox"><i></i>dropbox</a>
                    <a href="#" class="glyphicons no-js google_plus"><i></i>google_plus</a>
                    <a href="#" class="glyphicons no-js jolicloud"><i></i>jolicloud</a>
                    <a href="#" class="glyphicons no-js yahoo"><i></i>yahoo</a>
                    <a href="#" class="glyphicons no-js blogger"><i></i>blogger</a>
                    <a href="#" class="glyphicons no-js picasa"><i></i>picasa</a>
                    <a href="#" class="glyphicons no-js amazon"><i></i>amazon</a>
                    <a href="#" class="glyphicons no-js tumblr"><i></i>tumblr</a>
                    <a href="#" class="glyphicons no-js wordpress"><i></i>wordpress</a>
                    <a href="#" class="glyphicons no-js instapaper"><i></i>instapaper</a>
                    <a href="#" class="glyphicons no-js evernote"><i></i>evernote</a>
                    <a href="#" class="glyphicons no-js xing"><i></i>xing</a>
                    <a href="#" class="glyphicons no-js zootool"><i></i>zootool</a>
                    <a href="#" class="glyphicons no-js dribbble"><i></i>dribbble</a>
                    <a href="#" class="glyphicons no-js deviantart"><i></i>deviantart</a>
                    <a href="#" class="glyphicons no-js read_it_later"><i></i>read_it_later</a>
                    <a href="#" class="glyphicons no-js linked_in"><i></i>linked_in</a>
                    <a href="#" class="glyphicons no-js forrst"><i></i>forrst</a>
                    <a href="#" class="glyphicons no-js pinboard"><i></i>pinboard</a>
                    <a href="#" class="glyphicons no-js behance"><i></i>behance</a>
                    <a href="#" class="glyphicons no-js github"><i></i>github</a>
                    <a href="#" class="glyphicons no-js youtube"><i></i>youtube</a>
                    <a href="#" class="glyphicons no-js skitch"><i></i>skitch</a>
                    <a href="#" class="glyphicons no-js foursquare"><i></i>foursquare</a>
                    <a href="#" class="glyphicons no-js quora"><i></i>quora</a>
                    <a href="#" class="glyphicons no-js badoo"><i></i>badoo</a>
                    <a href="#" class="glyphicons no-js spotify"><i></i>spotify</a>
                    <a href="#" class="glyphicons no-js stumbleupon"><i></i>stumbleupon</a>
                    <a href="#" class="glyphicons no-js readability"><i></i>readability</a>
                    <a href="#" class="glyphicons no-js facebook"><i></i>facebook</a>
                    <a href="#" class="glyphicons no-js twitter"><i></i>twitter</a>
                    <a href="#" class="glyphicons no-js instagram"><i></i>instagram</a>
                    <a href="#" class="glyphicons no-js posterous_spaces"><i></i>posterous_spaces</a>
                    <a href="#" class="glyphicons no-js vimeo"><i></i>vimeo</a>
                    <a href="#" class="glyphicons no-js flickr"><i></i>flickr</a>
                    <a href="#" class="glyphicons no-js last_fm"><i></i>last_fm</a>
                    <a href="#" class="glyphicons no-js rss"><i></i>rss</a>
                    <a href="#" class="glyphicons no-js skype"><i></i>skype</a>
                    <a href="#" class="glyphicons no-js e-mail"><i></i>e-mail</a>
                  </div>
                </div>
                <div class="tab-pane halfings-demo" id="tab_1_3">
                  <h3>Image</h3>
                  <p><i class="halflings-icon glass"></i>glass</p>
                  <p><i class="halflings-icon music"></i>music</p>
                  <p><i class="halflings-icon search"></i>search</p>
                  <p><i class="halflings-icon envelope"></i>envelope</p>
                  <p><i class="halflings-icon heart"></i>heart</p>
                  <p><i class="halflings-icon star"></i>star</p>
                  <p><i class="halflings-icon star-empty"></i>star-empty</p>
                  <p><i class="halflings-icon user"></i>user</p>
                  <p><i class="halflings-icon film"></i>film</p>
                  <p><i class="halflings-icon th-large"></i>th-large</p>
                  <p><i class="halflings-icon th"></i>th</p>
                  <p><i class="halflings-icon th-list"></i>th-list</p>
                  <p><i class="halflings-icon ok"></i>ok</p>
                  <p><i class="halflings-icon remove"></i>remove</p>
                  <p><i class="halflings-icon zoom-in"></i>zoom-in</p>
                  <p><i class="halflings-icon zoom-out"></i>zoom-out</p>
                  <p><i class="halflings-icon off"></i>off</p>
                  <p><i class="halflings-icon signal"></i>signal</p>
                  <p><i class="halflings-icon cog"></i>cog</p>
                  <p><i class="halflings-icon trash"></i>trash</p>
                  <p><i class="halflings-icon home"></i>home</p>
                  <p><i class="halflings-icon file"></i>file</p>
                  <p><i class="halflings-icon time"></i>time</p>
                  <p><i class="halflings-icon road"></i>road</p>
                  <p><i class="halflings-icon download-alt"></i>download-alt</p>
                  <p><i class="halflings-icon download"></i>download</p>
                  <p><i class="halflings-icon upload"></i>upload</p>
                  <p><i class="halflings-icon inbox"></i>inbox</p>
                  <p><i class="halflings-icon play-circle"></i>play-circle</p>
                  <p><i class="halflings-icon repeat"></i>repeat</p>
                  <p><i class="halflings-icon refresh"></i>refresh</p>
                  <p><i class="halflings-icon list-alt"></i>list-alt</p>
                  <p><i class="halflings-icon lock"></i>lock</p>
                  <p><i class="halflings-icon flag"></i>flag</p>
                  <p><i class="halflings-icon headphones"></i>headphones</p>
                  <p><i class="halflings-icon volume-off"></i>volume-off</p>
                  <p><i class="halflings-icon volume-down"></i>volume-down</p>
                  <p><i class="halflings-icon volume-up"></i>volume-up</p>
                  <p><i class="halflings-icon qrcode"></i>qrcode</p>
                  <p><i class="halflings-icon barcode"></i>barcode</p>
                  <p><i class="halflings-icon tag"></i>tag</p>
                  <p><i class="halflings-icon tags"></i>tags</p>
                  <p><i class="halflings-icon book"></i>book</p>
                  <p><i class="halflings-icon bookmark"></i>bookmark</p>
                  <p><i class="halflings-icon print"></i>print</p>
                  <p><i class="halflings-icon camera"></i>camera</p>
                  <p><i class="halflings-icon font"></i>font</p>
                  <p><i class="halflings-icon bold"></i>bold</p>
                  <p><i class="halflings-icon italic"></i>italic</p>
                  <p><i class="halflings-icon text-height"></i>text-height</p>
                  <p><i class="halflings-icon text-width"></i>text-width</p>
                  <p><i class="halflings-icon align-left"></i>align-left</p>
                  <p><i class="halflings-icon align-center"></i>align-center</p>
                  <p><i class="halflings-icon align-right"></i>align-right</p>
                  <p><i class="halflings-icon align-justify"></i>align-justify</p>
                  <p><i class="halflings-icon list"></i>list</p>
                  <p><i class="halflings-icon indent-left"></i>indent-left</p>
                  <p><i class="halflings-icon indent-right"></i>indent-right</p>
                  <p><i class="halflings-icon facetime-video"></i>facetime-video</p>
                  <p><i class="halflings-icon picture"></i>picture</p>
                  <p><i class="halflings-icon pencil"></i>pencil</p>
                  <p><i class="halflings-icon map-marker"></i>map-marker</p>
                  <p><i class="halflings-icon adjust"></i>adjust</p>
                  <p><i class="halflings-icon tint"></i>tint</p>
                  <p><i class="halflings-icon edit"></i>edit</p>
                  <p><i class="halflings-icon share"></i>share</p>
                  <p><i class="halflings-icon check"></i>check</p>
                  <p><i class="halflings-icon move"></i>move</p>
                  <p><i class="halflings-icon step-backward"></i>step-backward</p>
                  <p><i class="halflings-icon fast-backward"></i>fast-backward</p>
                  <p><i class="halflings-icon backward"></i>backward</p>
                  <p><i class="halflings-icon play"></i>play</p>
                  <p><i class="halflings-icon pause"></i>pause</p>
                  <p><i class="halflings-icon stop"></i>stop</p>
                  <p><i class="halflings-icon forward"></i>forward</p>
                  <p><i class="halflings-icon fast-forward"></i>fast-forward</p>
                  <p><i class="halflings-icon step-forward"></i>step-forward</p>
                  <p><i class="halflings-icon eject"></i>eject</p>
                  <p><i class="halflings-icon chevron-left"></i>chevron-left</p>
                  <p><i class="halflings-icon chevron-right"></i>chevron-right</p>
                  <p><i class="halflings-icon plus-sign"></i>plus-sign</p>
                  <p><i class="halflings-icon minus-sign"></i>minus-sign</p>
                  <p><i class="halflings-icon remove-sign"></i>remove-sign</p>
                  <p><i class="halflings-icon ok-sign"></i>ok-sign</p>
                  <p><i class="halflings-icon question-sign"></i>question-sign</p>
                  <p><i class="halflings-icon info-sign"></i>info-sign</p>
                  <p><i class="halflings-icon screenshot"></i>screenshot</p>
                  <p><i class="halflings-icon remove-circle"></i>remove-circle</p>
                  <p><i class="halflings-icon ok-circle"></i>ok-circle</p>
                  <p><i class="halflings-icon ban-circle"></i>ban-circle</p>
                  <p><i class="halflings-icon arrow-left"></i>arrow-left</p>
                  <p><i class="halflings-icon arrow-right"></i>arrow-right</p>
                  <p><i class="halflings-icon arrow-up"></i>arrow-up</p>
                  <p><i class="halflings-icon arrow-down"></i>arrow-down</p>
                  <p><i class="halflings-icon share-alt"></i>share-alt</p>
                  <p><i class="halflings-icon resize-full"></i>resize-full</p>
                  <p><i class="halflings-icon resize-small"></i>resize-small</p>
                  <p><i class="halflings-icon plus"></i>plus</p>
                  <p><i class="halflings-icon minus"></i>minus</p>
                  <p><i class="halflings-icon asterisk"></i>asterisk</p>
                  <p><i class="halflings-icon exclamation-sign"></i>exclamation-sign</p>
                  <p><i class="halflings-icon gift"></i>gift</p>
                  <p><i class="halflings-icon leaf"></i>leaf</p>
                  <p><i class="halflings-icon fire"></i>fire</p>
                  <p><i class="halflings-icon eye-open"></i>eye-open</p>
                  <p><i class="halflings-icon eye-close"></i>eye-close</p>
                  <p><i class="halflings-icon warning-sign"></i>warning-sign</p>
                  <p><i class="halflings-icon plane"></i>plane</p>
                  <p><i class="halflings-icon calendar"></i>calendar</p>
                  <p><i class="halflings-icon random"></i>random</p>
                  <p><i class="halflings-icon comments"></i>comments</p>
                  <p><i class="halflings-icon magnet"></i>magnet</p>
                  <p><i class="halflings-icon chevron-up"></i>chevron-up</p>
                  <p><i class="halflings-icon chevron-down"></i>chevron-down</p>
                  <p><i class="halflings-icon retweet"></i>retweet</p>
                  <p><i class="halflings-icon shopping-cart"></i>shopping-cart</p>
                  <p><i class="halflings-icon folder-close"></i>folder-close</p>
                  <p><i class="halflings-icon folder-open"></i>folder-open</p>
                  <p><i class="halflings-icon resize-vertical"></i>resize-vertical</p>
                  <p><i class="halflings-icon resize-horizontal"></i>resize-horizontal</p>
                  <p><i class="halflings-icon hdd"></i>hdd</p>
                  <p><i class="halflings-icon bullhorn"></i>bullhorn</p>
                  <p><i class="halflings-icon bell"></i>bell</p>
                  <p><i class="halflings-icon certificate"></i>certificate</p>
                  <p><i class="halflings-icon thumbs-up"></i>thumbs-up</p>
                  <p><i class="halflings-icon thumbs-down"></i>thumbs-down</p>
                  <p><i class="halflings-icon hand-right"></i>hand-right</p>
                  <p><i class="halflings-icon hand-left"></i>hand-left</p>
                  <p><i class="halflings-icon hand-top"></i>hand-top</p>
                  <p><i class="halflings-icon hand-down"></i>hand-down</p>
                  <p><i class="halflings-icon circle-arrow-right"></i>circle-arrow-right</p>
                  <p><i class="halflings-icon circle-arrow-left"></i>circle-arrow-left</p>
                  <p><i class="halflings-icon circle-arrow-top"></i>circle-arrow-top</p>
                  <p><i class="halflings-icon circle-arrow-down"></i>circle-arrow-down</p>
                  <p><i class="halflings-icon globe"></i>globe</p>
                  <p><i class="halflings-icon wrench"></i>wrench</p>
                  <p><i class="halflings-icon tasks"></i>tasks</p>
                  <p><i class="halflings-icon filter"></i>filter</p>
                  <p><i class="halflings-icon briefcase"></i>briefcase</p>
                  <p><i class="halflings-icon fullscreen"></i>fullscreen</p>
                  <p><i class="halflings-icon dashboard"></i>dashboard</p>
                  <p><i class="halflings-icon paperclip"></i>paperclip</p>
                  <p><i class="halflings-icon heart-empty"></i>heart-empty</p>
                  <p><i class="halflings-icon link"></i>link</p>
                  <p><i class="halflings-icon phone"></i>phone</p>
                  <p><i class="halflings-icon pushpin"></i>pushpin</p>
                  <p><i class="halflings-icon euro"></i>euro</p>
                  <p><i class="halflings-icon usd"></i>usd</p>
                  <p><i class="halflings-icon gbp"></i>gbp</p>
                  <p><i class="halflings-icon sort"></i>sort</p>
                  <p><i class="halflings-icon sort-by-alphabet"></i>sort-by-alphabet</p>
                  <p><i class="halflings-icon sort-by-alphabet-alt"></i>sort-by-alphabet-alt</p>
                  <p><i class="halflings-icon sort-by-order"></i>sort-by-order</p>
                  <p><i class="halflings-icon sort-by-order-alt"></i>sort-by-order-alt</p>
                  <p><i class="halflings-icon sort-by-attributes"></i>sort-by-attributes</p>
                  <p><i class="halflings-icon sort-by-attributes-alt"></i>sort-by-attributes-alt</p>
                  <p><i class="halflings-icon unchecked"></i>unchecked</p>
                  <p><i class="halflings-icon expand"></i>expand</p>
                  <p><i class="halflings-icon collapse"></i>collapse</p>
                  <p><i class="halflings-icon collapse-top"></i>collapse-top</p>
                  <br /><br /><br />
                  <div class="white-content">
                    <h3>Image - white</h3>
                    <p><i class="halflings-icon white glass"></i>glass</p>
                    <p><i class="halflings-icon white music"></i>music</p>
                    <p><i class="halflings-icon white search"></i>search</p>
                    <p><i class="halflings-icon white envelope"></i>envelope</p>
                    <p><i class="halflings-icon white heart"></i>heart</p>
                    <p><i class="halflings-icon white star"></i>star</p>
                    <p><i class="halflings-icon white star-empty"></i>star-empty</p>
                    <p><i class="halflings-icon white user"></i>user</p>
                    <p><i class="halflings-icon white film"></i>film</p>
                    <p><i class="halflings-icon white th-large"></i>th-large</p>
                    <p><i class="halflings-icon white th"></i>th</p>
                    <p><i class="halflings-icon white th-list"></i>th-list</p>
                    <p><i class="halflings-icon white ok"></i>ok</p>
                    <p><i class="halflings-icon white remove"></i>remove</p>
                    <p><i class="halflings-icon white zoom-in"></i>zoom-in</p>
                    <p><i class="halflings-icon white zoom-out"></i>zoom-out</p>
                    <p><i class="halflings-icon white off"></i>off</p>
                    <p><i class="halflings-icon white signal"></i>signal</p>
                    <p><i class="halflings-icon white cog"></i>cog</p>
                    <p><i class="halflings-icon white trash"></i>trash</p>
                    <p><i class="halflings-icon white home"></i>home</p>
                    <p><i class="halflings-icon white file"></i>file</p>
                    <p><i class="halflings-icon white time"></i>time</p>
                    <p><i class="halflings-icon white road"></i>road</p>
                    <p><i class="halflings-icon white download-alt"></i>download-alt</p>
                    <p><i class="halflings-icon white download"></i>download</p>
                    <p><i class="halflings-icon white upload"></i>upload</p>
                    <p><i class="halflings-icon white inbox"></i>inbox</p>
                    <p><i class="halflings-icon white play-circle"></i>play-circle</p>
                    <p><i class="halflings-icon white repeat"></i>repeat</p>
                    <p><i class="halflings-icon white refresh"></i>refresh</p>
                    <p><i class="halflings-icon white list-alt"></i>list-alt</p>
                    <p><i class="halflings-icon white lock"></i>lock</p>
                    <p><i class="halflings-icon white flag"></i>flag</p>
                    <p><i class="halflings-icon white headphones"></i>headphones</p>
                    <p><i class="halflings-icon white volume-off"></i>volume-off</p>
                    <p><i class="halflings-icon white volume-down"></i>volume-down</p>
                    <p><i class="halflings-icon white volume-up"></i>volume-up</p>
                    <p><i class="halflings-icon white qrcode"></i>qrcode</p>
                    <p><i class="halflings-icon white barcode"></i>barcode</p>
                    <p><i class="halflings-icon white tag"></i>tag</p>
                    <p><i class="halflings-icon white tags"></i>tags</p>
                    <p><i class="halflings-icon white book"></i>book</p>
                    <p><i class="halflings-icon white bookmark"></i>bookmark</p>
                    <p><i class="halflings-icon white print"></i>print</p>
                    <p><i class="halflings-icon white camera"></i>camera</p>
                    <p><i class="halflings-icon white font"></i>font</p>
                    <p><i class="halflings-icon white bold"></i>bold</p>
                    <p><i class="halflings-icon white italic"></i>italic</p>
                    <p><i class="halflings-icon white text-height"></i>text-height</p>
                    <p><i class="halflings-icon white text-width"></i>text-width</p>
                    <p><i class="halflings-icon white align-left"></i>align-left</p>
                    <p><i class="halflings-icon white align-center"></i>align-center</p>
                    <p><i class="halflings-icon white align-right"></i>align-right</p>
                    <p><i class="halflings-icon white align-justify"></i>align-justify</p>
                    <p><i class="halflings-icon white list"></i>list</p>
                    <p><i class="halflings-icon white indent-left"></i>indent-left</p>
                    <p><i class="halflings-icon white indent-right"></i>indent-right</p>
                    <p><i class="halflings-icon white facetime-video"></i>facetime-video</p>
                    <p><i class="halflings-icon white picture"></i>picture</p>
                    <p><i class="halflings-icon white pencil"></i>pencil</p>
                    <p><i class="halflings-icon white map-marker"></i>map-marker</p>
                    <p><i class="halflings-icon white adjust"></i>adjust</p>
                    <p><i class="halflings-icon white tint"></i>tint</p>
                    <p><i class="halflings-icon white edit"></i>edit</p>
                    <p><i class="halflings-icon white share"></i>share</p>
                    <p><i class="halflings-icon white check"></i>check</p>
                    <p><i class="halflings-icon white move"></i>move</p>
                    <p><i class="halflings-icon white step-backward"></i>step-backward</p>
                    <p><i class="halflings-icon white fast-backward"></i>fast-backward</p>
                    <p><i class="halflings-icon white backward"></i>backward</p>
                    <p><i class="halflings-icon white play"></i>play</p>
                    <p><i class="halflings-icon white pause"></i>pause</p>
                    <p><i class="halflings-icon white stop"></i>stop</p>
                    <p><i class="halflings-icon white forward"></i>forward</p>
                    <p><i class="halflings-icon white fast-forward"></i>fast-forward</p>
                    <p><i class="halflings-icon white step-forward"></i>step-forward</p>
                    <p><i class="halflings-icon white eject"></i>eject</p>
                    <p><i class="halflings-icon white chevron-left"></i>chevron-left</p>
                    <p><i class="halflings-icon white chevron-right"></i>chevron-right</p>
                    <p><i class="halflings-icon white plus-sign"></i>plus-sign</p>
                    <p><i class="halflings-icon white minus-sign"></i>minus-sign</p>
                    <p><i class="halflings-icon white remove-sign"></i>remove-sign</p>
                    <p><i class="halflings-icon white ok-sign"></i>ok-sign</p>
                    <p><i class="halflings-icon white question-sign"></i>question-sign</p>
                    <p><i class="halflings-icon white info-sign"></i>info-sign</p>
                    <p><i class="halflings-icon white screenshot"></i>screenshot</p>
                    <p><i class="halflings-icon white remove-circle"></i>remove-circle</p>
                    <p><i class="halflings-icon white ok-circle"></i>ok-circle</p>
                    <p><i class="halflings-icon white ban-circle"></i>ban-circle</p>
                    <p><i class="halflings-icon white arrow-left"></i>arrow-left</p>
                    <p><i class="halflings-icon white arrow-right"></i>arrow-right</p>
                    <p><i class="halflings-icon white arrow-up"></i>arrow-up</p>
                    <p><i class="halflings-icon white arrow-down"></i>arrow-down</p>
                    <p><i class="halflings-icon white share-alt"></i>share-alt</p>
                    <p><i class="halflings-icon white resize-full"></i>resize-full</p>
                    <p><i class="halflings-icon white resize-small"></i>resize-small</p>
                    <p><i class="halflings-icon white plus"></i>plus</p>
                    <p><i class="halflings-icon white minus"></i>minus</p>
                    <p><i class="halflings-icon white asterisk"></i>asterisk</p>
                    <p><i class="halflings-icon white exclamation-sign"></i>exclamation-sign</p>
                    <p><i class="halflings-icon white gift"></i>gift</p>
                    <p><i class="halflings-icon white leaf"></i>leaf</p>
                    <p><i class="halflings-icon white fire"></i>fire</p>
                    <p><i class="halflings-icon white eye-open"></i>eye-open</p>
                    <p><i class="halflings-icon white eye-close"></i>eye-close</p>
                    <p><i class="halflings-icon white warning-sign"></i>warning-sign</p>
                    <p><i class="halflings-icon white plane"></i>plane</p>
                    <p><i class="halflings-icon white calendar"></i>calendar</p>
                    <p><i class="halflings-icon white random"></i>random</p>
                    <p><i class="halflings-icon white comments"></i>comments</p>
                    <p><i class="halflings-icon white magnet"></i>magnet</p>
                    <p><i class="halflings-icon white chevron-up"></i>chevron-up</p>
                    <p><i class="halflings-icon white chevron-down"></i>chevron-down</p>
                    <p><i class="halflings-icon white retweet"></i>retweet</p>
                    <p><i class="halflings-icon white shopping-cart"></i>shopping-cart</p>
                    <p><i class="halflings-icon white folder-close"></i>folder-close</p>
                    <p><i class="halflings-icon white folder-open"></i>folder-open</p>
                    <p><i class="halflings-icon white resize-vertical"></i>resize-vertical</p>
                    <p><i class="halflings-icon white resize-horizontal"></i>resize-horizontal</p>
                    <p><i class="halflings-icon white hdd"></i>hdd</p>
                    <p><i class="halflings-icon white bullhorn"></i>bullhorn</p>
                    <p><i class="halflings-icon white bell"></i>bell</p>
                    <p><i class="halflings-icon white certificate"></i>certificate</p>
                    <p><i class="halflings-icon white thumbs-up"></i>thumbs-up</p>
                    <p><i class="halflings-icon white thumbs-down"></i>thumbs-down</p>
                    <p><i class="halflings-icon white hand-right"></i>hand-right</p>
                    <p><i class="halflings-icon white hand-left"></i>hand-left</p>
                    <p><i class="halflings-icon white hand-top"></i>hand-top</p>
                    <p><i class="halflings-icon white hand-down"></i>hand-down</p>
                    <p><i class="halflings-icon white circle-arrow-right"></i>circle-arrow-right</p>
                    <p><i class="halflings-icon white circle-arrow-left"></i>circle-arrow-left</p>
                    <p><i class="halflings-icon white circle-arrow-top"></i>circle-arrow-top</p>
                    <p><i class="halflings-icon white circle-arrow-down"></i>circle-arrow-down</p>
                    <p><i class="halflings-icon white globe"></i>globe</p>
                    <p><i class="halflings-icon white wrench"></i>wrench</p>
                    <p><i class="halflings-icon white tasks"></i>tasks</p>
                    <p><i class="halflings-icon white filter"></i>filter</p>
                    <p><i class="halflings-icon white briefcase"></i>briefcase</p>
                    <p><i class="halflings-icon white fullscreen"></i>fullscreen</p>
                    <p><i class="halflings-icon white dashboard"></i>dashboard</p>
                    <p><i class="halflings-icon white paperclip"></i>paperclip</p>
                    <p><i class="halflings-icon white heart-empty"></i>heart-empty</p>
                    <p><i class="halflings-icon white link"></i>link</p>
                    <p><i class="halflings-icon white phone"></i>phone</p>
                    <p><i class="halflings-icon white pushpin"></i>pushpin</p>
                    <p><i class="halflings-icon white euro"></i>euro</p>
                    <p><i class="halflings-icon white usd"></i>usd</p>
                    <p><i class="halflings-icon white gbp"></i>gbp</p>
                    <p><i class="halflings-icon white sort"></i>sort</p>
                    <p><i class="halflings-icon white sort-by-alphabet"></i>sort-by-alphabet</p>
                    <p><i class="halflings-icon white sort-by-alphabet-alt"></i>sort-by-alphabet-alt</p>
                    <p><i class="halflings-icon white sort-by-order"></i>sort-by-order</p>
                    <p><i class="halflings-icon white sort-by-order-alt"></i>sort-by-order-alt</p>
                    <p><i class="halflings-icon white sort-by-attributes"></i>sort-by-attributes</p>
                    <p><i class="halflings-icon white sort-by-attributes-alt"></i>sort-by-attributes-alt</p>
                    <p><i class="halflings-icon white unchecked"></i>unchecked</p>
                    <p><i class="halflings-icon white expand"></i>expand</p>
                    <p><i class="halflings-icon white collapse"></i>collapse</p>
                    <p><i class="halflings-icon white collapse-top"></i>collapse-top</p>
                  </div>
                  <h3>Fonts</h3>
                  <a href="" class="halflings glass"><i></i>glass</a>
                  <a href="" class="halflings music"><i></i>music</a>
                  <a href="" class="halflings search"><i></i>search</a>
                  <a href="" class="halflings envelope"><i></i>envelope</a>
                  <a href="" class="halflings heart"><i></i>heart</a>
                  <a href="" class="halflings star"><i></i>star</a>
                  <a href="" class="halflings star-empty"><i></i>star-empty</a>
                  <a href="" class="halflings user"><i></i>user</a>
                  <a href="" class="halflings film"><i></i>film</a>
                  <a href="" class="halflings th-large"><i></i>th-large</a>
                  <a href="" class="halflings th"><i></i>th</a>
                  <a href="" class="halflings th-list"><i></i>th-list</a>
                  <a href="" class="halflings ok"><i></i>ok</a>
                  <a href="" class="halflings remove"><i></i>remove</a>
                  <a href="" class="halflings zoom-in"><i></i>zoom-in</a>
                  <a href="" class="halflings zoom-out"><i></i>zoom-out</a>
                  <a href="" class="halflings off"><i></i>off</a>
                  <a href="" class="halflings signal"><i></i>signal</a>
                  <a href="" class="halflings cog"><i></i>cog</a>
                  <a href="" class="halflings trash"><i></i>trash</a>
                  <a href="" class="halflings home"><i></i>home</a>
                  <a href="" class="halflings file"><i></i>file</a>
                  <a href="" class="halflings time"><i></i>time</a>
                  <a href="" class="halflings road"><i></i>road</a>
                  <a href="" class="halflings download-alt"><i></i>download-alt</a>
                  <a href="" class="halflings download"><i></i>download</a>
                  <a href="" class="halflings upload"><i></i>upload</a>
                  <a href="" class="halflings inbox"><i></i>inbox</a>
                  <a href="" class="halflings play-circle"><i></i>play-circle</a>
                  <a href="" class="halflings repeat"><i></i>repeat</a>
                  <a href="" class="halflings refresh"><i></i>refresh</a>
                  <a href="" class="halflings list-alt"><i></i>list-alt</a>
                  <a href="" class="halflings lock"><i></i>lock</a>
                  <a href="" class="halflings flag"><i></i>flag</a>
                  <a href="" class="halflings headphones"><i></i>headphones</a>
                  <a href="" class="halflings volume-off"><i></i>volume-off</a>
                  <a href="" class="halflings volume-down"><i></i>volume-down</a>
                  <a href="" class="halflings volume-up"><i></i>volume-up</a>
                  <a href="" class="halflings qrcode"><i></i>qrcode</a>
                  <a href="" class="halflings barcode"><i></i>barcode</a>
                  <a href="" class="halflings tag"><i></i>tag</a>
                  <a href="" class="halflings tags"><i></i>tags</a>
                  <a href="" class="halflings book"><i></i>book</a>
                  <a href="" class="halflings bookmark"><i></i>bookmark</a>
                  <a href="" class="halflings print"><i></i>print</a>
                  <a href="" class="halflings camera"><i></i>camera</a>
                  <a href="" class="halflings font"><i></i>font</a>
                  <a href="" class="halflings bold"><i></i>bold</a>
                  <a href="" class="halflings italic"><i></i>italic</a>
                  <a href="" class="halflings text-height"><i></i>text-height</a>
                  <a href="" class="halflings text-width"><i></i>text-width</a>
                  <a href="" class="halflings align-left"><i></i>align-left</a>
                  <a href="" class="halflings align-center"><i></i>align-center</a>
                  <a href="" class="halflings align-right"><i></i>align-right</a>
                  <a href="" class="halflings align-justify"><i></i>align-justify</a>
                  <a href="" class="halflings list"><i></i>list</a>
                  <a href="" class="halflings indent-left"><i></i>indent-left</a>
                  <a href="" class="halflings indent-right"><i></i>indent-right</a>
                  <a href="" class="halflings facetime-video"><i></i>facetime-video</a>
                  <a href="" class="halflings picture"><i></i>picture</a>
                  <a href="" class="halflings pencil"><i></i>pencil</a>
                  <a href="" class="halflings map-marker"><i></i>map-marker</a>
                  <a href="" class="halflings adjust"><i></i>adjust</a>
                  <a href="" class="halflings tint"><i></i>tint</a>
                  <a href="" class="halflings edit"><i></i>edit</a>
                  <a href="" class="halflings share"><i></i>share</a>
                  <a href="" class="halflings check"><i></i>check</a>
                  <a href="" class="halflings move"><i></i>move</a>
                  <a href="" class="halflings step-backward"><i></i>step-backward</a>
                  <a href="" class="halflings fast-backward"><i></i>fast-backward</a>
                  <a href="" class="halflings backward"><i></i>backward</a>
                  <a href="" class="halflings play"><i></i>play</a>
                  <a href="" class="halflings pause"><i></i>pause</a>
                  <a href="" class="halflings stop"><i></i>stop</a>
                  <a href="" class="halflings forward"><i></i>forward</a>
                  <a href="" class="halflings fast-forward"><i></i>fast-forward</a>
                  <a href="" class="halflings step-forward"><i></i>step-forward</a>
                  <a href="" class="halflings eject"><i></i>eject</a>
                  <a href="" class="halflings chevron-left"><i></i>chevron-left</a>
                  <a href="" class="halflings chevron-right"><i></i>chevron-right</a>
                  <a href="" class="halflings plus-sign"><i></i>plus-sign</a>
                  <a href="" class="halflings minus-sign"><i></i>minus-sign</a>
                  <a href="" class="halflings remove-sign"><i></i>remove-sign</a>
                  <a href="" class="halflings ok-sign"><i></i>ok-sign</a>
                  <a href="" class="halflings question-sign"><i></i>question-sign</a>
                  <a href="" class="halflings info-sign"><i></i>info-sign</a>
                  <a href="" class="halflings screenshot"><i></i>screenshot</a>
                  <a href="" class="halflings remove-circle"><i></i>remove-circle</a>
                  <a href="" class="halflings ok-circle"><i></i>ok-circle</a>
                  <a href="" class="halflings ban-circle"><i></i>ban-circle</a>
                  <a href="" class="halflings arrow-left"><i></i>arrow-left</a>
                  <a href="" class="halflings arrow-right"><i></i>arrow-right</a>
                  <a href="" class="halflings arrow-up"><i></i>arrow-up</a>
                  <a href="" class="halflings arrow-down"><i></i>arrow-down</a>
                  <a href="" class="halflings share-alt"><i></i>share-alt</a>
                  <a href="" class="halflings resize-full"><i></i>resize-full</a>
                  <a href="" class="halflings resize-small"><i></i>resize-small</a>
                  <a href="" class="halflings plus"><i></i>plus</a>
                  <a href="" class="halflings minus"><i></i>minus</a>
                  <a href="" class="halflings asterisk"><i></i>asterisk</a>
                  <a href="" class="halflings exclamation-sign"><i></i>exclamation-sign</a>
                  <a href="" class="halflings gift"><i></i>gift</a>
                  <a href="" class="halflings leaf"><i></i>leaf</a>
                  <a href="" class="halflings fire"><i></i>fire</a>
                  <a href="" class="halflings eye-open"><i></i>eye-open</a>
                  <a href="" class="halflings eye-close"><i></i>eye-close</a>
                  <a href="" class="halflings warning-sign"><i></i>warning-sign</a>
                  <a href="" class="halflings plane"><i></i>plane</a>
                  <a href="" class="halflings calendar"><i></i>calendar</a>
                  <a href="" class="halflings random"><i></i>random</a>
                  <a href="" class="halflings comments"><i></i>comments</a>
                  <a href="" class="halflings magnet"><i></i>magnet</a>
                  <a href="" class="halflings chevron-up"><i></i>chevron-up</a>
                  <a href="" class="halflings chevron-down"><i></i>chevron-down</a>
                  <a href="" class="halflings retweet"><i></i>retweet</a>
                  <a href="" class="halflings shopping-cart"><i></i>shopping-cart</a>
                  <a href="" class="halflings folder-close"><i></i>folder-close</a>
                  <a href="" class="halflings folder-open"><i></i>folder-open</a>
                  <a href="" class="halflings resize-vertical"><i></i>resize-vertical</a>
                  <a href="" class="halflings resize-horizontal"><i></i>resize-horizontal</a>
                  <a href="" class="halflings hdd"><i></i>hdd</a>
                  <a href="" class="halflings bullhorn"><i></i>bullhorn</a>
                  <a href="" class="halflings bell"><i></i>bell</a>
                  <a href="" class="halflings certificate"><i></i>certificate</a>
                  <a href="" class="halflings thumbs-up"><i></i>thumbs-up</a>
                  <a href="" class="halflings thumbs-down"><i></i>thumbs-down</a>
                  <a href="" class="halflings hand-right"><i></i>hand-right</a>
                  <a href="" class="halflings hand-left"><i></i>hand-left</a>
                  <a href="" class="halflings hand-top"><i></i>hand-top</a>
                  <a href="" class="halflings hand-down"><i></i>hand-down</a>
                  <a href="" class="halflings circle-arrow-right"><i></i>circle-arrow-right</a>
                  <a href="" class="halflings circle-arrow-left"><i></i>circle-arrow-left</a>
                  <a href="" class="halflings circle-arrow-top"><i></i>circle-arrow-top</a>
                  <a href="" class="halflings circle-arrow-down"><i></i>circle-arrow-down</a>
                  <a href="" class="halflings globe"><i></i>globe</a>
                  <a href="" class="halflings wrench"><i></i>wrench</a>
                  <a href="" class="halflings tasks"><i></i>tasks</a>
                  <a href="" class="halflings filter"><i></i>filter</a>
                  <a href="" class="halflings briefcase"><i></i>briefcase</a>
                  <a href="" class="halflings fullscreen"><i></i>fullscreen</a>
                  <a href="" class="halflings dashboard"><i></i>dashboard</a>
                  <a href="" class="halflings paperclip"><i></i>paperclip</a>
                  <a href="" class="halflings heart-empty"><i></i>heart-empty</a>
                  <a href="" class="halflings link"><i></i>link</a>
                  <a href="" class="halflings phone"><i></i>phone</a>
                  <a href="" class="halflings pushpin"><i></i>pushpin</a>
                  <a href="" class="halflings euro"><i></i>euro</a>
                  <a href="" class="halflings usd"><i></i>usd</a>
                  <a href="" class="halflings gbp"><i></i>gbp</a>
                  <a href="" class="halflings sort"><i></i>sort</a>
                  <a href="" class="halflings sort-by-alphabet"><i></i>sort-by-alphabet</a>
                  <a href="" class="halflings sort-by-alphabet-alt"><i></i>sort-by-alphabet-alt</a>
                  <a href="" class="halflings sort-by-order"><i></i>sort-by-order</a>
                  <a href="" class="halflings sort-by-order-alt"><i></i>sort-by-order-alt</a>
                  <a href="" class="halflings sort-by-attributes"><i></i>sort-by-attributes</a>
                  <a href="" class="halflings sort-by-attributes-alt"><i></i>sort-by-attributes-alt</a>
                  <a href="" class="halflings unchecked"><i></i>unchecked</a>
                  <a href="" class="halflings expand"><i></i>expand</a>
                  <a href="" class="halflings collapse"><i></i>collapse</a>
                  <a href="" class="halflings collapse-top"><i></i>collapse-top</a>
                  <br /><br /><br />
                  <div class="white-content">
                    <h3>Fonts - white</h3>
                    <a href="" class="halflings white glass"><i></i>glass</a>
                    <a href="" class="halflings white music"><i></i>music</a>
                    <a href="" class="halflings white search"><i></i>search</a>
                    <a href="" class="halflings white envelope"><i></i>envelope</a>
                    <a href="" class="halflings white heart"><i></i>heart</a>
                    <a href="" class="halflings white star"><i></i>star</a>
                    <a href="" class="halflings white star-empty"><i></i>star-empty</a>
                    <a href="" class="halflings white user"><i></i>user</a>
                    <a href="" class="halflings white film"><i></i>film</a>
                    <a href="" class="halflings white th-large"><i></i>th-large</a>
                    <a href="" class="halflings white th"><i></i>th</a>
                    <a href="" class="halflings white th-list"><i></i>th-list</a>
                    <a href="" class="halflings white ok"><i></i>ok</a>
                    <a href="" class="halflings white remove"><i></i>remove</a>
                    <a href="" class="halflings white zoom-in"><i></i>zoom-in</a>
                    <a href="" class="halflings white zoom-out"><i></i>zoom-out</a>
                    <a href="" class="halflings white off"><i></i>off</a>
                    <a href="" class="halflings white signal"><i></i>signal</a>
                    <a href="" class="halflings white cog"><i></i>cog</a>
                    <a href="" class="halflings white trash"><i></i>trash</a>
                    <a href="" class="halflings white home"><i></i>home</a>
                    <a href="" class="halflings white file"><i></i>file</a>
                    <a href="" class="halflings white time"><i></i>time</a>
                    <a href="" class="halflings white road"><i></i>road</a>
                    <a href="" class="halflings white download-alt"><i></i>download-alt</a>
                    <a href="" class="halflings white download"><i></i>download</a>
                    <a href="" class="halflings white upload"><i></i>upload</a>
                    <a href="" class="halflings white inbox"><i></i>inbox</a>
                    <a href="" class="halflings white play-circle"><i></i>play-circle</a>
                    <a href="" class="halflings white repeat"><i></i>repeat</a>
                    <a href="" class="halflings white refresh"><i></i>refresh</a>
                    <a href="" class="halflings white list-alt"><i></i>list-alt</a>
                    <a href="" class="halflings white lock"><i></i>lock</a>
                    <a href="" class="halflings white flag"><i></i>flag</a>
                    <a href="" class="halflings white headphones"><i></i>headphones</a>
                    <a href="" class="halflings white volume-off"><i></i>volume-off</a>
                    <a href="" class="halflings white volume-down"><i></i>volume-down</a>
                    <a href="" class="halflings white volume-up"><i></i>volume-up</a>
                    <a href="" class="halflings white qrcode"><i></i>qrcode</a>
                    <a href="" class="halflings white barcode"><i></i>barcode</a>
                    <a href="" class="halflings white tag"><i></i>tag</a>
                    <a href="" class="halflings white tags"><i></i>tags</a>
                    <a href="" class="halflings white book"><i></i>book</a>
                    <a href="" class="halflings white bookmark"><i></i>bookmark</a>
                    <a href="" class="halflings white print"><i></i>print</a>
                    <a href="" class="halflings white camera"><i></i>camera</a>
                    <a href="" class="halflings white font"><i></i>font</a>
                    <a href="" class="halflings white bold"><i></i>bold</a>
                    <a href="" class="halflings white italic"><i></i>italic</a>
                    <a href="" class="halflings white text-height"><i></i>text-height</a>
                    <a href="" class="halflings white text-width"><i></i>text-width</a>
                    <a href="" class="halflings white align-left"><i></i>align-left</a>
                    <a href="" class="halflings white align-center"><i></i>align-center</a>
                    <a href="" class="halflings white align-right"><i></i>align-right</a>
                    <a href="" class="halflings white align-justify"><i></i>align-justify</a>
                    <a href="" class="halflings white list"><i></i>list</a>
                    <a href="" class="halflings white indent-left"><i></i>indent-left</a>
                    <a href="" class="halflings white indent-right"><i></i>indent-right</a>
                    <a href="" class="halflings white facetime-video"><i></i>facetime-video</a>
                    <a href="" class="halflings white picture"><i></i>picture</a>
                    <a href="" class="halflings white pencil"><i></i>pencil</a>
                    <a href="" class="halflings white map-marker"><i></i>map-marker</a>
                    <a href="" class="halflings white adjust"><i></i>adjust</a>
                    <a href="" class="halflings white tint"><i></i>tint</a>
                    <a href="" class="halflings white edit"><i></i>edit</a>
                    <a href="" class="halflings white share"><i></i>share</a>
                    <a href="" class="halflings white check"><i></i>check</a>
                    <a href="" class="halflings white move"><i></i>move</a>
                    <a href="" class="halflings white step-backward"><i></i>step-backward</a>
                    <a href="" class="halflings white fast-backward"><i></i>fast-backward</a>
                    <a href="" class="halflings white backward"><i></i>backward</a>
                    <a href="" class="halflings white play"><i></i>play</a>
                    <a href="" class="halflings white pause"><i></i>pause</a>
                    <a href="" class="halflings white stop"><i></i>stop</a>
                    <a href="" class="halflings white forward"><i></i>forward</a>
                    <a href="" class="halflings white fast-forward"><i></i>fast-forward</a>
                    <a href="" class="halflings white step-forward"><i></i>step-forward</a>
                    <a href="" class="halflings white eject"><i></i>eject</a>
                    <a href="" class="halflings white chevron-left"><i></i>chevron-left</a>
                    <a href="" class="halflings white chevron-right"><i></i>chevron-right</a>
                    <a href="" class="halflings white plus-sign"><i></i>plus-sign</a>
                    <a href="" class="halflings white minus-sign"><i></i>minus-sign</a>
                    <a href="" class="halflings white remove-sign"><i></i>remove-sign</a>
                    <a href="" class="halflings white ok-sign"><i></i>ok-sign</a>
                    <a href="" class="halflings white question-sign"><i></i>question-sign</a>
                    <a href="" class="halflings white info-sign"><i></i>info-sign</a>
                    <a href="" class="halflings white screenshot"><i></i>screenshot</a>
                    <a href="" class="halflings white remove-circle"><i></i>remove-circle</a>
                    <a href="" class="halflings white ok-circle"><i></i>ok-circle</a>
                    <a href="" class="halflings white ban-circle"><i></i>ban-circle</a>
                    <a href="" class="halflings white arrow-left"><i></i>arrow-left</a>
                    <a href="" class="halflings white arrow-right"><i></i>arrow-right</a>
                    <a href="" class="halflings white arrow-up"><i></i>arrow-up</a>
                    <a href="" class="halflings white arrow-down"><i></i>arrow-down</a>
                    <a href="" class="halflings white share-alt"><i></i>share-alt</a>
                    <a href="" class="halflings white resize-full"><i></i>resize-full</a>
                    <a href="" class="halflings white resize-small"><i></i>resize-small</a>
                    <a href="" class="halflings white plus"><i></i>plus</a>
                    <a href="" class="halflings white minus"><i></i>minus</a>
                    <a href="" class="halflings white asterisk"><i></i>asterisk</a>
                    <a href="" class="halflings white exclamation-sign"><i></i>exclamation-sign</a>
                    <a href="" class="halflings white gift"><i></i>gift</a>
                    <a href="" class="halflings white leaf"><i></i>leaf</a>
                    <a href="" class="halflings white fire"><i></i>fire</a>
                    <a href="" class="halflings white eye-open"><i></i>eye-open</a>
                    <a href="" class="halflings white eye-close"><i></i>eye-close</a>
                    <a href="" class="halflings white warning-sign"><i></i>warning-sign</a>
                    <a href="" class="halflings white plane"><i></i>plane</a>
                    <a href="" class="halflings white calendar"><i></i>calendar</a>
                    <a href="" class="halflings white random"><i></i>random</a>
                    <a href="" class="halflings white comments"><i></i>comments</a>
                    <a href="" class="halflings white magnet"><i></i>magnet</a>
                    <a href="" class="halflings white chevron-up"><i></i>chevron-up</a>
                    <a href="" class="halflings white chevron-down"><i></i>chevron-down</a>
                    <a href="" class="halflings white retweet"><i></i>retweet</a>
                    <a href="" class="halflings white shopping-cart"><i></i>shopping-cart</a>
                    <a href="" class="halflings white folder-close"><i></i>folder-close</a>
                    <a href="" class="halflings white folder-open"><i></i>folder-open</a>
                    <a href="" class="halflings white resize-vertical"><i></i>resize-vertical</a>
                    <a href="" class="halflings white resize-horizontal"><i></i>resize-horizontal</a>
                    <a href="" class="halflings white hdd"><i></i>hdd</a>
                    <a href="" class="halflings white bullhorn"><i></i>bullhorn</a>
                    <a href="" class="halflings white bell"><i></i>bell</a>
                    <a href="" class="halflings white certificate"><i></i>certificate</a>
                    <a href="" class="halflings white thumbs-up"><i></i>thumbs-up</a>
                    <a href="" class="halflings white thumbs-down"><i></i>thumbs-down</a>
                    <a href="" class="halflings white hand-right"><i></i>hand-right</a>
                    <a href="" class="halflings white hand-left"><i></i>hand-left</a>
                    <a href="" class="halflings white hand-top"><i></i>hand-top</a>
                    <a href="" class="halflings white hand-down"><i></i>hand-down</a>
                    <a href="" class="halflings white circle-arrow-right"><i></i>circle-arrow-right</a>
                    <a href="" class="halflings white circle-arrow-left"><i></i>circle-arrow-left</a>
                    <a href="" class="halflings white circle-arrow-top"><i></i>circle-arrow-top</a>
                    <a href="" class="halflings white circle-arrow-down"><i></i>circle-arrow-down</a>
                    <a href="" class="halflings white globe"><i></i>globe</a>
                    <a href="" class="halflings white wrench"><i></i>wrench</a>
                    <a href="" class="halflings white tasks"><i></i>tasks</a>
                    <a href="" class="halflings white filter"><i></i>filter</a>
                    <a href="" class="halflings white briefcase"><i></i>briefcase</a>
                    <a href="" class="halflings white fullscreen"><i></i>fullscreen</a>
                    <a href="" class="halflings white dashboard"><i></i>dashboard</a>
                    <a href="" class="halflings white paperclip"><i></i>paperclip</a>
                    <a href="" class="halflings white heart-empty"><i></i>heart-empty</a>
                    <a href="" class="halflings white link"><i></i>link</a>
                    <a href="" class="halflings white phone"><i></i>phone</a>
                    <a href="" class="halflings white pushpin"><i></i>pushpin</a>
                    <a href="" class="halflings white euro"><i></i>euro</a>
                    <a href="" class="halflings white usd"><i></i>usd</a>
                    <a href="" class="halflings white gbp"><i></i>gbp</a>
                    <a href="" class="halflings white sort"><i></i>sort</a>
                    <a href="" class="halflings white sort-by-alphabet"><i></i>sort-by-alphabet</a>
                    <a href="" class="halflings white sort-by-alphabet-alt"><i></i>sort-by-alphabet-alt</a>
                    <a href="" class="halflings white sort-by-order"><i></i>sort-by-order</a>
                    <a href="" class="halflings white sort-by-order-alt"><i></i>sort-by-order-alt</a>
                    <a href="" class="halflings white sort-by-attributes"><i></i>sort-by-attributes</a>
                    <a href="" class="halflings white sort-by-attributes-alt"><i></i>sort-by-attributes-alt</a>
                    <a href="" class="halflings white unchecked"><i></i>unchecked</a>
                    <a href="" class="halflings white expand"><i></i>expand</a>
                    <a href="" class="halflings white collapse"><i></i>collapse</a>
                    <a href="" class="halflings white collapse-top"><i></i>collapse-top</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
