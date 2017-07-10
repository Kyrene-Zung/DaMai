<template>
  <div class="mai_recommend">
    <!-- 头部图片 -->
    <div class="head">
      <div class="photo">
        <router-link to="/">
         <img :src="head" alt=""> 
        </router-link>
      </div>
      
    </div>


    <!-- 评语 -->
    <div class="comment">
      <div class="container">
        <h5>{{cate}}-{{ city }}</h5>
        <h6>{{ content }}</h6>
      </div>
    </div>

    
    <!-- 电影列表 -->
    <section v-for="list in list">
      <div class="container">
        <ul class="list">
          <li>
            <div class="content mui-row">
              <div class="left mui-col-xs-4">
                <img :src="list.photo" alt="">
              </div>
              <div class="right mui-col-xs-8">
                <h5>{{ list.title }}</h5>
                <div class="ticket">
                  <div class="seat">{{ list.seat }}</div>
                  <div class="state">{{ list.state }}</div>
                </div>
                <h6 class="time">{{ list.time }}</h6>
                <h6 class="address">{{ list.address }}</h6>
                <h5 class="price">{{ list.price }}<span>&nbsp;元</span></h5>
              </div>
            </div>
            <br>
            <div class="comment">
              <p>
              <span><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
              {{ list.comment }}
              <span><i class="fa fa-hand-o-left" aria-hidden="true"></i></span>
              </p>
            </div>
          </li>
        </ul>
      </div>
    </section>
    <br>
    <br>
    <br>
  </div>
</template>

<script type="es6">

export default {
  name: 'mai_recommend',
  data () {
    return {
      head:'../../../static/images/recommend/1.jpg',
      cate:'最新推介',
      city:'广州',
      content:'麦麦早鸟计划~为你精选新鲜上架的演出！无论演唱会、体育赛事、音乐会、话剧歌剧或是主题晚会，各种精彩资讯，快人一步！',
      list:[
      {photo:'../../../static/images/recommend/rg1.jpg',
      title:'2017年国际冠军杯中国赛广州站 AC米兰VS多特蒙德',
      seat:'座',
      state:'售票中',
      time:'2017.06.23',
      address:'广州大学城体育中心体育场',
      price:'199-1299',
      comment:'380元票价买2张立减62元；280元票价买3张立减42元。'
      },
      {photo:'../../../static/images/recommend/rg1.jpg',
      title:'从“天空之城”到“起风了”久石让电影30周年交响视听纪..',
      seat:'',
      state:'售票中',
      time:'2017.06.23',
      address:'星海音乐厅（交响乐演奏厅）',
      price:'100-798',
      
      },
      {photo:'../../../static/images/recommend/rg1.jpg',
      title:'从“天空之城”到“起风了”久石让电影30周年交响视听纪..',
      seat:'预售中',
      state:'',
      time:'2017.06.23',
      address:'星海音乐厅（交响乐演奏厅）',
      price:'100-798',
      comment:''
      },

      ]
    }
  },
  components:{
    
  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style type="text/css3" scoped>
/*公共样式*/
h4{font-size: 0.9rem;margin-left:0.5rem;padding-top:1rem;font-weight: bolder;text-align: center;margin-bottom: 1rem;}
ul {list-style-type: none;padding: 0;}
li {display: inline-block;margin: 0;}
a {color: #42b983;}
.mai_recommend{background-color:#f1f5f4;margin-top: 3.5rem;}
section{background: #fff;margin-top:0.4rem;}

/*头部图片*/
.head .photo{position: relative;}
.head .photo img{width: 100%;}



/*评语*/
.comment{background: #fff;margin-top: -0.35rem;padding-bottom: 0.5rem;}
.comment h5{color:black;margin-left: 0.5rem;line-height: 1.5rem;}
.comment h6{margin:-0.2rem 0.5rem;line-height: 0.9rem;}

/*推荐列表*/
.list li{margin:0.5rem;margin-bottom: 0.1rem;}
.list li .content .left img{width: 100%;}
.list li .content .right{padding-left: 0.5rem;}
.list li .content .right h5{font-size:0.75rem;color:black;margin-top:0.1rem;line-height: 0.9rem;}
.list li .content .right .ticket{margin-top: 0.4rem;}
.list li .content .right .ticket .seat{font-size: 0.65rem;background: #30cf16;width: auto;line-height: 0.9rem;text-align: center;color:#fff;border-radius: 5%;float: left;margin-right:0.3rem;padding-left:0.1rem;padding-right:0.1rem;}
.list li .content .right .ticket .state{font-size: 0.65rem;background: orange;width: 2.9rem;line-height: 0.9rem;text-align: center;color:#fff;border-radius: 5%;float: left;}

.list li .content .right h6{color: black;}
.list li .content .right .time{margin-top: 2.5rem;}
.list li .content .right .address{line-height:0.8rem;margin-top:0.4rem;}
.list li .content .right .price{margin-top: 0.5rem;color: #e2104c;}
.list li .content .right .price span{font-size: 0.3rem;}
.list li .comment p{background: #f8f8f8;padding: 0.3rem;}
</style>
