<?php
/****
 * @author alexgordon
 * 商品控制器
 * 
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
class GoodsController extends Controller {
    //更改类别
    public function setCategory(){
        if(IS_POST){
            $secondgoodsClass=I('post.secondgoods_class',0,"int");
            $secondgoodsId=I('post.secondgoods_id',0,"int");
            D('Logging')->setGoodsCategory($secondgoodsId,$secondgoodsClass);
            $data=$this->ajaxReturn(M('Secondgoods')->where("secondgoods_id='{$secondgoodsId}'")
            ->setField('secondgoods_class',$secondgoodsClass));
            
        }
    }
    public function setStatus(){
        if(IS_POST){
            $secondgoodsStatus=I('get.secondgoods_efficiency',0,"int");
            $secondgoodsId=I('get.secondgoods_id',0,"int");
            $data=$this->ajaxReturn(M('Secondgoods')->where("secondgoods_id='{$secondgoodsId}'")
                ->setField('secondgoods_efficiency',$secondgoodsStatus));
        }
    }
    public function deleteGoods(){
        if(IS_POST){
            $secondgoodsId=I('get.secondgoods_id',0,"int");
            $data=$this->ajaxReturn(M('Secondgoods')->where("secondgoods_id='{$secondgoodsId}'")->delete());
            
        }
    }
    public function deleteAllGoods(){
        if(IS_POST){
            $data=I('post.');
            D('logging')->setDelGoods($data);
            $data=$this->ajaxReturn(D('Secondgoods')->deleteAllGoods($data));
            
        }
    } 
    
   
    
    public function listType(){
        //展现目录
        $cate=D('Category')->getAllCategorybyPid();
        $this->assign("cate",$cate);
        //get the notice
        $notice_list=D('NoticeAll')->getAllNotice();
        $this->assign('notice_list',$notice_list);
        
        $this->display();
    } 
    
    public function  searchGoods(){
        if(IS_POST){
            $data=I('post.');
            $data['secondgoods_pastdate']=time()+$data['secondgoods_pastdate'];
            $this->ajaxReturn(D('Secondgoods')->searchSomeGoods($data['secondgoods_name'],$data['secondgoods_tradetype'],$data['secondgoods_pastdate']));
         
        }else{
            $notice_list=D('NoticeAll')->getAllNotice();
            $this->assign('notice_list',$notice_list);
            $cate=D('category')->getAllCategoryByPid();
            $this->assign("cate",$cate);
            $this->display();
        }
    }
    public function listGoods(){
        //输出图片
        $count=array();
        $secondgoodsId=I("get.secondgoods_id",0,"int");
        $picture=D('Seconduploads')->getPicByGoodsId($secondgoodsId);
        for($i=1;$i<=$picture[count];$i++){
            $count[$i]=$i;
        }
        $this->assign('count',$count);
        $this->assign('picture',$picture);
        $goodsDesc=D('Secondgoods')->getGoodsById($secondgoodsId);
        $secondgoods_classname=M('Category')->where("cate_class='{$goodsDesc[secondgoods_class]}'")->getField('cate_name');
        $goodsDesc[secondgoods_classname]=$secondgoods_classname;
        if($goodsDesc[secondgoods_pastdate]<time() ||$goodsDesc[secondgoods_efficiency]==1)
            //判断商品 是否过期
            $goodsDesc[info]="1";
        if($goodsDesc[secondgoods_efficiency]==0)
            $goodsDesc[status]='正常交易';
        if($goodsDesc[secondgoods_efficiency]==1)
            $goodsDesc[status]='成功交易';
        if($goodsDesc[secondgoods_efficiency]==2)
            $goodsDesc[status]='商品已过期';
        $secondgoods_username=M('Members')->where("members_id='{$goodsDesc[secondgoods_usercode]}'")->getField('members_username');
        $goodsDesc['secondgoods_username']=$secondgoods_username;
        $this->assign('goodsDesc',$goodsDesc);
        dump($goodsDesc);
        //右边菜单
        $notice_list=D('NoticeAll')->getAllNotice();
        $this->assign('notice_list',$notice_list);
        $cate=D('category')->getAllCategoryByPid();
        $this->assign("cate",$cate);
        $this->display();
    }
    public function listMyGoods(){
        $userid=I('session.userid',0);
        $my_sale_goods_list=D('Secondgoods')->getGoodslistByUserid($userid,0);
        $my_purchase_goods_list=D('Secondgoods')->getGoodslistByUserid($userid,1);
        $this->assign('my_sale_goods_list',$my_sale_goods_list);
        $this->assign('my_purchase_goods_list',$my_purchase_goods_list);
        //右边菜单
        $notice_list=D('NoticeAll')->getAllNotice();
        $this->assign('notice_list',$notice_list);
        $cate=D('category')->getAllCategoryByPid();
        $this->assign("cate",$cate);
        $this->display();
    }
    public function listGoodsByCate(){
        $category=I('get.cate_class',0,'int');
        $sale_goods_list=D('Secondgoods')->getGoodslistByCate($category,0);
        $purchase_goods_list=D('Secondgoods')->getGoodslistByCate($category,1);
        $this->assign('sale_goods_list',$sale_goods_list);
        $this->assign('purchase_goods_list',$purchase_goods_list);
        //右边菜单
        $notice_list=D('NoticeAll')->getAllNotice();
        $this->assign('notice_list',$notice_list);
        $cate=D('category')->getAllCategoryByPid();
        $this->assign("cate",$cate);
        $this->display();
    }
    
    
}