<?php

namespace ModuleKnowledge\Services;

trait FormatAnnalTrait
{
    public function dealAnnals()
    {
        $eranameDatas = $this->_initCenturyData();
        $this->getRepositoryObj('passport-user')->setPointCaches('annals_eraname', $eranameDatas);
        $baikeDatas = $this->formatBaikeDatas();
        //print_R($baikeDatas);
        $this->getRepositoryObj('passport-user')->setPointCaches('annals_baike', $baikeDatas);
        //print_r($results);
        return true;

        $results = [];
        /*$annals = require(self_app_path($this->getAppCode(), '/resources/formatdata/annals.php'));
        //print_R($annals);
        $base = $this->config->get('knowledge.knowledge_path') . '编年史/';
        foreach ($annals as $path => $elems) {
            foreach ($elems as $eKey => $elem) {
                $tmp = explode('_', $elem);
                $subPath = $base . $path;
                if (!is_dir($subPath)) {
                    mkdir($subPath);
                }
                $subPathFull = $subPath . '/' . $elem;
                if (!is_dir($subPathFull)) {
                    mkdir($subPathFull);
                }
                $start = $tmp[0];
                $end = $tmp[1];
                $end = $end === '至今' ? date('Y') : $end;
                $start = str_replace('BC', '-', $start);
                $end = str_replace('BC', '-', $end);
                $start = intval($start);
                $end = intval($end);
                for ($i = $start; $i <= $end; $i++) {
                    //var_dump($i);
                    $iPath = str_replace('-', 'BC', strval($i));
                    $fPath = $base . $path . '/';
                    $fPath .= is_string($eKey) ? '' : $elem . '/';
                    $fPath .= $iPath . '.php';
                    $results[$i] = $fPath;
                }
                //var_dump($start);
                //var_dump($end);
            }
        }
        $results = ['noused'];
        $this->getRepositoryObj('passport-user')->setPointCaches('annals_details', $results);*/
    }

    public function _initCenturyData()
    {
        $base = $this->config->get('knowledge.knowledge_path') . '编年史/annals/';
        $elems = [
            'china' => '', 'japan' => '日', 'us' => '美',
        ];
        $eranameDatas = [];
        foreach ($elems as $cKey => $cName) {
            $file = $base . $cKey . '.php';
            $data = require($file);
            $this->dealCenturyData($cName, $data, $eranameDatas);
            //print_r($data);
        }
        return $eranameDatas;
    }

    public function dealCenturyData($cName, $data, & $eranameDatas)
    {
        foreach ($data as $topName => $topElems) {
            //var_dump($topName);
            $topIgnore = false;
            if (isset($topElems['ignore'])) {
                $topIgnore = $topElems['ignore'];
                unset($topElems['ignore']);
            }
            $topIgnoreElems = [];
            if (isset($topElems['ignoreElems'])) {
                $topIgnoreElems = $topElems['ignoreElems'];
                unset($topElems['ignoreElems']);
            }

            foreach ($topElems as $bigName => $bigElems) {
                $showTop = false;
                if (empty($topIgnore) && !in_array($bigName, $topIgnoreElems)) {
                    $showTop = true;
                }
                //var_dump($showTop);

                $bigIgnore = false;
                if (isset($bigElems['ignore'])) {
                    $bigIgnore = $bigElems['ignore'];
                    unset($bigElems['ignore']);
                }
                $bigIgnoreElems = [];
                if (isset($bigElems['ignoreElems'])) {
                    $bigIgnoreElems = $bigElems['ignoreElems'];
                    unset($bigElems['ignoreElems']);
                }
 
                foreach ($bigElems as $eName => $startEnd) {
                    $showBig = false;
                    if (empty($bigIgnore) && !in_array($eName, $bigIgnoreElems)) {
                        $showBig = true;
                    }
                    //var_dump($showBig);

                    if (strpos($startEnd, '_') === false) {
                        $start = $startEnd;
                        $end = $end;
                    } else {
                        $tmp = explode('_', $startEnd);
                        $start = $tmp[0];
                        $end = $tmp[1];
                    }
                    $cYear = $start;
                    $cIndex = 1;
                    do {
 
                        if ($cYear == 0) {
                            $cYear++;
                            continue;
                        }
                        $extName = $cName ? "{$cName}/" : '';
                        $extName .= $showTop ? "{$topName}/" : '';
                        $extName .= $showBig ? "{$bigName}/" : '';
                        $extName = trim($extName, '/');
                        $str = $extName ? "({$extName})" : '';
                        $str .= $eName . $cIndex . '年';
                        if (!isset($eranameDatas[$cYear])) {
 
                            $eranameDatas[$cYear] = [];
                        }
                         $eranameDatas[$cYear][] = $str;
                        $cYear++;
                        $cIndex++;
                    } while ($cYear <= $end);
                }
            }
            //print_r($eranameDatas);
        }
        return true;
    }

