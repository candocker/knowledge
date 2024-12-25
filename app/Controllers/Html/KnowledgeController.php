<?php

namespace ModuleKnowledge\Controllers\Html;

class KnowledgeController extends AbstractController
{
    public function ajaxRequest($navCode, $subCode)
    {
        $isMobile = $this->isMobile(true);
        $datas = $this->getSubjectServiceObj()->getPointDetail($navCode, $subCode, $isMobile);
        return $this->customView('modal-ajax', $datas);
    }

    public function entrance($navCode = '', $subNavCode = '')
    {
        $navs = require(self_app_path($this->getAppCode(), '/resources/formatdata/nav.php'));
        $datas = $navs;
        if (empty($navCode)) {
            $dDatas = require(self_app_path($this->getAppCode(), '/resources/formatdata/homedetail.php'));
            $dDatas['viewCode'] = 'simple';
            $datas['detailDatas'] = $dDatas;
            return $this->customView('develop-single', $datas);
        }

        $bigNav = $navs['topNavs'][$navCode];
        $datas['currentBigNavCode'] = $navCode;

        list($midCode, $subCode) = strpos($subNavCode, '_') !== false ? explode('_', $subNavCode) : [$subNavCode, ''];
        $currentNav = $bigNav['subDatas'][$midCode];
        $datas['currentNavCode'] = $midCode;
        $tdkTitle = $currentNav['name'] . '-' . $bigNav['name'];
        if (!empty($subCode)) {
            $datas['currentSubCode'] = $subCode;
            $currentNav = $currentNav['subDatas'][$subCode];
            $tdkTitle = $currentNav['name'] . '-' . $tdkTitle;
        }

        $datas['tdkData'] = ['title' => $tdkTitle];

        $isMobile = $this->isMobile(true);
        $method = "_{$navCode}Datas";
        $datas['isMobile'] = $isMobile;

        $service = $this->getSubjectServiceObj();
        if (in_array($navCode, ['wghistory', 'figure', 'zghistory', 'culture'])) {
            $dDatas = $service->formatSubjectDatas($currentNav, $isMobile);
        } else {
            $dDatas = $service->formatPointDatas($navCode, $currentNav, $isMobile);
        }
        $datas['detailDatas'] = $dDatas;
        //print_r($datas);exit();
        return $this->customView('develop-single', $datas);
        //\Storage::disk('local')->put('views/' . request()->path(), $view->render());
        return $view;
    }

    public function bookList($bookCode = null)
    {
        $service = $this->getBookServiceObj();
        $datas = $service->_bookDetail($bookCode, true);
        $datas['chapterDatas'] = $service->getBookChapterDatas($datas['bookData']);
        $datas['tdkData'] = ['title' => $datas['bookData']['name'] . '-' . '经典古籍阅读'];
        return $this->customView('book.list', $datas);
    }

    public function bookDetail($bookCode, $chapterCode)
    {
        $datas = $this->getBookServiceObj()->getChapterDetail($bookCode, $chapterCode);
        return $this->customView('book.detail', $datas);
    }

    public function askKnowledgeDetail($code, $detail)
    {
        $service = $this->getSubjectServiceObj();
        $datas = $service->getKnowledgeDetailContent($code, $detail);
        return $this->customView('ajax-page', $datas);
    }

    public function askKnowledge($code = null)
    {
        $service = $this->getSubjectServiceObj();
        $knowledge = $service->_knowledgeData($code);

        $navs = require(self_app_path($this->getAppCode(), '/resources/formatdata/nav.php'));
        $datas = $navs;
        $datas['knowledge'] = $knowledge;
        $datas['detailDatas'] = $service->getKnowledgeDetailDatas($knowledge);
        //print_R($datas);exit();
        $datas['tdkData'] = ['title' => $knowledge['name'] . '-' . '知识库'];
        return $this->customView('askwiki', $datas);
    }

    public function wikiDetail($type, $code)
    {
        $isMobile = $this->isMobile(true);
        $datas = require(self_app_path($this->getAppCode(), '/resources/formatdata/nav.php'));
        $datas['detailDatas'] = $this->getSubjectServiceObj()->getPointDetail($type, $code, $isMobile);
        //print_r($datas);
        return $this->customView('develop-single', $datas);
    }

    public function viewDevelop($view)
    {
        $topNavs = $this->getBookServiceObj()->getBookCatalogs(null);
        $results = $this->getBookServiceObj()->getVolumeBookListings($topNavs['currentNav'], null);
        $datas = array_merge($topNavs, $results);
        return $this->customView('develop-' . $view, $datas);
    }

    public function testView($view)
    {
        $topNavs = $this->getBookServiceObj()->getBookCatalogs(null);
        $results = $this->getBookServiceObj()->getVolumeBookListings($topNavs['currentNav'], null);
        $datas = array_merge($topNavs, $results);
        return $this->customView($view, $datas, 'metronicsource');
    }

