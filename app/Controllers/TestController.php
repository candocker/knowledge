<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Controllers;

use Swoolecan\Foundation\Helpers\CommonTool;
use Carbon\Carbon;

class TestController extends AbstractController
{
    public function test()
    {
        $request = $this->request;
        $inTest = config('app.inTest');
        if (empty($inTest)) {
            return $this->error(400, '非法请求');
        }
        $method = ucfirst($request->input('method', ''));
        $method = "_test{$method}";
        $this->$method($request);
        exit();
    }

    public function _testKing()
    {
        $infos = file('/tmp/a.php');
        $results = [];
        $titles = [];
        foreach ($infos as $info) {
            $tmp = explode("\t", $info);
            foreach ($tmp as $key => & $value) {
                $value = trim($value);
            }
            if (empty($titles)) {
                $titles = $tmp;
                continue;
            }
            //print_r($titles);
            //print_r($tmp);
            if (count($tmp) < 7) {
            //print_r($tmp);
            //continue;
            }
            $name = $tmp[2];
            $code = CommonTool::getSpellStr($name, '');
            //var_dump($name);
            //var_dump($code);
            if (isset($results[$code])) {
                $code .= '__' . rand(1, 1000);
            }
            if (isset($results[$code])) {
                $code .= '__' . rand(1, 1000);
            }
            $rData = [];
            foreach ($tmp as $nkey => $nvalue) {
                if ($nkey == 0) {
                    //continue;
                }
                $rData[$titles[$nkey]] = $nvalue;
            }
            print_R($tmp);
            print_R($rData);
            $results[$code] = $rData;
        }
        print_r($results);
        //print_r($infos);
        $content = "<?php\nreturn ";
        $content .= var_export($results, true);
        $content .= ';';
        $file = '/data/database/knowledge/history/中国断代/';
        //$file .= '先秦时期/战国/秦国帝王.php';
        $file .= '隋唐五代/隋朝/帝王.php';
        //file_put_contents($file, $content);

        exit();
    }

    public function _testPotus()
    {
        $infos = \DB::connection()->select("SELECT * FROM `data_culture`.`wp_figure_resume`");
        $results = [];
        foreach ($infos as $info) {
            $fCode = $info->figure_code;
            $fInfo = $this->getModelObj('figure')->where(['code' => $fCode])->first();
            $titles = $fInfo->getFtitleDatas();
            foreach ($titles as $key => $t) {
                if ($key != 'englishfull') {
                    print_r($titles);
                }
            }
            //print_r($titles);
            $rData = [
                'name' => $fInfo['name'],
                'fullName' => $fInfo['name_card'],
                'englishfull' => $titles['englishfull'][0],
                'number' => $info->term,
            ];
            $dateInfos = $this->getModelObj('dateinfo')->where(['info_key' => $fCode])->get();
            foreach ($dateInfos as $dInfo) {
                if (!in_array($dInfo['type'], ['deathday', 'birthday'])) {
                    print_r($dateInfos->toArray());
                } else {
                    $rData[$dInfo['type']] = $dInfo['year'] . ' / ' . $dInfo['month'] . ' / ' . $dInfo['day'];
                }
            }
            $period = [
                'period' => $info->period,
                'party' => $info->party,
            ];
            $date1Infos = $this->getModelObj('dateinfo')->where(['info_key' => $info->id])->get();
            foreach ($date1Infos as $dInfo) {
                $period[$dInfo['type']] = $dInfo['year'] . ' / ' . $dInfo['month'] . ' / ' . $dInfo['day'];
            }
            //print_r($period);
            //print_r($rData);exit();
            if ($fCode == 'cleveland') {
                //print_r($fInfo->toArray());
                //print_r($date1Infos->toArray());
            }
            if (isset($results[$fCode])) {
                $results[$fCode]['period'][$info->period] = $period;
            } else {
                $results[$fCode] = $rData;
                $results[$fCode]['period'][$info->period] = $period;
            }

            //$dateinfos = $fInfo->getDateinfo($type, $result = 'format')
        }
        var_export($results);
        exit();
        print_r($infos);exit();
    }

