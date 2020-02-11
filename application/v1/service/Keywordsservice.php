<?php

namespace app\v1\service;

use app\common\model\Keys;
use think\Cache;
use think\Config;
use think\Cookie;

class keywordsservice
{

// 静态对象
protected static $instance = null;

/**
 * @DESC：单例
 * @return null|static
 * @author: jason
 * @date: 2019-07-26 10:00:16
 */
public static function instance()
{
    if (is_null(self::$instance)) {
        self::$instance = new static();
    }
    return self::$instance;
}


/**
 * 列表页
 * @title 搜索条件
 */
 public function getlist($title){
  
    if(empty($title) || is_null($title)|| !isset($title)){
         $w = ['status'=>1];
     }else {
         $w = ['title'=>$title,'status'=>1];
     }

     $list = Keys::instance()->where($w)->order('sort desc')->paginate(6);

     return $list?$list:'';
 }

 /**
  * 添加
  * @data array
  */
  public function keysadd($data){
     if(empty($data) || !isset($data)){
          return false;
      }

      $ret =  Keys::instance()->data($data)->save();
    
      if($ret !== false){
           return true;
      }else {
           return false;
      }

  }

  /**
   * 编辑
   * @data array
   * @id int|string
   */
   public function keysedit($id,$data){
      if(empty($id)|| is_null($id) || !isset($id) || $id <= 0){
          return false;
      }

      if(empty($data) || !isset($data)){
          return false;
      }
      
      $w   = ['status'=>1,'id'=>$id];
      $ret = Keys::instance()->where($w)->data($data)->update();

      if($ret !== false){
          return true;
      }else {
          return false;
      }
   }
 

  /**
   * 获取详情
   * @id string|int
   * return bool
   */
    public function getkeysinfo($id){
        if(empty($id)|| is_null($id) || !isset($id) || $id <= 0){
            return false;
        }
        
        $w    = ['status'=>1,'id'=>$id];
        $info = Keys::instance()->where($w)->find();

        return $info?$info:'';
    }


    /**
     * 删除
     * @id int|string
     * return bool
     */
    public function savekeysstatus($id){
        if(empty($id)|| is_null($id) || !isset($id) || $id <= 0){
            return false;
        }  

        $w    = ['status'=>1,'id'=>$id];
        $data = ['status'=>0];

        $ret =  Keys::instance()->where($w)->data($data)->update();

        if($ret !== false){
            return true;
        }else {
            return false;
        }
    }

    /**
     * 排序
     * @id string｜int
     * @sort int
     */
     public function changesort($id,$sort){
        if(empty($id)|| is_null($id) || !isset($id) || $id <= 0){
            return false;
        }  
        $w = ['id'=>$id,'status'=>1];

        $data = ['sort'=>$sort];
        $res = Keys::instance()->where($w)->data($data)->update();

        if($res !== false){
            return true;
        }else {
            return false;
        }
     }

     /**
      * 获取关键字接口
      */
     public function getkeywordlist(){

         $w = ['status'=>1];

         $list = Keys::instance()->where($w)->field('id,title,sort')->order('sort desc')->limit(0,6)->select();

         return $list?$list:'';
     }

}