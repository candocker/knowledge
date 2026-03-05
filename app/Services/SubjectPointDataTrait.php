<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

trait SubjectPointDataTrait
{
    public function _accountfullPointSubjectDatas($currentNav, $isMobile, & $baseDatas)
    {
        $model = $this->getModelObj('siteaccount');
        $bigsorts = $model->getBigsortDatas();
        $sorts = $model->getSortDatas();
        $sortStr = implode(',', array_keys($sorts));
        $commonFixTable = [];
        foreach ($bigsorts as $bigsort => $bigsortValue) {
            $topName = $bigsortValue;
            $infos = $this->getModelObj('siteaccount')->where(['bigsort' => $bigsort])->orderByRaw("FIND_IN_SET(sort, '{$sortStr}') asc")->orderBy('orderlist', 'desc')->get();
            $baseInfos = [];
            $colorSorts = [];
            $sColor = '';
            foreach ($infos as $info) {
                $iColor = $info['status'] == 9 ? 'red' : 'green';
                $iName = "<span style='color:{$iColor}'>{$info['name']}</span>";
                $entrance = $info['siteurl'];
                $entrance = $info['is_website'] ? "<a href='{$entrance}'>{$entrance}</a>" : $entrance;
                $currentSort = $info['sort'];
                $sortValue = $sorts[$currentSort] ?? $currentSort;
                $colorSorts[$currentSort] = $colorSorts[$currentSort] ?? ($sColor == '' ? 'blue' : '');
                $sColor = $colorSorts[$currentSort];
                $sortValue = "<span style='color:{$sColor}'>{$sortValue}</span>";
                $baseInfos[] = [
                    'sort' => $sortValue,
                    'name' => $iName,
                    'entrance' => $entrance,
                    'account' => $info['account'],
                    'major' => $info['description'],
                ];
            }

            $commonFixTable['commonFixTable' . $bigsort] = [
                'topName' => $topName,
                $bigsort => [
                    'name' => '',
                    'titles' => ['sort' => '分类', 'name' => '名称', 'entrance' => '入口', 'account' => '账号信息', 'major' => '描述'],
                    'fixTitleField' => 'name',
                    'brief' => '',
                    'baseInfos' => $baseInfos,
                ],
            ];
        }
        //print_r($commonFixTable);
        //var_export($commonFixTable);exit();
        return $commonFixTable;
        return ['commonFixTable' => $commonFixTable];
    }

    public function _americanpotusPointSubjectDatas($currentNav, $isMobile, & $baseDatas)
    {
        $modalDatas = [];
        $infos = $this->getModelObj('figureListing')->where(['type' => 'usapresident'])->get();
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
        $baseDatas['commonTable']['base']['infos'] = $sourceDatas;
        $baseDatas['modalDatas'] = $modalDatas;
        //print_r($modalDatas);exit();
        return [];
    }

    public function _hroniclePointSubjectDatas($currentNav, $isMobile, & $baseDatas)
    {
        $service = $this->getServiceObj('formatData');
        $fixDatas = $service->_initBaseData();
        $baseDatas['commonFixTable1'] = $fixDatas;
        return [];
    }

    public function _zgculturePointSubjectDatas($currentNav, $isMobile, $baseDatas)
    {
        $data['simpleTable'][] = [
            'name' => $currentNav['name'],
            'infos' => array_chunk($this->_getKnowledgeDatas(['confucianism']), 3),
        ];
        //print_r($data);exit();
        return [];
        return $data;
    }

