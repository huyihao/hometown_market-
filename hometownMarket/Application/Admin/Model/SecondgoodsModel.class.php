<?php 
/**
 * @author ALEXGRODON
 * @return 二手商品模型
 * 
 */
namespace Admin\Model;
use Think\Model;
class SecondgoodsModel extends Model{
    
    //删除checkbox商品
    public function deleteAllGoods($data){
        $isDel=1;
        foreach($data['dropIds'] as $key=>$value){
            $info=$this->where("secondgoods_id='{$data['dropIds'][$key]}'")->delete();
            
        }
        if(!$info)
            $isDel=0;
        return $isDel;
    }
    
    //通过id获取商品信息
    public function getGoodsById($id){
        $data=$this->where("secondgoods_id='{$id}'")->find();
        if($data[secondgoods_pastdate]<time())
            $this->where("secondgoods_id='{$id}'")->setField('secondgoods_efficiency','2');
        $this->where("secondgoods_id='{$id}'")->setInc('secondgoods_views',1,60);
        return $data;
    }
    
    
    //get all the goods
    public function getAllGoodslistByType($id){
        $page=I("p",1,"int");
        $limit=10;
        $data=$this->where("secondgoods_tradetype='{$id}'")->order('secondgoods_postdate DESC')->page($page.','.$limit)->select();
        $count=$this->where("secondgoods_tradetype='{$id}'")->count();
        foreach ($data as $key=>$value){
                $data[$key]['secondgoods_classname']=M('Category')->where("cate_class='{$data[$key]['secondgoods_class']}'")->getField('cate_name');
                if($data[$key]['secondgoods_efficiency']=='2')
                    $data[$key]['secondgoods_efficiency']="商品已过期";
                if($data[$key]['secondgoods_efficiency']=='0')
                    $data[$key]['secondgoods_efficiency']="交易正常";
                if($data[$key]['secondgoods_efficiency']=='1')
                    $data[$key]['secondgoods_efficiency']="成功交易";
                if(strtotime($data[$key]['secondgoods_pastdate'])<time())
                    $data[$key]['secondgoods_efficiency']="商品已过期";
                
            }
        $Page= new \Think\Page($count,$limit);
        $show=$Page->show();
        return array("goods"=>$data,"page"=>$show);
    }
    function getGoodslistByCate($category,$tradetype){
        $page=I("p",1,"int");
        $limit=5;
        $data=$this->where("secondgoods_class='{$category}' AND secondgoods_tradetype='{$tradetype}'")->order('secondgoods_postdate DESC')->page($page.','.$limit)->select();
         
        foreach ($data as $key=>$value){
            if($data[$key]['secondgoods_efficiency']=='0')
                $data[$key]['secondgoods_efficiency']="交易正常";
            if($data[$key]['secondgoods_efficiency']=='1')
                $data[$key]['secondgoods_efficiency']="成功交易";
            else{
                $data[$key]['secondgoods_efficiency']="商品已过期";
            }
        }
        $count=$this->where("secondgoods_class='{$category}' AND secondgoods_tradetype='{$tradetype}'")->order('secondgoods_postdate DESC')->count();
        $Page= new \Think\Page($count,$limit);
        $show=$Page->show();
        return array("goods"=>$data,"page"=>$show);
    }
    function getGoodslistByUserid($userid,$tradetype){
        $page=I("p",1,"int");
        $limit=5;
        $data=$this->where("secondgoods_usercode='{$userid}' AND secondgoods_tradetype='{$tradetype}'")->order('secondgoods_postdate DESC')->page($page.','.$limit)->select();
       
        foreach ($data as $key=>$value){
            if($data[$key]['secondgoods_efficiency']=='0')
                $data[$key]['secondgoods_efficiency']="交易正常";
            if($data[$key]['secondgoods_efficiency']=='1')
                $data[$key]['secondgoods_efficiency']="成功交易";
            if($data[$key]['secondgoods_efficiency']=='2')
                $data[$key]['secondgoods_efficiency']="商品已过期";
            
        }
        $count=$this->where("secondgoods_usercode='{$userid}' AND secondgoods_tradetype='{$tradetype}'")->order('secondgoods_postdate DESC')->count();
        $Page= new \Think\Page($count,$limit);
        $show=$Page->show();
        return array("goods"=>$data,"page"=>$show);
    }
    //get part of goods by the trade type
    function getGoodslistByType($id){
        $data=$this->where("secondgoods_tradetype='{$id}'")->order('secondgoods_postdate DESC')->limit(20)->select();
        
        return array("goods"=>$data);
    }
    function getAllGoodsTitlelistByType($id){
        $page=I("p",1,"int");
        $limit=2;
        $data=$this->where("secondgoods_tradetype='{$id}'")->order('secondgoods_postdate DESC')
                    ->getField('secondgoods_name','secondgoods_efficiency','secondgoods_postdate','secondgoods_views');
        $count=$this->count();
        $Page= new \Think\Page($count,$limit);
        $show=$Page->show();
        foreach ($data as $key=>$value){
            if($data[$key]['secondgoods_efficiency']=='0')
                $data[$key]['secondgoods_efficiency']="交易正常";
            if($data[$key]['secondgoods_efficiency']=='1')
                $data[$key]['secondgoods_efficiency']="成功交易";
            else{
                $data[$key]['secondgoods_efficiency']="商品已过期";
            }
        }
        return array("goods"=>$data,"page"=>$show);
    }
    
    //get part of goods by the trade type
    function getGoodsTitlelistByType($id){
        $data=$this->where("secondgoods_tradetype='{$id}'")->order('secondgoods_postdate DESC')->limit(10)
        ->select();
        foreach($data as $key =>$value){
            if($data[$key][secondgoods_pastdate]<time())
                $this->where("secondgoods_id='{$data[$key][secondgoods_id]}'")->setField('secondgoods_efficiency','2');
        }
//         $data1=$this->where("secondgoods_tradetype='{$id}'")->order('secondgoods_postdate DESC')->limit(10)
//         ->select();
        foreach ($data as $key=>$value){
            if($data[$key]['secondgoods_efficiency']=='0')
                $data[$key]['secondgoods_efficiency']="交易正常";
            if($data[$key]['secondgoods_efficiency']=='1')
                $data[$key]['secondgoods_efficiency']="成功交易";
            if($data[$key]['secondgoods_efficiency']=='2')
                $data[$key]['secondgoods_efficiency']="商品已过期";
            
        }
        return array("goods"=>$data);
    }
    
}


?>