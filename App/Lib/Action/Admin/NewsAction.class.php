<?php

class NewsAction extends CommonAction {

    /**
     * 新闻列表
     * @author zhibin1
     * @version 2016-09-22
     * @return  [type]     [description]
     */
    public function index() {

        $News = D("News");
        $data = $News->listNewsV2();

        //dump($data);die;
        $this->assign("page", $data['page']);
        $this->assign("list", $data['list']);
        $this->display();
    }

    public function category() {
        if (IS_POST) {
            echo json_encode(D("News")->category());
        } else {
            $this->assign("list", D("News")->category());
            $this->display();
        }
    }

    public function add() {
        $News = D('News');
        if (IS_POST) {
            $this->checkToken();
            echo json_encode($News->addNews());
        } else {
            $this->assign("list", $News->category());
            $this->display();
        }
    }

    public function checkNewsTitle() {
        $M = M("News");
        $where = "title='" . $this->_get('title') . "'";
        if (!empty($_GET['id'])) {
            $where.=" And id !=" . (int) $_GET['id'];
        }
        if ($M->where($where)->count() > 0) {
            echo json_encode(array("status" => 0, "info" => "已经存在，请修改标题"));
        } else {
            echo json_encode(array("status" => 1, "info" => "可以使用"));
        }
    }

    public function edit() {

        $News = D("News");
        $id = I('get.id',0,'intval');
        $data = I('post.info');

        if(!$id){
            $this->error("不存在该记录");die;
        }

        if (IS_POST) {
            $this->checkToken();
            echo json_encode($News->edit($id,$data));
            die;
        }

        $info = $News->where(array('id'=>$id))->find();

        $this->assign("info", $info);
        $this->assign("list", $News->category());
        $this->display("add");
        
    }

    public function del() {

        $id = I('get.id',0,'intval');
        if(!$id){
            $this->error("删除失败，可能是不存在该ID的记录");die;
        }
        $News = D('News');

        $res = $News->where(array('id'=>$id))->limit(1)->setField('status',NewsModel::STATUS_DEL);
        if ($res) {
            $this->success("成功删除");die;
            //echo json_encode(array("status"=>1,"info"=>""));
        }

        $this->error('删除失败');
    }

}