<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class BookListing extends AbstractModel
{
    protected $table = 'book_listing';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_code', 'code');
    }
}
