<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

trait SubjectFormatDataTrait
{
    public function formatPointDatas($navCode, $subCode, $isMobile)
    {
        if (empty($subCode)) {
            $detailDatas = require(self_app_path($this->getAppCode(), '/resources/formatdata/homedetail.php'));
            $detailDatas['viewCode'] = 'simple';
            return $detailDatas;
        }
        if ($navCode == 'bookstore' && in_array($subCode, ['philosophy', 'history', 'politics', 'economics', 'language', 'otheracademic'])) {
            $datas = $this->_getVolumeBooks([$subCode]);
        } else {
            $method = '_' . $navCode . ucfirst($subCode);
            $datas = $this->$method($isMobile);
        }
        if ($navCode == 'bookstore' && in_array($subCode, ['luxun'])) {
            return $datas;
        }
        $detailDatas = [
            'simpleTableDatas' => $this->_formatTableDatas($datas, $navCode, $isMobile),
        ];
        return $detailDatas;
    }

    public function _bookstoreLuxun()
    {
        $catalogs = $this->getModelObj('bookCatalog')->where(['sort' => 'luxun'])->orderBy('orderlist', 'desc')->get();
        $results = [];
        foreach ($catalogs as $catalog) {
            $rData = ['name' => $catalog['name']];
            $titles = [];
            $bookNumMax = 0;
            $volumes = $this->getModelObj('bookVolume')->where(['catalog_code' => $catalog['code']])->orderBy('orderlist', 'desc')->get();
            $volumeInfos = [];
            foreach ($volumes as $volume) {
                $books = $this->getModelObj('bookListing')->where(['catalog_volume_id' => $volume['id']])->orderBy('serial', 'asc')->get();
                $bookInfos = [];
                foreach ($books as $book) {
                    $bName = $book['name'] ?: $book->bookInfo['name'];
                    $bCode = $book['book_code'];
                    $elem = [
                        'name' => $bName,
                        'infoId' => $book['id'],
                        'bookCode' => $bCode,
                        'url' => $bCode ? "/wiki-book-{$bCode}.html" : '',
                    ];
                    $bookInfos[] = $elem;
                }
                $vId = $volume['id'];
                $vName = $volume['name'];
                $titles[$vId] = $vName;
                $volumeInfos[$vId] = [
                    'name' => $vName,
                    'bookInfos' => $bookInfos,
                ];
                $bookNumMax = max($bookNumMax, count($bookInfos));
            }
            $rData['titles'] = $titles;
            $rData['bookNumMax'] = $bookNumMax;
            $rData['volumeInfos'] = $volumeInfos;
            $results[] = $rData;
        }
        $emptyElem = ['name' => '<span style="color:white;">占位符</span>', 'url' => ''];
        foreach ($results as & $result) {
            $simples = [];
            $iKey = 0;
            $maxNum = min(7, $result['bookNumMax'] + 1);
            foreach ($result['volumeInfos'] as $vData) {
                $books = $this->getModelObj('bookListing')->where(['catalog_volume_id' => $volume['id']])->orderBy('serial', 'asc')->get();
                $elem = ['name' => "<b style='color:red'>{$vData['name']}</b>", 'url' => ''];
                $simples[$iKey][] = $elem;
                $num = 1;
                foreach ($vData['bookInfos'] as $book) {
                    if ($num % $maxNum == 0) {
                        $iKey++;
                        $simples[$iKey][] = $emptyElem;
                        $num++;
                    }
                    $num++;
                    $simples[$iKey][] = $book;
                }
                $remain = $maxNum - count($simples[$iKey]);
                if ($remain > 0) {
                    for ($remain; $remain > 0; $remain--) {
                        $simples[$iKey][] = $emptyElem;
                    }
                }
                $iKey++;
            }
            $result['infos'] = $simples;

            $fixed = [];
            $fNum = $result['bookNumMax'];
            for ($fNum; $fNum > 0; $fNum--) {
                $currentFixed = [];
                foreach ($result['titles'] as $vId => $vName) {
                    $index = $result['bookNumMax'] - $fNum;
                    $currentFixed[] = $result['volumeInfos'][$vId]['bookInfos'][$index] ?? $emptyElem;
                }
                $fixed[] = $currentFixed;
            }
            $result['fixed'] = $fixed;
        }
        return ['simpleFixedDatas' => $results];
    }

