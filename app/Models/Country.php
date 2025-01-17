<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Country extends AbstractModel
{
    protected $table = 'country';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function _formatBaseData($isMobile)
    {
        $jumpUrl = !empty($this->baidu_url) ? "<a href='{$this->baidu_url}'>百科</a>" : '';
        //$jumpUrl .= $this->knowledge_path ? "---<a href='/wiki-dynasty-{$this->code}.html'>详情</a>" : '';
        $jumpUrl = trim($jumpUrl, '---');
        $result = [
            'tdkData' => ['title' => $this->name, 'description' => $this->description],
            'pageData' => ['title' => $this->name . " （ {$jumpUrl} ）", 'brief' => $this->brief],
        ];
        return $result;
    }
}
