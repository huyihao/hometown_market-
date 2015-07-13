<?php
/****
 * @author alexgordon
 * 商品控制器
 * 
 */
namespace Home\Controller;
use Think\Controller;

class MessageController extends Controller {
    //添加订单
    public function sendOrder(){
        if(IS_POST){
            $data=I('post.');
           $data[secondgoods_id]=I('get.secondgoods_id',0,'int');
            $this->ajaxReturn(D('Message')->sendOrder($data));
//             header("Location:".U("Goods/listGoods",array('secondgoods_id'=>$data[secondgoods_id])));
        }
    }
    public function deleteReceive(){
        $message_id=I("get.message_id",0,'int');
        M('Message')->where("message_id='{$message_id}'")->delete();
        header("Location:".U("Message/receivebox"));
    }
    public function deleteSend(){
        $message_id=I("get.message_id",0,'int');
        M('Message')->where("message_id='{$message_id}'")->delete();
        header("Location:".U("Message/sendbox"));
    }
    //更改消息阅读状态
    public function setStatus(){
        if(IS_POST){
            $data=I('post.');
            M("Message")->where("message_id='{$data[message_id]}'")->setField('message_typeto',1);
        }
    }
    public function sendMessage(){
            if(IS_POST){
                $data=I('post.');
                $this->ajaxReturn(D('Message')->sendMessage($data));
            }
        }
     
    public function replyMessage(){
        if(IS_POST){
            $data=I('post.');
            $info=D('Message')->sendMessage($data);
            if($info['status']==1){
                //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            
                $this->success('回复成功');
            } else {
                //错误页面的默认跳转页面是返回前一页，通常不需要设置
                $this->error('回复失败,'.$info['info']);
            }
        }
    }
        
     public function sendbox(){
         $username=I('session.username',0);
         dump($username);
         $sendlist=D('Message')->getSendMessageByUser($username);
         $this->assign('sendlist',$sendlist);
         $this->display();
     }
     public function receivebox(){
         $username=I('session.username',0);
         
         $receivelist=D('Message')->getReceiveMessageByUser($username);
         $this->assign('receivelist',$receivelist);
          
         $this->display();
     }
     public function listMessage(){
         
     }
    
    
    
    
}


