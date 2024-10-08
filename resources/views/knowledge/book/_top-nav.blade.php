<tr>
    <td width=641 bgcolor=#FFFFFD height=20>
    <!--<td width=100% bgcolor=#FFFFFD height=20>-->
        <table border=0 cellpadding=0 cellspacing=0 width=100%>
            <tr>
                <td width=20%>
                    <p class=9>
                        @if ($datas['relateChapters']['pre'])
                        <a href="/{{$datas['bookData']['code']}}/{{$datas['relateChapters']['pre']['code']}}.html">{{$datas['relateChapters']['pre']['name']}}</a>
                        @else
                            到头了
                        @endif
                    </p>
                </td>
                <td width=59%>
                    <p align=center class=9>
                        <font color="#800000">
                            <b>
                                <span style="mso-bidi-font-size: 24.0pt"><a href="/{{$datas['bookData']['code']}}/list.html">{{$datas['bookData']['name']}}</a></span>
                            </b>
                        </font>
                    </p>
                </td>
                <td width=21%>
                    <p align=right class=9>
                        @if ($datas['relateChapters']['next'])
                        <a href="/{{$datas['bookData']['code']}}/{{$datas['relateChapters']['next']['code']}}.html">{{$datas['relateChapters']['next']['name']}}</a>
                        @else
                            到尾了
                        @endif
                    </p>
                </td>
            </tr>
        </table>
    </td>
</tr>
