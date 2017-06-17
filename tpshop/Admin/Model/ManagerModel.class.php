<?php 
	namespace Admin\Model;
	use Think\Model;

	class ManagerModel extends Model {
		public function checkManager($Mname){
			return $this->where("mg_name='$Mname'")->select();
		}
	}

 ?>