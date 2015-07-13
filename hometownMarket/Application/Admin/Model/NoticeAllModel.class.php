<?php 
/**
 * @author ALEXGRODON
 * @return 公告模型
 * 
 */

namespace Admin\Model;
use Think\Model;
class NoticeAllModel extends Model{
    //get all the goods
    function getAllNotice(){
        $data=$this->order('notice_noticedate DESC')->select();
        return array("notice"=>$data);
    }
    
}


?>