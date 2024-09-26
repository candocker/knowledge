<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

class BookService extends AbstractService
{
    public function _getVolumeBooks($pointCatalog = '', $withBooks = true)
    {
        //$where = ['catalog_code' => 'classical'];
        $where = ['catalog_code' => $pointCatalog];
        $bookVolumes = $this->getModelObj('bookVolume')->where($where)->orderBy('orderlist', 'desc')->get();
        $results = [];
        foreach ($bookVolumes as $bookVolume) {
            $sortData = $bookVolume->toArray();
            if ($withBooks) {
                $bookListings = $this->getModelObj('bookListing')->where(['catalog_volume_id' => $bookVolume['id']])->orderBy('serial', 'asc')->get();
                $sortData['books'] = [];
                foreach ($bookListings as $bookListing) {
                    $sortData['books'][] = $bookListing->bookInfo->toArray();
                }
            }
            $results[] = $sortData;
        }

        return $results;
    }

    public function _bookDetail($bookCode)
    {
        $bookInfo = $this->getModelObj('book')->where(['code' => $bookCode])->first();
        if (empty($bookInfo)) {
            exit('no book');
        }
        $chapterInfos = $this->getModelObj('chapter')->where(['book_code' => $bookCode])->orderBy('serial', 'asc')->get();
        $chapterDatas = [];
        foreach ($chapterInfos as $cInfo) {
            $chapterDatas[] = [
                'name' => $cInfo['name'],
                'code' => $cInfo['code'],
                'chapter_type' => $cInfo['chapter_type'],
                'book_code' => $cInfo['book_code'],
                'id' => $cInfo['id'],
                'chapterId' => $cInfo['id'],
            ];
        }
        $bookData = $bookInfo->toArray();
        $figure = false;//$bookInfo->formatAuthorData();
        $catalogDatas = $this->getModelObj('bookListing')->where(['book_code' => $bookCode])->get();
        $bookData['categoryName'] = '';
        foreach ($catalogDatas as $catalogData) {
            $bookData['categoryName'] .= $catalogData->catalogInfo['name'] . ',';
        }
        $bookData['coverUrl'] = $bookInfo->coverUrl;
        $bookData['figure']= $figure;
        $datas = [
            'bookData' => $bookData,
            'chapterDatas' => $chapterDatas,
            'relateChapters' => $this->getRelateChapters(['book_code' => $bookData['code'], 'serial' => 0]),
        ];
        return $datas;
    }

    public function getRelateChapters($chapterInfo)
    {
        $where = ['book_code' => $chapterInfo['book_code']];
        $pre = $this->getModelObj('chapter')->where($where)->where('serial', '<', $chapterInfo['serial'])->orderBy('serial', 'desc')->first();
        $next = $this->getModelObj('chapter')->where($where)->where('serial', '>', $chapterInfo['serial'])->orderBy('serial', 'asc')->first();
        return [
            'pre' => $pre,
            'next' => $next,
        ];
    }

    public function getChapterDetail($bookCode, $chapterCode, $returnType = 'array')
    {
        //$bookCode = 'hgjxbbb';
        //$chapterCode = '249';
        $datas = $this->_bookDetail($bookCode);
        $chapterInfo = $this->getModelObj('chapter')->where(['book_code' => $bookCode, 'code' => $chapterCode])->first();
        $datas['currentChapterData'] = $chapterInfo->toArray();

        $contents = $this->getChapterContents($chapterInfo);
        //print_r($contents);exit();
        if ($returnType == 'string') {
            $contents = implode('<p style="line-height:10px"><br /></p>', $contents);
            //$contents = implode('', $contents);
        }
        //print_r($contents);exit();
        $datas['contents'] = $contents;
        $datas['relateChapters'] = $this->getRelateChapters($chapterInfo);
        //print_r($datas);exit();
        return $datas;
    }

    public function getChapterContents($chapter, $withWrap = true)
    {
        $file = $this->_getChapterFile($chapter);
        $contents = require($file);

        $contents = $this->_formatChapterContents($contents, $withWrap);
        return $contents;
    }

    public function _formatChapterContents($contents, $withWrap)
    {
        $results = [];
        foreach ($contents as $key => $datas) {
            if ($key == 'chapters') {
                foreach ($datas as $subChapter) {
                    foreach ($subChapter as $cKey => $subData) {
                        $elemValue = $this->_formatPointElem($cKey, $subData);
                        $results = array_merge($results, (array) $elemValue);
                    }
                }
            } else {
                $elemValue = $this->_formatPointElem($key, $datas);
                $results = array_merge($results, (array) $elemValue);
            }
        }
        return $results;
    }

    public function _formatPointElem($elem, $values)
    {
        if ($elem == 'title') {
            return "<div style='color:blue; text-align: center;'><b>{$values}</b></div>";
        }
        if ($elem == 'author') {
            return "<div style='color:red; text-align: right;'><b>{$values}</b></div>";
        }
        if ($elem == 'description' || $elem == 'section') {
            return "<div style='color:green; text-align: center;'>{$values}</div>";
        }
        if ($elem == 'ask') {
            $tmpStr = implode('<br />', $values);
            return "<div style='color:red; '>{$tmpStr}</div>";
        }
        if ($elem == 'img') {
            $imgUrl = $values;
            if (strpos($imgUrl, 'http') === false) {
                $imgUrl = 'http://39.106.102.45/' . $values;
            }
            return "<div style='text-align: center'><img width='50%' height='50%' src='{$imgUrl}'/></div>";
        }
        if ($elem == 'endphrase') {
            $tmpStr = implode('<br />', (array) $values);
            return "<div style='color:green; text-align: right;'>{$tmpStr}</div>";
        }
        if ($elem == 'notes') {
            $tmpResult = [];
            foreach ($values as $value) {
                $tmpResult[] = '<span class="commentinner" style="display: ; color:#3949ab; font-weight:normal; text-decoration:underline; font-style:oblique; font-size:14px;">' . $value . '</span>';
            }
            return $tmpResult;
        }
        if ($elem == 'websource') {
            foreach ($values as $showValue => $value) {
                $tmpResult[] = '<a href="' . $value . '" target="blank">' . $showValue . '</a>';
            }
            return $tmpResult;
        }

        return is_string($values) ? $values : implode('<br />', $values);
    }

    public function _getChapterFile($chapter)
    {
        $bookPath = $chapter->book->fullPath;
        $file = "{$bookPath}{$chapter['code']}.php";
        if (!file_exists($file)) {
            $this->resource->throwException(400, '章节文件不存在-' . $file);
        }
        return $file;
    }
}
