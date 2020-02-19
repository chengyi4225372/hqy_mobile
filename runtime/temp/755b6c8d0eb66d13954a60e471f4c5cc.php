<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"/Users/zhanwen/Desktop/hqy_mobile/public/../application/home/view/index/index.html";i:1581413695;s:74:"/Users/zhanwen/Desktop/hqy_mobile/application/home/view/common/footer.html";i:1581410396;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit" />
    <meta name="force-rendering" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="force-rendering" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>节税平台代理_灵活用工加盟_企业服务代理_一体化政企服务招商代理平台-惠企云官网</title>
    <meta name="keywords" content="税务筹划代理,税收筹划代理,节税筹划代理,灵活用工加盟,企业服务代理,个人避税代理,企业资源变现,企业服务项目,财税代理,工商代理,工商代理公司,税负转嫁平台,惠企云" />
    <meta name="description" content="惠企云深耕政府服务外包和企业商务服务领域，深度研究财税管理在新经济时代的创新和运用，打造可持续发展的政企互联共同体！将【惠灵工】、【惠优税】、【惠多薪】、【惠创业】、【惠找事】、【惠企动】六大产品融汇，打造一站式互联网服务平台，量身定制一体化财税筹划解决方案，为公司可持续性发展提供有力保障！" />
    <link rel="stylesheet" href="/static/home/css/base.css">
    <link rel="stylesheet" href="/static/assets/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/static/home/css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+SC:100,300,400,500,700,900">
    <link rel="stylesheet" href="/static/home/font/syht.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="/static/assets/plugins/layui/layui.all.js"></script>
    <script src='/static/home/js/index.js'></script>
    <script src='/static/common/js/public.js'></script>
    <script src='/static/home/js/common.js'></script>

</head>

