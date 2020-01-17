<?php
/**
 * 系统管理.
 * User: abc
 * Date: 2019/7/25
 * Time: 14:06
 */
namespace app\v1\controller\systematic;
use app\common\controller\AuthController;
use app\v1\service\Systems;
use think\Config;
class System extends AuthController
{
    /**
     * @DESC：系统设置
     * @author: jason
     * @date: 2019-10-16 04:35:35
     */
    public function setting()
    {
        $return_data = Systems::instance()->getSetting();
        $status = Config::get('site.status');
        $this->assign('status',$status);
        $this->assign('data_list',$return_data);
        $this->assign('title','网站设置');
        return $this->fetch();
    }

    /**
     * @DESC：添加网站设置
     * @author: jason
     * @date: 2019-10-17 10:11:31
     */
    public function addsitesetting()
    {
        if($this->request->isAjax() && $this->request->isPost()){
            return Systems::instance()->addSiteSitting($_POST);
        }
        $status = Config::get('site.status');
        $this->assign('status',$status);
        return $this->fetch();
    }

    /**
     * @DESC：修改网站设置
     * @author: jason
     * @date: 2019-10-21 01:46:50
     */
    public function editsetting()
    {
        if($this->request->isAjax() && $this->request->isPost()){
            $return_data = Systems::instance()->editsetting($_POST);
            return $return_data;
        }
        $id = $_GET['id'];
        $status = Config::get('site.status');
        $retutn_data = Systems::instance()->getEditsetting($id);
        $this->assign('data',$retutn_data);
        $this->assign('status',$status);
        return $this->fetch();
    }

    /**
     * @DESC：首页轮播图设置列表
     * @author: jason
     * @date: 2019-10-21 02:33:44
     */
    public function slideshow()
    {
        $status = Config::get('site.lunbo');
        $params = $_GET;
        if(isset($params['status']) === false){
            $params['status'] = '';
        }
        $reutrn_data = Systems::instance()->getslideshow($params);
        $this->assign('data',$reutrn_data);
        $this->assign('params',$params);
        $this->assign('status',$status);
        $this->assign('title','首页轮播图');
        return $this->fetch();
    }

    /**
     * @DESC：添加轮播图的弹窗
     * @return mixed
     * @author: jason
     * @date: 2019-10-21 02:55:41
     */
    public function addslideshow()
    {
        if($this->request->isAjax() && $this->request->isPost()){
            $return_data = Systems::instance()->addslideshow($_POST);
            return $return_data;
        }
        $status = Config::get('site.lunbo');
        $this->assign('status',$status);
        return $this->fetch();
    }

    /**
     * @DESC：编辑轮播图的弹窗
     * @author: jason
     * @date: 2019-10-21 06:15:03
     */
    public function editslideshow()
    {
        if($this->request->isAjax() && $this->request->isPost()){
            $data = Systems::instance()->editslideshow($_POST);
            return $data;
        }
        $id = $_GET['id'];
        $return_data = Systems::instance()->getOneSlideshow($id);
        $status = Config::get('site.lunbo');
        $this->assign('status',$status);
        $this->assign('data',$return_data);
        return $this->fetch();
    }

    /**
     * @DESC：改变轮播图的状态
     * @return \think\response\Json
     * @author: jason
     * @date: 2019-12-13 09:51:08
     */
    public function slidestatus()
    {
        if($this->request->isPost() && $this->request->isAjax()){
            $return_data = Systems::instance()->slidestatus($_POST);
            if($return_data == false){
                return json(['status' => 400,'msg' => '请确认操作是否正确']);
            }
            return json(['status' => 200,'msg' => '操作成功']);
        }
    }

    /**
     * @DESC：友情链接
     * @return mixed
     * @author: jason
     * @date: 2019-12-12 02:30:10
     */
    public function blogroll()
    {
        $searchField = input('get.searchField', '', 'trim');
        $searchValue = input('get.searchValue', '', 'trim');
        $status = input('get.status', '', 'trim');
        $list = Systems::instance()->getBlogroll(['searchField' => $searchField, 'searchValue' => $searchValue, 'status' => $status]);
        $params = [];
        $params['searchField'] = !empty($searchField) ? $searchField : '';
        $params['searchValue'] = !empty($searchValue) ? $searchValue : '';
        $params['status'] = !empty($status) ? $status : '';
        $status = Config::get('site.lunbo');
        $this->assign('params', $params);
        $this->assign('status', $status);
        $this->assign('list', $list);
        $this->assign('title', '友情链接');
        return $this->fetch();
    }

    /**
     * @DESC：添加友情链接
     * @return mixed
     * @author: jason
     * @date: 2019-12-12 03:48:25
     */
    public function addblogroll()
    {
        if($this->request->isAjax() && $this->request->isPost()){
            $res = Systems::instance()->addblogroll($_POST);
            if($res == false){
                return json(['status' => 400,'msg' => '添加失败']);
            }
            return json(['status' => 200,'msg' => '添加成功']);
        }
        $status = Config::get('site.lunbo');
        $this->assign('status', $status);
        return $this->fetch();
    }

    /**
     * @DESC：编辑友情链接
     * @return mixed
     * @author: jason
     * @date: 2019-12-12 04:22:47
     */
    public function editblogroll()
    {
        if($this->request->isAjax() && $this->request->isPost()){
            $res = Systems::instance()->editblogroll($_POST);
            if($res == false){
                return json(['status' => 400,'msg' => '修改失败']);
            }
            return json(['status' => 200,'msg' => '修改成功']);
        }
        $id = input('get.id','','int');
        if(empty($id)) return false;
        $return_data = Systems::instance()->getOneBlogroll(['id' => $id]);
        $status = Config::get('site.lunbo');
        $this->assign('status', $status);
        $this->assign('data', $return_data);
        return $this->fetch();
    }

    /**
     * @DESC：友情链接排序
     * @return \think\response\Json
     * @author: jason
     * @date: 2019-12-05 02:25:19
     */
    public function changesort()
    {
        if($this->request->isAjax() && $this->request->isPost()){
            $return_data = Systems::instance()->changesort($_POST);
            if($return_data == false){
                return json(['status' => 400,'msg' => '排序失败']);
            }
            return json(['status' => 200,'msg' => '排序成功']);
        }
    }


    /**
     * @DESC：改变友情链接的状态
     * @return \think\response\Json
     * @author: jason
     * @date: 2019-12-12 03:46:57
     */
    public function changestatus()
    {
        if($this->request->isAjax() && $this->request->isPost()){
            $return_data = Systems::instance()->changestatus($_POST);
            if($return_data == false){
                return json(['status' => 400,'msg' => '请确认操作是否正确']);
            }
            return json(['status' => 200,'msg' => '操作成功']);
        }
    }

    /**
     * @DESC：上传图片
     * @author: jason
     * @date: 2019-10-21 04:29:36
     */
    public function uploadimg()
    {
        $return_data = Systems::instance()->uploadimg($_FILES['file']);
        return $return_data;
    }
}