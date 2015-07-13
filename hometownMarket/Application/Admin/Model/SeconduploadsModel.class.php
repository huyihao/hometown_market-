<?php 
/**
 * @author ALEXGRODON
 * @return 图片上传模型
 * 
 */
namespace Admin\Model;
use Think\Model;
class SeconduploadsModel extends Model{
    
    function uploadPic($data){
        $file=array();
        $info=array();
        $isAdd='0';
        foreach ($data as $key =>$value){
            $image=new \Think\Image();
            $image->open('./Uploads/'.$data[$key]['savepath'].$data[$key]['savename']);
            $image->thumb(850,250,\Think\Image::IMAGE_THUMB_FILLED)->save('./Uploads/'.$data[$key]['savepath'].$data[$key]['savename']);
            $file[$key][seconduploads_usercode]=$data[$key]['secondgoods_usercode'];
            $file[$key][seconduploads_location]=$data[$key]['savepath'];
            $file[$key][seconduploads_bewrite]=$data[$key]['savename'];
            $file[$key][seconduploads_date]=time();
            $file[$key][seconduploads_size]=$data[$key]['size'];
            $file[$key][seconduploads_type]=$data[$key]['type'];
            $file[$key][seconduploads_goodscode]=D('Secondgoods')->order('secondgoods_id Desc')->limit(1)->getField('secondgoods_id');
          if($this->add($file[$key])>0){
           $isAdd='1';
        }else{
            $isAdd='0';
            
            
        }
        }
        
        return $isAdd;
    }
    function getNewPic(){
        $data=$this->order('seconduploads_size DESC')->limit(3)->select();
        return $data;
    }
    function getPicByGoodsId($id){
        $data=$this->where("seconduploads_goodscode='{$id}'")->select();
        $count=$this->where("seconduploads_goodscode='{$id}'")->count();
        return array('data'=>$data,'count'=>$count);
    }
    
}


?>