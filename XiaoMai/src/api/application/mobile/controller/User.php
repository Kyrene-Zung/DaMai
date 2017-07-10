<?php
namespace app\mobile\controller;
use think\Request;
use think\Page;
class User
{
    public function index()
    {
     // echo input('cateID');
      $user_id=Request::instance()->param();
      // print_r($user_id);exit();
      $user=$user_id['user_id'];
      $addressList=db('address')->where('user_id',$user)->select();
      return jsonp($addressList);
    }
    public function save() //注册
    {
      
    // echo input('phone');exit();
      $addData=[];
      // $param = Request::instance()->param();//获取传过来的参数
      // print_r($param);exit();
      $addData=[
      'user_phone'=>input('phone'),
      'user_password'=>input('password'),
      'user_name'=>'dm'.date("Ymd").rand(1000,9999)
      ];
       // print_r($addData);exit();
      db('user')->insert($addData);
      return jsonp(['status'=>1]);
    }
    public function read()//登录
    {
      $userM =model('user');
      // $param = Request::instance()->param();
      // $user_phone=$param['phone'];
      // $user_password=$param['password'];
      $user_phone=input('phone');
      $user_password=input('password');
      // echo $user_phone;exit();
      $user=$userM->where("user_phone='$user_phone' and user_password='$user_password'")->find();
      // print_r($user);exit();
      // echo $userM->getlastsql();
      if( !empty($user)){
        return json([
          'status'=>1,
          'user_id' => $user['user_id'],
          'user_name'=>$user['user_name'],
          // 'user_photo'=>$user['user_photo'],
          'user_phone'=>$user['user_phone'],
          // 'user_state'=>$user['user_state'],
          // 'user_wallet'=>$user['user_wallet'],
          // 'user_integration'=>$user['user_integration'],
          // 'user_coupon'=>$user['user_coupon'],
          // 'user_birthday'=>$user['user_birthday']
          //'user_ID', 'user_name', 'user_phone', 'user_state', 'user_sex', 'user_birthday', 'user_wallet', 'user_integration', 'user_coupon'
        ]);
      }else{
        return json(['status'=>0]);
      }
    } 
    function addAddress(){
      $param = Request::instance()->param();
      //print_r(json_decode($param['obj'],true));exit();
      $addressArr=json_decode($param['obj'],true);
      db('address')->insert($addressArr);
      return jsonp(['status'=>1]);
    }
}
