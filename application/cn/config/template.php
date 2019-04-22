<?php
return [
    'settheme' => '0',//PC移动端是否共用模板，1共用0不共用
    //PUBLIC目录
    'tpl_replace_string' => [
        '__PUBLIC__' => '/skin/index/'.config('home_use_template'),
    ],
    // 模板路径  --重要，自动切换主题根据这个配置设置主题路径，如果不想设置主题，删除这个配置即可。
    'view_path' => '../template/',
];
