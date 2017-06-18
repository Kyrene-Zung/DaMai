<?php
namespace app\mobile\controller;
use think\Request;  

class Goods
{
	public function index()
    {
     
      $whereArr=[];
      $cateID=Request::instance()->param();
      // print_r($cateID);exit();
      if( isset( $cateID['cate_id'] ) && $cateID['cate_id']!=0){
      	$whereArr['cate_id']=$cateID['cate_id'];
      }
      // print_r($goodsList);exit();
      $goodsList=db('dm_goods')->where($whereArr)->select();
      return jsonp($goodsList);
    }
}