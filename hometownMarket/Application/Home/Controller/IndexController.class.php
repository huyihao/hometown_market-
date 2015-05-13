<?php
/***
 * @author alexgordon
 * 首页控制器
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //get the secondgoods
        $allsales_goods_list=D('SecondgoodsTitle')->getAllGoodslistByType("0");
        $this->assign('allsales_goods_list',$allsales_goods_list);
        $allpurchase_goods_list=D('SecondgoodsTitle')->getAllGoodslistByType("1");
        $this->assign('allpurchase_goods_list',$allpurchase_goods_list);
        $sales_goods_list=D('SecondgoodsTitle')->getGoodslistByType("0");
        $this->assign('sales_goods_list',$sales_goods_list);
        $purchase_goods_list=D('SecondgoodsTitle')->getGoodslistByType("1");
        $this->assign('purchase_goods_list',$purchase_goods_list);
        //get the notice
        $notice_list=D('NoticeAll')->getAllNotice();
        $this->assign('notice_list',$notice_list);
        $this->display();
    }
    
    public function register(){
       $this->display();
    }
}