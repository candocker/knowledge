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
        $detailDatas['simpleTableDatas'][] = [
            'name' => '儒学知识库',
            'infos' => array_chunk($this->_getKnowledgeDatas([$currentNav['code']]), 3),
        ];
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
}