    public function _initAnnalsData()
    {
        $command = '';
        $base = $this->config->get('knowledge.knowledge_path') . '编年史/年表/';
        for ($i = -8; $i <= 21; $i++) {
            if ($i == 0) {
                continue;
            }
            $path = $i < 0 ? 'BC' . abs($i) : $i;
            $fullPath = $base . $path;
            $command .= "mkdir {$fullPath};\n";

            for ($j = 0; $j <= 9; $j++) {
                $command .= "mkdir {$fullPath}/{$j};\n";
            }
        }
        echo $command;
    }

    public function _initBaseData()
    {
        $results = [
            'topName' => '黄帝纪年编年史',
        ];
        $ancient = [
            'name' => '上古',
            'titles' => ['name' => '起止年份', 'major' => '明细'],
            'fixTitleField' => 'name',
        ];

        $start = -4000;
        $elems = [];
        do {
            $end = $start == -2750 ? -2697 : $start + 49;
            //$end = $end > -2697 ? $start + 2697 : $end;
            $elem = "{$start}_{$end}";
            $code = 'SG' . str_replace('-', '', $elem);
            $name = str_replace('-', '前', $elem);
            $elems[] = "<a href='http://mu.canliang.wang/wiki-annals-{$code}.html'>{$name}</a>";
            $start += 50;
        } while ($start < -2700);
        $remain = count($elems) % 9;
        $infos[] = array_splice($elems, 0, $remain);
        $infos = array_merge($infos, array_chunk($elems, 9));
        foreach ($infos as $key => $elem) {
            $major = implode('、', $elem);
            $tmp = strip_tags($major);
            $pre = substr($tmp, 0, strpos($tmp, '_'));
            $suffix = substr($tmp, strrpos($tmp, '_'));
            $ancient['baseInfos'][] = [
                'name' => $pre . $suffix,
                'major' => $major,
            ];
        }
        $results['ancient'] = $ancient;

        $medieval = [
            'name' => '中古',
            'titles' => ['name' => '起止年份', 'major' => '明细'],
            'fixTitleField' => 'name',
            'baseInfo' => [],
        ];

        $start = -2697;
        $elems = [];
        do {
            $end = $start == -2697 ? -2681 : ($start == -1060 ? -1047 : $start + 19);
            $elem = "{$start}_{$end}";
            $code = 'ZG' . str_replace('-', '', $elem);
            $name = str_replace('-', '前', $elem);
            $elems[] = "<a href='/wiki-annals-{$code}.html'>{$name}</a>";
            $start = $start == -2697 ? -2680 : $start + 20;
        } while ($start < -1046);
        $mInfos = array_chunk($elems, 9);
        foreach ($mInfos as $key => $elem) {
            $major = implode('、', $elem);
            $tmp = strip_tags($major);
            $pre = substr($tmp, 0, strpos($tmp, '_'));
            $suffix = substr($tmp, strrpos($tmp, '_'));
            $medieval['baseInfos'][] = [
                'name' => $pre . $suffix,
                'major' => $major,
            ];
        }
        $results['medieval'] = $medieval;

        $yearInfos = [];
        $ageDatas = ['0-10年代', '20-30年代', '40-50年代', '60-70年代', '80-90年代'];
        $centuryDatas = $this->getModelObj('century')->orderBy('orderlist')->get();
        foreach ($centuryDatas as $cKey => $cData) {
            $yDatas = [];
            $yInfos = $this->getModelObj('chronology')->where(['century_code' => $cData['code']])->orderBy('orderlist')->get();
            foreach ($yInfos as $yInfo) {
                $year = abs($yInfo->orderlist);
                $remain = $year % 100;
                $age = floor($remain / 10);
                $ageKey  = floor($age / 2);
                $ageName = $cData['code'] == 'BC11' ? "第{$age}年代" : $ageDatas[$ageKey];
                if (!isset($yDatas[$ageName])) {
                    $yDatas[$ageName] = ['name' => $ageName, 'major' => ''];
                }
                $yDatas[$ageName]['major'] .= "<a href='/wiki-annals-{$yInfo['code']}.html'>{$yInfo['name']}</a>、";
            }

            $yName = $cData['name'];
            $yName = "<a href='/wiki-century-{$cData['code']}.html'>{$yName}</a>";
            $extName = !empty($cData['baidu_url']) ? "<a href='{$cData['baidu_url']}'>百科</a>、" : '';
            $extName .= !empty($cData['chronology_url']) ? "<a href='{$cData['chronology_url']}'>年表</a>、" : '';
            $yName .= !empty($extName) ? ' (' . trim($extName, '、') . ')' : '';
            $results['sj_' . $cKey] = [
                'name' => $yName,
                'titles' => ['name' => '年代', 'major' => '明细'],
                'fixTitleField' => 'name',
                'brief' => '',
                'baseInfos' => array_values($yDatas),
            ];
        }
        //print_r($results);exit();
        return $results;
    }

