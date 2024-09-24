@if (isset($view) && !in_array($view, ['search']))
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
@endif
<!--tm-->
<script type="text/javascript">
window.onload = function() {
    showTime();
}
function showTime() {
    var now = new Date();
    var year = now.getFullYear();
    document.getElementById("show").innerHTML = "" + year;
    t = setTimeout('showTime()', 1000)
}
</script>
<!--pb-->
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
<script type="text/javascript">
if (self == top) {
    var theBody = document.getElementsByTagName('body')[0];
    theBody.style.display = "block";
} else {
    top.location = self.location;
}
</script>
<script>
document.onkeydown = function() {
    return ;
    if (window.event && window.event.keyCode == 123) {
        alert("Hi,欢迎来到果汁！");
        event.keyCode = 0;
        event.returnValue = false;
    }
    if (window.event && window.event.keyCode == 13) {
        window.event.keyCode = 505;
    }
    if (window.event && window.event.keyCode == 8) {
        alert(str + "\n请使用Del键进行字符的删除操作！");
        window.event.returnValue = false;
    }
}
</script>
