<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Requests;

class MuwikiRequest extends AbstractRequest
{
    protected function _addRule()
    {
        return [
            'code' => [
                'bail',
                'required',
                'unique:knowledge.muwiki',
            ],
            'name' => ['bail', 'required'],
            'status' => ['required', $this->_getKeyValues('status')],
        ];
    }

    protected function _updateRule()
    {
        return [
            'code' => [
                'bail',
                'filled',
                $this->getRule()->unique('knowledge.muwiki')->ignore($this->routeParam('code', '')),
            ],
        ];
    }


    public function attributes(): array
    {
        return [
            //'name' => '名称',
        ];
    }

    public function messages(): array
    {
        return [
            //'name.required' => '请填写名称',
        ];
    }
}
