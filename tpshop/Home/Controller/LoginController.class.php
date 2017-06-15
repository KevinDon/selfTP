<?php 
	namespace Home\Controller;
	use Think\Controller;
	class LoginController extends Controller{
		public function login(){
			$this->display('login');
		}
		public function test(){
			echo "login";
		}
	}
 ?>