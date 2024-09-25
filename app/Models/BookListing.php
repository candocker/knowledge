<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class BookListing extends AbstractModel
{
    protected $table = 'book_listing';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function bookInfo()
    {
        return $this->belongsTo(Book::class, 'book_code', 'code');
    }

    public function catalogInfo()
    {
        return $this->belongsTo(BookCatalog::class, 'catalog_code', 'code');
    }
}
