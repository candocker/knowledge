@php $datas['layoutDatas'] = ['viewCode' => 'image', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN GALLERY MANAGER PORTLET-->
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Gallery Manager</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <!-- BEGIN GALLERY MANAGER PANEL-->
                <div class="row-fluid">
                  <div class="span4">
                    <h4>Browsing Category 1</h4>
                  </div>
                  <div class="span8">
                    <div class="pull-right">
                      <select data-placeholder="Select Category" class="chosen" tabindex="-1" id="inputCategory">
                        <option value="0"></option>
                        <option value="1">All</option>
                        <option value="1">Category 1</option>
                        <option value="1">Category 2</option>
                        <option value="1">Category 3</option>
                        <option value="1">Category 4</option>
                      </select>
                      <select data-placeholder="Sort By" class="chosen input-small" tabindex="-1" id="inputSort">
                        <option value="0"></option>
                        <option value="1">Date</option>
                        <option value="1">Author</option>
                        <option value="1">Title</option>
                        <option value="1">Hits</option>
                      </select>
                      <div class="clearfix space5"></div>
                      <a href="" class="btn pull-right green"><i class="icon-plus"></i> Upload</a>
                    </div>
                  </div>
                </div>
                <!-- END GALLERY MANAGER PANEL-->
                <hr class="clearfix" />
                <!-- BEGIN GALLERY MANAGER LISTING-->
                <div class="row-fluid">
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="media/image/image1.jpg">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/image1.jpg" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="media/image/image2.jpg">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/image2.jpg" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="media/image/image3.jpg">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/image3.jpg" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="media/image/image4.jpg">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/image4.jpg" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row-fluid">
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="media/image/preview_02.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_02.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="media/image/preview_03.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_03.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="media/image/preview_04.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_04.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="media/image/preview_05.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_05.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="space10"></div>
                <div class="row-fluid">
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="media/image/preview_06.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_06.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="media/image/preview_07.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_07.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="media/image/preview_08.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_08.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="media/image/preview_09.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_09.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="space10"></div>
                <div class="row-fluid">
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Metronic Desktop Preview" href="media/image/preview_10.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_10.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Metronic Notebook Preview" href="media/image/preview_11.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_11.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Metronic Tablet Preview" href="media/image/preview_12.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_12.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Metronic Phone Preview" href="media/image/preview_13.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_13.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="space10"></div>
                <div class="row-fluid">
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Metronic Desktop Preview" href="media/image/preview_14.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_14.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Metronic Notebook Preview" href="media/image/preview_15.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_15.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Metronic Tablet Preview" href="media/image/preview_16.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_16.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <div class="item">
                      <a class="fancybox-button" data-rel="fancybox-button" title="Metronic Tablet Preview" href="media/image/preview_17.png">
                        <div class="zoom">
                          <img src="{{$commonAssetUrl}}/metronic/media/image/preview_17.png" alt="Photo" />
                          <div class="zoom-icon"></div>
                        </div>
                      </a>
                      <div class="details">
                        <a href="#" class="icon"><i class="icon-paper-clip"></i></a>
                        <a href="#" class="icon"><i class="icon-link"></i></a>
                        <a href="#" class="icon"><i class="icon-pencil"></i></a>
                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END GALLERY MANAGER LISTING-->
                <!-- BEGIN GALLERY MANAGER PAGINATION-->
                <div class="row-fluid">
                  <div class="span12">
                    <div class="pagination pull-right">
                      <ul>
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- END GALLERY MANAGER PAGINATION-->
              </div>
            </div>
            <!-- END GALLERY MANAGER PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
