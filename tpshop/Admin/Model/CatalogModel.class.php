<?php 
	namespace Admin\Model;
	use Think\Model; 
	class CatalogModel extends Model {
		//更改数据库
		protected $tableName = 'category';
		//获取所有目录
		public function getAllCatalog(){
			return $this->select();
		}
	}
 ?>