<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Dynasty extends AbstractModel
{
    protected $table = 'dynasty';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getSimpleNameAttribute()
    {
        $tName = '';//$this->name;
        /*if (!empty($this->knowledge_path)) {
            $tName = "<a href='/wiki-dynasty-{$this->code}.html'>{$tName}</a>";
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
            $tName = "<a href='/wiki-dynasty-{$this->code}.html'>{$tName}</a>";
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

    public function _formatBaseData($isMobile)
    {
        $jumpUrl = !empty($this->baidu_url) ? "<a href='{$this->baidu_url}'>百科</a>" : '';
        //$jumpUrl .= $this->knowledge_path ? "---<a href='/wiki-dynasty-{$this->code}.html'>详情</a>" : '';
        $jumpUrl = trim($jumpUrl, '---');
        $result = [
            'tdkData' => ['title' => $this->name, 'description' => $this->description],
            'pageData' => ['title' => $this->name . " （ {$jumpUrl} ）", 'brief' => $this->description],
        ];
        return $result;
    }
}
