@php $datas['layoutDatas'] = ['viewCode' => 'formvalidation', 'bodyClass' => 'page-header-fixed']; @endphp
@extends('layouts.metronic')
@section('content')
      <div class="container-fluid">
        @include('knowledge.metronic._breadcrumb', ['datas' => $datas])
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Validation States</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body form">
                <h3 class="block">Basic validation states</h3>
                <!-- BEGIN FORM-->
                <form action="#" class="form-horizontal">
                  <div class="control-group warning">
                    <label class="control-label" for="inputWarning">Input with warning</label>
                    <div class="controls">
                      <input type="text" class="span6 m-wrap" id="inputWarning" />
                      <span class="help-inline">Something may have gone wrong</span>
                    </div>
                  </div>
                  <div class="control-group error">
                    <label class="control-label" for="inputError">Input with error</label>
                    <div class="controls">
                      <input type="text" class="span6 m-wrap" id="inputError" />
                      <span class="help-inline">Please correct the error</span>
                    </div>
                  </div>
                  <div class="control-group success">
                    <label class="control-label" for="inputSuccess">Input with success</label>
                    <div class="controls">
                      <input type="text" class="span6 m-wrap" id="inputSuccess" />
                      <span class="help-inline ok"></span>
                    </div>
                  </div>
                  <div class="control-group warning">
                    <label class="control-label">Input with warning</label>
                    <div class="controls input-icon">
                      <input type="text" class="span6 m-wrap" />
                      <span class="input-warning tooltips" data-original-title="please write a valid email">
                      <i class="icon-warning-sign"></i>
                      </span>
                    </div>
                  </div>
                  <div class="control-group error">
                    <label class="control-label">Input with error</label>
                    <div class="controls input-icon">
                      <input type="text" class="span6 m-wrap" />
                      <span class="input-error tooltips" data-original-title="please write a valid email">
                      <i class="icon-exclamation-sign"></i>
                      </span>
                    </div>
                  </div>
                  <div class="control-group success">
                    <label class="control-label">Input with success</label>
                    <div class="controls input-icon">
                      <input type="text" class="span6 m-wrap" />
                      <span class="input-success tooltips" data-original-title="Success input!">
                      <i class="icon-ok"></i>
                      </span>
                    </div>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn blue">Save</button>
                    <button type="button" class="btn">Cancel</button>
                  </div>
                </form>
                <!-- END FORM-->
              </div>
            </div>
            <!-- END VALIDATION STATES-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box purple">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Basic Validation</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="#" id="form_sample_1" class="form-horizontal">
                  <div class="alert alert-error hide">
                    <button class="close" data-dismiss="alert"></button>
                    You have some form errors. Please check below.
                  </div>
                  <div class="alert alert-success hide">
                    <button class="close" data-dismiss="alert"></button>
                    Your form validation is successful!
                  </div>
                  <div class="control-group">
                    <label class="control-label">Name<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text" name="name" data-required="1" class="span6 m-wrap"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Email<span class="required">*</span></label>
                    <div class="controls">
                      <input name="email" type="text" class="span6 m-wrap"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">URL<span class="required">*</span></label>
                    <div class="controls">
                      <input name="url" type="text" class="span6 m-wrap"/>
                      <span class="help-block">e.g: http://www.demo.com or http://demo.com</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Number<span class="required">*</span></label>
                    <div class="controls">
                      <input name="number" type="text" class="span6 m-wrap"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Digits<span class="required">*</span></label>
                    <div class="controls">
                      <input name="digits" type="text" class="span6 m-wrap"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Credit Card<span class="required">*</span></label>
                    <div class="controls">
                      <input name="creditcard" type="text" class="span6 m-wrap"/>
                      <span class="help-block">e.g: 5500 0000 0000 0004</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Occupation&nbsp;&nbsp;</label>
                    <div class="controls">
                      <input name="occupation" type="text" class="span6 m-wrap"/>
                      <span class="help-block">optional field</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Category<span class="required">*</span></label>
                    <div class="controls">
                      <select class="span6 m-wrap" name="category">
                        <option value="">Select...</option>
                        <option value="Category 1">Category 1</option>
                        <option value="Category 2">Category 2</option>
                        <option value="Category 3">Category 5</option>
                        <option value="Category 4">Category 4</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn purple">Validate</button>
                    <button type="button" class="btn">Cancel</button>
                  </div>
                </form>
                <!-- END FORM-->
              </div>
            </div>
            <!-- END VALIDATION STATES-->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Advance Validation</div>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="#portlet-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <h3>Advance validation of custom radio buttons, checkboxes and chosen dropdowns</h3>
                <form action="#" id="form_sample_2" class="form-horizontal">
                  <div class="alert alert-error hide">
                    <button class="close" data-dismiss="alert"></button>
                    You have some form errors. Please check below.
                  </div>
                  <div class="alert alert-success hide">
                    <button class="close" data-dismiss="alert"></button>
                    Your form validation is successful!
                  </div>
                  <div class="control-group">
                    <label class="control-label">Name<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text" name="name" data-required="1" class="span6 m-wrap"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Email<span class="required">*</span></label>
                    <div class="controls">
                      <input name="email" type="text" class="span6 m-wrap"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Occupation&nbsp;&nbsp;</label>
                    <div class="controls">
                      <input name="occupation" type="text" class="span6 m-wrap"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Category<span class="required">*</span></label>
                    <div class="controls">
                      <select class="span6 m-wrap" name="category">
                        <option value="">Select...</option>
                        <option value="Category 1">Category 1</option>
                        <option value="Category 2">Category 2</option>
                        <option value="Category 3">Category 5</option>
                        <option value="Category 4">Category 4</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Chosen Dropdown<span class="required">*</span></label>
                    <div class="controls chzn-controls">
                      <select id="form_2_chosen" class="span6 chosen" data-with-diselect="1" name="options1" data-placeholder="Choose an Option" tabindex="1">
                        <option value=""></option>
                        <option value="Option 1">Option 1</option>
                        <option value="Option 2">Option 2</option>
                        <option value="Option 3">Option 3</option>
                        <option value="Option 4">Option 4</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Select2 Dropdown<span class="required">*</span></label>
                    <div class="controls select2-wrapper">
                      <select id="form_2_select2" class="span6" name="options2">
                        <option value=""></option>
                        <option value="Option 1">Option 1</option>
                        <option value="Option 2">Option 2</option>
                        <option value="Option 3">Option 3</option>
                        <option value="Option 4">Option 4</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Membership<span class="required">*</span></label>
                    <div class="controls">
                      <label class="radio line">
                      <input type="radio" name="membership" value="1" />
                      Fee
                      </label>
                      <label class="radio line">
                      <input type="radio" name="membership" value="2" />
                      Professional
                      </label>
                      <div id="form_2_membership_error"></div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Services<span class="required">*</span></label>
                    <div class="controls">
                      <label class="checkbox line">
                      <input type="checkbox" value="1" name="service"/> Service 1
                      </label>
                      <label class="checkbox line">
                      <input type="checkbox" value="2" name="service"/> Service 2
                      </label>
                      <label class="checkbox line">
                      <input type="checkbox" value="3" name="service"/> Service 3
                      </label>
                      <span class="help-block">(select at least two)</span>
                      <div id="form_2_service_error"></div>
                    </div>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn green">Validate</button>
                    <button type="button" class="btn">Cancel</button>
                  </div>
                </form>
                <!-- END FORM-->
              </div>
            </div>
            <!-- END VALIDATION STATES-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->
      </div>
@endsection
