<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
    function getAllCategoryByPid(){
        $tree=array();
        $data=$this->field('cate_class,cate_name,cate_pid')->select();
        $list=array();
        foreach($data as $arr){
            $list[$arr['cate_pid']][]=$arr;
        }
        return $list;
    }
    
//     function createtree( $data,$lv=1){
//         for($i=0;$i <count($data);$i++){
//             $data[$i]['lv']=$lv;
//             $this->tree[count($this->tree)]=$data[$i];
//             $res=M('category')->where('cate_pid='.$data[$i]['cate_class'])->select();
//             $this->createtree($res,($lv+1));
//         }
//     }
    
    
}