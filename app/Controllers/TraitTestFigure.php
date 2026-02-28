<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Controllers;

use Swoolecan\Foundation\Helpers\CommonTool;

trait TraitTestFigure
{
    public $currentFields = [
        'start_end' => '',
        'start' => 'term_start',
        'end' => 'term_end',
        'start_end_detail' => false,

        'name_card' => 'personal_name',
        'code' => 'name_en',
        'name' => 'name',
        'english_name' => 'name_en',
        'birth' => 'birth_date',
        'death' => 'death_date',
        'description' => 'introduction',
    ];

    public $baseInfo = [
        'is_single' => true,
        'country_code' => 'cn',
        'orderlist' => 0,
        'muwiki_code' => 'gcdqgdbdh_3',
        'path_label' => '执行委员',
        'path_gather' => '中共',
        'base_path' => '中国/中国共产党/三大/',
    ];

    public $gatherFields = [
        'name_en' => '英文名',
        'alias' => '别名',
        'era_name' => '年号',
        'title' => '头衔',
        'death_cause' => '死因',
        'relationship' => '世系',
        //'role' => '身份',
    ];
    public $gatherNotes = ['introduction', 'note', 'notes', 'key_evets', 'brief_intro'];

    public function _testDealFigure()
    {
        $fSelect = '`code`, `name`, `country_code`, `path_label`, `path_gather`, `path_point`, `name_card`, `native_place`, `description`, ';
        $fSelect .= '`birth_year`, `birth_month`, `birth_day`, `death_year`, `death_month`, `death_day`';
        $fSql = "INSERT INTO `wp_figure` ({$fSelect}) VALUES\n";
        $pSql = "INSERT INTO `wp_period` (`period_type`, `country_code`, `figure_code`, `orderlist`, `start_year`, `end_year`, `start_end_detail`, `type_ext`) VALUES\n";
        $lSql = "INSERT INTO `wp_figure_listing` (`type`, `figure_code`, `country_code`, `muwiki_code`, `description`) VALUES \n";

        $topInfos = require('/tmp/tmp.php');
        $baseInfo = $this->baseInfo;
        $gatherStr = $listStr = '';
        //print_r($topInfos);exit();
        foreach ($topInfos as $topKey => $mulInfos) {
            //$mulInfos = array_reverse($mulInfos);
            $gStr = '';
            $i = 1;
            foreach ($mulInfos as $extStr => $pInfos) {
                //$pInfos = array_reverse($pInfos);
                $pathPoint = $baseInfo['base_path'] . $baseInfo['path_label'];
                $pathPoint .= $baseInfo['is_single'] ? '' : "_{$extStr}";
                $listStr .= $this->getFigureTableStr($extStr, $i);
                foreach ($pInfos as $pInfo) {
                    //print_r($pInfo);exit();
                    $name = $this->_getPointFieldValue($pInfo, 'name');
                    $code = $this->_getPointFieldValue($pInfo, 'code');
                    $code = empty($code) ? CommonTool::getSpellStr($name, '') : $code;
                    $code = str_replace([' ', '-'], ['_', '_'], strtolower($code));
                    //echo "{$name}\n";
                    $listStr .= $this->_formatFigureList($code, $name, $pInfo,);
                    $fSql .= $this->_FormatFigureSql($code, $name, $pathPoint, $pInfo);
                    //$pSql .= $this->_formatPeriodSql($code, $name, $pInfo);
                    $lSql .= $this->_formatListingSql($code, $name, $pInfo);
                    $gStr .= $this->_formatGatherStr($code, $name, $pInfo,);
                }
                $listStr .= "    ],\n],\n";
                $fFile = "/data/database/knowledge/{$pathPoint}.php";
                //var_dump($fFile);exit();
                $createFile = request('create_file');
                var_dump($fFile);
                if ($createFile) {
                   file_put_contents($fFile, "<?php\nreturn [\n{$gStr}\n];");
                }
                $gatherStr .= "{$pathPoint}\n\n{$gStr}\n";
                $i++;
            }
        }
        echo $listStr;
        echo trim($fSql, ",\n") . ";\n";
        //echo trim($pSql, ",\n") . ";\n";
        echo trim($lSql, ",\n") . ";\n";
        echo $gatherStr;
        exit();
    }

    public function getFigureTableStr($title, $i)
    {
        $str = "'sub{$i}' => [\n";
        $str .= "    'name' => '{$title}',\n";
        $str .= "    'titles' => ['name' => '姓名', 'birth_death' => '生卒日期', 'major' => '简介'],\n";
        $str .= "    'fixTitleField' => 'name',\n";
        $str .= "    'brief' => '',\n";
        $str .= "    'baseInfos' => [\n";
        return $str;
    }

    public function _formatFigureList($code, $name, $pInfo)
    {
        $str = "        '{$code}', // {$name}\n";
        //return $str;

        $role = $pInfo['representing_group'] ?? ($pInfo['role'] ?? '');
        $str = "        [\n            'fCode' => '{$code}', // {$name}\n            'role' => '{$role}',\n        ],\n";
        //return $str;

        $desc = $this->_getPointFieldValue($pInfo, 'description');
        $str = "        [\n            'fCode' => '{$code}', // {$name}\n            'major' => '{$desc}',\n        ],\n";
        return $str;
    }

