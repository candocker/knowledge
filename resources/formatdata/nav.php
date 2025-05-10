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
        'bookstore' => [
            'name' => '书架',
            'subDatas' => [
                'classical' => ['code' => 'classical', 'name' => '中国古籍 ( 61本 )', 'withVolume' => true],
                'luxun' => ['code' => 'luxun', 'name' => '鲁迅著作'],
                'shwhanyixueshu' => [
                    'code' => 'shwhanyixueshu',
                    'name' => '汉译学术名著',
                    'subDatas' => [
                        'philosophy' => ['code' => 'philosophy', 'name' => '哲学 ( 325本 )', 'withVolume' => true],
                        'history' => ['code' => 'history', 'name' => '历史·地理 ( 205本 )', 'withVolume' => true],
                        'politics' => ['code' => 'politics', 'name' => '政治·法律·社会 ( 235本 )', 'withVolume' => true],
                        'economics' => ['code' => 'economics', 'name' => '经济 ( 185本 )', 'withVolume' => true],
                        'language' => ['code' => 'language', 'name' => '语言·文艺理论 ( 50本 )', 'withVolume' => true],
                        'otheracademic' => ['code' => 'otheracademic', 'name' => '学术补编 ( 120本 )', 'withVolume' => true],
                    ],
                ],
                'other' => ['code' => 'other', 'name' => '其他著作 ( 12本 )', 'withVolume' => ['goodworks']],
                //['code' => '', 'name' => ''],
            ],
        ],
        'culture' => [
            'name' => '思想文化',
            'subDatas' => [
                //'confucianism' => ['code' => 'confucianism', 'name' => '儒学历史'],
                'zgculture' => ['code' => 'zgculture', 'name' => '中国思想史'],
                'xfculture' => ['code' => 'xfculture', 'name' => '西方哲学史'],
                'qtculture' => [
                    'code' => 'qtculture',
                    'name' => '宗教/其他文化',
                    'subDatas' => [
                        'judaism' => ['code' => 'judaism', 'name' => '犹太教'],
                        'christianity' => ['code' => 'christianity', 'name' => '基督教'],
                        'islam' => ['code' => 'islam', 'name' => '伊斯兰教'],
                        'buddhism' => ['code' => 'buddhism', 'name' => '佛教'],
                        'gydculture' => ['code' => 'gydculture', 'name' => '古代印度文化'],
                        //'' => ['code' => '', 'name' => ''],
                    ],
                ],
                'zgliterature' => ['code' => 'zgliterature', 'name' => '中国文学'],
                'wgliterature' => ['code' => 'wgliterature', 'name' => '外国文学'],
            ],
        ],
        /*'figure' => [
            'name' => '名人录',
            'subDatas' => [
                //'luxun' => ['code' => 'luxun', 'name' => '鲁迅'],
                //'kongzi' => ['code' => 'kongzi', 'name' => '孔子'],
                //'' => ['code' => '', 'name' => ''],
            ],
        ],*/
        'zghistory' => [
            'name' => '历史',
            'subDatas' => [
                'zgdynasty' => ['code' => 'zgdynasty', 'name' => '中国断代史'],
                'bigcountry' => ['code' => 'bigcountry', 'name' => '大国历史'],
                'gdempire' => ['code' => 'gdempire', 'name' => '古代帝国'],
                //'zgemperor' => ['code' => 'zgemperor', 'name' => '历代帝王'],
                //'zggeneral' => ['code' => 'zggeneral', 'name' => '战争和将领'],
                //'zgminister' => ['code' => 'zgminister', 'name' => '历代显贵'],
                //'zgpoliticsreform' => ['code' => 'zgpoliticsreform', 'name' => '政治制度和变法'],
                //'' => ['code' => '', 'name' => ''],
            ],
        ],
        /*'wghistory' => [
            'name' => '外国和外国历史',
            'subDatas' => [
                'bigcountry' => ['code' => 'bigcountry', 'name' => '大国历史'],
                //'jdpoliticsreform' => ['code' => 'jdpoliticsreform', 'name' => '近代政治革命'],
                //'jdgeneral' => ['code' => 'jdgeneral', 'name' => '近代战争和将领'],
                'gdempire' => ['code' => 'gdempire', 'name' => '古代帝国'],
                //'gdpolitics' => ['code' => 'gdempire', 'name' => '古代政治和文化'],
                //'gdgeneral' => ['code' => 'gdgeneral', 'name' => '古代战争和将领'],
            ],
        ],*/
        'region' => [
            'name' => '区域',
            'subDatas' => [
                'worldregion' => ['code' => 'worldregion', 'name' => '世界政区'],
                'situation' => ['code' => 'situation', 'name' => '局势'],
                'trend' => ['code' => 'trend', 'name' => '趋势'],
            ],
        ],
    ],
];