    public function _bookstoreLuxunold()
    {
        $catalogs = $this->getModelObj('bookCatalog')->where(['sort' => 'luxun'])->orderBy('orderlist', 'desc')->get();
        $fixed = $simple = [];
        foreach ($catalogs as $catalog) {
            $rData = [
                'name' => $catalog['name'],
                'titles' => [],
                'volumeId' => '',
            ];
            $volumes = $this->getModelObj('bookVolume')->where(['catalog_code' => $catalog['code']])->orderBy('orderlist', 'desc')->get();
            $infos = [];
            $iKey = 0;
            foreach ($volumes as $volume) {
                $books = $this->getModelObj('bookListing')->where(['catalog_volume_id' => $volume['id']])->orderBy('serial', 'asc')->get();
                $elem = ['name' => "<b style='color:red'>{$volume['name']}</b>", 'url' => ''];
                $infos[$iKey][] = $elem;
                $num = 1;
                foreach ($books as $book) {
                    if ($num % 7 == 0) {
                        $iKey++;
                        $infos[$iKey][] = ['name' => '', 'url' => ''];
                        $num++;
                    }
                    $bName = $book['name'] ?: $book->bookInfo['name'];
                    $bCode = $book['book_code'];
                    $elem = [
                        'name' => $bName,
                        'infoId' => $book['id'],
                        'bookCode' => $bCode,
                        'url' => $bCode ? "/wiki-book-{$bCode}.html" : '',
                    ];
                    $num++;
                    $infos[$iKey][] = $elem;
                }
                $remain = 7 - count($infos[$iKey]);
                if ($remain > 0) {
                    for ($remain; $remain > 0; $remain--) {
                        $infos[$iKey][] = ['name' => '', 'url' => ''];
                    }
                }
                $iKey++;
            }
            $rData['infos'] = $infos;
            $simple[] = $rData;
        }
        //print_r($simple);exit();
        return ['simpleTableDatas' => $simple];
    }

    public function _onlinereadXueshu()
    {
        $sorts = [
            'britain' => '英国篇',
            'american' => '美国篇',
            'germany' => '德国篇',
            'france' => '法国篇',
            'china' => '中国篇',
            'other' => '其他学术',
        ];
        $results = [];
        foreach ($sorts as $sort => $sName) {
            //$books = $this->getModelObj('book')->where(['category' => $sort])->orderBy('serial', 'asc')->get();
            $books = $this->getModelObj('book')->where(['category' => $sort])->orderBy('orderlist', 'desc')->get();
            $vData = [
                'name' => $sName,
                'volumeId' => $sort,
                'titles' => ['name'],
            ];
            $subInfos = [];
            foreach ($books as $book) {
                $subInfos[] = [
                    'name' => $book['name'],
                    'infoId' => $book['id'],
                    'bookCode' => $book['code'],
                ];
            }
            $vData['infos'] = $subInfos;
            $results[] = $vData;
        }
        //var_export($results);exit();
        return $results;
    }

    public function _bookstoreOther()
    {
        return $this->_getVolumeBooks(['goodworks']);
    }

    public function _bookstoreClassical()
    {
        return $this->_getVolumeBooks(['classical']);
    }

    public function _onlinereadOther()
    {
        return $this->_getVolumeBooks(['goodworks']);
    }

    public function _onlinereadLuxun()
    {
        return $this->_getVolumeBooks(['luxunyanjiu', 'luxunsingle']);
    }

