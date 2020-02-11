<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/13
 * Time: 9:58
 */
namespace app\common\model;
use think\Model;

/**
 * Class Menu
 * @package app\common\model
 */
class Totals extends Model
{
    //静态对象
    protected static $instance = null;
    //表名
    protected $table='h_hlg_people';

    /**
     * 单例
     * @author lamkakyun
     * @date 2019-04-12 09:47:11
     * @return void
     */
    public static function instance()
    {
        if(!self::$instance) self::$instance = new self('', '', '');
        return self::$instance;
    }
}