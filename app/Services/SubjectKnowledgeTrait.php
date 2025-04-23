<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

trait SubjectKnowledgeTrait
{
    public function _knowledgeData($code)
    {
        $info = $this->getModelObj('muwikiCatalog')->where(['code' => $code])->first();
        return $info->toArray();
    }

    public function getKnowledgeDetailContent($code, $dCode)
    {
        $knowledge = $this->getModelObj('muwikiCatalog')->where(['code' => $code])->first();
        $detailInfo = $this->getModelObj('muwikiListing')->where(['knowledge_code' => $knowledge['code'], 'code' => $dCode])->first();
        $datas['currentDetailData'] = $detailInfo->toArray();

        $file = $this->_getDetailFile($knowledge, $detailInfo);
        $contents = require($file);
        $contents = $this->_formatChapterContents($contents);
        //print_r($contents);exit();
        $datas['contents'] = $contents;
        return $datas;
    }

    public function getKnowledgeDetailDatas($info)
    {
        $infos = $this->getModelObj('muwikiListing')->where(['knowledge_code' => $info['code']])->get();
        $infos = $infos->toArray();
        $infos = $this->formatChapterTreeDatas($infos, 3);
        //print_r($infos);exit();
        return $infos;
    }

    public function formatSubjectDatas($currentNav, $isMobile)
    {
        $detailDatas = require($this->_specialKnowledgePath($currentNav['code']));
        $pointDatas = $this->getPointSubjectDatas($currentNav, $isMobile, $detailDatas);
        $detailDatas = array_merge($detailDatas, $pointDatas);
        //print_r($detailDatas);exit();
        return $detailDatas;
    }

    public function _getKnowledgeDatas($categories)
    {
        $results = [];
        $knowledges = $this->getModelObj('muwikiCatalog')->whereIn('bigsort', $categories)->orderBy('orderlist', 'asc')->get();
        foreach ($knowledges as $knowledge) {
            $vData = [
                'name' => $knowledge['name'],
                'volumeId' => $knowledge['id'],
                'url' => "/ask-{$knowledge['code']}.html",
            ];
            $results[] = $vData;
        }
        return $results;
    }

    public function _getDetailFile($knowledge, $detail)
    {
        $knowledgePath = $knowledge->fullPath;
        $file = "{$knowledgePath}{$detail['code']}.php";
        if (!file_exists($file)) {
            $this->resource->throwException(400, '知识文件不存在-' . $file);
        }
        return $file;
    }

    public function getPointSubjectDatas($currentNav, $isMobile, & $baseDatas)
    {
        $code = $currentNav['code'];
        $method = "_{$code}PointSubjectDatas";
        $datas = [];
        if (method_exists($this, $method)) {
            $datas = $this->$method($currentNav, $isMobile, $baseDatas);
        }
        return $datas;
    }

    public function _zgculturePointSubjectDatas($currentNav, $isMobile, $baseDatas)
    {
        $data['simpleTable'][] = [
            'name' => $currentNav['name'],
            'infos' => array_chunk($this->_getKnowledgeDatas(['confucianism']), 3),
        ];
        return $data;
    }

    public function _zgdynastyPointSubjectDatas($currentNav, $isMobile, & $baseDatas)
    {
        $dynasties = $this->getModelObj('countryCatalog')->where(['category' => 'dynasty'])->orderBy('orderlist', 'asc')->get();
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
