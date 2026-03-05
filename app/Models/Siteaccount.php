<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Siteaccount extends AbstractModel
{
    protected $table = 'siteaccount';
    //protected $fillable = [];
    protected $guarded = [];
    public $timestamps = false;

    public function getBigsortDatas()
    {
        return [
            'job' => '工作',
            '' => '扩展',
            'common' => '通用',
        ];
    }

    public function getSortDatas()
    {
        return [
            'base' => '基础模块',
            'selfmedia' => '自媒体',
            'develop' => '技术类',
            'system' => '系统',
            'third' => '第三方',
            'union' => '联盟号',
            'tool' => '自建系统',
            'database' => '数据库',
            'server' => '服务器',
        ];
    }
}
