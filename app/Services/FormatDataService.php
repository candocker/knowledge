<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

class FormatDataService extends AbstractService
{
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
                . "            'major' => ''\n"
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
