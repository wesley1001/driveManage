<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon-precomposed" href="img/screen_icon.png">
    <title>car</title>
    <link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/css/jquery.mobile-1.4.4.css"/>
    <link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/css/car.css">
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/js/iscroll.js"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/js/jquery.mobile-1.4.4.min.js"></script>
    <script>
        var myScroll_ask;
        function loaded() {
            /*iscroll*/
            myScroll_ask = new IScroll('#c_content', {
                tap: true,
                click: false,
                preventDefaultException: {tagName: /.*/},//解除默认事件锁定，调用tab，click等事件,不支持swipeleft
                scrollbars: true,
                mouseWheel: true,
                fadeScrollbars: true
            });
        }
    </script>
</head>
<body onload="loaded()">

<div id="pageComp" data-role="page" data-theme="none">
    <div data-role="header" data-theme="none" class="x_header" data-position="fixed" data-tap-toggle="false">
        <a href="#" data-role="none" data-rel="back" class="x_btn_back" data-transition="slide"></a>
        <h1>走进<?php echo ($name); ?></h1>
    </div>
    <!--//header -->
    <div id="c_content" class="c_wrapper">
        <div id="scroller">
                <div class="c_article">
                    <?php echo ($info); ?>
                </div>

        </div>
    </div>
    <!-- /wrapper -->
    <script>
        $(function () {
            var myScroll_car;
            $("#pageComp").on("pageshow", function () {
                if (myScroll_car == null) {
                    setTimeout(function () {
                        myScroll_car = new IScroll('#c_content', {
                            tap: true,
                            click: false,
                            preventDefaultException: {tagName: /.*/},//解除默认事件锁定，调用tab，click等事件,不支持swipeleft
                            scrollbars: true,
                            mouseWheel: true,
                            fadeScrollbars: true
                        });
                    }, 0)
                } else {

                }
            });
        });
    </script>
</div>
<!--//Page-->
</body>
</html>