<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Repositories;

class BookCatalogRepository extends AbstractRepository
{
    protected function _sceneFields()
    {
        return [
            'list' => ['id', 'name'],
            'listSearch' => ['id', 'name'],
            'add' => ['name'],
            'update' => ['name'],
        ];
    }

    public function getShowFields()
    {
        return [
            //'type' => ['valueType' => 'key'],
        ];
    }

    public function getSearchFields()
    {
        return [
            //'type' => ['type' => 'select', 'infos' => $this->getKeyValues('type')],
        ];
    }

    public function getFormFields()
    {
        return [
            //'type' => ['type' => 'select', 'infos' => $this->getKeyValues('type')],
        ];
    }

    protected function _statusKeyDatas()
    {
        return [
            0 => '未激活',
            1 => '使用中',
            99 => '锁定',
        ];
    }

    public function _sortKeyDatas()
    {
        return [
            'classical' => '经典古籍',
            'luxun' => '鲁迅著作',
            'scholarism' => '学术名著',
            'famous' => '名家名作',
        ];
    }

    public function getBookCatalogDatas($pointCodes)
    {
        $pointSortStr = implode(",", $pointCodes);
        $infos = $this->whereIn('code', $pointCodes)->orderByRaw("FIND_IN_SET(code, '{$pointSortStr}') asc")->get();
        $datas = $this->getCollectionObj($infos, 'frontInfo');
        return $datas;
    }
}
