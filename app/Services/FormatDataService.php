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
}
