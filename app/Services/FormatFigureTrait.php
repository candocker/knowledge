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
}
