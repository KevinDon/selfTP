<?php 
	namespace Admin\Controller;
	//use Common\Controller;
	class ProductsController extends \Admin\Common\Controller\AdminController{
		protected $productsModel;
		protected $catalog;
		protected $brands;
		protected $PageModle;
		public function _initialize(){
                        //parent::__construct();
		 	$this->productsModel = new \Admin\Model\ProductsModel();
		 	$this->catalog = D('Catalog');
		 	$this->brands = D('Brands');
		 	$this->PageModle = new \Lib\Page\Page;
		 	//$this->PageModle = new \Page;
		}

		public function index(){
			$page = 1;
			if($_GET){
				//var_dump($_GET);
				$page = $_GET['page'];
			};
			$products = $this->productsModel->getProducts($page);
			$this->assign('products', $products);
			//$this->assign('name', '诺基亚');
			//获取所有Brands
			$brands = $this->brands->getAllBrand();
			$this->assign('brands', $brands); 
			$page = $this->PageModle->getPage(__ACTION__, $this->productsModel->count());
			$this->assign('page', $page);
			$this->display('products');
		}

		public function EditProduct(){
			if ($_GET) {
				$pid = $_GET['id'];
				//showBug($pid); 
				//调用方法获取产品Detail
				$product = $this->productsModel->getProductForID($pid);
				//showBug($product);
				$this->assign('product', $product);
				//获取目录列表
				$catalogList = $this->catalog->getAllCatalog();
				$this->assign('catalogList', $catalogList);
				$this->display('edit');
			};
			return false;
		}

		public function updataProduct(){
			//echo "updataProduct";
			$product = D('Products');
			//获取表单数据 
			$product->create();
			//showBug($product->create()['goods_id']);
			//将表单数据保存到数据库中
			$result = $product->where("goods_id=". $product->create()['goods_id'])->save();
			//showBug($result);
			if($result){
				$this->success("修改成功");

			}else{
				$this->error("修改失败");
			}
		}

		public function addProduct(){
			$catalogList = $this->catalog->getAllCatalog();
			$this->assign('catalogList', $catalogList);
			$this->display('add');
		}

		public function add(){
			$product = D('Products');
			$product->create();
			//showBug($product->create());
			$result = $product->add();
			if($result){
				$this->redirect('Admin/Products/index');

			}else{
				$this->error("添加失败");
			}
		}

		public function deleteProduct(){
			if ($_GET) {
				$pid = $_GET['id'];
				//showBug($pid);
				$result = $this->productsModel->where('goods_id='. $pid)->delete();
				if($result){
					$this->redirect('Admin/Products/index');

				}else{
					$this->error("删除失败");
				}
			}
		}
	}
 ?>