    public function _formatFigureSql($code, $name, $pathPoint, $pInfo)
    {
        $exist = $this->getModelObj('figure')->where(['code' => $code])->first();
        if ($exist) {
            //var_dump($name);
            return false;
        }

        $baseInfo = $this->baseInfo;
        $valueStr = "'{$code}', '{$name}', '{$baseInfo['country_code']}', '{$baseInfo['path_label']}', '{$baseInfo['path_gather']}', '{$pathPoint}', ";
        foreach (['name_card', 'native_place', 'description'] as $extField) { 
            $fValue = $this->_getPointFieldValue($pInfo, $extField);
            $fValue = $extField == 'name_card' && empty($fValue) ? $name : $fValue;
            $valueStr .= "'{$fValue}', ";
        }
        /*if (strpos($pInfo['birth_death'], '-') === false) {
            print_r($pInfo);
        } else {
            list($pInfo['birth_date'], $pInfo['death_date']) = explode('-', $pInfo['birth_death']);
        }*/
        //print_r($pInfo);exit();
        foreach (['birth', 'death'] as $dateType) {
            $fValues = $this->getDateData($this->_getPointFieldValue($pInfo, $dateType));
            foreach ($fValues as $fField => $fValue) {
                $dField = $dateType . '_' . $fField;
                $valueStr .= "'{$fValue}', ";
            }
        }

        $valueStr = trim($valueStr, ', ');
        $sql = "({$valueStr}),\n";
        //echo $sql;
        return $sql;
    }

    public function _formatListingSql($code, $name, $pInfo)
    {
        $baseInfo = $this->baseInfo;
        $fields = $this->currentFields;

        $lSql = "INSERT INTO `wp_figure_listing` (`type`, `figure_code`, `country_code`, `muwiki_code`, `description`) VALUES \n";
        $sql = "('zggcd', '{$code}', '{$baseInfo['country_code']}', '{$baseInfo['muwiki_code']}', ''),\n";
        return $sql;
    }

    public function _formatPeriodSql($code, $name, $pInfo)
    {
        $baseInfo = $this->baseInfo;
        $fields = $this->currentFields;
        $startEnd = $this->_getPointFieldValue($pInfo, 'start_end');
        if (empty($startEnd)) {
            $start = $this->_getPointFieldValue($pInfo, 'start');
            $end = $this->_getPointFieldValue($pInfo, 'end');
        } else {
            $separateStr = $fields['startend_separate'] ?: '-';
            list($start, $end) = explode($separateStr, $startEnd);
        }
        if (empty($start) && empty($end)) {
            return false;
        }
        //var_dump($start . '-' . $end);
        $seDetail = '';
        if ($fields['start_end_detail']) {
            $seDetail = str_replace('-', '/', strval($start)) . '-' . str_replace('-', '/', strval($end));
        }
        $start = intval($start);
        $end = intval($end);

        $sql = "('emperor', '{$baseInfo['country_code']}', '{$code}', '{$baseInfo['orderlist']}', '{$start}', '{$end}', '{$seDetail}', '{$baseInfo['path_label']}'),\n";
        return $sql;
    }

    public function _formatGatherStr($code, $name, $pInfo)
    {
        $extDatas = [];
        foreach ($this->gatherFields as $field => $fName) {
            $value = $pInfo[$field] ?? '';
            if (empty($value)) {
                continue;
            }
            $extDatas[$fName] = $value;
        }
        $notes = [];
        foreach ($this->gatherNotes as $nField) {
            $value = $pInfo[$nField] ?? '';
            if (empty($value)) {
                continue;
            }
            $notes = array_merge($notes, (array) $value);
        }
        $gStr = $this->_dealFigureGather($code, $name, $extDatas, $notes);
        return $gStr;
    }

    public function _dealFigureGather($code, $name, $bInfos = [], $notes = [])
    {
        $exist = $this->getModelObj('figure')->where(['code' => $code])->first();
        if (!empty($exist)) {
            return '';
        }
        $gStr = '';
        $gStr .= "// {$name}\n";
        $gStr .= "'{$code}' => [\n";
        $gStr .= "'baseData' => [\n'infos' => [\n";
        foreach ($bInfos as $key => $value) {
            $gStr .= "    '{$key}' => '{$value}',\n";
        }
        $gStr .= "],\n],\n\n";
        $gStr .= "'singleText' => [\n";
        foreach ($notes as $note) {
            $gStr .= "    '{$note}',\n";
        }
        $gStr .= "],\n\n";
        //$gStr .= "'extDetails' => [\n],\n";
        $gStr .= "],\n\n";
        return $gStr;
    }

    public function getDateData($value)
    {
        if (empty($value)) {
            return ['year' => 0, 'month' => 0, 'day' => 0];
        }
        $value = str_replace(['年', '月', '日'], ['-', '-', ''], $value);
        $tmp = explode('-', str_replace('-0', '-', strval($value)));
        $year = $tmp[0] ?? 0;
        $month = $tmp[1] ?? 0;
        $day = $tmp[2] ?? 0;
        return ['year' => intval($year), 'month' => intval($month), 'day' => intval($day)];
    }

    public function _getPointFieldValue($pInfo, $field, $return = 'string')
    {
        $fields = $this->currentFields;
        $field = $fields[$field] ?? '';
        $value = $pInfo[$field] ?? '';
        if ($field == 'code') {
            $value = strtolower(str_replace([' ', '-', "'", '.'], ['', '_', '_', '_'], strval($value)));
            return $value;
        }

        if (is_array($value) && $resutn == 'string') {
            $value = implode('；', $value);
        }
        return $value;
    }
}
