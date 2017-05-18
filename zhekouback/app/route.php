<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// use think\Route;
// Route::get('/',function(){
// 	echo 11;
//     return 'Hello,world!';
// });


return [
    // '__pattern__' => [
    //     'name' => '\w+', //\w 只匹配单词字符，等价于 [a-zA-Z0-9_] 共63个字符（字母数字下划线）。
    // ],
    // '[hello]'     => [
    //     ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
    //     ':name' => ['index/hello', ['method' => 'post']],
    // ],
    'login' => 'index/Login/login',
    'forgot' => 'index/Forgot/index',
    'pwd' => 'index/Pwd/modifyPwd',
];

