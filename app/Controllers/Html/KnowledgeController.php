<?php

namespace ModuleKnowledge\Controllers\Html;

class KnowledgeController extends AbstractController
{
    public function entrance($navCode = '', $subCode = '')
    {
        $results = $this->getBookServiceObj()->_getVolumeBooks('all');
        $datas = [
            'tdkData' => ['title' => '知识库'],
            'sortBooks' => $results,
        ];
        $navs = require(self_app_path($this->getAppCode(), '/resources/formatdata/nav.php'));
        $datas = $navs;
        if (!empty($subCode)) {
            $isMobile = $this->isMobile(true);
            $method = "_{$navCode}Datas";
            $datas['currentBigNavCode'] = $navCode;
            $datas['currentNavCode'] = $subCode;
            $datas['isMobile'] = $isMobile;

            $service = $this->getSubjectServiceObj();
            $dDatas = $service->formatPointDatas($navCode, $subCode, $isMobile);
            $datas[$navCode . 'Datas'] = $dDatas;//require(self_app_path($this->getAppCode(), "/resources/formatdata/{$navCode}-{$subCode}.php"));
        } else {
            $datas['detailDatas'] = require(self_app_path($this->getAppCode(), '/resources/formatdata/homedetail.php'));
        }
        //print_r($datas);exit();
        return $this->customView('develop-single', $datas);
        //\Storage::disk('local')->put('views/' . request()->path(), $view->render());
        return $view;
    }

    public function bookList($bookCode = null)
    {
        $datas = $this->getBookServiceObj()->_bookDetail($bookCode, true);
        return $this->customView('book.list', $datas);
    }

    public function bookDetail($bookCode, $chapterCode)
    {
        $datas = $this->getBookServiceObj()->getChapterDetail($bookCode, $chapterCode);
        return $this->customView('book.detail', $datas);
    }

    public function wikiDetail($type, $code)
    {
        $topNavs = $this->getBookServiceObj()->getBookCatalogs(null);
        $results = $this->getBookServiceObj()->getVolumeBookListings($topNavs['currentNav'], null);
        $datas = array_merge($topNavs, $results);
        $datas['detailData'] = $this->getSubjectServiceObj()->getPointDetail($type, $code);
        return $this->customView('develop-single', $datas);
    }

    public function viewDevelop($view)
    {
        $topNavs = $this->getBookServiceObj()->getBookCatalogs(null);
        $results = $this->getBookServiceObj()->getVolumeBookListings($topNavs['currentNav'], null);
        $datas = array_merge($topNavs, $results);
        return $this->customView('develop-' . $view, $datas);
    }

    public function testView($view)
    {
        $topNavs = $this->getBookServiceObj()->getBookCatalogs(null);
        $results = $this->getBookServiceObj()->getVolumeBookListings($topNavs['currentNav'], null);
        $datas = array_merge($topNavs, $results);
        return $this->customView($view, $datas, 'metronicsource');
    }

    public function figure($projectCode = null, $groupCode = null)
    {
        $service = $this->getSubjectServiceObj();
        $topNavs = $service->getSubjectSorts('figure', $projectCode);
        $results = $service->getGroupDatas($topNavs['currentNav'], $groupCode);
        $results = array_merge($topNavs, $results);
        return $this->customView('gather', $results);
    }

    public function history($projectCode = null, $groupCode = null)
    {
        $service = $this->getSubjectServiceObj();
        $topNavs = $service->getSubjectSorts('history', $projectCode);
        $results = $service->getGroupDatas($topNavs['currentNav'], $groupCode);
        $results = array_merge($topNavs, $results);
        //print_r($results);
        return $this->customView('gather', $results);
    }

    public function bookstore($catalogCode = null, $volumeId = null)
    {
        $topNavs = $this->getBookServiceObj()->getBookCatalogs($catalogCode);
        $results = $this->getBookServiceObj()->getVolumeBookListings($topNavs['currentNav'], $volumeId);
        $results = array_merge($topNavs, $results);
        //print_r($results);
        return $this->customView('gather', $results);
    }

    public function formatPointData($navCode, $subCode)
    {
        $service = $this->getSubjectServiceObj();
        $service->formatPointDatas($navCode, $subCode);
    }

    protected function viewPath()
    {
        return 'knowledge';
    }
}
