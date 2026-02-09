<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Controllers;

use Swoolecan\Foundation\Helpers\CommonTool;

trait TraitTestFigure
{
    public $currentFields = [
        'start_end' => '',
        'start' => '',
        'end' => '',
        'start_end_detail' => true,

        'name_card' => '',
        'code' => '',
        'name' => 'name',
        'birth' => 'birth_date',
        'death' => 'death_date',
        'description' => 'brief_intro',
    ];

    public $baseInfo = [
        'is_single' => true,
        'country_code' => 'luomannuofuwangchao',
        'path_label' => '君主',
        'path_gather' => '罗曼诺夫王朝',
        'base_path' => '大国和组织/俄国/罗曼诺夫王朝/',
    ];

    public function $gatherFields = [
        'english_name' => '英文名',
        'alias' => '别名',
        'title' => '头衔',
        'death_cause' => '死因',
        'relationship' => '世系',
        'notes' => ['note', 'notes', 'key_evets'];
    ];

    public function _testDealFigure()
    {
        $fSelect = '`code`, `name`, `country_code`, `path_label`, `path_gather`, `path_point`, `name_card`, `native_place`, `description`, ';
        $fSelect .= '`birth_year`, `birth_month`, `birth_day`, `death_year`, `death_month`, `death_day`',
        $fSql = "INSERT INTO `wp_figure` ({$fSelect}) VALUES\n";
        $pSql = "INSERT INTO `wp_period` (`period_type`, `country_code`, `figure_code`, `orderlist`, `start_year`, `end_year`, `start_end_detail`, `type_ext`) VALUES\n";

        $topInfos = require('/tmp/tmp.php');
        $gStr = '';
        $baseInfo = $this->baseInfo;
        //print_r($topInfos);exit();
        foreach ($topInfos as $topKey => $mulInfos) {
            foreach ($mulInfos as $extStr => $pInfos) {
                $pathPoint = $baseInfo['base_path'] . $baseInfo['path_label'];
                $pathPoint .= $baseInfo['is_single'] ? '' : "_{$baseInfo['path_gather']}";
                foreach ($pInfos as $pInfo) {
                    //print_r($pInfo);exit();
                    $name = $this->_getPointFieldValue($pInfo, 'name');
                    $code = $this->_getPointFieldValue($pInfo, 'code');
                    $code = empty($code) ? CommonTool::getSpellStr($name, '') : $code;
                    //echo "{$name}\n";
                    echo "        '{$code}', // {$name}\n";
                    $fSql .= $this->_FormatFigureSql($code, $name, $pathPoint, $pInfo);
                    $pSql .= $this->_formatPeriodData($pInfo, $pathPoint);
                    //$gStr .= $this->_formatGatherStr($pInfo,);
                }
                /*$fFile = "/data/database/knowledge/{$gPath}.php";
                $createFile = request('create_file');
                if ($createFile) {
                   //file_put_contents($fFile, "<?php\nreturn [\n{$gStr}\n];");
                }*/
                echo $gStr;
            }
        }
        echo $fSql;
        exit();
    }

