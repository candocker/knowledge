<?php

declare(strict_types = 1);

namespace ModuleKnowledge\Controllers\Html;

use Illuminate\Support\Facades\View;
use Illuminate\View\FileViewFinder;
use Illuminate\Support\Facades\App;
use ModuleKnowledge\Controllers\AbstractController as AbstractControllerBase;

abstract class AbstractController extends AbstractControllerBase
{
    protected function customView($view, $datas = [], $viewPath = null)
    {
        $viewPath = is_null($viewPath) ? $this->viewPath() : $viewPath;
        $view = $viewPath . '.' . $view;
        $viewPre = $this->viewPre();
        $datas['navDatas'] = $this->getNavDatas();
        $datas['bigNav'] = $datas['bigNav'] ?? '';
        $datas['currentNav'] = $datas['currentNav'] ?? '';
        if (!isset($datas['tdkData'])) {
            $datas['tdkData'] = [
                'title' => 'title',
                'keywords' => 'keywords',
                'description' => 'description',
            ];
        }
        $datas = $this->resource->formatResultDatas($datas);
        //print_r($datas);exit();
        return view($view, ['datas' => $datas]);
    }

    protected function formatTdk($datas)
    {
        $tdkData = [
            'title' => $datas['name'] ?? '经典古籍',
            'keywords' => $datas['kewowrd'] ?? '',
            'description' => $datas['brief'] ?? '',
        ];
        return $tdkData;
    }

    protected function viewPre()
    {
        View::addLocation(app_path().'/views');
        $mobile = $this->isMobile();
        $path = is_null($mobile) ? '' : ($mobile ? 'mobile' : 'pc');
        //$path = 'mobile';
        if ($this->resource->isMobile()) {
            View::share('mobileClass', 'mobile');
        } else {
            View::share('mobileClass', '');
        }

        $viewBasePath = dirname(dirname(dirname(__DIR__))) . '/resources/views/';
        //$paths = [resource_path('views') . '/' . $path];
        $paths = [$viewBasePath . $path];
        $finder = new FileViewFinder(App::make ('files'), $paths);
        View::setFinder ($finder);
    }

    public function isMobile($force = false)
    {
        if (empty($force)) {
            return null;
        }
        return $this->resource->isMobile();
    }

    protected function getNavDatas()
    {
        return [];
    }
}
