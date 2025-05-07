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
    'inbox' => [
        'bootstrap-tag.js', 'jquery.fancybox.pack.js', 'wysihtml5-0.3.0.js', 'bootstrap-wysihtml5.js',
        'jquery.ui.widget.js', 'tmpl.min.js', 'load-image.min.js', 'canvas-to-blob.min.js',
        'jquery.iframe-transport.js', 'jquery.fileupload.js', 'jquery.fileupload-fp.js', 'jquery.fileupload-ui.js',
        'jquery.xdr-transport.js', 'app.js', 'inbox.js',
    ],
    'index' => [
        'jquery.vmap.js', 'jquery.vmap.russia.js', 'jquery.vmap.world.js', 'jquery.vmap.europe.js',
        'jquery.vmap.germany.js', 'jquery.vmap.usa.js', 'jquery.vmap.sampledata.js', 'jquery.flot.js',
        'jquery.flot.resize.js', 'jquery.pulsate.min.js', 'date.js', 'daterangepicker.js',
        'jquery.gritter.js', 'fullcalendar.min.js', 'jquery.easy-pie-chart.js', 'jquery.sparkline.min.js',
        'app.js', 'index.js',
    ],
    'draggable' => ['app.js', 'portlet-draggable.js'],
    'google' => ['js', 'gmaps.js', 'app.js', 'maps-google.js'],
    'vector' => [
        'jquery.vmap.js', 'jquery.vmap.russia.js', 'jquery.vmap.world.js', 'jquery.vmap.europe.js',
        'jquery.vmap.germany.js', 'jquery.vmap.usa.js', 'jquery.vmap.sampledata.js',
        'app.js', 'maps-vector.js',
    ],
    'tableEditable' => ['select2.min.js', 'jquery.dataTables.min.js', 'DT_bootstrap.js', 'app.js', 'table-editable.js'],
    'tableManaged' => ['select2.min.js', 'jquery.dataTables.min.js', 'DT_bootstrap.js', 'app.js', 'table-managed.js'],
    'tree' => ['bootstrap-tree.js', 'app.js', 'ui-tree.js'],
    'sliders' => ['jquery.knob.js', 'app.js', 'ui-sliders.js'],
    'nestable' => ['jquery.nestable.js', 'ui-nestable.js', 'app.js'],
    'modals' => ['bootstrap-modal.js', 'bootstrap-modalmanager.js', 'app.js', 'select2.min.js', 'ui-modals.js'],
    'pointsingle' => [
        'bootstrap-modal.js', 'bootstrap-modalmanager.js', 'jquery.dataTables.js', 'DT_bootstrap.js', 
        'jquery.fancybox.pack.js',
        'app.js', 'gallery.js', 'self-table.js', 'select2.min.js', 'self-ajax.js',
    ],
    'jqueryui' => ['app.js', 'ui-jqueryui.js'],
    'uigeneral' => ['jquery.gritter.js', 'jquery.pulsate.min.js', 'jquery.bootpag.min.js', 'app.js', 'ui-general.js'],
    'calendar' => ['fullcalendar.min.js', 'app.js', 'calendar.js'],
    'comingsoon' => ['jquery.countdown.js', 'jquery.backstretch.min.js', 'app.js', 'coming-soon.js'],
    'contact' => ['js', 'gmaps.js', 'app.js', 'contact-us.js'],
    'ajax' => ['select2.min.js', 'app.js'],
    'other' => ['app.js'],
];
$jsElems = $elems[$viewCode] ?? $elems['other'];
$randNum = time();
@endphp
@foreach ($jsElems as $pView)
<script type="text/javascript" src="{{$commonAssetUrl}}/metronic/media/js/{{$pView}}?v={{$randNum}}"></script>
@endforeach

<script>
jQuery(document).ready(function() {
  App.init();
  @if (in_array($viewCode, ['single']))
  jQuery('#promo_carousel').carousel({
    interval: 10000,
    pause: 'hover'
  });
  @elseif (in_array($viewCode, ['ajax']))
       $('.page-sidebar .ajaxify.start').click() // load the content for the dashboard page.
  @elseif (in_array($viewCode, ['contact']))
       ContactUs.init();
  @elseif (in_array($viewCode, ['comingsoon']))
      CoomingSoon.init();
  @elseif (in_array($viewCode, ['calendar']))
       Calendar.init();
  @elseif (in_array($viewCode, ['uigeneral']))
       UIGeneral.init();
  @elseif (in_array($viewCode, ['jqueryui']))
       UIJQueryUI.init();
  @elseif (in_array($viewCode, ['pointsingle']))
       SelfTable.init();
       Gallery.init();
       SelfAjax.init();
  @elseif (in_array($viewCode, ['modals']))
       UIModals.init();
  @elseif (in_array($viewCode, ['nestable']))
       UINestable.init();
  @elseif (in_array($viewCode, ['sliders']))
       UISliders.initSliders();
       UISliders.initKnowElements();
  @elseif (in_array($viewCode, ['tree']))
       UITree.init();
  @elseif (in_array($viewCode, ['tableManaged']))
       TableManaged.init();
  @elseif (in_array($viewCode, ['tableEditable']))
       TableEditable.init();
  @elseif (in_array($viewCode, ['index']))
       Index.init();
       Index.initJQVMAP(); // init index page's custom scripts
       Index.initCalendar(); // init index page's custom scripts
       Index.initCharts(); // init index page's custom scripts
       Index.initChat();
       Index.initMiniCharts();
       Index.initDashboardDaterange();
       Index.initIntro();
  @elseif (in_array($viewCode, ['vector']))
       MapsVector.init();
  @elseif (in_array($viewCode, ['google']))
       MapsGoogle.init();
  @elseif (in_array($viewCode, ['draggable']))
       PortletDraggable.init();
  @elseif (in_array($viewCode, ['inbox']))
  Inbox.init();
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
