<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

trait BookstoreTrait
{
    public function getBookCatalogs()
    {
        $sorts = $this->getRepositoryObj('bookCatalog')->_sortKeyDatas();
        $sortStr = implode(',', array_keys($sorts));
        $infos = $this->getModelObj('bookCatalog')->orderByRaw("FIND_IN_SET(sort, '{$sortStr}') asc")->get();
        $results = [];
        foreach ($infos as $info) {
            $sortCode = $info['sort'];
            $subData = $info->toArray();
            if (!isset($results[$sortCode])) {
                $results[$sortCode] = ['name' => $sorts[$sortCode], 'subDatas' => [$subData]];
            } else {
                $results[$sortCode]['subDatas'][] = $subData;
            }
        }
        return $results;
    }

    public function getVolumeBookListings($catalogCode = null, $volumeId = null)
    {
        $catalogCode = $catalogCode ?: 'classical';
        $catalog = $this->getModelObj('bookCatalog')->where(['code' => $catalogCode])->first();
        $leftNavs = $catalog->toArray();

        $volumes = $this->getModelObj('bookVolume')->where(['catalog_code' => $catalogCode])->get();
        $firstVolumeId = $currentVolumeId = false;
        $vDatas = [];
        foreach ($volumes as $volume) {
            $vId = $volume['id'];
            if (empty($firstVolumeId)) {
                $firstVolumeId = $vId;
            }
            if ($vId == $volumeId) {
                $currentVolumeId = $vId;
            }
            $vDatas[$vId] = $volume->toArray();
        }
        $leftNavs['subDatas'] = array_values($vDatas);

        $currentVolumeId = $currentVolumeId ?: $firstVolumeId;
        $results['leftNavs'] = $leftNavs;
        $results['currentBigSort'] = $catalog['sort'];
        $results['currentCatalog'] = $catalog;
        $results['currentSort'] = $catalogCode;
        $results['currentVolumeId'] = $currentVolumeId;
        $results['currentVolume'] = $vDatas[$currentVolumeId];
        $results['bookListings'] = $this->getBookListings($currentVolumeId);
        $results['tableTitles'] = $this->bookTableTitle($vDatas[$currentVolumeId]);
        return $results;
    }

    public function getBookListings($volumeId)
    {
        $results = [];
        $listings = $this->getModelObj('bookListing')->where(['catalog_volume_id' => $volumeId])->get();
        foreach ($listings as $listing) {
            $book = $listing->bookInfo ? $listing->bookInfo->toArray() : [];
            $results[] = array_merge($listing->toArray(), $book);
        }
        return $results;
    }

    public function bookTableTitle($volume)
    {
        return [
            'name' => '书名', //'online' => '在线阅读',
        ];
    }
}
