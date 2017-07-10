// 获取商品数据
//1. npm install superagent &&  npm install cheerio
//2.引入模块
var superagent=require("superagent");
var cheerio=require("cheerio");
var fs=require("fs");
var iconv = require('iconv-lite');
var encoding = require('encoding');
// var Buffer = require('buffer');
var dataArr=[];//保存数据的数组
var params=process.argv.splice(2);//保存传过来的参数
var url=params[0];//采集数据的url
// console.log(params);
var parent_name=params[1];
var city=params[2];
// var parent_name=new Buffer('姘戞棌').toString("gbk");
// console.log(parent_name);
// var child_name=new Buffer(params[2]).toString("gbk");
// var city=new Buffer(params[3]).toString("gbk");

// var parent_name=iconv.decode(params[1],"UTF-8");
// var child_name=iconv.decode(params[2],"UTF-8");
// var city=iconv.decode(params[3],"UTF-8");
// var parent_name=encoding.convert(params[1], 'UTF-8', 'gbk');
// console.log(parent_name);
if(params.length==0){
	console.log("请传参数！")
}else{
	// https://search.damai.cn/searchajax.html
// 	cty:广州
// ctl:音乐会
	//3.使用superagent对象调用post方法，传入url地址，通过end方法接受返回过来的数据
	superagent.post(url).set('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8')
	.send({"tn":parent_name,"cty":city})
	.end(function(error,rtnData){
		// var text=JSON.parse(rtnData.text);
		//console.log(text);//得到html
		  // dataArr=JSON.stringify(text.pageData.resultData);
		//4.通过cheerio模块解析
		// var $=cheerio.load(rtnData.text);//加载html源代码，放在一个变量，为了适应JQ，把变量名直接命名为$
		//$是整个html 找盒子 遍历
		// 获取该分类的商品
		// $('#content_list li').each(function(index,ele){
		// 			var goods_title=$(ele).find('a').attr('title');
		// 			var goods_pic=$(ele).find('a').attr('href');
		// 			var city=$(ele).find('.search_txt h3').text();
		// 			var goods_brief=$(ele).find('.search_txt_cut').text();
		// 			var goods_price=$(ele).find('.search_txt_piao em').text();
		// 			var goods_status=$(ele).find('.search_txt_piao').text();
		// 			var show_time=$(ele).find('.search_txt_time').text();
		// 			var goods_venue=$(ele).find('.c1 a').text();

		// 			dataArr.push({
		// 				goods_title,
		// 				goods_pic,
		// 				city,
		// 				goods_brief,
		// 				goods_price,
		// 				goods_status,
		// 				show_time,
		// 				goods_venue
		// 			})
		// 	   })
		//5.保存json文件
		// console.log(dataArr)
		// fs.writeFile('goods.json',JSON.stringify(dataArr));
		fs.writeFile('goods.json',rtnData.text);
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