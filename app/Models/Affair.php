<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Affair extends AbstractModel
{
    protected $table = 'affair';
    protected $guarded = ['id'];

    public function getAffairTypes()
    {
        return [
            'keypoint' => '年度重点事件',
            'domestic' => '国内事件',
            'overseas' => '国外事件',
            '' => '事件记录',
        ];
    }

    public function formatDateInfo()
    {
        $accurateValues = $this->getAccurateDatas();
        $results = [];
        $fields = ['accurate', 'year', 'month', 'day'];
        $data = [];
        foreach ($fields as $field) {
            $$field = $this->$field;
            $data[$field] = $this->$field;
        }
        $year = str_replace('-', '前', strval($year));
        $yearStr = $year ? $year . '年' : '';
        $accurateStr = $accurateValues[$accurate];
        $monthStr = $month ? $month . '月' : '';
        $dayStr = $day ? $day . '日' : '';
        if ($accurate == 'unknown') {
            $monthDay = $accurateStr;
            $fullStr = $monthDay;
        } else {
            $accurateStr = $accurateStr ? "({$accurateStr})" : '';
            $monthDay = $month ? $month . '/' : '';
            $monthDay .= $day ? $day : '';
            $monthDay = trim($monthDay, '/');
            $fullStr = $year ? $year . '/' : '';
            $fullStr .= $monthDay;
            $fullStr = trim($fullStr, '/');
            if (!empty($fullStr)) {
                $fullStr = $accurateStr . $fullStr;
            }
            if (!empty($monthDay)) {
                $monthDay = $accurateStr . $monthDay;
            }
        }

        $results = [
            'sourceData' => $data,
            'accurate' => $accurateValues[$data['accurate']],
            'yearStr' => $yearStr,
            'monthStr' => $monthStr,
            'dayStr' => $dayStr,
            'monthDay' => $monthDay,
            'monthDay2' => $monthStr . $dayStr,
            'fullStr' => $fullStr,
        ];
        //print_r($results);exit();
        return $results;
    }
}