    public function _gdempirePointSubjectDatas($currentNav, $isMobile, & $baseDatas)
    {
        return [];
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
            $infos = $this->getModelObj('country')->where('sort', 'gdempire')->orderBy('orderlist', 'asc')->get();
            foreach ($infos as $info) {
                $name = $info['name'];
                if (!empty($info['begin_end'])) {
                    $name .= "( {$info['begin_end']} )";
                }
                $name = "<a href='/wiki-country-{$info['code']}.html'>{$name}</a>";
                $details[$info['name']] = $name;
                if (!empty($info['sort'])) {
                    //continue;
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

    public function _worldregionPointSubjectDatas($currentNav, $isMobile, & $baseDatas)
    {
        return [];
        $dynasties = $this->getModelObj('countryCatalog')->where(['bigsort' => 'dynasty'])->orderBy('orderlist', 'asc')->get();
        $titles = [];
        $i = 0;
        $fixKey = 1;
        $commonFixed[1] = ['name' => '中国朝代', 'titles' => [], 'max' => 0, 'infos' => [], 'tmpInfos' => []];
        if (!$isMobile) {
            $commonFixed[2] = ['name' => '中国朝代2', 'titles' => [], 'max' => 0, 'infos' => [], 'tmpInfos' => []];
        }
        $details = [];
        foreach ($dynasties as $dynasty) {
            if (!$isMobile) {
                $fixKey = $i == 8 ? $fixKey + 1 : $fixKey;
            }
            $tCode = $dynasty['code'];
            $subInfos = $this->getModelObj('countryListing')->where(['catalog_code' => $tCode])->orderBy('orderlist', 'asc')->get();
            $details[$dynasty->name] = $dynasty;
            //echo "        ['{$dynasty['name']}', '', ''],\n";
            foreach ($subInfos as $subInfo) {
                $countryInfo = $subInfo->countryInfo;
                //print_r($countryInfo->toArray());
                //echo "        ['{$subInfo['name']}', '', ''],\n";
                $details[$countryInfo->name] = $countryInfo;
            }
            $commonFixed[$fixKey]['titles'][$tCode] = $dynasty->formatName;
            $commonFixed[$fixKey]['max'] = max($commonFixed[$fixKey]['max'], $subInfos->count());
            $commonFixed[$fixKey]['tmpInfos'][$tCode] = $subInfos;
            $i++;
        }
        //print_r($commonFixed);exit();
        foreach ($commonFixed as & $cData) {
            for ($i = 0; $i <= $cData['max']; $i++ ) {
                $tInfos = [];
                foreach ($cData['titles'] as $tCode => $cTitle) {
                    if (isset($cData['tmpInfos'][$tCode][$i])) {
                        $tInfos[] = $cData['tmpInfos'][$tCode][$i]->countryInfo->formatName;
                    } else {
                        $tInfos[] = '<span style="color:white;">占位符</span>';
                    }
                }
                $cData['infos'][] = $tInfos;
            }
            unset($cData['tmpInfos']);
            unset($cData['max']);
        }
        //print_r($details);
        $sourceDatas = $baseDatas['commonTable']['base']['infos'];
        foreach ($sourceDatas as $key => & $sData) {
            $tmpData = $sData;
            $fExts = [];
            if (isset($tmpData['fExts'])) {
                $fExts = $tmpData['fExts'];
                unset($tmpData['fExts']);
            }
            $lastData = false;
            $count = count($tmpData);
            foreach ($tmpData as $key => & $value) {
                if (isset($details[$value])) {
                    $rData = $details[$value];
                    $value = $rData->simpleName;
                    if ($key == $count - 1) {
                        $lastData = $rData;
                    }
                }
            }
            $beginEnd = $lastData ? $lastData['begin_end'] : '';
            //$beginEnd = str_replace(['公元前', '公元', '约前', '前', '年', '约'], ['B', '', 'B', 'B', '', ''], $beginEnd);
            if (!empty($lastData['first_emperor'])) {
                $beginEnd .= ' (' . $lastData['first_emperor'] . ')';
            }
            //$tmpData[] = $lastData ? $lastData['first_emperor'] : '';
            $tmpData[] = $beginEnd;
            if (!empty($fExts)) {
                $tmpData['fExts'] = $fExts;
            }
            $sData = $tmpData;
        }
        $baseDatas['commonTable']['base']['infos'] = $sourceDatas;
        //print_r($sourceDatas);exit();
        //print_r($baseDatas);exit();

        $data['commonFixed'] = $commonFixed;
        /*$data['commonFixed']['details'] = [
            'name' => '朝代明细',
            'titles' => ['名称', '起止时间', '开国皇帝', '国祚'],
            //'titleExts' => ['首都', '简介'],
            'infos' => $details,
        ];*/
        //var_export($details);exit();
        //print_r($data);exit();
        return $data;
        //$titles = $this->getRepositoryObj('dynasty')->
    }

    public function _tmp_zgdynastyPointSubjectDatas($currentNav, $isMobile, & $baseDatas)
    {
        $dynasties = $this->getModelObj('countryCatalog')->where(['bigsort' => 'dynasty'])->orderBy('orderlist', 'asc')->get();
        $titles = [];
        $i = 0;
        $fixKey = 1;
        $commonFixed[1] = ['name' => '中国朝代', 'titles' => [], 'max' => 0, 'infos' => [], 'tmpInfos' => []];
        if (!$isMobile) {
            $commonFixed[2] = ['name' => '中国朝代2', 'titles' => [], 'max' => 0, 'infos' => [], 'tmpInfos' => []];
        }
        $details = [];
        foreach ($dynasties as $dynasty) {
            if (!$isMobile) {
                $fixKey = $i == 8 ? $fixKey + 1 : $fixKey;
            }
            $tCode = $dynasty['code'];
            $subInfos = $this->getModelObj('countryListing')->where(['catalog_code' => $tCode])->orderBy('orderlist', 'asc')->get();
            $details[$dynasty->name] = $dynasty;
            //echo "        ['{$dynasty['name']}', '', ''],\n";
            foreach ($subInfos as $subInfo) {
                $countryInfo = $subInfo->countryInfo;
                //print_r($countryInfo->toArray());
                //echo "        ['{$subInfo['name']}', '', ''],\n";
                $details[$countryInfo->name] = $countryInfo;
            }
            $commonFixed[$fixKey]['titles'][$tCode] = $dynasty->formatName;
            $commonFixed[$fixKey]['max'] = max($commonFixed[$fixKey]['max'], $subInfos->count());
            $commonFixed[$fixKey]['tmpInfos'][$tCode] = $subInfos;
            $i++;
        }
        //print_r($commonFixed);exit();
        foreach ($commonFixed as & $cData) {
            for ($i = 0; $i <= $cData['max']; $i++ ) {
                $tInfos = [];
                foreach ($cData['titles'] as $tCode => $cTitle) {
                    if (isset($cData['tmpInfos'][$tCode][$i])) {
                        $tInfos[] = $cData['tmpInfos'][$tCode][$i]->countryInfo->formatName;
                    } else {
                        $tInfos[] = '<span style="color:white;">占位符</span>';
                    }
                }
                $cData['infos'][] = $tInfos;
            }
            unset($cData['tmpInfos']);
            unset($cData['max']);
        }
        //print_r($details);
        $sourceDatas = $baseDatas['commonTable']['base']['infos'];
        foreach ($sourceDatas as $key => & $sData) {
            $tmpData = $sData;
            $fExts = [];
            if (isset($tmpData['fExts'])) {
                $fExts = $tmpData['fExts'];
                unset($tmpData['fExts']);
            }
            $lastData = false;
            $count = count($tmpData);
            foreach ($tmpData as $key => & $value) {
                if (isset($details[$value])) {
                    $rData = $details[$value];
                    $value = $rData->simpleName;
                    if ($key == $count - 1) {
                        $lastData = $rData;
                    }
                }
            }
            $beginEnd = $lastData ? $lastData['begin_end'] : '';
            //$beginEnd = str_replace(['公元前', '公元', '约前', '前', '年', '约'], ['B', '', 'B', 'B', '', ''], $beginEnd);
            if (!empty($lastData['first_emperor'])) {
                $beginEnd .= ' (' . $lastData['first_emperor'] . ')';
            }
            //$tmpData[] = $lastData ? $lastData['first_emperor'] : '';
            $tmpData[] = $beginEnd;
            if (!empty($fExts)) {
                $tmpData['fExts'] = $fExts;
            }
            $sData = $tmpData;
        }
        $baseDatas['commonTable']['base']['infos'] = $sourceDatas;
        //print_r($sourceDatas);exit();
        //print_r($baseDatas);exit();

        $data['commonFixed'] = $commonFixed;
        /*$data['commonFixed']['details'] = [
            'name' => '朝代明细',
            'titles' => ['名称', '起止时间', '开国皇帝', '国祚'],
            //'titleExts' => ['首都', '简介'],
            'infos' => $details,
        ];*/
        //var_export($details);exit();
        //print_r($data);exit();
        return $data;
        //$titles = $this->getRepositoryObj('dynasty')->
    }
}
