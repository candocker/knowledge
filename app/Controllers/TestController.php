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

    public function _testDealxt()
    {
        $cInfos = $this->getModelObj('country')->where(['sort' => 'gdempire', 'status' => 0])->get();
        $i = 1;
        foreach ($cInfos as $info) {
            $fCount = $this->getModelObj('figure')->where(['country_code' => $info['code']])->count();
            $bUrl = $info['baidu_url'] ?? '';
            $str = "{$i}---{$fCount}-<a href='http://mu.canliang.wang/wiki-country-{$info['code']}.html' target='_blank'>{$info['name']}</a>";
            $str .= $bUrl ? " (<a href='{$bUrl}' target='_blank'>百科</a>)" : '';
            echo $str . '<br />';
            $i++;
        }
        echo "\n\n";
        //$sql = file_get_contents('/tmp/sql.sql');
        //\DB::connection('knowledge')->select($sql);exit();
        $datas = file_get_contents('/tmp/xt.json');
        $datas = json_decode($datas, true);
        $datas = $datas['data']['list'];
        $this->dealxtFigure($datas);
        exit();
    }

    public function dealxtFigure($datas)
    {
        //$datas = array_reverse($datas);
        $dynasty = 'luomannuofuwangchao';
        $typeExt = '君主';
        $extStr = '罗曼诺夫王朝';
        $gBase = '大国和组织/俄国/罗曼诺夫王朝/';
        $gPath = $gBase . $typeExt . '_' . $extStr;
        $gPath = $gBase . $typeExt;
        //print_r($datas);
        $sql = "INSERT INTO `wp_figure` (`code`, `name`, `name_card`, `country_code`, `baidu_url`, `path_label`, `path_gather`, `path_point`, `native_place`, `birth_year`, `birth_month`, `birth_day`, `death_year`, `death_month`, `death_day`, `baidu_picture`, `description`) VALUES\n";
        $pSql = "INSERT INTO `wp_period` (`period_type`, `country_code`, `figure_code`, `orderlist`, `start_year`, `end_year`, `start_end_detail`, `type_ext`) VALUES\n";

        $pInfos = require('/tmp/tmp.php');
        $this->dealSimpleFigures($pInfos, $dynasty, $typeExt, $extStr, $gPath, $sql, $pSql);exit();
        $mulInfos = require('/tmp/tmp.php');
        $m1Infos = require('/tmp/tmp.php');
        //foreach ($mulInfos as $m1Key => $m1Infos) {
            foreach ($m1Infos as $m2Key => $m2Infos) {
                foreach ($m2Infos as $extStr => $pInfos) {
                    //$extStr = strpos($extStr, '（') !== false ? substr($extStr, 0, strpos($extStr, '（')) : $extStr;
                    var_dump($extStr);//print_r($pInfos);exit();
                    $gPath = $gBase . $typeExt . '_' . $extStr;
                    $this->dealSimpleFigures($pInfos, $dynasty, $typeExt, $extStr, $gPath, $sql, $pSql);
                }
            }
        //}
        //print_r($pInfos);
        exit();

        $gStr = '';
        $eCodes = [
        ];
        $eNames = [
        ];
        $bDatas = [
        ];
        $pSql .= "('country', '{$dynasty}', '', 200, , , '', ''),\n";
        foreach ($datas as $index => $data) {
            //print_r($data);
            $nameCard = $data['lemmaTitle'];
            $name = $eNames[$index] ?? $nameCard;
            $englishName = isset($bDatas[$index]) ? $bDatas[$index]['english'] : '';
            //var_dump($englishName);
            $code = str_replace(['-', ' '], ['', ''], $englishName);
            $code = strtolower($code);

            $duration = isset($bDatas[$index]) ? $bDatas[$index]['reign'] : '';
            $duration = str_replace(['–', 'c.', ' CE', 'BCE', 'BC', '约公元前', '公元前', '年', '(claimant)', ' '], ['-', '', '', '', '', '', '', '', '', ''], $duration);
            $duration = strpos($duration, ' ') !== false ? substr($duration, 0, strpos($duration, ' ')) : $duration;
            if (strpos($duration, '-') !== false) {
                //var_dump($duration);
                list($start, $end) = explode('-', $duration);
            } else {
                $start = $duration;
                $end = $duration;
            }
            //$start = 0;//$bDatas[$index]['reign_start'];
            //$end = 0;//$bDatas[$index]['reign_end'];
            $start = -$start;
            $end = -$end;

            //$code = $eCodes[$index] ?? CommonTool::getSpellStr($name, '');
            $pSql .= "('emperor', '{$dynasty}', '{$code}', 200, {$start}, {$end}, '', '{$typeExt}'),\n";
            //echo "{$name}\n";
            echo "        '{$code}', // {$name}\n";
            //echo "            'fCode' => '{$code}', // {$name}\n";
            //continue;
            $exist = $this->getModelObj('figure')->where(['code' => $code])->first();
            if ($exist) {
                //var_dump($name);
                //continue;
            }
            $baiduUrl = "https://baike.baidu.com/item/{$nameCard}/{$data['lemmaId']}";
            //$baiduUrl = '';
            $picture = $data['coverPic'];
            //$picture = '';
            $description = $data['summary'];
            $description = '';

            //var_dump($picture);
            if (strpos($picture, ',') !== false) {
                $picture = substr($picture, 0, strpos($picture, ','));
            }
            //var_dump($picture);
            $sql .= "('{$code}', '{$name}', '{$nameCard}', '{$dynasty}', '{$baiduUrl}', '君主', '{$extStr}', '{$gPath}', '', '0', '0', '0', '{$end}', '0', '0', '{$picture}'),\n";
            $gStr .= $this->_dealFigureGather($code, $name, $description, ['英文名' => $englishName]);
        }
        $fFile = "/data/database/knowledge/{$gPath}.php";
        //file_put_contents($fFile, "<?php\nreturn [\n{$gStr}\n];");
        echo $gStr;
        echo trim($sql, ",\n") . ";\n";
        echo trim($pSql, ",\n") . ";\n";
    }

    public function dealSimpleFigures($pInfos, $dynasty, $typeExt, $extStr, $gPath, $sql, $pSql)
    {
        $gStr = '';
        foreach ($pInfos as $pInfo) {
            $code = $pInfo['英文名'] ?? '';
            $code = strtolower(str_replace([' ', '-', "'", '.'], ['', '_', '_', '_'], $code));
            $name = $pInfo['name'];
            $exist = $this->getModelObj('figure')->where(['code' => $code])->first();
            if ($exist) {
                //var_dump($name);
                //continue;
            }
            $nameSource = strip_tags($name);
            $baiduUrl = '';
            if (strpos($name, 'href') !== false) {
                $name = str_replace(['<a href="'], [''], $name);
                $name = substr($name, 0, strpos($name, '">'));
                $baiduUrl = $name;
            }
            $duration = $pInfo['begin_end'] ?? '';
            $duration = str_replace(['年'], [''], $duration);
            $duration = strpos($duration, ' ') !== false ? substr($duration, 0, strpos($duration, ' ')) : $duration;
            if (strpos($duration, '-') !== false) {
                //var_dump($duration);
                list($start, $end) = explode('-', $duration);
            } else {
                $start = $duration;
                $end = $duration;
            }
            $start = $pInfo['reign_start'];
            $end = $pInfo['reign_end'];
            $seStr = '';
            $seStr = str_replace('-', '/', $start) . '-' . str_replace('-', '/', $end);
            $start = strpos(strval($start), '-') !== false ? substr($start, 0, strpos($start, '-')) : $start;
            $end = strpos(strval($end), '-') !== false ? substr($end, 0, strpos($end, '-')) : $end;
            //var_dump($seStr);
            //$start = str_replace(['公元前', '年', '约', '前'], ['', '', '', '-'], $start);
            //$end = str_replace(['年', '约', '前'], ['', '', '-'], $end);
            //$start = -intval($start);
            //$end = -intval($end);
            $birthYear = $pInfo['birth_year'] ?? 0;
            $birthYear = str_replace(['c.'], [''], strval($birthYear));
            $deathYear = $pInfo['death_year'] ?? $end;
            $pInfo['notes'] = array_merge([$pInfo['notes']], $pInfo['key_events'] ?? []);
            if (isset($pInfo['death_cause']) && $pInfo['death_cause'] != '自然死亡') {
            //$pInfo['notes'][] = $pInfo['death_cause'];
            }
            //print_R($pInfo);
            $description = isset($pInfo['notes']) ? (is_array($pInfo['notes']) ? implode('；', $pInfo['notes']) : $pInfo['notes']) : '';
            $birthMonth = $birthDay = $deathMonth = $deathDay = 0;
            list($birthYear, $birthMonth, $birthDay) = explode('-', str_replace('-0', '-', $pInfo['birth_date']));
            list($deathYear, $deathMonth, $deathDay) = explode('-', str_replace('-0', '-', $pInfo['death_date']));
            /*if (strpos($pInfo['reign_end'], '-') !== false) {
                list($deathYear, $deathMonth, $deathDay) = explode('-', str_replace('-0', '-', $pInfo['reign_end']));
            }*/
            $extDatas = ['英文名' => $pInfo['英文名'] ?? ''];
            //if (isset($pInfo['relationship'])) {
            if (isset($pInfo['relationship'])) {
                $extDatas['世系'] = $pInfo['relationship'];
            }
            //$extDatas['头衔'] = $pInfo['title'];
            if (isset($pInfo['nickname'])) {
                $extDatas['别名'] = $pInfo['nickname'];
            }
            if (isset($pInfo['death_cause'])) {
                $extDatas['死因'] = $pInfo['death_cause'];
            }
            $gStr .= $this->_dealFigureGather($code, $nameSource, $description, $extDatas);
            //echo "{$nameSource}\n";
            echo "        '{$code}', // {$nameSource}\n";
            $sql .= "('{$code}', '{$nameSource}', '{$nameSource}', '{$dynasty}', '{$baiduUrl}', '君主', '{$extStr}', '{$gPath}', '', '{$birthYear}', '{$birthMonth}', '{$birthDay}', '{$deathYear}', '{$deathMonth}', '{$deathDay}', '', '{$description}'),\n";
            $pSql .= "('emperor', '{$dynasty}', '{$code}', 200, {$start}, {$end}, '{$seStr}', '{$typeExt}'),\n";
        }
        echo trim($sql, ",\n") . ";\n";
        echo trim($pSql, ",\n") . ";\n";
        $fFile = "/data/database/knowledge/{$gPath}.php";
        $createFile = request('create_file');
        if ($createFile) {
            file_put_contents($fFile, "<?php\nreturn [\n{$gStr}\n];");
        }
        echo $gStr;
    }

    public function _dealFigureGather($code, $name, $description, $bInfos = [])
    {
        $gStr = '';
        $gStr .= "// {$name}\n";
        $gStr .= "'{$code}' => [\n";
        $gStr .= "'baseData' => [\n'infos' => [\n";
        foreach ($bInfos as $key => $value) {
            $gStr .= "    '{$key}' => '{$value}',\n";
        }
        $gStr .= "],\n],\n\n";
        $gStr .= "'singleText' => [\n    '{$description}',\n],\n\n";
        //$gStr .= "'extDetails' => [\n],\n";
        $gStr .= "],\n\n";
        return $gStr;
    }

    public function _testDealFigure()
    {
        /*$datas = $this->getModelObj('countryListing')->where(['catalog_code' => 'chunqiuzhanguo'])->get();
        $datas = $this->getModelObj('countryListing')->where(['catalog_code' => 'nanchao'])->get();
        foreach ($datas as $data) {
            if (in_array($data['country_code'], ['xiaoliang', 'nanchen'])) {
                continue;
            }
            $where = ['path_label' => '', 'path_gather' => '', 'path_point' => ''];
            $country = $this->getModelObj('country')->where(['code' => $data['country_code']])->first();
            $uData = [
                'path_label' => '君主',
                'path_gather' => '其他',
                'path_point' => '古代中国/魏晋南北朝/南朝/' . $country['name'] . '/君主',
            ];
            $count = $this->getModelObj('figure')->where(['country_code' => $data['country_code']])->where($where)->count();
            //$count = $this->getModelObj('figure')->where(['country_code' => $data['country_code']])->where($where)->update($uData);
            var_dump($count);
            print_r($uData);
        }
        exit();*/
        $figures = $this->getModelObj('figure')->where(['country_code' => 'beiliang', 'path_label' => '君主', 'path_gather' => '其他'])->orderBy('id', 'asc')->get();
        $figures = $this->getModelObj('period')->where(['country_code' => 'us'])->orderBy('start_year', 'desc')->get();
        //echo $figures->count();
        $gStr = '';
        $i = 49;
        foreach ($figures as $figure) {
            $figure = $this->getModelObj('figure')->where(['code' => $figure['figure_code']])->first();
                $point = '独霸和没落';
                //$point = '二战和冷战';
                //$point = '繁荣和萧条';
                //$point = '南北战争';
                //$point = '建国和扩张';
            if (empty($figure) || $figure->path_gather != $point) {
                //continue;
            }
            /*$point = '';
            if ($i > 43) {
                $point = '独霸和没落';
            } else if ($i > 33) {
                $point = '二战和冷战';
            } else if ($i > 22) {
                $point = '繁荣和萧条';
            } else if ($i > 11) {
                $point = '南北战争';
            } else {
                $point = '建国和扩张';
            }*/
                //var_dump($point . '-' . $figure['name']);
            $i--;
            //echo "UPDATE `wp_figure` SET `path_label` = '总统', `path_gather` = '{$point}', `path_point` = '大国和组织/美国/人物/总统/{$point}' WHERE `code` = '{$figure['code']}';\n";
            $fullPath = $figure->fullKnowledgePath;
            if (file_exists($fullPath)) {
            //echo "'{$figure['code']}',";
                var_dump($fullPath);
            }
            //echo "<a href='{$figure['baidu_url']}' target='_blank'>{$figure['name']}</a><br />";
            //echo "        '{$figure['code']}', // {$figure['name']}\n";
            $gStr .= $this->_dealFigureGather($figure['code'], $figure['name'], '');
        }
        echo $gStr;
        $fFile = "/data/database/knowledge/大国和组织/美国/人物/总统/{$point}.php";
        var_dump($fFile);
        //file_put_contents($fFile, "<?php\nreturn [\n{$gStr}\n];");
        exit();
    }

    public function _testDealhtml()
    {
        $pointMark = request()->input('point_mark');
        $file = '/tmp/a.html';
        $crawler = new Crawler();
        $content = file_get_contents($file);
        $crawler->addContent($content);
        $fMark = 'tr';
        //$fMark = '.para_ExsgO';
        //$fMark = '.dpu8C';

        $subMark = 'td';
        //$subMark = '.para_ExsgO';
        $noSubElem = false;
        //$noSubElem = true;

        $datas = [];
        $crawler->filter($fMark)->each(function ($crawler) use (& $datas, $subMark, $noSubElem) {
            if ($noSubElem) {
                $datas[] = $this->_formatCrawlerData($crawler);
                return true;
            }

            $data = [];
            $i = 0;
            $crawler->filter($subMark)->each(function ($subCrawler) use (& $data, & $i) {
                $data[$i] = $this->_formatCrawlerData($subCrawler);
                $i++;
                return ;
            });
            if (!empty($data)) {
                $datas[] = $data;
            }
        });
        //print_r($datas);exit();
        //$datas = array_reverse($datas);
        $this->_dealCrawlerData($datas);
        exit();
        var_export($datas);exit();
    }

    protected function _dealCrawlerData($datas)
    {
        $sql = "INSERT INTO `wp_affair` (`affair_type`, `accurate`, `year`, `month`, `day`, `name`, `country_code`, `title`, `brief`, `baidu_url`) VALUES\n";
        $fSql = "INSERT INTO `wp_figure` (`code`, `name`, `name_card`, `country_code`, `description`, `baidu_url`, `path_label`, `path_gather`, `path_point`, `birth_accurate`, `birth_year`, `birth_month`, `birth_day`, `death_accurate`, `death_year`, `death_month`, `death_day`, `active_at`) VALUES\n";
        $fSql = "INSERT INTO `wp_figure` (`code`, `name`, `name_card`, `country_code`, `native_place`, `baidu_url`) VALUES\n";
        foreach ($datas as $key => $subData) {
            if ($key == 0) {
                continue;
            }
            //print_r($data);exit();
            $data = [];
            if (count($subData) > 2) {
                $data[0] = $subData[3];
                $data[1] = $subData[4];
            } else {
                $data = $subData;
            }
            //print_r($data);
            $name = $data[0]['text'];
            $code = CommonTool::getSpellStr($name, '');
            echo "        '{$code}', // {$name},\n";
            $nativePlace = $data[1]['text'] ?? '';
            //print_r($data[0]);
            $baiduUrl = isset($data[0]['urls'][0]) ? $data[0]['urls'][0][$name] : '';
            $exist = $this->getModelObj('figure')->where(['name' => $name])->first();
            if (!empty($exist)) {
                continue;
            var_dump($code . '-' . $name . '-' . $baiduUrl);
            }
            //print_r($data);
            $fSql .= "('{$code}', '{$name}', '{$name}', 'beiyang', '{$nativePlace}', '{$baiduUrl}'),\n";

        }
        echo $fSql;exit();
        echo $sql;
    }

    protected function _formatCrawlerData($crawler)
    {
        $urls = [];
        $crawler->filter('a')->each(function ($aCrawler) use (& $urls) {
            $name = $aCrawler->text();
            $url = urldecode($aCrawler->attr('href'));
            if (strpos($url, '?') !== false) {
                $url = substr($url, 0, strpos($url, '?'));
            }
            $urls[] = [$name => 'https://baike.baidu.com/' . trim($url, '/')];
        });

        $htmlContent = $crawler->text();
        //$htmlContent = strip_tags($htmlContent, '</a>');
        return ['text' => $htmlContent, 'urls' => $urls];
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
            //$this->getModelObj('navsort')->create($nData);
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
                //$this->getModelObj('navsort')->create($nsData);
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
                    //$this->getModelObj('navsort')->create($nssData);
                }
                }
            }
            //print_r($nInfo);
        }
        print_R($navs);
        exit();
    }

    public function _testFormatData()
    {
        /*$info = $this->getModelObj('figure')->where(['code' => 'mghubilie'])->first();
        $r = $info->formatCacheData();
        print_r($r);exit();*/

        $service = $this->getServiceObj('formatData');
        //$service->_initCenturyData();exit();
        //$service->_initAnnalsData();exit();
        //$service->initPeriodData();exit();
        $service->initEmperorData();

        //$service->_initBaseData();exit();
        $sort = request()->input('sort');
        $method = 'deal' . ucfirst($sort);
        $params = request()->all();
        $service->$method($params);
        exit();
        //$service->initFigureDatas();exit();
        //$service->formatBaikeDatas();exit();
        //$service->initDateData();exit();
    }

    public function _test()
    {
        echo 'test';
        exit();
    }
}
