@php
$elems = [
    'table' => ['DT_bootstrap.css'],
    'tableAdvanced' => ['select2_metro.css', 'DT_bootstrap.css'],
    'tableEditable' => ['select2_metro.css', 'DT_bootstrap.css'],
    'tableManaged' => ['select2_metro.css', 'DT_bootstrap.css'],
    'single' => ['promo.css', 'animate.css'],
    'login' => ['login.css'],
    'loginSoft' => ['login-soft.css'],
    'image' => ['jquery.fancybox.css', 'chosen.css'],
    'invoice' => ['bootstrap-responsive.min.css', 'invoice.css', 'print.css'],
    'lock' => ['lock.css'],
    'form' => [
        'bootstrap-fileupload.css', 'jquery.gritter.css', 'chosen.css', 'select2_metro.css', 'jquery.tagsinput.css',
        'clockface.css', 'bootstrap-wysihtml5.css', 'datepicker.css', 'timepicker.css', 'colorpicker.css',
        'bootstrap-toggle-buttons.css', 'daterangepicker.css', 'datetimepicker.css', 'multi-select-metro.css', 'bootstrap-modal.css',
    ],
    'search' => ['datepicker.css', 'jquery.fancybox.css', 'search.css'],
    'profile' => ['bootstrap-fileupload.css', 'chosen.css', 'profile.css'],
    'pricing' => ['pricing-tables.css'],
    'errorbase' => ['error.css'],
    'timeline' => ['timeline.css'],
    'dropzone' => ['dropzone.css'],
    'formsample' => ['select2_metro.css'],
    'formvalidation' => ['select2_metro.css', 'chosen.css'],
    'formwizard' => ['select2_metro.css', 'chosen.css'],
    'fileupload' => ['jquery.fancybox.css', 'jquery.fileupload-ui.css'],
    'index' => ['jquery.gritter.css', 'daterangepicker.css', 'fullcalendar.css', 'jqvmap.css', 'jquery.easy-pie-chart.css'],
    'inbox' => [
        'bootstrap-tag.css', 'bootstrap-wysihtml5.css', 'jquery.fancybox.css', 'bootstrap-wysihtml5.css',
        'jquery.fileupload-ui.css', 'inbox.css',
    ],
    'vector' => ['jqvmap.css'],
    'tree' => ['bootstrap-tree.css'],
    'sliders' => ['jquery-ui-1.10.1.custom.min.css', 'jquery.ui.slider.css'],
    'nestable' => ['jquery.nestable.css'],
    'modals' => ['jquery-ui-1.10.1.custom.min.css', 'bootstrap-modal.css'],
    'jqueryui' => ['jquery-ui-1.10.1.custom.min.css'],
    'uigeneral' => ['jquery.gritter.css'],
    'uibuttons' => ['glyphicons.css', 'halflings.css'],
    'email' => ['email.css'],
    'about' => ['about-us.css'],
    'blog' => ['blog.css'],
    'calendar' => ['fullcalendar.css'],
    'news' => ['news.css', 'blog.css'],
    'comingsoon' => ['coming-soon.css'],
    'ajax' => ['select2_metro.css'],
];
@endphp
@if (isset($elems[$viewCode]))
@foreach ($elems[$viewCode] as $pView)
<link rel="stylesheet" type="text/css" href="{{$commonAssetUrl}}/metronic/media/css/{{$pView}}" />
@endforeach
@endif
