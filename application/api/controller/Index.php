<?php
namespace app\api\controller;


use think\Controller;
use app\api\controller\Apis;
use app\v1\service\Exampleservice;
use app\v1\service\Workservice;
use app\v1\service\Keywordsservice;
use app\v1\service\Totalsservice;

class Index extends Apis{

    /**
     * 客户案例
     * 测试
     */
    public function customerlist(){
        if($this->request->isPost()){
            $page = input('post.page','','int');
            $size = input('post.size','','int');
            $list = Exampleservice::instance()->getcustmoerlist($page,$size);

            if(!empty($list) || isset($list)){
                $this->jsonMsg(200,'success',$list);
            }

            if(empty($list) || !isset($list)){
                $this->jsonMsg(400,'数据为空！');
            }
        }
        return false;
    }

    /**
     * 案例详情
     * 测试
     */
    public function customergetinfo(){
         if($this->request->isPost()){
             $id = input('post.id','','int');

             if(empty($id) || !isset($id) || is_null($id)||$id <=0){
               $this->jsonMsg(403,'数据请求不合法');
             }

             $info = Exampleservice::instance()->getcustmoerbyid($id);

             if(empty($info) || !isset($info)){
                 $this->jsonMsg(['code'=>400,'msg'=>'请求数据为空','data'=>null]);
             }

             $this->jsonMsg(200,'success',$info);
         }
         return false;
    }

    /**
     * 新闻资讯列表页
     * @title 搜索关键字
     * @page  当前页数
     * @size  每页显示条数
     */
    public function newslist(){
        if($this->request->isPost()){
             $title = input('post.title','','trim');
             $page  = input('post.page','','int');
             $size  = input('post.size','','int');


             $list  = Workservice::instance()->getworklist($title,$page,$size);
             //总页数
             $count = Workservice::instance()->getnewslistcount($title,$size);

             if(empty($list) || !isset($list)){
                 $this->jsonMsg(400,'请求数据为空');
             }

            $this->jsonMsg(200,'success',$list,$count);
        }
        return false;
    }

    /** 获取新闻详情**/
    public function getnewsinfo(){
        if($this->request->isPost()){
           $id = input('post.id','','int');

           if(empty($id) || !isset($id) || is_null($id) || $id <= 0){
               $this->jsonMsg(403,'数据类型不合法！');
           }

           $info = Workservice::instance()->getidbyinfo($id);

           $info['top'] = Workservice::instance()->gettopapi($id);//上一篇

           $info['next'] = Workservice::instance()->getnextapi($id);//下一篇

           if(empty($info) || !isset($info)){
               $this->jsonMsg(400,'数据为空');
           }

           $this->jsonMsg(200,'success',$info);
        }
        return false;
    }

    /**
     * 热门关键字列表
     */
    public function getkeywordlist(){
        if($this->request->isPost()){
             $list = keywordsservice::instance()->getkeywordlist();

             if(empty($list) || !isset($list)){
                 $this->jsonMsg(400,'请求数据为空');
             }

            $this->jsonMsg(200,'success',$list);
        }

        return false;
    }

    /**
     * 行业资讯最新的三条
     */
    public function hnewthree(){
        if($this->request->isPost()){
           $list = Workservice::instance()->getnewthree();

           if(empty($list) || !isset($list)){
               $this->jsonMsg(400,'数据为空');
           }

           $this->jsonMsg(200,'success',$list);
        }
    }

    /**
     * 统计人数
     */
    public function totalpeople(){
        if($this->request->isPost()){
            $id = input('post.id','','int');

            if(empty($id) || !isset($id) || is_null($id) || $id<=0){
                $this->jsonMsg(403,'请求数据不合法','');
            }

            $ret = Totalsservice::instance()->counts($id);

            if(!empty($ret) || isset($ret)){
                $this->jsonMsg(200,'success',$ret);
            }else {
                $this->jsonMsg(400,'请求数据为空',$ret);
            }
        }
    }

    /**
     * 增加在线报名人数
     * @id
     */
     public function  addpeople(){
         if($this->request->isPost()){
             $id = input('post.id','','int');

             if(empty($id) || !isset($id) || is_null($id) || $id<=0){
                 $this->jsonMsg(403,'请求数据不合法','');
             }

             $ret =  Totalsservice::instance()->humansetadd($id);

             if(empty($ret) || !isset($ret) || is_null($ret)){
                 $this->jsonMsg(400,'请求数据为空','');
             }else{
                 $this->jsonMsg(200,'success',$ret);
             }
         }
     }
}