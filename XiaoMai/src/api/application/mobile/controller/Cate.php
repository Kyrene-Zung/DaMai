<?php
namespace app\mobile\controller;
use think\Request;

class Cate
{
    public function index()
    {
     // echo input('cateID');
      $goodsList=Request::instance()->param();
      // print_r($goodsList);exit();
      $cateList=db('cate')->where("cate_parent=0")->order('cate_id asc')->select();
      return jsonp($cateList);
    }
}
