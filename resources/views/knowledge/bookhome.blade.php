@php $rowCount = 4 @endphp
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<meta name="GENERATOR" content="Mozilla/4.7 [en] (Win98; I) [Netscape]">
<title>{{$datas['tdkData']['title']}}</title>
<style>
<!--
#page {position:absolute; z-index:0; left:0px; top:0px}
#.tt3 {font: 9pt/12pt "宋体"}
#.tt2 {font: 12pt/15pt "宋体"}
a {text-decoration:none}
a:hover {color: red;text-decoration:underline}
-->
</style>
</head>
<body bgcolor="#FFFFEE" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table BORDER=0 WIDTH="100%">
    <tr>
        <td VALIGN="top" ROWSPAN="2" width="8%" bgcolor="#006699" class="tt3">
            <center><br /><br />
                <!--<a href="001.htm">后页</a>--><br />
            </center>
        </td>
        <td WIDTH="94%">
            @foreach ($datas['sortBooks'] as $pData)
            <center>
                <br>
                <b><font face="楷体_GB2312"><font color="#FF6666"><font size=+2>{{$pData['name']}}</font></font></font></b>
                <p>{{$pData['description']}}</p>
            </center>
            <hr color="#EE9B73" size="1" width="94%">
            <center>
                <table BORDER=0 CELLSPACING=2 CELLPADDING=2 COLS=2 WIDTH="90%">
                @php $i = 1; @endphp
                @foreach ($pData['books'] as $pInfo)
                @if ($i % $rowCount == 1)<tr>@endif
                <td><center align="left">
                    <a href="/{{$pInfo['code']}}/list.html">{{$pInfo['name']}}</a>
                </center></td>
                @if ($i % $rowCount == $rowCount)</tr>@endif
                @php $i += 1; @endphp
                @endforeach
                @if ($i % $rowCount != $rowCount)</tr>@endif


                </table>
            </center>
            <hr color="#EE9B73" size="1" width="94%">
            @endforeach
        </td>
        <!--<td VALIGN="bottom" ROWSPAN="2" width="8%" bgcolor="#006699" class="tt3">
            <center><br><a href="001.htm">后页</a><br /></center>
        </td>-->
    </tr>
    <!--<tr>
        <td class="tt3">
            <hr color="#EE9B73" size="1" width="94%" />
            <center>
                <p>
                    &nbsp;<br /><br />
                    <a href="http://www.ebook007.com" TITLE="www.ebook007.com" target=_blank>北极星书库”</a>
                    站长信箱：<a href="mailto:fengguohua@hotmail.com">fengguohua@hotmail.com</a>
                </p>
            </center>
        </td>
    </tr>-->
</table>
</body>
</html>
