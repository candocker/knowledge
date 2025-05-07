<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

class SubjectService extends AbstractService
{
    use OtherLoanTrait;
    use SubjectBookTrait;
    use SubjectKnowledgeTrait;

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

    public function getPointDetail($type, $code, $isMobile)
    {
        if ($type == 'special') {
            $detailDatas = require($this->_specialKnowledgePath($code));
        } else {
            $info = $this->getPointKnowledgeInfo($type, $code);
            $knowledgePath = $info->full_knowledge_path;
            $detailDatas = empty($knowledgePath) ? [] : require($knowledgePath . '.php');
            $detailDatas = $this->formatDetailDatas($detailDatas, $isMobile);

            $fData = $info->formatBaseData($detailDatas['baseData'] ?? [], $isMobile);
            $detailDatas['tdkData'] = $fData['tdkData'] ?? [];
            $detailDatas['pageData'] = $fData['pageData'] ?? [];
            $detailDatas['baseData'] = $fData['baseData'] ?? [];
        }

        $pData = $this->getPointSubjectDatas(['code' => $code], $isMobile, $detailDatas);
        $detailDatas = array_merge($detailDatas, $pData);
        return $detailDatas;
    }

    public function getPointKnowledgeInfo($type, $code)
    {
        $params = [
            'figure' => ['mCode' => 'figure', 'field' => 'code'],
            'book' => ['mCode' => 'book', 'field' => 'code'],
            'group' => ['mCode' => 'group', 'field' => 'code'],
            'volume' => ['mCode' => 'bookVolume', 'field' => 'id'],
            'country' => ['mCode' => 'country', 'field' => 'code'],
            'dynasty' => ['mCode' => 'dynasty', 'field' => 'code'],
        ];
        $param = $params[$type];
        $info = $this->getModelObj($param['mCode'])->where([$param['field'] => $code])->first();
        if (empty($info)) {
            $this->resource->throwException(400, '信息不存在-' . $code);
        }
        return $info;
    }

    public function _specialKnowledgePath($sCode = null)
    {
        $base = $this->config->get('knowledge.knowledge_path');
        $datas = [
            'luxunworks' => $base . 'books/鲁迅著作/works.php',
            'scholarism' => $base . 'books/学术名著/scholarism.php',
            'zgculture' => $base. 'culture/中国思想史/base.php',
            'xfculture' => $base. 'culture/西方哲学史/base.php',
            //'qtculture' => $base. 'culture/其他/base.php',
            'judaism' => $base. 'culture/其他文化/犹太教/base.php',
            'christianity' => $base. 'culture/其他文化/基督教/base.php',
            'islam' => $base. 'culture/其他文化/伊斯兰教/base.php',
            'buddhism' => $base. 'culture/其他文化/佛教/base.php',
            'gydculture' => $base. 'culture/其他文化/古印度文化/base.php',
            'zgliterature' => $base. 'culture/中国文学/base.php',
            'wgliterature' => $base. 'culture/外国文学/base.php',
            'other' => $base. 'culture/外国文学/base.php',

            'zgdynasty' => $base. 'history/中国断代/base.php',
            'bigcountry' => $base. 'history/外国历史/近代大国/base.php',
            'gdempire' => $base. 'history/外国历史/帝国/base.php',

            'usasession' => $base . 'history/外国历史/近代大国/美国/总统/session.php',
        ];
        return is_null($sCode) ? $datas : $datas[$sCode] ?? $datas['other'];
    }

    public function _gdempirePointSubjectDatas($currentNav, $isMobile, & $baseDatas)
    {
        $sorts = [];
        $results = [
            'empire' => ['name' => '帝国', 'infos' => []],
        ];
        $num = $isMobile ? 50 : 7;
        $details = [];
        foreach ($results as $sort => & $sData) {
            $i = 1;
            $key = 1;
            $newInfos = [];
            $infos = $this->getModelObj('country')->where('sort', '<>', 'bigcountry')->orderBy('orderlist', 'asc')->get();
            foreach ($infos as $info) {
                $name = $info['name'];
                if (!empty($info['begin_end'])) {
                    $name .= "( {$info['begin_end']} )";
                }
                $name = "<a href='/wiki-country-{$info['code']}.html'>{$name}</a>";
                $details[$info['name']] = $name;
                if (!empty($info['sort'])) {
                    continue;
                }

                //$info['name'] .= strlen($info['name']);
                $bCode = $info['code'];
                $url = "/wiki-country-{$bCode}.html";
                $info['url'] = $url;
                $newInfos[$key][] = ['name' => $info['name'], 'url' => $url];
                if ($i % $num == 0) {
                    $key++;
                }
                $step = 1;
                $i = $i + $step;
            }
            $sData['infos'] = $newInfos;
            $sData['fixed'] = $newInfos;
        }
        //print_r($details);
        $sourceDatas = $baseDatas['commonTable']['empires']['infos'];
        foreach ($sourceDatas as $key => & $sData) {
            foreach ($sData as & $sValue) {
                if (is_array($sValue)) {
                    continue;
                }
                $oValue = strip_tags($sValue);
                if (isset($details[$oValue])) {
                    $sValue = str_replace($oValue, $details[$oValue], $sValue);
                }
            }
        }
        $baseDatas['commonTable']['empires']['infos'] = $sourceDatas;

        return ['simpleFixed' => $results];

    }