<body id="getdata" data="<?php echo $count; ?>">

    <div class='container' data-pageId="0">
        <!-- 头部 -->
        <div class='header'>
            <!-- 头部图标 -->
            <div class='header_total' id='headerTotal'>
                <div class='header_line'>
                    <div class='w header_icon'>
                        <div class='title_icon '>
                            <div>
                                减负增收，开源节流，助力企业全速发展
                            </div>
                            <div>
                                <div>
                                    <div class='wx'>
                                        <div class="topQRCode qrwx">
                                            <p>惠企云官方微信</p>
                                            <div class="codeBox">
                                                <img src="/static/home/images/wxCode.png" alt="">
                                            </div>
                                            <img src="/static/home/images/close2.png" alt="">
                                        </div>
                                    </div>
                                    <div class='bo'>
                                        <div class="topQRCode qrwb">
                                            <p>惠企云官方微博</p>
                                            <div class="codeBox">
                                                <img src="/static/home/images/wbCode.png" alt="">
                                            </div>
                                            <img src="/static/home/images/close2.png" alt="">
                                        </div>

                                    </div>
                                </div>
                                <div>
                                    <span class='email'></span>
                                    <span><?php echo $site_info['mail']; ?></span>
                                </div>
                                <div>
                                    <span class='phone'></span>
                                    <span><?php echo $site_info['tel']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- 头部其他内容 -->
            <div class='header_fixed'>
                <input type="hidden" id="data_token" value="<?php echo $userinfo['token']; ?>" />
                <div class='header_content' id='headerContent'>
                    <!--<editor-fold desc="Description">-->
                    <div class='w content'>
                        <div class='content_logo' id='logo'></div>
                        <ul class="">
                            <li class="nav-active"><a href="<?php echo url('/home/index/index'); ?>">首页</a></li>
                            <li><a href="<?php echo url('/home/optimal/index'); ?>">招募合伙人</a></li>
                            <li>
                                <a href="javascript:;">“惠”家族产品</a>
                                <!-- 二级菜单 -->
                                <div class="w secondary-menu" id="secondary-menu">

                                    <div>
                                        <dl>
                                            <dt><a class="secStatus" href="<?php echo config('curl.hys'); ?>"
                                                    target="_blank">惠优税</a>
                                            </dt>
                                            <dd>· 企业财税筹划定制</dd>
                                            <dd>· 一体化解决方案</dd>
                                        </dl>
                                        <dl>
                                            <dt><a class="secStatus" href="<?php echo config('curl.hlg'); ?>"
                                                    target="_blank">惠灵工</a>
                                            </dt>
                                            <dd>· 企业灵活用工平台</dd>
                                            <dd>· 财税优化综合服务</dd>
                                        </dl>
                                        <dl>
                                            <dt><a class="secStatus" href="<?php echo url('/home/many/index'); ?>">惠多薪</a></dt>
                                            <dd>· 优化薪酬结构</dd>
                                            <dd>· 为企业降本增效</dd>
                                        </dl>
                                        <dl>
                                            <dt><a class="secStatus" href="<?php echo url('/home/searches/index'); ?>">惠找事</a></dt>
                                            <dd>· 精选各地好工作</dd>
                                            <dd>· 高效缔结，轻松入职</dd>
                                        </dl>
                                        <dl>
                                            <dt><a class="secStatus" href="<?php echo url('/home/business/index'); ?>">惠创业</a></dt>
                                            <dd>· 创业公司</dd>
                                            <dd>· 一站式商务服务</dd>
                                        </dl>
                                        <dl>
                                            <dt><a class="secStatus" href="<?php echo url('/home/launch/index'); ?>">惠企动</a></dt>
                                            <dd>· 企业互联网生态管理</dd>
                                            <dd>· 全行业全渠道数字化转型</dd>

                                        </dl>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <a href="<?php echo url('/home/index/infoBiao'); ?>">招标信息</a>
                            </li>
                            <li>
                                <a href="<?php echo url('/home/index/infoList'); ?>">政府招商政策</a>
                            </li>
                            <li>
                                <a href="<?php echo url('/home/index/industry'); ?>">新闻资讯</a>
                            </li>
                        </ul>


                        <!-- <div class='register' id="<?php if(empty($userinfo['mobile'])): ?>register<?php else: ?>registers<?php endif; ?>">
                        <a href="javascript:void(0)" login_url="<?php echo $baseurl; ?>" loca_url="<?php echo config('curl.website'); ?>"
                            onclick="login_btn(this)">登录</a>
                        <a href="<?php echo url('/home/login/register'); ?>">注册</a>
                    </div>

                    <div class="u_info" id="<?php if(empty($userinfo['mobile'])): ?>u_info<?php else: ?>u_info2<?php endif; ?>">
                        <img src="/static/home/images/user_img.png">
                        <p id="mobile_phone">
                            <?php echo $userinfo['mobile']; ?></p>
                        <div class="u_info_content" id="u_info_content">
                            <a class="u_out" href="javascript:void(0)" data-token="<?php echo $userinfo['token']; ?>"
                                onclick="user_logout(this)" location_url="<?php echo url('/home/index/index'); ?>"
                                data-url="<?php echo url('/home/login/logout'); ?>">退出账号</a>
                        </div>
                    </div> -->


                    </div>
                    <!--</editor-fold>-->

                </div>
            </div>

        </div>

    </div>
    <!-- 文字部分-->


    <!-- 轮播图 -->
    <div class="layui-carousel" id="swiper">
        <div carousel-item>
            <?php if(is_array($slideshow) || $slideshow instanceof \think\Collection || $slideshow instanceof \think\Paginator): $i = 0; $__LIST__ = $slideshow;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_item): $mod = ($i % 2 );++$i;?>
            <div>
                <img src="<?php echo $slideshow[$key]['pic']; ?>" alt="">
                <button class="customize" onclick="showSearch()">立&nbsp;即&nbsp;咨&nbsp;询</button>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>


    <!-- 选择我们 -->
    <div class='chooseUs'>
        <div class="w choose">
            <div class='choose-title'>选择我们</div>
            <div class='choose-intro'>
                惠企云拥有优质多元产品、权威官方背书、金牌服务团队、一流财税团队、专业客服团队，打造一站式互联网服务平台，量身定制一体化财税筹划解决方案，为企业可持续性发展提供有力保障。
            </div>
            <ul class='img_total'>
                <li>
                    <img src="/static/home/images/more.png" alt="">
                    <a href="javascript:void(0)">创新模式</a>
                </li>
                <li>
                    <img src="/static/home/images/rainning.png" alt="">
                    <a href="javascript:void(0)">深度提效</a>
                </li>
                <li>
                    <img src="/static/home/images/pig.png" alt="">
                    <a href="javascript:void(0)">多元增收</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- 惠想产品 -->
    <div class='hui_product'>
        <div class='w'>
            <div class='product_logo'></div>
            <ul class='all_product'>
                <?php if(is_array($protuct) || $protuct instanceof \think\Collection || $protuct instanceof \think\Paginator): $i = 0; $__LIST__ = $protuct;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?>
                <li>
                    <img class="all_product-img-box" src="<?php echo (isset($v1['imgs']) && ($v1['imgs'] !== '')?$v1['imgs']:''); ?>" alt="">
                    <a href="javascript:void(0)"><?php echo (isset($v1['names']) && ($v1['names'] !== '')?$v1['names']:''); ?></a>
                    <a href="javascript:void(0)"><?php echo (isset($v1['desc']) && ($v1['desc'] !== '')?$v1['desc']:''); ?></a>
                    <ul class='one_pic'>
                        <li><a onclick="showSearch()">获取方案</a></li>
                        <li><a href="<?php echo (isset($v1['purl']) && ($v1['purl'] !== '')?$v1['purl']:'#'); ?>">前往网站</a></li>
                    </ul>
                    <div class="downBorder"></div>

                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>

    <div class="prop_box"></div>


    <!-- 招标信息政策 -->
    <div class='zhaoBox'>
        <div class='zhaoInfo'>
            <div class='diandianone'></div>
            <div class='diandiantwo'></div>
            <div class='w'>
                <div class='search_info'>
                    <div class='zhao_title'>
                    </div>

                    <!-- 搜索去掉---2019-12-23 运营已同意-->
