<script type='text/javascript' src='{{$commonAssetUrl}}/nav/js/52/jquery-1.11.1.min.js'></script>
<script type='text/javascript' src='{{$commonAssetUrl}}/nav/js/83/popper.min.js'></script>
<script type='text/javascript' src='{{$commonAssetUrl}}/nav/js/73/bootstrap.min.js'></script>
<script type="text/javascript" src="{{$commonAssetUrl}}/nav/js/back.js?v=1"></script>
<script type="text/javascript" src="{{$commonAssetUrl}}/nav/js/95/jquery.anchorscroll.min.js"></script>
<script type="text/javascript" src="{{$commonAssetUrl}}/nav/js/search.js"></script>
<script charset="gbk" src="{{$commonAssetUrl}}/nav/js/opensug.js"></script>
<script type="text/javascript">var bodyBgs = [];
bodyBgs[0] = "{{$commonAssetUrl}}/nav/images/b0.jpg";
bodyBgs[1] = "{{$commonAssetUrl}}/nav/images/b1.jpg";
bodyBgs[2] = "{{$commonAssetUrl}}/nav/images/b2.jpg";
bodyBgs[3] = "{{$commonAssetUrl}}/nav/images/b3.jpg";
bodyBgs[4] = "{{$commonAssetUrl}}/nav/images/b4.jpg";
bodyBgs[5] = "{{$commonAssetUrl}}/nav/images/b5.jpg";
bodyBgs[6] = "{{$commonAssetUrl}}/nav/images/b6.jpg";
bodyBgs[7] = "{{$commonAssetUrl}}/nav/images/b7.jpg";
bodyBgs[8] = "{{$commonAssetUrl}}/nav/images/b8.jpg";
bodyBgs[9] = "{{$commonAssetUrl}}/nav/images/b9.jpg";
bodyBgs[10] = "{{$commonAssetUrl}}/nav/images/b10.jpg";
bodyBgs[11] = "{{$commonAssetUrl}}/nav/images/b11.jpg";
bodyBgs[12] = "{{$commonAssetUrl}}/nav/images/b12.jpg";
bodyBgs[13] = "{{$commonAssetUrl}}/nav/images/b13.jpg";
bodyBgs[14] = "{{$commonAssetUrl}}/nav/images/b14.jpg";
bodyBgs[15] = "{{$commonAssetUrl}}/nav/images/b15.jpg";
bodyBgs[16] = "{{$commonAssetUrl}}/nav/images/b16.jpg";
bodyBgs[17] = "{{$commonAssetUrl}}/nav/images/b17.jpg";
bodyBgs[18] = "{{$commonAssetUrl}}/nav/images/b18.jpg";
bodyBgs[19] = "{{$commonAssetUrl}}/nav/images/b19.jpg";
bodyBgs[20] = "{{$commonAssetUrl}}/nav/images/b20.jpg";
bodyBgs[21] = "{{$commonAssetUrl}}/nav/images/b21.jpg";
var randomBgIndex = Math.floor(Math.random() * 22);
document.write('<style>.top-cont{background: #222 url(' + bodyBgs[randomBgIndex] + ') no-repeat center center;background-size: cover;}</style>');
</script>
<script>
$(function() {
    $(".saoyisao").mouseover(function() {
        $(".erweima").show("fast");
    });
    $(".saoyisao").mouseleave(function() {
        $(".erweima").hide("slow");
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    // Anchor Scroll
    $('.anchor-scroll').anchorScroll({
        scrollSpeed: 800 // scroll speed
    });

    $('.arrow-up').anchorScroll({
        scrollSpeed: 1400,
        // scroll speed
        onScroll: function() {
            $(".fill-bg").fadeIn("slow");
            $(".popup").text("Scrolling...");
        },
        scrollEnd: function() {
            $(".fill-bg").delay(1000).fadeOut("slow");
            $(".popup").text("Done!");
        }
    });
});
</script>
<script type="text/javascript">
$('body').scrollspy({
    target: '#list-example'
})
</script>
<script type="text/javascript">
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script type="text/javascript">
$('#gotoReg').click(function() {
    $('#Login').modal('hide');
    $('#Login').one('hidden.bs.modal',
    function() {
        $('#Reg').modal('show');
    });
});
$('#gotoLogin').click(function() {
    $('#Reg').modal('hide');
    $('#Reg').one('hidden.bs.modal',
    function() {
        $('#Login').modal('show');
    });
});
</script>
<script type="text/javascript">
if (self == top) {
    var theBody = document.getElementsByTagName('body')[0];
    theBody.style.display = "block";
} else {
    top.location = self.location;
}
</script>
<script>
email.onchange = function() {
    var email = this.value;
    var reg = /(^1[3-9]\d{9}$)|(^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$)/;
    if (!reg.test(email)) {
        alert("您输入的 邮箱或手机号 格式不正确，请重新输入");
        $("#sign").attr("disabled", true);
    } else {
        $("#sign").attr("disabled", false);
    }
}
</script>
<script type="text/javascript">
sign.onclick = function() {
    var pwd = document.getElementById('pwd').value;
    var confirm_pwd = document.getElementById('confirm_pwd').value;
    if (confirm_pwd != pwd) {
        alert('两次输入的密码不一致，请重新输入');
        return false;
    }
}
</script>
<script type="text/javascript">
urls.onchange=function checkUrl(urlString){
    var urlString = document.getElementById('urls').value;
    if(urlString!=""){
    var reg=/^(?:http(s)?:\/\/)[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\*\+,;=.]+$/;
    if(!reg.test(urlString)){
      alert("您输入的网址不符合规范，请重新输入");
  $("#adds").attr("disabled", true);
    }else{
      $("#adds").attr("disabled", false);
    }
      }
}
</script>
<script type="text/javascript">
var h = $(window).height();
$(window).resize(function() {
    if ($(window).height() < h) {
        $('.mobtip').css("display", "none");
    } else {
        $('.mobtip').css("display", "block");
    }
});
</script>
<script>
document.oncontextmenu = function(event) {
    if (window.event) {
        event = window.event;
    }
    try {
        var the = event.srcElement;
        if (! ((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) {
            return false;
        }
        return true;
    } catch(e) {
        return false;
    }
}
</script>
