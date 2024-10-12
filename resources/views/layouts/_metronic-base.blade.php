@php
$layoutDatas = $datas['layoutDatas'];
$viewCode = $layoutDatas['viewCode'];
$footerView = $layoutDatas['footerView'] ?? 'base';
@endphp
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Metronic | Data Tables - Basic Tables</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="{{$commonAssetUrl}}/metronic/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="{{$commonAssetUrl}}/metronic/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
  <link href="{{$commonAssetUrl}}/metronic/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link href="{{$commonAssetUrl}}/metronic/media/css/style-metro.css" rel="stylesheet" type="text/css"/>
  <link href="{{$commonAssetUrl}}/metronic/media/css/style.css" rel="stylesheet" type="text/css"/>
  <link href="{{$commonAssetUrl}}/metronic/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>
  <link href="{{$commonAssetUrl}}/metronic/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
  <link href="{{$commonAssetUrl}}/metronic/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
  <!-- END GLOBAL MANDATORY STYLES -->
  @include('layouts.metronic._point-header', ['viewCode' => $viewCode])
  <link rel="shortcut icon" href="{{$commonAssetUrl}}/metronic/media/image/favicon.ico" />
</head>

<body class="{{$layoutDatas['bodyClass']}}">
@yield('layoutcontent')
@include('layouts.metronic._footer-' . $footerView)
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="{{$commonAssetUrl}}/metronic/media/js/excanvas.min.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/respond.min.js"></script>
<![endif]-->
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.cookie.min.js" type="text/javascript"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.uniform.min.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
@include('layouts.metronic._point-js', ['viewCode' => $viewCode])
</body>
<!-- END BODY -->
</html>
