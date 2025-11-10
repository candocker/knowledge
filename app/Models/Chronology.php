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
        $figureDatas = $this->getFigureDatas();
        //print_r($figureDatas);exit();
        if (!empty($figureDatas)) {
            $detailDatas['commonFixTableBirthDeath'] = $figureDatas;
        }
        $periodDatas = $this->getModelObj('periodYear')->getPointPeriodYearDatas($this->orderlist, $this->name);
        if (!empty($periodDatas)) {
            $detailDatas['commonFixTablePeriod'] = $periodDatas;
        }

        $affairTypes = $this->getModelObj('affair')->getAffairTypes();
        $affairDatas = $this->getAffairDatas();
        if (isset($affairDatas['keypoint'])) {
            $detailDatas['commonFixTableKeypoint'] = [
                'topName' => $affairTypes['keypoint'],
                'keypoint' => [
                    'name' => '',
                    'titles' => ['name' => '标题', 'major' => '简介'],
                    'fixTitleField' => 'name',
                    'brief' => '',
                    'baseInfos' => $affairDatas['keypoint'],
                ],
            ];
            unset($affairDatas['keypoint']);
        }
        if (empty($affairData)) {
            return $detailDatas;
        }
        $affairDetails = [
            'topName' => '事件列表',
        ];

        foreach ($affairDatas as $aType => $infos) {
            $affairDetails[$aType] = [
                'name' => $affairTypes[$aType],
                'titles' => ['date' => '日期', 'major' => '简介'],
                'fixTitleField' => 'date',
                'brief' => '',
                'baseInfos' => $infos,
            ];
        }
        $detailDatas['commonFixTableAffair'] = $affairDetails;
        //print_r($detailDatas);exit();
        return $detailDatas;
    }

    public function getFigureDatas()
    {
        $birthFigures = $this->getModelObj('figure')->where('birth_year', $this->orderlist)->orderBy('birth_month')->orderBy('birth_day')->get();
        $birthNum = $birthFigures->count();
        $deathFigures = $this->getModelObj('figure')->where('death_year', $this->orderlist)->orderBy('death_month')->orderBy('birth_day')->get();
        $deathNum = $deathFigures->count();
        if (empty($birthNum) && empty($deathFigures)) {
            return [];
        }
        $results = ['topName' => '年度出生和逝世人物'];
        $aDates = [];
        foreach (['birth' => $birthFigures, 'death' => $deathFigures] as $type => $infos) {
            if ($infos->count() < 1) {
                continue;
            }
            $eTitle = $type == 'birth' ? '出生人物' : '逝世人物';
            $baseInfos = [];
            foreach ($infos as $info) {
                $dateInfo = $info->formatDate([$type]);
                $baseInfos[] = [
                    'date' => $dateInfo[$type]['monthDay2'],
                    'name' => "<a href='wiki-figure-{$info['code']}.html'>{$info->name}</a>",
                    'major' => $info['description'],
                ];
            }
            $results[$type] = [
                'name' => $eTitle,
                'titles' => ['date' => '日期', 'name' => '姓名', 'major' => '简介'],
                'fixTitleField' => 'date',
                'brief' => '',
                'baseInfos' => $baseInfos,
            ];
        }
        return $results;
    }

    public function getAffairDatas()
    {
        $affairs = $this->getModelObj('affair')->where('year', $this->orderlist)->orderBy('month')->orderBy('day')->get();
        if ($affairs->count() < 1) {
            return [];
        }

        $formatDatas = [];
        foreach ($affairs as $affair) {
            $dateInfo = $affair->foramtDataInfo();
            $brief = $affair->brief;
            if (!empty($affair['point_path'])) {
                $brief .= "<a href='/wiki-affair-{$affair['id']}.html'>详情</a>";
            }
            if (!empty($affair['baidu_url'])) {
                $brief .= "<a href='{$affair['baidu_url']}.html'>(百科)</a>";
            }
            $formatDatas[$affair['affair_type']][] = [
                'date' => $affair->dateInfo['monthDay2'],
                'title' => $affair->title,
                'major' => $brief,
            ];
        }
        return $formatDatas;
    }

    public function _formatBaseData($isMobile)
    {
        $centuryInfo = $this->getModelObj('century')->where(['code' => $this->century_code])->first();
        $pTitle = $this->baidu_url ? "<a href='{$this->baidu_url}'>{$this->name}</a>年" : $this->name . '年';

        $year = $this->orderlist;
        $cnYear = 2697 + $year;
        $pTitle .= "，黄帝纪年第{$cnYear}年。";

        $lunarString = $this->getChineseYear($year);

        $eranameStr = $this->getEranameStr();
        $brief = "<a href='/zghistory-hronicle'>编年史</a>/<a href='/wiki-century-{$this->century_code}.html'>{$centuryInfo['name']}</a>/";
        $brief .= "{$lunarString}{$eranameStr}";

        $result = [
            'tdkData' => ['title' => strip_tags($pTitle), 'description' => $brief],
            'pageData' => ['title' => $pTitle, 'brief' => $brief],
        ];
        return $result;
    }

    public function getEranameStr()
    {
        if (empty($this->period_status)) {
            return $this->period_brief;
        }

        $pyInfos = $this->getModelObj('periodYear')->where(['year' => $this->orderlist])->orderBy('show_type', 'desc')->orderBy('orderlist')->limit(5)->get();
        $str = '';
        foreach ($pyInfos as $pyInfo) {
            $str .= $pyInfo['title'] . '、';
        }
        $str = trim($str, '、');
        $this->period_brief = $str;
        $this->period_status = 0;
        $this->save();
        return $str;

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
