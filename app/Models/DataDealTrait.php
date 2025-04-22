<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

use Framework\Baseapp\Models\AbstractModel as AbstractModelBase;

trait DataDealTrait
{

    // Dateinfo
    public function recordDateinfo($type, $value, $infoType, $infoKey)
    {
        $formatedValue = explode('|', $value);
        if (count($formatedValue) != 3) {
            return true;
        }
        $date = trim($formatedValue[2]);
        $date = str_replace(['年', '月', '日'], ['/', '/', ''], $date);
        $date = explode('/', $date);
        $updateData = [
            'era_type' => trim($formatedValue[0]),
            'accurate' => trim($formatedValue[1]),
            'year' => isset($date[0]) ? intval(trim($date[0])) : 0,
            'month' => isset($date[1]) ? intval(trim($date[1])) : 0,
            'day' => isset($date[2]) ? intval(trim($date[2])) : 0,
        ];
        $data = ['type' => $type, 'info_type' => $infoType, 'info_key' => $infoKey];
        $exist = $this->where($data)->first();
        if ($exist) {
            foreach ($updateData as $field => $fValue) {
                $exist->$field = $fValue;
            }
            return $exist->save();
        }
        return $this->create(array_merge($data, $updateData));
    }

    public function formatDateinfo($type = 'source')
    {
        if ($type == 'source') {
            return $this->era_type . '|' . $this->accurate . '|' . $this->year . '/' . $this->month . '/' . $this->day;
        }
        $repository = $this->getRepositoryObj('dateinfo');
        $accurateInfos = $repository->getKeyValues('accurate');
        $eraInfos = $repository->getKeyValues('eraType');
        if (in_array($this->accurate, ['running', 'unknown'])) {
            return $accurateInfos[$this->accurate];
        }
        $eraStr = $this->era_type != '' ? $eraInfos[$this->era_type] . ' ' : '';
        $dateStr = $this->year . '/' . $this->month . '/' . $this->day;
        $accurateStr = empty($this->accurate) ? '' : " ( {$accurateInfos[$this->accurate]} )";
        return $eraStr . $dateStr . $accurateStr;
    }

    // Dateinfo repository
    /*protected function _typeKeyDatas()
    {
        return [
            'birthday' => '出生日期',
            'deathday' => '逝世日期',
            'start' => '起始日期',
            'end' => '截止日期',
            'termstart' => '任期起始日期',
            'termend' => '任期截止日期',
            'termstart2' => '第一任期起始日期',
            'termend2' => '第二任期截止日期',
        ];
    }*/
}
