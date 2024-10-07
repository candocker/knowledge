<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Requests;

class SubjectRequest extends AbstractRequest
{
    protected function _addRule()
    {
        return [
            'code' => [
                'bail',
                'required',
                'unique:knowledge.subject',
            ],
            //'name' => ['bail', 'required'],
            'status' => ['required', $this->_getKeyValues('status')],
        ];
    }

    protected function _updateRule()
    {
        return [
            'code' => [
                'bail',
                'filled',
                $this->getRule()->unique('knowledge.subject')->ignore($this->routeParam('code', '')),
            ],
            'status' => ['nullable', $this->_getKeyValues('status')],
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

    public function filterDirtyData($data)
    {
        unset($data['group_code']);
        return $data;
    }
}
