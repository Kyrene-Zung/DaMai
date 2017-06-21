<?php
namespace app\mobile\controller;
use think\Request;

class Attribute
{
	public function index(){

		$goodsID=Request::instance()->param();
		// print_r( $goods_id);exit();
		$priceList=db('price')->where("goods_id=$goodsID[goods_id]")->order('price asc')->select();
		return jsonp($priceList);
	}
}