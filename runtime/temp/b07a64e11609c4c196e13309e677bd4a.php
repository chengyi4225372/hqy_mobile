<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:111:"C:\Users\Administrator\Desktop\phpEnv5.6.0-Green\www\hqy_\public/../application/home\view\index\detailbiao.html";i:1576656992;s:97:"C:\Users\Administrator\Desktop\phpEnv5.6.0-Green\www\hqy_\application\home\view\common\login.html";i:1575017610;s:98:"C:\Users\Administrator\Desktop\phpEnv5.6.0-Green\www\hqy_\application\home\view\common\footer.html";i:1576746676;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit" />
    <meta name="force-rendering" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <!-- <script>/*@cc_on window.location.href="https://support.dmeng.net/upgrade-your-browser.html?referrer="+encodeURIComponent(window.location.href); @*/</script> -->
    <script>/*@cc_on document.write('\x3Cscript id="_iealwn_js" src="https://support.dmeng.net/ie-alert-warning/latest.js">\x3C/script>'); @*/</script>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keyword" content="<?php echo $info['keyword']; ?>">
    <meta name="description" content="<?php echo $info['describe']; ?>">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/static/spirit/css/base.css">
    <link rel="stylesheet" href="/static/spirit/css/detail.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+SC:100,300,400,500,700,900">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src='/static/home/js/common.js'></script>
    <script src='/static/common/js/public.js'></script>
    <script src="/static/spirit/js/detail.js"></script>
    <script src="/static/assets/plugins/layui/layui.all.js"></script>
    <style>
        /* 归属信息 */
        .affiliation {
            text-align: right;
            font-size: 10px;
            color: #ccc;
            padding-right: 20px;
            margin-top: 200px;
        }

        .page {
            margin-top: 60px;
        }
    </style>
</head>

<body>
    <div class='container'>
        <div class='header'>
            <div class=header_content id='headerContent'>
                <div class='logo'>
                    <a href="<?php echo url('/home/index/index'); ?>"></a>
                </div>
                <ul class='titile'>
                    <li><a href="<?php echo url('/home/index/index'); ?>">首页</a></li>
                    <li><a href="javascript:;">招募合伙人</a>
                    </li>
                    <li>
                        <a href="javascript:;">“惠”家族产品</a>
                        <!-- 二级菜单 -->
                        <div class="w secondary-menu" id="secondary-menu">

                            <div>
                              <dl>
                                <dt><a class="secStatus" href="<?php echo config('curl.hys'); ?>">惠优税</a></dt>
                                <dd>
                                  · 企税降成本 薪税降税负

                                </dd>
                                <dd>· 分红降扣率 创业降个税</dd>
                              </dl>
                              <dl>
                                <dt><a class="secStatus" href="<?php echo config('curl.hlg'); ?>">惠灵工</a></dt>
                                <dd>
                                  · 寻求多样化用工模式

                                </dd>
                                <dd>· 提高内部人员效能</dd>
                              </dl>
                              <dl>
                                <dt><a class="secStatus" href="<?php echo url('/home/many/index'); ?>">惠多薪</a></dt>
                                <dd>
                                  · 优化员工福利选择模块

                                </dd>
                                <dd>· 企业成本可控透明化</dd>
                              </dl>
                              <dl>
                                <dt><a class="secStatus" href="<?php echo url('/home/searches/index'); ?>">惠找事</a></dt>
                                <dd>
                                  · 技能价值化

                                </dd>
                                <dd>· 成就更好自我</dd>
                              </dl>
                              <dl>
                                <dt><a class="secStatus" href="<?php echo url('/home/business/index'); ?>">惠创业</a></dt>
                                <dd>
                                  · 一站式解决方案

                                </dd>
                                <dd>· 激活企业最大效益</dd>
                              </dl>
                              <dl>
                                <dt><a class="secStatus" href="<?php echo url('/home/launch/index'); ?>">惠企动</a></dt>
                                <dd>· 赋能企业互联网生态建设</dd>
                                <dd>· 助力产业数字化转型升级</dd>
                              </dl>
                            </div>

                          </div><!-- 二级菜单 -->
                    </li>
                    <li  class='nav-active'><a href="<?php echo url('/home/index/infoBiao'); ?>">招标信息</a></li>
                    <li><a href="<?php echo url('/home/index/infoList'); ?>">政府招商政策</a></li>
                    <li><a href="<?php echo url('/home/index/industry'); ?>">行业资讯</a></li>
                    <!-- <li><a href="<?php echo url('/home/launch/index'); ?>">惠启动</a></li> -->
                </ul>
                <!--<?php if(empty($userinfo['mobile'])): ?>-->
                <!--<div class='register'>-->
                <!--<a href="javascript:void(0)"-->
                <!--login_url="<?php echo $baseurl; ?>"-->
                <!--loca_url="<?php echo config('curl.website'); ?>" onclick="login_btn(this)">登录</a>-->
                <!--<a href="<?php echo url('/home/login/register'); ?>">注册</a>-->
                <!--</div>-->
                <!--<?php else: ?>-->
                <!--<?php if(empty($userinfo['mobile'])): ?>
