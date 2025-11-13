<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class PeriodYear extends AbstractModel
{
    protected $table = 'period_year';
    protected $guarded = ['id'];

    public function getPointPeriodYearDatas($year, $title)
    {
        $typeStr = 'country,emperor,eraname';
        $infos = $this->where('year', $year)->orderBy('orderlist')->orderByRaw("FIND_IN_SET(period_type, '{$typeStr}') asc")->get();
        $bDatas = [];
        $periodTypes = $this->periodTypeDatas();
        foreach ($infos as $info) {
            $bDatas[] = [
                'type' => $periodTypes[$info->period_type] ?? $info->period_type,
                'name' => $info->title,
                'major' => $info->periodInfo->getMajorStr(),
            ];
        }
        $results = [
            'topName' => $title . '纪年明细',
            'baselist' => [
                'name' => '',
                'titles' => ['type' => '类型', 'name' => '标题', 'major' => '简介'],
                'fixTitleField' => 'type',
                'brief' => '',
                'baseInfos' => $bDatas,
            ],
        ];
        return $results;
    }
}
