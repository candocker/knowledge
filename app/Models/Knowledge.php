<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Knowledge extends AbstractModel
{
    //protected $table = '';
    protected $fillable = ['name'];

    public function getFullPathAttribute()
    {
        $base = $this->config->get('knowledge.knowledge_path');
        $path = "{$base}{$this->base_path}/";
        return $path;
    }
}
