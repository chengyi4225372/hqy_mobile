<?php

/**
 * 慧优税关键字service
 */
namespace app\v1\service;

use app\common\model\Hkeys;
use plugin\Tree;
use plugin\Crypt;
use think\Config;

class Hkeyservice
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
     * 获取关键字列表
     */
    public function gethkeywordlist(){
         $w =[
             'status'=>1,
         ]; 

         $list = Hkeys::instance()->where($w)
                 ->order('id desc')->select();
         
       return $list?$list:'';  
    }


}
