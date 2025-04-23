<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class MuwikiCatalog extends AbstractModel
{
    protected $table = 'muwiki_catalog';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function getFullPathAttribute()
    {
        $base = $this->config->get('knowledge.knowledge_path');
        $path = "{$base}{$this->knowledge_path}/";
        return $path;
    }
}
