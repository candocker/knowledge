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

    public function _testInitcountry()
    {
        $basePath = $this->config->get('knowledge.knowledge_path');
        $rPath = '/data/htmlwww/resource/';
        $command = '';

    }

    public function _testTmp()
    {
        $file = '/data/log/tmp/kd.php';
        $infos = \DB::select("SELECT * FROM `work_tmp_knowledge`.`wp_knowledge` WHERE `code` = 'ruxueqianhan';");
        foreach ($infos as $info) {
            //print_r($info);
            $sInfos = \DB::select("SELECT * FROM `work_tmp_knowledge`.`wp_knowledge_listing` WHERE `knowledge_code` = '{$info->code}';");
            $bStr = '';
            $str = "<?php\nreturn [\n";
            foreach ($sInfos as $sInfo) {
                //print_r($sInfo);
                $filePath = '/data/database/knowledge/古代中国/culture/中国思想史/' . $info->name . '/' . $sInfo->code . '.php';
                if (!file_exists($filePath)) {
                    var_dump($filePath);
                    continue;
                }
                $datas = require($filePath);
                $newPath = '/data/database/knowledge/小知识/易经/' . $info->name . '/';
                $str .= "[\n";
                $str .= "    'ask' => '{$sInfo->name}',\n";
                foreach ($datas as $data) {
                    foreach ($data as $subData) {
                    foreach ($subData as $key => $value) {
                        $str .= $key == 'content' ? "    'answer' => [\n" : "    '{$key}' => [\n";
                        foreach ((array)$value as $subValue) {
                            $str .= "        '{$subValue}',\n";
                        }
                        $str .= "    ],\n";
                    }
                        $str .= "],\n";
                    }
                    //file_put_contents($newFile, $str);
                }
            }
            $str .= "];";
            echo $str;exit();
            //echo $bStr;
        }
        exit();


        $infos = \DB::select("SELECT * FROM `work_tmp_knowledge`.`wp_knowledge` WHERE `code` = 'yijingcihui';");
        foreach ($infos as $info) {
            print_r($info);
            $sInfos = \DB::select("SELECT * FROM `work_tmp_knowledge`.`wp_knowledge_listing` WHERE `knowledge_code` = '{$info->code}';");
            $bStr = '';
            foreach ($sInfos as $sInfo) {
                print_r($sInfo);
                $filePath = '/data/database/knowledge/古代中国/culture/中国思想史/' . $info->name . '/' . $sInfo->code . '.php';
                if (!file_exists($filePath)) {
                    var_dump($filePath);
                    continue;
                }
                $datas = require($filePath);
                $str = "<?php\nreturn [\n";
                $newPath = '/data/database/knowledge/小知识/易经/' . $info->name . '/';
                if (!is_dir($newPath)) {
                    var_dump($newPath);
                    mkdir($newPath, 0777, true);
                }
                $newFile = $newPath . $sInfo->name . '.php';
                $bStr .= "        [\n";
                $bStr .= "            'name' => '{$sInfo->name}',\n";
                $bStr .= "            'subInfos' => require(__DIR__ . '/{$info->name}/{$sInfo->name}.php'),\n";
                $bStr .= "        ],\n";
                foreach ($datas as $data) {
                    //print_r($data);
                    foreach ($data as $subData) {
                        $str .= "[\n";
                    foreach ($subData as $key => $value) {
                        var_dump($key);
                        print_r($value);
                        if ($key == 'name') {
                            $str .= "    'ask' => '{$value}',\n";
                        } else {
                            $str .= "    'answer' => [\n";
                            foreach ((array)$value as $subValue) {
                                $str .= "        '{$subValue}',\n";
                            }
                            $str .= "    ],\n";
                        }
                    }
                        $str .= "],\n";
                    }
                    $str .= "];";
                    file_put_contents($newFile, $str);
                //echo $str;exit();
                }
                //print_r($datas);
                //exit();
                //var_dump($filePath);
            }
            echo $bStr;
        }
        exit();
    }

    public function _testKing2()
    {
        $file = '/tmp/kd2.html';
        $crawler = new Crawler();
        $content = file_get_contents($file);
        $crawler->addContent($content);
        $datas = [];
        //$titles = ['posthumous_title', 'serial', 'mausoleum', 'eraname', 'birth_death', 'office_start_end', 'name', 'office_start_end', 'office_duration', 'brief', 'brief2'];
        $titles = ['dynastic_title', 'posthumous_title', 'name', 'office_start_end', 'eraname', 'mausoleum', 'brief', 'birth_death', 'brief2'];
        $titles = ['serial', 'name', 'name_card', 'brief', 'country_code', 'brief2', 'brief3', 'capital', 'brief4'];
        $titles = ['name', 'name_card', 'brief', 'country_code', 'brief2', 'brief3', 'capital', 'brief4'];
        $crawler->filter('tr')->each(function ($crawler) use (& $datas, $titles) {
            $data = [];
            $i = 0;
            $crawler->filter('td')->each(function ($subCrawler) use (& $data, & $i, $titles) {
                //echo $node->html();
                $aDom = $subCrawler->filter('a');
                $url = '';
                if (!isset($data['baidu_url']) && $aDom->count() > 0) {
                    $url = urldecode($aDom->attr('href'));
                    if (strpos($url, '?') !== false) {
                        $url = substr($url, 0, strpos($url, '?'));
                    }
                    $data['baidu_url'] = 'https://baike.baidu.com/' . trim($url, '/');
                }
                $text = $subCrawler->text();
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
        var_export($datas);exit();
        print_r($datas);
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

                $kPath = "古代中国/{$subject['name']}/base";
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
                    $kPath = "古代中国/{$subject['name']}/{$sgData->groupInfo['name']}/base";
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
        $path = '';
        //$r = $service->dealLocalFiles($path);
        $r = $service->checkLocalFiles($path);

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

    public function _testFormatData()
    {
        $service = $this->getServiceObj('formatData');
        $sort = request()->input('sort');
        $method = 'deal' . ucfirst($sort);
        $params = request()->all();
        $service->$method($params);
        exit();
    }

    public function _test()
    {
        echo 'test';
        exit();
    }
}
