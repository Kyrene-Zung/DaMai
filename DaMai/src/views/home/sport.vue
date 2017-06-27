<template>
  <div class="sport">
    <h1>体育页面</h1>
    <!-- 轮播 -->
    <carousel :carousel="lb_photo"></carousel>

    <!-- 体育头条 -->

        <div class="news mui-row">
          <div class="left mui-col-xs-1.5">
            <img :src="news_logo" alt="">
          </div>
          <div class="center mui-col-xs-9">
            <h6>{{news[0]}}</h6>
            <h6>{{ news[1] }}</h6>
          </div>
          <div class="right mui-col-xs-1.5">
            <i class="fa fa-refresh" aria-hidden="true"></i>
          </div>
        </div>

    <!-- 主菜单 -->
    <section>
      <div class="container">
        <div class="m_menu">
          <ul >
            <li v-for="menu in menu_photo">
            <router-link :to="menu.link">
              <img :src="menu.photo">
              <h5>{{menu.name}}</h5>
            </router-link>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- 广告图 -->
    <section>
      <div class="container">
        <div class="adv mui-row">
          <div class="left mui-col-xs-6">
            <img :src="adv[0]" alt="">
          </div>
          <div class="right mui-col-xs-6">
            <img :src="adv[1]" alt="">
            <img :src="adv[2]" alt="">
          </div>
        </div>
      </div>
    </section>

    <!-- 选项卡 -->
    <section>
      <div class="container">
        <ul class="tab mui-row" id="list">
          <li class="mui-col-xs-3 " >全国</li>
          <li class="mui-col-xs-3 active" >人气最高</li>
          <li class="mui-col-xs-3 " >最新上线</li>
          <li class="mui-col-xs-3 " >比赛时间</li>
        </ul>
        <list :list="like"></list> 
      </div>
    </section>

    <br>
    <br>
    <br>

  </div>
</template>

<script type="es6">
import vue from 'vue'
import { Swipe, SwipeItem, Cell, Toast } from 'mint-ui'
import carousel from '../../components/home/carousel'
import list from '../../components/home/list'

export default {
  name: 'sport',
  data () {
    return {
      lb_photo:[
      '../../../static/images/recommend/banner-1.jpg',
      '../../../static/images/recommend/1.jpg',
      '../../../static/images/recommend/banner-2.jpg',
      '../../../static/images/recommend/2.jpg'],
      news_logo:'../../../static/images/recommend/sp1_03.png',
      news:[
      '光明莫斯利安2017HHI世界街舞锦标赛中国区..',
      '一汽丰田2017切尔西VS阿森纳伦敦超级德比..'],
      menu_photo:
        [{
          photo:'../../static/images/recommend/sp1_07.png',
          name:'足球',
          link:'/singing'
        },
        {
          photo:'../../static/images/recommend/sp1_09.png',
          name:'篮球',
          link:'/concert'
        },
        {
          photo:'../../static/images/recommend/sp1_11.png',
          name:'乒乓球',
          link:'/drama'
        },
        {
          photo:'../../static/images/recommend/sp1_13.png',
          name:'赛车',
          link:'/sport'
        },
        {
          photo:'../../static/images/recommend/sp1_19.png',
          name:'马术',
          link:'/parenting'
        },
        {
          photo:'../../static/images/recommend/sp1_20.png',
          name:'格斗',
          link:'/q_yuan'
        },
        {
          photo:'../../static/images/recommend/sp1_21.png',
          name:'排球',
          link:'/dance'
        },
        {
          photo:'../../static/images/recommend/sp1_23.png',
          name:'电竞',
          link:'/movie'
        }
        ],
        adv:[
        '../../static/images/recommend/sp1_29.png',
        '../../static/images/recommend/sp1_31.png',
        '../../static/images/recommend/sp1_33.png'],
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
    carousel,list
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style type="text/css" scoped>
/*公共样式*/
h1, h2 {font-weight: normal;}
h4{font-size: 0.9rem;font-weight: bolder;text-align: center;}
ul {list-style-type: none;padding: 0;}
li {display: inline-block;margin: 0;}
a {color: #42b983;}
.sport{background-color:#f1f5f4;}
section{background: #fff;margin-top:0.4rem;}

/*体育头条*/
.news{height: 3rem;background: #fff;}
.news .left{border-right:1px solid #ccc;height: 1.7rem;margin-top: 0.6rem;}
.news .left img{margin:0rem 0.5rem;}
.news .center{height: 1.7rem;margin-top: 0.6rem;overflow: hidden;}
.news .center h6{margin:0rem 0.5rem;line-height: 0.9rem;}
.news .right{line-height: 3rem;text-align: center;color:#ccc;}

/*主菜单*/
.list{background: #fff;}
.m_menu ul{padding:0.5rem 1rem;}
.m_menu ul li{margin:0;padding:0;width: 25%;text-align:center;margin-bottom: 0.5rem;}
.m_menu ul li img{width: 40%;}

/*广告图*/
.adv{padding:0.2rem 0;}
.adv .right{text-align: right;}
.adv .right img+img{margin-top:0.1rem;}

/*选项卡*/
.tab {list-style: none;margin:0rem 0.5rem;padding:0 0.5rem;width: 100%;}
.tab li{font-size:0.7rem;text-align:center;color:#ccc;height:2rem;line-height:2rem;}
.tab li.active{color:black;border-bottom:2px solid #000;}

</style>
