<template>
  <div class="home">
    <!-- 轮播 -->
    <carousel :carousel="lb_photo" style="padding-top:0;sss"></carousel>

    <!-- 主菜单 -->
    <div class="list">
      <div class="container">
        <div class="m_menu">
          <ul >
            <li v-for="menu in menu_photo">
            <router-link :to="{path:menu.link,query:{cate_id:menu.cate_id}}">
              <img :src="menu.photo">
              <h5>{{menu.name}}</h5>
            </router-link>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- 大麦头条 -->
    <section >
      <div class="container">
        <div class="news">
          <h4>大麦头条&nbsp;&nbsp;<span>|</span>&nbsp;&nbsp;</h4>
          <div class="content"  id="textCrousel">
            <h6><span>{{news[0]}}</span></h6>
             <h6><span>{{news[0]}}</span></h6>
          </div>
          <i class="fa fa-angle-right" aria-hidden="true"></i>
        </div>
      </div>
    </section>

    <!-- 广告 -->
    <section>
      <div class="container">
        <div class="adv">
          <img :src="adv_photo">
        </div>
      </div>
    </section>

    <!-- 最推荐 -->
    <section>
      <div class="container">
        <div class="m_rec">
          <h4>最推荐</h4>
          <ul>
            <li v-for="recommend in m_rec">
              <h5 >{{recommend.title}}</h5>
              <router-link :to="recommend.link">
              <img :src="recommend.photo">
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- 小编推介 -->
    <section>
      <div class="container">
        <div class="editorRecommend">
          <h4>小编推介</h4>
          <ul>

            <li v-for="g_select in editorRecommend">
            <router-link :to="g_select.link">
              <img :src="g_select.photo">
              <div class="content">
                <div class="left">
                  <h5>{{g_select.b_title}}</h5>
                  <h6>{{g_select.s_title}}</h6>
                </div>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
              </div>
              </router-link>
            </li>
            
          </ul>
        </div>
      </div>
    </section>
    
    
    <!-- 热门推荐 -->
    <section style="margin-bottom:3rem;">
      <div class="container">
        <div class="hotRecommend">
          <h4>热门推荐</h4>
          <slide :slide="hotRecommend"></slide> <!-- 滑动菜单组件 -->

        </div>
      </div>
    </section>

    <!-- 猜你喜欢 -->
    <!-- <section>
      <div class="container">
        <div class="guess_like">
          <h4>猜你喜欢</h4>
          <list :list="guessLike"></list> 
        </div>
      </div>
    </section> -->
 

  </div>
</template>

<script type="es6">
import Vue from 'vue'
import {mapState,mapMutations} from 'vuex'
import slide from '../../components/home/slide'
import list from '../../components/home/list'
import carousel from '../../components/home/carousel'
import {apiUrl} from '../../service/config.js' 

