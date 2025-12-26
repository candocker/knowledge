<?php

namespace ModuleKnowledge\Services;

use Swoolecan\Foundation\Helpers\CommonTool;

trait FormatFigureTrait
{
    public function initEmperorData()
    {
        $dynasty = 'qingchao'; $listorder = 0;
        $country = $this->getModelObj('country')->where(['code' => $dynasty])->first();
        $fFile = $country->full_knowledge_path;
        $data = require($fFile);
        //$sql = "INSERT INTO `wp_period` (`period_type`, `country_code`, `figure_code`, `start_year`, `end_year`, `orderlist`) VALUES\n";
        //$sql .= "('country', '{$dynasty}', '', , , {$listorder}),\n";
        $ufSql = '';
        foreach ($data['commonFixTable'] as $eKey => $eDatas) {
            if (in_array($eKey, ['gmzflist', 'topName'])) {
                continue;
            }
            foreach ($eDatas['baseInfos'] as $emperor) {
                //print_r($emperor);
                $name = $emperor['name'];
                $sName = strip_tags($name);
                $name = str_replace(['<a href="/wiki-figure-'], [''], $name);
                //$name = str_replace(['<a href="'], [''], $name);
                //$name = substr($name, 0, strpos($name, '">'));
                //$baiduUrl = $name;
                $name = CommonTool::getSpellStr($sName, '');
                //echo "'{$name}',";
                //continue;
                $duration = $emperor['eraname'];
                $exist = $this->getModelObj('figure')->where(['code' => $name])->first();
                if (empty($exist)) {
                }
                if (empty($exist->description)) {
                    //print_r($emperor);
                    $ufSql .= "UPDATE `wp_figure` SET `description` = '{$emperor['major']}'  WHERE `code` = '{$name}';\n";
                }
                //$duration = $emperor['begin_end'];
                if (strpos($duration, '(') !== false) {
                    $duration = substr($duration, strpos($duration, '(') + 1);
                }
                //$duration = $emperor['alias'];
                //$duration = substr($duration, 0, strpos($duration, ' '));
                //var_dump($duration);

                //echo "        '{$name}', // {$emperor['dynastic']}\n";
                echo "        '{$name}', // {$sName}\n";
                //echo "        '{$name}', // {$emperor['alias']}\n";
                //$sql .= "('emperor', '{$dynasty}', '{$name}', 0, 0, {$listorder}), ---{$emperor['alias']}\n";

                $tmp = explode('-', $duration);
                /*$nameCard = $emperor['dynastic'];
                if (strpos($nameCard, ' ') !== false) {
                    $nameCard = substr($nameCard, 0, strpos($nameCard, ' '));
                }*/
                //$tmp[0] = '1';
                if (count($tmp) < 2) {
                    $start = $tmp[0];
                    if (empty($start)) {
                        //print_r($emperor);
                        //var_dump($start);
                        //$ufSql .= "UPDATE `wp_figure` SET `name_card` = '{$nameCard}', `birth_accurate` = 'unknown', `death_year` = 0, `birth_year` = 0, `description` = '{$emperor['major']}'  WHERE `code` = '{$name}';\n";
                        //$ufSql .= "UPDATE `wp_figure` SET `name` = '{$emperor['alias']}', `birth_accurate` = 'unknown', `death_year` = 0, `birth_year` = 0, `description` = '{$emperor['major']}'  WHERE `code` = '{$name}';\n";
                        $ufSql .= "UPDATE `wp_figure` SET `birth_accurate` = 'unknown', `death_year` = 0, `birth_year` = 0, `description` = '{$emperor['major']}'  WHERE `code` = '{$name}';\n";
                        //$ufSql .= "UPDATE `wp_figure` SET `name_card` = '{$sName}' WHERE `code` = '{$name}';\n";
                        continue;
                    }
                    $end = $start;
                } else {
                    $start = $tmp[0];
                    $end = $tmp[1];
                }
                $start = str_replace(['年', '前'], ['', '-'], $start);
                $end = str_replace(['年', '前'], ['', '-'], $end);
                //$sql .= "('emperor', '{$dynasty}', '{$name}', {$start}, {$end}, {$listorder}),\n";
                //$ufSql .= "UPDATE `wp_figure` SET `name_card` = '{$nameCard}', `birth_accurate` = 'unknown', `death_year` = {$end}, `birth_year` = 0, `description` = '{$emperor['major']}'  WHERE `code` = '{$name}';\n";
                //$ufSql .= "UPDATE `wp_figure` SET `birth_accurate` = 'unknown', `death_year` = {$end}, `birth_year` = 0, `description` = '{$emperor['major']}'  WHERE `code` = '{$name}';\n";
                //$ufSql .= "INSERT INTO `wp_figure` (`code`, `name`, `name_card`, `description`) VALUE ('{$name}', '{$sName}', '{$sName}', '{$emperor['major']}');\n";
                //$ufSql .= "UPDATE `wp_figure` SET `baidu_url` = '{$baiduUrl}'  WHERE `code` = '{$name}';\n";
                //var_dump($name . '-' . $duration);
                //print_r($emperor);

            }
        }
        echo $ufSql;
        //echo $sql;
        //print_r($data);
        //var_dump($fFile);
        exit();
        $sorts = ['dynasty'];
        $sorts = ['gdempire'];
        $infos = $this->getModelObj('country')->whereIn('sort', $sorts)->get();
        foreach ($infos as $info) {
            $dynasty = $info['code'];
            $pData = $this->getModelObj('period')->where(['country_code' => $dynasty, 'period_type' => 'country'])->first();
            if (empty($pData)) {
                print_r($info->toArray());
                //exit();
            }
        }
        exit();
    }

