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

    public function _testCountry()
    {
        $datas = require('/tmp/d.php');
        //print_R($datas);
        foreach ($datas as $subData) {
            foreach ($subData as $key => $data) {
                if ($key != 'infos') {
                    var_dump($key . '-' . $data);
                    continue;
                }
                //print_r($data);
                foreach ($data as $cData) {
                    foreach ($cData as $c => $cUrl) {
                    var_dump($c . '-' . $cUrl);
                    }
                }
                //print_r($key);
                //print_r($data);
            }
        }
        exit();
        $datas = require('/tmp/sql.php');
        $tmp = require('/tmp/b.php');
        $tmp1 = require('/tmp/c.php');
        $i = 0;
        $str = '';
        //print_r($datas);
        foreach ($datas as $data) {
            $name = $tmp[$data[2]] ?? ($tmp1[$data[2]] ?? '');
            $nData = [
                'code' => strtolower(trim($data[3])),
                'name' => trim($name),
                'name_english' => trim($data[2]),
                'area' => str_replace(',', '', trim($data[4])),
                'population' => str_replace(',', '', trim($data[6])),
            ];
            print_r($nData);
            if (empty($name)) {
                $str .= "{$data[2]}\n";
                $i++;
            print_r($nData);
            }
            //$this->getModelObj('country')->create($nData);
        }
        echo $str;
        var_dump($i);
        exit();
    }

    public function _testBook()
    {
        $infos = $this->getModelObj('book')->where('name', 'like', '% %')->get();
        foreach ($infos as $info) {
            //print_r($info->toArray());
            $oName = $info->name;
            $bName = str_replace(' ', '', $info->name);
            $uData = ['name' => $bName];
            $this->getModelObj('bookListing')->where(['name' => $oName])->update($uData);
            //$this->getModelObj('bookFigure')->where(['name' => $oName])->update($uData);
            var_dump($bName);var_dump($info->name);
            $exist = $this->getModelObj('book')->where(['name' => $bName])->where('id', '<>', $info->id)->first();
            $info->name = $bName;
            $info->save();
            if ($exist) {
                print_r($exist->toArray());
            }
        }
        exit();
    }

    public function _testTmp()
    {
        $file = '/tmp/b.html';
        $crawler = new Crawler();
        $content = file_get_contents($file);
        $crawler->addContent($content);
        $datas = [];
        $crawler->filter('span')->each(function ($subCrawler) use (& $datas) {
            $text = $subCrawler->text();
            $url = '';
            $aDom = $subCrawler->filter('a');
            if ($aDom->count() > 0) {
                $url = $aDom->attr('href');
                $url = urldecode($url);
                $url = strpos($url, '?') !== false ? substr($url, 0, strpos($url, '?')) : $url;
            }
            if ($text != '|') {
                $datas[] = [$text =>  $url];
                //print_r([$text =>  $url]);
            }
        });
        $a = var_export($datas, true);
        echo $a;
        //print_r($datas);
    }

    public function _testKing2()
    {
        $file = '/tmp/b.php';
        $crawler = new Crawler();
        $content = file_get_contents($file);
        $crawler->addContent($content);
        $datas = [];
        //$titles = ['posthumous_title', 'serial', 'mausoleum', 'eraname', 'birth_death', 'office_start_end', 'name', 'office_start_end', 'office_duration', 'brief', 'brief2'];
        $titles = ['dynastic_title', 'posthumous_title', 'name', 'office_start_end', 'eraname', 'mausoleum', 'brief', 'birth_death', 'brief2'];
        $titles = ['serial', 'name', 'author', 'brief', 'publish_at', 'begin_end', 'brief3', 'capital', 'brief4'];
        $crawler->filter('tr')->each(function ($subCrawler) use (& $datas, $titles) {
            $data = [];
            $i = 0;
            $subCrawler->filter('td')->each(function ($node) use (& $data, & $i, $titles) {
                //echo $node->html();
                $j = 0;
                $url = '';
                if ($aDom->count() > 0) {
                    $url = urldecode($aDom->attr('href'));
                    if (strpos($url, '?') !== false) {
                        $url = substr($url, 0, strpos($url, '?'));
                    }
                    $data['baidu_url' . rand(10, 100)] = 'https://baike.baidu.com/' . trim($url, '/');
                }
                $text = $node->text();
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

        foreach ($datas as & $data) {
            if (!isset($data['name']) || in_array($data['name'], ['', '君主', '—', '姓名'])) {
                continue;
            }
            $data['dynasty'] = 'qingchao';
            //$this->getModelObj('country')->create($data);
        }
        //echo $sql;exit();
        //print_r($datas);
        exit();
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
