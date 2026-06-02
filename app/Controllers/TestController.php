<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Controllers;

use Symfony\Component\DomCrawler\Crawler;
use Swoolecan\Foundation\Helpers\CommonTool;
use Carbon\Carbon;

class TestController extends AbstractController
{
    use TraitTestFigure;
    use TraitTestStarmap;

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

    public function _testBooks()
    {
        $path = '/data/database/books/文集/李敖/ebook';
        $books = array_diff(scandir($path), ['..', '.']);
        $results = [];
        foreach ($books as $book) {
            $fPath = $path . '/' . $book;
            $files = array_diff(scandir($fPath), ['..', '.']);
            $results[$book] = array_values($files);
        }
        $sql = "INSERT INTO `wp_book` (`code`, `category`, `name`, `book_path`, `author`, `is_onlineread`, `created_at`, `updated_at`) VALUES \n";
        $sql = "INSERT INTO `wp_chapter` (`code`, `chapter_type`, `serial`, `book_code`, `name`, `created_at`, `updated_at`) VALUES \n";
        $sql = '';
        $command = '';
        foreach ($results as $book => $chapters) {
            $code = CommonTool::getSpellStr($book, '');
            foreach ($chapters as $chapter) {
                if ($chapter == 'index.txt') {
                    continue;
                }
                $cStr = "<?php\nreturn [\n'title' => '',\n'description' => '',\n'chapters' => [\n";
                $fullFile = $path . '/' . $book . '/' . $chapter;
                $content = file($fullFile);
                $content = array_map(function($line) use (& $cStr) {
                    $line = mb_convert_encoding($line, 'UTF-8', 'GBK');
                    $line = trim($line);
                    $line = str_replace(['　', "'"], ['', '"'], $line);
                    if (!in_array($line, ['', '李敖研究网发布', '蛋蛋 制作', '目录页', '下一页', '目录页 下一页', '上一页', '上一页 目录页', '上一页 目录页 下一页'])) {
                        $cStr .= "[\n    'content' => [\n        '{$line}',\n    ],\n],\n";
                    }
                    //var_dump($line);
                    return $line;

                }, $content);
                //echo $cStr;
                $cStr .= "],\n];";
                $cCode = str_replace('.txt', '.php', $chapter);
                $tFile = '/data/database/books/文集/李敖/' . $book . '/' . $cCode;
                //file_put_contents($tFile, $cStr);
                var_dump($book . '-' . $code);
                //print_r($content);exit();
            }
            continue;


            $cFile = $path . '/' . $book . '/index.txt';
            $lines = file($cFile);
            $lines = array_map(function($line) {
                return mb_convert_encoding($line, 'UTF-8', 'GBK');
            }, $lines);
            //$sql .= "('{$code}', 'liaozhi', '{$book}', '文集/李敖/{$book}', 'liaozhi', 1, NOW(), now()),\n";
            //var_dump($book);
            //print_r($chapters);
            $i = 1;
            foreach ($lines as $lKey => $line) {
                $line = trim($line);
                $cCode = $chapters[$lKey + 1];
                $cCode = str_replace('.txt', '', $cCode);
                $serial = $i * 10;
                //$sql .= "('{$cCode}', 'common', '{$serial}', '{$book}', '{$line}', NOW(), now()),\n";
                $i++;
                //var_dump($lKey . '-' . $line . '=' . $cTitle);
            }
            exit();
            $sql .= "UPDATE `wp_chapter` SET `book_code` = '{$code}' WHERE `id` >= 10525 AND `book_code` = '{$book}';\n";
            //$command .= "mkdir /data/database/books/文集/李敖/{$book};\n";
            //print_r($lines);
        }
        //echo $command;
        echo $sql;
        //print_r($results);

        //print_r($books);
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
        $service = $this->getServiceObj('formatData');
        //$service->_initCenturyData();exit();
        $service->initEmperorData();

        //$service->_initBaseData();exit();
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

    public function _testTmp()
    {
        /*$info = $this->getModelObj('figure')->where(['code' => 'mghubilie'])->first();
        $r = $info->formatCacheData();
        print_r($r);exit();*/

        $basePath = $this->config->get('knowledge.knowledge_path');
        $rPath = '/data/htmlwww/resource/';
        $command = '';

        //$sql = file_get_contents('/tmp/sql.sql');
        //\DB::connection('knowledge')->select($sql);exit();
    }
}
