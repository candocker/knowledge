<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Resources;

class BookCatalog extends AbstractResource
{
    protected function _frontBaseArray()
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'brief' => $this->brief,
            'publish_at' => $this->publish_at,
            'book_num' => $this->book_num,
            'description' => $this->description,
            'press' => $this->getRepository()->getKeyValues('press', $this->press),
        ];
    }

    protected function _frontInfoArray()
    {
        $volumes = $this->volumes;
        $vDatas = $this->getCollectionObj($volumes, 'frontInfo', 'book_catalogVolume');
        $data = $this->_frontBaseArray();
        $data['volumes'] = $vDatas;
        return $data;
    }
}
