<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>首页</title>
<!-- load stylesheets -->
<link rel="stylesheet" href="http://fonts.useso.com/css?family=Open+Sans:100,300,400">   <!-- Google web font "Open Sans" -->
<link rel="stylesheet" href="{{$commonAssetUrl}}/resumes/font-awesome-4.5.0/css/font-awesome.min.css">                <!-- Font Awesome -->
<link rel="stylesheet" href="{{$commonAssetUrl}}/resumes/css/bootstrap.min.css">                                      <!-- Bootstrap style -->
<link rel="stylesheet" href="{{$commonAssetUrl}}/resumes/css/magnific-popup.css">                                     <!-- Magnific pop up style -->
<link rel="stylesheet" href="{{$commonAssetUrl}}/resumes/css/templatemo-style.css">                                   <!-- Templatemo style -->

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body id="top" class="home">

<div class="container-fluid">

    @yield('content')


<!-- load JS files -->

<script src="{{$commonAssetUrl}}/resumes/js/jquery-1.11.3.min.js"></script>
<script src="{{$commonAssetUrl}}/resumes/js/tether.min.js"></script>
<script src="{{$commonAssetUrl}}/resumes/js/bootstrap.min.js"></script>
<script src="{{$commonAssetUrl}}/resumes/js/jquery.singlePageNav.min.js"></script>
<script src="{{$commonAssetUrl}}/resumes/js/jquery.magnific-popup.min.js"></script>

<!-- Templatemo scripts -->
<script>

$(document).ready(function(){

  var mobileTopOffset = 54;
  var desktopTopOffset = 80;
  var topOffset = desktopTopOffset;

  if($(window).width() <= 767) {
    topOffset = mobileTopOffset;
  }

  /* Single page nav
  -----------------------------------------*/
  $('#tmNavbar').singlePageNav({
     'currentClass' : "active",
    offset : topOffset,
    'filter': ':not(.external)'
  });

  /* Handle nav offset upon window resize
  -----------------------------------------*/
  $(window).resize(function(){
    if($(window).width() <= 767) {
      topOffset = mobileTopOffset;
    }
    else {
      topOffset = desktopTopOffset;
    }

    $('#tmNavbar').singlePageNav({
      'currentClass' : "active",
      offset : topOffset,
      'filter': ':not(.external)'
    });
  });


  /* Collapse menu after click
  -----------------------------------------*/
  $('#tmNavbar a').click(function(){
    $('#tmNavbar').collapse('hide');
  });

  /* Turn navbar background to solid color starting at section 2
  ---------------------------------------------------------------*/
  var target = $("#tm-section-2").offset().top - topOffset;

  if($(window).scrollTop() >= target) {
    $(".tm-navbar-container").addClass("bg-inverse");
  }
  else {
    $(".tm-navbar-container").removeClass("bg-inverse");
  }

  $(window).scroll(function(){

    if($(this).scrollTop() >= target) {
      $(".tm-navbar-container").addClass("bg-inverse");
    }
    else {
      $(".tm-navbar-container").removeClass("bg-inverse");
    }
  });


  /* Smooth Scrolling
  --------------------------------------------------------------*/
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
      && location.hostname == this.hostname) {

      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

      if (target.length) {

        $('html, body').animate({
          scrollTop: target.offset().top - topOffset
        }, 1000);
        return false;
      }
    }
  });


  /* Magnific pop up
  ------------------------- */
  $('.tm-img-grid').magnificPopup({
    delegate: 'a', // child items selector, by clicking on it popup will open
    type: 'image',
    gallery: {enabled:true}
  });
});

</script>
</body>
</html>
