<template>
<transition name="bodyIn">
  <div class="dance">
    <!-- 轮播 -->
    <carousel :carousel="lb_photo"></carousel>


    <!-- 热门活动 -->
    <section>
      <div class="container">
        <div class="hot_activity">
          <h4>热&nbsp;门&nbsp;活&nbsp;动</h4>
          <ul>
            <li v-for="hot_activity in hot_activity">
              <div class="city">{{ hot_activity.city }}</div>
              <img :src="hot_activity.photo" alt="">
              <div class="content">
                <h5>{{hot_activity.dancer}}</h5>
                <h5 class="title">{{hot_activity.title}}</h5>
                <h6>{{hot_activity.time}}</h6>
              </div>

            </li>
          </ul>
          
        </div>
      </div>
    </section>

    <!-- 芭蕾舞 -->
    <section>
      <div class="container">
        <div class="cate">
          <h4>芭&nbsp;蕾&nbsp;舞</h4>
          <img :src="ballet" alt="">
          <slide :slide="play"></slide>
        </div>
      </div>
    </section>
    
    <!-- 现代舞 -->
    <section>
      <div class="container">
        <div class="cate">
          <h4>现&nbsp;代&nbsp;舞</h4>
          <img :src="modern" alt="">
          <slide :slide="play"></slide>
        </div>
      </div>
    </section>
    
    <!-- 民族舞 -->
    <section>
      <div class="container">
        <div class="cate">
          <h4>民&nbsp;族&nbsp;舞</h4>
          <img :src="folk" alt="">
          <slide :slide="play"></slide>
        </div>
      </div>
    </section>
    
    <!-- 专场巡演 -->
    <section>
      <div class="container">
        <div class="special_tour" >
          <h4>专场巡演</h4>
          <ul>
            <li v-for="special_tour in special_tour">
              <img :src="special_tour" alt="">
            </li>
          </ul>
          
        </div>
      </div>
    </section>

    <!-- 选项卡 -->
  <section>
    <div class="container">
      <div class="tab">
        <tab></tab>
        <list :list="like"></list> 
      </div>
    </div>
  </section>

    <br>
    <br>
    <br>

  </div>
</transition>
</template>

<script type="es6">
import { Swipe, SwipeItem, Cell, Toast } from 'mint-ui'
import carousel from '../../components/home/carousel'
import tab from '../../components/home/tab'
import list from '../../components/home/list'
import slide from '../../components/home/slideSing'

export default {
  name: 'dance',
  data () {
    return {
      lb_photo:[
      '../../../static/images/recommend/banner-1.jpg',
      '../../../static/images/recommend/1.jpg',
      '../../../static/images/recommend/banner-2.jpg',
      '../../../static/images/recommend/2.jpg'],

      hot_activity:[
      {
        city:'北京',
        photo:'../../../static/images/recommend/dc1_02.png',
        dancer:'北京现代舞团经典演出',
      title:'剧目《三更雨.愿》',
      time:'2017.07.28-2017.07.29'
      },
      {
        city:'北京',
        photo:'../../../static/images/recommend/dc1_04.png',
        dancer:'俄罗斯皇家芭蕾舞团',
      title:'天鹅湖',
      time:'2017.8.12-13'
      },
      {
        city:'西安',
        photo:'../../../static/images/recommend/dc1_07.png',
        dancer:'马林斯基首席领衔',
      title:'芭蕾舞剧《舞姬》',
      time:'2017.8.12-13'
      },
      {
        city:'上海',
        photo:'../../../static/images/recommend/dc1_08.png',
        dancer:'朱洁静舞蹈剧场',
      title:'《红幕》',
      time:'2017.8.12-13'
      }],

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

        ballet:'../../../static/images/recommend/dc1_11.png',

        modern:'../../../static/images/recommend/dc2_02.png',

        folk:'../../../static/images/recommend/dc2_04.png',

        special_tour:[
        '../../../static/images/recommend/dc3_02.png',
        '../../../static/images/recommend/dc3_04.png',
        '../../../static/images/recommend/dc3_06.png'],

        like:[
        {photo:'../../static/images/recommend/rg1.jpg',
         title:'黎明Leon Random Run 2017演唱会（广州站）',
          time:'时间：2017.08.11-2017.08.12',
          address:'场馆：广州国际体育演艺中心',
          state:'售票中',
          price:'280-1680元'},
          {photo:'../../static/images/recommend/rg1.jpg',
         title:'黎明Leon Random Run 2017演唱会（广州站）',
          time:'时间：2017.08.11-2017.08.12',
          address:'场馆：广州国际体育演艺中心',
          state:'售票中',
          price:'280-1680元'},
          {photo:'../../static/images/recommend/rg1.jpg',
         title:'黎明Leon Random Run 2017演唱会（广州站）',
          time:'时间：2017.08.11-2017.08.12',
          address:'场馆：广州国际体育演艺中心',
          state:'售票中',
          price:'280-1680元'},
          {photo:'../../static/images/recommend/rg1.jpg',
         title:'黎明Leon Random Run 2017演唱会（广州站）',
          time:'时间：2017.08.11-2017.08.12',
          address:'场馆：广州国际体育演艺中心',
          state:'售票中',
          price:'280-1680元'}]
    }
  },
  components:{
    carousel,list,slide,tab
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style type="text/css" scoped>
/*公共样式*/
h4{font-size: 0.9rem;margin-left:0.5rem;padding-top:1rem;font-weight: bolder;text-align: center;margin-bottom: 1rem;}
ul {list-style-type: none;padding: 0;}
li {display: inline-block;margin: 0;}
a {color: #42b983;}
.dance{background-color:#f1f5f4;}
section{background: #fff;margin-top:0.4rem;}

/*热门活动*/
.hot_activity ul li{width: 50%;position: relative;}
.hot_activity ul li .city{font-size:0.6rem;width: 1.7rem;height: 1.1rem;text-align:center;line-height: 1.1rem;background: black;opacity: 0.7;color: #fff;position: absolute;margin-left:0.5rem;}
.hot_activity ul li img{width: 99%;}
.hot_activity ul li:nth-child(2n){text-align: right;}
.hot_activity ul li .content{text-align: center;border: 1px solid #ccc;width:8.9rem;margin-top:-0.2rem;padding-top: 0.5rem;margin-bottom: 0.2rem;}
.hot_activity ul li:nth-child(2n) .content{margin-left:0.1rem;}
.hot_activity ul li .content h5{color: black;font-weight: bold;}
.hot_activity ul li .content .title{margin-top: -0.2rem;}

/*社团*/
.cate img{margin-bottom: 0.3rem;}
</style>
