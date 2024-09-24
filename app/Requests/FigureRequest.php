<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Requests;

class FigureRequest extends AbstractRequest
{
    protected function _addRule()
    {
        $rules = [
            'code' => ['bail', 'required', 'unique:knowledge.figure,code'],
            'name' => ['bail', 'required'],
            'status' => $this->_getKeyValues('status'),
        ];
        return $rules;
    }

    protected function _updateRule()
    {
        return [
            //'id' => ['bail', 'required', 'exists'],
            'code' => ['bail', 'filled', $this->getRule()->unique('figure')->ignore($this->routeParam('code', 0), 'code')],
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
        \Log::info('figure-' . json_encode($data));
        foreach (['birthday', 'deathday', 'ftitle'] as $field) {
            if (isset($data[$field])) {
                unset($data[$field]);
                $this->allowEmpty = true;
            }
        }
        return $data;
    }
}
