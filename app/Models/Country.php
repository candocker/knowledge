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
        return $this->knowledge_path ? $base . $this->knowledge_path . '/base.php' : $base . $this->formatKnowledgePath() . '/base.php';
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
            'gdempire' => ['bigsort' => 'gdempire', 'path' => '帝国历史'],
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
        $emperorDatas = $detailDatas['commonFixTableEmperor'] ?? [];
        if (!empty($emperorDatas)) {
            $detailDatas['commonFixTableEmperor'] = $this->_formatEmperorDatas($emperorDatas);
            //unset($detailDatas['commonFixTableEmperor']);
        }
        return $detailDatas;
    }

    public function _formatEmperorDatas($eDatas)
    {
        foreach ($eDatas as $key => & $eData) {
            if ($key == 'topName') {
                continue;
            }
            $emperors = $eData['emperors'];
            $baseInfos = [];
            unset($eData['emperors']);
            foreach ($emperors as $emperor) {
                $term = 0;
                if (strpos($emperor, '_mul_') !== false) {
                    $tmp = explode('_mul_', $emperor);
                    $emperor = $tmp[0];
                    $term = $tmp[1];
                }
                $eInfo = $this->getModelObj('figure')->getCacheData($emperor);
                //print_r($eInfo);exit();
                $emperorData = $eInfo['emperorData'] ?? [];
                $emperorData = $emperorData['terms'] ?? [];
                $emperorData = $emperorData[$term] ?? [];
                //print_r($emperorData);exit();
                $data = [];
                foreach ($eData['titles'] as $field => $fName) {
                    switch ($field) {
                    case 'temple_name':
                        $templeName = $eInfo['extInfos']['庙号'] ?? '';
                        $value = $eInfo['baseData']['name_jump'] . ($templeName ? " ({$templeName})" : '');
                        break;
                    case 'posthumous_name':
                        $posthumousName = $eInfo['extInfos']['谥号'] ?? '';
                        $value = $eInfo['baseData']['name_jump'] . ($posthumousName ? " ({$posthumousName})" : '');
                    case 'name':
                        $value = $eInfo['baseData']['name_jump'];
                        break;
                    case 'rulerange':
                        $value = $emperorData['durationStr'] ?? '';
                        break;
                    case 'eraname':
                        $value = isset($emperorData['eraname']) ? implode('、', $emperorData['eraname']) : '';
                        break;
                    case 'birth_death':
                        $value = $eInfo['birthDeathDate']['common']['birthDeathStrAgeSimple'];
                        break;
                    case 'major':
                        $value = $eInfo['descs']['base'];
                        break;
                    case 'appendhonor':
                        $value = $eInfo['descs']['追尊'] ?? $eInfo['descs']['base'];
                        break;
                    default:
                        $value = '未知';
                    }
                    $data[$field] = $value;
                }
                $baseInfos[] = $data;
            }
            $eData['baseInfos'] = $baseInfos;
        }
        return $eDatas;
    }
}
