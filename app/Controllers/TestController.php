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

        //$infos = $this->getModelObj('resourceDetail')->where('filepath', '<>', '')->where('resource_type', '')->limit(500)->get();
        /*$infos = $this->getModelObj('resourceDetail')->where('filepath', '<>', '')->where('file_hash', '<>', '')->limit(1500)->get();
        foreach ($infos as $info) {
            $attachment = $this->getModelObj('passport-attachment')->where(['id' => $info['old_id']])->first();
            if (empty($attachment)) {
                print_r($info->toArray());
                continue;
            }
            $attachment->extfield = 'dealed';
            $attachment->save();
            continue;
            //$file = 'http://ossfile.canliang.wang/' . $attachment['filepath'];
            $file = $basePath . $info['filepath'];
            $fileHash = $service->createFileHash($file);
            $info->file_hash = $fileHash;
            //$info->resource_type = $fileHash;
            var_dump($fileHash . '--' . $file);
            $info->save();
        }
        exit();*/

        /*$infos = $this->getModelObj('resourceDetail')->where('filepath', '')->where(['tag' => '人物'])->limit(1000)->get();
        //echo $infos->count();
        $command = '';
        foreach ($infos as $info) {
            $file = $basePath . $info['extfield1'];
            //var_dump($file);
            if (!file_exists($file)) {
                var_dump($file);
                //continue;
            }
            $rInfo = $this->getModelObj('resourceInfo')->where(['info_table' => 'figure', 'resource_id' => $info['id']])->first();
            if (empty($rInfo)) {
                continue;
            }
            $figure = $this->getModelObj('figure')->where(['code' => $rInfo['info_id']])->first();
            if (empty($figure)) {
                print_R($rInfo->toArray());
                print_r($info->toArray());
                continue;
            }
            $nationality = $figure['nationality'];
            $nationality = str_replace(['(苏)'], [''], $nationality);
            $nPath = in_array($nationality, ['俄罗斯', '外国历史人物', '德国', '日本', '法国', '美国', '英国']) ? $nationality : '其他';
            $newPath = str_replace(['culture/figure2', 'culture/figure','culture'], ["figure/{$nPath}", "figure/{$nPath}", "figure/{$nPath}"], $info['extfield1']);
            $newFile = $basePath . $newPath;
            if (!is_dir(dirname($newFile))) {
                //var_dump($newFile);
            }
            if (file_exists($newFile)) {
            $info->filepath = $newPath;
            $info->save();
            }
            $command .= "mv {$file} {$newFile};\n";
            //var_dump($nationality . '--' . $newPath);
            //print_r($rInfo->toArray());exit();
            //$info->save();
        }
        //echo $command;
        exit();*/

        $infos = $this->getModelObj('resourceDetail')->where(['tag' => '书籍'])->where(['filepath' => ''])->orderBy('image_model', 'asc')->limit(1000)->get();
