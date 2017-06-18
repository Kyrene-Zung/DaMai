<?php
namespace app\admin\controller;

class Goods extends \think\Controller
{
	function index(){
		$searchArr=[];
		if(input('keyword')){
			$searchArr['m.goods_title']=['like','%'.input('keyword').'%'];
		}
		if(input('cate_id')){
			$searchArr['s.cate_id']=['=',input('cate_id')];
		}
		$dm_goodsList=db('dm_goods')
		->alias('g')
		->field('goods_id,goods_title,goods_brief,cate_name')
		->join('dm_cate c','g.cate_id=c.cate_id')
		->where($searchArr)
		->paginate(10);
		//print_r($dm_goodsList);exit();
		//歌手的数据
        $cateList = db('dm_cate')->select();
        $this->assign('cateList',$cateList);
		$this->assign('dm_goodsList',$dm_goodsList);
		return $this->fetch();
	}
	function add(){
		//歌手的数据
        $cateList = db('dm_cate')->select();
        $this->assign('cateList',$cateList);
        return $this->fetch();
	}
	function save(){
		//1.第一步：把表单传过来的数据放到一个数组里
		//echo $_GET['goods_title'];exit();
		$saveData=array(
          'goods_title'=>input('goods_title'),//用框架自带的方法获取表单传过来的数据
          'typeID'=>'',
          'cate_id'=>input('cate_id'),
          'goods_pic'=>'',
          'word'=>input('word'),
          'mp3Src'=>''
        );
        //使用验证规则
        $dm_goods=validate("dm_goods");
        if($dm_goods->check($saveData)){//调用check方法，不合规则返回false

        	//上传文件
        	$file=request()->file('mp3Src');//获取表单传过来的文件
        	$mp3Src='';
        	if(!empty($file)){//上传文件不为空
        		$mp3Src=$file->move(ROOT_PATH .'public'.DS.'uploads');//保存到根目录的public下
	        	if($mp3Src){//判断文件是否上传成功
					//文件入口
	                $saveData['mp3Src'] = DS.'public'.DS.'uploads'.DS.$mp3Src->getSaveName();
	            }else{
	            	$this->error($mp3Src -> getError());
	            }
        	}
        	//2.插入数据库表中
					db('dm_goods')->insert($saveData);
					//跳转页面
					//如果没有传第二个参数（url地址），默认跳回保存之前的界面
					//$this->success('添加成功！',url('dm_goods/index'));
			        $this->success('添加成功！','index');
        	
        }else{
            $this->error($dm_goods->getError());//验证显示错误信息
        }
		
	}//save end
	function delete($id){
		db('dm_goods')->where("dm_goodsID='$id'")->delete();
		$this->success('删除成功！','index');
		// echo  $id;
	}
	function edit($id){
		$dm_goodsList=db('dm_goods')->where("dm_goodsID='$id'")->select();
		$this->assign('dm_goodsList',$dm_goodsList);
		//print_r($dm_goodsList);
		//歌手的数据
        $cateList = db('cate')->select();
        $this->assign('cateList',$cateList);
		return $this->fetch();
		// return view();
	}
	function update(){
		//1.第一步：把表单传过来的数据放到一个数组里
		//echo $_GET['goods_title'];exit();
		$saveData=array(
          'goods_title'=>input('goods_title'),//用框架自带的方法获取表单传过来的数据
          'typeID'=>'',
          'cate_id'=>input('cate_id'),
          'dm_goodsImg'=>'',
          'word'=>input('word')
        );
        //使用验证规则
        $dm_goods=validate("dm_goods");
        if($dm_goods->scene('edit')->check($saveData)){//调用check方法，不合规则返回false

        	//上传文件
        	$file=request()->file('mp3Src');//获取表单传过来的文件
        	if($file){
        		$mp3Src=$file->move(ROOT_PATH .'public'.DS.'uploads');//保存到根目录的public下
	        	if($mp3Src){//判断文件是否上传成功
					//文件入口
	                $saveData['mp3Src'] = DS.'public'.DS.'uploads'.$mp3Src->getSaveName();
	                
	            }else{
	            	$this->error($mp3Src -> getError());
	            }
        	
        	}else{
        		$saveData['mp3Src']=input('mp3Hide');
        	}

        	//2.更新
					db('dm_goods')->where("dm_goodsID",input('id'))->update($saveData);
					//跳转页面
					//如果没有传第二个参数（url地址），默认跳回保存之前的界面
					//$this->success('添加成功！',url('dm_goods/index'));
			        $this->success('修改成功！','index');
        }else{
            $this->error($dm_goods->getError());//验证显示错误信息
        }
		
	}//update end
	function mobiledm_goods(){
		$dm_goodsList=db('dm_goods')->select();
		return jsonp($dm_goodsList);
	}
	function catedm_goods($id){
		//echo $id;
		$dm_goodsList=db('dm_goods')->where("cate_id=$id")->select();
		//print_r($dm_goodsList);exit();
		return jsonp($dm_goodsList);
	}
}