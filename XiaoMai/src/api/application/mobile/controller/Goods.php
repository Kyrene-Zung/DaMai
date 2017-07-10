<?php
namespace app\mobile\controller;
use think\Request;  

class Goods
{
  	public function index()
    {

      $whereArr=[];
      $params=Request::instance()->param();
      //请求小编推荐、热门推荐、猜你喜欢
      if($params['type']){ 
        $whereArr=array('type' =>$params['type']);
      }
      // print_r($params);exit();
      //请求某分类的商品
      if( isset( $params['cate_id'] ) && $params['cate_id']!=0){
       $whereArr['cate_id']=$params['cate_id'];
     }
        // print_r($goodsList);exit();
     $goodsList=db('goods')->where($whereArr)->select();
     return jsonp($goodsList);
   }
   public function search()
   {  
      $whereArr=[];
      $range="";
      $num=10;
      $jump=0;
      $params=Request::instance()->param();
      // print_r($params);exit();
       
      if( isset($params) ){
          if($params['curCate']!=0){
            $whereArr=[
              'cate_parent'=>$params['curCate'],
              'city'=>$params['curCity'],
              // 'timeRange'=>$params['timeRange'],
              ];
          }else{
            $whereArr=[
            'city'=>$params['curCity']
            ];
          }
      }
      if(isset($params['page'])){
        $page=$params['page'];
        $jump=$page*$num;
      }
      // print_r($whereArr);
      $range=$params['rangeWay'];     
      $goodsList=db('goods')->where($whereArr)->order("$range desc")->limit($jump,$num)->select();
      return jsonp($goodsList);
  }
  function goodsort(){
    $whereArr=[];
    $sort='';
    $params=Request::instance()->param();

    if(isset($params) ){
      $whereArr=[
        'cate_parent'=>$params['cate_id']
      ];
      $sort=$params['sort'];
    }
    $goodsort=db('goods')->where($whereArr)->order("$sort desc")->select();
    // print_r($goodsort);exit();
    return jsonp($goodsort);
  }

}