<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Resources;

class BookListingCollection extends AbstractCollection
{
    protected function _frontBaseArray()
    {
        return $this->collection->toArray();
    }
}
