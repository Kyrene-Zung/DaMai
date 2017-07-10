<?php
namespace app\admin\controller;

class category extends \think\Controller
{
    public function index()
    {

//    	查询，实例化音乐模型
//        数据库的优化方法，第一个：需要哪些字段就只查询哪些字段
       $m=db('cate');
       $search_a=["m.cate_parent"=>0];
       if (input("keyword")) {
          $search_a["m.cate_name"]=array("like","%".input("keyword")."%");
       }
        if (input("cate_parent")) {
            $search_a["m.cate_parent"]=array("=",input('cate_parent'));
        }
        $cate_list=$m
            ->alias('m')
            ->where($search_a)
            ->order(" m.cate_id asc ")
            ->paginate(10);

       //      // 测试的时候一定要边界值，为0不传的时候，传的时候很多数据为怎么样

       //  $this->assign('cate_list',$cate_list);
        $this->assign('cate_parent',input("cate_parent"));

        // $cate_list = db('cate')->select();
        $this->assign('cate_list',$cate_list);
        return $this->fetch();
    }

     public function add()
    {
        //明星的数据
        $cate_list = db('cate')->where("cate_parent=0")->select();
        $this->assign('cate_list',$cate_list);
        return $this->fetch();
    }

    public function save()
    {
//        第一步：把表单传过来的数据放到一个数组里
        $save_data=array(
            'cate_name'=>input('cate_name'),
            'description'=>input('description'),
            'cate_parent'=>input('cate_parent'),
        );
//            上传文件
//            如果没有上传文件提示错误
            $file = request()->file('cate_thumb');

           if (!empty($file)){//如果有上传文件
               $info = $file->move(ROOT_PATH .'public'.DS.'uploads');
               if($info ){//判断文件是否上传成功，如果没有文件上传我们也需要保存
//                文件入口
                   $save_data['cate_thumb'] = "/uploads/".$info->getSaveName();

               }else{
                   $this->error($info -> getError());
               }

           }
           //无论是否有上传文件都要保存数据
           db('cate')->insert($save_data);
           if (input('cate_parent')){
            // setInc 对一个字段进行+1
               db('cate')->where("cate_id=".input('cate_parent'))->setInc('menu_num',1);
           }

            $this->success('添加成功！','index');

    }

    public function delete()
    {
        $cate_id = input("cate_id");
        $cate_parent = input("cate_parent");

        db('cate')->delete($cate_id);
        if ($cate_parent){
          // setDec  对一个字段-1
            db('cate')->where("cate_id=".$cate_parent)->setDec('cate_classnum',1);
           //删除子类的商品
        }else{
          //删除所有该分类和子分类分类的和所有商品
        }

        $this->success('删除成功！');


    }

    public function edit()
    {
        $cate_id = input("cate_id");
        $info = db('cate')->where("cate_id=$cate_id")->find();
        $this->assign('info',$info);
        //明星的数据
        $cate_list = db('cate')->select();
        $this->assign('cate_list',$cate_list);

        return $this->fetch();
    }

