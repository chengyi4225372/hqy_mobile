<?php
namespace app\common\model;
use think\model;
class HysStatistics
{
    //静态对象
    protected static $readInstance = null;
    //表名
    protected $table='h_hys_statistics';
    /**
     * 单例
     * @author jason
     * @date 2019-04-12 09:47:11
     * @return void
     */
    public static function instance()
    {
        if(!self::$readInstance) self::$readInstance = new self('', '', '');
        return self::$readInstance;
    }
}