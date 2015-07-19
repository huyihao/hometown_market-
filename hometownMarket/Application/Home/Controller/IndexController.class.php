<?php
/***
 * @author alexgordon
 * 首页控制器
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //获得最新图片
        $newPic=D('Seconduploads')->getNewPic();
        $this->assign('newPic',$newPic);
        //get the secondgoods
        $allsales_goods_list=D('Secondgoods')->getAllGoodslistByType("0");
        $this->assign('allsales_goods_list',$allsales_goods_list);
        $allpurchase_goods_list=D('Secondgoods')->getAllGoodslistByType("1");
        $this->assign('allpurchase_goods_list',$allpurchase_goods_list);
        $sales_goods_list=D('Secondgoods')->getGoodsTitlelistByType("0");
        $this->assign('sales_goods_list',$sales_goods_list);
        $purchase_goods_list=D('Secondgoods')->getGoodsTitlelistByType("1");
        $this->assign('purchase_goods_list',$purchase_goods_list);
        //get the notice
        $notice_list=D('NoticeAll')->getAllNotice();
        $this->assign('notice_list',$notice_list);
        
//         get the parentcategory
//         $category_list=M('category')->where(array('cate_pid'=> '0'))->field('cate_class,cate_name')->select();
//         $this->assign('category_list',$category_list);
        $cate=D('category')->getAllCategoryByPid();
        $this->assign("cate",$cate);
        $this->display();
        //get all the category
        
    }
    
    public function register(){
    	if(IS_POST){
    		$data=I('post.');
    		$this->ajaxReturn(D('Members')->register($data));
    		
    	}
    	else{
    		$this->display();
    	}
    	
    }
    public function login(){
        if(IS_POST){
            $data=I('post.');
            $this->ajaxReturn(D('Members')->login($data['username'],$data['password']));
        }
    }
    //go to the front page after register
    public function logout(){
        session("userid",null);
        header("Location:".U("Index/index"));
    }
}