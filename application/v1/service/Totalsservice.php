<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/13
 * Time: 10:01
 */
namespace app\v1\service;

use app\common\model\Totals;
use think\Cache;
use think\Config;
use think\Cookie;

class Totalsservice
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
     * 获取总人数
     * @id
     */
     public function counts($id){
         if(empty($id) || !isset($id) || is_null($id) || $id<=0){
             return false;
         }

         $res = Totals::instance()->where(['id'=>$id])->value('totals');

         return $res?$res:0;

     }

     /**
      * 增加人数
      * @id
      */
     public function humansetadd($id){
         if(empty($id) || !isset($id) || is_null($id) || $id<=0){
             return false;
         }
         //每次提交 增加的人数
         $addnumber = config('totals.hlg_totals');

         $ret = Totals::instance()->where(['id'=>$id])->setInc('totals',$addnumber);

         if($ret !== false){
             return true;
         }else {
             return false;
         }

     }


     /**
      * 统计所有次数
      *
      */
     public function countpeople(){
         $counts = Totals::instance()->field('totals')->where('id',1)->find();
         return $counts?$counts:0;
     }

}
