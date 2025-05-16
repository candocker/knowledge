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
        $cInfos = $this->getModelObj('country')->get();
        foreach ($cInfos as $cInfo) {
            $kPath = $cInfo->knowledge_path;
            $kFullPath = $basePath . 'bak/' . $kPath;
            if (is_dir($kFullPath)) {
                //var_dump($cInfo['name'] . '---' . $kFullPath);
            }
            $cFullFile = $kFullPath . '.php';
            if (!file_exists($cFullFile)) {
                var_dump($cInfo['name'] . '---' . $cFullFile);
            }
        }
        exit();

        $fInfos = $this->getModelObj('figure')->where('nationality', '<>', '')->get();
        $m = [];
        foreach ($fInfos as $fInfo) {
            $cCount = $this->getModelObj('country')->where(['sort' => '', 'name' => $fInfo['nationality']])->count();
            $cInfo = $this->getModelObj('country')->where(['sort' => '', 'name' => $fInfo['nationality']])->first();
            if ($cCount > 1) {
                $m[] = $fInfo['nationality'];
                continue;
            }
            if ($cCount == 0) {
                $cCount = $this->getModelObj('country')->where('sort', '<>', '')->where(['name' => $fInfo['nationality']])->count();
                $cInfo = $this->getModelObj('country')->where('sort', '<>', '')->where(['name' => $fInfo['nationality']])->first();
            }
            if ($cCount != 1) {
                var_dump($cCount);
                print_r($fInfo->toArray());
                continue;
            }
            $fInfo->country_code = $cInfo['code'];
            $fInfo->save();
            //var_dump($fInfo['nationality'] . '==' . $cInfo['knowledge_path'] . '-' . $fInfo['name']);
            if (empty($fInfo->path_old)) {
                //var_dump($fInfo->knowledgePath . '----' . $fInfo['path_old']);
                continue;
            }
            $oldFull = $base . 'bak/' . $fInfo['path_old'];
            if (is_file($oldFull . '.php')) {
                var_dump($oldFull . '===' . $fInfo->knowledgePath);
            } else {
                $oldFull = $base . '/' . $fInfo['path_old'];
            }
            //var_dump($oldFull);
            $nPath = $base . $fInfo->knowledgePath;
            $bName = basename($oldFull);
            if (is_dir($oldFull)) {
                var_dump($nPath);
            }
            if ($bName != 'figure') {
                //var_dump($oldFull . '---' . $nPath);
            }

            //var_dump($oldFull . '===' . $fInfo->knowledgePath);
        }
        $m = array_unique($m);
        $mStr = implode("','", $m);
        var_dump($mStr);
        print_r($m);
        exit();
    }

    public function _testCountry()
    {
        $infos = $this->getModelObj('country')->where(['sort' => 'dynasty'])->get();
        foreach ($infos as $info) {
            $dCode = $info['code'];
            $count = $this->getModelObj('figure')->where(['dynasty' => $dCode])->count();
            if ($count > 0) {
                var_dump($info['name']);
            }
        }
        exit();
        $dataSources = require('/data/log/tmp/guojia.php');
        $datas = $dataSources['base'];
        //print_r($datas);
        $en = require('/tmp/a.php');

        $newDatas = [];
        foreach ($datas as $key => $data) {
            $code = $en[$key] ?? '';
            //echo $key . '-' . $code . "\n";
            $sDatas = $data['infos'] ?? [];
            $pCode = strtolower(str_replace(' ', '', $code));
            $newDatas[$key] = [
                'code' => $pCode,
                'name' => $key,
                'name_english' => $code,
                'bigsort' => 'region',
                'parent_code' => '',
                'baidu_url' => $data['url'] ?? '',
            ];
            foreach ($sDatas as $sKey => $sData) {
                $sCode = $en[$sKey] ?? '';
                //echo $sKey . '-' . $sCode . "\n";

                $newDatas[$sKey] = [
                    'code' => strtolower(str_replace(' ', '', $sCode)),
                    'name' => $sKey,
                    'name_english' => $sCode,
                    'bigsort' => 'region',
                    'parent_code' => $pCode,
                    'baidu_url' => $sData,
                ];
            }
        }
        //print_r($newDatas);
        $details = $dataSources['details'];
        $bb = require('/tmp/b.php');
        $i = 0;
        $sql = "INSERT INTO `wp_country` (`code`, `sort`, `name`, `name_english`, `baidu_url`, `knowledge_path`) VALUES \n";
        $cListings = [];
        foreach ($details as $fKey => $subData) {
            foreach ($subData as $dKey => $dInfos) {
                if (!isset($newDatas[$dKey])) {
                    //print_r($dInfos);
                    $bnewData = $newDatas[$fKey];
                    //print_r($bnewData);exit();
                    $newDatas[$bnewData['name'] . '其他'] = [
                        'code' => $bnewData['code'] . 'other',
                        'name' => $bnewData['name'] . '其他',
                        'name_english' => $bnewData['name_english'] . ' Other',
                        'bigsort' => 'region',
                        'parent_code' => $bnewData['code'],
                        'baidu_url' => '',
                    ];
                    foreach ($dInfos as $sCountry => $tmps) {
                        print_r($tmps);
                        foreach ($tmps as $t => $tt) {

                            $cInfo = $this->getModelObj('country')->where(['sort' => '', 'name' => $t])->first();
                        $cListings[] = [
                            'catalog_code' => $newDatas[$bnewData['name'] . '其他']['code'],
                            'country_code' => $cInfo['code'],
                            'description' => $newDatas[$bnewData['name'] . '其他']['name'],
                        ];
                            if (empty($cInfo)) {
                                $cInfo = $this->getModelObj('country')->where(['sort' => ''])->where('name', 'like', "%{$t}%")->first();
                                if (empty($cInfo)) {
                                    var_dump($t . '= ' . $tt);
                                    $eName = $bb[$i];
                                    $code = strtolower(str_replace(' ', '', $eName));
                                    //echo $t . '-' . $bb[$i] . "\n";
                                    $sql .= "('{$code}', '', '{$t}', '{$eName}', '{$tt}', ''),\n";
                                    $i++;
                                } else {
                                    print_r($tt);
                                }
                            } else {
                                //$cInfo['baidu_url'] = 'https://baike.baidu.com' . $tt;
                                //$cInfo->save();
                                //var_dump($cInfo['name'] . '-' . $cInfo['baidu_url'] . '= ' . $tt);
                                //print_r($tmps);
                            }
                        }
                    }
                } else {
                    if ($newDatas[$dKey]['baidu_url'] != $dInfos['url']) {
                        var_dump($dKey);
                        //print_r($dInfos);
                    }
                    foreach ($dInfos['infos'] as $ccCode => $dInfo) {
                        $cInfo = $this->getModelObj('country')->where(['sort' => '', 'name' => $ccCode])->first();
                        if (empty($cInfo)) {
                            var_dump($ccCode . '-' . $dInfo);
                        } else {
                            //$cInfo['baidu_url'] = 'https://baike.baidu.com' . $dInfo;
                            //$cInfo->save();
                            //var_dump($cInfo['name'] . '-' . $cInfo['baidu_url'] . '= ' . $dInfo);
                        }
                        /*$cListings[] = [
                            'catalog_code' => $newDatas[$dKey]['code'],
                            'country_code' => $cInfo['code'],
                            'description' => $newDatas[$dKey]['name'],
                        ];*/
                        //print_r($dInfo);
                    }
                }
                //print_R($newDatas[$dKey]);
                //print_r($dInfos);
            }
            //print_r($subData);exit();
        }
        //echo $sql;
        echo count($cListings);
        print_r($cListings);
        //$this->getModelObj('countryListing')->insert($cListings);
        //echo count($newDatas);
        //print_r($newDatas);
        //$this->getModelObj('countryCatalog')->insert($newDatas);
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
                $datas[] = [$text => $url];
                //print_r([$text => $url]);
            }
        });
        $str = '';
        foreach ($datas as $data) {
            foreach ($data as $key => $value) {
                $str .= "        '{$key}' => '{$value}',\n";
                //var_dump($key . '-' . $value);
            }
            //print_r($data);exit();
        }
        echo $str;
        //$a = var_export($datas, true);
        //echo $a;
        //print_r($datas);
        exit();
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
        $path = 'bak/old/resource';
        $path = 'bak/resource';
        $r = $service->dealLocalFiles($path);
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
