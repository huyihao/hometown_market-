<?php 
/**
 * @author ALEXGRODON
 * @return 二手商品模型
 * 
 */

namespace Home\Model;
use Think\Model;
class SecondgoodsTitleModel extends Model{
    //get all the goods
    function getAllGoodslistByType($id){
        $page=I("p",1,"int");
        $limit=2;
        $data=$this->where("secondgoods_tradetype='{$id}'")->order('secondgoods_postdate DESC')->select();
        $count=$this->count();
        $Page= new \Think\Page($count,$limit);
        $show=$Page->show();
        return array("goods"=>$data,"page"=>$show);
    }
    //get part of goods by the trade type
    function getGoodslistByType($id){
        $data=$this->where("secondgoods_tradetype='{$id}'")->order('secondgoods_postdate DESC')->limit(20)->select();
        return array("goods"=>$data);
    }
    public function addGoods($data){
        $info=array();
        
    
        $data['secondgoods_postdate']=time();
        
    
    
        if($this->add($data)>0){
            $info=array(
                'status'=>1,
                'info'	=>'添加成功!',
            );
            return $info;
        }else{
            $info=array(
                'status'=>0,
                'info'	=>'添加失败!hehe',
            );
            return $info;
        }
    }
    
    public function searchSomeGoods($name,$tradetype,$postdate){
        $info=array();
        $goods_info=$this->where("secondgoods_tradetype='{$tradetype}' AND secondgoods_name like '%{$name}%' AND secondgoods_postdate < '{$postdate}'")
                ->select();
        
        if($goods_info){
            $info=array(
                'status'=>1,
                'info'	=>'查询成功！',
                'good_info'=>$goods_info,
            );
            
            return $info;
        }else{
            $info=array(
                'status'=>0,
                'info'	=>'查询失败!',
                
            );
            return $info;
        }
    
    }
}


?>