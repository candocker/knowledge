<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class ResourceInfo extends AbstractModel
{
    protected $table = 'resource_info';
    protected $guarded = ['id'];

    public function resourceDetailInfo()
    {
        return $this->hasOne(ResourceDetail::class, 'id', 'resource_id');
    }
}
