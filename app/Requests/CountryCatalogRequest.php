<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Requests;

class CountryCatalogRequest extends AbstractRequest
{
    protected function _updateRule()
    {
        return [
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
