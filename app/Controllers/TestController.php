<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Controllers;

use Symfony\Component\DomCrawler\Crawler;
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

    public function _testKing2()
    {
        $file = '/tmp/b.php';
        $crawler = new Crawler();
        $content = file_get_contents($file);
        $crawler->addContent($content);
        $datas = [];
        //$titles = ['dynasty', 'dynasty_sub', 'serial', 'first_emperor','begin_end'];
        $titles = ['posthumous_title', 'serial', 'mausoleum', 'eraname', 'birth_death', 'office_start_end', 'name', 'office_start_end', 'office_duration', 'brief', 'brief2'];
        $titles = ['dynastic_title', 'posthumous_title', 'name', 'office_start_end', 'eraname', 'mausoleum', 'brief', 'birth_death', 'brief2'];
        //$titles = ['name', 'nationality', 'brief', 'first_emperor', 'brief2', 'begin_end', 'brief3', 'capital', 'brief4'];
        $titles = ['serial', 'name', 'author', 'brief', 'publish_at', 'begin_end', 'brief3', 'capital', 'brief4'];
        $crawler->filter('tr')->each(function ($subCrawler) use (& $datas, $titles) {
            $data = [];
            $i = 0;
            $subCrawler->filter('td')->each(function ($node) use (& $data, & $i, $titles) {
                //echo $node->html();
                $j = 0;
                $node->filter('a')->each(function ($subNode) use (& $data, & $j) {
                    $url = urldecode($subNode->attr('href'));
                    if (strpos($url, '?') !== false) {
                        $url = substr($url, 0, strpos($url, '?'));
                    }
                    //var_dump($url . '==' . $j);
                    if (!isset($data['baidu_url'])) {
                    $data['baidu_url'] = 'https://baike.baidu.com/' . trim($url, '/');
                    } else {
                    $data['baidu_url' . $j] = 'https://baike.baidu.com/' . trim($url, '/');
                    }
                    $j++;
                });
                /*$aDom = $node->filter('a');
                $url = '';
                if ($aDom->count() > 0) {// && !isset($data['baidu_url']) && $i != 0) {
                    $url = urldecode($aDom->attr('href'));
                    if (strpos($url, '?') !== false) {
                        $url = substr($url, 0, strpos($url, '?'));
                    }
                    $data['baidu_url' . rand(10, 100)] = 'https://baike.baidu.com/' . trim($url, '/');
                }*/
                $text = $node->text();
                $text = trim($text, '-');
                //$text = trim($text, '—');
                //$text = str_replace(['- [90]', '-'], ['', ''], $text);
                $text = str_replace(['不详'], [''], $text);
                $title = $titles[$i] ?? '';
                $data[$title] = $text;
                if ($title == 'name') {
                    //$data['figure_code'] = CommonTool::getSpellStr($data[$title], '');
                    $data['code'] = CommonTool::getSpellStr($data[$title], '');
                }
                $i++;
            });
            if (!empty($data)) {
                $datas[] = $data;
            }
        });
        $sql = "INSERT INT `wp_dynasty` (`" . implode('`,`', $titles) . "`) VALUES \n";
        //$sql = "INSERT INTO `wp_dynasty` (`name`, `code`, `parent_code`, `begin_end`, `brief`, `baidu_url`) VALUES \n";
        //$sql = "INSERT INTO `wp_emperor` (`name`, `figure_code`, `dynasty`, `office_start_end`, `brief`, `office_duration`, `posthumous_title`, `baidu_url`) VALUES \n";
        $sql = "INSERT INTO `wp_book` (`code`, `name`, `orderlist`, `description`, `baidu_url`, `author`, `publish_at`) VALUES ";
        $sql = "INSERT INTO `wp_book_listing` (`book_code`, `catalog_code`, `catalog_volume_id`, `serial`, `name`, `brief`, `author`) VALUES ";

        foreach ($datas as & $data) {
            if (!isset($data['name']) || in_array($data['name'], ['', '君主', '—', '姓名'])) {//!isset($data['baidu_url'])) {
                continue;
            }
            if (empty($data['figure_code'])) {
                $data['figure_code'] = isset($data['posthumous_title']) ? CommonTool::getSpellStr($data['posthumous_title'], '') : '';
            }
            $data['dynasty'] = 'qingchao';
            //$data['dynasty_sub'] = '后金';
            if (isset($data['brief2'])) {
                $data['brief'] = "{$data['brief']}。{$data['brief2']}";
                //$data['brief'] = "传{$data['brief']}帝，末代君主{$data['brief2']}亡于{$data['brief4']}。{$data['brief3']}";
                //$data['brief'] = trim($data['brief'], '。');
                unset($data['brief2']);
            }
            //$sql .= "('" . implode("','", $data) . "')\n";
            //$sql .= "('{$data['name']}', '{$data['code']}', 'zhou', '{$data['begin_end']}', '{$data['brief']}-{$data['brief2']}', '{$data['baidu_url']}')\n";
            //$sql .= "('{$data['code']}', '{$data['name']}', '{$data['serial']}', '{$data['brief']}', '{$data['baidu_url']}', '{$data['author']}', '{$data['publish_at']}'),\n";
            $sql .= "('{$data['code']}', 'classical', 215, '{$data['serial']}', '{$data['name']}', '{$data['brief']}', '{$data['author']}'),\n";
            print_r($data);
            $this->getModelObj('country')->create($data);
            //$this->getModelObj('emperor')->create($data);
        }
        //echo $sql;exit();
        //print_r($datas);
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
        //$sorts = ['subject', 'period'];
        $subjectSorts = $this->getModelObj('subjectSort')->whereIn('code', $sorts)->get();
        foreach ($subjectSorts as $sData) {
            echo $sData['name'] . '--' . $sData['code'] . '<br />';
            $subjects = $this->getModelObj('subject')->where(['subject_sort' => $sData['code']])->orderBy('orderlist', 'desc')->get();
            foreach ($subjects as $subject) {
                echo '---        ---' . $subject['name'] . '--' . $subject['code'] . '<br />';
                $sgDatas = $this->getModelObj('groupSubject')->where(['subject_code' => $subject['code']])->orderBy('orderlist', 'desc')->get();

                $kPath = "history/中国断代/{$subject['name']}/base";
                $nData = [
                    'county' => 'ancientchina',
                    'nationality' => 'huaxia',
                    'code' => $subject['code'],
                    'name' => $subject['name'],
                    'parent_code' => '',
                    'knowledge_path' => $kPath,
                ];
                print_r($nData);
                //$this->getModelObj('dynasty')->create($nData);
                foreach ($sgDatas as $sgData) {
                    echo '---        ---===---        ---' . $sgData->groupInfo['name'] . '--' . $sgData['group_code'] . '<br />';
                    $kPath = "history/中国断代/{$subject['name']}/{$sgData->groupInfo['name']}/base";
                    $nData = [
                        'county' => 'ancientchina',
                        'nationality' => 'huaxia',
                        'code' => $sgData['group_code'],
                        'name' => $sgData->groupInfo['name'],
                        'parent_code' => $subject['code'],
                        'knowledge_path' => $kPath,
                    ];
                    print_r($nData);
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
