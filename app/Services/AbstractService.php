<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

use Framework\Baseapp\Services\AbstractService as AbstractServiceBase;

abstract class AbstractService extends AbstractServiceBase
{
    protected function getAppcode()
    {
        return 'knowledge';
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
            $cType = $chapter['chapter_type'] ?? $chapter['detail_type'];
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
        if ($elem == 'img_rid') {
            $rInfo = $this->getModelObj('resourceDetail')->where(['id' => $values])->first();
            $imgUrl = $rInfo ? $rInfo['filepath'] : '';
            if (strpos($imgUrl, 'http') === false) {
                $imgUrl = 'http://39.106.102.45/resource/' . $imgUrl;
            }
            return "<div style='text-align: center'><img width='50%' height='50%' src='{$imgUrl}'/></div>";
        }
        if ($elem == 'img') {
            $imgUrl = $values;
            //$baseName = urldecode(basename($imgUrl));
            //$info = $this->getModelObj('resourceDetail')->where('filepath', 'like', "%{$baseName}%")->first();
            //echo '    \'img_rid\' => ' . $info['id'] . ',' . "\n";
            //$infos = $this->getModelObj('resourceDetail')->where('filepath', 'like', "%{$baseName}%")->count();
            //var_dump($infos);
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
}
