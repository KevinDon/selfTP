<?php 
	namespace Admin\Controller;
	use Think\Controller;
	class LoginController extends Controller{

		protected $verifyImage;
		public function _initialize(){
			$config =    array(
				'fontSize'    =>    30,    // 验证码字体大小
				'length'      =>    4,     // 验证码位数
			);
			$this->verifyImage = new \Think\Verify($config);

		}
		public function index(){
			$this -> display('login');
		}
		public function loginProcess(){

		}

		public function verify(){
			$this->verifyImage->entry();		
		}
	}
 ?>