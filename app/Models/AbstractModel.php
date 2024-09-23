<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

use Framework\Baseapp\Models\AbstractModel as AbstractModelBase;

class AbstractModel extends AbstractModelBase
{
    protected function getAppcode()
    {
        return 'knowledge';
    }
}
