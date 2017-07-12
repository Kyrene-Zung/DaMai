<template>
 <transition name="bodyIn">
  <div class="singing">
      <!-- 轮播 -->
      <carousel :carousel="lb_photo"></carousel>

      <!-- 轮播下双榜 -->
      <ul class="hs">
        <li v-for="rank in rank">
          <router-link :to="rank.link">
            <img :src="rank.photo" alt="">
          </router-link>
        </li>
      </ul>

      <!-- 热门演出 -->
      <section>
        <div class="container">
          <div class="hot">
            <h4>热门演出</h4>
            <ul>
              <li v-for="hot in hot">
                <img :src="hot" alt="">
              </li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Live House玩耍指南 -->
      <section>
        <div class="container">
          <div class="play">
            <h4>Live House玩耍指南</h4>
            <img :src="play_title" alt="">
            <slide :slide="play"></slide> <!-- 滑动菜单组件 -->
          </div>
        </div>
      </section>

      <!-- 明星巡演 -->
      <section>
        <div class="container">
          <div class="starTour">
            <h4>明星巡演</h4>
            <ul>
              <li v-for="starTour in starTour"><img :src="starTour" alt=""></li>
            </ul>
          </div>
        </div>
      </section>

      <!-- 选项卡 -->
      <!-- <section>
        <div class="container">
          <div class="tab">
            <tab></tab>
            <list :list="like"></list> 
          </div>
        </div>
      </section> -->
     <!--  <br>
      <br>
      <br>
      <br>
 -->
<div class="tabCate">
        <mt-navbar v-model="selected">
        <mt-tab-item id="hot">人气最高</mt-tab-item>
        <mt-tab-item id="create_time">最新上线</mt-tab-item>
        <mt-tab-item id="show_time">演出时间</mt-tab-item>
      </mt-navbar>

      <!-- tab-container -->
      <mt-tab-container v-model="selected">
        <mt-tab-container-item id="hot">
         <div class="tab"  style="background-color:#fff;">
            <list :list="goodsort"></list> 
          </div>
        </mt-tab-container-item>
        <mt-tab-container-item id="create_time">
          <div class="tab"  style="background-color:#fff;">
            <list :list="goodsort"></list> 
          </div>
        </mt-tab-container-item>
        <mt-tab-container-item id="show_time">
         <div class="tab"  style="background-color:#fff;">
            <list :list="goodsort"></list> 
          </div>
        </mt-tab-container-item>
      </mt-tab-container>

</div>

  </div>
</transition>
</template>

<script type="es6">
  import Vue from 'vue'
  import { Swipe, SwipeItem, Cell, Toast } from 'mint-ui'
  import slide from '../../components/home/slideSing'
  import tab from '../../components/home/tab'
  import list from '../../components/home/list'
  import carousel from '../../components/home/carousel'

  export default {
    name: 'singing',
    data () {
      return {
        selected:'hot',
        cate_id:0,
        lb_photo:[
        '../../../static/images/recommend/banner-1.jpg',
        '../../../static/images/recommend/banner-2.jpg',
        '../../../static/images/recommend/1.jpg',
        '../../../static/images/recommend/2.jpg'],
        rank:[
        {
          photo:'../../../static/images/recommend/y1_02.png',
          link:'/ranking'
        },
        {
          photo:'../../../static/images/recommend/y1_04.png',
          link:'/star'
        }
        ],
        hot:[
        '../../../static/images/recommend/y1_07.png',
        '../../../static/images/recommend/y1_08.png',
        '../../../static/images/recommend/y1_11.png',
        '../../../static/images/recommend/y1_12.png'],
        play_title:'../../../static/images/recommend/y2_02.png',
        play:[
        {
          photo:'../../static/images/recommend/h1.jpg',
          title:'林子祥40周年世界巡回演唱会广州站',
          time:'2017.07.29'
        },
        {
          photo:'../../static/images/recommend/h2.jpg',
          title:'林子祥40周年世界巡回演唱会广州站',
          time:'2017.07.29'
        },
        {
          photo:'../../static/images/recommend/h3.jpg',
          title:'林子祥40周年世界巡回演唱会广州站',
          time:'2017.07.29'
        },
        {
          photo:'../../static/images/recommend/h4.jpg',
          title:'林子祥40周年世界巡回演唱会广州站',
          time:'2017.07.29'
        },
        {
          photo:'../../static/images/recommend/h5.jpg',
          title:'林子祥40周年世界巡回演唱会广州站',
          time:'2017.07.29'
        }],
        starTour:[
        '../../../static/images/recommend/y3_02.png',
        '../../../static/images/recommend/y3_04.png',
        '../../../static/images/recommend/y3_06.png',
        '../../../static/images/recommend/y3_08.png',
        '../../../static/images/recommend/y3_10.png',
        ],
        goodsort:[]
      }
    },
    beforeRouteEnter(to,from,next){
      // console.log(to.query)

      next(vm=>{
        vm.cate_id=to.query.cate_id;
        Vue.http.jsonp('/api/mobile/Goods/goodsort',{params:{cate_id:vm.cate_id,sort:vm.selected}}).
            then(rtn=>{
              // console.log(rtn.data)
              vm.goodsort=rtn.data
            })
      })
    },
    watch:{
      selected:function(newValue,oldValue){
          Vue.http.jsonp('/api/mobile/Goods/goodsort',{params:{cate_id:this.cate_id,sort:newValue}}).
              then(rtn=>{
                //console.log(rtn.data)
                this.goodsort=rtn.data
              })
      }
    },
    components:{
      slide,tab,list,carousel
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  /*公共样式*/
  h4{font-size: 0.9rem;margin-left:0.5rem;padding-top:1rem;font-weight: bolder;text-align: center;margin-bottom: 1rem;}
  ul {list-style-type: none;padding: 0;}
  li {display: inline-block;margin: 0;}
  a {color: #42b983;}
  .singing{background-color:#f1f5f4;}
  section{background: #fff;margin-top:0.4rem;}


  /*轮播下双榜*/
  .singing .hs{margin-top: 0.1rem;width: 100%;}
  .singing .hs li{width: 50%;}
  .singing .hs li+li{text-align: right !important;}
  .singing .hs li img{width: 98.5%;}

  /*热门演出*/
  .hot h4{text-align: center;}
  .hot{font-weight:bolder;}
  .hot ul{margin-top:0.8rem;}
  .hot ul li{width: 50%;}
  .hot ul li img{width: 99%;}
  .hot ul li:nth-child(2n) {text-align:right !important;}

  /*玩耍指南*/
  .play img{width:100%;margin-bottom: 0.4rem;}


  /*明星巡演*/
  .starTour{}
  /*选项卡*/
  .tabCate{
    .mint-tab-item{
      color: #ccc;
    }
    .mint-tab-item.is-selected{
      color:#000;
      border-bottom:3px solid #000;
      margin-bottom: 0px;
    }
  }
</style>
