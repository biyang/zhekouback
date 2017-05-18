<?php

namespace app\index\controller;

class Login
{
    public function login()
    {
    	$userObj = model('user');
    	$username = input('post.username');
        $password = input('post.password');
        $sign = input('post.sign');

        $userList = $userObj->findUser($username, $password, '', $sign);

        if ($userList) {
        	msg(null, 200);
        } else {
        	msg(null, 10004);
        }
    }
}
