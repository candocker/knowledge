<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class MuwikiCatalog extends AbstractModel
{
    //protected $table = '';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function getFullPathAttribute()
    {
        $base = $this->config->get('muwiki_catalog.muwiki_catalog_path');
        $path = "{$base}{$this->base_path}/";
        return $path;
    }
}
