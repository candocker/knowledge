<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Affair extends AbstractModel
{
    protected $table = 'affair';
    protected $guarded = ['id'];

    public function getAffairTypes()
    {
        return [
            'keypoint' => '年度重点事件',
            'domestic' => '国内事件',
            'overseas' => '国外事件',
            '' => '事件记录',
        ];
    }
}
