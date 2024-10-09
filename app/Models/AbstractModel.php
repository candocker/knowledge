<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

use Framework\Baseapp\Models\AbstractModel as AbstractModelBase;

class AbstractModel extends AbstractModelBase
{
    protected $connection = 'knowledge';

    protected function getAppcode()
    {
        return 'knowledge';
    }

    public function getFullKnowledgePathAttribute()
    {
        $base = $this->config->get('knowledge.knowledge_path');
        return $this->knowledge_path ? $base . $this->knowledge_path : '';
    }
}
