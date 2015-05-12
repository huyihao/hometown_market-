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
    
}


?>