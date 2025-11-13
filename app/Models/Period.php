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
        $cInfo = $this->countryInfo;
        $cName = $cInfo['name_short'] ? $cInfo['name_short'] : $cInfo['name'];
        $cStr = "<a href='/wiki-country-{$this->country_code}.html'>{$cName}</a>";
        if ($this->period_type == 'country') {
            return $cStr;
        }
        $fInfo = $this->figureInfo;
        $fName = $fInfo ? $fInfo['name'] : '';
        $fStr = $fName ? "<a href='/wiki-figure-{$this->figure_code}.html'>{$fName}</a>" : '';
        if (in_array($this->period_type, ['bigman', 'emperor'])) {
            return "({$cStr})" . $fStr;
        }
        if (empty($this->eraname)) {
            return '异常';
        }
        $eName = $this->eraname;
        $eName = $this->baidu_url ? "<a href='{$this->baidu_url}'>{$eName}</a>" : $eName;
        return "({$cStr}/{$fStr})" . $eName;
    }

    public function getMajorStr()
    {
        if ($this->period_type == 'country') {
            return $this->countryInfo->brief;
        }
        if (in_array($this->period_type, ['bigman', 'emperor'])) {
            return $this->figureInfo->description;
        }
        return $this->brief;
    }
}
