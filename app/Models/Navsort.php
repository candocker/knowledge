<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Navsort extends AbstractModel
{
    protected $table = 'navsort';
    protected $primaryKey = 'code';
    //protected $fillable = [];
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;

    public function parentInfo()
    {
        return $this->hasOne(Navsort::class, 'code', 'parent_code');
    }
}
