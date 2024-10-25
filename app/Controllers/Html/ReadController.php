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
        $datas['tdkData']['title'] = '经典古籍在线阅读';
        //print_R($datas);exit();
        return $this->customView('list', $datas);
    }

    public function bookCatalogue($code = null)
    {
        $service = $this->getBookServiceObj();
        $datas = $service->_bookDetail($code, false);
        $bookData = $datas['bookData'];
        $level = $bookData['code'] == 'shijing' ? 3 : 2;
        $datas['chapterDatas'] = $service->getBookChapterDatas($bookData);
        $datas['chapterDatas'] = $service->formatChapterTreeDatas($datas['chapterDatas'], $level);

        $datas = array_merge([
            'tdkData' => ['title' => $bookData['name'] . '-' . '经典古籍阅读'],
            'name' => $bookData['name'],
            'brief' => $bookData['description'],
        ], $datas);
        //print_r($datas); exit();

        $pageCodes = [
            'yijing' => 'yijing',
            'shijing' => 'shijing',
        ];
        $datas['pageCode'] = $pageCodes[$code] ?? 'common';
        return $this->customView('list', $datas);
    }

    public function bookShow($bookCode, $chapterCode)
    {
        $datas = $this->getBookServiceObj()->getChapterDetail($bookCode, $chapterCode, 'source');
        $bookData = $datas['bookData'];
        if (isset($bookData['noteType']) && $bookData['noteType'] == 'inner') {
            $datas['contents'] = $this->formatInnerNote($datas['contents']);
        }

        $datas['bookCode'] = $bookCode;

        $pageCodes = [
            'yijing' => 'yijing',
            'shijing' => 'shijing',
            'chuci' => 'shijing'
        ];
        $datas['pageCode'] = $pageCodes[$bookCode] ?? 'common';
        //$datas['pageCode'] = in_array($bookCode, ['shijing', 'yijing']) ? $bookCode : 'common';
        return $this->customView('detail', $datas);
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
