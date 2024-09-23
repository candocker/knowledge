<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Observers;

use ModuleKnowledge\Models\Demo;

class DemoObserver
{
    public function deleting(Demo $model)
    {
        //return $model->canDelete();
    }
}
