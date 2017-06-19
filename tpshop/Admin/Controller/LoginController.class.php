<?php 
	namespace Admin\Controller;
	use Think\Controller;
	class LoginController extends Controller{
                protected $ManagerModel;
		protected $verifyImage;
		public function _initialize(){
			$config =    array(
				'fontSize'    =>    30,    // 验证码字体大小
				'length'      =>    4,     // 验证码位数
                                'expire'      =>    3600,  // 验证码有效时间
			);
			$this->verifyImage = new \Think\Verify($config);
                        $this->ManagerModel = new \Admin\Model\ManagerModel();
		}
		public function index(){
			$this -> display('login');
		}
		public function loginProcess(){
                        //第一步验证验证码
			if(!empty($_POST['captcha'])){
                                //showBug($_POST['captcha']);
				if(!$this->verifyImage->check($_POST['captcha'])){
					echo "验证码错误";
				}else{
					//搜集表单数据
					showBug($this->ManagerModel->create());
					$managerPostData = $this->ManagerModel->create();
					//进行验证，并返回是否存在Manager的信息
                                        //showBug($this->ManagerModel->checkManager($managerPostData['mg_name']));
					$manager = $this->ManagerModel->checkManager($managerPostData['mg_name']);
                                        //判断密码是否正确
                                        if($managerPostData['mg_pwd'] == $manager[0]['mg_pwd']){
                                            //持久化数据
                                            session('managerName', $managerPostData['mg_name']);
                                            session('managerpwd', $managerPostData['mg_pwd']);
                                            $this->redirect('Index/index');
                                        }
                                        echo "not ok";
				}
                        }else{
                            echo "请输入验证码";
                        }
			//showBug($manager);
		}

		public function verify(){
			$this->verifyImage->entry();		
		}
                
                public function logout(){
                    session('managerName', null);
                    session('managerpwd', null);
                    $this->display('login');
                }
	}
 ?>