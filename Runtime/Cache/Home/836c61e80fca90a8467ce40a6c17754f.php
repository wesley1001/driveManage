<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="img/screen_icon.png">
<title>car</title>
<link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/css/jquery.mobile-1.4.4.css" />
<link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/css/car.css">
<script src="<?php echo ADDON_PUBLIC_PATH;?>/js/jquery-1.11.1.min.js"></script>
<script>
$(function(){
	$("#masterNav li").click(function(){
		var mPage = $(this).attr("url");
		
		//ajax控制显示隐藏loading
		$(".c_loadBk").ajaxStart(function(){
			$(this).show();
		}); 
		$(".c_loadBk").ajaxStop(function(){
			$(this).hide();
		}); 
		
		//加载对应的页面
		$.ajax({  
			type:"get",  
			url:mPage,  
			dataType:"html",  
			success:function(data){  
				$('#masterCon').html(data);
		 } 
       });	
	   $(this).addClass("active").siblings().removeClass("active")
	})
		
	$('#masterNav li').eq(0).trigger("click");	
	
	/*点击弹出中的课程*/
	$("#allType li").click(function(){
        $("#allType li").find("img").attr("src","<?php echo ADDON_PUBLIC_PATH;?>/img/radio.png");
        $(this).find("img").attr("src","<?php echo ADDON_PUBLIC_PATH;?>/img/radioed.png");
        $("#courseShow").text($(this).text());
        $("#courseSel").popup("close");
	})
	
})
</script>
<script src="<?php echo ADDON_PUBLIC_PATH;?>/js/jquery.mobile-1.4.4.min.js"></script>
</head>
<body class="x_flowAuto">
<div id="pageMaster" data-role="page" data-theme="none">
<!--开设课程 popup 必须放在主页-->
<div data-role="popup" id="courseSel" data-position-to="window" data-tolerance="10,10,10,10" data-shadow="false" data-overlay-theme="b" data-corners="false">
    <div class="c_popupList">
        <ul id="allType">

            <?php if(is_array($course_data)): $i = 0; $__LIST__ = $course_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/radio.png"><?php echo ($vo["name"]); ?> <span><?php echo ($vo["sign_charge"]); ?>元</span></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <!--<li>C2培训课 <span>6000元</span></li>-->
            <!--<li>B2培训课 <span>8000元</span></li>-->
        </ul>
    </div>
</div>
<!--//开设课程-->
    <div data-role="header" data-theme="none"  class="x_header"  data-position="fixed"  data-tap-toggle="false">
        <a href="#"  data-role="none" data-rel="back" class="x_btn_back" data-transition="slide"></a>
        <h1>教练主页</h1>
    </div><!--//header -->
    <div class="x_content">
        <!--头部信息-->
        <div class="masterBg"><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/master_bg.png"></div>
        <div class="masterInfo">
            <input type="hidden" id = "teacher_id" value="<?php echo ($teacher_data["id"]); ?>">
        	<div class="Photo"><img src="<?php echo get_cover_url($teacher_data['photo']);?>"></div>
        	<div class="name"><?php echo ($teacher_data["name"]); ?> <span><?php echo ($teacher_data["level_name"]); ?></span></div>
            <div class="school"><?php echo ($school_data["name"]); ?>驾校</div>
            <div class="cardList">
            	<ul>
                	<li><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/card_id.png">身份认证</li>
                	<li><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/card_teacher.png">教练认证</li>
                	<li><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/card_pl.png">陪练证</li>
                </ul>
            </div>
        </div>
        <!--//头部信息-->
        <!--导航-->
        <div class="masterNav">
        	<ul class="ui-grid-c" id="masterNav">
                <li class="ui-block-a active" url="<?php echo U('getTeacherMainInfo','teacher_id='.$teacher_data['id']);?>"><span class="icon_masterHome"></span>教练主页</li>
                <li class="ui-block-b" url="<?php echo U('getTeacherSchool');?>"><span class="icon_masterSchool"></span>驾校介绍</li>
                <li class="ui-block-c" url="<?php echo U('getTeacherReg','teacher_id='.$teacher_info_id);?>"><span class="icon_masterReg"></span>在线报名</li>
                <li class="ui-block-d" url="<?php echo U('getTeacherReserve');?>"><span class="icon_masterReserve"></span>预约练车</li>
            </ul>
        </div>
        <!--//导航-->
        <div class="c_loadBk" style="display:none">
        	<div class="c_loading">
                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>`
                <span>正在加载...</span>
            </div>
        </div>
        <!--内容 ajax加载-->
        <div id="masterCon" class="masterCon">
        	
        </div>
        <!--内容 ajax加载-->
	</div><!-- /wrapper -->
    <div data-role="footer" data-position="fixed" class="masterFooter" data-tap-toggle="false">
        <div class="mFooterBk">
         	<a href="<?php echo ($code_url); ?>" class="c_footerBtn fcode" data-role="none" data-ajax="false"></a>
        	<a  href="tel:<?php echo ($school_data["phone"]); ?>" class="c_footerBtnMid" data-role="none"><img src="<?php echo ADDON_PUBLIC_PATH;?>/img/phone.png">立即预约</a>
        	<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo ($school_data["qq"]); ?>&amp;site=qq&amp;menu=yes" class="c_footerBtn fqq" data-role="none"></a>
        </div>
    </div>
</div> <!--//Page-->
</body>
</html>