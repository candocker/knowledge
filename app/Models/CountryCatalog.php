<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class CountryCatalog extends AbstractModel
{
    protected $table = 'country_catalog';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function parentInfo()
    {
        return $this->hasOne(CountryCatalog::class, 'code', 'parent_code');
    }

    /*public function getNameAttribute()
    {
        return $this->formatTagDatas('string');
    }*/

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

    public function getKnowledgePathAttribute()
    {
        //return $this->path_old;
        if (!empty($this->path_point)) {
            return $this->path_point;
        }
        if ($this->bigsort == 'gdempire') {
            $path = '帝国历史/' . $this->name . '/base';
            return $path;
        }
        //print_R($this->toArray());
        if ($this->bigsort == 'region') {
            $path = '国家地区/';
            $parentInfo = $this->parentInfo;
            if (!empty($parentInfo)) {
                $ppInfo = $parentInfo->parentInfo;
                if ($ppInfo) {
                    $path .=  $ppInfo['name'] . '/';
                }
                $path .= $parentInfo['name'] . '/';
            }
            $path .= $this->name;
            return $path;
        }
        return '';
    }

    public function _formatBaseData($isMobile)
    {
        $jumpUrl = !empty($this->baidu_url) ? "<a href='{$this->baidu_url}'>百科</a>" : '';
        $pTitle = $this->name;
        $pTitle .= $this->baidu_url ? " （ {$jumpUrl} ）" : '';
        $result = [
            'tdkData' => ['title' => $this->name, 'description' => $this->description],
            'pageData' => ['title' => $pTitle, 'brief' => $this->brief],
        ];
        return $result;
    }

    public function getFullKnowledgePathAttribute()
    {
        $base = $this->config->get('knowledge.knowledge_path');
        return $this->knowledge_path ? $base . $this->knowledge_path . '/base' : '';
    }
}
