<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Period extends AbstractModel
{
    protected $table = 'period';
    protected $guarded = ['id'];

    public function getCurrentTitle()
    {
        if (!empty($info['title'])) {
           return $info['title'];
        }
        $cInfo = $this->getModelObj('country')->where(['code' => $this->country_code])->first();
        $cName = $cInfo['name_short'] ? $cInfo['name_short'] : $cInfo['name'];
        $titles[] = $cName;
        $fInfo = $this->getModelObj('figure')->where(['code' => $this->figure_code])->first();
        $fName = $fInfo ? $fInfo['name'] : '';
        if (!empty($fName)) {
            $titles[] = $fName;
        }
        if (!empty($this->eraname)) {
            $titles[] = $this->eraname;
        }

        return implode('/', $titles);
    }
}
