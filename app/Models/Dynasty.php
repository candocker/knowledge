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
        $data = [
            'infos' => [
                '名称' => $this->name,
                '百科' => !empty($this->baidu_url) ? "<a href='{$this->baidu_url}'>百科</a>" : '',
                '详情' => "<a href='/wiki-dynasty-{$this->code}.html'>详情</a>",
            ],
            'brief' => $this->name,
            'desc' => $this->description,
            'headerPicUrl' => '',
        ];
        return $data;
    }
}
