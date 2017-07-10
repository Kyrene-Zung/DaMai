<template>
<transition name="bodyIn">
  <div class="parenting">
    <!-- 轮播 -->
    <carousel :carousel="lb_photo"></carousel>

    <!-- 轮播下图片 -->
        <ul class="list">
          <li v-for="list in list">
            <img :src="list" alt="">
          </li>
        </ul>

    <!-- 宝宝福利 -->
    <section>
      <div class="container">
        <div class="bb_welfare">
          <h4>宝&nbsp;宝&nbsp;福&nbsp;利</h4>
          <img :src="bb_welfare" alt="">
          <slide :slide="play"></slide>
        </div>
      </div>
    </section>

    <!-- 儿童剧 -->
    <section>
      <div class="container">
        <div class="bb_welfare">
          <h4>儿&nbsp;童&nbsp;剧</h4>
          <img :src="children_drama" alt="">
          <slide :slide="play"></slide>
        </div>
      </div>
    </section>

    <!-- 音乐会 -->
    <section>
      <div class="container">
        <div class="bb_welfare">
          <h4>音&nbsp;乐&nbsp;会</h4>
          <img :src="music" alt="">
          <slide :slide="play"></slide>
        </div>
      </div>
    </section>

    <!-- 主题乐园 -->
    <section>
      <div class="container">
        <div class="bb_welfare">
          <h4>主&nbsp;题&nbsp;乐&nbsp;园</h4>
          <img :src="theme_park" alt="">
          <slide :slide="play"></slide>
        </div>
      </div>
    </section>
    
    <!-- 启蒙益智 -->
    <section>
      <div class="container">
        <div class="bb_welfare">
          <h4>启&nbsp;蒙&nbsp;益&nbsp;智</h4>
          <img :src="puzzle" alt="">
          <slide :slide="play"></slide>
        </div>
      </div>
    </section>
    
    <!-- 品牌专区 -->
    <section>
      <div class="container">
        <div class="brand" >
          <h4>品牌专区</h4>
          <ul>
            <li v-for="brand in brand">
              <img :src="brand" alt="">
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
  name: 'parenting',
  data () {
    return {
      lb_photo:[
      '../../../static/images/recommend/banner-1.jpg',
      '../../../static/images/recommend/1.jpg',
      '../../../static/images/recommend/banner-2.jpg',
      '../../../static/images/recommend/2.jpg'],
      list:[
      '../../../static/images/recommend/pr1_02.png',
      '../../../static/images/recommend/pr1_04.png',
      '../../../static/images/recommend/pr1_06.png',
      '../../../static/images/recommend/pr1_08.png'],
      bb_welfare:'../../../static/images/recommend/pr1_13.png',
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
        children_drama:'../../../static/images/recommend/pr2_02.png',
        music:'../../../static/images/recommend/pr2_04.png',
        theme_park:'../../../static/images/recommend/pr3_02.png',
        puzzle:'../../../static/images/recommend/pr3_04.png',
        brand:[
        '../../../static/images/recommend/pr4_02.png',
        '../../../static/images/recommend/pr4_04.png',
        '../../../static/images/recommend/pr4_06.png',
        '../../../static/images/recommend/pr4_08.png',
        '../../../static/images/recommend/pr4_10.png'],
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
h1, h2 {font-weight: normal;}
h4{font-size: 0.9rem;margin-left:0.5rem;padding-top:1rem;font-weight: bolder;text-align: center;margin-bottom: 1rem;}
ul {list-style-type: none;padding: 0;}
li {display: inline-block;margin: 0;}
a {color: #42b983;}
.parenting{background-color:#f1f5f4;}
section{background: #fff;margin-top:0.4rem;}

/*轮播下图片*/
.list li+li img{border-left:1px solid #ccc;}

/*宝宝福利*/
.bb_welfare img{width:100%;margin-bottom: 0.3rem;}
</style>