$series = array(
'philosophy' => '哲学',
'history' => '历史·地理',
'politics' => '政治·法律·社会',
'economics' => '经济',
'language' => '语言·文艺理论',
'otheracademic' => '其他学术',
'luxunmanuscript' => '鲁迅',
'luxunsingle' => '鲁迅',
'luxunyanjiu' => '鲁迅研究',
'goodworks' => '其他著作',
'classical' => '古籍',
);
        $command = '';
        $sNums = $pathCommands = [];
        $grade = 1;
        foreach ($infos as $info) {
            $code = $info['image_model'];
            if (in_array($info['extfield1'], ['', 'no', 'nno'])) {
                continue;
            }
            if (!in_array($code, array_keys($series))) {
                continue;
            }
            if (isset($sNums[$code])) {
                $sNums[$code] += 1;
            } else {
                $sNums[$code] = 1;
            }
            $pathNum = ceil($sNums[$code] / 50);
            $newPath = 'bookcover/' . $series[$code] . '/cover' . $pathNum . '/';
            $mPath = $basePath . $newPath;
            if (!is_dir($mPath) && !in_array($mPath, $pathCommands)) {
                //$command .= "mkdir {$newPath};\n";
            }
            $pathCommands[] = $mPath;
            $old = $basePath . $info['extfield1'];
            $old = str_replace('book', 'bookbak', $old);
            if (!file_exists($old)) {
                continue;
            }
            $old = str_replace(['(', ')', ' '], ['\(', '\)', "\ "], $old);
            $newPath .= $info['filename'];
            $newPath = str_replace(['(', ')', ' '], ['\(', '\)', "\ "], $newPath);
            $new = $basePath . $newPath;
            if (file_exists($new)) {
                $info->filepath = $newPath;
                $info->save();
            } else {
                $command .= "mv {$old} {$new};\n";
            }
        }
        echo $command;
        exit();
    }

    public function _testDealbooks()
    {
        return false;
        $infos = $this->getModelObj('majorevent')->where(['code' => ''])->get();
        $results = [];
        foreach ($infos as $info) {
            $results[$info['baidu_url']][] = ['name' => $info['knowledge_path'], 'figure' => $info['brief']];
        }
        foreach ($results as $key => $books) {
            $i = 0;
            $nvData = [
                'catalog_code' => $key,
            ];
            //$nVolume = $this->getModelObj('bookVolume')->create($nvData);
            $vId = 1;//$nVolume['id'];
            $limitNum = ceil(count($books) / 3);
            var_dump($limitNum);var_dump(count($books));
            foreach ($books as $book) {
                if ($i == $limitNum) {
                    $nvData = [
                        'catalog_code' => $key,
                    ];
                    //$nVolume = $this->getModelObj('bookVolume')->create($nvData);
                    //$vId = $nVolume['id'];
                    $vId++;
                    $i = 0;
                }
                $nbData = [
                    'catalog_code' => $key,
                    'catalog_volume_id' => $vId,
                    'serial' => $i,
                    'name' => $book['name'],
                    'figure' => $book['figure'],
                ];
                //$this->getModelObj('bookListing')->create($nbData);
                print_R($nbData);

                $i++;
            }
        }
        print_r($results);
        exit();
        $infos = $this->getModelObj('bookListing')->where(['extfield' => 'have'])->get();
        $i = 1;
        foreach ($infos as $info) {
            $bInfo = $this->getModelObj('book')->where(['code' => $info['book_code']])->first();
            if (empty($bInfo)) {
                continue;
            }
            $mInfo = $this->getModelObj('majorevent')->where(['code' => $info['book_code']])->first();
            $figure = $bInfo->formatAuthorData();
            echo "$i = <a href='{$bInfo['baidu_url']}'>{$bInfo['name']}</a>-{$info['name']}-[{$info['nationality']}]{$info['author']}-{$mInfo['brief']}-{$figure}<br />";
            //echo "--------------SELECT * FROM `wp_majorevent` WHERE `knowledge_path` LIkE '%{$info['name']}%' OR `brief` LIKE '%{$info['author']}%';<br />";
            $i++;
        }
        exit();
        $swbooks = require('/data/htmlwww/laravel-system/vendor/candocker/knowledge/resources/formatdata/swbooks.php');
        //$elems = ['philosophy', 'history', 'politics', 'economics', 'language', 'otheracademic'];
        $elems = ['otheracademic'];
        foreach ($elems as $elem) {
            //$volumes = $this->getModelObj('bookVolume')->where(['catalog_code' => $elem, 'extfield' => ''])->orderBy('orderlist', 'asc')->get();
            $volumes = $this->getModelObj('bookVolume')->where(['catalog_code' => $elem])->orderBy('orderlist', 'asc')->get();
            foreach ($volumes as $volume) {
                $str = '';
                echo '<br />' . '========================' . $volume['name'];
                echo '<br />';
                $infos = $this->getModelObj('bookListing')->where(['catalog_volume_id' => $volume['id']])->get();

                foreach ($infos as $info) {
                    $name = $info['name'];
                    //$exists = $this->getModelObj('majorevent')->where(['knowledge_path' => $name])->where(['code' => ''])->get();
                    $str .= $name . '-' . '[' . $info['nationality'] . ']' . $info['author'] . '-----<br />';
                    $exists = $this->getModelObj('majorevent')->where(['knowledge_path' => $name])->get();
                    foreach ($exists as $exist) {
                        $exist->code = $info['book_code'];
                        //$exist->save();
                        //if ($exist['brief'] != '[' . $info['nationality'] . ']' . $info['author']) {
                        $str .= $exist['knowledge_path'] . '-' . $exist['brief'] . '===' . '<br />';
                        //}
                    }
                    $sql = "SELECT * FROM `wp_majorevent` WHERE `knowledge_path` LIkE '%{$name}%';";
                    $eSql = "SELECT * FROM `wp_book_listing` WHERE `name` LIkE '%{$name}%';";
                    $str .= '-----' . $sql . '    ' . $eSql . '<br />';
                    //$str .= '-----' . $eSql . '<br />';
                }
                $volume->extfield = 'dealed';
                //$volume->save();
                echo $str;
                var_dump($infos->count());
            }
            exit();
        }
        echo $str;exit();
        foreach ($swbooks as $key => $books) {
            foreach ($books as $book) {
                if (!isset($book[1])) {
                    print_r($book);
                }
            $aData = [
                'baidu_url' => $key,
                'knowledge_path' => trim($book[0]),
                'brief' => trim($book[1]),
            ];
            //$this->getModelObj('majorevent')->create($aData);
            }

            var_dump($key);
            var_dump(count($books));
        }
        print_r($swbooks);
    }

    public function _testDealancient()
    {
        $datas = require('/data/database/material/booklist/guwenguanzhi_catalogue.php');
        foreach ($datas as $data) {
            $cInfo = $this->getModelObj('chapter')->where(['book_code' => 'guwenguanzhi', 'code' => $data['code']])->first();
            if (empty($cInfo)) {
            print_r($cInfo->toArray());
            print_r($data);
            exit();
            }
            $cInfo->author = $data['author'];
            $cInfo->title = $data['nameFull'];
            $cInfo->save();
        }
        exit();
        /*$datas = require('/data/database/material/booklist/yijing_catalogue.php');
        foreach ($datas as $key => $data) {
            $info = $this->getModelObj('chapter')->where(['book_code' => 'yijing', 'code' => $key])->first();
            $info->description = implode(',', array_reverse($data['symbol']));
            $info->title = $data['brief'];
            $info->save();
            //print_r($info->toArray());
            //print_r($data);exit();
        }
        print_r($datas);
        exit();*/
        $basePath = config('knowledge.material_path');
        $books = require($basePath . "booklist/index.php");
        //print_r($books);exit();
        $columes = [0 => 196, 1 => 197, 2 => 198];
        $command = '';
        $results = [];
        foreach ($books['chapters'] as $index => $datas) {
            $i = 1;
            foreach ($datas['books'] as $bCode => $bData) {
                if (!in_array($bCode, ['shijing'])) {
                    //continue;
                }
                $results[$bCode] = [$bData['rowCount'] ?? 0, $bData['rowCountMobile'] ?? 0];

                //$command .= "cp -r /data/database/material/books/{$bCode} /data/htmlwww/resource/books/经典古籍/{$bData['name']};\n";
                //print_r($bData);
                //var_dump($bCode);
                /*$chapters = require($basePath . "booklist/{$bCode}_catalogue.php");
                $chapterInfos = require($basePath . "booklist/{$bCode}.php");
                //print_r($chapters);
                //print_r($chapterInfos);

                //foreach ($chapterInfos as $cInfo) {
                foreach ($chapterInfos['chapters'] as $cInfo) { // shijing
                    print_r($cInfo);
                    $i = 1;
                    $ncData = [
                        'code' => '',
                        'book_code' => $bCode,
                        'chapter_type' => 'top',
                        'name' => $cInfo['name'] ?? '',
                        'serial' => $i * 10,
                    ];
                    $i++;
                    $this->getModelObj('chapter')->create($ncData);
                    print_r($ncData);
                    //foreach ($cInfo as $cData) {
                    foreach ($cInfo['elems'] as $cData) { //shijing
                        $ncData = [
                            'code' => '',
                            'book_code' => $bCode,
                            'chapter_type' => 'big',
                            'name' => $cData['name'] ?? '',
                            'description' => $cData['description'] ?? '',
                            'serial' => $i * 10,
                        ];
                        $this->getModelObj('chapter')->create($ncData);
                        print_r($ncData);
                        $i++;
                        foreach ($cData['infos'] as $cCode) {
                            $ncData = [
                                'code' => $cCode,
                                'book_code' => $bCode,
                                'chapter_type' => 'common',
                                'name' => $chapters[$cCode]['name'],
                                'serial' => $i * 10,
                            ];
                            print_r($ncData);
                            $this->getModelObj('chapter')->create($ncData);
                            $i++;
                        }
                    }
                }*/

                /*$infos = $this->getModelObj('chapter')->where(['book_code' => $bCode])->get();
                var_dump(count($infos));
                if (count($infos) > 0) {
                    print_r($nData);
                }
                $bInfo = $this->getModelObj('book')->where(['code' => $bCode])->first();
                $bInfo->is_ancientread = 1;
                $bInfo->save();*/

                /*$bInfo = $this->getModelObj('book')->where(['code' => $bCode])->first();
                $nData = [
                    'book_code' => $bCode,
                    'catalog_code' => 'classicalorder',
                    'catalog_volume_id' => $columes[$index],
                    'serial' => $i,
                ];
                print_r($nData);
                $this->getModelObj('bookListing')->create($nData);
                $i++;

                if (empty($bInfo)) {
                    echo 'ssss';
                    print_r($bData);
                }*/
            }
        }
        var_export($results);
        echo $command;
        exit();
    }

    public function _test()
    {
        echo 'test';
        exit();
    }
}
