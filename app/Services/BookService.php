<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

class BookService extends AbstractService
{
    use BookstoreTrait;

    public function _getVolumeBooks($pointCatalog = '', $withBooks = true)
    {
        //$where = ['catalog_code' => 'otheracademic'];
        $where = ['catalog_code' => $pointCatalog];
        $bookVolumes = $this->getModelObj('bookVolume')->where($where)->orderBy('orderlist', 'desc')->get();
        $results = [];
        foreach ($bookVolumes as $bookVolume) {
            $sortData = $bookVolume->toArray();
            if ($withBooks) {
                $bookListings = $this->getModelObj('bookListing')->where(['catalog_volume_id' => $bookVolume['id']])->orderBy('serial', 'asc')->get();
                $sortData['books'] = [];
                foreach ($bookListings as $bookListing) {
                    if ($bookListing->bookInfo) {
                    $sortData['books'][] = $bookListing->bookInfo->toArray();
                    }
                }
            }
            $results[] = $sortData;
        }

        return $results;
    }

    public function getBookChapterDatas($bookData, $isMobile)
    {
        $chapterInfos = $this->getModelObj('chapter')->where(['book_code' => $bookData['code']])->orderBy('serial', 'asc')->get();
        $chapterDatas = [];
        foreach ($chapterInfos as $cInfo) {
            $chapterDatas[] = [
                'name' => $cInfo['name'],
                'code' => $cInfo['code'],
                'chapter_type' => $cInfo['chapter_type'],
                'book_code' => $cInfo['book_code'],
                'serial' => $cInfo['serial'],
                'description' => $cInfo['description'],
                'title' => $cInfo['title'],
                'author' => $cInfo['author'],
                'id' => $cInfo['id'],
                'url' => empty($cInfo['code']) ? '' : ($isMobile ? "http://book.canliang.wang/pages/book/reader?book_code={$cInfo['book_code']}&chapter_code={$cInfo['code']}" : "/{$cInfo['book_code']}/{$cInfo['code']}.html"),
                'chapterId' => $cInfo['id'],
            ];
        }
        return $chapterDatas;
    }

    public function _bookDetail($bookCode, $withRelate = true)
    {
        $bookInfo = $this->getModelObj('book')->where(['code' => $bookCode])->first();
        if (empty($bookInfo)) {
            exit('no book');
        }
        $bookData = $bookInfo->toArray();
        if ($bookData['is_ancientread']) {
            $extSettings = require(self_app_path($this->getAppCode(), '/resources/formatdata/ancientbook.php'));
            $bookData = $extSettings[$bookData['code']] ? array_merge($extSettings[$bookData['code']], $bookData) : $bookData;
        }
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
            'relateChapters' => $withRelate ? $this->getRelateChapters(['book_code' => $bookData['code'], 'serial' => 0]) : [],
        ];
        return $datas;
    }

    public function getRelateChapters($chapterInfo)
    {
        $where = ['book_code' => $chapterInfo['book_code']];
        $pre = $this->getModelObj('chapter')->where($where)->where('serial', '<', $chapterInfo['serial'])->orderBy('serial', 'desc')->first();
        $next = $this->getModelObj('chapter')->where($where)->where('serial', '>', $chapterInfo['serial'])->orderBy('serial', 'asc')->first();
        return [
            'pre' => $pre ? $pre->toArray() : [],
            'next' => $next ? $next->toArray() :[],
        ];
    }

    public function getChapterDetail($bookCode, $chapterCode, $returnType = 'array')
    {
        //$bookCode = 'hgjxbbb';
        //$chapterCode = '249';
        $datas = $this->_bookDetail($bookCode);
        $chapterInfo = $this->getModelObj('chapter')->where(['book_code' => $bookCode, 'code' => $chapterCode])->first();
        $datas['currentChapterData'] = $chapterInfo->toArray();

        $file = $this->_getChapterFile($chapterInfo);
        $contents = require($file);
        if ($returnType != 'array') {
            $contents = $this->_formatChapterContents($contents);
        }
        //print_r($contents);exit();
        if ($returnType == 'string') {
            $contents = implode('<p style="line-height:10px"><br /></p>', $contents);
            //$contents = implode('', $contents);
        }
        //print_r($contents);exit();
        $datas['contents'] = $contents;
        if ($bookCode == 'yijing') {
            $datas['contents'] = array_merge(unserialize($datas['currentChapterData']['brief']), $contents);
        }
        $datas['relateChapters'] = $this->getRelateChapters($chapterInfo);
        $datas['tdkData']['title'] = $datas['currentChapterData']['name'] . '-' . $datas['bookData']['name'];
        //print_r($datas);exit();
        return $datas;
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
