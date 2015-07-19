<?php
/***
 * @author alexgordon
 * 首页控制器
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function verify_c(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 18;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->codeSet = '0123456789';
        $Verify->imageW = 130;
        $Verify->imageH = 50;
        //$Verify->expire = 600;
        $Verify->entry();
    }
    public function frontpage(){
        $adminsId=I('session.admins_id',null);
        if($adminsId=='0'){
            $cate=D('category')->getAllCategoryByPid();
            $this->assign("cate",$cate);
            $sale_goods_list=D('Secondgoods')->getAllGoodslistByType("0");
            $purchase_goods_list=D('Secondgoods')->getAllGoodslistByType("1");
            $this->assign('sale_goods_list',$sale_goods_list);
            $this->assign('purchase_goods_list',$purchase_goods_list);
            $cateSelect=M('Category')->where("cate_pid <>'0'")->select();
            $this->assign('cateSelect',$cateSelect);
            $this->display();
        }
        else{
            header("Location:".U("User/index"));
        }
    }
    public function index(){
    if(IS_POST){
            $data=I('post.');
           $this->ajaxReturn(D('Admins')->login($data));
        }
        else{
        $cate=D('category')->getAllCategoryByPid();
        $this->assign("cate",$cate);
        $this->display();
        }
    }
    
    
    public function logout(){
        session("userid",null);
        header("Location:".U("Index/index"));
    }
    
}