    public function _testDealgroup()
    {
        $sorts = ['ancients', 'contemporary', 'contemporary', 'modern'];
        $sorts = ['culture'];
        $sorts = ['foreign'];
        $sorts = ['dynasty'];
        $sorts = ['subject', 'period'];
        $subjectSorts = $this->getModelObj('subjectSort')->whereIn('code', $sorts)->get();
        foreach ($subjectSorts as $sData) {
            echo $sData['name'] . '--' . $sData['code'] . '<br />';
            $subjects = $this->getModelObj('subject')->where(['subject_sort' => $sData['code']])->orderBy('orderlist', 'asc')->get();
            foreach ($subjects as $subject) {
                echo '---        ---' . $subject['name'] . '--' . $subject['code'] . '<br />';
                $sgDatas = $this->getModelObj('groupSubject')->where(['subject_code' => $subject['code']])->orderBy('orderlist', 'asc')->get();
                foreach ($sgDatas as $sgData) {
                    echo '---        ---===---        ---' . $sgData->groupInfo['name'] . '--' . $sgData['group_code'] . '<br />';
                    $kPath = "history/中国断代/{$subject['name']}/{$sgData->groupInfo['name']}/base";
                    $nData = [
                        'code' => $sgData['group_code'],
                        'name' => $sgData->groupInfo['name'],
                        'parent_code' => $subject['code'],
                        'knowledge_path' => $kPath,
                    ];
                    //$this->getModelObj('dynasty')->create($nData);
                    //$this->getModelObj('country')->create($nData);
                    //print_r($nData);
                }
            }
        }
        exit();
    }

    public function _testDealResource()
    {
        $basePath = '/data/htmlwww/resource/';
        $service = $this->getServiceObj('dealResource');
        $r = $service->checkLocalFiles('');
        exit();

        $infos = $this->getModelObj('resourceInfo')->where('info_table', 'navsort')->limit(1500)->get();
        $riIds = $rdIds = '';
        $command = '';
        foreach ($infos as $info) {
            $detail = $info->resourceDetailInfo;
            $file = $basePath . $detail['filepath'];
            //$file = 'http://39.106.102.45/resource/' . $detail['filepath'];
            //echo '<br />' . $detail['name'] . '<br />';
            //echo "<img src='{$file}' width='100px' height='200px'/>";
            //$fileHash = $service->createFileHash($file);
            //$info->file_hash = $fileHash;
            //$info->resource_type = $fileHash;
            //var_dump($fileHash . '--' . $file);
            $command .= "rm -f {$file}\n";
            //$info->save();
            $riIds .= "{$info['id']},";
            $rdIds .= "{$info['resource_id']},";
        }
        echo $command;
        $riIds = trim($riIds, ',');
        $rdIds = trim($rdIds, ',');
        echo "DELETE FROM `wp_resource_info` WHERE `id` IN ({$riIds});<br />\n";
        echo "DELETE FROM `wp_resource_detail` WHERE `id` IN ({$rdIds});<br />\n";
        exit();
    }

    public function _testDealnav()
    {
        $navs = require(self_app_path($this->getAppCode(), '/resources/formatdata/nav.php'));
        $i = 1;
        foreach ($navs['topNavs'] as $nCode => $nInfo) {
            //var_dump($nCode);
            $nData = [
                'parent_code' => '',
                'code' => $nCode,
                'name' => $nInfo['name'],
                'orderlist' => $i++,
            ];
            print_r($nData);
            $this->getModelObj('navsort')->create($nData);
            $orderlist = 1;
            foreach ($nInfo['subDatas'] as $nsCode => $nsInfo) {
                $nsData = [
                    'parent_code' => $nCode,
                    'code' => $nsCode,
                    'name' => $nsInfo['name'],
                    'url' => $nsInfo['url'] ?? '',
                    'orderlist' => $orderlist++,
                    'extparam' => isset($nsInfo['withVolume']) ? json_encode(['withVolume' => $nsInfo['withVolume']]) : '',
                ];
                print_r($nsData);
                $this->getModelObj('navsort')->create($nsData);
                if (isset($nsInfo['subDatas'])) {
                $j = 1;
                foreach ($nsInfo['subDatas'] as $nssCode => $nssInfo) {
                    $nssData = [
                        'parent_code' => $nsCode,
                        'code' => $nssCode,
                        'name' => $nssInfo['name'],
                        'url' => $nssInfo['url'] ?? '',
                        'orderlist' => $j++,
                        'extparam' => isset($nssInfo['withVolume']) ? json_encode(['withVolume' => $nssInfo['withVolume']]) : '',
                    ];
                    print_r($nssData);
                    $this->getModelObj('navsort')->create($nssData);
                }
                }
            }
            //print_r($nInfo);
        }
        print_R($navs);
        exit();
        $infos = $this->getModelObj('book')->where('id', '>=', 1056)->where('id', '<=', 1072)->get();
        $code = '';
        foreach ($infos as $info) {
            $code .= "'{$info['code']}',";
            //var_dump($info['name']);
        }
        echo trim($code, ',');
        return false;
        //$swbooks = require('/data/htmlwww/laravel-system/vendor/candocker/knowledge/resources/formatdata/swbooks.php');
    }

    public function _test()
    {
        echo 'test';
        exit();
    }
}
