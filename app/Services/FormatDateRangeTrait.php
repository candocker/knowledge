<?php

namespace ModuleKnowledge\Services;

trait FormatDateRangeTrait
{
    public function initPeriodData()
    {
        $sql = "INSERT INTO `wp_period` (`period_type`, `country_code`, `title`, `start_accurate`, `start_year`, `end_accurate`, `end_year`) VALUES ;";
        $counties = $this->getModelObj('country')->where('sort', '<>', '')->get();
        foreach ($counties as $country) {
            $beginEnd = $country['begin_end'];
            if (empty($beginEnd) || in_array($country['name'], ['匈奴', '鲜卑族'])) {
                continue;
            }
            //var_dump($country['code'] . '-' . $beginEnd);
            $tmp = str_replace(['－', ' 至 ', '—', '～', ' / ', '/', '年', '公元'], ['-', '-', '-', '-', '-', '-', '', ''], $beginEnd);
            if (strpos($tmp, '-') === false) {
                //var_dump($country['name'] . '==' . $tmp);
                //echo "UPDATE `wp_country` SET `begin_end` = '' WHERE `code` = '{$country['code']}';<br />";//<a href='{$country['baidu_url']}' target='_blank'>{$country['name']}</a><br />";
                //echo "UPDATE `wp_country` SET `begin_end` = '' WHERE `code` = '{$country['code']}';<a href='{$country['baidu_url']}' target='_blank'>{$country['name']}</a><br />";
            }
            if (strpos($tmp, '-') === false) {
                $start = $tmp;
                $end = $tmp;
            } else {
                $tmpData = explode('-', $tmp);
                $start = $tmpData[0];
                $end = $tmpData[1];
            }
            $startAccurate = 0;
            if (strpos($start, '约') !== false) {
                $startAccurate = 1;
            }
            $endAccurate = 0;
            if (strpos($end, '约') !== false) {
                $endAccurate = 1;
            }
            if (strpos($end, '至今') !== false) {
                $endAccurate = 9;
                $end = 0;
            }
            $start = str_replace(['前', 'B', '约'], ['-', '-', ''], $start);
            $end = str_replace(['前', 'B', '约'], ['-', '-', ''], $end);
            //var_dump($start . '==' . $end . '////' . $country['name'] . '=');

            if (!empty($beginEnd)) {
                //var_dump($country['name'] . '-' . $beginEnd . '==' . $tmp);
                //var_dump($country['name'] . '==' . $tmp);
            }
            $sql .= "('country', '{$country['code']}', '', {$startAccurate}, {$start}, {$endAccurate}, {$end}),\n";
        }
        echo $sql;
        exit();
    }

    public function initDateData()
    {
        $sql = "SELECT * FROM `wp_dateinfo` WHERE `type` IN ('deathday', 'birthday');";
        $infos = \DB::connection('knowledge')->select($sql);
        $figures = [];
        foreach ($infos as $info) {
            $iKey = $info->info_key;
            if (!isset($figures[$iKey])) {
                $figure = $this->getModelObj('figure')->where(['code' => $iKey])->first();
                $figure = empty($figure) ? $this->getModelObj('figure')->where(['codebak' => $iKey])->first() : $figure;
                if (empty($figure)) {
                    print_r($info);
                    continue;
                }
                $figures[$iKey]['name'] = $figure->baidu_url ? "<a href='{$figure->baidu_url}' target='_blank'>{$figure['name']}</a>" :$figure['name'];
            }
            $figures[$info->type] = $info->era_type . '-' . $info->accurate . '-' . $info->year . '/' . $info->month . '/' . $info->day;
        }
        //print_r($figures);

    }
}
