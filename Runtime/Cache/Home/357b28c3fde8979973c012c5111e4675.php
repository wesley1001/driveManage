<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="<?php echo ADDON_PUBLIC_PATH;?>/img/screen_icon.png">
<title>car</title>
<link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/css/jquery.mobile-1.4.4.css" />
<link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/css/car.css">
<script src="<?php echo ADDON_PUBLIC_PATH;?>/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo ADDON_PUBLIC_PATH;?>/js/iscroll.js"></script>
<script>
/*滚动条*/    
var myScroll;
function loaded () {
    /*iscroll*/ 
	myScroll = new IScroll('#c_top', {
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
</head>
<body onload="loaded()">
<div id="pageTop" data-role="page" data-theme="none">
    <div data-role="header" data-theme="none"  class="x_header"  data-position="fixed"  data-tap-toggle="false" data-id="myheader">
        <a href="#"  data-role="none" data-rel="back" data-ajax="false" class="x_btn_back"></a>
        <h1>我的招生</h1>
    </div><!--//header -->
    <div class="x_tabs tab50">
        <ul>
            <li class="active"><a href="#">招生排行榜</a></li>
            <li><a href="#">介绍新学员</a></li>
        </ul>
        <div class="x_tabs_slide tabSlide50"><span id="slide"></span></div>
    </div> <!--//tabs -->
    <div id="c_top" class="x_tabs_area">
        <div id="scroller">
        	<!--排行榜-->
            <div class="x_table">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	<thead>
                      <tr>
                        <th width="15%">排名</th>
                        <th width="30%">教练</th>
                        <th width="">招生人数</th>
                        <th width="20%">成交率</th>
                      </tr>
                    </thead> 
                    <tbody>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo["rank"]); ?></td>
                        <td><?php echo ($vo["name"]); ?></td>
                        <td><?php echo ($vo["suc_count"]); ?>人</td>
                        <td><?php echo ($vo["suc_rate"]); ?></td>
                      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                   </tbody>    
                </table>
            </div>
            <!--排行榜 end-->
        </div>
    </div><!--//wrapper -->
</div> <!--//Page-->
</body>
</html>