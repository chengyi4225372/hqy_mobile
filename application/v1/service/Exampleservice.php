<?php

namespace app\v1\service;
use app\common\model\Example;
use think\Cache;
use think\Config;
use think\Cookie;

class Exampleservice
{
    /**静态对象 **/
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
     * @title
     */
     public function getalllist($title){

        if(!empty($title) || isset($title) || !is_null($title)){

            $w = [
                 'status'=>1,
                 'title|describes|content'=>['like','%'.$title.'%'],
            ];

        }

         $list = Example::instance()->where($w)->order(['sort'=>'desc','create_time'=>'desc'])->paginate(9);

         return $list?$list:'';
     }

     /**
      * 添加
      * @data
      */
     public function addsetdata($data){
          if(empty($data) || is_array($data) == false){
              return false;
          }

          $ret = Example::instance()->data($data)->save();

          if($ret !== false){
              return true;
           }else {
              return false;
          }
     }

    /**
     * 获取当前单条数据信息
     */
     public function getoneinfo($id){
          if(empty($id) || !isset($id) || is_null($id) || $id<= 0){
              return false;
          }

          $w = ['id'=>$id,'status'=>1];

          $ret = Example::instance()->where($w)->find();
          return  $ret?$ret:'';
      }

     /**
      * 编辑
      * @id
      * @data
      */
     public function editiddata($id,$data){
         if(empty($id) || !isset($id) || is_null($id) || $id<= 0){
             return false;
         }

         if(empty($data)){
             return false;
         }

         $w  = ['id'=>$id,'status'=>1];

         $ret = Example::instance()->where($w)->data($data)->update();

         if($ret !== false){
             return true;
         }else {
             return false;
         }

     }

     /**
      * 删除
      * @id
      */
     public function delone($id){

       if(empty($id) || !isset($id) || is_null($id) || $id<= 0){
           return false;
       }

       $ret  = Example::instance()->where(['id'=>$id])->data(['status'=>0])->update();

       if($ret !== false){
           return true;
       }else {
           return false;
       }

     }

     /**
      * 修改排序
      * @id
      * @sort
      */
       public function changeidsort($id,$sort){

           if(empty($id) || !isset($id) || is_null($id) || $id <= 0){
               return false;
           }

           $w = ['id'=>$id,'status'=>1];
           $ret = Example::instance()->where($w)->data(['sort'=>$sort])->update();

           if($ret !== false){
               return true;
           }else {
               return false;
           }
      }

      /**
       * 获取客户案例列表接口
       * @page
       * @size
       */
       public function getcustmoerlist($page,$size){
            if(empty($page) || $page <=1 || is_null($page) || !isset($page)){
                $page =0;
            }else {
                $page = ($page -1) * $size;
            }
            if(empty($size)||!isset($size)|| is_null($size)){
                $size = 10;
            }

            $w = ['status'=>1];
            $list = Example::instance()->where($w)
                    ->field('id,sort,title,describes,imgs')
                    ->order('sort desc,create_time desc')
                    ->limit($page,$size)
                    ->select();
            if(empty($list) || !isset($list)){
                return $list ='';
            }

            foreach ($list as $key =>$val){
                $list[$key]['imgs'] = config('curl.hlg').$val['imgs'];
            }

            return $list;
       }

       /**
        * 获取客户案例详情接口
        * @id
        */
       public function getcustmoerbyid($id){
            if(empty($id) || !isset($id) || is_null($id) || $id<= 0){
                return false;
            }

            $w = ['id'=>$id,'status'=>1];

            $ret = Example::instance()->where($w)
                   ->field('id,sort,title,describes,imgs,content,seokey,create_time as time')
                   ->find();

            if(empty($ret) || !isset($ret)){
                return $ret ='';
            }

            $ret['imgs'] = config('curl.hzs').$ret['imgs'];
            $ret['time'] = date('Y-m-d',$ret['time']);

            $url = config('curl.hlg');
            $pregRule = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/";
            $ret['content'] = preg_replace($pregRule, '<img src="' . $url . '${1}">', $ret['content']);

            return  $ret;
        }
}