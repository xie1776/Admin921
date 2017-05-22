<?php  
	
	class CityModel extends Model{

		/**
		 * 获取所有的城市
		 * @author zhibin1
		 * @version 2016-09-21
		 * @return  [type]     [description]
		 */
		public function getList(){

			$list = $this->field('id,name,code')->order('id asc')->select();
	
			return $list;
		}
	}
?>