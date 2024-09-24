<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Resources;

class BookVolumeCollection extends AbstractCollection
{
    protected function _frontInfoArray()
    {
        return $this->collection->toArray();
    }
}
