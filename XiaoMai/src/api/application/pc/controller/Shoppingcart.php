<?php
namespace app\pc\controller;
class shoppingcart extends \think\Controller
{
    public function address()
    {       
        return $this->fetch();

    }

    public function shoppingcart()
    {       
        return $this->fetch();

    }

    public function adder()
    {       
        return $this->fetch();

    }

    public function addprice()
    {       
        $price_id=input('price_id');

        $price=db('price')->where("id=$price_id")->select();
        return json($price);

    }

    public function pay()
    {
        

        $this->success('支付成功');
        
    }
}