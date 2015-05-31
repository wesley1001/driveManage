<?php if (!defined('THINK_PATH')) exit();?><meta charset="utf-8">

<div class="x_item subItem">
    <ul>
        <a href="#courseSel" data-rel="popup" data-transition="pop" >
            <li id="courseShow"><?php echo ($name); ?> &nbsp;&nbsp;&nbsp;<?php echo ($sign_charge); ?>元</li></a>
    </ul>
</div>
<div class="x_blank"></div>
<div class="c_formFull subItem">
    <input type="text" data-role="none" id="#re_name" value="请输入您的姓名">
    <input type="text" data-role="none" id="#re_phone" value="请输入电话号码">
    <input type="text" data-role="none" id="#re_mark" value="备注">
</div>
<div class="c_remark">报名说明：报名成功后,驾校会在第一时间联系您与您确认,请耐心等候。如急需报名可拨打我们的预约电话联系我们。</div>
<div class="c_warn_bk" >
  <div class="c_warn" id="c_warn" style="display:none"><span class="icon_warn"></span><label>异常消息提示</label></div>
</div>
<div class="x_btn_bk" >
    <a href="#" class="ui-btn ui-corner-all x_btn x_btn_curr" onclick = "info_submit()">提交</a>
</div>
<script>
$(function(){
	/*报名表单*/
	$(".c_formFull input").focus(function(){
		  $(this).addClass("focus");
		  if($(this).val() ==this.defaultValue){  
		      if($(this).attr("id")=="psw"){
				   	$("#pswShow").show();
				  	$(this).attr("type","password");
			  }
			  $(this).val(""); 
		  } 
	}).blur(function(){
		 if ($(this).val() == '') {
			 $(this).removeClass("focus");
			$(this).val(this.defaultValue);
			if($(this).attr("id")=="psw"){
				  	$(this).attr("type","text");
					
			  }
		 }else{
			 $(this).addClass("focus");
			}
	});
});


function info_submit() {
    var name = $("#re_name").val();
    var phone = $("#re_phone").val();
    var remark = $("#re_remark").val();
    $.ajax({ //一个Ajax过程
        type: "post",
        url: "<?php echo U('register');?>",
        dataType: 'json',
        data: 'name=' + name + '&phone=' + phone + '&remark=' + remark,
        success: function (data) {
            if(data.status == 0 ){
                document.getElementById("c_warn").style.display = "";
                document.getElementById("c_warn_label").innerHTML = data.info;
            }else{
                alert("报名成功");
            }
        },
        failed: function(){
            alert("报名出错！");
        }
    })
};
</script>