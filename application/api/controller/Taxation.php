<?php
namespace app\api\controller;


use think\Controller;
use app\api\controller\Apis;
use app\v1\service\Customerservice;
use app\v1\service\Taxationservice;
use app\v1\service\Hkeyservice;
use app\api\service\Apiservice;
class Taxation extends Apis{
   
/**
 * 客户案例接口
 * @page 当前页数
 * @size 每页显示条数
 * @countpage 总页数
 */
 public function customerlistapi(){
     if($this->request->isPost()){
        $page = input('post.page','','int');
        $size = input('post.size','','int');
        $list = Customerservice::instance()->getcustomerlist($page,$size);
        $countpage = Customerservice::instance()->totals($size);
       
        if(!empty($list) || isset($list)){
            $this->jsonMsg(200,'success',$list,$countpage);
        }

        if(empty($list) || !isset($list)){
            $this->jsonMsg(400,'数据为空！');
        }

     }

     return false;
 }


 /**
  * 客户案例详情
  * @id 客户案例id
  */
  public function getcustomerinfo(){
     if($this->request->isPost()){
       $mid  = input('post.id','','int');
       
       if(empty($mid)|| !isset($mid)|| is_null($mid)|| $mid<=0){
           $this->jsonMsg(403,'数据请求不合法');
       }
       //构造数据
       $info = Customerservice::instance()->getcustomeridinfo($mid);

       if(empty($info)||!isset($info)){
           $this->jsonMsg(400,'请求数据为空');
       }

       $this->jsonMsg(200,'success',$info);
     }
     return false;
  }
 

  /**
   * 新闻资讯列表
   * @page 当前页数
   * @size 每页显示条数
   * @keywords 搜索关键字
   * @title 标题搜索
   * @countpages 总页数
   */
  public function newslistapi(){
      if($this->request->isPost()){
        $page     = input('post.page','','int');
        $size     = input('post.size','','int');
        $keywords = input('post.keywords','','trim');
        $title    = input('post.title','','trim');
        
        //获取数据
        $list = Taxationservice::instance()->getnewslistapi($page,$size,$keywords,$title);
       //获取总页数 
        $countpage = Taxationservice::instance()->gettotalpages($keywords,$size,$title);
         
        if(empty($list)||!isset($list)){
            $this->jsonMsg(400,'请求数据为空！');
        }

        $this->jsonMsg(200,'success',$list,$countpage);

      }
      return false;
  }
  

  /**
   * 新闻资讯案例详情
   * @id 新闻id
   */
   public function getnewsinfo(){
      if($this->request->isPost()){
        $mid = input('post.id','','int');

        if(empty($mid) || !isset($mid)||is_null($mid)||$mid <= 0){
            $this->jsonMsg(403,'数据请求不合法！');
        } 
        //构造数据
        $info = Taxationservice::instance()->getidinfoapi($mid);

        if(empty($info)||!isset($info)){
            $this->jsonMsg(400,'数据请求为空');
        }
        
        $this->jsonMsg(200,'success',$info);

      }
      return false;
   }


    /**
     * 关键字接口 
     */
    public function getkeywordlist(){
        if($this->request->isPost()){
           //整理数据
          $list = Hkeyservice::instance()->gethkeywordlist();

          if(empty($list) || !isset($list)){
              $this->jsonMsg(400,'请求数据为空');
          } 
          
          $this->jsonMsg(200,'success',$list);

        }
        return false;
    }





    /**
     * @DESC：惠优税统计报名人数
     * @author: jason
     * @date: 2020-01-14 11:39:51
     */
    public function hysstatistics()
    {
        if(!$this->request->isPost()){
            return false;
        }
        $return_data = Apiservice::instance()->hysstatistics();
        if($return_data == false) return json(['code' => 400,'message' => '更新失败']);
        return json(['code' => 200,'message' => '更新成功']);
    }

    /**
     * @DESC：查询惠优税有多少报名人数
     * @author: jason
     * @date: 2020-01-14 01:57:28
     */
    public function gethyscount()
    {
        if(!$this->request->isPost()){
            return false;
        }
        $return_data = Apiservice::instance()->getHysCount();
        if($return_data == false) return json(['code' => 400,'message' => '更新失败']);
        return json(['code' => 200,'message' => 'success','totals' => $return_data['totals']]);
    }

  
}