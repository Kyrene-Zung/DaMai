<?php
namespace app\mobile\controller;
use think\Request;

class User
{
    public function index()
    {
     // echo input('cateID');
      $user_id=Request::instance()->param();
     // $user_id=$user_idArr['user_id'];
     // print_r($user_id);exit();
      $user=$user_id['user_id'];
      $addressList=db('dm_address')->where('user_id',$user)->select();
      return jsonp($addressList);
    }
}