    public function formatPointBirthDeath($str, $nameStr, $info)
    {
        $ext = strpos($str, ' ') !== false ? substr($str, strpos($str, ' ')) : '';
        $bdStr = strpos($str, ' ') !== false ? substr($str, 0, strpos($str, ' ')) : $str;
        if (strpos($bdStr, '-') === false) {
            //var_dump($bdStr . '==' . $nameStr . "<br />");
            echo "'{$info['code']}',";
            return ;
        }
        $tmp = explode('-', $bdStr);
        $birthData = $this->_splitDateData($tmp[0]);
        $deathData = $this->_splitDateData($tmp[1]);
    }

    public function _splitDateData($str)
    {
        if ($str == '至今' || $str === '') {
            return ['accurate' => 'running', 'year' => 0, 'month' => 0, 'day' => 0];
        }
        $accurate = '';
        if (strpos($str, '约') !== false ) {
            $accurate = 'probably';
            $str = str_replace(['约'], [''], $str);
        }
        $str = str_replace(['前', 'BC'], ['-', '-'], $str);
        $tmp = explode('/', $str);

        return ['accurate' => $accurate, 'year' => intval($tmp[0] ?? 0), 'month' => intval($tmp[1] ?? 0), 'day' => intval($tmp[2] ?? 0)];
    }

    /*public function initFigureDatas()
    {
        //$infos = $this->getModelObj('figure')->where(['status' => 0])->limit(500)->get();
        //$infos = $this->getModelObj('figure')->where(['status' => 0])->limit(500)->get();
        $infos = $this->getModelObj('figure')->where('status', '<>', 9)->limit(1000)->get();
        foreach ($infos as $info) {
            $fullPath = $info->full_knowledge_path;
            if (empty($fullPath)) {
                //print_r($info->toArray());
                $info->status = 9;
                $info->save();
                continue;
            }
            $fullPath .= '.php';
            if (!file_exists($fullPath)) {
                var_dump($info['name'] . '--' . $fullPath);
                $info->status = 9;
                $info->save();
                continue;
            }
            $details = require($fullPath);
            if (!isset($details['baseData']) || !isset($details['baseData']['infos']) || !isset($details['baseData']['infos']['生卒日期'])) {
                var_dump($info['code'] . '--' . $info['name'] . '---' . $fullPath);
                continue;
            }
            $info->extfield = $details['baseData']['infos']['生卒日期'];
            $info->save();
        }
        exit();
    }*/

