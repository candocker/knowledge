<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Controllers;

class MuwikiCatalogController extends AbstractController
{
    public function readerChapterDetail()
    {
        $bookCode = $this->request->input('book_code');
        $chapterCode = $this->request->input('chapter_code');

        $datas = $this->getServiceObj('book')->getChapterDetail($bookCode, $chapterCode, 'string');
        return $this->success($datas);
    }

    public function globalSetting()
    {
        return $this->getContentData('muwiki_catalog', 'global', 'setting');
    }

    protected function getContentData($app, $module, $action, $returnType = null)
    {
        $file = base_path() . "/vendor/candocker/website/resources/thirddata/{$app}/{$module}-{$action}.json";
        $text = file_get_contents($file);
        $data = json_decode(trim($text), true);
        //var_export($data);exit();
        if ($returnType == 'array') {
            return $data;
        }
        return $this->successCustom($data);
    }
}
