<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Models;

class Chronology extends AbstractModel
{
    protected $table = 'chronology';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getFullKnowledgePathAttribute()
    {
        $base = $this->config->get('knowledge.knowledge_path') . '编年史/年表/' . $this->century_code . '/';
        $year = abs($this->orderlist);
        $ageNum = $year % 100;
        $age = floor($ageNum / 10);
        return $base . $age . '/' . $year;
    }

    public function wrapDetailDatas($detailDatas)
    {
        unset($detailDatas['pageData']);
        return $detailDatas;
    }

    public function _formatBaseData($isMobile)
    {
        $centuryInfo = $this->getModelObj('century')->where(['code' => $this->century_code])->first();
        $pTitle = $this->baidu_url ? "<a href='{$this->baidu_url}'>{$this->name}</a>年" : $this->name . '年';

        $year = $this->orderlist;
        $cnYear = 2697 + $year;
        $pTitle .= "，黄帝纪年第{$cnYear}年。";

        $lunarString = $this->getChineseYear($year);

        $eranameStr = '';
        $eranameDatas = $this->getRepositoryObj('passport-user')->getPointCaches('annals_eraname');
        if (isset($eranameDatas[$year])) {
            $eranameStr = implode('、', $eranameDatas[$year]);
        }
        $brief = "<a href='/zghistory-hronicle'>编年史</a>/<a href='/wiki-century-{$this->century_code}.html'>{$centuryInfo['name']}</a>/";
        $brief .= "{$lunarString}{$eranameStr}";

        $result = [
            'tdkData' => ['title' => strip_tags($pTitle), 'description' => $brief],
            'pageData' => ['title' => $pTitle, 'brief' => $brief],
        ];
        return $result;
    }

    public function getChineseYear($year, $return = 'string')
    {
        // 天干
        $heavenlyStems = ['甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸'];
        // 地支
        $earthlyBranches = [
            '子' => '鼠', '丑' => '牛', '寅' => '虎', '卯' => '兔', '辰' => '龙', '巳' => '蛇',
            '午' => '马', '未' => '羊', '申' => '猴', '酉' => '鸡', '戌' => '狗', '亥' => '猪'
        ];
        $branchKeys = array_keys($earthlyBranches);

        $year = $year < 0 ? $year + 1 : $year;
        //var_dump($year);exit();
        $stemIndex = (($year - 4) % 10 + 10) % 10;
        $branchIndex = (($year - 4) % 12 + 12) % 12;
        $stemName = $heavenlyStems[$stemIndex];
        $branchName = $branchKeys[$branchIndex];
        $branchValue = $earthlyBranches[$branchName];
        if ($return = 'string') {
            return "农历{$stemName}{$branchName}年（{$branchValue}年）。";
        }
        return ['stemName' => $stemName, 'branchName' => $branchName, 'branchValue' => $branchValue];
    }
}
