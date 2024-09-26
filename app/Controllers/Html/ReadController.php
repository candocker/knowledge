<?php

namespace ModuleKnowledge\Controllers\Html;

class ReadController extends AbstractController
{
    public function readClassical()
    {
        $bookDatas = $this->getBookServiceObj()->_getVolumeBooks('classicalorder');
        $datas = [
            'name' => '经典古籍',
            'brief' => '儒家经典，道家经典，诸子著作',
            'pageCode' => 'home',
            'bookDatas' => $bookDatas,
        ];
        $datas['tdkData'] = $this->formatTdk();
        //print_R($datas);exit();
        return $this->customView('list', $datas);
    }

    public function bookCatalogue($code = null)
    {
        $datas = $this->getChapterInfos('book', $code, true);

        $pageCodes = [
            'yijing' => 'yijing',
            'shijing' => 'shijing',
            //'mengzi' => 'shijing',
            //'guwenguanzhi' => 'shijing'
        ];
        $bookData = $this->getBookInfos('book', $code);
        $datas['bookData'] = $bookData;
        $datas['pageCode'] = $pageCodes[$code] ?? 'common';//in_array($code, ['yijing', 'shijing']) ? $code : 'common';
        return $this->customView('list', $datas);
    }

    public function bookShow($bookCode, $chapterCode)
    {
        $bookData = $this->getBookInfos('book', $bookCode);
        $file = $this->getBasePath() . "books/{$bookCode}/{$chapterCode}.php";
        $datas = require($file);
        if (isset($bookData['noteType']) && $bookData['noteType'] == 'inner') {
            $datas = $this->formatInnerNote($datas);
        }
        $relateInfos = $this->getRelateInfo('book', $bookCode, $chapterCode);

        $datas['bookData'] = $bookData;
        $datas['bookCode'] = $bookCode;
        $datas = array_merge($relateInfos, $datas);
        $datas['tdkData'] = $this->formatTdk($datas);

        $pageCodes = [
            'yijing' => 'yijing',
            'shijing' => 'shijing',
            'chuci' => 'shijing'
        ];
        $datas['pageCode'] = $pageCodes[$bookCode] ?? 'common';
        //$datas['pageCode'] = in_array($bookCode, ['shijing', 'yijing']) ? $bookCode : 'common';
        return $this->customView('detail', $datas);
    }

    protected function getBookInfos($sort, $bookCode = null, $withTdk = false)
    {
        $bookListFile = $this->getBasePath() . $sort . 'list/index.php';
        $bookDatas = require($bookListFile);
        if (!empty($bookCode)) {
            foreach ($bookDatas['chapters'] as $chapter) {
                if (isset($chapter['books'][$bookCode])) {
                    return $chapter['books'][$bookCode];
                }
            }
        }

        if ($withTdk) {
            $bookDatas['tdkData'] = $this->formatTdk($bookDatas);
            return $bookDatas;
        }
        return $bookDatas;
    }

    protected function getChapterInfos($sort, $bookCode, $withTdk = false)
    {
        $bookData = $this->getBookInfos($sort, $bookCode);

        $chapterFile = $this->getBasePath() . $sort . "list/{$bookCode}.php";
        $chapterInfosFile = $this->getBasePath() . $sort . "list/{$bookCode}_catalogue.php";
        $chapterDatas = require($chapterFile);
        $chapterDatas['infos'] = require($chapterInfosFile);

        //print_r($chapterDatas);exit();
        $chapterDatas['tdkData'] = $this->formatTdk($bookData);
        $chapterDatas = array_merge($bookData, $chapterDatas);
        $chapterDatas['bookCode'] = $bookCode;
        return $chapterDatas;
    }

    protected function getRelateInfo($sort, $bookCode, $code, $types = ['pre', 'next'])
    {
        $chapters = $this->getChapterInfos($sort, $bookCode);
        $infos = $chapters['infos'];
        $keys = array_keys($infos);
        $cIndex = array_search($code, $keys);
        $results = $infos[$code];
        foreach ($types as $type) {
            $index = $type == 'pre' ? $cIndex - 1 : $cIndex + 1;

            if ($index < 0 || $index >= count($keys)) {
                $results[$type] = ['code' => '', 'name' => '没有了'];
            } else {
                $results[$type] = $infos[$keys[$index]];
            }
        }
        return $results;
    }

    protected function formatInnerNote($datas)
    {
        foreach ($datas['chapters'] as & $chapter) {
            $i = 0;
            $notes = $chapter['notes'] ?? [];
            $contents = $chapter['content'];
            foreach ($contents as & $content) {
                $mids = explode(')', $content);
                $newContents = [];
                foreach ($mids as $key => $mid) {
                    $index = $key + $i;
                    $note = $notes[$index] ?? '';
                    $note = substr($note, strpos($note, ')') + 1);
                    $note = $note ? '<span class="commentinner" style="display: none; color:#3949ab; font-weight:normal; text-decoration:underline; font-style:oblique;">' . $note . '</span>' : '';
                    $mid .= $key + 1 == count($mids) ? '' : ')' . $note;
                    $newContents[$index] = $mid;
                }
                $i += $key;
                //$content = '<strong class="comment">' . implode('', $newContents) . '</strong>';
                $content = implode('', $newContents);
            }
            $chapter['content'] = $contents;
        }
        return $datas;
    }

    protected function formatNav($datas)
    {
        $path = $this->request->path();
        $pos = strrpos($path, '-');
        $datas['bigNav'] = $pos !== false ? substr($path, 0, $pos) : $path;
        $datas['currentNav'] = $pos !== false ? substr($path, $pos + 1) : $path;
        return $datas;
    }

    protected function viewPath()
    {
        return 'read';
    }

    public function getBasePath()
    {
        return config('knowledge.material_path');
    }
}
