<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class KnowledgeDetail extends AbstractModel
{
    protected $table = 'knowledge_detail';
    protected $guarded = ['id'];
    public $timestamps = false;

}
