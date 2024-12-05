
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>学生成绩单</title>
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      table {
        width: 80%;
        margin: 30px auto; /* 让表格居中 */
        border-collapse: collapse;
        border: 2px solid #ddd; /* 整体边框颜色 */
      }
      th,
      td {
        line-height: 40px; /* 行高 */
        border: 1px solid #ddd; /* 每行边框 */
        text-align: center;
        font-size: 16px;
      }
      th {
        background-color: #007bff; /* 表头背景色 */
        color: #ffffff;
      }
      /* 这次奇偶行用 class 来写 */
      tr.even {
        background-color: #eee; /* 偶数行浅灰色 */
      }
      tr:hover {
        background-color: #ccc; /* 鼠标悬停时的背景色:蓝色 */
      }
      /* 把90分以上的要特殊标识绿色 */
      td.perfect {
        background-color: #00ff00; /* 绿色背景 */
      }
    </style>
  </head>
  <body>
    <table>
      <tbody>
        <tr>
          <th>已完结</th>
          <th>负债</th>
          <th>总计</th>
        </tr>
        @foreach (['principal', 'interest', 'monthlyPayment'] as $elem)
        <tr>
          @foreach (['Dealed', '', 'Total'] as $type)
          <td class="">{{$datas['totalGatherData'][$elem . $type]}}</td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
    <table>
      <tbody>
        <tr>
          <th>利率</th>
          <th>月数</th>
          <th>款项</th>
          <!--<th>起始月</th>
          <th>截止月</th>
          <th>每月额度</th>-->
          <!--<th>本金</th>
          <th>利息</th>
          <th>总计</th>-->
        </tr>
    @foreach ($datas['results'] as $subDatas)
        <tr>
          <td class="">{{$subDatas['base']['interestRate']}}<br />{{$subDatas['gatherData']['monthlyPaymentValue']}}</td>
          <td class="">{{$subDatas['base']['loanNum']}}<br />{{$subDatas['gatherData']['firstMonth']}}<br />{{$subDatas['gatherData']['endMonth']}}</td>
          <!--<td class="">{{$subDatas['gatherData']['firstMonth']}}</td>
          <td class="">{{$subDatas['gatherData']['endMonth']}}</td>
          <td class="">{{$subDatas['gatherData']['monthlyPayment']}}</td>-->
          <td class="">
        @foreach (['principal', 'interest', 'monthlyPayment'] as $elem)
          @foreach (['Total'] as $type)
          {{$subDatas['gatherData'][$elem . $type]}}<br />
          @endforeach
        @endforeach
          </td>
        </tr>
    @endforeach
      </tbody>
    </table>
    @foreach ($datas['results'] as $subDatas)
    <!--<table>
      <tr>
        <td class="perfect">{{$subDatas['base']['interestRate']}}</td>
        <td class="">{{$subDatas['base']['loanNum']}}</td>
        @if (isset($subDatas['base']['loanAmount']))<td class="perfect">{{$subDatas['base']['loanAmount']}}</td>@endif
      </tr>
    </table>
    <table>
      <tbody>
        <tr>
          <th>已完结</th>
          <th>负债</th>
          <th>总计</th>
        </tr>
        @foreach (['principal', 'interest', 'monthlyPayment'] as $elem)
        <tr>
          @foreach (['Dealed', '', 'Total'] as $type)
          <td class="">{{$subDatas['gatherData'][$elem . $type]}}</td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>-->
    @if ($subDatas['gatherData']['running'])
    <table>
      <thead>
        <tr>
          <th>序号</th>
          <th>月份</th>
          <th>本金</th>
          <th>利息</th>
          <th>月度</th>
          <th>剩余本金</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($subDatas['infos'] as $key => $pInfo)
        <tr class="@if ($key % 2 == 1) even @endif">
          <td>{{$pInfo['month']}}</td>
          <td>{{$pInfo['monthValue']}}</td>
          <td>{{$pInfo['principal']}}</td>
          <td>{{$pInfo['interest']}}</td>
          <td>{{$pInfo['monthlyPayment']}}</td>
          <td >{{$pInfo['remainingAmount']}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
    @endforeach
  </body>
</html>
