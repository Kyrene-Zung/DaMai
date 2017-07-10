<template>
 <transition name="bodyIn">
  <div class="drama">
    <!-- 轮播 -->
    <carousel :carousel="lb_photo"></carousel>

    <!-- 精彩专题 -->
    <section>
      <div class="container">
        <div class="special">
          <h4>精&nbsp;彩&nbsp;专&nbsp;题</h4>
          <ul>
            <li v-for="special in special"><img :src="special" alt=""></li>
          </ul>
        </div>
      </div>
    </section>

  <!-- 热门剧评 -->
  <section>
    <div class="container">
      <div class="comment">
        <h4>热&nbsp;门&nbsp;剧&nbsp;评</h4>
        <ul>
          <li class="mui-row" v-for="comment in comment">
            <div class="left mui-col-xs-0.5">
              <img :src="comment.y_top" alt="">
            </div>
            <div class="center mui-col-xs-6">
            
              <p class="first">
              {{comment.main}}
              <img :src="comment.y_bottom" alt="">
              </p>
              <p class="two"><span>——</span>{{comment.writer}}</p>
            </div>
            
            <div class="right mui-col-xs-5" >
              <img :src="comment.photo" alt="">
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- 名导名团 -->
  <section>
    <div class="container">
      <div class="director">
        <h4>名&nbsp;导&nbsp;名&nbsp;团</h4>
        <ul>
          <li v-for="director in director"><img :src="director" alt=""></li>
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

export default {
  name: 'drama',
  data () {
    return {
      lb_photo:[
      '../../../static/images/recommend/banner-1.jpg',
      '../../../static/images/recommend/1.jpg',
      '../../../static/images/recommend/banner-2.jpg',
      '../../../static/images/recommend/2.jpg'],
      special:[
      '../../../static/images/recommend/DR1_02.png',
      '../../../static/images/recommend/DR1_04.png'],
      comment:[
      {
        y_top:'../../../static/images/recommend/DR1_03.png',
        y_bottom:'../../../static/images/recommend/DR1_07.png',
        main:'黄湘丽的舞台之魂，在这部独角戏里表现得很出色。我爱你，就算你忘了...',
        writer:'收羽',
        photo:'../../../static/images/recommend/DR1_08.png'
      },
      {
        y_top:'../../../static/images/recommend//DR1_03.png',
        y_bottom:'../../../static/images/recommend/DR1_07.png',
        main:'黄湘丽的舞台之魂，在这部独角戏里表现得很出色。我爱你，就算你忘了...',
        writer:'收羽',
        photo:'../../../static/images/recommend/DR1_11.png'
      },
      {
        y_top:'../../../static/images/recommend/DR1_03.png',
        y_bottom:'../../../static/images/recommend/DR1_07.png',
        main:'黄湘丽的舞台之魂，在这部独角戏里表现得很出色。我爱你，就算你忘了...',
        writer:'收羽',
        photo:'../../../static/images/recommend/DR1_13.png'
      }],
      director:[
      '../../../static/images/recommend/DR2_02.png',
      '../../../static/images/recommend/DR2_04.png',
      '../../../static/images/recommend/DR2_06.png',
      '../../../static/images/recommend/DR2_08.png',],

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
    carousel,tab,list
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style type="text/css" scoped>
/*公共样式*/
h1, h2 {font-weight: normal;}
h4{font-size: 0.9rem;margin-left:0.5rem;padding-top:1rem;font-weight: bolder;text-align: center;margin-bottom: 1rem;}
ul {list-style-type: none;padding: 0;}
li {display: inline-block;margin: 0;}
a {color: #42b983;}
.drama{background-color:#f1f5f4;}
section{background: #fff;margin-top:0.4rem;}

/*精彩专题*/
.special ul li{width: 50%;margin-bottom:0.15rem;}
.special ul li+li{text-align: right;}
.special ul li img{width: 98.5%;}

/*热门剧评*/
.comment{padding-bottom: 0.2rem;}
.comment ul{margin:0rem 0.3rem;}
.comment ul li{border-bottom: 1px solid #ccc;border-top:1px solid #ccc;padding-top:0.3rem;}
.comment ul li .left{margin-top:0.3rem;}
.comment ul li .center{margin-top:0.3rem;}
.comment ul li .center p{font-size:0.55rem;line-height:1rem;}
.comment ul li .center .two{text-align: right;margin-top:-0.5rem;}
.comment ul li .center p span{color:#df0c30;}
.comment ul li .right {margin-left:0.7rem;}

/*名导名团*/
.director ul li{width: 25%;}
.director ul li+li img{border-left:1px solid #ccc;}


</style>
