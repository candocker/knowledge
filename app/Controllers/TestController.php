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
        /*$figures = $this->getModelObj('figure')->where(['country_code' => 'egypter'])->orderBy('id', 'asc')->get();
        $gStr = '';
        foreach ($figures as $figure) {
            $gStr .= $this->_dealFigureGather($figure['code'], $figure['name'], '');
        }
        echo $gStr;
        exit();*/
        $dynasty = 'egyptshiyi';
        $gPath = '帝国历史/尼罗河流域/埃及第十一王朝/法老';
        //print_r($datas);
        $sql = "INSERT INTO `wp_figure` (`code`, `name`, `name_card`, `country_code`, `baidu_url`, `description`, `baidu_picture`, `path_gather`, `path_point`) VALUES \n";
        $gStr = '';
        $eCodes = ['mentuhotep1', 'intef1', 'intef2', 'intef3', 'mentuhotep2', 'mentuhotep3', 'mentuhotep4'];
        foreach ($datas as $index => $data) {
            //print_r($data);
            $name = $data['lemmaTitle'];
            $code = $eCodes[$index] ?? CommonTool::getSpellStr($name, '');
            echo "        '{$code}', // {$name}\n";
            //continue;
            $exist = $this->getModelObj('figure')->where(['code' => $code])->first();
            if ($exist) {
                var_dump($name);
            }
            $baiduUrl = "https://baike.baidu.com/item/{$name}/{$data['lemmaId']}";
            $picture = $data['coverPic'];
            $description = $data['summary'];
            //var_dump($picture);
            if (strpos($picture, ',') !== false) {
                $picture = substr($picture, 0, strpos($picture, ','));
            }
            //var_dump($picture);
            $sql .= "('{$code}', '{$name}', '{$name}', '{$dynasty}', '{$baiduUrl}', '', '{$picture}', '法老', '{$gPath}'),\n";
            $gStr .= $this->_dealFigureGather($code, $name, $description);
        }
        echo $gStr;
        echo $sql;
    }

    public function _dealFigureGather($code, $name, $description)
    {
        $gStr = '';
        $gStr .= "// {$name}\n";
        $gStr .= "'{$code}' => [\n";
        //$gStr .= "'baseData' => [\n'infos' => [\n],\n],\n\n";
        $gStr .= "'singleText' => [\n    '{$description}',\n],\n\n";
        //$gStr .= "'extDetails' => [\n],\n";
        $gStr .= "],\n\n";
        return $gStr;
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
        print_r($datas);exit();
        //$datas = array_reverse($datas);
        $this->_dealCrawlerData($datas);
        exit();
        var_export($datas);exit();
    }

    protected function _dealCrawlerData($datas)
    {
        $sql = "INSERT INTO `wp_affair` (`affair_type`, `accurate`, `year`, `month`, `day`, `name`, `country_code`, `title`, `brief`, `baidu_url`) VALUES\n";
        $fSql = "INSERT INTO `wp_figure` (`code`, `name`, `name_card`, `country_code`, `description`, `baidu_url`, `path_label`, `path_gather`, `path_point`, `birth_accurate`, `birth_year`, `birth_month`, `birth_day`, `death_accurate`, `death_year`, `death_month`, `death_day`, `active_at`) VALUES\n";
        foreach ($datas as $key => $data) {
            //print_r($data);
            $sql .= "('', '', 1380, 0, 0, '', '', '', '{$data['text']}', ''),\n";

        }
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
        //$htmlContent = strip_tags($htmlContent, '<a>');
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
