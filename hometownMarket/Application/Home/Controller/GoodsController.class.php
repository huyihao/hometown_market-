<?php
/****
 * @author alexgordon
 * 商品控制器
 * 
 */
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
class GoodsController extends Controller {
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
    
    public function addGoods(){
        if(IS_POST){
            $upload = new Upload();
            $upload->maxSize = 3145728;
            $upload->exts = array('jpg', 'jpeg', 'gif', 'png');
            $upload->hash = false;
            $uploadinfo = $upload->upload();
            $data=I('post.');
            $cateclass=I("get.secondgoods_class",0,"int");
            $data['secondgoods_class']=$cateclass;
            $data['secondgoods_pastdate']=time()+$data['secondgoods_pastdate']*24*3600;
            $data['secondgoods_usercode']=I('session.userid',0);
            foreach($uploadinfo as $key => $value){
                $uploadinfo[$key]['secondgoods_usercode']=$data['secondgoods_usercode'];
            }
            
            
    		$info=D('Secondgoods')->addGoods($data);
    		if($info['status']==1){
    		    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
    		    $isUpload=D('Seconduploads')->uploadPic($uploadinfo);
    		    if($isUpload[isAdd]=='1')
    		      $this->success('商品添加成功,且图片上传成功');
    		    else 
    		        $this->success('商品提交成功，但没有图片');
    		} else {
    		    //错误页面的默认跳转页面是返回前一页，通常不需要设置
    		    $this->error('提交失败,'.$info['info']);
    		}
        }
        else{
            $catename=I("get.secondgoods_name",0,"");
            $this->assign('catename',$catename);
            $cateclass=I("get.secondgoods_class",0,"int");
            $this->assign('cateclass',$cateclass);
            //右边菜单
            $notice_list=D('NoticeAll')->getAllNotice();
            $this->assign('notice_list',$notice_list);
            $cate=D('category')->getAllCategoryByPid();
            $this->assign("cate",$cate);
            $this->display();
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