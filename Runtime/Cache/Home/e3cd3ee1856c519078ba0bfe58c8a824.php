<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="<?php echo ADDON_PUBLIC_PATH;?>/img/screen_icon.png">
<title>首页</title>
<link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/css/jquery.mobile-1.4.4.css" />
<link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/css/car.css">
<script src="<?php echo ADDON_PUBLIC_PATH;?>/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo ADDON_PUBLIC_PATH;?>/js/iscroll.js"></script>
<script src="<?php echo ADDON_PUBLIC_PATH;?>/js/owl.carousel.js"></script>
<script>
//幻灯片自动播发激活
function owlplay(){
   $('.owl-carousel').trigger('play.owl',2000); 
}
/*滚动条*/    
var myScroll;
function loaded() {
    /*幻灯片*/ 
    $('.owl-carousel').owlCarousel({
            items:1,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1,
                    margin: 0
                },
                480:{
                    items:2,
                },
                960:{
                    items:3
                }
            }
    });
    setTimeout(owlplay, 2000);
	
    /*iscroll*/ 
	myScroll = new IScroll('#wrapper', {
        tap:true,
		click:false,
		preventDefaultException:{tagName:/.*/},//解除默认事件锁定，调用tab，click等事件,不支持swipeleft
		scrollbars: true,
		mouseWheel: true,
		fadeScrollbars: true
	}); 
}

function preventDefault(e) { e.preventDefault(); };
document.addEventListener('touchmove', preventDefault, false);
</script>
<script src="<?php echo ADDON_PUBLIC_PATH;?>/js/jquery.mobile-1.4.4.min.js"></script>

    <script type="text/javascript" name="baidu-tc-cerfication" data-appid="6044540" src="http://apps.bdimg.com/cloudaapi/lightapp.js"></script>

</head>
<body onload="loaded()">
<div id="pageIndex" data-role="page" data-theme="none">
<link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/css/owl.theme.css">
    <div id="wrapper">
        <div id="scroller">
                <!--幻灯片 -->
                <div class="x_slideBk">
                    <div class="owl-carousel">
                        <?php if(is_array($imgs)): $i = 0; $__LIST__ = $imgs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="article" style="background:url(<?php echo ($vo["path"]); ?>) no-repeat; background-size: 100% 100%;"><h2></h2><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/x_space.png" width="360" height="150"></div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>   
                <!--//幻灯片 -->
                <div class="c_item">
                    <div class="ui-block-a">
                        <div class="ui-body">
                            <span>走进<?php echo ($name); ?></span>
                            <a href="<?php echo U('company');?>" data-role="none" data-transition="slide"  data-ajax="false"><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/item_comp.png"></a>
                        </div>
                    </div>
                    <div class="ui-block-b">
                        <div class="ui-body">
                            <span>驾校导航</span>
                            <a href="<?php echo U('navigation');?>" data-role="none" data-transition="slide" data-ajax="false"><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/item_guide.png"></a>
                        </div>
                    </div>
                    <div class="ui-block-c">
                        <div class="ui-body">
                                <span>在线报名</span>
                                <a href="<?php echo U('register','section=2');?>"  data-role="none"  data-transition="slide" data-ajax="false"><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/item_card.png"></a>
                        </div>
                    </div>
                    <div class="ui-block-d">
                        <div class="ui-body">
                                <span>驾校风采</span>
                                <a href="#" data-transition="slide"  data-ajax="false"><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/item_pic.png"></a>
                        </div>
                    </div>
                    <div class="ui-block-c">
                        <div class="ui-body">
                                <span>学员圈</span>
                                <a href="#" data-transition="slide"  data-ajax="false"><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/item_group.png"></a>
                        </div>
                    </div>
                    <div class="ui-block-f">
                        <div class="ui-body">
                                <span>最新优惠</span>
                                <a href="<?php echo addons_url('School://Privilege/mainPri');?>" data-transition="slide" data-ajax="false"><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/item_gift.png"></a>
                        </div>
                    </div>
                    <div class="ui-block-f">
                        <div class="ui-body">
                                <span>报名指南</span>
                                <a href="<?php echo U('register','section=0');?>" data-role="none" data-transition="slide"  data-ajax="false"><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/item_regGuide.png"></a>
                        </div>
                    </div>
                    <div class="ui-block-f">
                        <div class="ui-body">
                                <span>模拟考试</span>
                                <a href="<?php echo addons_url('Exam://Exam/show');?>" data-transition="slide" data-ajax="false"><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/item_try.png"></a>
                        </div>
                    </div>
                    <div class="ui-block-f">
                        <div class="ui-body">
                                <span>在线问答</span>
                                <a href="<?php echo U('ask');?>" data-transition="slide"  data-ajax="false"><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/item_chat.png"></a>
                        </div>
                    </div>
                    
                </div>
                <!--模块 end -->
        </div>
    </div><!--//wrapper -->
    <div data-role="footer" data-theme="none"  class="x_footer"  data-position="fixed"  data-tap-toggle="false" data-id="myfooter">
        <div class="x_navbar">
            <ul class="ui-grid-d">
                <li class="ui-block-a active"><a href="<?php echo U('show');?>" class="x_icon_home" >首页</a></li>
                <li class="ui-block-b"><a href="<?php echo U('navigation');?>" class="x_icon_guide"  data-ajax="false">校区导航</a></li>
                <li class="ui-block-c"><a href="<?php echo U('getTeacher');?>" class="x_icon_teacher"  data-ajax="false">找教练</a></li>
                <li class="ui-block-d"><a href="tel:<?php echo ($phone); ?>" class="x_icon_qq"  data-ajax="false">联系校长</a></li>
                <li class="ui-block-e"><a href="#"  class="x_icon_my"  data-ajax="false">我</a></li>
            </ul>
        </div>
    </div><!--//footer -->
    <script>
    $(function(){
       
	})
    </script>
</div> <!--//Page-->
</body>
</html>