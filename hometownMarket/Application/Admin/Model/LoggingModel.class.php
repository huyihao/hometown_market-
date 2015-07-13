<?php
/***
 * 日志操作
 * 
 */
namespace Admin\Model;
use Think\Model;
class LoggingModel extends Model {
    
    public function addlogging($id){
      $data=array();
      $data[logging_time]=time();
      $data[logging_ip]=$_SERVER["REMOTE_ADDR"];
        if($id=='1'){
            $data[logging_content]="ip地址为".$data[logging_ip]."的用户登陆后台";
            $this->data($data)->add();
        }
    }
    
}