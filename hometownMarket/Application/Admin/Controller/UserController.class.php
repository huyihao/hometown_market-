<?php
namespace Admin\Controller;

class UserController extends \Admin\Common\Controller\InitController {
    //更改用户状态
    public function setVisitset(){
        if(IS_POST){
            $membersVisitset=I('post.members_visitset',0,"int");
            $membersId=I('post.members_id',1,"int");
            D('Logging')->setMembersVisitset($membersId,$membersVisitset);
//             $data=$this->ajaxReturn(M('Members')->where("members_id='{$membersId}'")
//             ->setField('members_visitset',$membersVisitset));
            $this->ajaxReturn(D('Members')->setVisitset($membersId,$membersVisitset));
        }
    }
    //未审核
    
    public function notChecked(){
        $adminsId=I('session.admins_id',null);
        if($adminsId=='0'){
        $users=D('Members')->getUserByStatus('1');
        $this->assign('users',$users);
        $this->display();
        }
    else{
            header("Location:".U("User/index"));
        }
    }
    //已审核
    public function checked(){
        $adminsId=I('session.admins_id',null);
        if($adminsId=='0'){
        $users=D('Members')->getUserByStatus('0');
        $this->assign('users',$users);
        $this->display();
        }
    }
    //审核失败
    public function failedChecked(){
        $users=D('Members')->getUserByStatus('2');
        $this->assign('users',$users);
        dump($users);
        $this->display();
    }
    //禁止登陆
    public function ForbiddenUser(){
        $users=D('Members')->getUserByStatus('3');
        $this->assign('users',$users);
        $this->display();
    }
    //申请更改
    public function ApplyForModify(){
        $this->display();
    }
    
}
