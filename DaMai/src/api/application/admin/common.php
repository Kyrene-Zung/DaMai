<?php
	
	/**
	 * 保存图片
	 * @param  object $request   请求对象
	 * @param  strinng $file_name 上传的文件名称
	 * @return array            保存的路径
	 */
	function savePic($request,$file_name)
	{
		 $file = $request->file($file_name);

           if (!empty($file)){//如果有上传文件
               $info = $file->move(ROOT_PATH .'public'.DS.'uploads');
               if($info ){//判断文件是否上传成功，如果没有文件上传我们也需要保存
//                文件入口
                   return  "/uploads/".$info->getSaveName();

               }else{
                   $this->error($info -> getError());
               }

           }
           return '';
	}

	

?>