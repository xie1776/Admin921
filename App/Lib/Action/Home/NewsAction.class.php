<?php  
	
	class NewsAction extends HomeAction{

		/**
		 * 文章详细
		 * @author zhibin1
		 * @version 2016-09-23
		 * @return  [type]     [description]
		 */
		public function detail(){

			$id = I('get.id',0,'intval');
			//echo $id;die;

			if(!$id){
				$this->error('文章不存在');die;
			}

			$News = D('News');

			$info = $News->getInfo($id);
			//var_dump($info);die;
			if($info){
				$info['content'] = htmlspecialchars_decode($info['content']);
				$info['content'] = NewsModel::doImage($info['content']);
				$this->assign('info',$info);
				$this->display("Index:index");die;
			}else{
				$this->error('文章不存在');die;
			}
		}
	}
?>