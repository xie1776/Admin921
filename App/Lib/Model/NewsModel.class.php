<?php

class NewsModel extends Model {

    //状态
    const STATUS_NOR = 1;
    const STATUS_DEL = -1;
    const STATUS_DAI = 0;
    static $status = array(
        self::STATUS_NOR => '已审核',
        self::STATUS_DEL => '已删除',
        self::STATUS_DAI => '待审核',
        );

    public function listNews($firstRow = 0, $listRows = 20) {
        $M = M("News");
        $list = $M->field("`id`,`title`,`status`,`published`,`cid`,`aid`")->order("`published` DESC")->limit("$firstRow , $listRows")->select();
        $statusArr = array("审核状态", "已发布状态");
        $aidArr = M("Admin")->field("`aid`,`email`,`nickname`")->select();
        foreach ($aidArr as $k => $v) {
            $aids[$v['aid']] = $v;
        }
        unset($aidArr);
        $cidArr = M("Category")->field("`cid`,`name`")->select();
        foreach ($cidArr as $k => $v) {
            $cids[$v['cid']] = $v;
        }
        unset($cidArr);
        foreach ($list as $k => $v) {
            $list[$k]['aidName'] =$aids[$v['aid']]['nickname'] == '' ? $aids[$v['aid']]['email'] : $aids[$v['aid']]['nickname'];
            $list[$k]['status'] = $statusArr[$v['status']];
            $list[$k]['cidName'] = $cids[$v['cid']]['name'];
        }
        return $list;
    }
    /**
     * 新闻列表
     * @author zhibin1
     * @version 2016-09-22
     * @return  [type]     [description]
     */
    public function listNewsV2(){

        import('ORG.Util.Page');
        $count = $this->where()->count();
        $rows = 20;
        $page = new Page($count,$rows);

        $M = M();
        $data = array();
        $list = $M->table('pa_news n')
                  ->join('pa_admin a on a.aid=n.aid')
                  ->join('pa_category c on c.cid=n.cid')
                  ->field('n.id,n.title,n.status,n.published,a.email,a.nickname,c.name')
                  ->limit($page->firstRow.','.$rows)
                  ->order('n.id desc')
                  ->select();
        //echo $M->_sql();die;
        if($list){
            foreach ($list as $key => $val) {
                $list[$key]['aidName'] = $val['nickname']?$val['nickname']:$val['email'];
                $list[$key]['status'] = self::$status[$val['status']];
                $list[$key]['cidName'] = $val['name'];
                $list[$key]['cidName'] = $val['name'];
                $list[$key]['status_code'] = $val['status'];
            }

            $data = array(
                'page' => $page->show(),
                'list' => $list,
                );
        }

        return $data;
    }
    public function category() {
        import("@.ORG.Category");
        if (IS_POST) {
            $act = $_POST[act];
            $data = $_POST['data'];
            $data['name'] = addslashes($data['name']);
            $M = M("Category");
            if ($act == "add") { //添加分类
                unset($data[cid]);
                if ($M->where($data)->count() == 0) {
                    return ($M->add($data)) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功添加到系统中', 'url' => U('News/category', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 添加失败');
                } else {
                    return array('status' => 0, 'info' => '系统中已经存在分类' . $data['name']);
                }
            } else if ($act == "edit") { //修改分类
                if (empty($data['name'])) {
                    unset($data['name']);
                }
                if ($data['pid'] == $data['cid']) {
                    unset($data['pid']);
                }
                return ($M->save($data)) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功更新', 'url' => U('News/category', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 更新失败');
            } else if ($act == "del") { //删除分类
                unset($data['pid'], $data['name']);
                return ($M->where($data)->delete()) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功删除', 'url' => U('News/category', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 删除失败');
            }
        } else {
            
            $cat = new Category('Category', array('cid', 'pid', 'name', 'fullname'));
            return $cat->getList();               //获取分类结构
        }
    }

    public function addNews() {
        
        $data = $_POST['info'];
        $data['published'] = time();
        $data['aid'] = $_SESSION['my_info']['aid'];
        if (empty($data['summary'])) {
            $data['summary'] = cutStr($data['content'], 200);
        }
        $res = $this->data($data)->add();
        if ($res) {
            return array('status' => 1, 'info' => "已经发布", 'url' => U('News/index'));
        } else {
            return array('status' => 0, 'info' => "发布失败，请刷新页面尝试操作");
        }
    }
    /**
     * 编辑文章
     * @author zhibin1
     * @version 2016-09-22
     */
    public function edit($id,$data=array()) {

        $data['update_time'] = time();
        $res = $this->where(array('id'=>$id))->limit(1)->save($data);
        if ($res) {
            return array('status' => 1, 'info' => "已经更新", 'url' => U('News/index'));
        } else {
            return array('status' => 0, 'info' => "更新失败，请刷新页面尝试操作");
        }
    }

    /**
     * 返回第一条已审核的新闻
     * @author zhibin1
     * @version 2016-09-22
     * @return  [type]     [description]
     */
    public function getFirst(){

        $map = array(
            'status' => self::STATUS_NOR,
            );
        $info = $this->field()->where($map)->order('id desc')->find();

        return $info;
    }

    /**
     * 指定一条记录
     * @author zhibin1
     * @version 2016-09-23
     * @return  [type]     [description]
     */
    public function getInfo($id){

        $map = array(
            'status' => self::STATUS_NOR,
            'id' => $id,
            );

        $info = $this->field()->where($map)->find();
        
        return $info;
    }

    /**
     * 处理图片
     * @author zhibin1
     * @version 2016-09-26
     * @return  [type]     [description]
     */
    static function doImage($content=''){
        if($_SERVER['SERVER_NAME']!='laijiemi.cn'){
            $url = 'http://laijiemi.cn';
            return preg_replace('/\/Public\/Uploads\/image\/\w+/', $url."$0", $content);
        }

        return $content;
    }


}

?>
