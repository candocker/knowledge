<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Observers;

use ModuleKnowledge\Models\Emperor;

class EmperorObserver
{
    public function saving(Emperor $model)
    {
        $model->afterSave();
        return true;
    }
}