    public function update()
    {
        $cate_id = input("cate_id");
        $updateData=[
            'cate_name'=>input('cate_name'),
            'description'=>input('description'),
            'cate_parent'=>input('cate_parent'),

        ];

           $file= request()->file("cate_thumb");
            if (!empty($file)){
//                新添加的文件保存起来，保存的时候需传绝对地址

                $info = $file->move(ROOT_PATH .'public'.DS.'uploads');
                if ($info){
//                    入库
                    $updateData['cate_thumb'] = "/uploads/".$info->getSaveName();
                }else{
                    $this->error($info->getError());
                }
            }

           db('cate')->where("cate_id=$cate_id")->update($updateData);
           $this->success('修改成功！','index');
    }
//查看子类
    function subclass(){
      //获取城市
         // 获取生成出来的json文件，把它转为数组
      // system("node ../nodeJS/fetchCity ".'https://search.damai.cn/search.html?ctl=%E6%BC%94%E5%94%B1%E4%BC%9A&cty=%E5%B9%BF%E5%B7%9E&order=1');
      $city_json=file_get_contents("city.json");
      $city_list=json_decode($city_json,true);
      // print_r($city_list);exit();
      $this->assign('city_list',$city_list);
      $where=[];
      if(input('cate_id')){ //搜索

      }
      //获取父分类
      $parent_name=input('parent_name');
      // echo $parent_name;exit();
      $this->assign('parent_name',$parent_name);
      //获取子分类
      $cate_parent=input('cate_parent');
      $this->assign('cate_parent',$cate_parent);
      // echo $cate_parent;
      $classList=db('cate')->where("cate_parent=$cate_parent")->select();
       // print_r($classList);exit();
      $this->assign('classList',$classList);
      return $this->fetch();
    }
//采集商品
     function collectgoods(){
      $cate_parent=input('cate_parent');//获取父分类id
      $parent_name=input('parent_name');//获取父分类名
      // echo $parent_name;
      $city=input('city');//获取城市名
      // echo $city;
      $cate_id=input('cate_id');//获取分类名,可以为空
      $cate_name=input('cate_name');//获取分类名,可以为空
      // echo $cate_name;exit();
      //system函数,可以执行命令行
     //大麦网是post请求，在nodejs传参数，中文需要转成gbk(因为命令行是gbk编码)，得到数据图片是拼接出来的
        system("node ../nodeJS/fetchGoods ".'https://search.damai.cn/searchajax.html '. iconv('utf-8', 'gbk', $parent_name) .' '. iconv('utf-8', 'gbk', $cate_name).' ' . iconv('utf-8', 'gbk', $city));
           // 获取生成出来的json文件，把它转为数组
         $goods_json=file_get_contents("goods.json");
         $goods_list=json_decode($goods_json,true);//是把json转换成对象，必须要给第二个参数赋值true，才会是数组
         // print_r($goods_list);echo count($goods_list);exit();
         //遍历入库
         // print_r($goods_list['pageData']['resultData']);exit();
         $resultData=$goods_list['pageData']['resultData'];
         foreach ($resultData as $key => $value) {
          $goods_title=$value['singlechar'][0];
          $goods_pic='https://pimg.damai.cn/perform/project/'.$value['imgurl'].'/'.$value['projectid'].'_n.jpg';
          $goods_price=$value['pricestr'];
          $show_time=$value['showtime'];
          $venue=$value['venue'];
          $goods_status=$value['showstatus'];
          $goods_brief=$value['description'];
          $cate_id=$cate_id;
          $cate_parent=$cate_parent;
          //分割字符串成数组
          $location=explode(' ', $value['location']);

          $longitude=$location[0];
          $langitude=$location[1];
          $city=$value['venuecity'];
          $first_showtime=$value['firststarttime'];

           db('goods')->insert([
              'goods_title'=>$goods_title,
              'goods_pic'=>$goods_pic,
              'goods_price'=>$goods_price,
              'show_time'=>$show_time,
              'venue'=>$venue,
              'goods_status'=>$goods_status,
              'goods_brief'=>$goods_brief,
              'cate_id'=>$cate_id,
              'cate_parent'=>$cate_parent,
              'longitude'=>$longitude,
              'langitude'=>$langitude,
              'city'=>$city,
              'first_showtime'=>$first_showtime
            ]);
         }
          $this->success('采集成功！','subclass');
      
    }
//采集子分类
    function collectsubclass(){
      $flag=false;
      $cate_id=input('cate_id');
      // echo $cate_id;exit();
      $cateData=db('cate')->where("cate_id=$cate_id")->find();
       // print_r($cateData);exit();
      $cate_href=$cateData['cate_href'];
  //     file_get_contents(ROOT_PATH."/nodeJS/fetchSubClass.js");
  // exit();
      if( $cate_href){
       //把采集地址拿到,给system函数,可以执行命令行
        system("node ../nodeJS/fetchSubClass ".$cate_href);
           // 获取生成出来的json文件，把它转为数组
         $subClass_json=file_get_contents("subClass.json");
         $subClass_list=json_decode($subClass_json,true);//是把json转换成对象，必须要给第二个参数赋值true，才会是数组
         // print_r($subClass_list);echo count($subClass_list);exit();
         db('cate')->where("cate_id=$cate_id")->update(['cate_classnum'=>count($subClass_list)]);
         //遍历入库
         foreach ($subClass_list as $key => $value) {
              // $cateList=db(cate)->where("cate_parent=$cate_id")->select();
              // foreach ($cateList as $key => $value) {
              //   if($value['cate_name']==$value){
              //     break;
              //   }else{
              //     $flag=true;
              //   }
              // }
              // if($flag){

              // }
           db('cate')->insert([
              'cate_name'=>$value,
              'cate_parent'=>$cate_id,
            ]);
         }
          $this->success('采集成功！','subclass');
      }else{
        $this->error('采集失败！','index');
      }
      
    }
    //推荐操作
    public function recommed()
    {
      $cate_id_a=$_GET['cate_ids'];
      if (!empty($cate_id_a)) {
          foreach ($cate_id_a as $key => $value) {
              db('cate')->where("cate_id=$value")->update(['position'=>input('position')]);
          }
          $this->success('推荐成功！','index');
      }
    }
}
