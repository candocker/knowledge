<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Controllers;

use Swoolecan\Foundation\Helpers\CommonTool;

trait TraitTestStarmap
{
    public function _testDealxt()
    {
        $datas = file_get_contents('/tmp/xt.json');
        $datas = json_decode($datas, true);
        $datas = $datas['data']['list'];
        //$datas = array_reverse($datas);

        $eNames = ['二十', '十九', '十八', '十七', '十六', '十五', '十四', '十三', '十二', '十一', '十', '九', '八', '七', '六', '五', '四', '三', '二', '一'];
        $sql = "INSERT INTO `wp_muwiki` (`sort`, `code`, `name`, `description`, `baidu_url`, `path_point`) VALUES \n";
        $listStr = '';
        $ufSql = '';

        $i = 20;
        foreach ($datas as $index => $data) {
            //print_r($data);
            $name = $data['lemmaTitle'];
            $baiduUrl = "https://baike.baidu.com/item/{$name}/{$data['lemmaId']}";
            $description = $data['summary'];
            //$description = '';

            $picture = $data['coverPic'];
            if (strpos($picture, ',') !== false) {
                $picture = substr($picture, 0, strpos($picture, ','));
            }
            $newData = [
                //'code' => 'gcdqgdbdh_' . $i,
                //'title' => $name,
                //'name' => $eNames[$index] . '大',
                'name' => $name,
                'baidu_url' => $baiduUrl,
                'description' => $description,
                'picture' => $picture,
            ];
            $ufSql .= $this->_dealFigure($newData);
            //$sql .= $this->_dealMuwiki($newData, 'sql');
            //$listStr .= $this->_dealMuwiki($newData);
            $i--;
        }
        echo trim($ufSql, ",\n") . ";\n\n";
        //echo trim($sql, ",\n") . ";\n\n";
        echo $listStr;
        exit();
    }

    public function _dealMuwiki($data, $type = '')
    {
        $sql = "INSERT INTO `wp_muwiki` (`sort`, `code`, `name`, `description`, `baidu_url`,) VALUES \n";
        if ($type == 'sql') {
            return "('zggcd', '{$data['code']}', '{$data['name']}', '', '{$data['baidu_url']}', '中国/中国共产党/全国代表大会/{$data['name']}/{$data['name']}'),\n";
        }
        $str = "        [\n";
        $str .= "            'mCode' => '{$data['code']}',\n";
        $str .= "            'attend_num' => '',\n";
        $str .= "            'party_member' => '',\n";
        $str .= "            'begin' => '',\n";
        $str .= "            'major' => '{$data['description']}',\n";
        $str .= "        ],\n";
        return $str;
    }

    public function _dealFigure($data)
    {
        if ($data['name'] == '蔡和森') {
            print_r($data);
        }
        $exist = $this->getModelObj('figure')->where(['name' => $data['name'], 'baidu_url' => ''])->first();
        if ($exist) {
            $sql = "UPDATE `wp_figure` SET `baidu_url` = '{$data['baidu_url']}', `baidu_picture` = '{$data['picture']}' WHERE `code` = '{$exist['code']}';\n";
            return $sql;
        } else {
            //print_r($data);
        }
    }
}
