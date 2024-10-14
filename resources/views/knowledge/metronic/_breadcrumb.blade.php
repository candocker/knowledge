  <div class="row-fluid">
    <div class="span12">
      @include('knowledge.metronic._setting')
      <h3 class="page-title">{{$datas['currentNav']['name']}}  <small>{{$datas['currentNav']['brief']}}</small></h3>
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
        <li><a href="#">Basic Tables</a></li>
        {{--<li class="pull-right no-text-shadow">
          <div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>
            <span></span>
            <i class="icon-angle-down"></i>
          </div>
        </li>--}}
      </ul>
    </div>
  </div>
