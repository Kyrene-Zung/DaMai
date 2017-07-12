<?php
namespace app\pc\controller;
class Details extends \think\Controller
{
    public function index()
    {       
    	$goodsprice=db('price')->select();
    	$this->assign('goodsprice',$goodsprice);
        return $this->fetch();

    }
}