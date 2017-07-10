<template>
<transition name="bodyIn">
  <div class="q_yuan">
    <!-- 轮播 -->
    <carousel :carousel="lb_photo"></carousel>

    <!-- 轮播下主菜单 -->
        <ul class="menu">
          <li v-for="menu in menu">
          <router-link :to="menu.link">
            <img :src="menu.photo" alt="">
            <h5>{{menu.name}}</h5>
          </router-link></li>
          </li>
        </ul>


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
                <h5>{{hot_activity.title}}</h5>
                <h6>{{hot_activity.time}}</h6>
              </div>

            </li>
          </ul>
          
        </div>
      </div>
    </section>

    <!-- 德云社 -->
    <section>
      <div class="container">
        <div class="shetuan">
          <h4>德&nbsp;云&nbsp;社</h4>
          <img :src="deyun" alt="">
          <slide :slide="play"></slide>
        </div>
      </div>
    </section>
    
    <!-- 青曲社 -->
    <section>
      <div class="container">
        <div class="shetuan">
          <h4>青&nbsp;曲&nbsp;社</h4>
          <img :src="qingqv" alt="">
          <slide :slide="play"></slide>
        </div>
      </div>
    </section>
    
    <!-- 刘老根大舞台 -->
    <section>
      <div class="container">
        <div class="shetuan">
          <h4>刘&nbsp;老&nbsp;根&nbsp;大&nbsp;舞&nbsp;台</h4>
          <img :src="liulaogen" alt="">
          <slide :slide="play"></slide>
        </div>
      </div>
    </section>
    


    
    <!-- 名人专区 -->
    <section>
      <div class="container">
        <div class="famous" >
          <h4>名人专区</h4>
          <ul>
            <li v-for="famous in famous">
              <img :src="famous" alt="">
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
import vue from 'vue'
import { Swipe, SwipeItem, Cell, Toast } from 'mint-ui'
import carousel from '../../components/home/carousel'
import tab from '../../components/home/tab'
import list from '../../components/home/list'
import slide from '../../components/home/slideSing'

export default {
  name: 'q_yuan',
  data () {
    return {
      lb_photo:[
      '../../../static/images/recommend/banner-1.jpg',
      '../../../static/images/recommend/1.jpg',
      '../../../static/images/recommend/banner-2.jpg',
      '../../../static/images/recommend/2.jpg'],
      menu:[
      {photo:'../../../static/images/recommend/qy1_03.png',
      name:'杂技',
      link:'/singing'},
      {photo:'../../../static/images/recommend/qy1_05.png',
      name:'昆曲',
      link:'/singing'},
      {photo:'../../../static/images/recommend/qy1_07.png',
      name:'京剧',
      link:'/singing'},
      {photo:'../../../static/images/recommend/qy1_09.png',
       name:'相声',
       link:'/singing'}
      ],
      hot_activity:[
      {
        city:'沈阳',
        photo:'../../../static/images/recommend/qy1_15.png',
      title:'2017嘉年华小丑嘉年华巡演',
      time:'2017.8.12-13'
      },
      {
        city:'惠州',
        photo:'../../../static/images/recommend/qy1_17.png',
      title:'金星脱口秀',
      time:'2017.8.12-13'
      },
      {
        city:'苏州',
        photo:'../../../static/images/recommend/qy1_20.png',
      title:'郭麒麟相声专场全国巡演',
      time:'2017.8.12-13'
      },
      {
        city:'上海',
        photo:'../../../static/images/recommend/qy1_21.png',
      title:'德云社——岳云鹏相声专场',
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

        deyun:'../../../static/images/recommend/qy2_02.png',

        qingqv:'../../../static/images/recommend/qy2_04.png',

        liulaogen:'../../../static/images/recommend/qy3_02.png',

        famous:[
        '../../../static/images/recommend/qy4_02.png',
        '../../../static/images/recommend/qy4_04.png'],

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
.q_yuan{background-color:#f1f5f4;}
section{background: #fff;margin-top:0.4rem;}

/*主菜单*/
.menu li{width: 25%;height: 3.9rem;background: #fff;text-align: center;padding-top: 0.5rem;}
.menu li h5{color: black;}
.menu li+li {border-left:1px solid #ccc;}

/*热门活动*/
.hot_activity ul li{width: 50%;position: relative;}
.hot_activity ul li .city{font-size:0.6rem;width: 1.7rem;height: 1.1rem;text-align:center;line-height: 1.1rem;background: black;opacity: 0.7;color: #fff;position: absolute;margin-left:0.5rem;}
.hot_activity ul li img{width: 99%;}
.hot_activity ul li:nth-child(2n){text-align: right;}
.hot_activity ul li .content{text-align: center;border: 1px solid #ccc;width:8.9rem;margin-top:-0.2rem;padding-top: 0.5rem;margin-bottom: 0.2rem;}
.hot_activity ul li:nth-child(2n) .content{margin-left:0.1rem;}
.hot_activity ul li .content h5{color: black;font-weight: bold;}

/*社团*/
.shetuan img{margin-bottom: 0.3rem;}
</style>
