<?php

namespace Addons\Student\Model;
use Think\Model;

/**
 * Student模型
 */
class StudentModel extends Model{
    protected $_validate = array(
        array('open_id','checkWeixin','找不到微信号！',0,'function'),
    );

    function  checkWeixin($str)
    {
        if (!empty($str)) {

            $map = array('open_id' => $str,);
            $reult = M('follow')->where($map)->find();
            if (sizeof($reult) < 1) {
                $this->error = '微信号'.$str.'未关注！';
            }
        }
    }
}
