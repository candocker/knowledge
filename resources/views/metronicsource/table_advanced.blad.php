@php
$datas['layoutDatas'] = ['viewCode' => 'tableAdvanced', 'bodyClass' => 'page-header-fixed'];
@endphp
@extends('layouts.metronic')
@section('content')
      <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <div id="portlet-config" class="modal hide">
        <div class="modal-header">
          <button data-dismiss="modal" class="close" type="button"></button>
          <h3>portlet Settings</h3>
        </div>
        <div class="modal-body">
          <p>Here will be a configuration form</p>
        </div>
      </div>
      <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <!-- BEGIN PAGE CONTAINER-->
      <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN STYLE CUSTOMIZER -->
            <div class="color-panel hidden-phone">
              <div class="color-mode-icons icon-color"></div>
              <div class="color-mode-icons icon-color-close"></div>
              <div class="color-mode">
                <p>THEME COLOR</p>
                <ul class="inline">
                  <li class="color-black current color-default" data-style="default"></li>
                  <li class="color-blue" data-style="blue"></li>
                  <li class="color-brown" data-style="brown"></li>
                  <li class="color-purple" data-style="purple"></li>
                  <li class="color-grey" data-style="grey"></li>
                  <li class="color-white color-light" data-style="light"></li>
                </ul>
                <label>
                  <span>Layout</span>
                  <select class="layout-option m-wrap small">
                    <option value="fluid" selected>Fluid</option>
                    <option value="boxed">Boxed</option>
                  </select>
                </label>
                <label>
                  <span>Header</span>
                  <select class="header-option m-wrap small">
                    <option value="fixed" selected>Fixed</option>
                    <option value="default">Default</option>
                  </select>
                </label>
                <label>
                  <span>Sidebar</span>
                  <select class="sidebar-option m-wrap small">
                    <option value="fixed">Fixed</option>
                    <option value="default" selected>Default</option>
                  </select>
                </label>
                <label>
                  <span>Footer</span>
                  <select class="footer-option m-wrap small">
                    <option value="fixed">Fixed</option>
                    <option value="default" selected>Default</option>
                  </select>
                </label>
              </div>
            </div>
            <!-- END BEGIN STYLE CUSTOMIZER -->
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
              Advanced Tables <small>advanced datatables</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
              </li>
              <li>
                <a href="#">Data Tables</a>
                <i class="icon-angle-right"></i>
              </li>
              <li><a href="#">Advanced Tables</a></li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
          </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i>Responsive Table With Expandable details</div>
                <div class="tools">
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                  <thead>
                    <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th class="hidden-480">Platform(s)</th>
                      <th class="hidden-480">Engine version</th>
                      <th class="hidden-480">CSS grade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td class="hidden-480">Win 95+</td>
                      <td class="hidden-480">4</td>
                      <td class="hidden-480">X</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>Internet
                        Explorer 5.0
                      </td>
                      <td class="hidden-480">Win 95+</td>
                      <td class="hidden-480">5</td>
                      <td class="hidden-480">C</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>Internet
                        Explorer 5.5
                      </td>
                      <td class="hidden-480">Win 95+</td>
                      <td class="hidden-480">5.5</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>Internet
                        Explorer 6
                      </td>
                      <td class="hidden-480">Win 98+</td>
                      <td class="hidden-480">6</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>Internet Explorer 7</td>
                      <td class="hidden-480">Win XP SP2+</td>
                      <td class="hidden-480">7</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>AOL browser (AOL desktop)</td>
                      <td class="hidden-480">Win XP</td>
                      <td class="hidden-480">6</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Firefox 1.0</td>
                      <td class="hidden-480">Win 98+ / OSX.2+</td>
                      <td class="hidden-480">1.7</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Firefox 1.5</td>
                      <td class="hidden-480">Win 98+ / OSX.2+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Firefox 2.0</td>
                      <td class="hidden-480">Win 98+ / OSX.2+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Firefox 3.0</td>
                      <td class="hidden-480">Win 2k+ / OSX.3+</td>
                      <td class="hidden-480">1.9</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Camino 1.0</td>
                      <td class="hidden-480">OSX.2+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Camino 1.5</td>
                      <td class="hidden-480">OSX.3+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Netscape 7.2</td>
                      <td class="hidden-480">Win 95+ / Mac OS 8.6-9.2</td>
                      <td class="hidden-480">1.7</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Netscape Browser 8</td>
                      <td class="hidden-480">Win 98SE+</td>
                      <td class="hidden-480">1.7</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Netscape Navigator 9</td>
                      <td class="hidden-480">Win 98+ / OSX.2+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.0</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.1</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1.1</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.2</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1.2</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.3</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1.3</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.4</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1.4</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.5</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1.5</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.6</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1.6</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.7</td>
                      <td class="hidden-480">Win 98+ / OSX.1+</td>
                      <td class="hidden-480">1.7</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.8</td>
                      <td class="hidden-480">Win 98+ / OSX.1+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Seamonkey 1.1</td>
                      <td class="hidden-480">Win 98+ / OSX.2+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Epiphany 2.20</td>
                      <td class="hidden-480">Gnome</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>Safari 1.2</td>
                      <td class="hidden-480">OSX.3</td>
                      <td class="hidden-480">125.5</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>Safari 1.3</td>
                      <td class="hidden-480">OSX.3</td>
                      <td class="hidden-480">312.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>Safari 2.0</td>
                      <td class="hidden-480">OSX.4+</td>
                      <td class="hidden-480">419.3</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>Safari 3.0</td>
                      <td class="hidden-480">OSX.4+</td>
                      <td class="hidden-480">522.1</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>OmniWeb 5.5</td>
                      <td class="hidden-480">OSX.4+</td>
                      <td class="hidden-480">420</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>iPod Touch / iPhone</td>
                      <td class="hidden-480">iPod</td>
                      <td class="hidden-480">420.1</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>S60</td>
                      <td class="hidden-480">S60</td>
                      <td class="hidden-480">413</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 7.0</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 7.5</td>
                      <td class="hidden-480">Win 95+ / OSX.2+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 8.0</td>
                      <td class="hidden-480">Win 95+ / OSX.2+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 8.5</td>
                      <td class="hidden-480">Win 95+ / OSX.2+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 9.0</td>
                      <td class="hidden-480">Win 95+ / OSX.3+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 9.2</td>
                      <td class="hidden-480">Win 88+ / OSX.3+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 9.5</td>
                      <td class="hidden-480">Win 88+ / OSX.3+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera for Wii</td>
                      <td class="hidden-480">Wii</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Nokia N800</td>
                      <td class="hidden-480">N800</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Nintendo DS browser</td>
                      <td class="hidden-480">Nintendo DS</td>
                      <td class="hidden-480">8.5</td>
                      <td class="hidden-480">C/A<sup>1</sup></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i>Show/Hide Columns</div>
                <div class="actions">
                  <div class="btn-group">
                    <a class="btn" href="#" data-toggle="dropdown">
                    Columns
                    <i class="icon-angle-down"></i>
                    </a>
                    <div id="sample_2_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                      <label><input type="checkbox" checked data-column="0">Rendering engine</label>
                      <label><input type="checkbox" checked data-column="1">Browser</label>
                      <label><input type="checkbox" checked data-column="2">Platform(s)</label>
                      <label><input type="checkbox" checked data-column="3">Engine version</label>
                      <label><input type="checkbox" checked data-column="4">CSS grade</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                  <thead>
                    <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th class="hidden-480">Platform(s)</th>
                      <th class="hidden-480">Engine version</th>
                      <th class="hidden-480">CSS grade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td class="hidden-480">Win 95+</td>
                      <td class="hidden-480">4</td>
                      <td class="hidden-480">X</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>Internet
                        Explorer 5.0
                      </td>
                      <td class="hidden-480">Win 95+</td>
                      <td class="hidden-480">5</td>
                      <td class="hidden-480">C</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>Internet
                        Explorer 5.5
                      </td>
                      <td class="hidden-480">Win 95+</td>
                      <td class="hidden-480">5.5</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>Internet
                        Explorer 6
                      </td>
                      <td class="hidden-480">Win 98+</td>
                      <td class="hidden-480">6</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>Internet Explorer 7</td>
                      <td class="hidden-480">Win XP SP2+</td>
                      <td class="hidden-480">7</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Trident</td>
                      <td>AOL browser (AOL desktop)</td>
                      <td class="hidden-480">Win XP</td>
                      <td class="hidden-480">6</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Firefox 1.0</td>
                      <td class="hidden-480">Win 98+ / OSX.2+</td>
                      <td class="hidden-480">1.7</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Firefox 1.5</td>
                      <td class="hidden-480">Win 98+ / OSX.2+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Firefox 2.0</td>
                      <td class="hidden-480">Win 98+ / OSX.2+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Firefox 3.0</td>
                      <td class="hidden-480">Win 2k+ / OSX.3+</td>
                      <td class="hidden-480">1.9</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Camino 1.0</td>
                      <td class="hidden-480">OSX.2+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Camino 1.5</td>
                      <td class="hidden-480">OSX.3+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Netscape 7.2</td>
                      <td class="hidden-480">Win 95+ / Mac OS 8.6-9.2</td>
                      <td class="hidden-480">1.7</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Netscape Browser 8</td>
                      <td class="hidden-480">Win 98SE+</td>
                      <td class="hidden-480">1.7</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Netscape Navigator 9</td>
                      <td class="hidden-480">Win 98+ / OSX.2+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.0</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.1</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1.1</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.2</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1.2</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.3</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1.3</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.4</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1.4</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.5</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1.5</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.6</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">1.6</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.7</td>
                      <td class="hidden-480">Win 98+ / OSX.1+</td>
                      <td class="hidden-480">1.7</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Mozilla 1.8</td>
                      <td class="hidden-480">Win 98+ / OSX.1+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Seamonkey 1.1</td>
                      <td class="hidden-480">Win 98+ / OSX.2+</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Gecko</td>
                      <td>Epiphany 2.20</td>
                      <td class="hidden-480">Gnome</td>
                      <td class="hidden-480">1.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>Safari 1.2</td>
                      <td class="hidden-480">OSX.3</td>
                      <td class="hidden-480">125.5</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>Safari 1.3</td>
                      <td class="hidden-480">OSX.3</td>
                      <td class="hidden-480">312.8</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>Safari 2.0</td>
                      <td class="hidden-480">OSX.4+</td>
                      <td class="hidden-480">419.3</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>Safari 3.0</td>
                      <td class="hidden-480">OSX.4+</td>
                      <td class="hidden-480">522.1</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>OmniWeb 5.5</td>
                      <td class="hidden-480">OSX.4+</td>
                      <td class="hidden-480">420</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>iPod Touch / iPhone</td>
                      <td class="hidden-480">iPod</td>
                      <td class="hidden-480">420.1</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Webkit</td>
                      <td>S60</td>
                      <td class="hidden-480">S60</td>
                      <td class="hidden-480">413</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 7.0</td>
                      <td class="hidden-480">Win 95+ / OSX.1+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 7.5</td>
                      <td class="hidden-480">Win 95+ / OSX.2+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 8.0</td>
                      <td class="hidden-480">Win 95+ / OSX.2+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 8.5</td>
                      <td class="hidden-480">Win 95+ / OSX.2+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 9.0</td>
                      <td class="hidden-480">Win 95+ / OSX.3+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 9.2</td>
                      <td class="hidden-480">Win 88+ / OSX.3+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera 9.5</td>
                      <td class="hidden-480">Win 88+ / OSX.3+</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Opera for Wii</td>
                      <td class="hidden-480">Wii</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Nokia N800</td>
                      <td class="hidden-480">N800</td>
                      <td class="hidden-480">-</td>
                      <td class="hidden-480">A</td>
                    </tr>
                    <tr >
                      <td>Presto</td>
                      <td>Nintendo DS browser</td>
                      <td class="hidden-480">Nintendo DS</td>
                      <td class="hidden-480">8.5</td>
                      <td class="hidden-480">C/A<sup>1</sup></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
      <!-- END PAGE CONTAINER-->
@endsection
