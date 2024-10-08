<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

class SubjectService extends AbstractService
{
    public function getSubjectSorts($subjectSort, $subjectCode)
    {
        $sorts = $this->getModelObj('subjectSort')->where('sort', $subjectSort)->orderBy('orderlist', 'desc')->get();
        $topNavs = [];
        $currentBigNavCode = $currentNavCode = $currentNav = $firstSubject = '';
        //var_dump($currentBigNavCode);
        foreach ($sorts as $sort) {
            $sCode = $sort['code'];
            $sData = $sort->toArray();
            $infos = $this->getModelObj('subject')->where(['subject_sort' => $sCode])->orderBy('orderlist', 'desc')->get();
            $subDatas = [];
            foreach ($infos as $info) {
                $subData = $info->toArray();
                $pCode = $subData['code'];
                if ($pCode == $subjectCode) {
                    $currentBigNavCode = $info['subject_sort'];
                    $currentNavCode = $pCode;
                    $currentNav = $subData;
                }
                if (empty($firstSubject)) {
                    $firstSubject = $subData;
                }
                $subData['url'] = "/{$subjectSort}-{$pCode}";
                $subDatas[] = $subData;
            }
            $sData['subDatas'] = $subDatas;
            $topNavs[$sCode] = $sData;
        }
        $results = [
            'currentBigNavCode' => $currentBigNavCode ?: $firstSubject['subject_sort'],
            'currentNavCode' => $currentNavCode ?: $firstSubject['code'],
            'currentNav' => $currentNav ?: $firstSubject,
            'topNavs' => $topNavs,
        ];
        return $results;
    }

    public function getGroupDatas($subject, $groupCode)
    {
        $subjectCode = $subject['code'];

        $infos = $this->getModelObj('groupSubject')->where(['subject_code' => $subjectCode])->orderBy('orderlist', 'desc')->get();;
        $subDatas = [];
        $firstGroup = $currentLeftNav = $currentLeftNavCode = false;
        foreach ($infos as $info) {
            $gData = $info->groupInfo->toArray();
            $gCode = $gData['code'];
            if (empty($firstGroup)) {
                $firstGroup = $gData;
            }
            if ($gCode == $groupCode) {
                $currentLeftNavCode = $gCode;
                $currentLeftNav = $gData;
            }
            $gData['url'] = "#showelem-{$gData['code']}";
            $subDatas[] = $gData;
        }
        $leftNavs = $subject;
        $leftNavs['subDatas'] = $subDatas;
        $currentLeftNav = $currentLeftNav ?: $firstGroup;
        $results = [
            'leftNavs' => $leftNavs,
            'currentLeftNavCode' => $currentLeftNavCode ?: $firstGroup['code'],
            'currentLeftNav' => $currentLeftNav,
            'tableTitles' => $this->groupTableTitle($subject, $currentLeftNav),
        ];
        return $results;
    }

    public function groupTableTitle($subject, $group)
    {
        if ($subject['code'] == 'scholarism') {
            return [
                'name' => '书名',
                'author' => '作者',
                'nationality' => '国家',
                'translator' => '译者',
            ];
        }
        return [
            'name' => '名称', //'online' => '在线阅读',
        ];
    }
}
