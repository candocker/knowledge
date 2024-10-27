<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

class SubjectService extends AbstractService
{
    use SubjectFormatDataTrait;

    public function getSubjectSorts($subjectSort, $subjectCode)
    {
        $sorts = $this->getModelObj('subjectSort')->where('sort', $subjectSort)->orderBy('orderlist', 'desc')->get();
        $topNavs = [];
        $currentBigNavCode = $currentNavCode = $currentNav = $firstSubject = '';
        //var_dump($currentBigNavCode);
        foreach ($sorts as $sort) {
            $sCode = $sort['code'];
            $sData = $sort->toArray();
            $infos = $this->getModelObj('subject')->where(['subject_sort' => $sCode])->orderBy('orderlist', 'desc')->get();
            $subDatas = [];
            foreach ($infos as $info) {
                $subData = $info->toArray();
                $pCode = $subData['code'];
                if ($pCode == $subjectCode) {
                    $currentBigNavCode = $info['subject_sort'];
                    $currentNavCode = $pCode;
                    $currentNav = $subData;
                }
                if (empty($firstSubject)) {
                    $firstSubject = $subData;
                }
                $subData['url'] = "/{$subjectSort}-{$pCode}";
                $subDatas[] = $subData;
            }
            $sData['subDatas'] = $subDatas;
            $topNavs[$sCode] = $sData;
        }
        $results = [
            'currentBigNavCode' => $currentBigNavCode ?: $firstSubject['subject_sort'],
            'currentNavCode' => $currentNavCode ?: $firstSubject['code'],
            'currentNav' => $currentNav ?: $firstSubject,
            'topNavs' => $topNavs,
        ];
        return $results;
    }

    public function getGroupDatas($subject, $groupCode)
    {
        $subjectCode = $subject['code'];

        $infos = $this->getModelObj('groupSubject')->where(['subject_code' => $subjectCode])->orderBy('orderlist', 'desc')->get();;
        $subDatas = [];
        $firstGroup = $currentLeftNav = $currentLeftNavCode = false;
        foreach ($infos as $info) {
            $gData = $info->groupInfo->toArray();
            $gCode = $gData['code'];
            if (empty($firstGroup)) {
                $firstGroup = $gData;
            }
            if ($gCode == $groupCode) {
                $currentLeftNavCode = $gCode;
                $currentLeftNav = $gData;
            }
            $gData['url'] = "#showelem-{$gData['code']}";
            $subDatas[] = $gData;
        }
        $leftNavs = $subject;
        $leftNavs['subDatas'] = $subDatas;
        $currentLeftNav = $currentLeftNav ?: $firstGroup;
        $results = [
            'leftNavs' => $leftNavs,
            'currentLeftNavCode' => $currentLeftNavCode ?: $firstGroup['code'],
            'currentLeftNav' => $currentLeftNav,
            'tableTitles' => $this->groupTableTitle($subject, $currentLeftNav),
        ];
        return $results;
    }

    public function groupTableTitle($subject, $group)
    {
        if ($subject['code'] == 'scholarism') {
            return [
                'name' => '书名',
                'author' => '作者',
                'nationality' => '国家',
                'translator' => '译者',
            ];
        }
        return [
            'name' => '名称', //'online' => '在线阅读',
        ];
    }

    public function getPointDetail($type, $code)
    {
        if ($type == 'special') {
            $detailDatas = require($this->_specialKnowledgePath($code));
            return $detailDatas;
        }
        $info = $this->getPointKnowledgeInfo($type, $code);
        $detailDatas = $this->getKnowledgeDetail($info);
        $method = "_{$type}FormatDetail";
        if (method_exists($this, $method)) {
            $detailDatas = $this->$method($detailDatas, $info);
        }
        return $detailDatas;
    }

    public function getPointKnowledgeInfo($type, $code)
    {
        $params = [
            'figure' => ['mCode' => 'figure', 'field' => 'code'],
            'book' => ['mCode' => 'book', 'field' => 'code'],
            'group' => ['mCode' => 'group', 'field' => 'code'],
            'volume' => ['mCode' => 'book_volume', 'field' => 'id'],
        ];
        $param = $params[$type];
        $info = $this->getModelObj($param['mCode'])->where([$param['field'] => $code])->first();
        if (empty($info)) {
            $this->resource->throwException(400, '信息不存在-' . $code);
        }
        return $info;
    }

    public function getKnowledgeDetail($info)
    {
        $knowledgePath = $info->full_knowledge_path;
        if (empty($knowledgePath)) {
            //$this->resource->throwException(400, '知识文件不存在-' . $info['name']);
            return [];
        }
        return require($knowledgePath . '.php');
    }

    public function _figureFormatDetail($detailDatas, $info)
    {
        $baseData = $detailDatas['baseData'] ?? [];
        if (empty($baseData)) {
            $baseData = [
                'infos' => [
                    '姓名' => $info['name'],
                    '百科' => $info['baidu_url'] ?: "<a href='{$info['baidu_url']}'>百度百科</a>",
                    '详情' => $info['knowledge_path'] ?: "<a href='/wiki-book-{$info['code']}.html'>详情</a>",
                ],
                'brief' => $info['name'],
                'desc' => $info['description'],
            ];
        }
        $baseData['headerPicUrl'] = $info->photoUrl;
        $detailDatas['baseData'] = $baseData;
        return $detailDatas;
    }

    public function _bookFormatDetail($detail, $info)
    {
        $baseData = $detailDatas['baseData'] ?? [];
        if (empty($baseData)) {
            $baseData = [
                'infos' => [
                    '名称' => $info['name'],
                    '百科' => !empty($info['baidu_url']) ? "<a href='{$info['baidu_url']}'>百度百科</a>" : '',
                    '详情' => "<a href='/wiki-book-{$info['code']}.html'>详情</a>",
                ],
                'brief' => $info['name'],
                'desc' => $info['description'],
            ];
        }
        $baseData['headerPicUrl'] = $info->coverUrl;
        $detailDatas['baseData'] = $baseData;
        return $detailDatas;
    }

    public function _specialKnowledgePath($sCode = null)
    {
        $base = $this->config->get('knowledge.knowledge_path');
        $datas = [
            'luxunworks' => $base . 'books/鲁迅著作/works.php',
            'scholarism' => $base . 'books/学术名著/scholarism.php',
        ];
        return is_null($sCode) ? $datas : $datas[$sCode];
    }
}
