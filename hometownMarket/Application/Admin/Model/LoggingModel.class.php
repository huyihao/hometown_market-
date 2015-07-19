<?php
/***
 * 日志操作
 * 
 */
namespace Admin\Model;
use Think\Model;
class LoggingModel extends Model {
    //登陆日志
    public function addlogging($id){
      $data=array();
      $data[logging_time]=time();
      $data[logging_ip]=$_SERVER["REMOTE_ADDR"];
        if($id=='1'){
            $data[logging_content]="ip地址为".$data[logging_ip]."的用户登陆后台";
            $this->data($data)->add();
        }
    }
    //修改类别日志
    public function setGoodsCategory($secondgoodsId,$class){
        $data=array();
        $data[logging_time]=time();
        $data[logging_ip]=$_SERVER['REMOTE_ADDR'];
        $data[secondgoodsName]=D('Secondgoods')->where("secondgoods_id='{$secondgoodsId}'")->getField('secondgoods_name');
        $data[secondgoodsClass]=D('Category')->where("cate_class='{$class}'")->getField('cate_name');
        $data[logging_content]="ip地址为".$data[logging_ip]."的用户把".$data[secondgoodsName]."的分类改成：".$data[secondgoodsClass];
        $this->data($data)->add();
        
    }
    //修改会员访问权限日志
    public function setMembersVisitset($membersId,$visitset){
        $data=array();
        $data[logging_time]=time();
        $data[logging_ip]=$_SERVER['REMOTE_ADDR'];
        $data[username]=D('Members')->where("members_id='{$membersId}'")->getField('members_username');
        if($visitset=='0'){
            $data[logging_content]="ip地址为".$data[logging_ip]."的用户把".$data[username]."设为正常访问";
        }
        else if($visitset=='1'){
            $data[logging_content]="ip地址为".$data[logging_ip]."的用户把".$data[username]."设为未审核";
        }
        else if($visitset=='2'){
            $data[logging_content]="ip地址为".$data[logging_ip]."的用户把".$data[username]."设为审核未通过";
        }
        else{
            $data[logging_content]="ip地址为".$data[logging_ip]."的用户把".$data[username]."设为被禁止访问";
        }

        $this->data($data)->add();
    }
    //删除商品日志
    public function setDelGoods($secondgoodsidSet){
        $data=array();
        $data[logging_time]=time();
        $data[logging_ip]=$_SERVER['REMOTE_ADDR'];
        $data[logging_content]=count($secondgoodsidSet);
        $data[logging_content]="ip地址为".$data[logging_ip]."的用户删除了".$data[logging_content]."个商品";
       $this->data($data)->add();
    }
    
}