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
        $data = [
            'infos' => [
                '名称' => $this->name,
                '百科' => !empty($this->baidu_url) ? "<a href='{$this->baidu_url}'>百科</a>" : '',
                '详情' => "<a href='/wiki-country-{$this->code}.html'>详情</a>",
            ],
            'brief' => $this->name,
            'desc' => $this->description,
            'headerPicUrl' => '',
        ];
        return $data;
    }
}
