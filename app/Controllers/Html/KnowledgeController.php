<?php

namespace ModuleKnowledge\Controllers\Html;

class KnowledgeController extends AbstractController
{
    public function ajaxRequest($navCode, $subCode)
    {
        $isMobile = $this->isMobile(true);
        $datas = $this->getSubjectServiceObj()->getPointDetail($navCode, $subCode, $isMobile);
        return $this->customView('modal-baseinfo', $datas);
    }

    public function entrance($navCode = '', $subNavCode = '')
    {
        $navs = require(self_app_path($this->getAppCode(), '/resources/formatdata/nav.php'));
        $datas = $navs;
        if (empty($navCode)) {
            $dDatas = require(self_app_path($this->getAppCode(), '/resources/formatdata/homedetail.php'));
            $dDatas['viewCode'] = 'simple';
            $datas['detailDatas'] = $dDatas;
            return $this->customView('develop-single', $datas);
        }

        $bigNav = $navs['topNavs'][$navCode];
        $datas['currentBigNavCode'] = $navCode;

        list($midCode, $subCode) = strpos($subNavCode, '_') !== false ? explode('_', $subNavCode) : [$subNavCode, ''];
        $currentNav = $bigNav['subDatas'][$midCode];
        $datas['currentNavCode'] = $midCode;
        $tdkTitle = $currentNav['name'] . '-' . $bigNav['name'];
        if (!empty($subCode)) {
            $datas['currentSubCode'] = $subCode;
            $currentNav = $currentNav['subDatas'][$subCode];
            $tdkTitle = $currentNav['name'] . '-' . $tdkTitle;
        }

        $datas['tdkData'] = ['title' => $tdkTitle];

        $isMobile = $this->isMobile(true);
        $method = "_{$navCode}Datas";
        $datas['isMobile'] = $isMobile;

        $service = $this->getSubjectServiceObj();
        $dDatas = $service->formatPointDatas($navCode, $currentNav, $isMobile);
        $datas['detailDatas'] = $dDatas;
        //print_r($datas);exit();
        return $this->customView('develop-single', $datas);
        //\Storage::disk('local')->put('views/' . request()->path(), $view->render());
        return $view;
    }

    public function bookList($bookCode = null)
    {
        $service = $this->getBookServiceObj();
        $datas = $service->_bookDetail($bookCode, true);
        $datas['chapterDatas'] = $service->getBookChapterDatas($datas['bookData']);
        $datas['tdkData'] = ['title' => $datas['bookData']['name'] . '-' . '经典古籍阅读'];
        return $this->customView('book.list', $datas);
    }

    public function bookDetail($bookCode, $chapterCode)
    {
        $datas = $this->getBookServiceObj()->getChapterDetail($bookCode, $chapterCode);
        return $this->customView('book.detail', $datas);
    }

    public function wikiDetail($type, $code)
    {
        $isMobile = $this->isMobile(true);
        $datas = require(self_app_path($this->getAppCode(), '/resources/formatdata/nav.php'));
        $datas['detailDatas'] = $this->getSubjectServiceObj()->getPointDetail($type, $code, $isMobile);
        //print_r($datas);
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
        var_export($topNavs);
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

    /*public function bookstore($catalogCode = null, $volumeId = null)
    {
        $topNavs = $this->getBookServiceObj()->getBookCatalogs($catalogCode);
        $results = $this->getBookServiceObj()->getVolumeBookListings($topNavs['currentNav'], $volumeId);
        $results = array_merge($topNavs, $results);
        //print_r($results);
        return $this->customView('gather', $results);
    }*/

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
