<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Country extends AbstractModel
{
    protected $table = 'country';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getFullKnowledgePathAttribute()
    {
        $base = $this->config->get('knowledge.knowledge_path');
        $kPath = $this->knowledge_path;
        if (strpos($kPath, '.php') !== false) {
            return $base . $kPath;
        }
        return $kPath ? $base . $kPath . '/base.php' : $base . $this->formatKnowledgePath() . '/base.php';
    }

    public function _formatBaseData($isMobile)
    {
        $jumpUrl = !empty($this->baidu_url) ? "<a href='{$this->baidu_url}'>百科</a>" : '';
        //$jumpUrl .= $this->knowledge_path ? "---<a href='/wiki-country-{$this->code}.html'>详情</a>" : '';
        $jumpUrl = trim($jumpUrl, '---');
        $title = $this->name;
        $title .= $jumpUrl ? " （ {$jumpUrl} ）" : '';
        $result = [
            'tdkData' => ['title' => $this->name, 'description' => $this->description],
            'pageData' => ['title' => $title, 'brief' => $this->brief],
        ];
        return $result;
    }

    public function getSimpleNameAttribute()
    {
        $tName = '';//$this->name;
        /*if (!empty($this->knowledge_path)) {
            $tName = "<a href='/wiki-country-{$this->code}.html'>{$tName}</a>";
        }*/
        if (!empty($this->baidu_url)) {
            $tName .= "<a href='{$this->baidu_url}'>{$this->name}</a>";
        }
        /*if (!empty($this->begin_end)) {
            $tName .= "( {$this->begin_end} )";
        }*/
        return $tName;
    }

    public function getFormatNameAttribute()
    {
        $tName = $this->name;
        if (!empty($this->knowledge_path)) {
            $tName = "<a href='/wiki-country-{$this->code}.html'>{$tName}</a>";
        }
        if (!empty($this->baidu_url)) {
            $tName .= "( <a href='{$this->baidu_url}'>百科</a> )";
        }
        /*if (!empty($this->begin_end)) {
            $tName .= "( {$this->begin_end} )";
        }*/
        return $tName;
    }

    public function getDetailData()
    {
        return [$this->formatName, $this->first_emperor, $this->begin_end, $this->duration];
    }

    public function formatKnowledgePath()
    {
        $sortDatas = [
            '' => ['bigsort' => 'region', 'path' => '国家地区'],
            'dynasty' => ['bigsort' => 'dynasty', 'path' => '古代中国'],
            'gdempire' => ['bigsort' => 'gdempire', 'path' => ''],
        ];
        $where = ['country_code' => $this->code, 'bigsort' => $sortDatas[$this->sort]['bigsort']];
        $clInfo = $this->getModelObj('countryListing')->where($where)->first();
        if (empty($clInfo)) {
            return 'no listing';
        }

        $kPath = $sortDatas[$this->sort]['path'];
        $cInfo = $clInfo->catalogInfo;
        if ($cInfo['path_point']) {
            $kPath .= "/{$cInfo['path_point']}";
        } else {
            $pInfo = $cInfo->parentInfo;
            if (!empty($pInfo)) {
                $kPath .= "/{$pInfo['name']}";
            }
            $kPath .= "/{$cInfo['name']}";
        }
        $kPath .= "/{$this->name}";
        return $kPath;
    }

    public function wrapDetailDatas($detailDatas)
    {
        $figureFields = ['commonFixTableEmperor', 'commonFixTableFigureDetail', 'commonFixTableFigureDetail1', 'commonFixTableFigureDetail2'];
        foreach ($figureFields as $fField) {
            $fDatas = $detailDatas[$fField] ?? [];
            if (!empty($fDatas)) {
                $detailDatas[$fField] = $this->_formatFigureDetailDatas($fDatas);
            }
        }
        return $detailDatas;
    }

    public function _formatFigureDetailDatas($eDatas)
    {
        foreach ($eDatas as $key => & $eData) {
            if ($key == 'topName') {
                continue;
            }
            if (isset($eData['emperors'])) {
                $eData['baseInfos'] = $eData['emperors'];
                unset($eData['emperors']);
            }
            foreach ($eData['baseInfos'] as & $baseInfo) {
                if (is_array($baseInfo) && !isset($baseInfo['fCode'])) {
                    continue;
                }
                if (is_array($baseInfo)) {
                    $fCode = $baseInfo['fCode'];
                    unset($baseInfo['fCode']);
                } else {
                    $fCode = $baseInfo;
                    $baseInfo = [];
                }
                $term = 0;
                if (strpos($fCode, '_mul_') !== false) {
                    $tmp = explode('_mul_', $fCode);
                    $fCode = $tmp[0];
                    $term = $tmp[1];
                }
                $eInfo = $this->getModelObj('figure')->getCacheData($fCode);
                //print_r($eInfo);exit();
                $emperorData = $eInfo['emperorData'] ?? [];
                $emperorData = $emperorData['terms'] ?? [];
                $emperorData = $emperorData[$term] ?? [];
                //print_r($emperorData);exit();

                $baseInfoNew = [];
                foreach ($eData['titles'] as $field => $fName) {
                    if (isset($baseInfo[$field])) {
                        $baseInfoNew[$field] = $baseInfo[$field];
                        continue;
                    }
                    $baseInfoNew[$field] = $this->_getPointFigureField($field, $eInfo, $emperorData);
                }
                $baseInfo = $baseInfoNew;
            }
        }
        return $eDatas;
    }

    public function _getPointFigureField($field, $figureData, $emperorData = [])
    {
        if ($field == 'temple_name') {
            $templeName = $figureData['extInfos']['庙号'] ?? '';
            $value = $figureData['baseData']['name_jump'] . ($templeName ? " ({$templeName})" : '');
            return $value;
        }
        if ($field == 'posthumous_name') {
            $posthumousName = $figureData['extInfos']['谥号'] ?? '';
            $value = $figureData['baseData']['name_jump'] . ($posthumousName ? " ({$posthumousName})" : '');
            return $value;
        }
        if ($field == 'card_name') {
            $cardName = $figureData['baseData']['name_card'] ?? '';
            $value = $figureData['baseData']['name_jump'] . ($cardName ? " ({$cardName})" : '');
            return $value;
        }
        if ($field == 'name_term') {
            $termName = $emperorData['term'] ?? '';
            $value = $figureData['baseData']['name_jump'] . ($termName ? " ({$termName})" : '');
            return $value;
        }
        if ($field == 'name') {
            $value = $figureData['baseData']['name_jump'];
            return $value;
        }
        if ($field == 'native_place') {
            $value = $figureData['baseData']['native_place'];
            return $value;
        }
        if ($field == 'birth_death') {
            $value = $figureData['birthDeathDate']['common']['birthDeathStrAgeSimple'];
            return $value;
        }
        if ($field == 'major') {
            $value = $figureData['descs']['base'];
            return $value;
        }
        if ($field == 'appendhonor') {
            $value = $figureData['descs']['追尊'] ?? $figureData['descs']['base'];
            return $value;
        }

        if ($field == 'rulerange') {
            $value = $emperorData['durationStr'] ?? '';
            return $value;
        }
        if ($field == 'eraname') {
            $value = isset($emperorData['eraname']) ? implode('、', $emperorData['eraname']) : '';
            return $value;
        }
        return '未知';
    }
}
