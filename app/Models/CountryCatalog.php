<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class CountryCatalog extends AbstractModel
{
    protected $table = 'country_catalog';
    protected $primaryKey = 'code';
    public $incrementing = false;

    /*public function getNameAttribute()
    {
        return $this->formatTagDatas('string');
    }*/

}
