<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Observers;

use ModuleKnowledge\Models\Figure;

class FigureObserver
{
    public function saved(Figure $model)
    {
        $model->afterSave();
        return true;
    }
}
