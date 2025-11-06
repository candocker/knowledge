<?php

namespace ModuleKnowledge\Services;

trait FormatFigureTrait
{
    public function initFigureDatas()
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
    }

    public function initDateData()
    {
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
}
