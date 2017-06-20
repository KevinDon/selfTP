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
                        $name = session('managerName');
                        $model = M();
                        //获取改用户的role ids
                        $sql = "select b.role_auth_ids from sw_manager a join sw_role b on a.mg_role_id = b.role_id where a.mg_name='" . $name . "' ";
                        $info = $model->query($sql);
                        $auth_ids = $info[0]['role_auth_ids'];
                        //根据IDs获取具体权限
                        //showBug($auth_ids);
                        //获取所有父ID
                        $sql_ID = "select * from sw_auth where auth_id in (".$auth_ids .") and auth_level = 0";
                        $parentAuth_info = $model->query($sql_ID);
                        //获取所有子ID
                        $sql_ID = "select * from sw_auth where auth_id in (".$auth_ids .") and auth_level = 1";
                        $childAuth_info = $model->query($sql_ID);
                        //showBug($auth_info);
                        $this->assign('parentAuth_info', $parentAuth_info);
                        $this->assign('childAuth_info', $childAuth_info);
			$this->display('left');
		}

	}
 ?>