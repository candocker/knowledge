<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class BookVolume extends AbstractModel
{
    protected $table = 'book_volume';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function series()
    {
        return $this->belongsTo(Series::class, 'series_code', 'code');
    }

    public function bookPublishes()
    {
        return $this->hasMany(BookPublish::class, 'book_volume_id', 'id');
    }
}
