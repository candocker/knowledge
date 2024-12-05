<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Resources;

class EmperorCollection extends AbstractCollection
{

    protected function _frontDetailArray()
    {
        return $this->collection->toArray();
    }
}
