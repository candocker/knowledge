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
}
