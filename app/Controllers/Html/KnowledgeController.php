<?php

namespace ModuleKnowledge\Controllers\Html;

class KnowledgeController extends AbstractController
{
    public function ajaxRequest($navCode, $subCode)
    {
        $datas = $this->getSubjectServiceObj()->getPointDetail($navCode, $subCode);
        return $this->customView('modal-baseinfo', $datas);
    }

    public function entrance($navCode = '', $subCode = '')
    {
        $results = $this->getBookServiceObj()->_getVolumeBooks('all');
        $datas = [
            'tdkData' => ['title' => '知识库'],
            'sortBooks' => $results,
        ];
        $navs = require(self_app_path($this->getAppCode(), '/resources/formatdata/nav.php'));
        $datas = $navs;

        $isMobile = $this->isMobile(true);
        $method = "_{$navCode}Datas";
        $datas['currentBigNavCode'] = $navCode;
        $datas['isMobile'] = $isMobile;

        $service = $this->getSubjectServiceObj();
        if ($navCode == 'bookstore' && in_array($subCode, ['philosophy', 'history', 'politics', 'economics', 'language', 'otheracademic'])) {
            $datas['currentNavCode'] = 'shwhanyixueshu';
            $datas['currentSubCode'] = $subCode;
        } else {
            $datas['currentNavCode'] = $subCode;
            $datas['currentSubCode'] = '';
        }
        $dDatas = $service->formatPointDatas($navCode, $subCode, $isMobile);
        $datas['detailDatas'] = $dDatas;//require(self_app_path($this->getAppCode(), "/resources/formatdata/{$navCode}-{$subCode}.php"));
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
        $datas = require(self_app_path($this->getAppCode(), '/resources/formatdata/nav.php'));
        $datas['detailDatas'] = $this->getSubjectServiceObj()->getPointDetail($type, $code);
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
