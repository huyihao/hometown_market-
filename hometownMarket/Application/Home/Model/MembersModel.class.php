<?php
namespace Home\Model;
use Think\Model;
class MembersModel extends Model {
	/**
	 * 用户注册
	 * @alexgordon
	 */
// 	protected $patchValidate=true;
// 	protected $_validate = array(
// 			array('members_username','/^([\d\w-_]){3,20}$/',
// 				'用户的长度应该是3-20位，并且是英文，下划线'), //默认情况下用正则进行验证
// 			array('members_password','/^(.){6,}$/',
// 				'密码必须至少6位！'),// 在新增的时候验证name字段是否唯一
// 			array('members_username','','用户名已被注册！',0,unique), // 当值不为空的时候判断是否在一个范围内
// 			array('members_repeatPasswd','members_password','确认密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
// 	        array('members_identitycard','','身份证号已被注册！',0,unique),
// 	        array('members_mobile','','手机号码已被注册！',0,unique),
// 	        array('members_email','','邮箱地址已被注册',0,unique),
// 	        array('members_email','email','邮箱格式不对',self::EXISTS_VALIDATE ),
// 	        array('members_mobile','/^([\d]){11}$/','手机号码不正确！'),
// 	        array('members_identitycard','/^([\d]){18}$/','身份证的长度不正确！'),
// 	);

// 	protected $_auto= array(
// 		array('members_password','md5',3,'function'),
// 		array('members_joinip','get_client_ip',1,'function'),
// 		array('members_joindate','time',3,'function'),
// 	    array('members_systembewrite','无')	,
// 	    array('members_visitset','1'),
// 	);
	
	
// 	public function register($data){
// 		if(!$this->create()){
// 			return $this->getError();
// 		}else{
// 			$this->add();
// 		}
// 	}
    public function register($data){
        $info=array(
            'status'=>'1',
        );
        if($data['members_repeatPasswd']!=$data['members_password']||''==$data['members_password']){
            $info['status']=0;
            $info['members_repeatPassword']='两次密码不一致或者密码为空';
        }
        if(!preg_match("/^(.){4,}$/", $data['members_username'])){
            $info['status']=0;
            $info['members_username']='用户的长度至少是4位';
        }
        if(!preg_match("/^(.){6,}$/", $data['members_password'])){
            $info['status']=0;
            $info['members_password']='密码必须至少6位，并且只能是英文和数字！';
        }
        if(!preg_match("/^([\d]){18}$/", $data['members_identitycard'])){
            $info['status']=0;
            $info['members_identitycard']='身份证不正确！';
        }
        if(!preg_match("/^([\d]){11}$/", $data['members_mobile'])){
               $info['status']=0;
               $info['members_mobile']='手机号码不正确！';

        }
        
        if(!preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/", $data['members_email'])){
                $info['status']=0;
                $info['members_email']='邮箱格式不对！';
            
        }
        if(count($this->where("members_username='".$data['members_username']."'")->find())>0){
                $info['status']=0;
                $info['members_username']='用户名已被注册，请换一个试试吧！';
            
        }
        if(count(M('Membersunique')->where("membersunique_identityCard='".$data['members_identitycard']."'")->find())>0){
            $info['status']=0;
            $info['members_identitycard']='身份证已存在，请换一个试试吧！';
        }
        if(count(M('Membersunique')->where("membersunique_mobile='".$data['members_mobile']."'")->find())>0){
                $info['status']=0;
                $info['members_mobile']	='电话号码已存在，请换一个试试吧！';
            
        }
        if(count(M('Membersunique')->where("membersunique_email='".$data['members_email']."'")->find())>0){
                $info['status']=0;
                $info['members_email']='邮箱已存在，请换一个试试吧！';
           
        }
        if($info['status']==0)
        return $info;
        $data['members_password']=md5($data['members_password']);
        $data_arr=array('members_username'=>$data['members_username'],
            'members_password'=>$data['members_password'],
            'members_truename'=>$data['members_truename'],
            'members_identitycard'=>$data['members_identitycard'],
            'members_studentscard'=>$data['members_studentscard'],
            'members_address'=>$data['members_address'],
            'members_mobile'=>$data['members_mobile'],
            'members_qqnum'=>$data['members_qqnum'],
            'members_email'=>$data['members_email'],
            'members_bewrite'=>$data['members_bewrite'],
            'members_joindate'=>time(),
            'members_joinip'=>$_SERVER["REMOTE_ADDR"],
            'members_schoolname'=>$data['members_schoolname'],
            'members_gender'=>$data['members_gender'],
            'members_visitset'=>'1',
        );
    
        // 		if (!$this->create($data_arr)){
        // 			// 如果创建失败 表示验证没有通过 输出错误提示信息
        // 			return $this->getError();
        // 		}else{
        // 			$info=array(
        // 					'status'=>1,
        // 					'info'	=>'注册成功!',
        // 			);
        // 			return $info;
        // 		}
    
        if($this->add($data_arr)>0){
            $info=array(
                'status'=>1,
                'info'	=>'注册成功!',
            );
            return $info;
        }else{
            $info=array(
                'status'=>0,
                'info'	=>'注册失败!',
            );
            return $info;
        }
    }	

	
	/**
	 * @author alexgordon
	 * @param 传入用户名 $user_name
	 * @param 传入密码 $user_pwd
	 * @return 数组
	 */
public function login($user_name,$user_pwd){
		$info=array();
		if(!$user_name){
			$info=array(
					'status'=>0,
					'info'	=>'用户名不能为空!',
			);
			
			return $info;
		}
		if(!$user_pwd){
			$info=array(
					'status'=>0,
					'info'	=>'密码不能为空!',
			);
			return $info;
		}

		$user_pwd=md5($user_pwd);
		$user_info=D('Members')->where("members_username='{$user_name}' AND members_password='{$user_pwd}'")->find();
// 		dump($this->getLastSql());
		if($user_info){
			$info=array(
					'status'=>1,
					'info'	=>'登陆成功！',
			        
			);
			session("userid",$user_info['members_id']);
			session("username",$user_info['members_username']);
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