<?php

namespace ModuleKnowledge\Models;

//use Elasticquent\ElasticquentTrait;
//use Laravel\Scout\Searchable;
use ModulePassport\Models\TagInfo;

class Book extends AbstractModel
{
    //use ElasticquentTrait;
    //use Searchable;

    protected $table = 'book';
    protected $primaryKey = 'code';
    protected $keyType = 'string';
    protected $guarded = ['id'];
    protected $mappingProperties = [
       'name' => [
            'type' => 'string',
            'analyzer' => 'standard'
        ]
    ];

    public function getKnowledgePathAttribute()
    {
        //return 'bak/' . $this->path_old;
        if (!empty($this->path_point)) {
            return $this->path_point;
        }
        $authorData = $this->authorData();
        if (empty($authorData['code'])) {
            return '';
        }
        $path = $authorData->knowledge_path;
        $path = trim($path, 'figure');
        $path = rtrim($path, '/') . '/书籍/';
        if (!empty($this->path_label)) {
            $path .= $this->path_label . '/';
        }
        $path .= $this->name;
        return $path;
    }

    public function getFullPathAttribute()
    {
        $base = $this->config->get('knowledge.book_basepath');
        $path = "{$base}{$this->book_path}/";
        return $path;
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'book_code', 'code')->orderBy('serial', 'asc');
    }

    public function tagInfos()
    {
        return $this->hasMany(TagInfo::class, 'info_id', 'id')->where('info_table', 'book');
    }

    public function authorData()
    {
        $data = $this->getModelObj('figureListing')->where(['book_code' => $this->code])->first();
        if (empty($data)) {
            return new FigureListing();
        }
        return $data->figureInfo;
    }

    public function authorInfo()
    {
        return $this->hasOne(Figure::class, 'code', 'author');
    }

    public function authorInfos($type = null)
    {
        $datas = [];
        $where = ['book_code' => $this->code];
        if (!is_null($type)) {
            $where['type'] = $type;
        }
        return BookFigure::where($where)->get();
    }

    public function formatAuthorData($return = 'name')
    {
        $infos = $this->authorInfos();
        if ($return == 'name') {
            $string = '';
            foreach ($infos as $info) {
                $string .= $info->figure ? $info->figure['name'] . '-' . $info->figure['name_code'] : '匿名';
            }
            return $string;
        }
    }

    public function getCoverUrlAttribute()
    {
        $url = $this->getRepositoryObj()->getAttachmentUrl(['app' => 'culture', 'info_table' => 'book', 'info_field' => 'cover', 'info_id' => $this->code]);
        $url = $url ? $url : 'http://ossfile.canliang.wang/book/cover_scholarism/0921a8be-f9e6-4a31-87e3-b31f023b96a0.jpg';
        return $url;
    }

    public function afterSave()
    {
        $request = request();
        $creative = $request->input('creative');
        if (!is_null($creative)) {
            $this->getModelObj('bookFigure')->recordCreative($creative, $this->code);
        }

        return true;
    }

    public function getCreative($type = 'all')
    {
        $infos = $this->getCreativeDatas();
        $repository = $this->getRepositoryObj('book');
        $creativeDatas = $repository->getKeyValues('creative');
        $result = [];
        foreach ($infos as $key => $value) {
            $kName = $creativeDatas[$key] ?? $key;
            foreach ($value as $fCode => $fName) {
                $result["{$key}:{$fCode}"] = "{$kName}:{$fName}";
            }
        }
        return ['source' => $result, 'show' => implode('||', $result)];
    }

    public function getCreativeDatas($type = null)
    {
        $where = ['book_code' => $this->code];
        $infos = $this->getModelObj('bookFigure')->where($where)->orderBy('type')->get();
        $results = [];
        foreach ($infos as $info) {
            $figure = $info->figure;
            $results[$info['type']][$figure['code']] = $figure['name'];
        }
        if (!is_null($type)) {
            return $results[$type] ?? [];
        }
        return $results;
    }

    public function _formatBaseData($isMobile)
    {
        $jumpUrl = !empty($this->baidu_url) ? "<a href='{$this->baidu_url}'>百科</a>" : '';
        $jumpUrl .= $this->douban_url ? "---<a href='{$this->douban_url}'>豆瓣</a>" : '';
        //$jumpUrl .= $this->knowledge_path ? "---<a href='/wiki-book-{$this->code}.html'>详情</a>" : '';
        $jumpUrl .= '---' . $this->getBookReadUrl($isMobile);
        $jumpUrl = trim($jumpUrl, '---');
        /*$baseData = [
            'infos' => [
                '书名' => $this->name,
                '跳转地址' => $jumpUrl,
            ],
            'brief' => $this->name,
            'desc' => $this->description,
            'headerPicUrl' => $this->coverUrl,
        ];*/
        $result = [
            'tdkData' => ['title' => $this->name, 'description' => $this->description],
            'pageData' => ['title' => $this->name, 'brief' => $this->description . " （ {$jumpUrl} ）"],
            //'headerPicUrl' => $this->coverUrl,
            //'baseData' => $baseData,
        ];
        return $result;
    }

    public function getBookReadUrl($isMobile)
    {
        $bCode = $this->code;
        if ($this->is_ancientread) {
            $url = "http://read.canliang.wang/book-{$bCode}";
        } elseif ($this->is_onlineread) {
            //$url = $isMobile ? "http://book.canliang.wang/pages/book/info?book_code={$bCode}" : "/{$bCode}/list.html";
            $url = "/{$bCode}/list.html";
        } else {
            $url = '';
        }
        return $url ? "<a href='{$url}'>在线阅读</a>" : '';
    }

    /**
     * 获取模型的可搜索数据
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $data = [
            'id' => $this->id,
            //'name' => $this->name,
            //'note' => $this->note,
            //'description' => $this->description,
        ];

        return $data;
    }

    /**
     * 得到该模型索引的名称。
     *
     * @return string
     */
    public function searchableAs()
    {
        //return 'book';
        return '_doc';//laravel74_knowledge';
    }

    /**
     * 获取模型主键
     *
     * @return mixed
     */
    /*public function getScoutKey()
    {
        return $this->code;
    }*/

     /**
     * 获取模型键名
     *
     * @return mixed
     */
    /*public function getScoutKeyName()
    {
        return 'code';
    }*/
}
