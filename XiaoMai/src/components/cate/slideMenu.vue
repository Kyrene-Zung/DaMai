<template>
	<div class="box" id="box">
       <ul class="slideNav" id="slider">
        <li class="active" @click="clickSlideMenu(-1)">全部分类</li>
        <li v-for="(cate,index) in CateList" @click="clickSlideMenu(index)">
          <router-link to="cate.cate_id">{{cate.cate_name}}</router-link>
        </li>
        <!-- <li><a href="#">演唱会</a></li>
        <li>音乐会</li>
        <li >话剧歌剧</li>
        <li>舞蹈芭蕾</li>
        <li>曲苑杂坛</li>
        <li>体育比赛</li>
        <li>度假休闲</li>
        <li>儿童亲子</li>
        <li>动漫</li> -->
      </ul>

    </div>
</template>

<script type="es6">
import {clickCate} from '../../service/sendApi.js' //引入请求Api的方法
import {apiUrl} from '../../service/config.js' 
import Vue from 'vue'
export default {
	name: 'slideMenu',
  data(){
    return{
      CateList:null
    }
  },
	created(){
      Vue.http.jsonp('/api/mobile/cate').then(rtn =>{ //获取分类表的内容
        this.CateList=rtn.data
    })

	  	//clickCate(['1','2']); //请求api
    	// clickCate(1);
	},
  updated(){
    this.init();
  },
	methods: {
	   init(){
	     slideMenu()
	     //clickSlideMenu()
	   },
     clickSlideMenu(index){
        var slider=document.getElementById('slider');
        var lis=slider.querySelectorAll('li');
              for (var i = 0; i < lis.length; i++) {
                lis[i].setAttribute('class','');
              }       
              lis[index+1].setAttribute('class','active');
      }
	}
  // props:['cateData']
}

//滑动菜单
function slideMenu(){

  var slider=document.getElementById('slider');
  var box=document.getElementById('box');
  var lis=slider.querySelectorAll('li');
  console.log(lis[0])
  var slideNav=lis[0].offsetWidth*lis.length/20+'rem';
  var limitLeft=lis[0].offsetWidth*lis.length/20-box.offsetWidth/20;//-360
  var startX=0,startY=0;

  slider.addEventListener('touchstart', touchSatrtFunc, false);
  document.addEventListener('touchmove', touchMoveFunc,false);
  document.addEventListener('touchend', ToucheEndFunc,false);


  function touchSatrtFunc(e) {
        //e.preventDefault(); //阻止触摸时浏览器的缩放、滚动条滚动等
        var touch = e.touches[0]; //获取第一个触点
        var x = touch.clientX/20-slider.offsetLeft/20; //页面触点X坐标
        startX = x;

  }
    //touchmove事件
  function touchMoveFunc(e) {
        //e.preventDefault(); //阻止触摸时浏览器的缩放、滚动条滚动等
        var touch = e.touches[0];
        var x = touch.clientX/20 - startX;
        slider.style.left=x+'rem';
        console.log(limitLeft)
        if(slider.offsetLeft>0){
            slider.style.left="0px";
        }else if(slider.offsetLeft<(2.5-limitLeft)*20){
            slider.style.left=2.5-limitLeft+"rem";
        }

  }

    //touchend事件
  function ToucheEndFunc(e) {
      document.removeEventListener('touchmove',this,false);
      document.removeEventListener('touchend',this,false);
  }
}
//点击滑动菜单
// function clickSlideMenu(){
//   var slider=document.getElementById('slider');
//   var lis=slider.querySelectorAll('li');

//   for (var i = 0; i < lis.length; i++) {
//         console.log(lis[i])
//       lis[i].index=i;
//       lis[i].onclick=function(){
//         for (var i = 0; i < lis.length; i++) {
//           lis[i].setAttribute('class','');
//         }       
//         lis[this.index].setAttribute('class','active');
//     }
//   }
// }

</script>

<style type="text/css" scoped>
	.box{width: 100%;position: fixed;background-color: #fff;overflow: hidden;height: 2rem;
  border-bottom: 1px solid #ccc;
  box-sizing: border-box;
  box-shadow: 0px 1px #f9f9f9;
}
#slider{background-color: #fff; position: absolute;left: 0px;width: 44rem;}
#slider li{float: left;font-size: 0.6rem;color: #000;padding:0.5rem 1rem;color:#535353;}
#slider li.active{border-bottom: 2px solid #c4123f;box-sizing: border-box;height: 2rem;color:#cb134a;}
.cateList{
  overflow: hidden;
  width: 16.8rem;
  margin:auto;
  border-bottom: 1px solid #ccc;
  padding-top:2.5rem;
}
#slider li a{
  font-size: 0.6rem;color: #000;
}
</style>
