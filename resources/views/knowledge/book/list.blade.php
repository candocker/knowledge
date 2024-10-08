<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=utf8">
<title>目录</title>
<style>
<!--
.part{font-size:12pt}.9{font-size:9pt}A:link{text-decoration:none;color:#0033CC}A:visited{text-decoration:none;color:#0033CC}A:active{text-decoration:none;color:#0000ff}A:hover{text-decoration:underline;color:#FF0000}
-->
</style>
<style type="text/css">
<!--.article{font-size:9pt;BORDER-BOTTOM:black 1px solid;BORDER-LEFT:black 1px solid;BORDER-RIGHT:black 1px solid;BORDER-TOP:black 1px solid;FILTER:revealTrans(transition=23,duration=0.5)blendTrans(duration=0.5);POSITION:absolute;VISIBILITY:hidden;background-color:#FFCC00;padding-top:3px;padding-right:3px;padding-bottom:3px;padding-left:0px}
-->
<!--
p,td,select{font-size:9pt}a{color:#0058b0;font-size:9pt;text-decoration:none}a:hover{color:#6699FF}.drop{filter:dropshadow(color=000000,offx=1,offy=1,positive=1)}.drop2{filter:dropshadow(color=ffffff,offx=1,offy=1,positive=1)}
-->
</style>
</head>

<body bgcolor=#FFFFFF background="http://asset.canliang.wang/common/images/bg4.gif">
<div align=center>
    <center>
        <table border=0 cellpadding=0 cellspacing=0 width=659>
            <tr>
                <td width=661 bgcolor=#000000>
                    <table border=0 cellspacing=1 width=661 cellpadding=6>
                        @include('knowledge.book._top-nav', ['datas' => $datas])
                        <tr bgcolor=#CCCC99>
                            <td width=641 height=20 valign="middle" bgcolor="#FFFFCC">
                                <p align=center>
                                    <span style="mso-bidi-font-size: 12.0pt"><font size="4"><b>目录</b></font></span>
                                    <span lang="EN-US" style="font-size: 18pt"></o:p></span>
                                </p>
                            </td>
                        </tr>
                        <tr bgcolor=#FFFFCC>
                            <td width=641 height=51 background="http://asset.canliang.wang/common/images/bg4.gif">
                                @foreach ($datas['chapterDatas'] as $pInfo)
                                @if ($pInfo['chapter_type'] == 'top')
                                <p style="line-height: 150%; margin-left: 30; margin-right: 5; margin-top: 10; margin-bottom: 10" align="center">
                                    <font size="3">
                                        <span lang="EN-US"><b>{{$pInfo['name']}}<o:p></b></span>
                                    </font>
                                    <span lang="EN-US" style="FONT-SIZE: 18pt"></o:p></span>
                                </p>
                                @elseif ($pInfo['chapter_type'] == 'common')
                                <p style="line-height: 150%; margin-left: 30; margin-right: 5; margin-top: 10; margin-bottom: 10" align="left">
                                    <span lang="EN-US">
                                        @if ($pInfo['code']) 
                                        <a href="/{{$pInfo['book_code']}}/{{$pInfo['code']}}.html">
                                            <font size="3">{{$pInfo['name']}}</font>
                                        </a>
                                        @else 
                                            <font size="3">{{$pInfo['name']}}</font>
                                        @endif
                                    </span>
                                </p>
                                @elseif ($pInfo['chapter_type'] == 'small')
                                <p style="line-height: 150%; margin-left: 30; margin-right: 5; margin-top: 10; margin-bottom: 10" align="left">
                                    <!--<span lang="EN-US">
                                        <font size="3">
                                            <b>
                                                <o:p>
                                                </o:p>
                                            </b>
                                            （一）优势的基础
                                        </font>
                                        <span style="FONT-SIZE: 13.5pt">
                                            <font size="3">
                                                <b>
                                                    <o:p>
                                                    </o:p>
                                                </b>
                                            </font>
                                        </span>
                                    </span>-->
                                    <span lang="EN-US">
                                        <font size="3">
                                        @if ($pInfo['code']) 
                                        <a href="/{{$pInfo['book_code']}}/{{$pInfo['code']}}.html">
                                            <b><o:p></o:p></b>{{$pInfo['name']}}
                                        </a>
                                        @else 
                                            <b><o:p></o:p></b>{{$pInfo['name']}}
                                        @endif
                                        </font>
                                    </span>
                                </p>
                                @elseif ($pInfo['chapter_type'] == 'big')
                                <p style="line-height: 150%; margin-left: 30; margin-right: 5; margin-top: 10; margin-bottom: 10" align="left">
                                    <b><font size="3"></font></b>
                                    <span lang="EN-US">
                                        <font size="3">
                                        @if ($pInfo['code']) 
                                        <a href="/{{$pInfo['book_code']}}/{{$pInfo['code']}}.html">
                                            <b>{{$pInfo['name']}}<o:p></o:p></b>
                                        </a>
                                        @else 
                                            <b>{{$pInfo['name']}}<o:p></o:p></b>
                                        @endif
                                        </font>
                                    </span>
                                </p>
                                @endif
                                @endforeach
                                <!--<p style="line-height: 150%; margin-left: 30; margin-right: 5; margin-top: 10; margin-bottom: 10" align="left">
                                    <font size="3">
                                        <b>
                                            第三编　西方据优势地位时的世界，
                                            <span lang="EN-US">
                                                1763－1914年
                                            </span>
                                        </b>
                                    </font>
                                </p>-->
                                <!--<p style="line-height: 150%; margin-left: 30; margin-right: 5; margin-top: 10; margin-bottom: 10" align="left">
                                    <font size="3">
                                        （二）优势的影响
                                    </font>
                                    <span lang="EN-US" style="font-size: 13.5pt">
                                        <o:p>
                                        </o:p>
                                    </span>
                                </p>-->
                                <!--<p class="MsoPlainText" style="line-height: 150%; margin-left: 30; margin-right: 5; margin-top: 10; margin-bottom: 10" align="left">
                                    <span style="mso-bidi-font-size: 12.0pt; mso-bidi-font-family: Times New Roman; mso-font-kerning: 1.0pt; mso-ansi-language: EN-US; mso-fareast-language: ZH-CN; mso-bidi-language: AR-SA">
                                        <font color="#666666" size="3">
                                            <span lang="EN-US" style="mso-bidi-font-size: 12.0pt; mso-bidi-font-family: Times New Roman; mso-font-kerning: 1.0pt; mso-ansi-language: EN-US; mso-fareast-language: ZH-CN; mso-bidi-language: AR-SA">
                                                ※
                                                <font color="#666666">
                                                    <span id="BookPublisher">
                                                        <span class="ch">
                                                            上海社会科学院出版社
                                                        </span>
                                                    </span>
                                                    2001
                                                </font>
                                            </span>
                                            <span style="mso-bidi-font-size: 12.0pt; mso-bidi-font-family: Times New Roman; mso-font-kerning: 1.0pt; mso-ansi-language: EN-US; mso-fareast-language: ZH-CN; mso-bidi-language: AR-SA; mso-ascii-font-family: Times New Roman; mso-hansi-font-family: Times New Roman">
                                                版
                                            </span>
                                            吴象婴 梁赤民 译
                                        </font>
                                    </span>
                                    <font color="#666666" size="3">
                                        <span lang="EN-US" style="font-family: 宋体; mso-bidi-font-size: 12.0pt; mso-bidi-font-family: Times New Roman; mso-font-kerning: 1.0pt; mso-ansi-language: EN-US; mso-fareast-language: ZH-CN; mso-bidi-language: AR-SA; font-size: 13.5pt">
                                            </o:p>
                                        </span>
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
