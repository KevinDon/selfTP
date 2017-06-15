<?php 
	namespace Admin\Model;
	use Think\Model;

	class ManagerModel extends Model {
		public function checkManager($Mname, $Mpwd){
			return $this->where("mg_name='$Mname' AND mg_pwd='$Mpwd'")->select();
		}
	}

 ?>