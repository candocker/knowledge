<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Resources;

class BookVolume extends AbstractResource
{
    protected function _frontBaseArray()
    {
        $series = $this->series;
        $press = $this->getRepository()->getKeyValues('press', $this->press);
        $press = empty($press) ? $series->getRepositoryObj()->getKeyValues('press', $series->press) : $press;
        return [              
            'id' => $this->id,
            'name' => $this->name,
            'press' => $press,
            'brief' => $this->brief,
            'series_code' => $this->series_code,
            'publish_at' => empty($this->publish_at) ? $series->publish_at : $this->publish_at,
            'description' => $this->description,
            'orderlist' => $this->orderlist,
            'book_num' => $this->book_num,

        ];
    }

    protected function _frontInfoArray()
    {
        $bookPublishes = $this->bookPublishes;
        $bDatas = $this->getCollectionObj($bookPublishes, 'frontBase', 'bookPublish');
        $data = $this->_frontBaseArray();
        $data['books'] = $bDatas;
        return $data;
    }
}
