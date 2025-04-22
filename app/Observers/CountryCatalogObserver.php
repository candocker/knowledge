<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Observers;

use ModuleKnowledge\Models\CountryCatalog;

class CountryCatalogObserver
{
    /*public function saved(CountryCatalog $model)
    {
        //$model->afterSave();
        return true;
    }

    public function created(CountryCatalog $model)
    {
        $model->updateTagInfos(['tags' => [$model->code]]);
        return true;
    }

    public function creating(CountryCatalog $model)
    {
        $code = $model->code;
        $checkCode = $model->getCodeTag($code);
        if (empty($checkCode)) {
            $checkCode = $model->findCreateTag($code);
        }
        $model->code = $checkCode;
        return true;
    }

    public function deleted(CountryCatalog $model)
    {
        $model->deleteTagInfos([]);
        return true;
    }*/
}