<!--                    <div class='zhaoSearch'>
                        <div class='searchLogo'>
                            <i onclick="search(this)" data-url="<?php echo url('/home/index/infoList'); ?>"></i>
                            <input type="text" id="keyword" placeholder="搜索相关信息....">
                        </div>
                    </div>-->
                </div>


                <div class='zhaoTotalInfo'>
                    <div class='totalInfo_title'>招标信息</div>
                    <?php if(empty($biao) || (($biao instanceof \think\Collection || $biao instanceof \think\Paginator ) && $biao->isEmpty())): ?>
                    <p>抱歉，没有找到相关的信息</p>
                    <?php else: if(is_array($biao) || $biao instanceof \think\Collection || $biao instanceof \think\Paginator): $i = 0; $__LIST__ = $biao;if( count($__LIST__)==0 ) : echo "没有更多内容" ;else: foreach($__LIST__ as $key=>$biaos): $mod = ($i % 2 );++$i;?>
                    <div class='totalInfo_content'>


                        <a href="<?php echo config('curl.website'); ?>/home/index/detailbiao?mid=<?php echo $biaos['id']; ?>">
                            <div class='zhao_contentInfo'>
                                <div><?php echo (isset($biaos['title']) && ($biaos['title'] !== '')?$biaos['title']:''); ?></div>
                                <div>
                                    <?php echo $biaos['release_time']; ?>
                                </div>
                            </div>
                            <div>
                                <?php echo $biaos['describe']; ?>
                            </div>
                        </a>

                    </div>
                    <?php endforeach; endif; else: echo "没有更多内容" ;endif; endif; if(count($biao) > 0): ?>
                    <div class="know_more_box">
                        <button class='know_more' mobile-phone="<?php echo $userinfo['mobile']; ?>" onclick="showUrl(this)"
                            data-url="<?php echo url('/home/index/infoBiao'); ?>"
                            loca_url="<?php echo config('curl.website'); ?>/home/index/infoBiao" login_url="<?php echo $baseurl; ?>">了解更多
                        </button>
                    </div>
                    <?php endif; ?>


                </div>

                <div class='zhaomethods'>
                    <div class='totalInfo_title'>政府招商政策</div>
                    <?php if(empty($shang) || (($shang instanceof \think\Collection || $shang instanceof \think\Paginator ) && $shang->isEmpty())): ?>
                    <p>抱歉，没有找到相关的信息</p>
                    <?php else: if(is_array($shang) || $shang instanceof \think\Collection || $shang instanceof \think\Paginator): $i = 0; $__LIST__ = $shang;if( count($__LIST__)==0 ) : echo "没有更多内容" ;else: foreach($__LIST__ as $key=>$item_list): $mod = ($i % 2 );++$i;?>
                    <div class='totalInfo_content'>
                        <a
                            href="<?php echo config('curl.website'); ?>/home/index/detailshang?mid=<?php echo isset($item_list['id']) ? $item_list['id'] : ''; ?>">
                            <div class='zhao_contentInfo'>
                                <div><?php echo isset($item_list['title']) ? $item_list['title'] : ''; ?></div>
                                <div>
                                    <?php echo isset($item_list['release_time']) ? $item_list['release_time'] : ''; ?>
                                </div>
                            </div>
                            <div><?php echo isset($item_list['describe']) ? $item_list['describe'] : ''; ?></div>
                        </a>

                    </div>

                    <?php endforeach; endif; else: echo "没有更多内容" ;endif; endif; if(count($shang) > 0): ?>

                    <div class='know_more_box'>
                        <button class='know_more' mobile-phone="<?php echo $userinfo['mobile']; ?>" onclick="showUrl(this)"
                            data-url="<?php echo url('/home/index/infoList'); ?>"
                            loca_url="<?php echo config('curl.website'); ?>/home/index/infoList" login_url="<?php echo $baseurl; ?>">了解更多
                        </button>
                    </div>
                    <?php endif; ?>

                </div>


            </div>
        </div>
    </div>

    <!-- 近期成功案例 -->
    <input type="hidden" id="add_url" value="<?php echo url('/home/index/ajaximage'); ?>">
    <ul class='success'>
        <div class='w success_content'>

            <div class='success_title'></div>
            <!-- 惠家族产品介绍 -->
            <div class="bgProduct">
                <ul class="produtionIntro">
                    <?php if(is_array($case_list) || $case_list instanceof \think\Collection || $case_list instanceof \think\Paginator): $i = 0; $__LIST__ = $case_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data_list): $mod = ($i % 2 );++$i;?>
                    <li keys="<?php echo $key; ?>" {if $key==1}class="chosenProduct" { /if}
                        style="background:url('<?php echo $data_list['pic']; ?>')">
                        <span><?php echo $data_list['title2']; ?></span>
                        <p><?php echo $data_list['title3']; ?></p>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>


                </ul>
                <div class='to_detailInfo'>
                    <?php if(is_array($case_list) || $case_list instanceof \think\Collection || $case_list instanceof \think\Paginator): $k = 0; $__LIST__ = $case_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info_list): $mod = ($k % 2 );++$k;?>
                    <div class="<?php echo $info_list['is_show']; ?>" <?php if($key==1): ?>style="display:block;"
                        <?php else: ?>style="display:none;"<?php endif; ?>> <div class='huichuangyou_title'><?php echo $info_list['title']; ?></div>
                    <div class="con">
                        <div class="desc"><?php echo $info_list['desc']; ?></div>
                        <div class="desc"><?php echo $info_list['desc2']; ?></div>
                        <div class="desc"><?php echo $info_list['desc3']; ?></div>
                        <div class="desc"><?php echo $info_list['desc4']; ?></div>
                        <div class="desc"><?php echo $info_list['desc5']; ?></div>
                        <div class="desc"><?php echo $info_list['desc6']; ?></div>
                        <div class="desc"><?php echo $info_list['desc7']; ?></div>
                        <div class='total_input'>
                            <div>
                                <input type="text" id='hcontactName<?php echo $k; ?>' placeholder="请输入您的姓名.." />
                            </div>
                            <div>
                                <input type="text" id="hcompanyName<?php echo $k; ?>" placeholder="请输入您的公司名称.." />
                            </div>
                            <div>
                                <input type="text" id='hcontactMobile<?php echo $k; ?>' placeholder="请输入您的手机号.." />
                            </div>
                            <div>
                                <input type='hidden' id='hsource' value='门户首页' />
                                <input type='hidden' id='hidentification' value='企业一站式服务' />
                                <input type="button" class="form-btn" onclick="hgetErp('<?php echo $k; ?>')" value='定制您的方案' />
                            </div>
                            <!-- 提交成果后弹窗 -->
                            <div class="mask-box2">
                                <span></span>
                                <p class="mask-box-title">提交成功</p>
                                <p class="mask-box-content">我们会在一个工作日内联系您</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
        </div>
        </div>
    </ul>
    <!-- 合作伙伴 -->
    <div class='partener'>
        <div class='w partener_total'>
            <div class='parter_icon'></div>
        </div>
    </div>


    <div class='goTop' id="goTop">
        <i></i>
        <div>返回顶部</div>
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
                        <dd><a href="<?php echo url('/home/index/industry'); ?>">新闻资讯</a></dd>
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
                        <dd><a href="javascript:;"></a>专家服务电话：181-8619-4461</a></dd>
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

<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?866318027a350c7c8dddf0359b3a65d3";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

</body>
<script>
$(function(){
    $('.wx').mouseenter(function(){
        $('.qrwx').css({'display':'block'})
        $('.qrwb').css({'display':'none'})
    })
    $('.qrwx > img').click(function(){
        $('.qrwx').css({'display':'none'})
    })

    $('.bo').mouseenter(function(){
        $('.qrwb').css({'display':'block'})
        $('.qrwx').css({'display':'none'})
    })
    $('.qrwb > img').click(function(){
        $('.qrwb').css({'display':'none'})
    })


})
    

</script>

</html>