    /*public function initDateData()
    {
        //$infos = $this->getModelObj('figureListing')->where(['type' =>'usapresident'])->get();
        $infos = \DB::select('SELECT * FROM `work_culture`.`wp_figure_resume`');
        $sql = "INSERT INTO `wp_period` (`period_type`, `country_code`, `figure_code`, `brief`, `orderlist`, `start_year`, `end_year`) VALUES \n";
        $datas = [];
        foreach ($infos as $info) {
            //print_R($info);
            $sSql = "SELECT * FROM `wp_dateinfo` WHERE `info_type` = 'figure_resume' AND `info_key` = {$info->id} AND `type` = 'start';";
            $sData = \DB::connection('knowledge')->select($sSql);
            $sData = $sData[0];
            $eSql = "SELECT * FROM `wp_dateinfo` WHERE `info_type` = 'figure_resume' AND `info_key` = {$info->id} AND `type` = 'end';";
            $eData = \DB::connection('knowledge')->select($eSql);
            $eData = $eData[0];
            $fCode = $info->figure_code;
            $fCode = $fCode == 'cleveland' && $sData->year == 1893 ? $info->figure_code . '_2' : $fCode;
            //var_dump($fCode);
            if (isset($datas[$fCode])) {
                $datas[$fCode]['end'] = $eData;
                $datas[$fCode]['num'] += 1;
            } else {
                $datas[$fCode]['start'] = $sData;
                $datas[$fCode]['end'] = $eData;
                $datas[$fCode]['num'] = 1;
            }
        }
        $term = 1;
        foreach ($datas as $fCode => $dInfo) {
            //var_dump($fCode);
            //print_r($dInfo);
            $sData = $dInfo['start'];
            $eData = $dInfo['end'];
            //print_r($eData);
            $numStr = $dInfo['num'] > 1 ? "({$dInfo['num']})" : '';
            $brief = "第{$term}任，任期{$numStr}：{$sData->year}/{$sData->month}/{$sData->day}-{$eData->year}/{$eData->month}/{$eData->day}";
            $term++;
            $sql .= "('emperor', 'us', '{$fCode}', '{$brief}', 100, {$sData->year}, {$eData->year}),\n";
            //print_r($data);exit();

        }
        echo $sql;exit();

        $infos = $this->getModelObj('figure')->where('extfield', '<>', '')->get();
        foreach ($infos as $info) {
            $nameStr = $info['name'] . '-' . "<a href='http://mu.canliang.wang/wiki-figure-{$info['code']}.html'>{$info['code']}</a>";
            $nameStr = !empty($info['baidu_url']) ? "<a href='{$info['baidu_url']}'>{$nameStr}</a>" : $nameStr;
            $dateInfo = $this->formatPointBirthDeath($info['extfield'], $nameStr, $info);
            //continue;
            $bStr = $info['birth_accurate'] . $info['birth_year'] . $info['birth_month'] . $info['birth_day'];
            $dStr = $info['death_accurate'] . $info['death_year'] . $info['death_month'] . $info['death_day'];
            if ($bStr != $dateInfo['bStr'] || $dStr != $dateInfo['dStr']) {
                //var_dump($nameStr . '-' . $bStr . '==' . $dateInfo['bStr'] . '+++' . $dStr . '==' . $dateInfo['dStr'] . '|||' . $info['extfield'] . '<br />');
                //echo "'{$info['code']}',";
            }
            if ($dStr != $dateInfo['dStr']) {
                //var_dump($nameStr . '-' . $dStr . '==' . $dateInfo['dStr'] . '|||' . $info['extfield'] . '<br />');
                //echo "'{$info['code']}',";
            }
            if ($bStr != $dateInfo['bStr']) {
                var_dump($nameStr . '-' . $bStr . '==' . $dateInfo['bStr'] . '|||' . $info['extfield'] . '<br />');
                //echo "'{$info['code']}',";
            }
            //$fDate = $info->formatDate($info['extfield'], $nameStr);
            //var_dump($info->name . '-' . $info['extfield']);
            //print_r($fDate);
        }
        exit();

        $sql = "SELECT * FROM `wp_dateinfo` WHERE `type` IN ('deathday');";
        //$sql = "SELECT * FROM `wp_dateinfo` WHERE `type` IN ('birthday');";
        $infos = \DB::connection('knowledge')->select($sql);
        foreach ($infos as $info) {
            $iKey = $info->info_key;
            $figure = $this->getModelObj('figure')->where(['code' => $iKey])->first();
            $figure = empty($figure) ? $this->getModelObj('figure')->where(['codebak' => $iKey])->first() : $figure;
            if (empty($figure)) {
                print_r($info);
                continue;
            }
            $figure->death_accurate = $info->accurate;
            $figure->death_year = $info->era_type == 'bc' ? -$info->year : $info->year;
            $figure->death_month = $info->month;
            $figure->death_day = $info->day;
            $figure->status = 1;
            //print_r($info);
            //print_r($figure->toArray());
            //$figure->save();
        }
        //print_r($figures);
        echo 'sss';
        exit();

    }*/

