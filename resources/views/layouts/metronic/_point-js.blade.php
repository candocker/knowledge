@if (in_array($viewCode, ['tableAdvanced']))
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{$commonAssetUrl}}/metronic/media/js/select2.min.js"></script>
<script type="text/javascript" src="{{$commonAssetUrl}}/metronic/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{$commonAssetUrl}}/metronic/media/js/DT_bootstrap.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/app.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/table-advanced.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
@elseif (in_array($viewCode, ['loginSoft']))
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.backstretch.min.js" type="text/javascript"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/app.js" type="text/javascript"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/login-soft.js" type="text/javascript"></script>
@elseif (in_array($viewCode, ['errorbase']))
<script src="{{$commonAssetUrl}}/metronic/media/js/breakpoints.js" type="text/javascript"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/app.js"></script>
@elseif (in_array($viewCode, ['login']))
<script src="{{$commonAssetUrl}}/metronic/media/js/app.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/login.js"></script>
@elseif (in_array($viewCode, ['charts']))
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.flot.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.flot.resize.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.flot.pie.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.flot.stack.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.flot.crosshair.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/app.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/charts.js"></script>
@elseif (in_array($viewCode, ['image']))
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="{{$commonAssetUrl}}/metronic/media/js/chosen.jquery.min.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/app.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/gallery.js"></script>
@elseif (in_array($viewCode, ['profile']))
<script type="text/javascript" src="{{$commonAssetUrl}}/metronic/media/js/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="{{$commonAssetUrl}}/metronic/media/js/chosen.jquery.min.js"></script>
@elseif (in_array($viewCode, ['search']))
<script type="text/javascript" src="{{$commonAssetUrl}}/metronic/media/js/bootstrap-datepicker.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.fancybox.pack.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/app.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/search.js"></script>
@elseif (in_array($viewCode, ['lock']))
<script src="{{$commonAssetUrl}}/metronic/media/js/jquery.backstretch.min.js" type="text/javascript"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/app.js"></script>
<script src="{{$commonAssetUrl}}/metronic/media/js/lock.js"></script>
@else
<script src="{{$commonAssetUrl}}/metronic/media/js/app.js"></script>
@endif

<script>
jQuery(document).ready(function() {
  App.init();
  @if (in_array($viewCode, ['single']))
  jQuery('#promo_carousel').carousel({
    interval: 10000,
    pause: 'hover'
  });
  @elseif (in_array($viewCode, ['tableAdvanced']))
  TableAdvanced.init();
  @elseif (in_array($viewCode, ['search']))
  Search.init();
  @elseif (in_array($viewCode, ['lock']))
  Lock.init();
  @elseif (in_array($viewCode, ['image']))
  Gallery.init();
  @elseif (in_array($viewCode, ['charts']))
  Charts.init();
  Charts.initCharts();
  Charts.initPieCharts();
  @elseif (in_array($viewCode, ['login', 'loginSoft']))
  Login.init();
  @endif
});
</script>
<script type="text/javascript">
{{--var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-37564768-1']);
_gaq.push(['_setDomainName', 'keenthemes.com']);
_gaq.push(['_setAllowLinker', true]);
_gaq.push(['_trackPageview']);
(function() {
  var ga = document.createElement('script');
  ga.type = 'text/javascript';
  ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(ga, s);
})();--}}
</script>
