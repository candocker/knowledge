<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Observers;

use ModuleKnowledge\Models\Book;

class BookObserver
{
    public function saved(Book $model)
    {
        $model->afterSave();
        return true;
    }
}