    /*public function formatPointBirthDeath($str, $nameStr, $info)
    {
        $ext = strpos($str, ' ') !== false ? substr($str, strpos($str, ' ')) : '';
        $bdStr = strpos($str, ' ') !== false ? substr($str, 0, strpos($str, ' ')) : $str;
        if (strpos($bdStr, '-') === false) {
            //var_dump($bdStr . '==' . $nameStr . "<br />");
            echo "'{$info['code']}',";
            return ;
        }
        $tmp = explode('-', $bdStr);
        $birthData = $this->_splitDateData($tmp[0]);
        if ($info['birth_year'] != $birthData['year'] && $info['birth_year'] != 0) {
            var_dump($info['birth_year'] . '-' . $bdStr . '==' . $nameStr . "<br />");
            //echo "'{$info['code']}',";
        }
        if ($info['birth_year'] == 0 && $birthData['year'] != 0) {
            $info->birth_year = $birthData['year'];
            //$info->save();
            var_dump($info['birth_year'] . '-' . $bdStr . '==' . $nameStr . "<br />");
        }
        if ($info['birth_month'] == 0 && $birthData['month'] != 0) {
            $info->birth_month = $birthData['month'];
            //$info->save();
            var_dump($info['birth_month'] . '-' . $bdStr . '==' . $nameStr . "<br />");
        }
        if ($info['birth_day'] == 0 && $birthData['day'] != 0) {
            $info->birth_day = $birthData['day'];
            //$info->save();
            var_dump($info['birth_day'] . '-' . $bdStr . '==' . $nameStr . "<br />");
        }
        if ($info['birth_accurate'] == '' && $birthData['accurate'] != '') {
            $info->birth_accurate = $birthData['accurate'];
            $info->save();
            var_dump($info['birth_accurate'] . '-' . $bdStr . '==' . $nameStr . "<br />");
        }

        $deathData = $this->_splitDateData($tmp[1]);
        if ($info['death_year'] != $deathData['year'] && $info['death_year'] != 0) {
            var_dump($info['death_year'] . '-' . $bdStr . '==' . $nameStr . "<br />");
            //echo "'{$info['code']}',";
        }
        if ($info['death_year'] == 0 && $deathData['year'] != 0) {
            $info->death_year = $deathData['year'];
            //$info->save();
            var_dump($info['death_year'] . '-' . $bdStr . '==' . $nameStr . "<br />");
        }
        if ($info['death_month'] == 0 && $deathData['month'] != 0) {
            $info->death_month = $deathData['month'];
            //$info->save();
            var_dump($info['death_month'] . '-' . $bdStr . '==' . $nameStr . "<br />");
        }
        if ($info['death_day'] == 0 && $deathData['day'] != 0) {
            //$info->death_day = $deathData['day'];
            //$info->save();
            var_dump($info['death_day'] . '-' . $bdStr . '==' . $nameStr . "<br />");
        }
        if ($info['death_accurate'] == '' && $deathData['accurate'] != '') {
            //$info->death_accurate = $deathData['accurate'];
            //$info->save();
            //var_dump($info['death_accurate'] . '-' . $bdStr . '==' . $nameStr . "<br />");
        }

        //print_r($birthData);print_r($deathData);
        return ['bStr' => implode('', $birthData), 'dStr' => implode('', $deathData)];
    }*/

