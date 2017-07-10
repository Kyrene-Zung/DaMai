<template>
  <div>
      <div class="findHeader">
        <div class="findTitle"><span>发现</span></div>
      </div>
      <section style="margin-top:3.5rem;">
        <div class="container">
          <div class="guess_like">
            <h4>猜你喜欢</h4>
            <list :list="guessLike"></list> 
          </div>
        </div>
      </section>
   
    <!--   <div id="slideMenu2">
        <div class="commuity">
          <span>小麦社区</span>
        </div>
        <div class="mui-card">
          <div class="mui-card-header m\mui-card-media">
             <img src="../assets/images/photo.jpg">
          </div>
          <div class="mui-card-content">
           <span>1111</span>
          </div>
          <div class="mui-card-footer">页尾</div>
        </div>


        <ul class="cateList">
          <li v-for="goods in goodsList">
            <div class="listUp">
              <img :src="goods.goods_pic" @click="ticketDetail()">
              <div class="description">
                <h3>{{goods.goods_title}}</h3>
                <p>时间：{{goods.show_time}}</p>
                <p>场馆：{{goods.venue}}</p>
                <span class="onSale">售票中</span>
                <span class="price"><strong>{{goods.goods_price}}</strong> 元</span>
              </div>
            </div>
            <p class="listDown">或别广州数年，今年8月11及12日，天王黎明将会在广州国际体育中心广州国际体育中心广州国际体育中心</p>
          </li>
        </ul>
      </div> -->
  </div>
</template>

<script type="es6">
import Vue from 'vue'
import {mapState,mapMutations} from 'vuex'
import { Swipe, SwipeItem, Cell,Toast} from 'mint-ui'
import {apiUrl} from '../service/config.js'
import list from '../components/home/list'

// import list from '../jsons/list'
Vue.component(Swipe.name, Swipe)
Vue.component(SwipeItem.name, SwipeItem)
export default{
	data(){
		return {
			active:0,
			CateList:null,
      goodsList:[]
		}
	},
  mounted(){
    $(window).scrollTop(0);
  },
	updated(){
	    this.init();
	},
  computed:{
    // ...mapState(['editorRecommend','hotRecommend','guessLike'])
        ...mapState(['guessLike'])
  },
	created(){
		this.setHeadTitle('发现')
    this.setSelected('tab3')
	  //猜你喜欢
    if(this.guessLike==''){
      Vue.http.jsonp('/api/mobile/Goods',{params:{type:'guess'}}).then(rtn=>{
         // console.log(rtn.data)
        this.setGuessLike(rtn.data);
      })
    }
  },
    watch: {
      active: function (value, oldVal) { // 监听滑动面板事件
          // 这里就可以通过 val 的值变更来确定
          console.log(value)
          console.log(oldVal)
          if(value > oldVal){
            slidePanel(3);
              //console.log(3)
          }else if(value<oldVal){
            slidePanel(-3);
              //console.log(-3)
          }

              Vue.http.jsonp(apiUrl+'/mobile/goods',{params:{cate_id:value}}).then(rtn =>{ 
              //console.log(rtn.data)
              this.goodsList=rtn.data
          });
      }
    },
    methods:{
      ...mapMutations (['setHeadTitle','setSelected','setGuessLike']), // 映射方法
      init(){
        slideMenu()
	     //clickSlideMenu()
	   }
   },
   components: {
    list
  }
  // filters:{ 
  //   slideTap(id){
  //     console.log(id);
  //   }
  // }
}
function slidePanel(len){
  var slider=document.getElementById('slideMenu2');//父盒子的宽度360px
  var box=slider.querySelector('.mint-navbar');  //选项栏宽度880px
  var aTag=slider.querySelectorAll('.mint-tab-item');//选项个数 10
    //向左滑动的上限：选项栏宽度880px-父盒子的宽度360px
  var limitLeft=aTag[0].offsetWidth*aTag.length/20-slider.offsetWidth/20; 
  if(box.offsetLeft<(2.5-limitLeft)*20 ){
    box.style.left = 2.5-limitLeft+"rem";
  }else if(box.offsetLeft > 0){
     box.style.left = 0+'rem';
  }
  else{
    //console.log(box.offsetLeft/20)
     box.style.left = box.offsetLeft/20-len+'rem';
    // console.log(box.offsetLeft/20)
  }
}
//滑动菜单
function slideMenu(){

  var slider=document.getElementById('slideMenu2');
  var box=slider.querySelector('.mint-navbar');
  var aTag=slider.querySelectorAll('.mint-tab-item');
  
  // var slideNav=aTag[0].offsetWidth*aTag.length/20+'rem';
  var limitLeft=aTag[0].offsetWidth*aTag.length/20-slider.offsetWidth/20;//-360
  //console.log(aTag[0].offsetWidth*aTag.length/20)
  //console.log(slider.offsetWidth/20)
  //console.log(limitLeft)
  var startX=0,startY=0;

  box.addEventListener('touchstart', touchSatrtFunc, false);
  box.addEventListener('touchmove', touchMoveFunc,false);
  box.addEventListener('touchend', ToucheEndFunc,false);


  function touchSatrtFunc(e) {
        //e.preventDefault(); //阻止触摸时浏览器的缩放、滚动条滚动等
        var touch = e.touches[0]; //获取第一个触点
        var x = touch.clientX/20-box.offsetLeft/20; //页面触点X坐标
        startX = x;

  }
    //touchmove事件
  function touchMoveFunc(e) {
        //e.preventDefault(); //阻止触摸时浏览器的缩放、滚动条滚动等
        var touch = e.touches[0];
        var x = touch.clientX/20 - startX;
        box.style.left=x+'rem';
        //console.log(box.offsetLeft)
        if(box.offsetLeft>0){
            box.style.left="0px";
        }else if(box.offsetLeft<(2.5-limitLeft)*20){
            box.style.left=2.5-limitLeft+"rem";
        }
        //console.log(111)

  }

    //touchend事件
  function ToucheEndFunc(e) {
      document.removeEventListener('touchmove',this,false);
      document.removeEventListener('touchend',this,false);
  }
}