<div class="loging clearfix">
    <div class="register-btn"><a href="<?php echo $baseurl; ?>" target="_blank">
        登陆
    </a></div>
    <div class="loging-btn"><a href="<?php echo url('/home/login/register'); ?>">注册</a></div>
</div>
<?php else: ?>
<div class="u_info">
    <img src="/static/home/images/user_img.png" style="width:30px;height:30px; vertical-align: middle;">
    <p style="display:inline-block;color:#fff;"  id="mobile_phone"><?php echo $userinfo['mobile']; ?></p>

    <div class="u_info_content" id="u_info_content">
        <a class="u_out" href="javascript:void(0)" data-token="<?php echo $userinfo['token']; ?>" onclick="user_logout(this)" location_url="<?php echo url('/home/index/index'); ?>" data-url="<?php echo url('/home/login/logout'); ?>">退出账号</a>
    </div>
</div>
<?php endif; ?>-->
                <!--<?php endif; ?>-->
            </div>
        </div>
        <div class="bgBread">
        <div class='w bread_title'>
            <a class="actives" href="<?php echo url('/home/index/index'); ?>">首页 ></a>
            <a class="actives" onclick="go_news(this)" data-url="<?php echo url('/home/index/infoBiao'); ?>">招标信息</a> >
            <a class="activees" href="javasrcipt:void(0)">详情</a>
        </div>
    </div>
        <div class='main_content'>
            <div class='content_middle'>
                <div class='pic_total'>
                    <div class='pic_title'><?php echo $info['title']; ?></div>
                    <div class='time'><?php echo $info['release_time']; ?></div>
                    <div class='line'></div>
                    <div class='tuwen'>
                        <div class='wenzi'><?php echo $info['content']; ?></div>

                        <!-- <div class="affiliation">
                            <p>本信息来源：中国招标网</p>
                        </div> -->

                      
                    </div>
                    <div class='page'>
                            <?php if(empty($top) || (($top instanceof \think\Collection || $top instanceof \think\Paginator ) && $top->isEmpty())): ?>
                            <div><span>上一篇:</span><a href="javascript:;">已经是第一篇了</a></div>
                            <?php else: ?>
                            <div><span>上一篇:</span><a
                                    href="<?php echo url('/home/index/detailbiao',array('mid'=>$top['id'])); ?>"><?php echo $top['title']; ?></a></div>
                            <?php endif; if(empty($next) || (($next instanceof \think\Collection || $next instanceof \think\Paginator ) && $next->isEmpty())): ?>
                            <div><span>下一篇:</span><a href="javascript:;">已经是最后一篇了</a></div>
                            <?php else: ?>
                            <div><span>下一篇:</span><a
                                    href="<?php echo url('/home/index/detailbiao',array('mid'=>$next['id'])); ?>"><?php echo $next['title']; ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                </div>
            </div>
        </div>
        <!-- 底部 -->
        <div class="bgBottom">
    <div class="bottomBox">
        <div class="w bottom">
            <div class="aboutUs">
                <span>关于我们</span>
                <p>
                    惠企云网络信息（湖北）有限公司深度研究财税管理及企业管理在新经济时代的创新和运用，将【惠灵工】、【惠优税】、【惠多薪】、【惠创业】、【惠找事】五大产品融汇，打造一站式互联网服务平台，量身定制一体化财税筹划解决方案及企业管理咨询，为企业可持续发展提供有力保障！
                </p>
            </div>
            <div class="w navBottom">
                <div class="navList">
                    <dl>
                        <dt>惠企云旗下产品</dt>
                        <dd><a href="<?php echo config('curl.hlg'); ?>">惠灵工</a></dd>
                        <dd><a href="<?php echo config('curl.hys'); ?>">惠优税</a></dd>
                        <dd><a href="javascript:;">惠多薪</a></dd>
                        <dd><a href="javascript:;">惠创业</a></dd>
                        <dd><a href="javascript:;">惠找事</a></dd>
                    </dl>
                    <dl>
                        <dt>资讯信息</dt>
                        <dd><a href="<?php echo url('/home/index/industry'); ?>">行业资讯</a></dd>

                        <dd><a href="<?php echo url('/home/index/infoList'); ?>">政府招商政策</a></dd>

                        <dd><a href="<?php echo url('/home/index/infoBiao'); ?>">招标信息</a></dd>
                    </dl>
                    <dl>
                        <dt>招商合作</dt>

                        <dd><a href="javascript:;">招募合伙人</a></dd>
                    </dl>
                    <dl>
                        <dt>联系我们</dt>
                        <dd><a href="javascript:;"></a>全国统一客服热线：400-150-9896</a></dd>
                        <dd><a href="javascript:;"></a>专家服务电话：1818-619-4461</a></dd>
                        <dd><a href="javascript:;"></a>武汉市硚口区南国大武汉H座</a></dd>
                        <dd><a href="javascript:;"></a>深圳市福田区第一世界广场A座</a></dd>
                        <dd><a href="javascript:;"></a>北京市西城区贵都国际中心B座</a></dd>
                    </dl>
                </div>

                <ul class="qrCode">
                    <li>
                        <div class="pic">
                            <img src="/static/spirit/images/weixincode.png" alt="">
                        </div>
                        <span><img src="/static/spirit/images/weixinicon.png" alt="">微信扫码关注</span>
                        <i>及时获知一手财税消息</i>
                    </li>
                    <li>
                        <div class="pic">
                            <img src="/static/spirit/images/weibocode.png" alt="">
                        </div>
                        <span><img src="/static/spirit/images/weiboicon.png" alt="">惠企云微博</span>
                        <!-- <i>及时获一手财税信息</i> -->
                    </li>
                </ul>
            </div>
        </div>
        <div class="w copyRight">©&nbsp;Copyright&nbsp;2019&nbsp;惠企动（湖北）科技有限公司&nbsp;.&nbsp;All Rights
            Reserved&nbsp;ICP证 : 鄂ICP备16008680号-3
        </div>

    </div>
</div>

        <!-- 返回顶部 -->
        <div class='goTop' id="goTop">
            <i></i>
            <div>返回顶部</div>
        </div>

    </div>
    <script>
        var menuList = document.querySelectorAll('#headerContent ul li')
        var menuUl = document.querySelector('#headerContent ul')

        for (var i = 0; i < menuList.length; i++) {
            menuList[i].onmouseenter = function () {
                var li = document.querySelectorAll('.nav-active')[0]
                li.classList.remove('nav-active')
                this.classList.add('nav-active')
            }
        }

        menuUl.onmouseleave = function () {
            var li = document.querySelectorAll('.nav-active')[0]
            li.classList.remove('nav-active')
            menuList[3].classList.add('nav-active')
        }
    </script>
</body>

</html>