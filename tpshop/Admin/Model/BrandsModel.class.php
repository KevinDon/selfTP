<?php 
	namespace Admin\Model;
	use Think\Model; 
	class BrandsModel extends Model {
		//更改数据库
		protected $tablePrefix = "";
		protected $tableName = 'Brands';
		//获取所有brand
		public function getAllBrand(){
			return $this->select();
		}
	}
 ?>