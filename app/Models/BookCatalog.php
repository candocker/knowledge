<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class BookCatalog extends AbstractModel
{
    protected $table = 'book_catalog';
    protected $guarded = ['id'];

    public function volumes()
    {
        return $this->hasMany(BookCatalogVolume::class, 'book_catalog_code', 'code')->orderBy('orderlist', 'asc');
    }
}