    public function _americanpotusPointSubjectDatas($currentNav, $isMobile, & $baseDatas)
    {
        $modalDatas = [];
        $infos = $this->getModelObj('figureTitle')->where(['type' => 'usapresident'])->get();
        $sessions = require($this->_specialKnowledgePath('usasession'));
        $cases = [
            'illness' => 'blue',
            'attacked' => 'red',
            'replace' => 'green',
            'impeach' => 'orange',
        ];
        foreach ($sessions as & $session) {
            $case = $session['case'] ?? '';
            if (!empty($case)) {
                $session['term'] = "<span style='color:{$cases[$case]}'>{$session['term']}</span>";
            }
        }
        $details = [];
        foreach ($infos as $info) {
            $fData = $info->figureInfo;
            //$details[$fData['name']] = "<a data-toggle='modal' data-target='#responsives'>{$fData['name']}</a>";
            $details[$fData['name']] = "<a href='javascript:;' modal-url='/ajax-figure-{$fData['code']}.html' class='modal_ajax_btn'>{$fData['name']}</a>";
            $modalDatas[$info['code']] = [
                '名字' => $fData->fullName,
                'abc' => 'efg',
            ];
        }
        //print_r($baseDatas);exit();
        //print_r($details);
        $sourceDatas = $baseDatas['commonTable']['base']['infos'];
        foreach ($sourceDatas as $key => & $sData) {
            foreach ($sData as & $sValue) {
                if (is_array($sValue)) {
                    continue;
                }
                if (isset($sessions[$sValue])) {
                    $session = $sessions[$sValue];
                    $sStr = $session['term'];
                    $sValue = $sStr;
                    continue;
                }
                $oValue = strip_tags($sValue);
                if (isset($details[$oValue])) {
                    $sValue = str_replace($oValue, $details[$oValue], $sValue);
                }
            }
        }
        //print_r($sourceDatas);exit();
        $baseDatas['commonTable']['base']['infos'] = $sourceDatas;
        $baseDatas['modalDatas'] = $modalDatas;
        return [];
    }

    public function formatDetailDatas($datas, $isMobile)
    {
        foreach ($datas as $key => $value) {
            if (strpos($key, 'commonFixTable') !== false) {
                $datas[$key] = $this->_formatCommonFixTable($value, $isMobile);
            }
        }
        //print_r($datas);exit();
        return $datas;
    }

    protected function _formatCommonFixTable($ftDatas, $isMobile)
    {
        $results = [];
        foreach ($ftDatas as $key => $ftData) {
            if (!is_array($ftData)) {
                $results[$key] = $ftData;
                continue;
            }
            $infos = $ftData['baseInfos'];
            unset($ftData['baseInfos']);

            $newData = $ftData;
            if (!$isMobile) {
                $newData['infos'] = $infos;
                $results[$key] = $newData;
                continue;
            }
            $sTitles = $ftData['titles'];
            $fTitles = $fInfos = [];
            $hField = $ftData['fixTitleField'];
            foreach ($infos as & $info) {
                foreach ($sTitles as $sTitle => $sName) {
                    if ($sTitle == $hField) {
                        $fTitles[] = $info[$hField];
                    } else {
                        $fInfos[$sTitle][] = $info[$sTitle] ?: '<span style="color:white;">占位符</span>';
                    }
                }
            }
            $newData['titles'] = $fTitles;
            $newData['infos'] = array_values($fInfos);
            $results[$key] = $newData;
        }
        return $results;
    }
}
