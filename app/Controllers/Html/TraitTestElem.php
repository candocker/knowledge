<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Controllers\Html;

use Swoolecan\Foundation\Helpers\CommonTool;

trait TraitTestElem
{
    public function getTestElemDatas()
    {
        $showSource = request()->input('show_source');
        $datas = [];
        $sourceContent = '';
        foreach ($this->getElemDatas() as $elem) {
            $file = '/data/database/knowledge/sourcefile/elems/' . $elem . '.php';
            $cDatas = require($file);
            foreach ($cDatas as $key => $value) {
                if (strpos($key, '_source') !== false) {
                    unset($cDatas[$key]);
                    $sourceContent .= "{$elem}-{$key}\n\n";
                    $sourceContent .= $value . "\n\n";
                }
            }
            $datas = array_merge($datas, $cDatas);
        }
        if ($showSource) {
            echo $sourceContent;exit();
        }
        return $datas;
    }

    public function getElemDatas()
    {
        return [
            'page_data', 'base_data', 'simple-text', 'image', 'common_fix_table', 'common_table',
            'timeline', 'simple_table', 'simple_fixed',
        ];
    }
}
