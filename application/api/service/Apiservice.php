<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 2020/1/3
 * Time: 9:12
 */
namespace app\api\service;
use app\common\model\HysStatistics;
use think\Config;
class Apiservice
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
     * @DESC:惠优税的报名人数统计
     * @author: jason
     * @date: 2020-02-18 02:43:47
     * @return bool
     */
    public function hysstatistics()
    {
        $totals = Config::get('site.hys_total');
        $where = [];
        $where['status'] = 1;
        $res = HysStatistics::instance()->where($where)->setInc('totals',$totals);
        if($res === false){
            return false;
        }
        return true;
    }

    /**
     * @DESC:统计惠优税的报名人数
     * @author: jason
     * @date: 2020-02-18 02:48:27
     * @return mixed
     */
    public function getHysCount()
    {
        $where['status'] = 1;
        $reeturn_data = HysStatistics::instance()->where($where)->find();
        return !empty($reeturn_data) ? $reeturn_data : 0;
    }
}