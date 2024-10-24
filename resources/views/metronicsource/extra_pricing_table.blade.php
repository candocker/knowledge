@php $datas['layoutDatas'] = ['viewCode' => 'pricing', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN INLINE NOTIFICATIONS PORTLET-->
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Pricing Tables</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="row-fluid">
                  <!-- Pricing -->
                  <div class="row-fluid margin-bottom-40">
                    <div class="span3 pricing hover-effect">
                      <div class="pricing-head">
                        <h3>Begginer <span>Officia deserunt mollitia</span></h3>
                        <h4><i>$</i>5<i>.49</i> <span>Per Month</span></h4>
                      </div>
                      <ul class="pricing-content unstyled">
                        <li><i class="icon-tags"></i> At vero eos</li>
                        <li><i class="icon-asterisk"></i> No Support</li>
                        <li><i class="icon-heart"></i> Fusce condimentum</li>
                        <li><i class="icon-star"></i> Ut non libero</li>
                        <li><i class="icon-shopping-cart"></i> Consecte adiping elit</li>
                      </ul>
                      <div class="pricing-footer">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .</p>
                        <a href="#" class="btn green">
                        Sign Up <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                      </div>
                    </div>
                    <div class="span3 pricing hover-effect">
                      <div class="pricing-head">
                        <h3>Pro <span>Officia deserunt mollitia</span></h3>
                        <h4><i>$</i>8<i>.69</i> <span>Per Month</span></h4>
                      </div>
                      <ul class="pricing-content unstyled">
                        <li><i class="icon-tags"></i> At vero eos</li>
                        <li><i class="icon-asterisk"></i> No Support</li>
                        <li><i class="icon-heart"></i> Fusce condimentum</li>
                        <li><i class="icon-star"></i> Ut non libero</li>
                        <li><i class="icon-shopping-cart"></i> Consecte adiping elit</li>
                      </ul>
                      <div class="pricing-footer">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .</p>
                        <a href="#" class="btn green">
                        Sign Up <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                      </div>
                    </div>
                    <div class="span3 pricing pricing-active hover-effect">
                      <div class="pricing-head pricing-head-active">
                        <h3>Expert <span>Officia deserunt mollitia</span></h3>
                        <h4><i>$</i>13<i>.99</i> <span>Per Month</span></h4>
                      </div>
                      <ul class="pricing-content unstyled">
                        <li><i class="icon-tags"></i> At vero eos</li>
                        <li><i class="icon-asterisk"></i> No Support</li>
                        <li><i class="icon-heart"></i> Fusce condimentum</li>
                        <li><i class="icon-star"></i> Ut non libero</li>
                        <li><i class="icon-shopping-cart"></i> Consecte adiping elit</li>
                      </ul>
                      <div class="pricing-footer">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .</p>
                        <a href="#" class="btn green">
                        Sign Up <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                      </div>
                    </div>
                    <div class="span3 pricing hover-effect">
                      <div class="pricing-head">
                        <h3>Hi-Tech<span>Officia deserunt mollitia</span></h3>
                        <h4><i>$</i>99<i>.00</i> <span>Per Month</span></h4>
                      </div>
                      <ul class="pricing-content unstyled">
                        <li><i class="icon-tags"></i> At vero eos</li>
                        <li><i class="icon-asterisk"></i> No Support</li>
                        <li><i class="icon-heart"></i> Fusce condimentum</li>
                        <li><i class="icon-star"></i> Ut non libero</li>
                        <li><i class="icon-shopping-cart"></i> Consecte adiping elit</li>
                      </ul>
                      <div class="pricing-footer">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .</p>
                        <a href="#" class="btn green">
                        Sign Up <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <!--/row-fluid-->
                  <!--//End Pricing -->
                </div>
              </div>
            </div>
            <!-- END INLINE NOTIFICATIONS PORTLET-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN INLINE NOTIFICATIONS PORTLET-->
            <div class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Pricing Tables</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="row-fluid">
                  <div class="span3">
                    <div class="pricing-table">
                      <h3>Basic</h3>
                      <div class="desc">
                        Duis mollis, est non commodo luctus, nisi erat
                        porttitor ligula, eget lacinia odio sem nec elit.
                      </div>
                      <ul>
                        <li><i class="icon-angle-right"></i> 10 Email Accounts</li>
                        <li><i class="icon-angle-right"></i> 10 User Accounts</li>
                        <li><i class="icon-angle-right"></i> 100 GB Storage</li>
                        <li><i class="icon-angle-right"></i> 24X7 Support</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                      </ul>
                      <div class="rate">
                        <div class="price">
                          <div class="currency ">
                            $<br />
                            Monthly
                          </div>
                          <div class="amount ">
                            99
                          </div>
                        </div>
                        <a href="#" class="btn green">
                        Sign Up <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="spance10 visible-phone"></div>
                  <div class="span3">
                    <div class="pricing-table">
                      <h3>Standard</h3>
                      <div class="desc">
                        Duis mollis, est non commodo luctus, nisi erat
                        porttitor ligula, eget lacinia odio sem nec elit.
                      </div>
                      <ul>
                        <li><i class="icon-angle-right"></i> 100 Email Accounts</li>
                        <li><i class="icon-angle-right"></i> 100 User Accounts</li>
                        <li><i class="icon-angle-right"></i> 1 TB Storage</li>
                        <li><i class="icon-angle-right"></i> 24X7 Support</li>
                        <li><i class="icon-angle-right"></i> Full Backup</li>
                        <li><i class="icon-angle-right"></i> Free Setup</li>
                        <li>&nbsp;</li>
                      </ul>
                      <div class="rate">
                        <div class="price">
                          <div class="currency ">
                            $<br />
                            Monthly
                          </div>
                          <div class="amount ">
                            299
                          </div>
                        </div>
                        <a href="#" class="btn green">
                        Sign Up <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="spance10 visible-phone"></div>
                  <div class="span3">
                    <div class="pricing-table selected">
                      <h3>Professional</h3>
                      <div class="desc">
                        Duis mollis, est non commodo luctus, nisi erat
                        porttitor ligula, eget lacinia odio sem nec elit.
                      </div>
                      <ul>
                        <li><i class="icon-angle-right"></i> Unlimited Email Accounts</li>
                        <li><i class="icon-angle-right"></i> Unlimited User Accounts</li>
                        <li><i class="icon-angle-right"></i> 10 TB Storage</li>
                        <li><i class="icon-angle-right"></i> 24X7 Support</li>
                        <li><i class="icon-angle-right"></i> Full Backup</li>
                        <li><i class="icon-angle-right"></i> Free Setup</li>
                        <li><i class="icon-angle-right"></i> Free CDN</li>
                      </ul>
                      <div class="rate">
                        <div class="price">
                          <div class="currency ">
                            $<br />
                            Monthly
                          </div>
                          <div class="amount ">
                            399
                          </div>
                        </div>
                        <a href="#" class="btn yellow">
                        Sign Up <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="spance10 visible-phone"></div>
                  <div class="span3">
                    <div class="pricing-table">
                      <h3>Enterprise</h3>
                      <div class="desc">
                        Duis mollis, est non commodo luctus, nisi erat
                        porttitor ligula, eget lacinia odio sem nec elit.
                      </div>
                      <ul>
                        <li><i class="icon-angle-right"></i> Unlimited Email Accounts</li>
                        <li><i class="icon-angle-right"></i> Unlimited User Accounts</li>
                        <li><i class="icon-angle-right"></i> Unlimited Storage</li>
                        <li><i class="icon-angle-right"></i> 24X7 Support</li>
                        <li><i class="icon-angle-right"></i> Full Backup</li>
                        <li><i class="icon-angle-right"></i> Free Setup</li>
                        <li><i class="icon-angle-right"></i> Free CDN</li>
                      </ul>
                      <div class="rate">
                        <div class="price">
                          <div class="currency ">
                            $<br />
                            Monthly
                          </div>
                          <div class="amount ">
                            999
                          </div>
                        </div>
                        <a href="#" class="btn green">
                        Sign Up <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END INLINE NOTIFICATIONS PORTLET-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN INLINE NOTIFICATIONS PORTLET-->
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Pricing Tables</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body">
                <div class="row-fluid">
                  <div class="span3">
                    <div class="pricing-table2">
                      <h3>Basic</h3>
                      <div class="desc">
                        Duis mollis, est non commodo luctus, nisi erat
                        porttitor ligula, eget lacinia odio sem nec elit.
                      </div>
                      <div class="rate">
                        <div class="price">
                          <div class="currency ">
                            $<br />
                            Monthly
                          </div>
                          <div class="amount ">
                            99
                          </div>
                        </div>
                        <a href="#" class="btn">
                        Sign Up <i class="m-icon-swapright"></i>
                        </a>
                      </div>
                      <ul>
                        <li><i class="icon-angle-right"></i> 10 Email Accounts</li>
                        <li><i class="icon-angle-right"></i> 10 User Accounts</li>
                        <li><i class="icon-angle-right"></i> 100 GB Storage</li>
                        <li><i class="icon-angle-right"></i> 24X7 Support</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                      </ul>
                    </div>
                  </div>
                  <div class="spance10 visible-phone"></div>
                  <div class="span3">
                    <div class="pricing-table2">
                      <h3>Standard</h3>
                      <div class="desc">
                        Duis mollis, est non commodo luctus, nisi erat
                        porttitor ligula, eget lacinia odio sem nec elit.
                      </div>
                      <div class="rate">
                        <div class="price">
                          <div class="currency ">
                            $<br />
                            Monthly
                          </div>
                          <div class="amount ">
                            299
                          </div>
                        </div>
                        <a href="#" class="btn">
                        Sign Up <i class="m-icon-swapright"></i>
                        </a>
                      </div>
                      <ul>
                        <li><i class="icon-angle-right"></i> 100 Email Accounts</li>
                        <li><i class="icon-angle-right"></i> 100 User Accounts</li>
                        <li><i class="icon-angle-right"></i> 1 TB Storage</li>
                        <li><i class="icon-angle-right"></i> 24X7 Support</li>
                        <li><i class="icon-angle-right"></i> Full Backup</li>
                        <li><i class="icon-angle-right"></i> Free Setup</li>
                        <li>&nbsp;</li>
                      </ul>
                    </div>
                  </div>
                  <div class="spance10 visible-phone"></div>
                  <div class="span3">
                    <div class="pricing-table2 selected">
                      <h3>Professional</h3>
                      <div class="desc">
                        Duis mollis, est non commodo luctus, nisi erat
                        porttitor ligula, eget lacinia odio sem nec elit.
                      </div>
                      <div class="rate">
                        <div class="price">
                          <div class="currency ">
                            $<br />
                            Monthly
                          </div>
                          <div class="amount ">
                            399
                          </div>
                        </div>
                        <a href="#" class="btn green">
                        Sign Up <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                      </div>
                      <ul>
                        <li><i class="icon-angle-right"></i> Unlimited Email Accounts</li>
                        <li><i class="icon-angle-right"></i> Unlimited User Accounts</li>
                        <li><i class="icon-angle-right"></i> 10 TB Storage</li>
                        <li><i class="icon-angle-right"></i> 24X7 Support</li>
                        <li><i class="icon-angle-right"></i> Full Backup</li>
                        <li><i class="icon-angle-right"></i> Free Setup</li>
                        <li><i class="icon-angle-right"></i> Free CDN</li>
                      </ul>
                    </div>
                  </div>
                  <div class="spance10 visible-phone"></div>
                  <div class="span3">
                    <div class="pricing-table2">
                      <h3>Enterprise</h3>
                      <div class="desc">
                        Duis mollis, est non commodo luctus, nisi erat
                        porttitor ligula, eget lacinia odio sem nec elit.
                      </div>
                      <div class="rate">
                        <div class="price">
                          <div class="currency ">
                            $<br />
                            Monthly
                          </div>
                          <div class="amount ">
                            999
                          </div>
                        </div>
                        <a href="#" class="btn ">
                        Sign Up <i class="m-icon-swapright"></i>
                        </a>
                      </div>
                      <ul>
                        <li><i class="icon-angle-right"></i> Unlimited Email Accounts</li>
                        <li><i class="icon-angle-right"></i> Unlimited User Accounts</li>
                        <li><i class="icon-angle-right"></i> Unlimited Storage</li>
                        <li><i class="icon-angle-right"></i> 24X7 Support</li>
                        <li><i class="icon-angle-right"></i> Full Backup</li>
                        <li><i class="icon-angle-right"></i> Free Setup</li>
                        <li><i class="icon-angle-right"></i> Free CDN</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END INLINE NOTIFICATIONS PORTLET-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
