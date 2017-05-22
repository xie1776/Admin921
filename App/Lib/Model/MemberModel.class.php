<?php 
	//会员Model 
	class MemberModel extends Model{

		/**
		 * 用户列表
		 * @author zhibin1
		 * @version 2016-09-12
		 * @return  [type]     [description]
		 */
		public function getList($where=array()){
			//分页
			import('ORG.Util.Page');
			$rows = 20; //每页显示20条信息
			$count = $this->where($where)->count();
			$page = new Page($count,$rows);
			$list = $this->where($where)->limit($page->firstRow.','.$rows)->order('uid desc')->select();
			$res['page'] = $page->show();
			$res['list'] = $list;
			return $res;
		}
	}
?>