<template>
  <div> 
      <div id="slideMenu2">
          <mt-navbar v-model="active" >
            <mt-tab-item :id="0">全部分类</mt-tab-item>
            <mt-tab-item :id="cate.cate_id" v-for="(cate,index) in CateList">{{cate.cate_name}}</mt-tab-item>
          </mt-navbar>

          <mt-tab-container v-model="active" swipeable>
              <mt-tab-container-item :id="0" > <!-- 全部分类 -->
                <div class="cateList">
                  <ul>
                   <li v-if="!goodsList.length">暂无数据</li> 
                   <li v-for="goods in goodsList"  @click="ticketDetail(goods)">
                    <div class="listUp">
                      <img :src="goods.goods_pic">
                      <div class="description">
                        <h3>{{goods.goods_title}}</h3>
                        <p>时间：{{goods.show_time}}</p>
                        <p>场馆：{{goods.venue}}</p>
                        <span class="onSale">售票中</span>
                        <span class="price"><strong>{{goods.goods_price}}</strong> 元</span>
                      </div>
                    </div>
                    <p class="listDown">{{goods.goods_brief}}</p>
                   </li>
                  </ul>

                </div>
              </mt-tab-container-item>
            <!-- 其他分类 -->
            <mt-tab-container-item :id="cate.cate_id" v-for="(cate,index) in CateList">
              <div class="cateList">
                <ul>
                 <li v-if="!goodsList.length">暂无数据</li>
                 <li v-for="goods in goodsList" v-if="goodsList.length">
                  <div class="listUp">
                    <img :src="goods.goods_pic" @click="ticketDetail(goods)">
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
              </div>
            </mt-tab-container-item>
          </mt-tab-container>
      </div>
  </div>

</template>

<script type="es6">
import Vue from 'vue'
import { mapState,mapMutations} from 'vuex'
import { Swipe, SwipeItem, Cell,Toast} from 'mint-ui'
import {apiUrl} from '../../service/config.js' 

export default{
  data(){
    return {
      CateList:null,
      active:0,
      page:0,
      flag:true
    }
  },
  updated(){
      this.init();
  },
  computed:{
    ...mapState(['searchCriteria','goodsList'])
  },
  created(){
      this.setHeadTitle('分类')
      this.setSelected('tab2')
      //获取分类表的内容
      Vue.http.jsonp('/api/mobile/cate').then(rtn =>{ 
        this.CateList=rtn.data
      });
      //已进入页面获取商品的内容
      Vue.http.jsonp('/api/mobile/Goods/search',{params:this.searchCriteria}).then(rtn =>{ 
              // console.log(rtn.data)
              this.setGoodsList(rtn.data)
      });
      //滚动事件加载瀑布流
      $(window).scroll(()=>{
         var scrHeight=$(window).height();
         var scrollHeight=$(document).height();
         var scrollTop=$(document).scrollTop();
         //console.log(scrHeight); 
         if(scrollTop+scrHeight==scrollHeight&& this.flag){
            this.flag=false;
            this.page++;
            var obj=Object.assign({},{page:this.page},this.searchCriteria);
            // console.log(obj);
            Vue.http.jsonp('/api/mobile/Goods/search',{params:obj}).then(rtn =>{ 
                  // console.log(rtn.data)
                  var arr=this.goodsList.concat(rtn.data);
                  this.setGoodsList(arr);
                  this.flag=true;
            });            
         }
      })
    },
    destroyed(){//防止在别的组建内仍运行滚动事件
      this.flag=false;
    },
    watch: {
      active: function (value, oldVal) { // 监听滑动面板事件
        // console.log(value)
          slidePanel(3,value);
         // console.log(this.searchCriteria)
          this.setSearchCriteria({key:'curCate',value:value})
          Vue.http.jsonp('/api/mobile/Goods/search',{params:this.searchCriteria}).then(rtn =>{ 
              //console.log(rtn.data)
             
                this.setGoodsList(rtn.data)
          });
      },
    },
    methods:{
      ticketDetail(goods){ // 进入详情页面
       // console.log(goods);
        this.$router.push({path: '/ticketDetail',query:{goods:goods}})
      },
      init(){
        slideMenu()
      },
      ...mapMutations (['setHeadTitle','setSearchCriteria','setGoodsList','setSelected']), // 映射方法
   },

}
function slidePanel(len,index){
  var slider=document.getElementById('slideMenu2');//父盒子的宽度360px
  var box=slider.querySelector('.mint-navbar');  //选项栏宽度880px
  var aTag=slider.querySelectorAll('.mint-tab-item');//选项个数 10
    //向左滑动的上限：选项栏宽度880px-父盒子的宽度360px
  var limitLeft=aTag[0].offsetWidth*aTag.length/20-slider.offsetWidth/20; 
  if(box.offsetLeft<(2.5-limitLeft)*20 ){
    box.style.left = 2.5-limitLeft+"rem";
  }else if(box.offsetLeft >0){
     box.style.left = 0+'rem';
  }
  else{
   // console.log(box.offsetLeft/20)
     box.style.left = index*-len+'rem';
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
            box.style.left="0rem";
        }else if(box.offsetLeft<(2.5-limitLeft)*20){
            box.style.left=2.5-limitLeft+"rem";
        }
       // console.log(111)

  }

    //touchend事件
  function ToucheEndFunc(e) {
      document.removeEventListener('touchmove',this,false);
      document.removeEventListener('touchend',this,false);
  }
}

</script>
<style lang="scss" scoped>
#slideMenu2{
  overflow:hidden;
  background: #fff;
  .mint-navbar{
    position: fixed;
    background-color: #fff;
    z-index: 20;
    left: 0px;
    width:44rem;
    border-bottom: 1px solid #ccc;
    box-sizing: border-box;
    box-shadow: 0px 1px #f9f9f9;
    margin-top: 2.5rem;
    .mint-tab-item.is-selected{
      color:#cb134a;
      border-bottom: 2px solid #c4123f;
      box-sizing: border-box;
    }
    .mint-tab-item{
      color:#4f4f4f;
      padding:1rem 1rem;
      flex:none;
      display: inline-block;
      .mint-tab-item-label{
          font-size: 0.6rem;
      }
    }
  }
  .mint-tab-container{
    margin-top: 5.75rem;
  }
}
.cateList {
      border-bottom: none;
      padding-top: 0px;
  }
  .cateList li{
    overflow: hidden;
    // height: 9.9rem;
    padding-top:0.5rem;
    border-bottom: 1px solid #ccc;
    width: 16.5rem;
    margin: auto;
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
    line-height: 1rem;
    margin:0;
  }
  .cateList li .description p{
    font-size: 0.6rem;
    color:#a1a1a1;
    margin-bottom: 0.25rem;
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
    text-align: left;
  }

</style>
