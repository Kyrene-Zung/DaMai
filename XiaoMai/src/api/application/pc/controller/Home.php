<?php
namespace app\pc\controller;
use think\Session;
class Home extends \think\Controller
{
    public function index()
    {       
        $cateType=db('cate')->where("cate_parent=0")->select();
        $this->assign('cateType',$cateType);
        return $this->fetch();

    }
    public function home()
    {       
        $cateList=db('cate')->where("cate_parent=0")->select();
        $this->assign('cateList',$cateList);
        return $this->fetch();

    }

     public function lists()
    {   
        
        $goodsList=db('goods')->select(); 
        $this->assign('goodsList',$goodsList);
        return $this->fetch();
    }

    public function categoods(){
        $cate_id=input('cate_id');
        // echo $cate_id;exit();
        $categoods=db('goods')->where("cate_id=$cate_id or cate_parent=$cate_id")->select(); 
        // print_r($categoods);exit();
        /*$this->assign('categoods',json_encode($categoods));*/
    
        return json($categoods);
    }

     
}