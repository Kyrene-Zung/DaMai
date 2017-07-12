<template>
 <transition name="bodyIn">
  <div class="ranking">

    <ul class="list">
      <li v-for="rank in ranking" class="mui-row">

          <div class="place mui-col-xs-1">
            <img :src="rank.medal" alt="">
            <h4>{{ rank.place }}</h4>
          </div>
          <div class="logo mui-col-xs-2">
            <img :src="rank.logo" alt="">
          </div>
          <div class="content mui-col-xs-7">
            <h5>{{ rank.title }}</h5>
            <h6>{{ rank.slogan }}</h6>
          </div>

      </li>
    </ul>
  </div>
</transition>
</template>

<script type="es6">
import vue from 'vue'


export default {
  name: 'ranking',
  data () {
    return {
   
      ranking:[
      {
        medal:'../../../static/images/recommend/ranking_03.png',
        place:'',
        logo:'../../../static/images/recommend/gujiahui.jpg',
        title:'地表最强 2017周杰伦台州演唱会',
        slogan:'周而复始，上演地表最强'
      },
      {
        medal:'../../../static/images/recommend/ranking_06.png',
        place:'',
        logo:'../../../static/images/recommend/张学友.jpg',
        title:'地表最强 2017周杰伦台州演唱会',
        slogan:'周而复始，上演地表最强'
      },
      {
        medal:'../../../static/images/recommend/ranking_08.png',
        place:'',
        logo:'../../../static/images/recommend/gujiahui.jpg',
        title:'地表最强 2017周杰伦台州演唱会',
        slogan:'周而复始，上演地表最强'
      },
      {
        medal:'',
        place:'4',
        logo:'../../../static/images/recommend/gujiahui.jpg',
        title:'地表最强 2017周杰伦台州演唱会',
        slogan:'周而复始，上演地表最强'
      },
      {
        medal:'',
        place:'5',
        logo:'../../../static/images/recommend/gujiahui.jpg',
        title:'地表最强 2017周杰伦台州演唱会',
        slogan:'周而复始，上演地表最强'
      },
      {
        medal:'',
        place:'6',
        logo:'../../../static/images/recommend/gujiahui.jpg',
        title:'地表最强 2017周杰伦台州演唱会',
        slogan:'周而复始，上演地表最强'
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
ul {list-style-type: none;padding: 0;}
li {display: inline-block;margin: 0;}
a {color: #42b983;}
.singing{background-color:#f1f5f4;}
section{background: #fff;margin-top:0.4rem;}
.ranking{
  margin-top: 3.5rem;
}
/*排行榜列表*/
.list li{border-bottom:1px solid #ccc;height:4.7rem;width: 100%;}
.list li .place{margin-left: 0.5rem;margin-top:0.25rem;}
.list li h4{font-size: 1rem;margin-left:0.5rem;padding-top:1.4rem;font-weight: bolder;text-align: center;margin-bottom: 1rem;color: #b0b0b0;}
.list li .logo{margin-left: 0.5rem;margin-top:1rem;}
.list li .logo img{width: 100%;border-radius:100%;}
.list li .content{margin-left: 0.5rem;margin-top:1.3rem;}
.list li .content h5{color:#000403;font-size: 0.7rem;}
.list li .content h6{color:#000403;font-size: 0.6rem;margin-top:0.3rem;}
</style>
