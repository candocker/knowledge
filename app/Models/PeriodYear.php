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
        $infos = $this->where(['year' => $year, 'period_type' => 'country'])->orderBy('orderlist')->get();
        $bDatas = [];
        $periodTypes = $this->periodTypeDatas();
        foreach ($infos as $info) {
            $cCode = $info['country_code'];
            if ($cCode == 'xiyan' && $info['year'] == 386) {
                $pyInfos = $this->where(['year' => $info['year'], 'country_code' => $cCode])->whereNotIn('period_type', ['eraname', 'country'])->pluck('title');
            } else {
                $pyInfos = $this->where(['year' => $info['year'], 'country_code' => $info['country_code']])->where('period_type', '<>', 'country')->pluck('title');
            }
            $pyInfos = $pyInfos->toArray();
            $major = empty($pyInfos) ? $info->periodInfo->getMajorStr() : implode('、', $pyInfos);
            $bDatas[] = [
                'type' => $periodTypes[$info->period_type] ?? $info->period_type,
                'name' => $info->title,
                'major' => $major,
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
