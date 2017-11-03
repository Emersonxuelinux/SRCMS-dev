<?php
namespace User\Controller;
use Think\Controller;

/**
 * @Author: Zhou Yuyang <1009465756@qq.com> 10:28 2016/12/03
 * @Copyright 2015-2020 Plusec All Rights Reserved
 * @Project homepage https://github.com/martinzhou2015/SRCMS
 * @Version 3.0 Alpha
 */

class IndexController extends BaseController {
    public function index(){
		$id = session('userId');
		$username = session('username');
		$pnum = M('post')->where('user_id='.$id)->count();
		$jinbi = M('member')->where('id='.$id)->find();
		$gift = M('order')->where(array('username'=>$username,'userid'=>$id))->count();
		$page = M('page')->select();
        $post = M('post')-> where(array('user_id'=>$id)) -> limit(5)-> order('post.id DESC') ->select();
        $this->assign('pnum',$pnum);
		$this->assign('jinbi',$jinbi);
		$this->assign('gift',$gift);
		$this->assign('page',$page);
        $this->assign('model',$post);
        $this->display();
    }
}