<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Century extends AbstractModel
{
    protected $table = 'century';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getFullKnowledgePathAttribute()
    {
        $base = $this->config->get('knowledge.knowledge_path');
        return $base . '编年史/年表/' . $this->code . '/base';
    }

    public function _formatBaseData($isMobile)
    {
        $pTitle = "<a href='/zghistory-hronicle'>编年史</a>-" . $this->name;
        if (!empty($this->baidu_url)) {
            $pTitle .= " (<a href='{$this->baidu_url}'>百科</a>)";
        }
        $result = [
            'tdkData' => ['title' => $this->name, 'description' => $this->brief],
            'pageData' => ['title' => $pTitle, 'brief' => $this->brief],
        ];
        return $result;
    }

    public function wrapDetailDatas($detailDatas)
    {
        $detailDatas['commonFixTable2'] = $this->_getYearDetails();
        return $detailDatas;
    }

    public function _getYearDetails()
    {
        $results = ['topName' => $this->name . '年份明细'];
        $ages = [
            '第一个十年', '第二个十年', '二十年代', '三十年代', '四十年代',
            '五十年代', '六十年代', '七十年代', '八十年代', '九十年代'
        ];
        $eranameDatas = $this->getRepositoryObj('passport-user')->getPointCaches('annals_eraname');
        $infos = $this->getModelObj('chronology')->where(['century_code' => $this->code])->orderBy('orderlist')->get();
        $aDates = [];
        foreach ($infos as $info) {
            $year = abs($info->orderlist);
            $remain = $year % 100;
            $age = floor($remain / 10);
            $eranameStr = isset($eranameDatas[$info->orderlist]) ? implode('、', $eranameDatas[$year]) : '';
            $aDatas[$age][] = [
                'name' => "<a href='/wiki-annals-{$info['code']}.html'>{$info['name']}</a>",
                'major' => $eranameStr,
            ];
        }
        foreach ($aDatas as $aKey => $infos) {
            $results['age_' . $aKey] = [
                'name' => $ages[$aKey],
                'titles' => ['name' => '年份', 'major' => '王朝帝王'],
                'fixTitleField' => 'name',
                'brief' => '',
                'baseInfos' => $infos,
            ];
        }
        return $results;
    }
}
