<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Observers;

use ModuleKnowledge\Models\Muwiki;

class MuwikiObserver
{
    /*public function created(Muwiki $model)
    {
        $model->updateTagInfos(['tags' => [$model->code]]);
        return true;
    }

    public function creating(Muwiki $model)
    {
        $code = $model->code;
        $checkCode = $model->getCodeTag($code);
        if (empty($checkCode)) {
            $checkCode = $model->findCreateTag($code);
        }
        $model->code = $checkCode;
        return true;
    }

    public function deleted(Muwiki $model)
    {
        $model->deleteTagInfos([]);
        return true;
    }*/
}
