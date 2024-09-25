<?php

namespace ModuleKnowledge\Controllers\Html;

class KnowledgeController extends AbstractController
{
    public function home()
    {
        $this->viewPre();
        $results = $this->getBookServiceObj()->_getVolumeBooks('all');
        $datas = [
            'tdkData' => ['title' => '图书分类-图书在线阅读，鲁迅全集、汉译学史名著'],
            'sortBooks' => $results,
        ];
        $view = view('knowledge.bookhome', ['datas' => $datas]);
        //\Storage::disk('local')->put('views/' . request()->path(), $view->render());
        return $view;
    }

    public function bookList($bookCode = null)
    {
        $this->viewPre();
        $datas = $this->getBookServiceObj()->_bookDetail($bookCode);
        return view('knowledge.booklist', ['datas' => $datas]);
    }

    public function bookDetail($bookCode, $chapterCode)
    {
        $this->viewPre();
        $datas = $this->getBookServiceObj()->getChapterDetail($bookCode, $chapterCode);
        return view('knowledge.bookdetail', ['datas' => $datas]);
    }

    public function gatherData()
    {
        $this->viewPre();
        $datas = [
            'tdkData' => ['title' => '图书分类-图书在线阅读，鲁迅全集、汉译学史名著'],
        ];
        $view = view('knowledge.gather', ['datas' => $datas]);
        return $view;
    }

    public function getBookServiceObj()
    {
        return $this->getServiceObj('book');
    }
}
