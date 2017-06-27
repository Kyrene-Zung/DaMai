<template>
  <div class="boxIndex" id="boxIndex">
    <ul class="slideNav" id="slider">
      <li v-for="slide in slide" id="list">
        <img :src="slide.photo">
        <h6 class="title">{{slide.title}}</h6>
        <h6>{{slide.time}}</h6>              
      </li>
    </ul>
  </div>
</template>

<script type="es6">
export default {
  name: 'slide',
  data () {
    return {

    }
  },
  mounted(){
    this.init();
  },
  methods:{
    init(){
      slideMenu()
      clickSlideMenu()
    }
  },
  props:['slide']
}


//滑动菜单

function slideMenu(){
  var box=document.getElementById("boxIndex");
  var slider=document.getElementById('slider');
  var lis=slider.querySelectorAll('li');
  var limitLeft=(lis[0].offsetWidth*lis.length+10*(lis.length+1))/20-box.offsetWidth/20;//监听左移动的距离
  var startX=0,startY=0;

  slider.style.width=lis[0].offsetWidth/20*lis.length+0.5*lis.length+'rem'; //ul 的长度是 li的长度*个数+外边距
  slider.addEventListener('touchstart', touchSatrtFunc, false);
  document.addEventListener('touchmove', touchMoveFunc,false);
  document.addEventListener('touchend', ToucheEndFunc,false);

// 触碰事件
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
        var x = touch.clientX/20 - startX;//移动距离
        slider.style.left=x+'rem';
        console.log(limitLeft)
        if(slider.offsetLeft>0){
            slider.style.left="0px";
        }else if(slider.offsetLeft<(-limitLeft)*20){
            slider.style.left=-limitLeft+"rem";
        }

  }

    //touchend事件
  function ToucheEndFunc(e) {
      document.removeEventListener('touchmove',this,false);
      document.removeEventListener('touchend',this,false);
  }
}
//点击滑动菜单
function clickSlideMenu(){
  var slider=document.getElementById('slider');
  var lis=slider.querySelectorAll('li');
  for (var i = 0; i < lis.length; i++) {
      lis[i].index=i;
      lis[i].onclick=function(){
        for (var i = 0; i < lis.length; i++) {
          lis[i].setAttribute('class');
        }       
        lis[this.index].setAttribute('class');
    }
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style type="text/css" scoped>
#boxIndex{width: 100%;background-color: #fff;position: relative;min-height: 10.5rem;overflow: hidden;}
ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  list-style: none;
}

.slideNav{margin:0rem 0.5rem;/*overflow: hidden;*/position: absolute;left: 0px;width: 26rem;}
.slideNav li{float: left;margin-bottom:0rem;width: 4.5rem;}
.slideNav li+li{margin-left:0.5rem;}
.slideNav li img{width:100%;}
.slideNav li h6{margin:0.5rem 0rem;}
.slideNav li .title{color: black;}
</style>
