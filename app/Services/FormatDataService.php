<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

class FormatDataService extends AbstractService
{
    use FormatAnnalTrait;
    use FormatDateRangeTrait;

    public function dealChapter($params)
    {
        $bookCode = $params['book_code'] ?? '';
        $str = '';
        //$infos = $this->getModelObj('chapter')->where('book_code', $bookCode)->where('code', '<>', '')->orderBy('serial')->get();
        $infos = $this->getModelObj('chapter')->where('book_code', $bookCode)->orderBy('serial')->get();
        $i = 1;
        $namePre = '';
        $names = [
            '国风' => '15',
            '小雅' => '8',
            '大雅' => '3',
            '颂' => '3',
        ];
        $nameFulls = [
            '国风' => '<a href="https://baike.baidu.com/item/国风/4588">国风</a>',
            '小雅' => '<a href="https://baike.baidu.com/item/诗经·小雅/4061775">小雅</a>',
            '大雅' => '<a href="https://baike.baidu.com/item/诗经·大雅/6000551">大雅</a>',
            '颂' => '<a href="https://baike.baidu.com/item/颂/20121717">颂</a>',
        ];
        $j = 0;
        foreach ($infos as $info) {
            if ($info['chapter_type'] == 'top') {
                //$number = $names[$info['name']];
                $namePre = $info['name'];
                $j = 1;
                continue;
            }
            if (empty($info['code'])) {
                $str .= "    ],\n";
                $str .= "],\n";
                $str .= "'yijing_{$info['id']}' => [\n";
                $str .= "    'name' => '<a href=\"h\">{$info['name']}</a>·{$namePre}',\n";
                $str .= "    'titles' => ['serial' => '序号', 'name' => '名称', 'major' => '简介'],\n";
                $str .= "    'fixTitleField' => 'name',\n";
                $str .= "    'brief' => '',\n";
                $str .= "    'baseInfos' => [\n";
                $j++;
            } else {
                $str .= "        [\n"
                    . "            'serial' => '{$i}',\n"
                    . "            'name' => '<a href=\"h\">{$info['name']}</a>',\n"
                    . "            'major' => '{$info['brief']}',\n"
                    . "        ],\n";
                $i++;
            }
        }
        echo $str;
        exit();
    }

    public function dealBook($params)
    {
        $catalogCode = $params['catalog_code'] ?? '';
        $bigInfos = $this->getModelObj('bookVolume')->where(['catalog_code' => $catalogCode])->get();
        $str = '';
        foreach ($bigInfos as $bigInfo) {
            $infos = $this->getModelObj('bookListing')->where('catalog_volume_id', $bigInfo['id'])->orderBy('serial')->get();
            foreach ($infos as $info) {
                $book = $info->bookInfo;
                $code = $book['code'];
                $name = "<a href=\"/wiki-book-{$code}.html\">{$book['name']}</a>";
                $author = $book->authorData();
                $authorName = '';
                if ($author && $author->name) {
                    $authorName = "<a href=\"/wiki-figure-{$author['code']}.html\">{$author['name']}</a>";
                }
                $str .= "        [\n"
                    . "            'name' => '{$name}',\n"
                    //. "            'author' => '{$authorName}',\n"
                    . "            'major' => '',\n"
                    . "        ],\n";
            }
        }
        echo $str;
        exit();
    }

    public function dealEmperor($params)
    {
        $dynasty = $params['dynasty'] ?? '';
        $sql = "SELECT * FROM `online_knowledge`.`ztmp_wp_emperor` WHERE `dynasty` = '{$dynasty}';";
        $str = '';
        $infos = \DB::select($sql);
        foreach ($infos as $info) {
            $info = (array) $info;
            $code = $info['figure_code'];
            $figure = $this->getModelObj('figure')->where(['code' => $code])->first();
            if (empty($figure)) {
                print_r($info);
                continue;
            }
            //print_r($figure->toArray());
            $name = "<a href=\"/wiki-figure-{$code}.html\">{$figure['name']}</a>";
            $eraname = $info['eraname'] . " ({$info['office_start_end']} 年)";
            $dynastic = $info['dynastic_title'] . " ({$info['birth_death']} {$info['age']}岁)";
            $str .= "        [\n"
                . "            'name' => '{$name}',\n"
                . "            'eraname' => '{$eraname}',\n"
                . "            'dynastic' => '{$dynastic}',\n"
                . "            'major' => '',\n"
                . "        ],\n";
        }
        echo $str;
        exit();
    }

    public function dealDynasty($params)
    {
        $str = '';

        $catalogs = $this->getModelObj('countryCatalog')->where(['bigsort' => 'dynasty'])->orderBy('orderlist', 'asc')->get();
        $i = 0;
        foreach ($catalogs as $catalog) {
            $tCode = $catalog['code'];
            $subInfos = $this->getModelObj('countryListing')->where(['catalog_code' => $tCode])->orderBy('orderlist', 'asc')->get();
            foreach ($subInfos as $subInfo) {
                $i++;
                $code = $subInfo['country_code'];
                $countryInfo = $subInfo->countryInfo;
                $extName = '';//$countryInfo['baidu_url'] ? " (<a href=\"{$countryInfo['baidu_url']}\">百科</a>)" : '';

                $name = "<a href=\"/wiki-country-{$code}.html\">{$countryInfo['name']}</a>{$extName}";
                //echo $name;
                //continue;
                $str .= "        [\n"
                    . "            'name' => '{$name}',\n"
                    . "            'catalog' => '{$catalog['name']}',\n"
                    . "            'first_emperor' => '{$countryInfo['first_emperor']}',\n"
                    . "            'begin_end' => '{$countryInfo['begen_end']} (年)',\n"
                    . "            'capital' => '{$countryInfo['capital']}',\n"
                    . "            'brief' => '{$countryInfo['brief']}',\n"
                    . "            'baidu_url' => '<a href=\"{$countryInfo['baidu_url']}\">百科</a>',\n"
                    . "        ],\n";
            }
        }
        var_dump($i);
        echo $str;
        exit();
    }

