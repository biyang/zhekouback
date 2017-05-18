<?php
namespace app\index\controller;

use app\extra\smtp;


class Pwd
{
	public function modifyPwd()
    {
        $userObj = model('user');
        $name = input('post.username');
        $password = input('post.password');
        $sign = input('post.sign');

        $res_check = $userObj->findUser($name, '', '', $sign);

        if ($res_check) {
            $res_mod = $userObj->modifyUser($name, $password, $sign);

            if ($res_mod) {
                $msg = "恭喜，密码修改成功";
                $code = 200;
            } else {    //邮件发送失败
                $msg = "抱歉，密码修改失败";
                $code = 10005;  //数据库操作失败
            }
            msg($msg, $code);
        } else {
            msg(null, 10002);    //用户或邮箱不存在
        }
    }
}