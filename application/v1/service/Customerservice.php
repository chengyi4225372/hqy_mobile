<?php

/**
 * 客户案例service
 */
namespace app\v1\service;

use app\common\model\Customer;
use plugin\Tree;
use plugin\Crypt;
use think\Config;

class Customerservice
{
    protected static $instance = null;

    /**
     * @DESC：单例
     * @return null|static
     * @author: jason
     * @date: 2019-08-05 03:48:37
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }


    /**
     * 获取所有数量
     */
    public function getcount(){
        $count = Customer::instance()->where(['status'=>1])->count();
        return $count?$count:'';
    }

    /**
     * 获取列表
     * @title
     */
    public  function  getlist($title){
       if(!empty($title) || isset($title)){
           $w =[
               'status'=>1,
               'title|description'=>['like','%'.$title.'%'],
           ];
       }
       $list = Customer::instance()->where($w)->order('sort desc,create_time desc')->paginate(9);

       return $list?$list:'';
    }

    /**
     * 获取详情
     * @id
     */
    public function getidinfo($id){
        if(empty($id) || is_null($id) || isset($id) ==false){
            return false;
        }

        $info = Customer::instance()->where(['id'=>$id])->find();

        return $info?$info:'';
    }

    /**
     * 添加
     * @data array
     */
     public  function savedata($data){
         if(empty($data) || isset($data) == false){
             return false;
         }

         $ret = Customer::instance()->save($data);

         if($ret !== false){
             return true;
         }else {
             return false;
         }
     }

     /**
      * 编辑
      * @id
      * @data array
      */
     public function  getidsetdata($id,$data){
         if(empty($id)|| isset($id) == false ||is_null($id)){
             return false;
         }

         if(empty($data)|| !isset($data)){
             return '数据不合法';
         }

         $ret = Customer::instance()->where(['id'=>$id])->data($data)->update();

         if($ret !== false){
             return true;
         }else {
             return false;
         }
     }

     /**
      * 删除
      * 修改状态
      * @id
      */
     public function save_status($id){
         if(empty($id)||is_null($id) || isset($id) == false){
             return false;
         }

        $arr = ['status'=>0];
        $ret = Customer::instance()->where(['id'=>$id])->update($arr);
        if($ret !== false){
            return true;
        }else {
            return false;
        }
     }

     /**
      * 排序
      * @id
      * @sort
      */
      public function setthissort($id,$sort){
           if(empty($id)|| !isset($id) || is_null($id)|| $id <= 0){
               return false;
           }

           $data = ['sort'=>$sort];

           $res = Customer::instance()->where(['id'=>$id])->data($data)->update();

           if($res !==  false){
               return true;
           }else {
               return false;
           }
      } 


      /***
       * 客户案例列表接口数据
       * @page 页数
       * @size 显示条数
       */
      public function getcustomerlist($page,$size){
    
          if(empty($size) || !isset($size) || is_null($size)||$size <0){
              $size = 8;
          } 

          if(empty($page) || $page ==1 || is_null($page)|| !isset($page)){
            $page =0;
          }else{
            $page = ($page -1)* $size; 
          }

          $w =[
            'status'=>1,
          ];

          $list = Customer::instance()
                 ->where($w)
                 ->field('id,imgs,title,description')
                 ->order('create_time desc')
                 ->limit($page,$size)
                 ->select();
          
          if(empty($list)){
              return $list ='';
          }

          foreach($list as $k =>$key){
             $list[$k]['imgs'] = config('curl.hys'). $list[$k]['imgs'];
             //$list[$k]['create_time'] = date('Y-m-d',strtotime($list[$k]['create_time']));
          }

          return $list;

      } 

      /**
       * 客户案例总数
       * @size 每页显示条数
       */
      public function totals($size){
      
        if(empty($size)||$size<=0 || isset($size)){
           $size =8;
         }
         $w =[
            'status'=>1,
          ];
         
          $counts = Customer::instance()
                 ->where($w)
                 ->count();

       return  $totalpage = ceil($counts / 8);

      }

      /**
       * 客户案例详情
       * @id 
       */
      public function getcustomeridinfo($id){
         if(empty($id) || !isset($id) || is_null($id)||$id <=0){
           return  false;
         }

         $w = ['status'=>1,'id'=>$id];

         $info = Customer::instance()->where($w)->find()->toArray();


         if(empty($info)|| !isset($info)){
             return $info ='';
         } 
        
         $info['imgs'] = config('curl.hys').$info['imgs'];
         $info['create_time'] = date('Y-m-d',strtotime($info['create_time']));


         $url = config('curl.hys');
         $pregRule = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/";
         $info['content'] = preg_replace($pregRule, '<img src="' . $url . '${1}">', $info['content']);
         
         return $info;
      }
}