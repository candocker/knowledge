<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

trait SubjectKnowledgeTrait
{
    public function _knowledgeData($code)
    {
        $info = $this->getModelObj('knowledge')->where(['code' => $code])->first();
        return $info->toArray();
    }

    public function getKnowledgeDetailContent($code, $dCode)
    {
        $knowledge = $this->getModelObj('knowledge')->where(['code' => $code])->first();
        $detailInfo = $this->getModelObj('knowledgeDetail')->where(['knowledge_code' => $knowledge['code'], 'code' => $dCode])->first();
        $datas['currentDetailData'] = $detailInfo->toArray();

        $file = $this->_getDetailFile($knowledge, $detailInfo);
        $contents = require($file);
        $contents = $this->_formatChapterContents($contents);
        //print_r($contents);exit();
        $datas['contents'] = $contents;
        return $datas;
    }

    public function getKnowledgeDetailDatas($info)
    {
        $infos = $this->getModelObj('knowledgeDetail')->where(['knowledge_code' => $info['code']])->get();
        $infos = $infos->toArray();
        $infos = $this->formatChapterTreeDatas($infos, 3);
        //print_r($infos);exit();
        return $infos;
    }

    public function formatSubjectDatas($currentNav, $isMobile)
    {
        $detailDatas = require($this->_specialKnowledgePath($currentNav['code']));
        $pointDatas = $this->getPointSubjectDatas($currentNav);
        $detailDatas = array_merge($detailDatas, $pointDatas);
        //print_r($detailDatas);exit();
        return $detailDatas;
    }

    public function _getKnowledgeDatas($categories)
    {
        $results = [];
        $knowledges = $this->getModelObj('knowledge')->whereIn('category', $categories)->orderBy('orderlist', 'asc')->get();
        foreach ($knowledges as $knowledge) {
            $vData = [
                'name' => $knowledge['name'],
                'volumeId' => $knowledge['id'],
                'url' => "/ask-{$knowledge['code']}.html",
            ];
            $results[] = $vData;
        }
        return $results;
    }

    public function _getDetailFile($knowledge, $detail)
    {
        $knowledgePath = $knowledge->fullPath;
        $file = "{$knowledgePath}{$detail['code']}.php";
        if (!file_exists($file)) {
            $this->resource->throwException(400, '知识文件不存在-' . $file);
        }
        return $file;
    }

    public function getPointSubjectDatas($currentNav)
    {
        $code = $currentNav['code'];
        $method = "_{$code}PointSubjectDatas";
        $datas = [];
        if (method_exists($this, $method)) {
            $datas = $this->$method($currentNav);
        }
        return $datas;
    }

    public function _confucianismPointSubjectDatas($currentNav)
    {
        $data['simpleTableDatas'][] = [
            'name' => $currentNav['name'],
            'infos' => array_chunk($this->_getKnowledgeDatas([$currentNav['code']]), 3),
        ];
        return $data;
    }

    public function _zgdynastyPointSubjectDatas($currentNav)
    {
        $dynasties = $this->getModelObj('dynasty')->where(['sort' => 'top'])->orderBy('orderlist', 'asc')->get();
        $titles = [];
        foreach ($dynasties as $dynasty) {
            $tName = $dynasty['name'];
            if (!empty($dynasty['knowledge_path'])) {
                $tName = "<a href='/wiki-dynasty-{$dynasty['code']}.html'>{$tName}</a>";
            }
            if (!empty($dynasty['baidu_url'])) {
                $tName .= "( <a href='{$dynasty['baidu_url']}'>百科</a> )";
            }
            $titles[] = $tName;
        }

        $infos = [];
        $dynasties = $this->getModelObj('dynasty')->get();
        $i = 0;
        foreach ($dynasties as $dynasty) {
            if ($i == count($titles)) {
                $i = 1;
                $infos[] = $subInfos;
                $subInfos = [];
            }
            $subInfos[] = $dynasty['name'];
            $i++;
        }
        $data['commonFixedDatas'][] = [
            'name' => '中国朝代',
            'titles' => $titles,
            'infos' => $infos,
        ];
        //print_r($data);exit();
        return $data;
        //$titles = $this->getRepositoryObj('dynasty')->
    }
}