    public function dealCountryold($params)
    {
        $str = '';
        $i = 0;
        $catalogs = $this->getModelObj('countryCatalog')->where(['bigsort' => 'gdempire'])->orderBy('orderlist', 'asc')->get();
        foreach ($catalogs as $catalog) {
            $tCode = $catalog['code'];
            $subInfos = $this->getModelObj('countryListing')->where(['catalog_code' => $tCode])->orderBy('orderlist', 'asc')->get();
            $cextName = " (<a href=\"{$catalog['baidu_url']}\">百科</a>)";
            $cName = "<a href=\"/wiki-countrycatalog-{$catalog['code']}.html\">{$catalog['name']}</a>{$cextName}";
            $str .= "        [\n";
            $str .= "            'catalog' => '{$cName}',\n";
            $str .= "            'detail' => implode('<span style=\"padding:8px;\"></span>', [\n";
            echo "                '{$cName}',\n";
            //continue;
            foreach ($subInfos as $subInfo) {
                $i++;
                $code = $subInfo['country_code'];
                $countryInfo = $subInfo->countryInfo;
                if (empty($countryInfo)) {
                    //print_r($catalog->toArray());
                    //var_dump($subInfo->toArray());
                    continue;
                }
                $extName = $countryInfo['baidu_url'] ? " (<a href=\"{$countryInfo['baidu_url']}\">百科</a>)" : '';

                $name = "                '<a href=\"/wiki-country-{$code}.html\">{$countryInfo['name']}</a>{$extName}',\n";
                //$name = "<a href=\"/wiki-country-{$code}.html\">{$countryInfo['name']}</a>{$extName}";
                $str .= $name;
                continue;
                $str .= "        [\n"
                    . "            'name' => '{$name}',\n"
                    . "            'catalog' => '{$catalog['name']}',\n"
                    . "            'first_emperor' => '{$countryInfo['first_emperor']}',\n"
                    . "            'begin_end' => '{$countryInfo['begen_end']} (年)',\n"
                    . "            'capital' => '{$countryInfo['capital']}',\n"
                    . "            'brief' => '{$countryInfo['brief']}',\n"
                    . "            'baidu_url' => '<a href=\"{$countryInfo['baidu_url']}\">百科</a>',\n"
                    . "        ],\n";
            }
            $str .= "            ]),\n";
            $str .= "        ],\n";
        }
            $str .= "    ],\n";
        var_dump($i);
        echo $str;
        exit();
    }

    public function dealCountry($params)
    {
        $str = '';

        $bigs = $this->getModelObj('countryCatalog')->where(['bigsort' => 'region', 'parent_code' => ''])->orderBy('orderlist', 'asc')->get();
        $i = 0;
        $str = '';
        foreach ($bigs as $big) {
            $cextName = " (<a href=\"{$big['baidu_url']}\">百科</a>)";
            $cName = "<a href=\"/wiki-countrycatalog-{$big['code']}.html\">{$big['name']}</a>{$cextName}";
            $str .= "    'name' => '{$cName}',\n";
            $str .= "    'baseInfos' => [\n";
        $catalogs = $this->getModelObj('countryCatalog')->where(['bigsort' => 'region', 'parent_code' => $big['code']])->orderBy('orderlist', 'asc')->get();
        foreach ($catalogs as $catalog) {
            $tCode = $catalog['code'];
            $subInfos = $this->getModelObj('countryListing')->where(['catalog_code' => $tCode])->orderBy('orderlist', 'asc')->get();
            $cextName = " (<a href=\"{$catalog['baidu_url']}\">百科</a>)";
            $cName = "<a href=\"/wiki-countrycatalog-{$catalog['code']}.html\">{$catalog['name']}</a>{$cextName}";
            $str .= "        [\n";
            $str .= "            'catalog' => '{$cName}',\n";
            $str .= "            'detail' => implode('<span style=\"padding:8px;\"></span>', [\n";
            echo "                '{$cName}',\n";
            //continue;
            foreach ($subInfos as $subInfo) {
                $i++;
                $code = $subInfo['country_code'];
                $countryInfo = $subInfo->countryInfo;
                if (empty($countryInfo)) {
                    //print_r($catalog->toArray());
                    //var_dump($subInfo->toArray());
                    continue;
                }
                $extName = $countryInfo['baidu_url'] ? " (<a href=\"{$countryInfo['baidu_url']}\">百科</a>)" : '';

                $name = "                '<a href=\"/wiki-country-{$code}.html\">{$countryInfo['name']}</a>{$extName}',\n";
                //$name = "<a href=\"/wiki-country-{$code}.html\">{$countryInfo['name']}</a>{$extName}";
                $str .= $name;
                continue;
                $str .= "        [\n"
                    . "            'name' => '{$name}',\n"
                    . "            'catalog' => '{$catalog['name']}',\n"
                    . "            'first_emperor' => '{$countryInfo['first_emperor']}',\n"
                    . "            'begin_end' => '{$countryInfo['begen_end']} (年)',\n"
                    . "            'capital' => '{$countryInfo['capital']}',\n"
                    . "            'brief' => '{$countryInfo['brief']}',\n"
                    . "            'baidu_url' => '<a href=\"{$countryInfo['baidu_url']}\">百科</a>',\n"
                    . "        ],\n";
            }
            $str .= "            ]),\n";
            $str .= "        ],\n";
        }
            $str .= "    ],\n";
        }
        var_dump($i);
        echo $str;
        exit();
    }
}
