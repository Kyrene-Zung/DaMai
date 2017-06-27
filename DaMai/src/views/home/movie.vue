<template>
  <div class="movie">
    <h1>电影页面</h1>
    <!-- 轮播 -->
    <mt-swipe :auto="2000">
      <mt-swipe-item v-for="lunbo in lb_photo">
      <router-link to="/">
        <img :src="lunbo" alt=""> 
      </router-link></mt-swipe-item>
    </mt-swipe>
    
    <!-- 电影列表 -->
    <section v-for="list in list">
      <div class="container">
        <ul class="list">
          <li  class="mui-row">
            <div class="left mui-col-xs-3">
              <img :src="list.photo" alt="">
            </div>
            <div class="right mui-col-xs-9">
              <h5>{{ list.title }}<span>{{ list.grade }}分</span></h5>
              <h6 class="director">导演：{{ list.director }}</h6>
              <h6 class="actor">演员：{{ list.actor }}</h6>
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
  name: 'movie',
  data () {
    return {
      lb_photo:[
      '../../../static/images/recommend/mv_02.png',
      '../../../static/images/recommend/mv_02.png',
      '../../../static/images/recommend/mv_02.png',
      '../../../static/images/recommend/mv_02.png',
      ],
      list:[
      {photo:'../../../static/images/recommend/mvl.jpg',
      title:'变形金刚5：最后的骑士',
      grade:'8.8',
      director:'迈克尔.贝',
      actor:'马克.沃尔伯格，伊莎贝拉.莫奈，劳拉.哈德克，安东尼.霍普金斯,乔什.杜..'
      },
      {photo:'../../../static/images/recommend/mvl.jpg',
      title:'变形金刚5：最后的骑士',
      grade:'8.8',
      director:'迈克尔.贝',
      actor:'马克.沃尔伯格，伊莎贝拉.莫奈，劳拉.哈德克，安东尼.霍普金斯,乔什.杜..'
      },
      {photo:'../../../static/images/recommend/mvl.jpg',
      title:'变形金刚5：最后的骑士',
      grade:'8.8',
      director:'迈克尔.贝',
      actor:'马克.沃尔伯格，伊莎贝拉.莫奈，劳拉.哈德克，安东尼.霍普金斯,乔什.杜..'
      },
      {photo:'../../../static/images/recommend/mvl.jpg',
      title:'变形金刚5：最后的骑士',
      grade:'8.8',
      director:'迈克尔.贝',
      actor:'马克.沃尔伯格，伊莎贝拉.莫奈，劳拉.哈德克，安东尼.霍普金斯,乔什.杜..'
      },
      {photo:'../../../static/images/recommend/mvl.jpg',
      title:'变形金刚5：最后的骑士',
      grade:'8.8',
      director:'迈克尔.贝',
      actor:'马克.沃尔伯格，伊莎贝拉.莫奈，劳拉.哈德克，安东尼.霍普金斯,乔什.杜..'
      },
      {photo:'../../../static/images/recommend/mvl.jpg',
      title:'变形金刚5：最后的骑士',
      grade:'8.8',
      director:'迈克尔.贝',
      actor:'马克.沃尔伯格，伊莎贝拉.莫奈，劳拉.哈德克，安东尼.霍普金斯,乔什.杜..'
      },
      {photo:'../../../static/images/recommend/mvl.jpg',
      title:'变形金刚5：最后的骑士',
      grade:'8.8',
      director:'迈克尔.贝',
      actor:'马克.沃尔伯格，伊莎贝拉.莫奈，劳拉.哈德克，安东尼.霍普金斯,乔什.杜..'
      },
      ]
    }
  },
  components:{
    
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
.movie{background-color:#f1f5f4;}
section{background: #fff;margin-top:0.4rem;}

/*轮播*/
.mint-swipe {height: 5rem ;}
.mint-swipe img{width: 100%;}

/*电影列表*/
.list li{margin:0.3rem;margin-bottom: 0.1rem;}
.list li .left img{width: 100%;}
.list li .right{padding-left: 0.5rem;}
.list li .right h5{font-size:0.7rem;color:black;position: relative;margin-top:0.7rem;}
.list li .right h5 span{color:#d00040;text-align:right;position: absolute;right:0;}
.list li .right h6{color: black;}
.list li .right .director{margin-top: 1.7rem;}
.list li .right .actor{line-height:0.8rem;margin-top:0.5rem;}
</style>
