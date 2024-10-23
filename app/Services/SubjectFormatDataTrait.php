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
        $method = '_' . $navCode . ucfirst($subCode);
        $datas = $this->$method();
        if ($navCode == 'onlineread' || $subCode == 'classical') {
            $detailDatas = [
                'simpleTableDatas' => $this->_formatTableDatas($datas, $isMobile),
            ];
            return $detailDatas;
        }
        return [];
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
                $subInfos[] = [
                    'name' => $book['name'],
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

    protected function _formatTableDatas($datas, $isMobile)
    {
        $num = $isMobile ? 2 : 5;
        foreach ($datas as & $data) {
            $i = 1;
            $key = 1;
            $newInfos = [];
            foreach ($data['infos'] as $info) {
                //$info['name'] .= strlen($info['name']);
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
