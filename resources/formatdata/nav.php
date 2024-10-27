<?php
return [
    'currentBigNavCode' => '',
    'currentNavCode' => '',
    'currentSubCode' => '',
    'leftNavs' => [],
    'topNavs' => [
        'onlineread' => [
            'name' => '在线阅读',
            'subDatas' => [
                'classical' => ['code' => 'classical', 'name' => '经典古籍', 'url' => 'http://read.canliang.wang/'],
                'luxun' => ['code' => 'luxun', 'name' => '鲁迅全集', 'withVolume' => ['luxunyanjiu', 'luxunsingle']],
                'xueshu' => ['code' => 'xueshu', 'name' => '学术著作'],
                'other' => ['code' => 'other', 'name' => '其他阅读', 'withVolume' => ['goodworks']],
                //['code' => '', 'name' => ''],

            ],
        ],
        /*'bigpeople' => [
            'name' => '名人传',
            'subDatas' => [
                'luxun' => ['code' => 'luxun', 'name' => '鲁迅'],
            ],
        ],*/
        'subject' => [
            'name' => '专题',
            'subDatas' => [
                'zgwenxueshi' => ['code' => 'zgwenxueshi', 'name' => '中国文学史'],
                'wgwenxueshi' => ['code' => 'wgwenxueshi', 'name' => '外国文学史'],
                'rujiashi' => ['code' => 'rujiashi', 'name' => '儒学历史'],
                'xfzhexueshi' => ['code' => 'xfzhexueshi', 'name' => '西方哲学史'],
                //['code' => '', 'name' => ''],
            ],
        ],
        'bookstore' => [
            'name' => '书架',
            'subDatas' => [
                'classical' => ['code' => 'classical', 'name' => '中国古籍 ( 37本 )', 'withVolume' => true],
                'luxun' => ['code' => 'luxun', 'name' => '鲁迅著作'],
                'shwhanyixueshu' => [
                    'code' => 'shwhanyixueshu',
                    'name' => '汉译学术名著',
                    'subDatas' => [
                        'philosophy' => ['code' => 'philosophy', 'name' => '哲学 ( 285本 )', 'withVolume' => true],
                        'history' => ['code' => 'history', 'name' => '历史·地理 ( 172本 )', 'withVolume' => true],
                        'politics' => ['code' => 'politics', 'name' => '政治·法律·社会 ( 202本 )', 'withVolume' => true],
                        'economics' => ['code' => 'economics', 'name' => '经济 ( 166本 )', 'withVolume' => true],
                        'language' => ['code' => 'language', 'name' => '语言·文艺理论 ( 25本 )', 'withVolume' => true],
                        'otheracademic' => ['code' => 'otheracademic', 'name' => '学术补编 ( 99本 )', 'withVolume' => true],
                    ],
                ],
                'other' => ['code' => 'other', 'name' => '其他著作 ( 12本 )', 'withVolume' => ['goodworks']],
                //['code' => '', 'name' => ''],
            ],
        ],
    ],
];
