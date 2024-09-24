<?php

namespace ModuleKnowledge\Resources;

class BookCollection extends AbstractCollection
{

    protected function _frontInfoArray()
    {
        return $this->collection->toArray();
    }
}
