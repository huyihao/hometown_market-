<?php
namespace Admin\Model;
use Think\Model;
class MembersModel extends Model {
	//获取对应的用户
	public function getUserByStatus($id){
	    $page=I("p",1,"int");
	    $limit=10;
	    $data=$this->where("members_visitset='{$id}'")->order('members_joindate DESC')->page($page.','.$limit)->select();
	    $count=$this->where("members_visitset='{$id}'")->count();
	    foreach ($data as $key=>$value){
	           if($data[$key]['members_visitset']=='1')
                    $data[$key]['members_visitsetname']="未审核";
	           if($data[$key]['members_visitset']=='0')
	               $data[$key]['members_visitsetname']="审核通过";
	           if($data[$key]['members_visitset']=='2')
	               $data[$key]['members_visitsetname']="审核不通过";
	           if($data[$key]['members_visitset']=='3')
	               $data[$key]['members_visitsetname']="被禁止访问";
	           
            }
	    $Page= new \Think\Page($count,$limit);
	    $show=$Page->show();
	    return array("users"=>$data,"page"=>$show);
	}
}