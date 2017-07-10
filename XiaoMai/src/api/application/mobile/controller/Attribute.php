<?php
namespace app\mobile\controller;
use think\Request;

class Attribute
{
	public function goodsTime()
	{
		$goodsID=Request::instance()->param();
      // print_r( $goods_id);exit();
		$timeList=db('time')->where("goods_id=$goodsID[goods_id]")->order('time asc')->select();
            // ->alias('t')
            // ->field('date,week,time,venue_name,area_name,price,ticket_left,ticket_totle')
            // ->join('dm_price p','t.time_id=p.time_id')
            // ->where("t.goods_id=$goodsID[goods_id]")
            // ->select();

      // print_r( $timeList);exit();
      // foreach ($timeList as $key => $value) {
      //  $value['time_id']
      // }
      // $priceList;
		return jsonp($timeList);
	} 
	public function goodsPrice()
	{
		$timeID=Request::instance()->param();
		$priceList=db('price')->where("time_id=$timeID[time_id]")->order('price asc')->select();
		return jsonp($priceList);
	}
}