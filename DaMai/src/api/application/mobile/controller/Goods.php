<?php
namespace app\mobile\controller;
use think\Request;  

class Goods
{
	public function index()
  {

    $whereArr=[];
    $cateID=Request::instance()->param();
    print_r($cateID);exit();
    if( isset( $cateID['cate_id'] ) && $cateID['cate_id']!=0){
     $whereArr['cate_id']=$cateID['cate_id'];
   }
      // print_r($goodsList);exit();
   $goodsList=db('dm_goods')->where($whereArr)->select();
   return jsonp($goodsList);
 }
 public function search()
 {  
    $whereArr=[];
    $range="";
    $params=Request::instance()->param();
   // print_r($params);
     
    if( isset($params) ){
        if($params['curCate']!=0){
          $whereArr=[
            'cate_id'=>$params['curCate'],
            'city'=>$params['curCity'],
                  // 'timeRange'=>$params['timeRange'],
                  //'rangeWay'=>$params['rangeWay']
            ];
        }else{
          $whereArr=[
          'city'=>$params['curCity']
          ];
        }
    }
    // print_r($whereArr);
    $range=$params['rangeWay'];
    $goodsList=db('goods')->where($whereArr)->order("$range desc")->select();
    return jsonp($goodsList);
}

}