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

    public function _formatBaseData($isMobile)
    {
        $result = [
            'tdkData' => ['title' => $this->name, 'description' => $this->description],
            'pageData' => ['title' => $this->name, 'brief' => $this->brief],
        ];
        return $result;
    }

    public function muwikiSortInfo()
    {
        return $this->hasOne(MuwikiSort::class, 'code', 'sort');
    }

    public function getFullKnowledgePathAttribute()
    {
        $base = $this->config->get('knowledge.knowledge_path');
        $fullPath = $this->knowledge_path ? $base . $this->knowledge_path . '.php' : '';
        return $fullPath;
    }

    public function getKnowledgePathAttribute()
    {
        //return $this->path_old;
        if (!empty($this->path_point)) {
            return $this->path_point;
        }
        $muwikiSortInfo = $this->muwikiSortInfo;
        if (empty($muwikiSortInfo)) {
            return '';
        }
        $path = $muwikiSortInfo->knowledge_path;
        $path = rtrim($path, '/') . '/' . $this->name;
        return $path;
    }
}
