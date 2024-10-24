@php $datas['layoutDatas'] = ['viewCode' => 'invoice', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid invoice">
          <div class="row-fluid invoice-logo">
            <div class="span6 invoice-logo-space"><img src="{{$commonAssetUrl}}/metronic/media/image/walmart.png" alt="" /> </div>
            <div class="span6">
              <p>#5652256 / 28 Feb 2013 <span class="muted">Consectetuer adipiscing elit</span></p>
            </div>
          </div>
          <hr />
          <div class="row-fluid">
            <div class="span3">
              <h4>Client:</h4>
              <ul class="unstyled">
                <li>John Doe</li>
                <li>Mr Nilson Otto</li>
                <li>FoodMaster Ltd</li>
                <li>Madrid</li>
                <li>Spain</li>
                <li>1982 OOP</li>
              </ul>
            </div>
            <div class="span4">
              <h4>About:</h4>
              <ul class="unstyled">
                <li>Drem psum dolor sit amet</li>
                <li>Laoreet dolore magna</li>
                <li>Consectetuer adipiscing elit</li>
                <li>Magna aliquam tincidunt erat volutpat</li>
                <li>Olor sit amet adipiscing eli</li>
                <li>Laoreet dolore magna</li>
              </ul>
            </div>
            <div class="span4 invoice-payment">
              <h4>Payment Details:</h4>
              <ul class="unstyled">
                <li><strong>V.A.T Reg #:</strong> 542554(DEMO)78</li>
                <li><strong>Account Name:</strong> FoodMaster Ltd</li>
                <li><strong>SWIFT code:</strong> 45454DEMO545DEMO</li>
                <li><strong>V.A.T Reg #:</strong> 542554(DEMO)78</li>
                <li><strong>Account Name:</strong> FoodMaster Ltd</li>
                <li><strong>SWIFT code:</strong> 45454DEMO545DEMO</li>
              </ul>
            </div>
          </div>
          <div class="row-fluid">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th class="hidden-480">Description</th>
                  <th class="hidden-480">Quantity</th>
                  <th class="hidden-480">Unit Cost</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Hardware</td>
                  <td class="hidden-480">Server hardware purchase</td>
                  <td class="hidden-480">32</td>
                  <td class="hidden-480">$75</td>
                  <td>$2152</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Furniture</td>
                  <td class="hidden-480">Office furniture purchase</td>
                  <td class="hidden-480">15</td>
                  <td class="hidden-480">$169</td>
                  <td>$4169</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Foods</td>
                  <td class="hidden-480">Company Anual Dinner Catering</td>
                  <td class="hidden-480">69</td>
                  <td class="hidden-480">$49</td>
                  <td>$1260</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Software</td>
                  <td class="hidden-480">Payment for Jan 2013</td>
                  <td class="hidden-480">149</td>
                  <td class="hidden-480">$12</td>
                  <td>$866</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row-fluid">
            <div class="span4">
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
            <div class="span8 invoice-block">
              <ul class="unstyled amounts">
                <li><strong>Sub - Total amount:</strong> $9265</li>
                <li><strong>Discount:</strong> 12.9%</li>
                <li><strong>VAT:</strong> -----</li>
                <li><strong>Grand Total:</strong> $12489</li>
              </ul>
              <br />
              <a class="btn blue big hidden-print" onclick="javascript:window.print();">Print <i class="icon-print icon-big"></i></a>
              <a class="btn green big hidden-print">Submit Your Invoice <i class="m-icon-big-swapright m-icon-white"></i></a>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
