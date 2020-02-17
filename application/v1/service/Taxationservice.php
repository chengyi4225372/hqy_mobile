<?php

namespace app\v1\service;

use app\common\model\Admin;
use app\common\model\Taxation;
use plugin\Tree;
use plugin\Crypt;
use think\Config;

class Taxationservice
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
     * 获取数量
     */
    public function getcount(){
        $count =  Taxation::instance()->where(['status'=>1])->count();
        return $count?$count:'';
    }

   /**
    * 获取正常数据
    * $title
    */
   public function getList($title){
       if(!empty($title) || isset($title) == true){
           $w =[
               'status' =>1,
               'title|keywords|description' => ['like','%'.$title.'%'],
           ];
       }else {
           $w = ['status'=>1]; //正常
       }

       $list = Taxation::instance()->where($w)->order(['sort'=>'desc'])->paginate(10);

       return  $list;

   }

    /**
     * 根据用户id 获取详情
     * id string|int
     * return array
     */
   public function Getidinfo($id){
        
        if(empty($id) || !isset($id) || $id <=0 || is_null($id)){
            return false;
        }

        $info = Taxation::instance()->where(['id'=>$id,'status'=>1])->find();

        return  $info;
    }


   /**
    * 添加 数据
    * data array
    * return bool
    */
   public function addData($data){
        if(empty($data)){
            return false;
        }

        $ret = Taxation::instance()->data($data)->save();

        if($ret && $ret >0){
            return true;
        }else {
            return false;
        }
    }


   /**
    * 编辑
    * id string|int
    * data array
    * return bool
    */
   public function GetByIdSave($id,$data){

       if(empty($id) || $id <= 0 || is_null($id) || !isset($id)){
           return  false;
       }

       $set_data = Taxation::instance()->where(['id'=>$id])->data($data)->update();

       if($set_data && $set_data >0){
           return true;
       }else {
           return false;
       }

   }


   /**
    * 伪删除
    * id  string |int
    * return bool
    */
   public function  updateStatus($id){
        if(empty($id) || $id <= 0 || is_null($id) || !isset($id)){
            return  false;
        }

        $ret = Taxation::instance()->where(['id'=>$id])->update(['status'=>0]);

        if($ret){
            return true;
        }else {
            return false;
        }
    }

   /**
    * 获取新闻资讯接口数据
    * @title 关键字
    * @page 当前页
    * @size 每页显示条数
    * return json
    */
   public function getnewsjson($title,$page,$size){
       $array = [];
       if (empty($title)) {
           $array['status'] = 1;
       } else {
           $new_title = explode(',',$title);

           $arr_title = array_filter($new_title,function ($params){
               return !empty($params);
           });

           $arr_w = array_map(function ($pa){
               return '%'.$pa.'%';
           },$arr_title);

           $array['status'] = 1;
           $array['keywords'] = ['like',$arr_w,'OR'];
       }

       if($page == ''|| $page == 1 || is_null($page)){
           $page = 0;
       }

       if($page >1){
           $page = ($page -1) * $size;
       }

       $arr = Taxation::instance()->where($array)->order('sort desc,create_time desc')->limit($page,$size)->select();
       return $arr?$arr:'';
   }

   /**
    * 新闻资讯接口数据的条数
    * @title
    * return string |int
    */
   public function getnewscount(){
       $array = [];
       if (empty($title)) {
           $array['status'] = 1;
       } else {
           $new_title = explode(',',$title);

           $arr_title = array_filter($new_title,function ($params){
               return !empty($params);
           });

           $arr_w = array_map(function ($pa){
               return '%'.$pa.'%';
           },$arr_title);

           $array['status'] = 1;
           $array['keywords'] = ['like',$arr_w,'OR'];
       }

       $arr = Taxation::instance()->where($array)->order('sort desc,create_time desc')->count();
       return $arr?$arr:'';
   }

   /**
    * 排序设置
    * @id
    * @sort
    * return bool
    */
    public  function setthissort($id,$sort){
        if(empty($id) || !isset($id) || is_null($id) || $id <= 0){
            return false;
        }

        $data = ['sort'=>$sort];

        $res =  Taxation::instance()->where(['id'=>$id])->data($data)->update();

        if($res !== false){
            return true;
        }else {
            return false;
        }

    }

    /**
     * 上一页
     * @id
     */
    public function gettop($id){
        if(empty($id) || !isset($id) || is_null($id) || $id <= 0){
            return false;
        }

        $w = Taxation::instance()->where(['status'=>1,'id'=>$id])->field('sort')->find();

        $where = [
            'sort'=>['GT',$w['sort']],
            'status'=>1,
        ];

        $top = Taxation::instance()->where($where)->field('id,title')->order('sort asc,create_time desc')->find();

        return $top?$top:'';
    }

    /**
     * 下一页
     * @id
     */
    public function getnext($id){
        if(empty($id) || !isset($id) || is_null($id) || $id <= 0){
            return false;
        }

        $w = Taxation::instance()->where(['status'=>1,'id'=>$id])->field('sort')->find();

        $where = [
            'sort'=>['LT',$w['sort']],
            'status'=>1,
        ];

        $next = Taxation::instance()->field('id,title')->where($where)->order('sort desc ,create_time desc')->find();

        return $next?$next:'';
    } 
   

    /**
     * 获取新闻列表
     * @page
     * @size
     * @keywords
     */
    public function getnewslistapi($page,$size,$keywords){
          
        if(empty($size) || !isset($size) ||is_null($size) || $size <=0){
            $size =8;
        }

        if(empty($page) || !isset($page)){
            $page =0;
        }else {
           $page = ($page -1) * $size;
        }
        
        if(empty($keywords) || !isset($keywords)){
            $w = [
                'status'=>1,
            ];
        }else{
            $new_title = explode(',',$keywords);
            $arr_title = array_filter($new_title,function ($params){
                return !empty($params);
            });

            $arr_w = array_map(function ($pa){
                return '%'.$pa.'%';
            },$arr_title);

            $w = [
                 'status'=>1,
                 'title|keywords'=>['like',$arr_w,'OR'],
                ];
        } 

        $list = Taxation::instance()->where($w)->order('create_time desc')
                ->limit($page,$size)->select();

         if(empty($list)|| !isset($list)){
             return $list ='';
         }
         
         foreach($list as $k =>$val){
             $list[$k]['imgs'] = config('curl.hys').$list[$k]['imgs'];
         }
         
         return $list;
          
    } 

    /**
     * 获取总页数
     * @keywords 搜索关键字
     * @size  条数
     */
    public function gettotalpages($keywords,$size){
        if(empty($size) || !isset($size) ||is_null($size) || $size <=0){
            $size =8;
        } 

        if(empty($keywords) || !isset($keywords)){
            $w = [
                'status'=>1,
            ];
        }else {
            $new_title = explode(',',$keywords);
            $arr_title = array_filter($new_title,function ($params){
                return !empty($params);
            });

            $arr_w = array_map(function ($pa){
                return '%'.$pa.'%';
            },$arr_title);

            $w = [
                 'status'=>1,
                 'title|keywords'=>['like',$arr_w,'OR'],
                ];
        } 

        $count = Taxation::instance()->where($w)->count();
        
        if(empty($count) || !isset($count) || is_null($count)|| $count<=0){
             $total =0;
        }else {
            $total = ceil($count / $size);
        }

        return $total;
    }

    /**
     * 获取新闻详情
     * @id
     */
    public function getidinfoapi($id){
       if(empty($id)||!isset($id)||is_null($id)|| $id<=0){
           return false;
       }
       
       $w  = [
           'status'=>1,
           'id'=>$id,
       ];
       $info = Taxation::instance()
               ->field('id,title,skeyword,content,create_time as time')
               ->where($w)->find(); 

       if(empty($info)||!isset($info)){
           return $info='';
       }
       
       //上一篇
       $top = Taxation::instance()
              ->where(['create_time',['GT',$info['time']]])
              ->field('id,title')->find();
        if(empty($top)|| !isset($top)){
           $top ='这是第一篇了！';
        }      

       //下一篇
       $next = Taxation::instance()
       ->where(['create_time',['LT',$info['time']]])
       ->field('id,title')->find();

       if(empty($next)|| !isset($next)){
        $top ='这是最后一篇了！';
       } 
        
       $info['top']  = $top;
       $info['next'] = $next;
       $info['time'] = date('Y-m-d',strtotime($info['time']));
       $url = config('curl.hys');
       $pregRule = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/";
       $info['content'] = preg_replace($pregRule, '<img src="' . $url . '${1}">', $info['content']);
      
       return $info;
    } 


}