    public function _getVolumeBooks($catalogs)
    {
        $results = [];
        $volumes = $this->getModelObj('bookVolume')->whereIn('catalog_code', $catalogs)->orderBy('orderlist', 'asc')->get();
        foreach ($volumes as $volume) {
            $books = $this->getModelObj('bookListing')->where(['catalog_volume_id' => $volume['id']])->where('book_code', '<>', '')->orderBy('serial', 'asc')->get();
            if ($books->count() <= 0) {
                continue;
            }
            //print_r($volume->toArray()); print_r($books->toArray());exit();
            $vData = [
                'name' => $volume['name'],
                'volumeId' => $volume['id'],
                'titles' => ['name'],
            ];
            $subInfos = [];
            foreach ($books as $book) {
                $bName = $book['name'] ?: $book->bookInfo['name'];
                $subInfos[] = [
                    'name' => $bName,
                    'infoId' => $book['id'],
                    'bookCode' => $book['book_code'],
                ];
            }
            $vData['infos'] = $subInfos;
            $results[] = $vData;
        }
        return $results;
        //var_export($results);exit();
        return true;
        print_r($results);exit();
    }

    protected function _formatTableDatas($datas, $navCode, $isMobile)
    {
        $num = $isMobile ? 2 : 5;
        foreach ($datas as & $data) {
            $i = 1;
            $key = 1;
            $newInfos = [];
            foreach ($data['infos'] as $info) {
                //$info['name'] .= strlen($info['name']);
                $bCode = $info['bookCode'];
                if ($navCode == 'onlineread') {
                    $url = $isMobile ? "http://book.canliang.wang/pages/book/info?book_code={$bCode}" : "/{$bCode}/list.html";
                } else if ($navCode == 'bookstore') {
                    $url = 'javascript:;';
                    $info['modalUrl'] = "/ajax-book-{$bCode}.html";
                } else {
                    $url = "/wiki-book-{$bCode}.html";
                }
                $info['url'] = $url;
                $newInfos[$key][] = $info;
                if ($i % $num == 0) {
                    $key++;
                }
                $step = 1;
                /*if (strlen($info['name']) > 20) {
                    var_dump($info['name']);
                    $step = 2;
                }*/
                $i = $i + $step;
            }
            $data['infos'] = $newInfos;
        }
        return $datas;
    }

    protected function _writeOnlineFile($datas, $subCode)
    {
        $file = self_app_path($this->getAppCode(), '/resources/formatdata/onlineread-' . $subCode . '.php');
        if (file_exists($file)) {
        $oldDatas = require($file);
            $eDatas = [];
            foreach ($oldDatas as $oldData) {
                foreach ($oldData['infos'] as $oInfo) {
                    $eDatas = array_merge($eDatas, $oInfo);
                }
            }
        }
        $fStr = "<?php\nreturn [\n";
        foreach ($datas as $data) {
            $fStr .= "'{$data['volumeId']}' => [\n    'name' => '{$data['name']}',\n    'titles' => ['name'],\n    'infos' => [\n";
            $i = 1;
            foreach ($data['infos'] as $info) {
                $isClosed = false;
                if ($i % 2 == 1) {
                    $fStr .= "        [\n";
                }
                $key = $info['bookCode'] ?: $info['infoId'];
                $step = 1;
                $fStr .= "            '{$key}' => ['name' => '{$info['name']}', 'bookCode' => '{$info['bookCode']}'";//],\n";
                if (isset($eDatas[$key]) && isset($eDatas[$key]['colspan'])) {
                    $fStr .= ", 'colspan' => {$eDatas[$key]['colspan']}";
                    $step = $eDatas[$key]['colspan'];
                }
                $fStr .= "],\n";
                if ($i % 2 == 0) {
                    $fStr .= "        ],\n";
                    $isClosed = true;
                }
                $i = $i + $step;
            }
            if (!$isClosed) {
                $fStr .= "        ],\n";
            }
            $fStr .= "    ],\n],\n";
        }
        $fStr .= '];';
        file_put_contents($file, $fStr);
        return true;
        echo $fStr;
    }
}
