<?php

namespace ModuleKnowledge\Controllers\Html;

class NavigationController extends AbstractController
{
    public function home()
    {
        //$navInfos = $this->getNavigationDatas('nav');
        $positionModel = $this->getModelObj('bench-position');
        $datas = [
            'categorys' => $this->getModelObj('bench-navsort')->getHomeInfos(4),
            //'categorys' => $this->getModelObj('bench-navsort')->getCategoryDatas(4),
            'searchElems' => $this->getSearchElems(),
            'homeFocus' => $positionModel->getFocusDatas('home'),
            'recommendDatas' => $positionModel->getPointDatas('home'),
            'mobileDatas' =>  array_chunk($positionModel->getMobileListDatas('home'), 6),
            'homeButtoms' => $positionModel->getPointDatas('bottompc'),
            'mobileBottom' => $positionModel->getPointDatas('bottommobile'),
            'homeRandoms' => $positionModel->getPointDatas('bottomrandom'),
        ];
        //print_r($datas['categorys']);exit();
        $datas['tdkData'] = [
            'title' => '定制自己的网络导航,驾驭浩瀚的网络信息',
            'keywords' => '',
            'description' => '',
        ];
        //print_r($datas['mobileTop']);exit();
        return $this->customView('home', $datas);
        //return $this->customView('home', array_merge($navInfos, $datas));
    }

    public function rank()
    {
        $datas = [
            'categorys' => $this->getModelObj('bench-navsort')->getCategoryDatas(),
        ];
        $datas['tdkData'] = [
            'title' => '可定制的网络热搜，网络排行榜',
            'keywords' => '',
            'description' => '',
        ];
        //print_r($datas);exit();
        return $this->customView('rank', $datas);
    }

    public function coolsite()
    {
        $datas = $this->getNavigationDatas('coolsite');
        $datas['tdkData'] = [
            'title' => $datas['bigSort']['name'],
            'keywords' => '',
            'description' => '',
        ];
        return $this->customView('coolsite', $datas);
    }

    public function search()
    {
        //$this->dealData();exit();
        $recommendDatas = $this->getModelObj('bench-position')->getPointDatas('search');
        $focusDatas = $this->getModelObj('bench-position')->getFocusDatas('search');
        $mobileDatas = array_chunk($this->getModelObj('bench-position')->getMobileListDatas('search'), 6);

        $datas = [
            'pcDatas' => $recommendDatas, 
            'mobileDatas' => $mobileDatas, 
            'searchHots' => $focusDatas, 
            'searchElems' => $this->getSearchElems(),
        ];
        $datas['tdkData'] = [
            'title' => '多维度搜索，搜索聚合',
            'keywords' => '',
            'description' => '',
        ];
        return $this->customView('search', $datas);
    }

    protected function getNavigationDatas($bigSort)
    {
        $model = $this->getModelObj('bench-navsort');
        $positionModel = $this->getModelObj('bench-position');
        $bigSortData = $model->where(['code' => $bigSort])->first();
        $sorts = $model->where(['parent_code' => $bigSort])->orderBy('orderlist', 'desc')->get();
        $results = [];
        foreach ($sorts as $sort) {
            $sData = $sort->toArray();
            $sData['navDatas'] = $sort->getWebsiteDatas();
            $sData['focusDatas'] = $positionModel->getSortFocusDatas($sort['code']);
            $results[$sort['code']] = $sData;
            //print_r($sData);exit();
        }
        $recommendDatas = $this->getModelObj('bench-position')->getPointDatas($bigSort);
        $focusDatas = $this->getModelObj('bench-position')->getFocusDatas($bigSort);
        $categorys = $this->getModelObj('bench-navsort')->getCategoryDatas();
        $mobileLists = $this->getModelObj('bench-position')->getMobileListDatas($bigSort);
        if (count($mobileLists) > 0) {
            $mobileLists = array_chunk($mobileLists, 6);
        }
        return [
            'currentSort' => $bigSort, 
            'bigSort' => $bigSortData, 
            'mobileLists' => $mobileLists,
            'recommendDatas' => $recommendDatas, 
            'sorts' => $results, 
            'categorys' => $categorys,
            'focusDatas' => $focusDatas,
        ];
    }

    public function subnav($sort)
    {
        $datas = $this->getNavigationDatas($sort);
        $datas['tdkData'] = [
            'title' => $datas['bigSort']['name'],
            'keywords' => '',
            'description' => '',
        ];
        return $this->customView('subnav', $datas);
    }

    protected function getSearchElems()
    {
        return [
            'baidu' => ['name' => '百度', 'url' => 'https://www.baidu.com/s', 'formName' => 'wd', 'ssid' => 'bgss1'],
            'sougou' => ['name' => '搜狗', 'url' => 'https://www.sogou.com/web?query=', 'withOpen' => 1, 'ssid' => 'bgss2'],
            'bing' => ['name' => '必应', 'url' => 'https://cn.bing.com/search', 'formName' => 'q', 'ssid' => 'bgss3'],
            'google' => ['name' => '谷歌', 'url' => 'https://www.google.com/search', 'formName' => 'q', 'ssid' => 'bgss5'],
            'study' => ['name' => '学术', 'url' => 'https://xueshu.baidu.com/s', 'formName' => 'wd', 'ssid' => 'bgss12'],
            'fanyi' => ['name' => '翻译', 'url' => 'https://cn.bing.com/dict/search?q=', 'withOpen' => 1, 'ssid' => 'bgss37'],
            'jd' => ['name' => '京东', 'url' => 'https://search.jd.com/Search?enc=utf-8&keyword=', 'withOpen' => 1, 'ssid' => 'bgss8'],
            'taobao' => ['name' => '淘宝', 'url' => 'https://s.taobao.com/search?', 'formName' => 'q', 'ssid' => 'bgss6'],
            //'tianmao' => ['name' => '天猫', 'url' => 'https://s.taobao.com/search?', 'formName' => 'q', 'ssid' => 'bgss7'],
            'weixin' => ['name' => '微信', 'url' => 'https://weixin.sogou.com/weixin?type=2&ie=utf8&query=', 'withOpen' => 1, 'ssid' => 'bgss19'],
            'zhihu' => ['name' => '知乎', 'url' => 'https://www.zhihu.com/search', 'formName' => 'q', 'ssid' => 'bgss17'],
            'weibo' => ['name' => '微博', 'url' => 'https://s.weibo.com/weibo/', 'withOpen' => 1, 'ssid' => 'bgss16'],
            'meitu' => ['name' => '美图', 'url' => 'https://huaban.com/search?q=', 'formName' => 'q', 'ssid' => 'bgss40'],
            'pan' => ['name' => '网盘', 'url' => 'http://www.pan58.com/s?page=1&wd=', 'withOpen' => 1, 'ssid' => 'bgss'],
            'movie' => ['name' => '视频', 'url' => 'https://search.bilibili.com/all?keyword=', 'withOpen' => 1, 'ssid' => 'bgss29'],
            'music' => ['name' => '音乐', 'url' => 'https://www.kugou.com/yy/html/search.html#searchType=song&searchKeyWord=', 'withOpen' => 1, 'ssid' => 'bgss24'],
        ];
    }

    protected function viewPath()
    {
        return 'navigation';
    }
}
