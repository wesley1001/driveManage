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
    <script>
        /*滚动条*/
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

            /*报名表单*/
            $("#contact,#question").focus(function () {
                $(this).addClass("focus");
                if ($(this).val() == this.defaultValue) {
                    $(this).val("");
                }
            }).blur(function () {
                if ($(this).val() == '') {
                    $(this).removeClass("focus");
                    $(this).val(this.defaultValue);
                } else {
                    $(this).addClass("focus");
                }
            });
        }

        function preventDefault(e) {
            e.preventDefault();
        }
        ;
        document.addEventListener('touchmove', preventDefault, false);
    </script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/js/jquery.mobile-1.4.4.min.js"></script>
</head>
<body onload="loaded()">
<div id="pageAsk" data-role="page" data-theme="none">
    <div data-role="header" data-theme="none" class="x_header" data-position="fixed" data-tap-toggle="false">
        <a href="#" data-role="none" data-rel="back" class="x_btn_back" data-transition="slide"></a>

        <h1>在线问答</h1>
    </div>
    <!--//header -->
    <div id="c_content" class="c_wrapper">
        <div id="scroller">
            <div class="c_subHead">
                <!--在线问答-->
                <div class="c_formMain">
                    <div class="c_formTit">您有任何的问题都可以向我们咨询</div>
                    <div>
                        <textarea data-role="none" name="textarea" id="question" class="c_texta">请输入您想要了解的</textarea>

                        <div class="x_blank"></div>
                        <input data-role="none" type="text" id="contact" class="c_ipt " value="请输入您的联系方式">
                    </div>
                    <div class="x_blank"></div>
                    <a href="#" class="ui-btn ui-corner-all x_btn x_btn_curr" id="" onclick="info_submit()  ">提交</a>
                </div>
            </div>
            <div class="c_askBk">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="c_ask">
                        <div class="tit01">
                            <div class="pic01"><img src="<?php echo ($vo["path"]); ?>"></div>
                            <div class="info01"><?php echo ($vo["nickname"]); ?><label><?php echo ($vo["str_time"]); ?></label></div>
                        </div>
                        <div class="row01">
                            <?php echo ($vo["question"]); ?>
                        </div>
                        <div class="row02">
                            <span>驾校回复：</span><?php echo ($vo["answer"]); ?>
                        </div>
                    </div>
                    <div class="x_blank"></div><?php endforeach; endif; else: echo "" ;endif; ?>

                <!--<a href="#" class="ui-btn ui-corner-all x_btn" id="">加载更多</a>-->
            </div>

        </div>
    </div>
    <!-- /wrapper -->
</div>
<!--//Page-->

<script>
    function info_submit() {
        var question = $("#question").val();
        var phone = $("#re_phone").val();
        var remark = $("#re_remark").val();
        $.ajax({ //一个Ajax过程
            type: "post",
            url: "<?php echo addons_url('Student://Question/add');?>",
            dataType: 'json',
            data: 'question=' + question,
            success: function (data) {
                if (data.status == 0) {
                    document.getElementById("c_warn").style.display = "";
                    document.getElementById("c_warn_label").innerHTML = data.info;
                } else {
                    $("#question").val(null);
                    alert("添加成功");
                    location.reload();
                }
            },
            failed: function () {
                alert("异常！");
            }
        })

    }
    ;
</script>

</body>
</html>