<?php 
/**
 * @author ALEXGRODON
 * @return 消息模型
 * 
 */

namespace Admin\Model;
use Think\Model;
class MessageModel extends Model{
    public function sendOrder($message){
        $message['message_typefrom']=$message['secondgoods_id'];
        $message['message_from_userid']=1;
        $message['message_from_username']='系统';
        $message['message_date']=time();
        $message['message_ip']=$_SERVER['REMOTE_ADDR'];
        //通过typefrom字段来判断用户是否重复下订单
        $isRepeated=$this->where("message_to_userid='{$message[message_to_userid]}' AND message_typefrom='{$message[message_typefrom]}'")->find();
        if (!$isRepeated){
            if($this->add($message)>0){

            D('Secondgoods')->where("secondgoods_id='{$message[secondgoods_id]}'")->setInc('secondgoods_orders');
            $info=array(
                'status'=>1,
                'info'	=>'下单成功!',
            );
            return $info;
         }
            else{
                $info=array(
                    'status'=>0,
                    'info'	=>'下单失败!',
                );
                return $info;
            }
        }
        else{
            $info=array(
                'status'=>0,
                'info'	=>'已下单，不能重复添加!',
            );
            return $info;
        }
    }
    public function sendMessage($message){
        $info=array();
        if(!$message[message_title]){
            $info=array(
                'status'=>0,
                'info'	=>'标题不能为空!',
            );
            	
            return $info;
        }
        if(!$message[message_to_username]){
            $info=array(
                'status'=>0,
                'info'	=>'接收者不能为空!',
            );
            return $info;
        }
        if(!$message[message_to_username]){
            $info=array(
                'status'=>0,
                'info'	=>'发送内容不能为空!',
            );
            return $info;
        }
    
          $message['message_to_userid']=M('Members')->where("members_username='{$message[message_to_username]}'")->getField('members_id');
           
        if(!$message['message_to_userid']){
            $info=array(
                'status'=>0,
                'info' =>'接收者不存在',
            );
            return $info;
        }
            
            $message['message_from_userid']=$_SESSION['userid'];
            $message['message_from_username']=$_SESSION['username'];
             $message['message_date']=time();
            $message['message_ip']=$_SERVER['REMOTE_ADDR'];
            
            if($this->add($message)>0){
    			$info=array(
    					'status'=>1,
    					'info'	=>'发送成功!',
    			);
    			return $info;
    		}else{
    			$info=array(
    					'status'=>0,
    					'info'	=>'发送失败!',
    			);
    			return $info;
    		}
    
    }
    
    public function getSendMessageByUser($username){
        $data=$this->where("message_from_username='{$username}'")->select();
        foreach ($data as $key=>$value){
        if($data[$key]['message_typeto']=='0')
            $data[$key]['message_typeto']='未读';
        else
            $data[$key]['message_typeto']='已读';
        }
        return $data;
        
         
    }
    public function getReceiveMessageByUser($username){
        $data=$this->where("message_to_username='{$username}'")->select();
        foreach ($data as $key=>$value){
            if($data[$key]['message_typeto']=='0')
                $data[$key]['message_typeto']='未读';
            else
                $data[$key]['message_typeto']='已读';
        }
        return $data;
         
    }
}