    /*public function formatBaikeDatas()
    {
        $base = $this->config->get('knowledge.knowledge_path') . '编年史/';
        $baikeFile = $base . '/annals/baike.php';
        //var_dump($baikeFile);
        $datas = [];//require($baikeFile);
        $datas = (array) $datas;
        $sPath = '/data/log/tmp/annals/';
        $files = scandir($sPath);
        //print_r($files);exit();
        foreach ($files as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            if ($file != 'bc2_1.json') {
                //continue;
            }
            $sFile = $sPath . $file;

            $sDatas = file_get_contents($sFile);
            $sDatas = json_decode($sDatas, true);
            $lDatas = $sDatas['data'] ?? [];
            $lDatas = $lDatas['list'] ?? [];
            foreach ($lDatas as $lData) {
                $baseStr = $lData['lemmaTitle'] ?? '';
                $extStr = $lData['lemmaId'] ?? '';
                $year = str_replace(['年', '公元前', '公元'], ['', '-', ''], $baseStr);
                $baikeUrl = 'https://baike.baidu.com/item/' . $baseStr . '/' . $extStr;
                if (!isset($datas[$year])) {
                    $datas[$year] = $baikeUrl;
                    //var_dump($baikeUrl);
                }
            }
            //print_r($sDatas);
        }
        foreach ($datas as $key => $data) {
            $info = $this->getModelObj('chronology')->where(['orderlist' => $key])->first();
            if (empty($info)) {
                continue;
            } else {
                var_dump($info['code'] . '-' . $info['name'] . '-' . $key . '-' . $data);
                $info->baidu_url = $data;
                $info->save();
            }
        }
        exit();
        ksort($datas);
        print_r($datas);exit();
        $str = var_export($datas, true);
        $str = "<?php return {$str};";
        file_put_contents($baikeFile, $str);
        //print_R($datas);
        return $datas;
    }*/
}
