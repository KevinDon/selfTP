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
			//第一步验证验证码
			//showBug($_POST['captcha']);
			if(!empty($_POST['captcha'])){
				if(!$this->verifyImage->check($_POST['captcha'])){
					echo "验证码错误";
				}else{
					//搜集表单数据
					//showBug($this->ManagerModel->create());
					$Pmanager = $this->ManagerModel->create();
					//进行验证，并返回是否存在Manager的信息
					$manager = $this->ManagerModel->checkManager($Pmanager['mg_name'], $Pmanager['mg_pwd']);
					//showBug($manager);
				}
			}
			//showBug($manager);
			$this->assign('manager', $manager);
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