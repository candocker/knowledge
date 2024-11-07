<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

trait SubjectDataTrait
{
    public function formatSubjectDatas($currentNav, $isMobile)
    {
        $detailDatas = require($this->_specialKnowledgePath($currentNav['code']));
        return $detailDatas;
    }
}
