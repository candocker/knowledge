<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Dynasty extends AbstractModel
{
    protected $table = 'dynasty';
    protected $guarded = ['id'];
    public $timestamps = false;

}
