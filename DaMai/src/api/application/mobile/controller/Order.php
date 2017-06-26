<?php
namespace app\mobile\controller;
use think\Request;
class Order
{
	function index(){ //生产订单编号
		$random=date("Ymd").rand(1000,9999);
		return jsonp($random);
	}
	function proOrder(){
		$order=model('order');
		$params=Request::instance()->param();//接收传过来的参数orderMessage
		// print_r($orderMessage);
		// print_r($orderMessage['orderMessage']);exit();
		$orderArr=$params['orderMessage'];
		$orderDetail=$orderArr['order_detail'];
		// print_r($orderArr['order_detail']) ;
		// echo $orderArr['order_detail'][0]['time']['goods_id'];
		$ticket_totle=0;
		$price_totle=0;
		foreach ($orderDetail as $key => $value) {
			$ticket_totle+=$value['num'];
			$price_totle+=$value['price']*$value['num'];
		}
		// echo $ticket_totle;echo $price_totle;exit();
		$saveArr=[ 
			'order_num'=>$orderArr['order_num'],
			'user_id'=>$orderArr['user_id'],
			'goods_id'=>$orderDetail[0]['goods_id'],
			'ticket_totle'=>$ticket_totle,
			'price_totle'=>$price_totle,
			'show_date'=>$orderDetail[0]['date'],
			'show_time'=>$orderDetail[0]['time'],
			'create_time'=>time()
		];
		// print_r($saveArr);exit();
		 $order->save($saveArr);  //存到订单表
		 $order_id=$order->order_id; //获取订单id

		 //插入订单详情表
		 foreach ($orderDetail as $key => $value) { 
		 	$detailArr=[
			 	'order_id'=>$order_id,
			 	'orderdetail_price'=>$value['price'],
			 	'orderdetail_num'=>$value['num'],
			 ];
			 db('orderdetail')->insert($detailArr); 
		 }
		 return jsonp(1);
		 // db('orderDetail')->insert();
		//echo $orderMessage[0]['order_num'];
	}
	function getOrder(){
		$order=model('order');
		$params=Request::instance()->param();
		 // print_r($params);
		$user_id=$params['user_id'];
		$whereArr=[];
		if($user_id){
			$whereArr=['user_id'=>$user_id];
		}
		if(isset($params['status'])){
			if($params['status']!=10){
			 $whereArr=['status'=>$params['status']];				
			}
		}
		$orderArr=db('order')
				  ->alias('o')
				  ->join('dm_goods g','o.goods_id=g.goods_id')
				  ->field("g.goods_title,g.goods_pic,o.order_id,o.order_num,o.status,o.ticket_totle,o.price_totle")
				  ->where($whereArr)
				  ->select();
		// print_r($orderArr);exit();
		return jsonp($orderArr); 
	}
}
