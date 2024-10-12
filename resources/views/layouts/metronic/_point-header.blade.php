@if (in_array($viewCode, ['table']))
<link rel="stylesheet" href="{{$commonAssetUrl}}/metronic/media/css/DT_bootstrap.css" />
@elseif (in_array($viewCode, ['tableAdvanced']))
<link rel="stylesheet" type="text/css" href="{{$commonAssetUrl}}/metronic/media/css/select2_metro.css" />
<link rel="stylesheet" href="{{$commonAssetUrl}}/metronic/media/css/DT_bootstrap.css" />
@elseif (in_array($viewCode, ['single']))
<link href="{{$commonAssetUrl}}/metronic/media/css/promo.css" rel="stylesheet" type="text/css"/>
<link href="{{$commonAssetUrl}}/metronic/media/css/animate.css" rel="stylesheet" type="text/css"/>
@elseif (in_array($viewCode, ['login']))
<link href="{{$commonAssetUrl}}/metronic/media/css/login.css" rel="stylesheet" type="text/css"/>
@elseif (in_array($viewCode, ['loginSoft']))
<link href="{{$commonAssetUrl}}/metronic/media/css/login-soft.css" rel="stylesheet" type="text/css"/>
@elseif (in_array($viewCode, ['image']))
<link href="{{$commonAssetUrl}}/metronic/media/css/jquery.fancybox.css" rel="stylesheet" />
<link href="{{$commonAssetUrl}}/metronic/media/css/chosen.css" rel="stylesheet" type="text/css"/>
@elseif (in_array($viewCode, ['invoice']))
{{--<link href="media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" media="screen"/>--}}
<link href="{{$commonAssetUrl}}/metronic/media/css/invoice.css" rel="stylesheet" type="text/css"/>
<link href="{{$commonAssetUrl}}/metronic/media/css/print.css" rel="stylesheet" type="text/css" media="print"/>
@elseif (in_array($viewCode, ['lock']))
<link href="{{$commonAssetUrl}}/metronic/media/css/lock.css" rel="stylesheet" type="text/css"/>
@elseif (in_array($viewCode, ['search']))
<link rel="stylesheet" type="text/css" href="{{$commonAssetUrl}}/metronic/media/css/datepicker.css" />
<link href="{{$commonAssetUrl}}/metronic/media/css/jquery.fancybox.css" rel="stylesheet" />
<link href="{{$commonAssetUrl}}/metronic/media/css/search.css" rel="stylesheet" type="text/css"/>
@elseif (in_array($viewCode, ['profile']))
<link href="{{$commonAssetUrl}}/metronic/media/css/bootstrap-fileupload.css" rel="stylesheet" type="text/css" />
<link href="{{$commonAssetUrl}}/metronic/media/css/chosen.css" rel="stylesheet" type="text/css" />
<link href="{{$commonAssetUrl}}/metronic/media/css/profile.css" rel="stylesheet" type="text/css" />
@elseif (in_array($viewCode, ['pricing']))
<link href="{{$commonAssetUrl}}/metronic/media/css/pricing-tables.css" rel="stylesheet" type="text/css"/>
@elseif (in_array($viewCode, ['errorbase']))
<link href="{{$commonAssetUrl}}/metronic/media/css/error.css" rel="stylesheet" type="text/css"/>
@elseif (in_array($viewCode, ['timeline']))
<link href="{{$commonAssetUrl}}/metronic/media/css/timeline.css" rel="stylesheet" type="text/css"/>
@endif
