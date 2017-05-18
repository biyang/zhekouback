<?php
namespace app\index\controller;

use app\extra\smtp;


class Forgot
{
	public function index(){
		$userObj = model('user');

		$name = input('post.username');
        $email = input('post.email');
		$sign = input('post.sign');

		$res = $userObj->findUser($name, '', $email, $sign);

		if ($res) {
			// $url = "/demo/resetpass/reset.php?email=".$email;
			$url = "www.baidu.com";
			$time = date('Y-m-d H:i');
			// $email = '328725727@qq.com';
			// time提交时间，email发送的邮箱，url修改密码的地址
			$resSendMsg = $this->sendmail($time, $email, $url);

			if ($resSendMsg) {
				$msg = "系统已向您的邮箱发送了一封邮件<br/>请登录到您的邮箱及时重置您的密码！";
			} else {	//邮件发送失败
				$msg = $resSendMsg;
			}
			 msg($msg, 200);
		} else {
			msg(null, 10002);	//用户或邮箱不存在
		}

	}

	/*发送邮件接口*/
	public function sendmail($time, $email, $url){
		$smtpserver = "smtp.163.com"; //SMTP服务器，如smtp.163.com 
		$smtpserverport = 25; //SMTP服务器端口 
		$smtpusermail = "18356068917@163.com"; //SMTP服务器的用户邮箱 
		$smtpemailto = $email; //发送给谁
		$smtpuser = "18356068917"; //SMTP服务器的用户帐号 
		$smtppass = "52001018by"; //SMTP服务器的用户密码即授权码
		$mailsubject = "找回密码";//发送邮件主题
		$mailbody = "亲爱的".$email."：<br/>您在".$time."提交了找回密码请求。请点击下面的链接重置密码 
（按钮24小时内有效）。<br/><a href='".$url."'target='_blank'>".$url."</a>"; //发送邮件内容
		$mailtype = "TXT";//发送邮件格式
		//这里面的true是表示使用身份验证，否则不使用身份验证
		$smtp = new smtp();
		//连接smtp服务器
        $smtp->smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);
		$smtp->debug = true;//是否显示发送的调试信息
		$smtp->CharSet = 'UTF-8';
		//发送邮件
		$res = $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);

		if ($res){
		    return 'ok';
        } else {
		    return 'false';
        }
	}
}