<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

use Framework\Baseapp\Models\AbstractModel as AbstractModelBase;

class AbstractModel extends AbstractModelBase
{
    protected $connection = 'knowledge';

    protected function getAppcode()
    {
        return 'knowledge';
    }

    public function figureInfo()
    {
        return $this->hasOne(Figure::class, 'code', 'figure_code');
    }

    public function getFullKnowledgePathAttribute()
    {
        $base = $this->config->get('knowledge.knowledge_path');
        return $this->knowledge_path ? $base . $this->knowledge_path : '';
    }

    public function formatBaseData($baseData, $isMobile)
    {
        $data = $this->_formatBaseData($isMobile);
        if (empty($baseData)) {
            return $data;
        }
        $baseData['infos'] = array_merge($data['infos'] ?? [], $baseData['infos'] ?? []);
        $baseData['headerPicUrl'] = $data['headerPicUrl'] ?? '';
        return $baseData;
    }

    public function _formatBaseData($isMobile)
    {
        return [];
    }

    /*public function getDateinfo($type, $result = 'format')
    {
        $keyField = $this->getKeyField();
        $where = ['type' => $type, 'info_type' => $this->table, 'info_key' => $this->$keyField];
        $info = $this->getModelObj('dateinfo')->where($where)->first();
        if ($result == 'full') {
            if (empty($info)) {
                \Log::info('no-info-' . serialize($this->toArray()));
            }
            return $info ? $info->toArray() : [];
        }
        $result = [
            'source' => $info ? $info->formatDateinfo() : '',
            'show' => $info ? $info->formatDateinfo('show') : '',
            'info' => $info ? $info->toArray() : [],
        ];
        return $result;
    }

    public function getStartEnd()
    {
        $repository = $this->getRepositoryObj('dateinfo');
        $typeDatas = $repository->getKeyValues('accurate');

        $start = $this->getDateinfo('start', 'full');
        $end = $this->getDateinfo('end', 'full');
        if (empty($start) ||empty($end)) {
            print_r($this->toArray());
            return ['ageStr' => '', 'startStr' => '', 'endStr' => ''];
        }
        $age = $end['accurate'] == 'running' ? '-' : '';
        $age = empty($age) ? $start['accurate'] == 'unknown' || $end['accurate'] == 'unknown' ? '未知' : $end['year'] - $start['year'] + 1 : $age;
        $startStr = empty($start['year']) ? '-' : "{$start['year']} / {$start['month']} / {$start['day']}";
        $startStr = ($start['accurate'] ? $typeDatas[$start['accurate']] . ' ' : '') . $startStr;

        $endStr = empty($end['year']) ? '-' : "{$end['year']} / {$end['month']} / {$end['day']}";
        $endStr = ($end['accurate'] ? $typeDatas[$end['accurate']] . ' ' : '') . $endStr;

        return [
            'timeSpan' => intval($age),
            'startStr' => '起始时间:' . $startStr,
            'endStr' => '截止时间:' . $endStr,
        ];
    }*/
}
