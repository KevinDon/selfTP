<?php 
	namespace Admin\Model;
	use Think\Model;

	class ProductsModel extends Model {
		protected $productsModel;
		public function _initialize(){
			$this->categoryModel = D('Catalog');
		}
		//修改数据表
		protected  $tableName = 'goods';
		//获取产品数据
		public function getProducts($page=1, $pageSize=5){
			//获取当前个数的起始值
			$curPage = $pageSize * ($page - 1);
			return $this->limit($curPage, $pageSize)->select();
		}

		public function getProductForID($pid){
			$productArr = $this->join('sw_category ON sw_category.cat_id = sw_goods.goods_category_id')->where("goods_id=".$pid)->select();
			$product = Array();
			foreach ($productArr as $item) {
				$product['good_id'] =  $item["goods_id"];
				$product['good_name'] =  $item["goods_name"];
				$product['goods_price'] =  $item["goods_price"];
				$product['good_description'] = $item["goods_introduce"];
				$product['goods_big_img'] = $item["goods_big_img"];
				$product['cat_id'] = $item["cat_id"];
				//$catalog = $this->categoryModel->where("cat_id=$cid")->select();
			}
			//showBug($this->categoryModel->getAllCatalog());die();;
			return $product;
		}
	}

 ?>