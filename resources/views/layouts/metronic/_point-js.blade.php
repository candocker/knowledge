@php
$elems = [
    'tableAdvanced' => ['select2.min.js', 'jquery.dataTables.min.js', 'DT_bootstrap.js', 'app.js', 'table-advanced.js'],
    'loginSoft' => ['jquery.validate.min.js', 'jquery.backstretch.min.js', 'app.js', 'login-soft.js'],
    'errorbase' => ['breakpoints.js', 'app.js'],
    'login' => ['jquery.validate.min.js', 'app.js', 'login.js'],
    'charts' => [
        'jquery.flot.js', 'jquery.flot.resize.js', 'jquery.flot.pie.js', 'jquery.flot.stack.js',
        'jquery.flot.crosshair.js', 'app.js', 'charts.js',
    ],
    'image' => ['jquery.fancybox.pack.js', 'chosen.jquery.min.js', 'app.js', 'gallery.js'],
    'profile' => ['bootstrap-fileupload.js', 'chosen.jquery.min.js'],
    'search' => ['bootstrap-datepicker.js', 'jquery.fancybox.pack.js', 'app.js', 'search.js'],
    'lock' => ['jquery.backstretch.min.js', 'app.js', 'lock.js'],
    'form' => [
        'ckeditor.js', 'bootstrap-fileupload.js', 'chosen.jquery.min.js', 'select2.min.js', 'wysihtml5-0.3.0.js',
        'bootstrap-wysihtml5.js', 'jquery.tagsinput.min.js', 'jquery.toggle.buttons.js', 'bootstrap-datepicker.js',
        'bootstrap-datetimepicker.js', 'clockface.js', 'date.js', 'daterangepicker.js',
        'bootstrap-colorpicker.js', 'bootstrap-timepicker.js', 'jquery.inputmask.bundle.min.js', 'jquery.input-ip-address-control-1.0.min.js',
        'jquery.multi-select.js', 'bootstrap-modal.js', 'bootstrap-modalmanager.js', 'app.js',
        'form-components.js',
    ],
    'fileupload' => [
        'jquery.fancybox.pack.js', 'jquery.ui.widget.js', 'tmpl.min.js', 'load-image.min.js',
        'canvas-to-blob.min.js', 'jquery.iframe-transport.js', 'jquery.fileupload.js', 'jquery.fileupload-fp.js',
        'jquery.fileupload-ui.js', 'jquery.xdr-transport.js', 'app.js', 'form-fileupload.js',
    ],
    'dropzone' => ['dropzone.js', 'app.js'],
    'formsample' => ['select2.min.js', 'app.js', 'form-samples.js'],
    'formvalidation' => [
        'jquery.validate.min.js', 'additional-methods.min.js', 'select2.min.js', 'chosen.jquery.min.js',
        'app.js', 'form-validation.js'
    ],
    'formwizard' => [
        'jquery.validate.min.js', 'additional-methods.min.js', 'jquery.bootstrap.wizard.min.js', 'chosen.jquery.min.js',
        'select2.min.js', 'app.js', 'form-wizard.js',
    ],
    'other' => ['app.js'],
];
$jsElems = $elems[$viewCode] ?? $elems['other'];
@endphp
@foreach ($jsElems as $pView)
<script type="text/javascript" src="{{$commonAssetUrl}}/metronic/media/js/{{$pView}}"></script>
@endforeach

<script>
jQuery(document).ready(function() {
  App.init();
  @if (in_array($viewCode, ['single']))
  jQuery('#promo_carousel').carousel({
    interval: 10000,
    pause: 'hover'
  });
  @elseif (in_array($viewCode, ['formwizard']))
       FormWizard.init();
  @elseif (in_array($viewCode, ['formvalidation']))
  FormValidation.init();
  @elseif (in_array($viewCode, ['formsample']))
  FormSamples.init();
  @elseif (in_array($viewCode, ['upload']))
  FormFileUpload.init();
  @elseif (in_array($viewCode, ['form']))
  FormComponents.init();
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