    /*public function initEmperorData2()
    {
        $nhDatas = require('/data/htmlwww/laravel-system/vendor/candocker/knowledge/resources/nh.php');
        $sql = "INSERT INTO `wp_period` (`period_type`, `country_code`, `figure_code`, `eraname`, `brief`, `baidu_url`, `start_year`, `end_year`, `orderlist`) VALUES\n";
        $dynasty = 'xixia';
        $listorder = 60;
        $sql .= "('country', '{$dynasty}', '', '', '', '', , , {$listorder}),\n";
        $lastData = [];
        $eExists = [];
        $fSql = "INSERT INTO `wp_figure` (`code`, `name`, `name_card`, `country_code`, `baidu_url`) VALUES \n";
        foreach ($nhDatas as $nhData) {
            if (count($nhData) == 4) {
                $tmpData = $nhData;
                $nhData = $lastData;
                $nhData['name'] = $tmpData['begin_end'];
                $nhData['brief'] = $tmpData['name_card'];
                $nhData['brief2'] = $tmpData['name'];
                $nhData['brief3'] = $tmpData['brief'];
            } else {
                $lastData = $nhData;
            }
            //print_r($nhData);
            $name = $nhData['begin_end'];
            $nUrl = substr($name, strpos($name, 'https'));
            $nUrl = substr($nUrl, 0, strpos($nUrl, '">'));
            //var_dump($nUrl);
            $name = strip_tags($name);
            //$name = substr($name, strpos($name, '朱'));
            $name = substr($name, 9);
            //var_dump($name);continue;

            $code = CommonTool::getSpellStr($name, '');
            //var_dump($code . '-' . $name);
            $fSql .= "('{$code}', '{$name}', '{$name}', '{$dynasty}', '{$nUrl}'),\n";
            //print_r($nhData);exit();
            //continue;

            $figures = $this->getModelObj('figure')->where(['name' => $name, 'country_code' => $dynasty])->get();
            $count = $figures->count();
            if ($count < 1) {
                $name = substr($name, 3);
                $figures = $this->getModelObj('figure')->where(['name' => $name])->get();
                $count = $figures->count();
            }
            if ($count > 1) {
                var_dump($name . '=oo==');
                continue;
            } elseif ($count < 1) {
                var_dump($name . 'pppp');
                continue;
            } else {
                $figure = $figures[0];
            }
            //print_r($figure->toArray());
            if ($figure->baidu_url != $nUrl) {
                //echo "<a href='{$nUrl}' target='_blank'>当前<a>、<a href='{$figure->baidu_url}' target='_blank'>{$figure['name']}</a>{$figure['baidu_url']}<br />";
            }
            $sEnd = $nhData['name_card'];
            $sEnd = str_replace(['年'], [''], $sEnd);
            if (strpos($sEnd, '—') === false) {
                $sStart = $sEnd;
                $sEnd = $sEnd;
            } else {
                $sEndTmp = explode('—', $sEnd);
                $sStart = $sEndTmp[0];
                $sEnd = $sEndTmp[1];

            }
            //var_dump($sStart . '-' . $sEnd);
            $nhEnd = $nhData['brief'];

            $nhEnd = str_replace(['年'], [''], $nhEnd);
            if (strpos($nhEnd, '—') === false) {
                $nhStart = $nhEnd;
                $nhEnd = $nhEnd;
            } else {
                $nhEndTmp = explode('—', $nhEnd);
                $nhStart = $nhEndTmp[0];
                $nhEnd = $nhEndTmp[1];

            }
            //var_dump($nhStart . '=' . $nhEnd);
            $nhBrief = strip_tags($nhData['brief3']);

            $nhName = strip_tags($nhData['name']);
            $nhUrl = $nhData['name'];
            $nhUrl = substr($nhUrl, strpos($nhUrl, 'https'));
            $nhUrl = substr($nhUrl, 0, strpos($nhUrl, '">'));
            $sStart = str_replace('前', '-', $sStart);
            $sEnd = str_replace('前', '-', $sEnd);
            $nhStart = str_replace('前', '-', $nhStart);
            $nhEnd = str_replace('前', '-', $nhEnd);
        //$sql = "INSERT INTO `wp_period` (`period_type`, `country_code`, `figure_code`, `eraname`, `brief`, `baidu_url`, `start_year`, `end_year`) VALUES\n";
            if (!in_array($figure['code'], $eExists)) {
                $sql .= "('emperor', '{$dynasty}', '{$figure['code']}', '', '', '', {$sStart}, {$sEnd}, {$listorder}),\n";
                $eExists[] = $figure['code'];
            }
            $sql .= "('eraname', '{$dynasty}', '{$figure['code']}', '{$nhName}', '{$nhBrief}', '{$nhUrl}', {$nhStart}, {$nhEnd}, {$listorder}),\n";
            //var_dump($nhName . '-' . $nhUrl);
        }
        //echo $fSql;exit();
        echo trim(trim($sql), ',');
        //print_r($nhDatas);
        exit();
    }*/
}
