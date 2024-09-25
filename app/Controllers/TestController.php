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

    public function _testDealancient()
    {
        $basePath = config('knowledge.material_path');
        $books = require($basePath . "booklist/index.php");
        $columes = [0 => 196, 1 => 197, 2 => 198];
        foreach ($books['chapters'] as $index => $datas) {
            $i = 1;
            foreach ($datas['books'] as $bCode => $bData) {
                if (in_array($bCode, ['yijing', 'shijing', 'daodejing'])) {
                    continue;
                }
                var_dump($bCode);
                /*$chapters = require($basePath . "booklist/{$bCode}_catalogue.php");
                $chapterInfos = require($basePath . "booklist/{$bCode}.php");
                foreach ($chapterInfos as $cInfo) {
                    $i = 1;
                    foreach ($cInfo as $cData) {
                        print_r($cData);
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
                }
                //print_r($chapters);
                //print_r($chapterInfos);*/

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
        exit();
        print_r($books);exit();
    }

    public function _test()
    {
        echo 'test';
        exit();
    }
}
