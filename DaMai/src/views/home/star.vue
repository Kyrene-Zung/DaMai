<template>
  <div class="star">
    <h1>明星巡演季页面</h1>

    <!-- 海报 -->
    <img :src="poster" alt="">

    <!-- 歌手简介 -->
    <div class="content">
      <h5>【{{ name }}】</h5>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ description }}</p>
    </div>

<!-- 列表 -->
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
import vue from 'vue'

export default {
  name: 'star',
  data () {
    return {
      poster:'../../../static/images/recommend/sts2.jpg',
      name:'董贞',
      description:'对于钟情古风音乐的人来说，董贞这个名字并不陌生！他所商场的仙侠风，通过名族乐器和仙侠古风旋律的结合给听众不同的真切享受。她的声线和歌曲一样感性，中音区的声线和演绎，不仅充满了感性和磁性，也有着让更多人接受的本色温度。而东方女性特有的千转百回，更让作品充满了一种江南水乡的细腻和温润，在东方的柔软和现代流行音乐的张力间，取得一个很好的平衡。',


      list:[
      {photo:'../../../static/images/recommend/rg1.jpg',
      title:'Declan Galbraith 2017 CHLD OF MIND 中国巡演——广州站',
      seat:'座',
      state:'售票中',
      time:'2017.06.25',
      address:'TU凸空间',
      price:'380-680',
      comment:'他唱的每一首歌，都在吟诵一个故事，是对爱人、对远方、对你的倾诉。'
      },
      {photo:'../../../static/images/recommend/rg1.jpg',
      title:'Declan Galbraith 2017 CHLD OF MIND 中国巡演——广州站',
      seat:'',
      state:'售票中',
      time:'2017.06.25',
      address:'TU凸空间',
      price:'380-680',
      comment:'他唱的每一首歌，都在吟诵一个故事，是对爱人、对远方、对你的倾诉。'
      },
      {photo:'../../../static/images/recommend/rg1.jpg',
      title:'Declan Galbraith 2017 CHLD OF MIND 中国巡演——广州站',
      seat:'预售中',
      state:'',
      time:'2017.06.25',
      address:'TU凸空间',
      price:'380-680',
      comment:'他唱的每一首歌，都在吟诵一个故事，是对爱人、对远方、对你的倾诉。'
      }
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
.star{background-color:#f1f5f4;}
section{background: #fff;margin-top:0.4rem;}

/*海报*/
img{width: 100%;}

/*歌手简介*/
.content{padding:0.5rem 0.3rem 0.1rem 0.4rem;background: #fff;margin-top: -0.1rem;}
.content h5{color: black;}
.content p{font-size: 0.6rem;}

/*列表*/
.list li{margin:0.5rem;margin-bottom: 0.1rem;}
.list li .content .left img{width: 100%;}
.list li .content .right{padding-left: 0.5rem;}
.list li .content .right h5{font-size:0.75rem;color:black;margin-top:0.1rem;line-height: 0.9rem;}
.list li .content .right .ticket{margin-top: 0.4rem;}
.list li .content .right .ticket .seat{font-size: 0.65rem;background: #30cf16;width: auto;line-height: 0.9rem;text-align: center;color:#fff;border-radius: 5%;float: left;margin-right:0.3rem;padding-left:0.1rem;padding-right:0.1rem;}
.list li .content .right .ticket .state{font-size: 0.65rem;background: orange;width: 2.9rem;line-height: 0.9rem;text-align: center;color:#fff;border-radius: 5%;float: left;}
.list li .content .right h6{color: black;}
.list li .content .right .time{margin-top:2.5rem;}
.list li .content .right .address{line-height:0.8rem;margin-top:0.4rem;}
.list li .content .right .price{margin-top: 0.5rem;color: #e2104c;}
.list li .content .right .price span{font-size: 0.3rem;}
</style>
