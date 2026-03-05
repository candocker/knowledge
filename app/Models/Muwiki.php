<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Muwiki extends AbstractModel
{
    protected $table = 'muwiki';
    protected $primaryKey = 'code';
    public $incrementing = false;

    /*public function getNameAttribute()
    {
        return $this->formatTagDatas('string');
    }*/

    public function _formatBaseData($isMobile)
    {
        $pTitle = $this->name;
        if ($this->sort == 'zggcd') {
            $pTitle = "<a href='/wiki-muwiki-gcdqgdbdh.html'>中国全国代表大会</a>-" . $pTitle;
        }
        if (!empty($this->baidu_url)) {
            $pTitle .= " (<a href='{$this->baidu_url}'>百科</a>)";
        }
        $result = [
            'tdkData' => ['title' => $this->name, 'description' => $this->description],
            'pageData' => ['title' => $pTitle, 'brief' => $this->description],
        ];
        return $result;
    }

    public function muwikiSortInfo()
    {
        return $this->hasOne(MuwikiSort::class, 'code', 'sort');
    }

    public function getFullKnowledgePathAttribute()
    {
        $base = $this->config->get('knowledge.knowledge_path');
        $fullPath = $this->knowledge_path ? $base . $this->knowledge_path . '.php' : '';
        return $fullPath;
    }

    public function getKnowledgePathAttribute()
    {
        //return $this->path_old;
        if (!empty($this->path_point)) {
            return $this->path_point;
        }
        $muwikiSortInfo = $this->muwikiSortInfo;
        if (empty($muwikiSortInfo)) {
            return '';
        }
        $path = $muwikiSortInfo->knowledge_path;
        $path = rtrim($path, '/') . '/' . $this->name;
        return $path;
    }

    public function _formatMuwikiDetailDatas($eDatas)
    {
        foreach ($eDatas as $key => & $eData) {
            if ($key == 'topName') {
                continue;
            }
            if (!isset($eData['baseInfos'])) {
                continue;
            }
            foreach ($eData['baseInfos'] as & $baseInfo) {
                if (is_array($baseInfo) && !isset($baseInfo['mCode'])) {
                    continue;
                }
                if (is_array($baseInfo)) {
                    $mCode = $baseInfo['mCode'];
                    unset($baseInfo['mCode']);
                } else {
                    $mCode = $baseInfo;
                    $baseInfo = [];
                }
                $mInfo = $this->getModelObj('muwiki')->where(['code' => $mCode])->first();
                $baseInfoNew = [];
                foreach ($eData['titles'] as $field => $fName) {
                    if (isset($baseInfo[$field])) {
                        $baseInfoNew[$field] = $baseInfo[$field];
                        continue;
                    }
                    $baseInfoNew[$field] = $this->_getPointMuwikiField($field, $mInfo);
                }
                $baseInfo = $baseInfoNew;
            }
        }
        return $eDatas;
    }

    public function _getPointMuwikiField($field, $info)
    {
        if ($field == 'name') {
            $nameJump = "<a href='/wiki-muwiki-{$info->code}.html?force_create_file=party'>{$info->name}</a>";
            return $nameJump;
        }
        if ($field == 'major') {
            return $info->description;
        }
        return $info->$field;
    }
}
