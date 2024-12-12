<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

trait BookstoreTrait
{
    public function getBookCatalogs($catalogCode)
    {
        $sorts = $this->getRepositoryObj('bookCatalog')->_sortKeyDatas();
        $sortStr = implode(',', array_keys($sorts));
        $infos = $this->getModelObj('bookCatalog')->orderByRaw("FIND_IN_SET(sort, '{$sortStr}') asc")->orderBy('orderlist', 'desc')->get();
        $topNavs = [];
        $currentBigNavCode = $currentNavCode = $currentNav = $firstNav = '';
        foreach ($infos as $info) {
            $sortCode = $info['sort'];
            $subData = $info->toArray();
            $cCode = $subData['code'];
            $subData['url'] = "/bookstore-{$cCode}";
            $subData['knowledge_path'] = $info->fullKnowledgePath;
            if (!isset($topNavs[$sortCode])) {
                $topNavs[$sortCode] = ['name' => $sorts[$sortCode], 'subDatas' => [$subData]];
            } else {
                $topNavs[$sortCode]['subDatas'][] = $subData;
            }
            if ($cCode == $catalogCode) {
                $currentBigNavCode = $sortCode;
                $currentNavCode = $cCode;
                $currentNav = $subData;
            }
            if (empty($firstNav)) {
                $firstNav = $subData;
            }
        }
        $results = [
            'currentBigNavCode' => $currentBigNavCode ?: $firstNav['sort'],
            'currentNavCode' => $currentNavCode ?: $firstNav['code'],
            'currentNav' => $currentNav ?: $firstNav,
            'topNavs' => $topNavs,
        ];
        return $results;
    }

    public function getVolumeBookListings($catalog, $volumeId = null)
    {
        $catalogCode = $catalog['code'];

        $volumes = $this->getModelObj('bookVolume')->where(['catalog_code' => $catalogCode])->orderBy('orderlist', 'asc')->get();
        $firstVolume = $currentLeftNav = $currentLeftNavCode = false;
        $vDatas = [];
        foreach ($volumes as $volume) {
            $vId = $volume['id'];
            $vData = $volume->toArray();
            $vData['code'] = $vId;
            if (empty($firstVolume)) {
                $firstVolume = $vData;
            }
            if ($vId == $volumeId) {
                $currentLeftNavCode = $vId;
                $currentLeftNav = $vData;
            }
            $vData['url'] = "#showelem-{$vData['id']}"; //"/bookstore-{$catalog['code']}-{{$vData['id']}"
            $vData['showUrl'] = $vData['knowledge_path'] ? "/wiki-volume-{$vData['id']}.html" : '';
            $vData['bookListings'] = $this->getBookListings($vId);
            $vData['extTables'] = $this->getExtTableDatas($catalog, $volume);
            $vDatas[$vId] = $vData;
        }

        $leftNavs = $catalog;
        $leftNavs['subDatas'] = array_values($vDatas);

        $currentLeftNav = $currentLeftNav ?: $firstVolume;
        $results['leftNavs'] = $leftNavs;
        $results['currentLeftNavCode'] = $currentLeftNavCode ?: $firstVolume['id'];
        $results['currentLeftNav'] = $currentLeftNav;
        $results['tableTitles'] = $this->bookTableTitle($catalog, $currentLeftNav);
        return $results;
    }

    public function getBookListings($volumeId)
    {
        $results = [];
        $listings = $this->getModelObj('bookListing')->where(['catalog_volume_id' => $volumeId])->get();
        foreach ($listings as $listing) {
            $book = $listing->bookInfo ? $listing->bookInfo->toArray() : [];
            $bData = array_merge($listing->toArray(), $book);
            if (isset($bData['code']) && !empty($bData['code'])) {
                $showUrl = "/wiki-book-{$bData['code']}.html";
                $bData['name'] = "<a href='{$showUrl}' >{$bData['name']}</a>";
            }
            $results[] = $bData;
        }
        return $results;
    }

    public function bookTableTitle($catalog, $volume)
    {
        if ($catalog['sort'] == 'scholarism') {
            return [
                'name' => '书名',
                'author' => '作者',
                'nationality' => '国家',
                'translator' => '译者',
            ];
        }
        return [
            'name' => '书名', //'online' => '在线阅读',
        ];
    }

    public function getExtTableDatas($catalog, $volume)
    {
        $cTables = $vTables = [];
        if ($catalog['knowledge_path']) {
            $cTables = require($catalog['knowledge_path'] . '/tables.php');
        }
        if ($volume->full_knowledge_path) {
            $file = $volume->full_knowledge_path . '/tables.php';

            $vTables = file_exists($file) ? require($file) : [];
        }
        return array_merge(array_values($cTables), array_values($vTables));
    }
}
