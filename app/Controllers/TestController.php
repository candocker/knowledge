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
        $showAnnals = request()->input('show_annals');
        $file = '/tmp/a.html';
        $crawler = new Crawler();
        $content = file_get_contents($file);
        $crawler->addContent($content);
        $datas = [];
        //$titles = ['posthumous_title', 'serial', 'mausoleum', 'eraname', 'birth_death', 'office_start_end', 'name', 'office_start_end', 'office_duration', 'brief', 'brief2'];
        $titles = ['dynastic_title', 'posthumous_title', 'name', 'office_start_end', 'eraname', 'mausoleum', 'brief', 'birth_death', 'brief2'];
        $titles = ['serial', 'name', 'name_card', 'brief', 'country_code', 'brief2', 'brief3', 'capital', 'brief4'];
        //$titles = ['name', 'name_card', 'brief', 'country_code', 'brief2', 'brief3', 'capital', 'brief4'];
        $titles = ['begin_end', 'name_card', 'name', 'brief', 'brief2', 'brief3', 'capital', 'brief4', 'brief5', 'brief6', 'brief7', 'brief8', 'brief9', 'brief10', 'brief11', 'brief12', 'brief13', 'brief14', 'brief15', 'brief16', 'brief17', 'brief18', 'brief19', 'brief20', 'brief21', 'brief22', 'brief23'];
        $fMark = '.itemWrap_q4x7d';
        $fMark = '.para__C9Dx';
        $fMark = 'li';
        $fMark = '.para_WuljG';
        $fMark = '.para_Fx2su';
        $fMark = 'tr';
        if ($showAnnals) {
            $fMark = '.para_rjKcx';
            $fMark = '.para_ZDNLn';
            $fMark = '.para_Y9ue8';
            $fMark = '.para_foMcK';
        }
        $crawler->filter($fMark)->each(function ($crawler) use (& $datas, $titles, $showAnnals) {
            $data = [];
            $i = 0;
            $sMark = '.item-title_WzMib';
            //$sMark = 'span';
            $sMark = 'td';
            if ($showAnnals) {
                $sMark = '.text_QYXSV';
                $sMark = '.text_zBf3n';
                $sMark = '.text_afkPS';
                $sMark = '.text_wPXe7';
            }
            $crawler->filter($sMark)->each(function ($subCrawler) use (& $data, & $i, $titles) {
                $text = $subCrawler->html();
                $text = strip_tags($text, '<a>');
                $text = str_replace(['="summary"', 'class="innerLink_WLbaT" ', 'class="innerLink_qvfoC" ', 'class="innerLink_7hUCa" ', ' target="_blank" data-from-module', 'class="innerLink_QMCk5" ', ' target="_blank" data-from-module=""', '?fromModule=lemma_inlink', '/item'], ['', '', '', '', '',  '', '', '', 'https://baike.baidu.com/item'], $text);
                $text = urldecode($text);
                $title = $titles[$i] ?? '';
                $data[$title] = $text;
                $i++;
                return ;

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
        //$datas = array_reverse($datas);
        var_export($datas);exit();
        if ($showAnnals) {
            return $this->_formatAnnalsDatas($datas);
        }
            //return $this->_formatAnnalsDatas($datas);
        //return $this->_formatPointDealDatas($datas);
        $sql = "INSERT INT `wp_country` (`code`, `name`, `baidu_url`, `sort`) VALUES \n";
        $str = '';

        foreach ($datas as & $data) {
            //$code = str_replace(['aijidi', 'wangchaozaowangguoshiqi', 'wangchaoguwangguoshiqi', ''], ['egypt', '', '', ''], $data['code']);
            //$sql .= "('{$data['code']}', '{$data['name']}', '{$data['baidu_url']}', 'gdempire'),\n";
            //$this->getModelObj('country')->create($data);
            $baiduUrl = $data['baidu_url'] ?? '';
            $name = $data['name'] ?? '';
            $beginEnd = $data['begin_end'] ?? '';
            $brief = $data['brief'] ?? '';
            $brief2 = $data['brief2'] ?? '';
            $brief3 = $data['brief3'] ?? '';
            $nameCard = $data['name_card'] ?? '';

            $fName = $beginEnd;
            if ($baiduUrl) {
                $fName = "<a href=\"{$baiduUrl}\">{$fName}</a>";
            }
            echo "        [\n";
            echo "            'date' => '{$fName}',\n";
            //echo "            'begin_end' => '{$nameCard}-{$name} 年',\n";
            //echo "            'name_english' => '',\n";
            echo "            'major' => '{$nameCard}',\n";
            //echo "            'name' => '{$beginEnd}',\n";
            //echo "            'capital' => '{$nameCard}',\n";
            //echo "            'address' => '{$name}',\n";
            echo "        ],\n";
        }
        echo $str;exit();
        echo $sql;exit();
        //print_r($datas);
        exit();
    }

    public function _formatPointDealDatas($datas)
    {
        //print_r($datas);
        $currentDate = '';
        foreach ($datas as $data) {
            $date = $data['begin_end'];
            if (strpos($date, '月') !== false && strpos($date, '鲍月华') === false) {
                //var_dump($date);
                $currentDate = $date;
                unset($data['begin_end']);
                $name = $data['name_card'];
                if (isset($data['brief'])) {
                    $name .= " ({$data['brief']})";
                }
                $major = $data['name'];
            } else {
                $name = $data['begin_end'];
                if (isset($data['name'])) {
                    $name .= " ({$data['name']})";
                }
                $major = $data['name_card'];
            }
            echo "        [\n";
            echo "            'date' => '{$currentDate}',\n";
            echo "            'name' => '{$name}',\n";
            echo "            'major' => '{$major}',\n";
            echo "        ],\n";
        }
        exit();
        $month = '8';
        $results = [];
        $lastDate = '1日';
        foreach ($datas as $data) {
            if (!isset($data['begin_end']) || empty($data['begin_end'])) {
                print_R($data);
                continue;
            }
            if (!isset($data['name_card']) || empty($data['name_card'])) {
                //print_R($data);
                continue;
            }
            $date = str_replace('：', '', $data['begin_end']);
            //var_dump($date);
            if ($lastDate != '1日' && $date == '1日') {
                $month++;
            }
            $lastDate = $date;
            $key = $month . '月' . $date;
            unset($data['begin_end']);
            $major = implode('', $data);
            if (!isset($results[$key])) {
                $results[$key] = $major;
            } else {
                $results[$key] .= '、' . $major;
            }
        }
        //print_r($results);exit();
        foreach ($results as $key => $value) {
                echo "        [\n";
                echo "            'date' => '{$key}',\n";
                echo "            'major' => '{$value}',\n";
                echo "        ],\n";
        }
        exit();
        //print_r($datas);
        $cDates = $results = [];
        foreach ($datas as $data) {
            if (!isset($data['begin_end']) || !in_array($data['begin_end'], ['日期', '逝世人物'])) {
                print_r($data);
                continue;
            }
            if ($data['begin_end'] == '日期') {
                $cDates = [];
                foreach ($data as $key => $date) {
                    if ($key == 'begin_end') {
                        continue;
                    }
                    $cDates[$key] = ['date' => $date];
                }
            }
            if ($data['begin_end'] == '逝世人物') {
                foreach ($data as $key => $value) {
                    if ($key == 'begin_end') {
                        continue;
                    }
                    $cDates[$key]['major'] = $value;
                }
                $results[] = $cDates;
            }
            //print_r($data);exit();
        }
        exit();
        foreach ($results as $rData) {
            foreach ($rData as $pData) {
                //print_r($pData);exit();
                if ($pData['date'] == '-' || $pData['major'] == '-' || $pData['major'] == '') {
                    //print_r($pData);
                    continue;
                }
                //print_r($pData);
                echo "        [\n";
                echo "            'date' => '月{$pData['date']}日',\n";
                echo "            'major' => '{$pData['major']}',\n";
                echo "        ],\n";
            }
        }
        //print_r($results);
        exit();
    }

    public function _formatAnnalsDatas($datas)
    {
        //print_r($datas);
        foreach ($datas as $data) {
            $brief = implode('', $data);
            $brief = str_replace(['class="innerLink_7hUCa" ', 'class="innerLink_pp6qm" ', '当地时间', ' target="_blank" data-from-module'], ['', '', '', ''], $brief);
            //var_dump($brief);
            if (strpos($brief, '——') === false) {// && strpos($brief, '：') === false) {
                $name = '';
                $major = $brief;
            } else {
                $posStr = strpos($brief, '：') !== false ? '：' : '——';
                $posStr = '——';
                $tmp = explode($posStr, $brief);
                $name = $tmp[0];
                unset($tmp[0]);
                $major = implode('', $tmp);
            }
            echo "        [\n";
            echo "            'name' => '{$name}',\n";
            echo "            'major' => '{$major}',\n";
            echo "        ],\n";
            //var_dump($name . '---' . $major);
        }
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
        //$service->_initCenturyData();exit();
        //$service->_initAnnalsData();exit();
        //$service->initPeriodData();exit();

        //$service->_initBaseData();exit();
        $sort = request()->input('sort');
        $method = 'deal' . ucfirst($sort);
        $params = request()->all();
        $service->$method($params);
        exit();
        //$service->initFigureDatas();exit();
        //$service->initDateData();exit();
        //$service->formatBaikeDatas();exit();
    }

    public function _test()
    {
        echo 'test';
        exit();
    }
}
