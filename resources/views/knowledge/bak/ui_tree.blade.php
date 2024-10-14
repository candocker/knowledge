@php $datas['layoutDatas'] = ['viewCode' => 'tree', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span6">
            <div class="portlet box grey">
              <div class="portlet-title">
                <div class="caption"><i class="icon-comments"></i>Inline Tree</div>
                <div class="actions">
                  <a href="javascript:;" id="tree_1_collapse" class="btn green"> Collapse All</a>
                  <a href="javascript:;" id="tree_1_expand" class="btn yellow"> Expand All</a>
                </div>
              </div>
              <div class="portlet-body fuelux">
                <ul class="tree" id="tree_1">
                  <li>
                    <a href="#" data-role="branch" class="tree-toggle" data-toggle="branch" data-value="Bootstrap_Tree">
                    Bootstrap Tree
                    </a>
                    <ul class="branch in">
                      <li>
                        <a href="#" class="tree-toggle" data-toggle="branch" data-value="Bootstrap_Tree" id="nut1">
                        Documents
                        </a>
                        <ul class="branch in">
                          <li>
                            <a href="#" class="tree-toggle closed" data-toggle="branch" data-value="Bootstrap_Tree" id="nut2">
                            Finance
                            </a>
                            <ul class="branch">
                              <li><a href="#" data-role="leaf"><i class="icon-suitcase"></i> Sale Revenue</a></li>
                              <li><a href="#" data-role="leaf"><i class="icon-signal"></i> Promotions</a></li>
                              <li><a href="#" data-role="leaf"><i class="icon-sitemap"></i> IPO</a></li>
                            </ul>
                          </li>
                          <li><a href="#" data-role="leaf"><i class="icon-signal"></i> ICT</a></li>
                          <li><a href="#" data-role="leaf"><i class="icon-sitemap"></i> Human Resources</a></li>
                        </ul>
                      </li>
                      <li>
                        <a href="#" class="tree-toggle closed" data-toggle="branch" data-value="Bootstrap_Tree" id="nut3">
                        Projects
                        </a>
                        <ul class="branch">
                          <li><a href="#" data-role="leaf"><i class="icon-glass"></i> Internal</a></li>
                          <li><a href="#" data-role="leaf"><i class="icon-group"></i> Client Base</a></li>
                          <li><a href="#" data-role="leaf"><i class="icon-retweet"></i> Product Base</a></li>
                        </ul>
                      </li>
                      <li>
                        <a href="#" class="tree-toggle" data-toggle="branch" data-value="Bootstrap_Tree" id="nut4">
                        Tasks
                        </a>
                        <ul class="branch in">
                          <li><a href="#" data-role="leaf"><i class="icon-suitcase"></i> Internal Projects</a></li>
                          <li><a href="#" data-role="leaf"><i class="icon-cloud-download"></i> Outsourcing</a></li>
                          <li><a href="#" data-role="leaf"><i class="icon-sitemap"></i> Bug Tracking</a></li>
                        </ul>
                      </li>
                      <li>
                        <a href="#" class="tree-toggle closed" data-toggle="branch" data-value="Bootstrap_Tree" id="nut6">
                        Customers
                        </a>
                        <ul class="branch">
                          <li><a href="#" data-role="leaf"><i class="icon-suitcase"></i> Finance</a></li>
                          <li><a href="#" data-role="leaf"><i class="icon-signal"></i> ICT</a></li>
                          <li><a href="#" data-role="leaf"><i class="icon-sitemap"></i> Human Resources</a></li>
                        </ul>
                      </li>
                      <li>
                        <a href="#" class="tree-toggle closed" data-toggle="branch" data-value="Bootstrap_Tree" id="nut8">
                        Reports
                        </a>
                        <ul class="branch">
                          <li><a href="#" data-role="leaf"><i class="icon-suitcase"></i> Finance</a></li>
                          <li><a href="#" data-role="leaf"><i class="icon-signal"></i> ICT</a></li>
                          <li><a href="#" data-role="leaf"><i class="icon-sitemap"></i> Human Resources</a></li>
                        </ul>
                      </li>
                      <li>
                        <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469" target="_blank" data-role="leaf">
                        <i class="icon-share"></i> External Link
                        </a>
                      </li>
                      <li>
                        <a href="http://themeforest.net/item/conquer-responsive-admin-dashboard-template/3716838" target="_blank" data-role="leaf">
                        <i class="icon-share"></i> Another External Link
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="span6">
            <div class="portlet box grey">
              <div class="portlet-title">
                <div class="caption"><i class="icon-comments"></i>Data Sources</div>
                <div class="actions">
                  <a href="javascript:;" id="tree_2_collapse" class="btn blue"> Collapse All</a>
                  <a href="javascript:;" id="tree_2_expand" class="btn yellow"> Expand All</a>
                </div>
              </div>
              <div class="portlet-body fuelux">
                <ul class="tree" id="tree_2">
                  <li>
                    <a href="#" data-role="branch" class="tree-toggle" data-toggle="branch" data-value="Bootstrap_Tree">Bootstrap Tree
                    </a>
                    <ul class="branch in">
                      <li><a href="#" data-role="leaf" id="nut"><i class="icon-suitcase"></i> Documents</a></li>
                      <li><a href="#" data-role="leaf"><i class="icon-plane"></i> Projects</a></li>
                      <li><a href="#" data-role="leaf"><i class="icon-tasks"></i> Tasks</a></li>
                      <li>
                        <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469" target="_blank" data-role="leaf">
                        <i class="icon-share"></i> External Link
                        </a>
                      </li>
                      <li>
                        <a href="http://themeforest.net/item/conquer-responsive-admin-dashboard-template/3716838" target="_blank" data-role="leaf">
                        <i class="icon-share"></i> Another External Link
                        </a>
                      </li>
                      <li>
                        <a href="assets/plugins/bootstrap-tree/htmlexample.html" data-role="branch" class="tree-toggle closed" data-toggle="branch" data-value="HTML_Example">Load data from HTML page via Ajax
                        </a>
                      </li>
                      <li>
                        <a href="assets/plugins/bootstrap-tree/xmlexample.xml" data-role="branch" class="tree-toggle closed" data-toggle="branch" data-value="XML_Example">Load data from XML document via Ajax
                        </a>
                      </li>
                      <li><a href="assets/plugins/bootstrap-tree/jsonexample.json" data-role="branch" class="tree-toggle closed" data-toggle="branch" data-value="JSON_Example">Load data from JSON via Ajax</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
