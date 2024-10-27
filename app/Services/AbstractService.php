<?php
declare(strict_types = 1);

namespace ModuleKnowledge\Services;

use Framework\Baseapp\Services\AbstractService as AbstractServiceBase;

abstract class AbstractService extends AbstractServiceBase
{
    protected function getAppcode()
    {
        return 'knowledge';
    }

    public function getBookReadUrl($info, $isMobile)
    {
        $bCode = $info['code'];
        if ($info['is_ancientread']) {
            $url = "http://read.canliang.wang/book-{$bCode}";
        } elseif ($info['is_onlineread']) {
            $url = $isMobile ? "http://book.canliang.wang/pages/book/info?book_code={$bCode}" : "/{$bCode}/list.html";
        } else {
            $url = '';
        }
        return $url ? "<a href='{$url}'>在线阅读</a>" : '';
    }
}
