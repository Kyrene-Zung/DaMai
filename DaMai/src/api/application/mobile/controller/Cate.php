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
      $cateList=db('cate')->select();
      return jsonp($cateList);
    }
}