    public function _formatPeriodSql($code, $name, $pInfo)
    {
        $baseInfo = $this->baseInfo;
        $fields = $this->currentFields;
        $startEnd = $this->_getPointFieldValue($pInfo, 'start_end');
        if (empty($startEnd) {
            $start = $this->_getPointFieldValue($pInfo, 'start');
            $end = $this->_getPointFieldValue($pInfo, 'end');
        } else {
            $separateStr = $fields['startend_separate'] ?: '-';
            list($start, $end) = explode($separateStr, $startEnd);
        }
        if (empty($start) && empty($end)) {
            return false;
        }
        $seDetail = '';
        if ($fields['start_end_detail']) {
            $seDetail = str_replace('-', '/', $start) . '-' . str_replace('-', '/', $end);
        }

        $sql = "('emperor', '{$baseInfo['country_code']}', '{$code}', '{$baseInfo['orderlist']}', '{$start}', '{$end}', '{$seDetail}', '{$baseInfo['path_label']}'); \n";
        return $sql;
    }

    public function _formatGatherStr($code, $name, $pInfo)
    {
            $pInfo['notes'] = array_merge([$pInfo['notes']], $pInfo['key_events'] ?? []);
            if (isset($pInfo['death_cause']) && $pInfo['death_cause'] != '自然死亡') {
            //$pInfo['notes'][] = $pInfo['death_cause'];
            }
            //print_R($pInfo);
            $description = isset($pInfo['notes']) ? (is_array($pInfo['notes']) ? implode('；', $pInfo['notes']) : $pInfo['notes']) : '';
            $birthMonth = $birthDay = $deathMonth = $deathDay = 0;
            list($birthYear, $birthMonth, $birthDay) = explode('-', str_replace('-0', '-', $pInfo['birth_date']));
            list($deathYear, $deathMonth, $deathDay) = explode('-', str_replace('-0', '-', $pInfo['death_date']));
            /*if (strpos($pInfo['reign_end'], '-') !== false) {
                list($deathYear, $deathMonth, $deathDay) = explode('-', str_replace('-0', '-', $pInfo['reign_end']));
            }*/
            $extDatas = ['英文名' => $pInfo['英文名'] ?? ''];
        if (isset($pInfo['relationship'])) {
            if (isset($pInfo['relationship'])) {
                $extDatas['世系'] = $pInfo['relationship'];
            }
            //$extDatas['头衔'] = $pInfo['title'];
            if (isset($pInfo['nickname'])) {
                $extDatas['别名'] = $pInfo['nickname'];
            }
            if (isset($pInfo['death_cause'])) {
                $extDatas['死因'] = $pInfo['death_cause'];
            }
            $gStr .= $this->_dealFigureGather($code, $nameSource, $description, $extDatas);
        }
    }

    public function _formatFigureSql($code, $name, $pathPoint, $pInfo)
    {
        $exist = $this->getModelObj('figure')->where(['code' => $code])->first();
        if ($exist) {
            var_dump($name);
            return false;
        }

        $baseInfo = $this->baseInfo;
        $valueStr = "'{$code}', '{$name}', '{$baseInfo['country_code']}', '{$baseInfo['path_label']}', '{$baseInfo['path_gather']}', '{$pathPoint}', ";
        foreach (['name_card', 'native_place', 'description'] as $extField) { 
            $fValue = $this->_getPointFieldValue($pInfo, $extField);
            $fValue = $extField == 'name_card' && empty($fValue) ? $name : $fValue;
            $valueStr .= "'{$fValue}', ";
        }
        foreach (['birth', 'death'] as $dateType) {
            $fValues = $this->getDateData($this->_getPointFieldValue($pInfo, $dateType));
            foreach ($fValues as $fField => $fValue) {
                $dField = $dateType . '_' . $fField;
                $valueStr .= "'{$fValue}', ";
            }
        }

        $valueStr = trim($valueStr, ', ');
        $sql = "({$valueStr});\n";
        //echo $sql;
        return $sql;
    }

    public function _testDealxt()
    {
        $datas = file_get_contents('/tmp/xt.json');
        $datas = json_decode($datas, true);
        $datas = $datas['data']['list'];

        $eNames = [];
        $sql = '';
        foreach ($datas as $index => $data) {
            //print_r($data);
            $name = $data['lemmaTitle'];
            $exist = $this->getModelObj('figure')->where(['name' => $name])->first();
            if ($exist) {
                var_dump($name);
                continue;
            }
            $baiduUrl = "https://baike.baidu.com/item/{$nameCard}/{$data['lemmaId']}";
            $description = $data['summary'];
            $description = '';

            $picture = $data['coverPic'];
            if (strpos($picture, ',') !== false) {
                $picture = substr($picture, 0, strpos($picture, ','));
            }
            $sql .= "UPDATE `wp_figure` SET `baidu_url` = '{$baiduUrl}', `baidu_picture` = '{$picture}' WHERE `code` = '{$exist['code']}';\n";
        }
        echo $sql;
        exit();
    }

    public function _dealFigureGather($code, $name, $description, $bInfos = [])
    {
        $gStr = '';
        $gStr .= "// {$name}\n";
        $gStr .= "'{$code}' => [\n";
        $gStr .= "'baseData' => [\n'infos' => [\n";
        foreach ($bInfos as $key => $value) {
            $gStr .= "    '{$key}' => '{$value}',\n";
        }
        $gStr .= "],\n],\n\n";
        $gStr .= "'singleText' => [\n    '{$description}',\n],\n\n";
        //$gStr .= "'extDetails' => [\n],\n";
        $gStr .= "],\n\n";
        return $gStr;
    }

    public function getDateData($value)
    {
        if (empty($value)) {
            return ['year' => 0, 'month' => 0, 'day' => 0];
        }
        $tmp = explode('-', str_replace('-0', '-', $value));
        $year = $tmp[0] ?? 0;
        $month = $tmp[1] ?? 0;
        $day = $tmp[2] ?? 0;
        return ['year' => $year, 'month' => $month, 'day' => $day];
    }

    public function _getPointFieldValue($pInfo, $field)
    {
        $fields = $this->currentFields;
        $field = $fields[$field] ?? '';
        $value = $pInfo[$field] ?? '';
        if ($field == 'code') {
            $value = strtolower(str_replace([' ', '-', "'", '.'], ['', '_', '_', '_'], $value));
            return $value;
        }

        if (is_array($value)) {
            $value = implode('；', $value);
        }
        return $value;
    }
}
