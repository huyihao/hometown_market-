<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
    $this->display();    
    }
    public function logout(){
        session("userid",null);        
        header("Location:".U("Index/index"));
    }
   
    public function login(){
    	if(IS_POST){
			$data=I('post.');
			$this->ajaxReturn(D('User')->login($data['username'],$data['userpwd']));
    	}
    	else{
    		$this->display();
    	}
    }
    public function register(){
    	
    	if(IS_POST){
    		$data=I('post.');
    		$data_arr=array('members_username'=>$data['username'],
				'members_password'=>$data['password'],
    		    'members_repeatPasswd'=>$data['repeatPasswd'],
				'members_truename'=>$data['realname'],
				'members_identitycard'=>$data['identitycard'],
    		    'members_studentcard'=>$data['studentcard'],
    		    'members_address'=>$data['address'],
    		    'members_mobile'=>$data['num'],
    		    'members_email'=>$data['email'],
    		    'members_qqnum'=>$data['qq'],
    		    'members_schoolname'=>$data['schoolname'],
    		    'members_bewrite'=>$data['desc'],
    		    'members_gender'=>$data['gender'],
		);
    		if($data_arr['gender']=='靓仔')
    		    $data_arr['gender']=1;
    		else 
    		    $data_arr['gender']=0;
    		$this->ajaxReturn(D('Members')->register($data_arr));
    		
    	}
    	else{
    		header("Location:".U("Index/register"));
    	}

    	
    }
}