    public function figure($projectCode = null, $groupCode = null)
    {
        $service = $this->getSubjectServiceObj();
        $topNavs = $service->getSubjectSorts('figure', $projectCode);
        $results = $service->getGroupDatas($topNavs['currentNav'], $groupCode);
        $results = array_merge($topNavs, $results);
        return $this->customView('gather', $results);
    }

    public function history($projectCode = null, $groupCode = null)
    {
        $service = $this->getSubjectServiceObj();
        $topNavs = $service->getSubjectSorts('history', $projectCode);
        $results = $service->getGroupDatas($topNavs['currentNav'], $groupCode);
        $results = array_merge($topNavs, $results);
        //print_r($results);
        return $this->customView('gather', $results);
    }

    /*public function bookstore($catalogCode = null, $volumeId = null)
    {
        $topNavs = $this->getBookServiceObj()->getBookCatalogs($catalogCode);
        $results = $this->getBookServiceObj()->getVolumeBookListings($topNavs['currentNav'], $volumeId);
        $results = array_merge($topNavs, $results);
        //print_r($results);
        return $this->customView('gather', $results);
    }*/

    public function formatPointData($navCode, $subCode)
    {
        $service = $this->getSubjectServiceObj();
        $service->formatPointDatas($navCode, $subCode);
    }

    public function houseLoan()
    {
        $this->viewPre();
        $datas = $this->getSubjectServiceObj()->myLoan();
        $gTitles = ['利率', '月数', '每月额度', '起始月', '截止月', '本金', '利息', '总计'];
        $dTitles = ['序号', '月份', '本金', '利息', '月度', '剩余本金'];
        $results = $gathers = $details = $currentDetails = [];
        //$details = ['titles' => $dTitles, 'name' => '明细'];
        //$currentDetails = ['titles' => $dTitles, 'name' => '当前周期明细'];
        $gathers = ['titles' => $gTitles, 'name' => '利率明细'];
        foreach ($datas['results'] as $data) {
            $gData = [];
            $gData[] = $data['base']['interestRate'];
            $gData[] = $data['base']['loanNum'];
            $gData[] = $data['gatherData']['monthlyPaymentValue'];
            $gData[] = $data['gatherData']['firstMonth'];
            $gData[] = $data['gatherData']['endMonth'];
            $gData[] = $data['gatherData']['principalTotal'];
            $gData[] = $data['gatherData']['interestTotal'];
            $gData[] = $data['gatherData']['monthlyPaymentTotal'];
            $gathers['infos'][] = $gData;

            $fInfos = [];
            foreach ($data['infos'] as $info) {
                $fInfos[] = [
                    $info['month'],
                    $info['monthValue'],
                    $info['principal'],
                    $info['interest'],
                    $info['monthlyPayment'],
                    $info['remainingAmount'],
                ];
            }
            $fName = "{$data['base']['interestRate']}|{$data['base']['loanNum']}|{$data['gatherData']['principalTotal']}|{$data['gatherData']['interestTotal']}|{$data['gatherData']['monthlyPaymentTotal']}";
            if ($data['gatherData']['running']) {
                $currentDetails['cDetails'] = [
                    'titles' => $dTitles,
                    'name' => $fName,
                    'infos' => $fInfos,
                ];
            }
            $details[] = [
                'titles' => $dTitles,
                'name' => $fName,
                'infos' => $fInfos,
            ];
        }
        $tgData = $datas['totalGatherData'];
        //print_r($tgData);exit();
        $totalData = [
            'titles' => ['已完结', '负债', '总计', '占比'],
            'name' => '汇总',
            'infos' => [
                [$tgData['monthNumDealed'], $tgData['monthNum'], $tgData['monthNumTotal'], (round($tgData['monthNumDealed'] / $tgData['monthNumTotal'], 3) * 100) . '%'],
                [$tgData['principalDealed'], $tgData['principal'], $tgData['principalTotal'], (round($tgData['principalDealed'] / $tgData['principalTotal'], 3) * 100) . '%'],
                [$tgData['interestDealed'], $tgData['interest'], $tgData['interestTotal'], (round($tgData['interestDealed'] / $tgData['interestTotal'], 3) * 100) . '%'],
                [$tgData['monthlyPaymentDealed'], $tgData['monthlyPayment'], $tgData['monthlyPaymentTotal'], (round($tgData['monthlyPaymentDealed'] / $tgData['monthlyPaymentTotal'], 3) * 100) . '%'],
            ],
        ];

        $results = [
            'tdkData' => ['title' => 'title'],
            'commonFixed' => array_merge(['totalData' => $totalData, 'gathers' => $gathers], $currentDetails, $details),
        ];
        //print_r($results);exit();
        //print_r($datas); exit();
        //$view = view('simple.loan', ['datas' => $datas]);
        $view = view('simple.simple', ['datas' => $results]);
        return $view;
    }

    protected function viewPath()
    {
        return 'knowledge';
    }
}
