<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

trait SubjectBookTrait
{
    public function formatPointDatas($navCode, $subNav, $isMobile)
    {
        $subCode = $subNav['code'];
        $pageData = [];
        if (isset($subNav['withVolume'])) {
            $catalogCodes = $subNav['withVolume'] === true ? [$subCode] : $subNav['withVolume'];
            $datas = $this->_getVolumeBooks($catalogCodes, $subCode);
            $catalogInfos = $this->getModelObj('bookCatalog')->whereIn('code', $catalogCodes)->get();
            $pageTitle = $pageBrief = '';
            foreach ($catalogInfos as $cInfo) {
                $cTitle = $cInfo['title'] ?: $cInfo['name'];
                $pageTitle .= $cTitle . ' // ';
                $pageBrief .= $cInfo['brief'] . '  // ';
            }
            $pageData['title'] = trim($pageTitle, ' // ');
            $pageData['brief'] = trim($pageBrief, '  // ');
        } else {
            $method = '_' . $navCode . ucfirst($subCode);
            $datas = $this->$method($isMobile);
        }

        if ($navCode == 'bookstore' && in_array($subCode, ['luxun'])) {
            return $datas;
        }

        if (in_array($subCode, ['philosophy', 'history', 'politics', 'economics', 'language', 'otheracademic'])) {
            $pageData['title'] = $pageData['title'] . "-<a href='wiki-special-scholarism.html'>汉译世界学术名著丛书</a>";
            $detailDatas = ['simpleFixed' => $this->_formatTableDatas($datas, $navCode, $isMobile, true)];
        } else {
            $detailDatas = ['simpleTable' => $this->_formatTableDatas($datas, $navCode, $isMobile)];
        }
        $detailDatas['pageData'] = $pageData;
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

        $pageData = ['title' => '鲁迅著作诸版本', 'brief' => '鲁迅作品重要版本和发行脉络', 'url' => 'wiki-special-luxunworks.html'];
        return ['pageData' => $pageData, 'simpleFixed' => $results];
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

    public function _getVolumeBooks($catalogs, $subCode)
    {
        $results = [];
        $volumes = $this->getModelObj('bookVolume')->whereIn('catalog_code', $catalogs)->orderBy('orderlist', 'asc')->get();
        foreach ($volumes as $volume) {
            //$books = $this->getModelObj('bookListing')->where(['catalog_volume_id' => $volume['id']])->where('book_code', '<>', '')->orderBy('serial', 'asc')->get();
            $books = $this->getModelObj('bookListing')->where(['catalog_volume_id' => $volume['id']])->orderBy('serial', 'asc')->get();
            if ($books->count() <= 0) {
                continue;
            }
            //print_r($volume->toArray()); print_r($books->toArray());exit();
            $vData = [
                'name' => $volume['name'],
                'volumeId' => $volume['id'],
                'showUrl' => $volume['knowledge_path'] ? "/wiki-volume-{$volume['id']}.html" : '',
                'titles' => [],
            ];
            $subInfos = [];
            foreach ($books as $book) {
                $bInfo = $book->bookInfo;
                $bName = $book['name'] ?: $bInfo['name'];
                $nameExt = '';
                if (in_array($subCode, ['philosophy', 'history', 'politics', 'economics', 'language', 'otheracademic'])) {
                    $nameExt = $this->getBookFigureStr($book, $bInfo);
                }
                if (in_array($subCode, ['classical']) && $volume['id'] == 215) {
                    $nameExt = "(<a href='{$bInfo['baidu_url']}'>{$book['author']}</a>)";//{$book['brief']}卷
                }
                $subInfos[] = [
                    'name' => $bName,
                    'nameExt' => $nameExt,
                    'infoId' => $book['id'],
                    'bookCode' => $book['book_code'],
                ];
            }
            $vData['infos'] = $subInfos;
            $results[] = $vData;
        }
        return $results;
    }

    public function getBookFigureStr($bookListing, $book)
    {
        if (empty($book)) {
            return $bookListing['figure'];
        }
        $author = $book->authorData();
        if (empty($author)) {
            return $bookListing['figure'];
        }
        $nationalityStr = empty($book->nationality) ? '' : "({$book['nationality']})";
        return "  [ {$nationalityStr}<a href='/wiki-figure-{$author['code']}.html'>{$author['name']}</a> ]";
        print_r($book->toArray());
        print_r($author->toArray());exit();
    }

    protected function _formatTableDatas($datas, $navCode, $isMobile, $withFixed = false)
    {
        $num = $isMobile ? ($withFixed ? 4 : 2) : 3;
        foreach ($datas as & $data) {
            $i = 1;
            $key = 1;
            $newInfos = [];
            foreach ($data['infos'] as $info) {
                //$info['name'] .= strlen($info['name']);
                $bCode = $info['bookCode'];
                if ($navCode == 'onlineread') {
                    if (!empty($bCode)) {
                        //$url = $isMobile ? "http://book.canliang.wang/pages/book/info?book_code={$bCode}" : "/{$bCode}/list.html";
                        $url = "/{$bCode}/list.html";
                    } else {
                        $url = '';
                    }
                } else if ($navCode == 'bookstore-no') {
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
            if ($withFixed) {
                $data['fixed'] = $newInfos;
            }
        }
        return $datas;
    }

    /*protected function _writeOnlineFile($datas, $subCode)
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
    }*/
}
