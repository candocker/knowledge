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
        return $this->knowledge_path ? $base . $this->knowledge_path . '/base' : '';
    }

    public function _formatBaseData($isMobile)
    {
        $jumpUrl = !empty($this->baidu_url) ? "<a href='{$this->baidu_url}'>百科</a>" : '';
        //$jumpUrl .= $this->knowledge_path ? "---<a href='/wiki-country-{$this->code}.html'>详情</a>" : '';
        $jumpUrl = trim($jumpUrl, '---');
        $result = [
            'tdkData' => ['title' => $this->name, 'description' => $this->description],
            'pageData' => ['title' => $this->name . " （ {$jumpUrl} ）", 'brief' => $this->brief],
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

        $cInfo = $clInfo->catalogInfo;
        $pInfo = $cInfo->parentInfo;
        $kPath = $sortDatas[$this->sort]['path'];
        if (!empty($pInfo)) {
            $kPath .= "/{$pInfo['name']}";
        }
        $kPath .= "/{$cInfo['name']}/{$this->name}";
        //var_dump($kPath);
        return $kPath;
    }
}
