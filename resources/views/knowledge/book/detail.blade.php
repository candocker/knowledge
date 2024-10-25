<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=utf8">
<title>{{$datas['tdkData']['title']}}</title>
<style>
<!--
.part{font-size:12pt}.9{font-size:9pt}A:link{text-decoration:none;color:#0033CC}A:visited{text-decoration:none;color:#0033CC}A:active{text-decoration:none;color:#0000ff}A:hover{text-decoration:underline;color:#FF0000}
-->
</style>
<style type="text/css">
<!--
.article{font-size:9pt;
BORDER-BOTTOM:black 1px solid;
BORDER-LEFT:black 1px solid;
BORDER-RIGHT:black 1px solid;
BORDER-TOP:black 1px solid;
FILTER:revealTrans(transition=23,duration=0.5)blendTrans(duration=0.5);
POSITION:absolute;
VISIBILITY:hidden;
background-color:#FFCC00;
padding-top:3px;
padding-right:3px;padding-bottom:3px;padding-left:0px}
p, td, select{font-size:9pt}
a{color:#0058b0;font-size:9pt;text-decoration:none}
a:hover{color:#6699FF}
.drop{filter:dropshadow(color=000000,offx=1,offy=1,positive=1)}
.drop2{filter:dropshadow(color=ffffff,offx=1,offy=1,positive=1)}
-->
</style>
</head>

<body bgcolor=#FFFFFF background="http://asset.canliang.wang/common/images/bg4.gif">
<div align=center>
    <center>
        <table border=0 cellpadding=0 cellspacing=0 width=661>
            <tr>
                <td width=662 bgcolor=#000000>
                    <table border=0 cellspacing=1 width=661 cellpadding=6>
                        @include('knowledge.book._top-nav', ['datas' => $datas])
                        <tr bgcolor=#CCCC99>
                            <td width=100% height=20 valign="middle" bgcolor="#FFFFCC">
                                <p align=center>
                                    <b><font size="4">{{$datas['currentChapterData']['name']}}</font></b>
                                </p>
                            </td>
                        </tr>
                        <tr bgcolor=#FFFFCC>
                            <td width=100% height=51 background="http://asset.canliang.wang/common/images/bg4.gif">
                                @foreach ($datas['contents'] as $pInfo)

                                <!--<p align="left" style="line-height: 150%; margin-left: 10; margin-right: 5; margin-top: 10; margin-bottom: 10">-->
                                <p align="left" style="line-height: 24px; letter-spacing:1.0px; margin-left: 10; margin-right: 5; margin-top: 10; margin-bottom: 10">
                                    <font size="4">{!!$pInfo!!}</font>
                                </p>
                                @endforeach
                                <!--<p align="right" style="line-height: 150%; margin-left: 10; margin-right: 5; margin-top: 10; margin-bottom: 10">
                                    <font size="4">
                                        1975年3月
                                    </font>
                                </p>-->
                            </td>
                        </tr>
                        @include('knowledge.book._bottom-nav', ['datas' => $datas])
                    </table>
                </td>
            </tr>
        </table>
    </center>
</div>
</body>

</html>
