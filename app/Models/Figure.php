<?php

namespace ModuleKnowledge\Models;

use Illuminate\Database\Eloquent\Builder;

class Figure extends AbstractModel
{
    protected $table = 'figure';
    protected $primaryKey = 'code';
    protected $keyType = 'string';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getFullKnowledgePathAttribute()
    {
        $base = $this->config->get('knowledge.knowledge_path');
        return $this->knowledge_path ? $base . $this->knowledge_path . '.php' : '';
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

    public function getKnowledgePathAttribute()
    {
        //return $this->path_old;
        if (!empty($this->path_point)) {
            return $this->path_point;
        }
        $countryInfo = $this->countryInfo;
        if (empty($countryInfo)) {
            return '';
        }
        $path = $countryInfo->knowledge_path;
        if (empty($path)) {
            $path = $countryInfo->formatKnowledgePath();
        }
        $path = rtrim($path, '/') . '/人物/';
        if (empty($this->path_label) && empty($this->path_gather)) {
            $path .= $this->name . '/figure';
            return $path;
        }

        $path .= $this->path_label ? $this->path_label . '/' : '';
        $path .= $this->path_gather ? $this->path_gather : $this->name;
        return $path;
    }

    public function getPhotoUrlAttribute()
    {
        //$url = $this->getRepositoryObj()->getAttachmentUrl(['app' => 'culture', 'info_table' => 'figure', 'info_field' => 'photo', 'info_id' => $this->code]);
        $url = $this->getServiceObj('dealResource')->getResourceUrl('culture', 'figure', 'photo', $this->code);
        $url = $url ? $url : 'http://ossfile.canliang.wang/book/cover_scholarism/0921a8be-f9e6-4a31-87e3-b31f023b96a0.jpg';
        return $url;
    }

    public function _formatBaseData($isMobile)
    {
        $cacheData = $this->getCacheData($this);
        //print_r($cacheData);exit();

        $name = $cacheData['baseData']['name'];
        $bInfos['姓名'] = $name;
        $nameCard = $cacheData['baseData']['name_card'];
        if (!empty($nameCard) && $nameCard != $name) {
            $bInfos['名字'] = $nameCard;
        }
        $bInfos['生卒日期 '] = $cacheData['birthDeathDate']['common']['birthDeathStrAge'];
        $bInfos['国家/王朝'] = $cacheData['baseData']['country_name'];
        if (!empty($cacheData['baseData']['native_place']) || !empty($cacheData['baseData']['native_place_history'])) {
            $place = $cacheData['baseData']['native_place'] . ' / ' . $cacheData['baseData']['native_place_history'];
            $bInfos['祖籍/出生地'] = trim($place, ' / ');
        }

        $desc = $cacheData['descs']['base'];
        $baseData = [
            'infos' => $bInfos,
            //'brief' => $this->name,
            //'desc' => $desc,
            'headerPicUrl' => $cacheData['baseData']['headerPicUrl'],
        ];
        $title = $cacheData['baseData']['name_jump_full'];
        $result = [
            'tdkData' => ['title' => $this->name, 'description' => $desc],
            'pageData' => ['title' => $title, 'brief' => $desc],
            'baseData' => $baseData,
            'headerPicUrl' => $this->photoUrl,
        ];
        return $result;
    }

    public function wrapDetailDatas($detailDatas)
    {
        $cacheData = $this->getCacheData($this);
        $descs = $cacheData['descs'];
        unset($descs['base']);
        if (count($descs) > 0) {
            $descInfos = [];
            foreach ($descs as $dKey => $dValue) {
                $descInfos[] = ['type' => $dKey, 'major' => $dValue];
            }
            $detailDatas['commonFixTableDescs'] = [
                'topName' => '',
                'baselist' => [
                    'name' => '简评',
                    'titles' => ['type' => '类型', 'major' => '简介'],
                    'fixTitleField' => 'type',
                    'brief' => '',
                    'baseInfos' => $descInfos,
                ],
            ];
        }
        if (isset($cacheData['emperorData']) && !empty($cacheData['emperorData'])) {
            $detailDatas['commonFixTableEmperor'] = [
                'topName' => '主政信息',
                'baselist' => [
                    'name' => '',
                    'titles' => ['type' => '类型', 'name' => '标题', 'major' => '简介'],
                    'fixTitleField' => 'type',
                    'brief' => '',
                    'baseInfos' => $cacheData['emperorData']['details'],
                ],
            ];
        }
        $bookDatas = $this->getBookDatas();
        if (!empty($bookDatas)) {
            $detailDatas['commonFixTableBook'] = [
                'topName' => '著作',
                'baselist' => [
                    'name' => '',
                    'titles' => ['name' => '书名', 'major' => '简介'],
                    'fixTitleField' => 'name',
                    'brief' => '',
                    'baseInfos' => $bookDatas,
                ],
            ];
        }

        $bYear = $this->birth_year;
        $dYear = $this->death_year;
        $activeAt = $this->active_at;
        if ($bYear == 0) {
            $bYear = $dYear != 0 ? $dYear - 80 : ($activeAt ? $activeAt - 50 : $bYear);
        }
        if ($dYear == 0) {
            $dYear = $this->death_accurate == 'running' ? date('Y') : ($bYear != 0 ? $bYear + 80 : ($activeAt ? $activeAt + 50 : $dYear));
        }

        if ($bYear != 0 && $dYear != 0) {
            $detailDatas['commonFixTableYear'] = $this->getCommonYearDetails($this->name, $bYear, $dYear);
        }
        return $detailDatas;
    }

    public function getBookDatas()
    {
        $books = $this->getModelObj('figureListing')->where(['type' => 'author', 'figure_code' => $this->code])->get();
        if ($books->count() < 1) {
            return [];
        }
        $results = [];
        foreach ($books as $book) {
            $bookInfo = $book->bookInfo;
            if (empty($bookInfo)) {
                continue;
            }
            $results[] = [
                'name' => "<a href='/wiki-book-{$bookInfo['code']}.html'>{$bookInfo['name']}</a>",
                'major' => $bookInfo['description'],
            ];
        }
        return $results;
    }

    public function formatDate($types = ['birth', 'death'])
    {
        $accurateValues = $this->getAccurateDatas();
        $results = [];
        foreach ($types as $type) {
            $fields = ['accurate', 'year', 'month', 'day'];
            $data = [];
            foreach ($fields as $field) {
                $fField = $type . '_' . $field;
                $$field = $this->$fField;
                $data[$field] = $this->$fField;
            }
            $year = str_replace('-', '前', $year);
            $yearStr = $year ? $year . '年' : '';
            $accurateStr = $accurateValues[$accurate];
            $monthStr = $month ? $month . '月' : '';
            $dayStr = $day ? $day . '日' : '';
            if (in_array($accurate, ['running', 'unknown'])) {
                $monthDay = $accurateStr;
                $fullStr = $monthDay;
            } else {
                $accurateStr = $accurateStr ? "({$accurateStr})" : '';
                $monthDay = $month ? $month . '/' : '';
                $monthDay .= $day ? $day : '';
                $monthDay = trim($monthDay, '/');
                $fullStr = $year ? $year . '/' : '';
                $fullStr .= $monthDay;
                $fullStr = trim($fullStr, '/');
                if (!empty($fullStr)) {
                    $fullStr = $accurateStr . $fullStr;
                }
                if (!empty($monthDay)) {
                    $monthDay = $accurateStr . $monthDay;
                }
            }

            $results[$type] = [
                'sourceData' => $data,
                'accurate' => $accurateValues[$data['accurate']],
                'yearStr' => $yearStr,
                'monthStr' => $monthStr,
                'dayStr' => $dayStr,
                'monthDay' => $monthDay,
                'monthDay2' => $monthStr . $dayStr,
                'fullStr' => $fullStr,
            ];
        }
        if (isset($results['death']) && isset($results['birth'])) {
            $birthData = $results['birth'];
            $deathData = $results['death'];
            $bdStr = $birthData['fullStr'] ?: '?';
            $bdStr .= '-' . ($deathData['fullStr'] ?: '?');
            if ($bdStr == '未知-未知') {
                $bdStr = '-';
            }
            $age = '';
            if ($birthData['sourceData']['year'] != 0 && $deathData['sourceData']['year'] != 0) {
                $age = $deathData['sourceData']['year'] - $birthData['sourceData']['year'] + 1;
            }
            $ageStr = $age ? $age . '岁' : '';
            $simpleStr = $birthData['sourceData']['year'] != 0 ? str_replace(['-'], ['前'], $birthData['sourceData']['year']) : '?';
            $simpleStr .= '-';
            $simpleStr .= $deathData['sourceData']['year'] != 0 ? str_replace(['-'], ['前'], $deathData['sourceData']['year']) : ($deathData['sourceData']['accurate'] == 'running' ? '至今' : '?');
            if ($simpleStr == '?-?') {
                $simpleStr = '-';
            }
            $results['common']['age'] = $age;
            $results['common']['ageStr'] = $age;
            $results['common']['birthDeathStr'] = $bdStr;
            $results['common']['birthDeathStrAge'] = $bdStr . ($ageStr ? " ({$ageStr})" : '');
            $results['common']['birthDeathStrAgeSimple'] = $simpleStr . ($ageStr ? " ({$ageStr})" : '');
        }
        //print_r($results);exit();
        return $results;
    }

    public function _formatEmperorData()
    {
        $typeStr = 'country,emperor,eraname';
        $infos = $this->getModelObj('period')->where(['figure_code' => $this->code])->whereIn('period_type', ['emperor', 'eraname'])->orderByRaw("FIND_IN_SET(period_type, '{$typeStr}') asc")->orderBy('start_year', 'asc')->get();
        if ($infos->count() < 1) {
            return [];
        }
        $terms = $details = [];
        $periodTypes = $this->periodTypeDatas();
        foreach ($infos as $info) {
            $termNum = $info['term_num'];
            if (!isset($terms[$termNum])) {
                $terms[$termNum] = [];
            }
            $endYear = $info->end_year;
            if ($info->end_accurate == 'running') {
                $duration = str_replace('-', '前', $info->start_year) . '-至今';
                $diffStr = '';
            } else {
                $duration = str_replace('-', '前', $info->start_year) . '-' . str_replace('-', '前', $info->end_year);
                $diff = $info->end_year - $info->start_year;
                $diffStr = $diff < 1 ? '<1年/' : $diff . '年/';
            }
            if ($info['period_type'] == 'emperor') {
                $terms[$termNum]['term'] = $info->term;
                $terms[$termNum]['duration'] = $duration;
                $durationStr = "{$diffStr}{$duration}";
                $terms[$termNum]['durationStr'] = $durationStr;
            }
            if ($info['period_type'] == 'eraname') {
                $eraname = !empty($info->baidu_url) ? "<a href='{$info->baidu_url}'>{$info->eraname}</a>" : $info->ername;
                $terms[$termNum]['eraname'][] = "{$eraname} ({$diffStr}{$duration})";
            }

            $details[] = [
                'type' => $periodTypes[$info->period_type] ?? $info->period_type,
                'name' => $info->getCurrentTitle() . " ({$diffStr}{$duration})",
                'major' => $info->getMajorStr(),
            ];
        }
        return ['terms' => $terms, 'details' => $details];
    }

    public function getCacheData($info, $force = true)
    {
        if (is_string($info)) {
            $info = $this->where(['code' => $info])->first();
        }
        $key = 'kk_figure_data_' . $info['code'];
        if ($force) {
            $data = $info->formatCacheData();
            //print_r($data);exit();
            $this->getRepositoryObj('passport-user')->setPointCaches($key, $data);
            return $data;
        }
        $data = $this->getRepositoryObj('passport-user')->getPointCaches($key);
        if (empty($data)) {
            $data = $info->formatCacheData();
            $this->getRepositoryObj('passport-user')->setPointCaches($key, $data);
        }
        return $data;
    }

    public function formatCacheData()
    {
        $country = $this->countryInfo;
        $fPath = $this->full_knowledge_path;
        $nameJump = "<a href='/wiki-figure-{$this->code}.html?force_create_file=figure'>{$this->name}</a>";
        //$nameJump = "<a href='/wiki-figure-{$this->code}.html'>{$this->name}</a>";
        $nameJumpFull = $this->baidu_url ? $nameJump . " (<a href='{$this->baidu_url}'>百科</a>)" : $nameJump;
        $baseData = [
            'code' => $this->code,
            'name' => $this->name,
            'name_jump' => $nameJump,
            'name_jump_full' => $nameJumpFull,
            'name_card' => $this->name_card,
            'native_place' => $this->native_place,
            'native_place_history' => $this->native_place_history,
            'country_code' => $country ? $country['code'] : '',
            'country_name' => $country ? "<a href='/wiki-country-{$country['code']}.html'>{$country['name']}</a>" : '',
            'headerPicUrl' => $this->photoUrl,
            'full_knowledge_path' => $fPath,
        ];
        $extData = [];
        if (file_exists($fPath)) {
            $details = require($fPath);
            if ($this->path_gather) {
                $details = $details[$this->code] ?? [];
            }
            $extData = $details['baseData'] ?? [];
        }
        $descs['base'] = $this->description;
        if (isset($extData['descs'])) {
            $descs = array_merge($descs, $extData['descs']);
        }

        $birthDeathDate = $this->formatDate();
        $cacheData = [
            'baseData' => $baseData,
            'extInfos' => $extData['infos'] ?? [],
            'descs' => $descs,
            'birthDeathDate' => $birthDeathDate,
            'emperorData' => $this->_formatEmperorData(),
        ];
        return $cacheData;
    }

    /*public function afterSave()
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
    }*/

    /*public function getBirthDeath()
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
    }*/

    /*public function getFtitleDatas($type = null)
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
    }*/

    /*public function getFtitle($type = 'all')
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
    }*/
}
