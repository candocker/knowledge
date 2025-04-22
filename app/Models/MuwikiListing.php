<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class MuwikiListing extends AbstractModel
{
    protected $table = 'muwiki_listing';
    protected $guarded = ['id'];
    public $timestamps = false;

}
