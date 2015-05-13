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
//     		$this->ajaxReturn(D('User')->register($data));
    		
    	}
    	else{
    		$this->display();
    	}

    	
    }
}