</script>
<style lang="scss" scoped>
.commuity{
  width: 336px;
  margin:auto;
  font-size: 0.7rem;
  padding:0.25rem 0;
}
.findHeader{
  height: 3.5rem;
  position: fixed;
  top: 0;
  width: 100%;
  background-color: #fff;
  .findTitle{
    border-bottom: 1px solid #ccc;
    height: 2.25rem;
    margin-top: 1.25rem;
    text-align: center;
    background-color: #fff;
    font-size:0.75rem;
    line-height: 2.25rem;
  }
}
#slideMenu2{
  background-color: #fff;
  padding-top: 3.5rem;
}
.cateList {
      width:336px;
      margin:auto;
      border-bottom: none;
      padding-top: 0px;
  }
  .cateList li{
    overflow: hidden;
    // height: 9.9rem;
    padding-top:0.5rem;
    border-bottom: 1px solid #ccc;
  }
  .cateList li .listUp{
    overflow: hidden;
  }
  .cateList li img{
    width:5.7rem;
    height:7.7rem;
    float: left;
  }
  .cateList li .description{
    float: right;
    width: 10.2rem;
    text-align: left;
  }
  .cateList li .description h3{
    font-size: 0.65rem;
    color:#363636;
  }
  .cateList li .description p{
    font-size: 0.6rem;
    color:#a1a1a1;
  }
  .cateList li .description span.onSale{
    border:0.1rem solid #e8aaa9;
    border-radius: 0.15rem;
    text-align: center;
    line-height: 0.85rem;
    color:#df4b55;
    font-size: 0.6rem;
    padding: 0.2rem;
  }
  .cateList li .description span.price{
    display: block;
    font-size: 0.75rem;
    color:#e0001b;
    margin-top: 0.85rem;
  }
    p.listDown{
    font-size: 0.6rem;
    color:#a1a1a1;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
  }
.guess_like{
  background-color: #fff;
  h4{
    width: 16.8rem;
    margin:auto;
    font-size: 0.75rem;
    padding: 0.25rem 0;
  }
}

</style>
