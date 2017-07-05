<?php
namespace app\admin\controller;

class Goods extends \think\Controller
{
    public function index()
    {

//    	查询，实例化音乐模型
//        数据库的优化方法，第一个：需要哪些字段就只查询哪些字段
       $m=db('goods');
       $search_a=array();
       if (input("keyword")) {
          $search_a["m.goods_name"]=array("like","%".input("keyword")."%");
       }
       if (input("category_id")) {
          $search_a["m.cate_id"]=array("=",input("category_id"));
       }
        $goods_list=$m
            ->alias('m')
            ->field('m.id,m.goods_name,m.goods_price,s.cate_name')
            ->join("__CATEGORY__ s","m.cate_id=s.id")
            ->where($search_a)
            ->order(" m.id desc ")
            ->paginate(10);

            // 测试的时候一定要边界值，为0不传的时候，传的时候很多数据为怎么样
      
        $this->assign('goods_list',$goods_list);

        $category_list = db('category')->select();
        $this->assign('category_list',$category_list);
       return $this->fetch();
    }

     public function add()
    {
        //明星的数据
        $category_list = db('category')->select();
        $this->assign('category_list',$category_list);
        return $this->fetch();
    }

    public function save()
    {

 
//        第一步：把表单传过来的数据放到一个数组里
        $save_data=array(
            'goods_name'=>input('goods_name'),
            'description'=>input('description'),
            'goods_price'=>input('goods_price'),
            'lng'=>input('lng'),
            'lat'=>input('lat'),
            'start_time'=>input('start_time'),
            'start_time'=>time(),
            'cate_id'=>input('cate_id'),
        );
//            上传文件
//            如果没有上传文件提示错误
          $save_data['goods_thumb'] =  savePic(request(),'goods_thumb');
          $save_data['thumb_1'] =  savePic(request(),'thumb_1');
          $save_data['thumb_2'] =  savePic(request(),'thumb_2');
           
           //无论是否有上传文件都要保存数据
           $goodsModel = model('goods');
           $goodsModel->save($save_data);
           $goods_id =  $goodsModel->id;//商品ID
 
            // 添加演出时间,需要商品ID（GOODS_ID）
          
             // 定义一个临时的时间数组，用来保存它入库后的ID
             $temp_time_array=[];
            foreach ($_POST['star_time'] as $key_time => $value_time) {   
               $goodsTimeModel = model('goods_time');
               // 遍历一次添加一次，需使用create
               $add_time_data = array('time_name'=>$value_time,'goods_id'=>$goods_id);
                //如果是小米商品，加多一个自定义的属性值
               if ($_POST['goods_type']==2) {
                 $add_time_data['diy_name'] = $_POST['diy_name'][0];
               }
               $n = $goodsTimeModel->create($add_time_data); 
               $temp_time_array[$key_time] = $n->id;
              
               // echo $goodsTimeModel->getlastsql();
            }
            // 添加价格和库存
            foreach ($_POST['sku'] as $key => $value) {
              //第一次遍历是获取到的是时间 
              $time_id = $temp_time_array[$key];
              foreach ($value as $k_two => $v_two) {
                $price_data=array(
                    'time_id' => $time_id ,
                    'stock' => $v_two
                  );

                  if ($_POST['goods_type']==2) {
                     $price_data['diy_name'] = $_POST['diy_name'][1];
                     $price_data['price'] = $_POST['price'][$key][$k_two];
                     $price_data['attr_name'] = $_POST['star_price'][$k_two];
                   }else{
                     $price_data['price'] = $_POST['star_price'][$k_two];
                   }
                 db('goods_price')->insert($price_data);
               }
            }
            $this->success('添加成功！','index');

    }

    public function delete()
    {
        $id = input("id");

        db('goods')->delete($id);

        $this->success('删除成功！','index');


    }

    public function edit()
    {
        $id = input("id");
        $info = db("goods")->where("id=$id")->find();
        $this->assign('info',$info);
        //明星的数据
        $category_list = db('category')->select();
        $this->assign('category_list',$category_list);

        return $this->fetch();
    }

    public function update()
    {
        $id = input("id");
        $updateData=[
            'goods_name'=>input('goods_name'),
            'description'=>input('description'),
            'goods_price'=>input('goods_price'),
            'lng'=>input('lng'),
            'start_time'=>input('start_time'),
            'lat'=>input('lat'),
            'cate_id'=>input('cate_id'),

        ];

          $updateData['goods_thumb'] =  savePic(request(),'goods_thumb');
          if (empty($updateData['goods_thumb'])) {
           unset($updateData['goods_thumb']);
          }
          
          $updateData['thumb_1'] =  savePic(request(),'thumb_1');
          if (empty($updateData['thumb_1'])) {
           unset($updateData['thumb_1']);
          }

          $updateData['thumb_2'] =  savePic(request(),'thumb_2');
          if (empty($updateData['thumb_2'])) {
           unset($updateData['thumb_2']);
          }

           db("goods")->where("id=$id")->update($updateData);
           $this->success('修改成功！','index');
      



    }
    //推荐操作
    public function recommed()
    {
      $id_a=$_GET['ids'];
      if (!empty($id_a)) {
          foreach ($id_a as $key => $value) {
              db('goods')->where("id=$value")->update(['position'=>input('position')]);
          }
          $this->success('推荐成功！','index');
      }
    }
}
