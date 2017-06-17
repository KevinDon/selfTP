<?php 
	namespace Admin\Controller;
	use Think\Controller;
	class IndexController extends Controller{
		protected $ManagerModel;
		protected $verifyImage;
		public function _initialize(){
			$this->ManagerModel = D("Manager");
			$config =    array(
				'fontSize'    =>    30,    // 验证码字体大小
				'length'      =>    4,     // 验证码位数
			);
			$this->verifyImage = new \Think\Verify($config);
		}
		public function index(){
			
			$this->display('index');
		}

		public function right(){
			$this->display('right');
		}

		public function head(){
			$this->display('head');
		}
		
		public function left(){
			$this->display('left');
		}

	}
 ?>