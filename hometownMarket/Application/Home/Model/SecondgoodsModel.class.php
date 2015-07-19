<?php 
/**
 * @author ALEXGRODON
 * @return 二手商品模型
 * 
 */

namespace Home\Model;
use Think\Model;
class SecondgoodsModel extends Model{
    //通过id获取商品信息
    public function getGoodsById($id){
        $data=$this->where("secondgoods_id='{$id}'")->find();
        if($data[secondgoods_pastdate]<time())
            $this->where("secondgoods_id='{$id}'")->setField('secondgoods_efficiency','2');
        $this->where("secondgoods_id='{$id}'")->setInc('secondgoods_views',1,60);
        return $data;
    }
    
    //商品发布
    
    public function addGoods($data){
    		$info=array();
    		if($data['secondgoods_name']==''){
    			$info=array(
    				'status'=>0,
    				'info'	=>'商品名称不能为空',
    			);
    			 return $info;
    			
    		}
    		if($data['secondgoods_bewrite']==''){
    		    $info=array(
    		        'status'=>0,
    		        'info' =>'描述不能为空',
    		    );
    		    return $info;
    		}
    		if(!preg_match("/^[\d]/", $data['secondgoods_goodsnums'])){
    			
    			$info=array(
    					'status'=>0,
    					'info'	=>'数量应该为数字！',
    			);
    			return $info;
    		}
    		if(!preg_match("/^[\d]/", $data['secondgoods_price'])){
    				
    			$info=array(
    					'status'=>0,
    					'info'	=>'价格必须为数字！',
    			);
    			return $info;
    		}
    		
    		$data['secondgoods_postdate']=time();
    		$data['secondgoods_postip']=$_SERVER['REMOTE_ADDR'];
    		$data['secondgoods_editdate']=time();
    		
    		
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
    function getGoodslistByCate($category,$tradetype){
        $page=I("p",1,"int");
        $limit=5;
        $data=$this->where("secondgoods_class='{$category}' AND secondgoods_tradetype='{$tradetype}'")->order('secondgoods_postdate DESC')->page($page.','.$limit)->select();
        foreach($data as $key =>$value){
            if($data[$key][secondgoods_pastdate]<time())
                $this->where("secondgoods_id='{$data[$key][secondgoods_id]}'")->setField('secondgoods_efficiency','2');
        }
        foreach ($data as $key=>$value){
            if($data[$key]['secondgoods_efficiency']=='0')
                $data[$key]['secondgoods_efficiency']="交易正常";
            if($data[$key]['secondgoods_efficiency']=='1')
                $data[$key]['secondgoods_efficiency']="成功交易";
             if($data[$key]['secondgoods_efficiency']=='2')
                $data[$key]['secondgoods_efficiency']="商品已过期";
            
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
    //搜索商品
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