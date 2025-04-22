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
}
