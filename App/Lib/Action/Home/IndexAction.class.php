<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends HomeAction {
    public function index(){
        $News = D('News');
        $info = $News->getFirst();

        $info['content'] = htmlspecialchars_decode($info['content']);
        $info['content'] = NewsModel::doImage($info['content']);
        //var_dump($info);die;
        $this->assign('info',$info);
        $this->display();
    }

    public function mail() {
        send_mail("zhibin3@qq.com", "zhibin.xie", "测试邮箱", "测试邮件是否能正常发送");
    }

    /**
     * 生成二维码
     * @author zhibin1
     * @version 2016-09-22
     */
    private function createQR($url){
        import('@.ORG.QRCode');
        $QRCode = new QRCode('',150);
        $img_url = $QRCode->getUrl($url);
        echo '<img src="' . $img_url . '" />';
    }
    /**
     * 发送邮件验证码
     * @author zhibin1
     * @version 2016-09-13
     * @return  [type]     [description]
     */
    public function sendCode(){
    	$arr = array(
    		'status'=>0,
    		'info' => '发送失败',
    		);
    	if(IS_POST){
    		$email = I('post.email','');
    		if(!preg_match('/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/', $email)){
    			$this->error('邮箱错误');die;
    		}
    		$receive_name = 'xx用户';
    		$theme = 'Facedays-验证码';
    		$code = sprintf('%04d',mt_rand(0,9999));
    		$cache = Cache::getInstance();
    		$cache->set($email,$code,3600);
    		$content = '邮箱验证码：'.$code;
    		$res = send_mail($email, $receive_name, $theme, $content);
    		if($res){
    			echo json_encode(array('status'=>1,'info'=>'发送成功'));die;
    		}
    	}

    	echo json_encode($arr);
    }

    /**
     * 验证邮箱
     * @author zhibin1
     * @version 2016-09-13
     * @return  [type]     [description]
     */
    public function verifyEmail(){
    	if(IS_POST){
    		$email = I('post.email');
    		$code = I('post.code');

    		$cache = Cache::getInstance();
    		$server_code = $cache->get($email);
    		if($server_code==$code){
    			$this->success('success');die;
    		}else{
    			$this->error('error');die;
    		}
    	}
    	$this->display('sendMailCode');
    }

}