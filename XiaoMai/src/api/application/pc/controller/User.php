<?php
namespace app\pc\controller;
use think\Session;


class User extends \think\Controller
{
    public function logo()
    {       
        return $this->fetch();

    }
    
     public function register()
    {
	
        return $this->fetch();

    }
    //保存用户信息
    public function regSum(){
    	$addData['usertel'] = input('user_tel');
        
    	$addData['password'] = input('logo_password1');  

    	$userModel =model('user');
    		$userModel->save($addData);
    		//存入数据库时候 返回一个数据表的自增长id(  由于其他的数据操作)
    		$addData['id'] = $userModel->id;
    		//把用户信息存入会话中 session,调用session的静态方法
    		/*Session::set('user',$addData);*/

        /*db('user')->insert($addData);*/
    	/*	$this->success('保存成功',url('logo'));


    	
        return $this->fetch();*/
    }
    //检查用户命是否注册过
    public function checkname()
    {
		
    	$usertel=input('user_tel');
    	$info = db('user')->where("usertel='$usertel'")->find();

    	if ($info) {
    		return json(array('status'=>0,'msg'=>'用户名已存在!'));
    	}else{
    		return json(array('status'=>1));
    	}

        /*return $this->fetch();*/

    }

    //登录用户
    public function login()
    {
		$usertel=input('user_tel');
		$password=input('password');

		$user_info=db('user')->where("usertel='$usertel' and password='$password'")->find();

		if ($user_info) {
			Session::set('user_info',$user_info);
            Session::set('user_id',$user_info['id']);
			return json(array('status'=>1,'msg'=>'登录成功'));
		}else{
			return json(array('status'=>0,'msg'=>'账号或密码不正确'));
		}
    	/*return $this->fetch();*/

    }

    public function quit()
    {
        
            Session::set('user_info',"");
            Session::set('user_id',"");

        $this->success('退出成功');
        
    }



}