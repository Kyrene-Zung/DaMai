// 获取商品数据
//1. npm install superagent &&  npm install cheerio
//2.引入模块
var superagent=require("superagent");
var cheerio=require("cheerio");
var fs=require("fs");
var dataArr=[];//保存数据的数组
var cityArr=[];
var subClassArr=[];
var params=process.argv.splice(2);//保存传过来的参数
var url=params[0];//采集数据的url
if(params.length==0){
	console.log("请传参数！")
}else{
	//3.使用superagent对象调用post方法，传入url地址，通过end方法接受返回过来的数据
	superagent.post(url).end(function(error,rtnData){
		console.log(rtnData.text);//得到html
		//4.通过cheerio模块解析
		var $=cheerio.load(rtnData.text);//加载html源代码，放在一个变量，为了适应JQ，把变量名直接命名为$
		//$是整个html 找盒子 遍历
		//获取城市
		$('.search_city_all li').each(function(index,ele){
			var city=$(ele).find('a').text();
			cityArr.push(city);
		})
		//获取该分类的商品
		// $('.search_city_all li').each(function(index,ele){
		// 			var goods_title=$(ele).find();
		// 			var goods_title=;
		// 			var goods_price=;
		// 			var goods_status=;
		// 			var show_time=;
		// 			var goods_venue=;
		// 			var goods_city=;

		// 			dataArr.push({
		// 				goods_title,
		// 				goods_title,
		// 				...
		// 			})
		// 	   })
		//5.保存json文件
		console.log(cityArr)
		fs.writeFile('city.json',JSON.stringify(cityArr));
		// fs.writeFile('goods.json',JSON.stringfy(dataArr));

		//根据当前获取的url获取其他数据
		// function funName(num){
		// 	require.post(url2).end(function(error,rtnData){
		// 		var $=cheerio.load(rtnData.text);

		// 		dataArr[num]['name']=;
		// 		//5.保存json文件
		// 		//写入文件 异步的 参数：文件名（没有目录，当前文件根目录）；写入文件的数据（string或buffer流）
		// 		if(num+1==dataArr.length){
		// 			fs.writeFile('goods.json',JSON.stringfy(dataArr));//将数组变成字符串，给php用，要用json文件
		// 		}else{
		// 			num++;
		// 			funName(num);
		// 		}
		// 	})
		// }
	})
}