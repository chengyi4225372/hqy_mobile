<?php
namespace app\v1\service;

use app\common\model\Work;

use app\common\model\News;
use app\common\model\Cases;
use app\common\model\Solution;
use think\Cache;
use think\Config;
use think\Cookie;

class Workservice
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
     * 前台获取最高的3条信息
     */
    public function three()
    {
        $where = [];
        $where['status'] = 1;
        $data = Work::instance()->where($where)->order('sort desc,create_time')->limit(3)->select();
        return $data;
    }


    /**
     * @DESC：获取资讯列表
     * @param $params
     * @return mixed
     * @author: jason
     * @date: 2019-12-05 05:42:31
     */
    public function getNewList($params)
    {
        $where = [];
        //按字段类型搜索
        if (!empty($params['searchField']) && !empty($params['searchValue'])) {
            $searchValue = preg_replace("/(\n)|(\s)|(\t)|(\')|(')|(，)/", ',', trim($params['searchValue']));
            $searchValue = explode(',', $searchValue);

            $searchValue = array_filter($searchValue, function ($par) {
                return !empty($par);
            });
            switch ($params['searchField']) {
                case 1:
                    $good = array_map(function ($param) {
                        return '%' . $param . '%';
                    }, $searchValue);
                    $where['title'] = array('like', $good, 'or');
                    break;
                case 2:
                    $good = array_map(function ($param) {
                        return '%' . $param . '%';
                    }, $searchValue);
                    $where['keyword'] = array('like', $good, 'or');
                    break;
                case 3:
                    $good = array_map(function ($param) {
                        return '%' . $param . '%';
                    }, $searchValue);
                    $where['desc'] = array('like', $good, 'or');
                    break;
            }
        }
        $where['status'] = 1;

        $list = Work::instance()->where($where)->order('sort desc,create_time')->paginate(15);
        return $list;
    }


    /**
     * array array
     *
     * 添加 数据
     */
    public function setAddArray($array)
    {
        $ret = Work::instance()->data($array)->save();
        return $ret;
    }
    
    /**
     * 通过关键字搜索
     * @title 搜索关键字
     * @page  当前页
     * @Size  每页显示条数
     */
     public function getkeywordjson($title,$pages,$size){
        if(empty($title)){
            
            $array['status'] = 1;
        }else{
        $new_title = explode(',',$title); 
        $arr_title = array_filter($new_title,function ($params){
            return !empty($params);
        });

        $arr_w = array_map(function ($pa){
            return '%'.$pa.'%';
        },$arr_title);

        $array['status'] = 1;
        $array['keyword'] = ['like',$arr_w,'OR'];
      }
        if($pages ==1 || $pages ==''){
            $pages = 0;
        }else {
            $pages = $pages*$size;
        }

        $arr = Work::instance()->where($array)->order('sort desc,create_time desc')->limit($pages,$size)->select();
       
        foreach($arr as $k =>$val){
            $arr[$k]['keyword'] = explode(',',$arr[$k]['keyword']); 
            $arr[$k]['desc']    = mb_substr($arr[$k]['desc'],0,110,'utf-8'); 
        }
       
        return $arr?$arr:'';
        
     } 

    /**
     * 通过id 更新
     * array array
     * id    string
     *return bool
     */
    public function updateByArray($array, $id)
    {
        $w = ['id' => $id];

        if (empty($id) || $id <= 0) {
            return false;
        }

        if (empty($array)) {
            return false;
        }

        $ret = Work::instance()->where($w)->update($array);
        return $ret;
    }


    /**
     * 通过id 获取信息
     */
    public function getIdInfo($id)
    {

        if (empty($id) || $id <= 0) {
            return false;
        }
        $w = ['id' => $id];
        $info = Work::instance()->where($w)->find();
        if(count($info) == 0) return [];
        $info['keyword2'] = $info['keyword'];
        $info['keyword'] = explode(',',$info['keyword']);
        return $info;
    }

    /**
     * 删除 del
     * id string
     * return bool
     */
    public function setDel($id)
    {
        if (empty($id) || $id <= 0) {
            return false;
        }

        $w = ['id' => $id];
        $c = ['status' => 2];
        $ret = Work::instance()->where($w)->update($c);
        return $ret;
    }

    /**
     *设置排序
     * id  string
     * sort string|int
     * return bool
     */
    public function toSetsort($id, $sort)
    {
        if (empty($id) || !isset($id)) {
            return false;
        }

        if (empty($sort) || $sort <= 0) {
            $sort = 0;
        }

        $w = ['id' => $id];
        $arr = ['sort' => $sort];

        $ret = Work::instance()->where($w)->update($arr);

        if ($ret !== false) {
            return true;
        } else {
            return false;
        }

    }


    /**
     * 上一篇
     * id string
     * return array|null
     */
    public function getTop($id)
    {
        if (empty($id) || !isset($id)) {
            return false;
        }
        $w = [
            'id' =>$id,
            'status' => 1
        ];

        $top = Work::instance()->where($w)->field('sort')->order('sort desc ,create_time asc')->find();

        $where = [
             'status'=>1,
             'sort'=>['GT',$top['sort']],
        ];

        $info = Work::instance()->where($where)->order('sort asc ,create_time asc')->find();

        if (empty($info)) {
            return $info = '';
        } else {
            return $info;
        }

    }

    /**
     * 下一篇
     * id string
     * return array|null
     */
    public function getNext($id)
    {
        if (empty($id) || !isset($id)) {
            return false;
        }

        $w = [
            'id' =>$id,
            'status' => 1
        ];

        $next = Work::instance()->where($w)->field('sort')->order('sort desc ,create_time asc')->find();

        $where = [
            'status'=>1,
            'sort'=>['LT',$next['sort']],
        ];

        $info = Work::instance()->where($where)->order('sort desc,create_time desc')->find();

        if (empty($info)) {
            return $info = '';
        } else {
            return $info;
        }
    }

    /**
     * $keyword string
     *
     * return string|int
     */
    public function getCount($title)
    {
        if (empty($title) || !isset($title)) {

            $where = ['status' => 1];
        } else {

            $where = [
                'status' => 1,
                'title|keyword' => ['like', '%' . $title . '%'],
            ];
        }

        $count = Work::instance()->where($where)->order('sort desc,create_time desc')->count('id');
        return $count;
    }


    /**
     * 前台新闻列表
     * title string
     * page  string | int
     * return array|null
     */
    public function Getinfolist($title)
    {
        if (empty($title) || !isset($title)) {

            $where = ['status' => 1];
        } else {

            $where = [
                'status' => 1,
                'title|keyword' => ['like', '%' . $title . '%'],
            ];
        }


        $list = Work::instance()->where($where)->order('sort desc,create_time desc')->paginate(10);
        
        foreach($list as $k =>$val){
            $list[$k]['keyword'] = explode(',',$list[$k]['keyword']); 
            $list[$k]['desc']    = mb_substr($list[$k]['desc'],0,110,'utf-8'); 
        }
        return $list;
    }


    /**
     * 获取有效数据总条数
     */
    public function getWorkCount()
    {
        $count = Work::instance()->where(['status' => 1])->count();
        return $count;
    }


    /**
     * @DESC：查询惠灵工的成功案例
     * @param $params
     * @return array
     * @author: jason
     * @date: 2019-12-02 03:58:49
     */
    public function getCaseInfo($params)
    {
        $where = [];
        //每页显示的数量
        $page_size = !empty($params['ps']) ? $params['ps'] : 20;
        //当前页
        $current_page = (!empty($params['page']) && intval($params['page']) > 0) ? $params['page'] : 1;
        //分页起始值
        $start = $page_size * ($current_page - 1);

        if (isset($params['title']) && !empty($params['title'])) {
            //将中文逗号替换成英文逗号
            if (strpos($params['title'], '，')) {
                $params['title'] = str_replace('，', ',', $params['title']);
            }
            //将空格替换成英文逗号
            $params['title'] = preg_replace('/\s{1,}/', ' ', $params['title']);
            $params['title'] = str_replace(' ', ',', $params['title']);
            $params['title'] = explode(',', $params['title']);

            $params['title'] = array_filter($params['title'], function ($params) {
                return !empty($params);
            });
            $caseArr = array_map(function ($par) {
                return '%' . $par . '%';
            }, $params['title']);

            $where['title'] = ['LIKE', $caseArr, 'OR'];
        }
        $where['status'] = 1;
        //分页url参数
        $config = [
            'query' => request()->param(),
        ];
        $caseInfo = Cases::instance()->where($where)
            ->limit($start, $page_size)
            ->order('id', 'desc')
            ->paginate($page_size, false, $config);
        $page = $caseInfo->render();

        $return_data = [
            'list' => $caseInfo->toArray(),
            'page' => $page,
        ];
        return $return_data;
    }

    /**
     * @DESC：查询一条数据
     * @author: jason
     * @date: 2019-12-02 04:14:59
     */
    public function getOneData($params)
    {

        if (empty($params)) {
            return false;
        }
        $where = [];
        $where['status'] = 1;
        $where['id'] = $params['id'];
        $return_data = Cases::instance()->where($where)->find();
        return $return_data;
    }

    /**
     * @DESC：添加惠灵工的成功案例
     * @author: jason
     * @date: 2019-12-02 03:13:06
     */
    public function addcase($params)
    {
        $add = [];
        $add['title'] = $params['title'];
        $add['content'] = $params['content'];
        $add['pic'] = $params['pic'];
        $add['describe'] = $params['describe'];
        $add['status'] = 1;
        $add['add_time'] = time();
        $add['update_time'] = time();
        $res = Cases::instance()->insert($add);
        if ($res === false) {
            return false;
        }
        return true;
    }

    /**
     * @DESC：编辑惠灵工的成功案例
     * @author: jason
     * @date: 2019-12-02 04:31:30
     */
    public function editcase($params)
    {
        $add = [];
        $add['title'] = $params['title'];
        $add['content'] = $params['content'];
        $add['pic'] = $params['pic'];
        $add['describe'] = $params['describe'];
        $add['update_time'] = time();
        $res = Cases::instance()->where(['id' => $params['id']])->update($add);
        if ($res === false) {
            return false;
        }
        return true;
    }

    /**
     * @DESC：删除惠灵工成功案例
     * @author: jason
     * @date: 2019-12-02 04:55:38
     */
    public function delcase($params)
    {
        $res = Cases::instance()->where(['id' => $params['id']])->update(['status' => 2]);
        if ($res === false) {
            return false;
        }
        return true;
    }


    /**
     * @DESC：行业解决方案首页
     * @author: jason
     * @date: 2019-12-02 08:13:40
     */
    public function getSolutionInfo($params)
    {
        $where = [];
        //每页显示的数量
        $page_size = !empty($params['ps']) ? $params['ps'] : 20;
        //当前页
        $current_page = (!empty($params['page']) && intval($params['page']) > 0) ? $params['page'] : 1;
        //分页起始值
        $start = $page_size * ($current_page - 1);

        if (isset($params['title']) && !empty($params['title'])) {
            //将中文逗号替换成英文逗号
            if (strpos($params['title'], '，')) {
                $params['title'] = str_replace('，', ',', $params['title']);
            }
            //将空格替换成英文逗号
            $params['title'] = preg_replace('/\s{1,}/', ' ', $params['title']);
            $params['title'] = str_replace(' ', ',', $params['title']);
            $params['title'] = explode(',', $params['title']);

            $params['title'] = array_filter($params['title'], function ($params) {
                return !empty($params);
            });
            $caseArr = array_map(function ($par) {
                return '%' . $par . '%';
            }, $params['title']);

            $where['title'] = ['LIKE', $caseArr, 'OR'];
        }
        $where['status'] = 1;
        //分页url参数
        $config = [
            'query' => request()->param(),
        ];
        $solutionInfo = Solution::instance()->where($where)
            ->limit($start, $page_size)
            ->order('id', 'desc')
            ->paginate($page_size, false, $config);
        $page = $solutionInfo->render();

        $return_data = [
            'list' => $solutionInfo->toArray(),
            'page' => $page,
        ];
        return $return_data;
    }


    /**
     * @DESC：添加行业解决方案
     * @author: jason
     * @date: 2019-12-02 08:44:36
     */
    public function addsolution($params)
    {
        if (empty($params)) {
            return false;
        }
        $add = [];
        $add['title'] = $params['title'];
        $add['content'] = $params['content'];
        $add['pic'] = $params['pic'];
        $add['status'] = 1;
        $add['add_time'] = time();
        $add['add_user'] = Cookie('username');
        $res = Solution::instance()->insert($add);
        if ($res === false) {
            return false;
        }
        return true;
    }

    /**
     * @DESC：编辑行业解决方案
     * @param $params
     * @return bool
     * @author: jason
     * @date: 2019-12-02 09:12:38
     */
    public function editsolution($params)
    {
        if (empty($params)) {
            return false;
        }
        if (empty($params['id']) || !isset($params['id'])) {
            return false;
        }
        $add = [];
        $add['title'] = $params['title'];
        $add['content'] = $params['content'];
        $add['pic'] = $params['pic'];
        $where = [];
        $where['id'] = $params['id'];
        $res = Solution::instance()->where($where)->update($add);
        if ($res === false) {
            return false;
        }
        return true;
    }

    /**
     * @DESC：查询一条数据出来
     * @param $params
     * @return bool
     * @author: jason
     * @date: 2019-12-02 09:18:31
     */
    public function getOneSolution($params)
    {
        if (empty($params)) {
            return false;
        }
        $where = [];
        $where['status'] = 1;
        $where['id'] = $params['id'];
        $return_data = Solution::instance()->where($where)->find();
        return $return_data;
    }

    public function delsolution($params)
    {
        $res = Solution::instance()->where(['id' => $params['id']])->update(['status' => 2]);
        if ($res === false) {
            return false;
        }
        return true;
    }

    /**
     * @DESC：获取客户案例=====>前端用
     * @author: jason
     * @date: 2019-12-03 10:48:43
     */
    public function getclientcase()
    {
        $where = [];
        $where['status'] = 1;
        $info = collection(Cases::instance()->where($where)->select())->toArray();
        return $info;
    }

    /**
     * @DESC：查询客户案例详情
     * @param $params
     * @return bool
     * @author: jason
     * @date: 2019-12-03 11:28:31
     */
    public function getcasedetail($params)
    {
        if (empty($params['id']) || !isset($params['id'])) {
            return false;
        }
        $id = $params['id'];
        $where = [];
        $where['id'] = $id;
        $where['status'] = 1;
        $return_data = Cases::instance()->where($where)->find();
        return $return_data;
    }

    /**
     * @DESC：获取所有的行业解决方案
     * @return array
     * @author: jason
     * @date: 2019-12-03 02:27:09
     */
    public function getAllSolution()
    {
        $return_data = collection(Solution::instance()->where(['status' => 1])->field('id,title,pic,content')->select())->toArray();
        return $return_data;
    }

    /**
     * @DESC：ajax获取一条解决方案
     * @return mixed
     * @author: jason
     * @date: 2019-12-03 02:29:28
     */
    public function ajaxOneSolution($params)
    {
        $where = [];
        $where['status'] = 1;
        $where['id'] = $params['id'];
        $return_data = Solution::instance()->where($where)->field('id,title,pic,content')->find();
        return $return_data;
    }

    /**
     *获取新闻列表
     * @title 搜索关键字
     * @page 当前页
     * @size 每页显示条数
     */
     public function getworklist($title,$page,$size){
          if(empty($title) || !isset($title) || is_null($title)){
              $w = ['status'=>1];
          }else {
              $new_title = explode(',',$title);
              $arr_title = array_filter($new_title,function ($params){
                  return !empty($params);
              });

              $arr_w = array_map(function ($pa){
                  return '%'.$pa.'%';
              },$arr_title);

              $w = [
                   'status'=>1,
                   'title|desc|keyword'=>['like',$arr_w,'OR'],
                  ];
          }


          if(empty($page)||is_null($page) || $page <= 1 || !isset($page)){
              $page =0;
          }else{
              $page = ($page -1) * $size;
          }

          if(empty($size) || !isset($size) || $size == 0){
              $size = 8;
          }

         $list = Work::instance()->where($w)
                 ->field('id,title,keyword,desc,imgs,sort,create_time as time')
                 ->order('sort desc ,create_time desc')
                 ->limit($page,$size)
                 ->select();

          if(empty($list) || !isset($list)){
              $list = '';
          }

          foreach ($list as $key =>$val){
              $list[$key]['imgs'] = config('curl.hlg').$list[$key]['imgs'];
              $list[$key]['time'] = date('Y-m-d',$list[$key]['time']);
              $list[$key]['keyword']= explode(',', $list[$key]['keyword']);
          }

          return $list;
     }

    /**
     * 获取新闻列表总页数
     * @title 搜索关键字
     * @size  每页显示条数
     */
      public function getnewslistcount($title,$size){
          if(empty($title) || !isset($title) || is_null($title)){
              $w = ['status'=>1];
          }else {
              $new_title = explode(',',$title);
              $arr_title = array_filter($new_title,function ($params){
                  return !empty($params);
              });

              $arr_w = array_map(function ($pa){
                  return '%'.$pa.'%';
              },$arr_title);

              $w = [
                   'status'=>1,
                   'title|desc|keyword'=>['like',$arr_w,'OR'],
                  ];
          }

          if(empty($size) || is_null($size) || !isset($size)){
              $size = 8;
          }

         $total =Work::instance()->where($w)->count();

         if(empty($total) || is_null($total)){
             return $count=1;
         }

         $count = ceil($total / $size);

         return $count;
      }

     /**
      * 获取新闻详情
      * @id string
      */
      public function getidbyinfo($id){
          if(empty($id) || !isset($id)||is_null($id) || $id <=0){
              return false;
          }
          $w = ['status'=>1,'id'=>$id];
          $info = Work::instance()->where($w)->field('id,keyword,title,desc,sort,content,seo_key,create_time as time')->find();

          if(empty($info) || !isset($info)){
            return $info ='';
          }
          $info['time'] = date('Y-m-d',$info['time']);
          $url = config('curl.hlg');
          $pregRule = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/";
          $info['content'] = preg_replace($pregRule, '<img src="' . $url . '${1}">', $info['content']);

          return $info;
      }

      /***
       * 上一篇接口
       * @id string|int
       */
      public function gettopapi($id){
          if (empty($id) || !isset($id)) {
              return false;
          }
          $w = [
              'id' =>$id,
              'status' => 1
          ];

          $top = Work::instance()->where($w)->field('sort')->find();

          $where = [
              'status'=>1,
              'sort'=>['GT',$top['sort']],
          ];

          $info = Work::instance()
                  ->where($where)
                  ->field('id,sort,title')
                  ->order('sort asc ,create_time desc')
                  ->find();

          if (empty($info)) {
              return $info = '这是第一篇了!';
          } else {
              return $info;
          }
      }

      /**
       * 下一篇接口
       * @id string|int
       */
       public function getnextapi($id){
           if (empty($id) || !isset($id)) {
               return false;
           }

           $w = [
               'id' =>$id,
               'status' =>1,
           ];

           $next = Work::instance()->where($w)->field('sort')->find();
           $where = [
               'status'=>1,
               'sort'=>['LT',$next['sort']],
           ];

           $info = Work::instance()
                   ->where($where)
                   ->field('id,sort,title')
                   ->order('sort desc,create_time desc')->find();

           if (empty($info) || !isset($info)) {
               return $info = '这是最后一篇了!';
           } else {
               return $info;
           }
       }

       /**
        * 惠灵工首页行业资讯接口
        * 最新的三条
        */
       public function getnewthree(){
           $w = ['status'=>1];

           $newlist =  Work::instance()->where($w)
               ->field('id,title,keyword,desc,imgs,sort,create_time as time')
               ->order('sort desc ,create_time desc')
               ->limit(0,3)
               ->select();

           if(empty($newlist) || !isset($newlist)){
               return $newlist ='';
           }

           foreach ($newlist as $key =>$val){
               $newlist[$key]['imgs'] = config('curl.hlg').$newlist[$key]['imgs'];
               $newlist[$key]['time'] = date('Y-m-d',$newlist[$key]['time']);
           }

           return $newlist;
       }
}
