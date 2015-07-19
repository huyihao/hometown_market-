<?php
namespace Admin\Model;
use Think\Model;
class AdminsModel extends Model {


	
	/**
	 * @author alexgordon
	 * @param 传入用户名 $user_name
	 * @param 传入密码 $user_pwd
	 * @return 数组
	 */
public function login($data){
		$info=array();
		if(!$data[admins_name]){
			$info=array(
					'status'=>0,
					'info'	=>'用户名不能为空!',
			);
			
			return $info;
		}
		if(!$data[admins_password]){
			$info=array(
					'status'=>0,
					'info'	=>'密码不能为空!',
			);
			return $info;
		}
		if(!$data[verify]){
		    $info=array(
		        'status'=>0,
		        'info'	=>'验证码不能为空!',
		    );
		    return $info;
		}
		if(!check_verify($data[verify])){
		    $info=array(
		        'status'=>0,
		        'info'	=>'验证码错误!',
		    );
		    return $info;
		}

		$user_info=$this->where("admins_name='{$data[admins_name]}' AND admins_password='{$data[admins_password]}'")->find();
// 		dump($this->getLastSql());
		if($user_info){
			$info=array(
					'status'=>1,
					'info'	=>'登陆成功！',
			        
			);
			D('Logging')->addlogging('1');
			session("admins_name",$user_info['admins_name']);
			session("admins_id",$user_info['admins_id']);
			
			
			return $info;
		}else{
			$info=array(
					'status'=>0,
					'info'	=>'登陆失败!',
			);
			return $info;
		}
		
	}
}