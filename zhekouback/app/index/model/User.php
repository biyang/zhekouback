<?php
namespace app\index\model;

use think\Model;

class User extends Model{
    /*验证用户是否正确*/
	public function findUser($name = '', $password = '', $email = '', $sign = 1){
		$map = [];
		if ($sign == 1) {	//用来判断是手机登陆还是用户名登陆 1手机/2昵称
			$map['nickname'] = $name;
		} else {
			$map['tel'] = $name;
		}

		if (!empty($password)) $map['password'] = $password;
		if (!empty($email)) $map['email'] = $email;

		$res = $this->where($map)->count();

		if ($res) {
			return true;
		} else {
			return false;
		}
	}

	/*修改密码*/
	public function modifyUser($name = '', $pwd = '', $sign = 1){
        if ($sign == 1) {	//用来判断是手机登陆还是用户名登陆 1手机/2昵称
            $map['nickname'] = $name;
        } else {
            $map['tel'] = $name;
        }

        $field = array();
        if (!empty($pwd)) $field['password'] = $pwd;
        print_r($field);

        $res = $this->where($map)->update($field);

        if ($res >= 0){
            return true;
        } else {
            return false;
        }
    }
}