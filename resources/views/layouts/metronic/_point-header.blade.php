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
@elseif (in_array($viewCode, ['timeline']))
<link href="{{$commonAssetUrl}}/metronic/media/css/timeline.css" rel="stylesheet" type="text/css"/>
@endif
