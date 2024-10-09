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

    public function _bookDetail($bookCode, $withRelate = true)
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
                'serial' => $cInfo['serial'],
                'description' => $cInfo['description'],
                'title' => $cInfo['title'],
                'id' => $cInfo['id'],
                'chapterId' => $cInfo['id'],
            ];
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
            'chapterDatas' => $chapterDatas,
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
        if ($returnType == 'array') {
            $contents = $this->_formatChapterContents($contents);
        }
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

    public function _formatChapterContents($contents)
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

    public function formatChapterTreeDatas($chapters, $level = 2)
    {
        $top = $big = $small = $common = '';
        $types = [
            'top' => '',
            'big' => '',
            'small' => '',
            //'common' => '',
        ];
        $tmps = [];
        $tmpChapters = [];
        foreach ($chapters as $chapter) {
            $cId = $chapter['id'];
            $tmpChapters[$cId] = $chapter;
            $cType = $chapter['chapter_type'];
            if ($cType == 'top') {
                $types['top'] = $cId;
                $types['big'] = '';
            } elseif ($cType == 'big') {
                $types['big'] = $cId;
                $types['small'] = '';
            } elseif ($cType == 'small') {
                $types['small'] = $cId;
            } else {
                //$tmps[implode('-', $types)][] = $chapter;
                $tmps[] = array_merge($chapter, $types);
            }
        }
        //print_r($tmps);exit();
        $results = [];
        foreach ($tmps as $key => $tInfo) {
            $topId = $tInfo['top'];
            $topData = $tmpChapters[$topId] ?? [];
            $bigId = $tInfo['big'];
            $bigData = $tmpChapters[$bigId] ?? [];
            $smallId = $tInfo['small'];
            $smallData = $tmpChapters[$smallId] ?? [];
            if ($level == 2) {
                $fKey = $topId . '-' . $bigId . '-' . $smallId;
                if (isset($results[$fKey])) {
                    $results[$fKey]['subInfos'][] = $tInfo;
                } else {
                    $results[$fKey] = [
                        'subInfos' => [],
                        'topData' => $topData,
                        'bigData' => $bigData,
                        'smallData' => $smallData,
                        'subInfos' => [$tInfo],
                    ];
                }
            }
            if ($level == 3) {
                $fKey = $topId;
                $sKey = $bigId . '-' . $smallId;
                if (isset($results[$fKey])) {
                    if (isset($results[$fKey]['secondDatas'][$sKey])) {
                        $results[$fKey]['secondDatas'][$sKey]['subInfos'][] = $tInfo;
                    } else {
                        $results[$fKey]['secondDatas'][$sKey] = [
                            'bigData' => $bigData,
                            'smallData' => $smallData,
                            'subInfos' => [$tInfo],
                        ];
                    }
                } else {
                    $results[$fKey] = [
                        'topData' => $topData,
                        'secondDatas' => [$sKey => [
                            'bigData' => $bigData,
                            'smallData' => $smallData,
                            'subInfos' => [$tInfo],
                        ]],
                    ];
                }
            }
        }
        return $results;
    }
}
