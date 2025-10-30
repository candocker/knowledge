<?php

namespace ModuleKnowledge\Services;

trait FormatAnnalTrait
{
    public function getAnnalsFile($year)
    {
        $pre = '';
        if (strpos($year, 'BC') !== false) {
            $year = str_replace('BC', '', $year);
            $pre = 'BC';
        }
        $century = floor($year / 100) + 1;
        $century = $pre . $century;
        $ageNum = $year % 100;
        $age = floor($ageNum / 10);
        $base = $this->config->get('knowledge.knowledge_path') . '编年史/年表/';
        return $file = $base . $century . '/' . $age . '/' . $year . '.php';
    }

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

    public function formatBaikeDatas()
    {
        $base = $this->config->get('knowledge.knowledge_path') . '编年史/';
        $baikeFile = $base . '/annals/baike.php';
        //var_dump($baikeFile);
        $datas = require($baikeFile);
        $datas = (array) $datas;
        $sPath = '/data/log/tmp/annals/';
        $files = scandir($sPath);
        foreach ($files as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $sFile = $sPath . $file;

            $sDatas = file_get_contents($sFile);
            $sDatas = json_decode($sDatas, true);
            $lDatas = $sDatas['data'] ?? [];
            $lDatas = $lDatas['list'] ?? [];
            foreach ($lDatas as $lData) {
                $baseStr = $lData['lemmaTitle'] ?? '';
                $extStr = $lData['lemmaId'] ?? '';
                $year = str_replace(['年'], [''], $baseStr);
                $baikeUrl = 'https://baike.baidu.com/item/' . $baseStr . '/' . $extStr;
                if (!isset($datas[$year])) {
                    $datas[$year] = $baikeUrl;
                    //var_dump($baikeUrl);
                }
            }
            //print_r($sDatas);
        }
        ksort($datas);
        $str = var_export($datas, true);
        $str = "<?php return {$str};";
        file_put_contents($baikeFile, $str);
        //print_R($datas);
        return $datas;
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

    public function getCenturyDatas($century)
    {

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
        for ($i = -1046; $i <= 2025; $i++) {
            if ($i == 0) {
                continue;
            }

            $pre = $i < 0 ? 'bc' : '';
            $year = abs($i);
            $century = floor($year / 100) + 1;

            $key = 'sj_' . $pre . $century;
            if (!isset($yearInfos[$key])) {
                $preStr = $i < 0 ? '公元前' : '';
                $centuryStr = $preStr . $century . '世纪';
                $yearInfos[$key] = ['name' => $centuryStr];
            }
            $ageNum = $year % 100;
            $age = floor($ageNum / 10);
            if ($i <= -1000) {
                $ageName = "第{$age}年代";
            } else {
                $ageKey  = floor($age / 2);
                $ageName = $ageDatas[$ageKey];
            }
            $yCode = $i < 0 ? 'BC' . $year : $year;
            $yStr = $i < 0 ? '前' . $year : $year;
            $yStr = "<a href='/wiki-annals-{$yCode}.html'>{$yStr}</a>";
            $yearInfos[$key]['baseInfos'][$ageName][] = $yStr;
        }
        $baikeDatas = $this->_centuryDatas();
        //print_r($baikeDatas);exit();
        //print_r($yearInfos);exit();
        foreach ($yearInfos as $yKey => $yInfo) {
            $yName = $yInfo['name'];
            $yCode = str_replace(['sj_', 'bc'], ['', 'BC'], $yKey);
            $yName = "<a href='/wiki-century-{$yCode}.html'>{$yName}</a>";
            if (isset($baikeDatas[$yKey])) {
                $yName .= " (<a href='{$baikeDatas[$yKey]}'>百科</a>)";
            }
            $results[$yKey] = [
                'name' => $yName,
                'titles' => ['name' => '年代', 'major' => '明细'],
                'fixTitleField' => 'name',
            ];
            foreach ($yInfo['baseInfos'] as $aKey => $aInfos) {
                $results[$yKey]['baseInfos'][] = [
                    'name' => $aKey,
                    'major' => implode('、', $aInfos),
                ];
            }
        }
        //print_r($results);exit();
        return $results;
    }

    public function _centuryDatas()
    {
        return [
            '<a href="https://baike.baidu.com/item/年号/103411">年号<a>',
            //'<a href="h"><a>',
            'sj_bc8' => '<a href="https://baike.baidu.com/starmap/view?nodeId=cbfa87f1f54fede382e2e362">公元前8世纪年表<a>',
            'sj_bc7' => '<a href="https://baike.baidu.com/starmap/view?nodeId=570fd4bbf034988aebe3fc62&">公元前7世纪年表<a>',
            'sj_bc6' => '<a href="https://baike.baidu.com/starmap/view?nodeId=f9ba484ea27e9ef19e8afd62">公元前6世纪年表<a>',
            'sj_bc5' => '<a href="https://baike.baidu.com/starmap/view?nodeId=b7a9e6fb318bcdbb98f1fe62">公元前5世纪年表<a>',
            'sj_bc4' => '<a href="https://baike.baidu.com/starmap/view?nodeId=e1f2a8e89e3e514ecbbbff62">公元前4世纪年表<a>',
            'sj_bc3' => '<a href="https://baike.baidu.com/starmap/view?nodeId=0d89feb3d32dfffb574ef862">公元前3世纪年表<a>',
            'sj_bc2' => '<a href="https://baike.baidu.com/starmap/view?nodeId=f78312c88476b1e8f9fbf962">公元前2世纪年表<a>',
            'sj_bc1' => '<a href="https://baike.baidu.com/starmap/view?nodeId=70e3fa169bfdf40e15800b62">公元前1世纪年表<a>',
            'sj_' => '<a href=""><a>',
            'sj_' => '<a href=""><a>',
            'sj_' => '<a href=""><a>',
            'sj_4' => '<a href="https://baike.baidu.com/starmap/view?nodeId=56eafc2064b03d28246b4163">4世纪年表<a>',
            'sj_5' => '<a href="https://baike.baidu.com/starmap/view?nodeId=e361767637ee226b0c084063">5世纪年表<a>',
            'sj_6' => '<a href="https://baike.baidu.com/starmap/view?nodeId=693724282bad0a08a0384763">6世纪年表<a>',
            'sj_7' => '<a href="https://baike.baidu.com/starmap/view?nodeId=3b693b6b02cea638ecde4663">7世纪年表<a>',
            'sj_8' => '<a href="https://baike.baidu.com/starmap/view?nodeId=242a1308b1feeade411c4563">8世纪年表<a>',
            'sj_9' => '<a href="https://baike.baidu.com/starmap/view?nodeId=0c49bf38fc18471cea204463">9世纪年表<a>',
            'sj_' => '<a href=""><a>',
            'sj_11' => '<a href="https://baike.baidu.com/starmap/view?nodeId=a079f3de52daec20d6a44b63">11世纪年表<a>',
            'sj_' => '<a href=""><a>',
            'sj_' => '<a href=""><a>',
            'sj_' => '<a href=""><a>',
            'sj_15' => '<a href="https://baike.baidu.com/starmap/view?nodeId=300006d98a17416e093d5362">15世纪年表<a>',
            'sj_16' => '<a href="https://baike.baidu.com/starmap/view?nodeId=19986ed3bdaa0f3d67355262">16世纪年表<a>',
            'sj_17' => '<a href="https://baike.baidu.com/starmap/view?nodeId=7192586ef4f961352a1a5162">17世纪年表<a>',
            'sj_18' => '<a href="https://baike.baidu.com/starmap/view?nodeId=472f163d9bf12c1af5e45062">18世纪年表<a>',
            'sj_19' => '<a href="https://baike.baidu.com/starmap/view?nodeId=078f17f92541fc13cb636562">19世纪年表<a>',
            'sj_20' => '<a href="https://baike.baidu.com/starmap/view?nodeId=ab5d18cee63dd285fa136662">20世纪年表<a>',
            'sj_' => '<a href="https://baike.baidu.com/starmap/view?nodeId=c400d7cf0e3a22d3041ad461">21世纪00年代<a>',
            'sj_' => '<a href="https://baike.baidu.com/starmap/view?nodeId=c88e91fea717021a8490db61">21世纪10年代<a>',
            'sj_' => '<a href="https://baike.baidu.com/starmap/view?nodeId=8ebf3bd386de829084e0da61">21世纪20年代<a>',
        ];
    }
}
