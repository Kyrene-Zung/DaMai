<template>
  <div class="concert">
    <h1>音乐会页面</h1>
    <!-- 轮播 -->
    <carousel :carousel="lb_photo"></carousel>

    <section>
      <div class="container">
        <div class="orchestral">
          <h4>管弦乐</h4>
          <img :src="orchestral_title" alt="">
          <slide :slide="orchestral"></slide> <!-- 滑动菜单组件 -->
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="symphony">
          <h4>交响乐</h4>
          <img :src="symphony_title" alt="">
          <slide :slide="symphony"></slide> <!-- 滑动菜单组件 -->
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="piano">
          <h4>钢琴</h4>
          <img :src="piano_title" alt="">
          <slide :slide="piano"></slide> 
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="chorus">
          <h4>合唱团</h4>
          <img :src="chorus_title" alt="">
          <slide :slide="chorus"></slide> 
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="chorus">
          <h4>主题演出</h4>
          <ul>
            <li v-for="theme in theme"><img :src="theme" alt=""> </li>
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
</template>

<script type="es6">
import vue from 'vue'
import { Swipe, SwipeItem, Cell, Toast } from 'mint-ui'
import slide from '../../components/home/slideSing'
import tab from '../../components/home/tab'
import list from '../../components/home/list'
import carousel from '../../components/home/carousel'

export default {
  name: 'concert',
  data () {
    return {
      lb_photo:[
       '../../../static/images/recommend/banner-1.jpg',
       '../../../static/images/recommend/banner-2.jpg',
       '../../../static/images/recommend/1.jpg',
       '../../../static/images/recommend/2.jpg'],


       orchestral_title:'../../../static/images/recommend/S0_02.png',
       orchestral:[
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


        symphony_title:'../../../static/images/recommend/S1_02.png',
        symphony:[
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


        piano_title:'../../../static/images/recommend/S1_04.png',
        piano:[
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


        chorus_title:'../../../static/images/recommend/S2_02.png',
        chorus:[
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

        theme:[
        '../../../static/images/recommend/S2_04.png',
        '../../../static/images/recommend/S3_02.png',
        '../../../static/images/recommend/S3_04.png'],

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
    slide,tab,list,carousel
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
/*公共样式*/
h1, h2 {font-weight: normal;}
h4{font-size: 0.9rem;margin-left:0.5rem;padding-top:1rem;font-weight: bolder;text-align: center;margin-bottom: 1rem;}
ul {list-style-type: none;padding: 0;}
li {display: inline-block;margin: 0;}
a {color: #42b983;}
.concert{background-color:#f1f5f4;}
section{background: #fff;margin-top:0.4rem;}



/*管弦乐*/
</style>
