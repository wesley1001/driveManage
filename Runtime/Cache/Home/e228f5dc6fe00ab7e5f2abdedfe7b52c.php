<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon-precomposed" href="/img/screen_icon.png">
    <title>百度地图</title>
    <link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/css/jquery.mobile-1.4.4.css" />
    <link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/css/car.css">
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/js/iscroll.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;}
        #golist {display: none;}
        @media (max-device-width: 780px){#golist{display: block !important;}}
    </style>

    <script type="text/javascript" src="http://api.map.baidu.com/api?type=quick&ak=TF9uZIGSSLdT4yNQQXjvi5N5&v=1.0"></script>

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
<body>
<div id="pageTop" data-role="page" data-theme="none">
    <div data-role="header" data-theme="none"  class="x_header"  data-position="fixed"  data-tap-toggle="false" data-id="myheader">
        <a href="#"  data-role="none" data-rel="back" data-ajax="false" class="x_btn_back"></a>
        <h1>地图导航</h1>

    </div>
</div><!--//header -->
<body>
<a id="golist" href="../demolist.htm">返回demo列表页</a>
<div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(<?php echo ($hor); ?>,<?php echo ($ver); ?>);
    map.centerAndZoom(point, 15);
    map.addControl(new BMap.ZoomControl());
    var opts = {
        width : 0,    // 信息窗口宽度
        height: 0,     // 信息窗口高度
        offset : new BMap.Size(5,-10)
    }
    var infoWindow = new BMap.InfoWindow("点击标签进行导航", opts);  // 创建信息窗口对象
    map.openInfoWindow(infoWindow,point); //开启信息窗口

    var marker1 = new BMap.Marker(point);  // 创建标注
    map.addOverlay(marker1);              // 将标注添加到地图中
    marker1.addEventListener("click", function(){
        navigator.geolocation.getCurrentPosition(showPosition);
    });

    function showPosition(position)
    {
        var start = {
            latlng:new BMap.Point(position.coords.longitude,position.coords.latitude)
        }
        var end = {
            latlng:new BMap.Point(<?php echo ($hor); ?>,<?php echo ($ver); ?>)
        }
        var opts = {
            mode:BMAP_MODE_DRIVING,
            region:"厦门"
        }
        var ss = new BMap.RouteSearch();
        ss.routeCall(start,end,opts);
    }
</script>