export default {
  name: 'hello',
  data () {
    return {
      lb_photo:
      ['../../../static/images/recommend/banner-1.jpg',
       '../../../static/images/recommend/banner-2.jpg',
       '../../../static/images/recommend/1.jpg',
       '../../../static/images/recommend/2.jpg'],
      menu_photo:
        [{
          photo:'../../static/images/recommend/l1.png',
          name:'演唱会',
          link:'/singing',
          cate_id:1
        },
        {
          photo:'../../static/images/recommend/l2.png',
          name:'音乐会',
          link:'/concert',
          cate_id:2
        },
        {
          photo:'../../static/images/recommend/l3.png',
          name:'戏剧',
          link:'/drama',
          cate_id:3
        },
        {
          photo:'../../static/images/recommend/l4.png',
          name:'体育',
          link:'/sport',
          cate_id:6
        },
        {
          photo:'../../static/images/recommend/l5.png',
          name:'亲子',
          link:'/parenting',
          cate_id:8
        },
        {
          photo:'../../static/images/recommend/l6.png',
          name:'曲苑杂坛',
          link:'/q_yuan',
          cate_id:5
        },
        {
          photo:'../../static/images/recommend/l7.png',
          name:'舞蹈芭蕾',
          link:'/dance',
          cate_id:4
        },
        {
          photo:'../../static/images/recommend/l8.png',
          name:'电影',
          link:'/movie',
          cate_id:9
        }
        ],
        news:[
        '高考后的第一周你应该这么玩'],
        adv_photo:'../../static/images/recommend/adv.png',
        m_rec:[
        {
          title:'麦力荐',
          photo:'../../static/images/recommend/m1.png',
          link:'/m_recommend',
        },
        {
          title:'抢折扣',
          photo:'../../static/images/recommend/m2.png',
          link:'/m_recommend'
        }],
        editorRecommend:[
        {
          link:'/edt_recommend',
          photo:'../../static/images/recommend/a1.png',
          b_title:'最新推荐',
          s_title:'新鲜演出不错过'
        },
        {
          link:'/edt_recommend',
          photo:'../../static/images/recommend/a2.png',
          b_title:'夏至已至',
          s_title:'精选仲夏好去处'
        }],
        hotRecommend:[
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
        },
        {
          photo:'../../static/images/recommend/q2.jpg',
          title:'林子祥40周年世界巡回演唱会广州站',
          time:'2017.07.29'
        },
        {
          photo:'../../static/images/recommend/h5.jpg',
          title:'林子祥40周年世界巡回演唱会广州站',
          time:'2017.07.29'
        },
        {
          photo:'../../static/images/recommend/q2.jpg',
          title:'林子祥40周年世界巡回演唱会广州站',
          time:'2017.07.29'
        },
        {
          photo:'../../static/images/recommend/q2.jpg',
          title:'林子祥40周年世界巡回演唱会广州站',
          time:'2017.07.29'
        },
        {
          photo:'../../static/images/recommend/q2.jpg',
          title:'林子祥40周年世界巡回演唱会广州站',
          time:'2017.07.29'
        }
        ],
        like:[
        {goods_pic:'../../static/images/recommend/rg1.jpg',
         title:'黎明Leon Random Run 2017演唱会（广州站）',
          time:'时间：2017.08.11-2017.08.12',
          address:'场馆：广州国际体育演艺中心',
          state:'售票中',
          price:'280-1680元'},
          {goods_pic:'../../static/images/recommend/rg1.jpg',
         title:'黎明Leon Random Run 2017演唱会（广州站）',
          time:'时间：2017.08.11-2017.08.12',
          address:'场馆：广州国际体育演艺中心',
          state:'售票中',
          price:'280-1680元'},
          {goods_pic:'../../static/images/recommend/rg1.jpg',
         title:'黎明Leon Random Run 2017演唱会（广州站）',
          time:'时间：2017.08.11-2017.08.12',
          address:'场馆：广州国际体育演艺中心',
          state:'售票中',
          price:'280-1680元'},
          {goods_pic:'../../static/images/recommend/rg1.jpg',
         title:'黎明Leon Random Run 2017演唱会（广州站）',
          time:'时间：2017.08.11-2017.08.12',
          address:'场馆：广州国际体育演艺中心',
          state:'售票中',
          price:'280-1680元'}]
    }
  },
  computed:{
    // ...mapState(['editorRecommend','hotRecommend','guessLike'])
        ...mapState(['guessLike'])
  },
  mounted(){
    $(window).scrollTop(0);
  },
  created(){
    this.setSelected('tab1')
    //小编推荐
    // if(this.editorRecommend ==''){
    //   Vue.http.jsonp('/api/mobile/Goods',{params:{type:'editor'}}).then(rtn=>{
    //     this.setEditorRecommend(rtn.data);
    //   })
    // }
    //热门推荐
    // if(this.hotRecommend==''){
    //   Vue.http.jsonp('/api/mobile/Goods',{params:{type:'hot'}}).then(rtn=>{
    //     console.log(rtn.data)
    //     this.setHotRecommend(rtn.data);
    //   })
    // }
    //猜你喜欢
    // if(this.guessLike==''){
    //   Vue.http.jsonp(apiUrl+'/mobile/Goods',{params:{type:'guess'}}).then(rtn=>{
    //      // console.log(rtn.data)
    //     this.setGuessLike(rtn.data);
    //   })
    // }
    //字体轮播
    this.textCrousel();
  },
  beforeRouteEnter(to,from,next){
    next(vm=>{
      //console.log(1111)
    })
  },
  methods:{
    textCrousel(){
      var timer=null;
      timer=setInterval(function(){
        var h6Height= $('#textCrousel h6').css('height');//36px
       // console.log(h6Height)
         $('#textCrousel').animate({top:-36},1200,function(){
            //console.log($('#textCrousel').css('top'))
             if( $('#textCrousel').css('top')=='-'+h6Height){
                 $('#textCrousel').css('top','0');
             }
         });
         
      },2000)
    },
    ...mapMutations(['setEditorRecommend','setHotRecommend','setGuessLike','setSelected'])
  },
  components: {
    slide,list,carousel
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style type="text/css" scoped>
/*公共样式*/
h1, h2 {font-weight: normal;}
h4{font-size: 0.75rem;margin-left:0.5rem;padding-top:1rem;font-weight: normal;}
ul {list-style-type: none;padding: 0;}
li {display: inline-block;margin: 0;}
a {color: #42b983;}
.home{background-color:#f1f5f4;}
section{background: #fff;margin-top:0.4rem;}

/*轮播*/
/*.mint-swipe {height: 8.5rem ;}
.mint-swipe img{width: 100%;}*/

/*主菜单*/
.list{background: #fff;}
.m_menu ul{padding:0.5rem 1rem;}
.m_menu ul li{margin:0;padding:0;width: 25%;text-align:center;margin-bottom: 0.5rem;}
.m_menu ul li img{width: 65%;}

/*大麦头条*/
.container{
  overflow: hidden;

}
.news{height: 2.2rem;   position: relative;}
.news h4{color:red;line-height:1.8rem;margin-left: 0.5rem;float:left;font-weight:bolder;margin-top: -0.8rem;}
.news h4 span{color:black;font-weight: normal;}
.news .content{
  width:11.5rem;
  display: inline-block;
  overflow:hidden;
  position: absolute;
}
.news .content h6{float:left;line-height:1.8rem;width:11.5rem;
    overflow: hidden;
 /*   position: relative;*/
    white-space: nowrap;
    text-overflow: ellipsis;}
    .news .content h6 span{
      position: relative;
    }
.news i{float:right;margin-top:0.6rem;margin-right:0.5rem;color:#dcdcdc;}

/*广告*/
.adv img{width:94%;margin-left:0.5rem;margin-bottom: 0.5rem;}

/*最推荐*/
.m_rec ul{margin:0.5rem;}
.m_rec ul li{width:50%;position: relative;}
.m_rec ul li h5{width: 3.8rem;height: 1.1rem;text-align:center;line-height:1.1rem;background: #f53d02;border-top-right-radius: 25px;border-bottom-right-radius: 25px;color:#fff;position:absolute;}
.m_rec ul li+li h5{background: #9537fa;}
.m_rec img{width:97%;margin-top:0.7rem;margin-bottom: 0.5rem;}

/*小编精选*/
.editorRecommend ul{margin-left:0.5rem;margin-right: 0.3rem;}
.editorRecommend ul li{width:50%;}
.editorRecommend ul li img{width:96%;}
.editorRecommend ul li .content{border: 1px solid #dcdcdc;height: 2.9rem;width: 8.2rem;margin-top:-0.19rem;margin-bottom:0.4rem;}
.editorRecommend ul li .left{float: left;margin-top:0.3rem;margin-left:0.3rem;}
.editorRecommend ul li .left h5{color:orange;font-size:0.7rem;font-weight: normal;}
.editorRecommend ul li i{float:right;margin-top:0.8rem;margin-right:0.4rem;color:orange;}

/*热门推荐*/
.hotRecommend h4{margin-bottom:1rem;}

/*猜你喜欢*/


</style>
