<?php
return [
    'currentBigNavCode' => 'onlineread',
    'currentNavCode' => 'classical',
    'leftNavs' => [],
    'topNavs' => [
        'onlineread' => [
            'name' => '在线阅读',
            'subDatas' => [
                ['code' => 'classical', 'name' => '经典古籍', 'url' => 'http://read.canliang.wang/'],
                ['code' => 'luxun', 'name' => '鲁迅全集', 'url' => '/onlineread-luxun'],
                ['code' => 'xueshu', 'name' => '学术著作', 'url' => '/onlineread-xueshu'],
                ['code' => 'other', 'name' => '其他著作', 'url' => '/onlineread-other'],
                //['code' => '', 'name' => '', 'url' => ''],
            ],
        ],
        'bigpeople' => [
            'name' => '名人传',
            'subDatas' => [
                ['code' => 'luxun', 'name' => '鲁迅', 'url' => '/bigpeople-luxun.html'],
            ],
        ],
        'subject' => [
            'name' => '专题',
            'subDatas' => [
                ['code' => 'zgwenxueshi', 'name' => '中国文学史', 'url' => '/subject-zgwenxueshi'],
                ['code' => 'wgwenxueshi', 'name' => '外国文学史', 'url' => '/subject-wgwenxueshi'],
                ['code' => 'rujiashi', 'name' => '儒学历史', 'url' => '/subject-'],
                ['code' => 'xfzhexueshi', 'name' => '西方哲学史', 'url' => '/subject-'],
                //['code' => '', 'name' => '', 'url' => '/subject-'],
            ],
        ],
        'bookstore' => [
            'name' => '书架',
            'subDatas' => [
                ['code' => 'classical', 'name' => '中国古籍', 'url' => '/bookstore-classical'],
                ['code' => 'luxun', 'name' => '鲁迅著作', 'url' => '/bookstore-'],
                ['code' => 'shwhanyixueshu', 'name' => '商务汉译学术名著', 'url' => '/bookstore-'],
                ['code' => 'other', 'name' => '其他著作', 'url' => '/bookstore-'],
                //['code' => '', 'name' => '', 'url' => '/bookstore-'],
            ],
        ],
    ],
];
