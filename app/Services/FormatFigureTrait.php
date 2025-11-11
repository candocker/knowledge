<?php

namespace ModuleKnowledge\Services;

trait FormatFigureTrait
{
    public function initEmperorData()
    {
        $nhDatas = require('/data/htmlwww/laravel-system/vendor/candocker/knowledge/resources/nh.php');
        $sql = "INSERT INTO `wp_period` (`period_type`, `country_code`, `figure_code`, `eraname`, `brief`, `baidu_url`, `start_year`, `end_year`) VALUES\n";
        foreach ($nhDatas as $nhData) {
            $name = $nhData['begin_end'];
            $nUrl = substr($name, strpos($name, 'https'));
            $nUrl = substr($nUrl, 0, strpos($nUrl, '">'));
            //var_dump($nUrl);
            $name = strip_tags($name);
            $name = substr($name, strpos($name, '朱'));
            $figures = $this->getModelObj('figure')->where(['name' => $name])->get();
            if ($figures->count() > 1) {
                //var_dump($name);
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
            $nhBrief = $nhData['brief3'];

            $nhName = strip_tags($nhData['name']);
            $nhUrl = $nhData['name'];
            $nhUrl = substr($nhUrl, strpos($nhUrl, 'https'));
            $nhUrl = substr($nhUrl, 0, strpos($nhUrl, '">'));
        //$sql = "INSERT INTO `wp_period` (`period_type`, `country_code`, `figure_code`, `eraname`, `brief`, `baidu_url`, `start_year`, `end_year`) VALUES\n";
            $sql .= "('emperor', 'mingchao', '{$figure['code']}', '', '', '', {$sStart}, {$sEnd}),\n";
            $sql .= "('eraname', 'mingchao', '{$figure['code']}', '{$nhName}', '{$nhBrief}', '{$nhUrl}', {$nhStart}, {$nhEnd}),\n";
            //var_dump($nhName . '-' . $nhUrl);
        }
        echo $sql;
        //print_r($nhDatas);
        exit();
        $dynasty = 'mingchao';
        // UPDATE `wp_figure` AS `f`, `wp_figure_listing` AS `fl`SET `f`.`path_label` = '君主' WHERE `f`.`country_code` = 'qingchao' AND `f`.`code` = `fl`.`figure_code` AND `fl`.`type` = 'cnemperor';
        $sql = "SELECT * FROM `online_knowledge`.`ztmp_wp_emperor` WHERE `dynasty` = '{$dynasty}';";
        $sql = "SELECT * FROM `work_knowledge`.`wp_emperor` WHERE `dynasty` = '{$dynasty}';";
        //echo $sql;
        $infos = \DB::select($sql);
        $infos = $this->getModelObj('figure')->where(['country_code' => 'mingchao'])->where('birth_year', 0)->get();
        //print_r($infos);
        $fields = ['birth_accurate', 'birth_year', 'birth_month', 'birth_day'];
        $fields2 = ['death_accurate', 'death_year', 'death_month', 'death_day'];
        foreach ($infos as $info) {
            $str = "UPDATE `wp_figure` SET ";
            foreach ($fields as $field) {
                if (in_array($field, ['path_gather', 'path_label', 'birth_accurate', 'death_accurate'])) {
                    $str .= "`{$field}` = '',";
                } else {
                    $str .= "`{$field}` = ,";
                }
            }
            $str = trim($str, ',');
            $str .= " WHERE `code` = '{$info['code']}';\nUPDATE `wp_figure` SET ";
            foreach ($fields2 as $field) {
                if (in_array($field, ['path_gather', 'path_label', 'birth_accurate', 'death_accurate'])) {
                    $str .= "`{$field}` = '',";
                } else {
                    $str .= "`{$field}` = ,";
                }
            }
            $str = trim($str, ',');
            echo $str . " WHERE `code` = '{$info['code']}'; ----{$info['name']}\n";
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
}
