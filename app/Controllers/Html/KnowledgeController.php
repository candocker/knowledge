<?php

namespace ModuleKnowledge\Controllers\Html;

class KnowledgeController extends AbstractController
{
    public function home()
    {
        $results = $this->getBookServiceObj()->_getVolumeBooks('all');
        $datas = [
            'tdkData' => ['title' => '图书分类-图书在线阅读，鲁迅全集、汉译学史名著'],
            'sortBooks' => $results,
        ];
        return $this->customView('book.home', $datas);
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
        $datas = [];
        return $this->customView('wiki', $datas);
    }

    public function testView($view)
    {
        $datas = [];
        return $this->customView($view, $datas);
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

    protected function viewPath()
    {
        return 'knowledge';
    }
}
