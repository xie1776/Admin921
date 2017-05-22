<?php

class MemberAction extends CommonAction {

    public function index() {
    	$Member = D('Member');
    	$res = $Member->getList();
    	$citys = C('CITYS');

    	$this->assign('citys',$citys);
    	$this->assign('page',$res['showpage']);
    	$this->assign('list',$res['list']);
        $this->display();
    }


}