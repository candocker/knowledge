<?php

namespace ModuleKnowledge\Models;

use Illuminate\Database\Eloquent\Builder;

class Figure extends AbstractModel
{
    protected $table = 'figure';
    protected $primaryKey = 'code';
    protected $keyType = 'string';
    protected $guarded = ['id'];

    public function afterSave()
    {
        $request = request();
        $ftitle = $request->input('ftitle');
        if (!is_null($ftitle)) {
            $this->getModelObj('figureTitle')->recordTitle($ftitle, $this->code);
        }
        foreach (['birthday', 'deathday'] as $elem) {
            $value = $request->input($elem);
            if (!is_null($value)) {
                $this->getModelObj('dateinfo')->recordDateinfo($elem, $value, 'figure', $this->code);
            }
        }

        return true;
    }

    public function getFullNameAttribute()
    {
        $tName = $this->name;
        $tName = "<a href='/wiki-dynasty-{$this->code}.html'>{$tName}</a>";
        if (!empty($this->baidu_url)) {
            $tName .= "<a href='{$this->baidu_url}'> (百)</a>";
        }
        return $tName;
    }

    public function getFtitle($type = 'all')
    {
        $titles = $this->getFtitleDatas();
        $repository = $this->getRepositoryObj('figure');
        $ftitleDatas = $repository->getKeyValues('ftitle');
        $result = [];
        foreach ($titles as $key => $value) {
            $kName = $ftitleDatas[$key] ?? $key;
            foreach ($value as $cTitle) {
                $result["{$key}:{$cTitle}"] = "{$kName}:{$cTitle}";
            }
        }
        return ['source' => $result, 'show' => implode('||', $result)];
    }

    public function getFtitleDatas($type = null)
    {
        $where = ['figure_code' => $this->code];
        $infos = $this->getModelObj('figureTitle')->where($where)->orderBy('type')->get();
        $results = [];
        foreach ($infos as $info) {
            $results[$info['type']][] = $info['title'];
        }
        if (!is_null($type)) {
            return $results[$type] ?? [];
        }
        return $results;
    }

    /**
     * Insert the given attributes and set the ID on the model.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  array  $attributes
     * @return void
     */
    protected function insertAndSetId(Builder $query, $attributes)
    {
        $id = $query->insertGetId($attributes, $keyName = $this->getKeyName());

        $this->setAttribute('id', $id);
    }

    public function getPhotoUrlAttribute()
    {
        $url = $this->getRepositoryObj()->getAttachmentUrl(['app' => 'culture', 'info_table' => 'figure', 'info_field' => 'photo', 'info_id' => $this->code]);
        $url = $url ? $url : 'http://ossfile.canliang.wang/book/cover_scholarism/0921a8be-f9e6-4a31-87e3-b31f023b96a0.jpg';
        return $url;
    }

    public function getBirthDeath()
    {
        $repository = $this->getRepositoryObj('dateinfo');
        $typeDatas = $repository->getKeyValues('accurate');

        $birth = $this->getDateinfo('birthday', 'full');
        $death = $this->getDateinfo('deathday', 'full');
        if (empty($birth) ||empty($death)) {
            //print_r($this->toArray());
            return ['age' => 0, 'ageStr' => '', 'birthStr' => '', 'deathStr' => ''];
        }
        $age = $death['accurate'] == 'running' ? '-' : '';
        $age = empty($age) ? $birth['accurate'] == 'unknown' || $death['accurate'] == 'unknown' ? '未知' : $death['year'] - $birth['year'] + 1 : $age;
        $birthStr = empty($birth['year']) ? '-' : "{$birth['year']}/{$birth['month']}/{$birth['day']}";
        $birthStr = ($birth['accurate'] ? $typeDatas[$birth['accurate']] . ' ' : '') . $birthStr;

        $deathStr = empty($death['year']) ? '-' : "{$death['year']}/{$death['month']}/{$death['day']}";
        $deathStr = ($death['accurate'] ? $typeDatas[$death['accurate']] . ' ' : '') . $deathStr;

        return [
            'age' => intval($age),
            'ageStr' => $age . ' 岁',
            'birthStr' => $birthStr,//'出生日期:' . 
            'deathStr' => $deathStr,//'逝世日期:' . 
        ];
    }

    public function _formatBaseData($isMobile)
    {
        $jumpUrl = !empty($this->baidu_url) ? "<a href='{$this->baidu_url}'>百科</a>" : '';
        //$jumpUrl .= $this->knowledge_path ? "---<a href='/wiki-figure-{$this->code}.html'>详情</a>" : '';
        $jumpUrl = trim($jumpUrl, '---');
        $baseData = [
            'infos' => [
                '姓名' => $this->name,
                '跳转' => $jumpUrl,
            ],
            'brief' => $this->name,
            'desc' => $this->description,
            'headerPicUrl' => $this->photoUrl,
        ];
        $result = [
            'tdkData' => ['title' => $this->name, 'description' => $this->description],
            'pageData' => ['title' => $this->name . " （ {$jumpUrl} ）", 'brief' => $this->description],
            'baseData' => $baseData,
            'headerPicUrl' => $this->photoUrl,
        ];
        return $result;
    }
}
