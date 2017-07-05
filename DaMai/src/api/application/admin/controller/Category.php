<?php
namespace app\admin\controller;

class Category extends \think\Controller
{
    public function index()
    {

//    	查询，实例化音乐模型
//        数据库的优化方法，第一个：需要哪些字段就只查询哪些字段
       $m=db('category');
       $search_a=["m.parent_id"=>0];
       if (input("keyword")) {
          $search_a["m.cate_name"]=array("like","%".input("keyword")."%");
       }
        if (input("parent_id")) {
            $search_a["m.parent_id"]=array("=",input('parent_id'));
        }
        $cate_list=$m
            ->alias('m')
            ->where($search_a)
            ->order(" m.id asc ")
            ->paginate(10);

            // 测试的时候一定要边界值，为0不传的时候，传的时候很多数据为怎么样

        $this->assign('cate_list',$cate_list);
        $this->assign('parent_id',input("parent_id"));

        $category_list = db('category')->select();
        $this->assign('category_list',$category_list);
       return $this->fetch();
    }

     public function add()
    {
        //明星的数据
        $category_list = db('category')->where("parent_id=0")->select();
        $this->assign('category_list',$category_list);
        return $this->fetch();
    }

    public function save()
    {
//        第一步：把表单传过来的数据放到一个数组里
        $save_data=array(
            'cate_name'=>input('cate_name'),
            'description'=>input('description'),
            'parent_id'=>input('parent_id'),
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
           db('category')->insert($save_data);
           if (input('parent_id')){
            // setInc 对一个字段进行+1
               db('category')->where("id=".input('parent_id'))->setInc('menu_num',1);
           }

            $this->success('添加成功！','index');

    }

    public function delete()
    {
        $id = input("id");
        $pid = input("pid");

        db('category')->delete($id);
        if ($pid){
          // setDec  对一个字段-1
            db('category')->where("id=".$pid)->setDec('menu_num',1);
        }

        $this->success('删除成功！');


    }

    public function edit()
    {
        $id = input("id");
        $info = db('category')->where("id=$id")->find();
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
            'cate_name'=>input('cate_name'),
            'description'=>input('description'),
            'parent_id'=>input('parent_id'),

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

           db('category')->where("id=$id")->update($updateData);
           $this->success('修改成功！','index');
      



    }
    //推荐操作
    public function recommed()
    {
      $id_a=$_GET['ids'];
      if (!empty($id_a)) {
          foreach ($id_a as $key => $value) {
              db('category')->where("id=$value")->update(['position'=>input('position')]);
          }
          $this->success('推荐成功！','index');
      }
    }
}
