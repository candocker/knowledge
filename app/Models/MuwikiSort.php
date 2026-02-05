<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class MuwikiSort extends AbstractModel
{
    protected $table = 'muwiki_sort';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function getFullPathAttribute()
    {
        $base = $this->config->get('knowledge.knowledge_path');
        $path = "{$base}{$this->knowledge_path}/";
        return $path;
    }
}
