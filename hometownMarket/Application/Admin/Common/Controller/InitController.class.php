<?php
namespace Admin\Common\Controller;
 use Think\Controller;
Class InitController extends Controller{
    protected function _initialize(){
       if($_SESSION['admins_id']==null){
           header("Location:".U("Index/index"));
            
       }
       
    }
}
?>