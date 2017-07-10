<template>
  <div class="guess_like">
    <ul>
      <li class="listUp" v-for="list in list" @click="ticketDetail(list)">
        <img :src="list.goods_pic">
        <div class="description">
          <h5>{{list.goods_title}}</h5>
          <h6>时间：{{list.show_time}}</h6>
          <h6>场馆：{{list.venue}}</h6>
          <span class="onSale">{{list.goods_status}}</span>
          <span class="price"><strong>{{list.goods_price}}元</strong></span>   
        </div>
      </li>
    </ul>
  </div>
</template>

<script type="es6">
export default {
  name: 'slide',
  data () {
    return {

    }
  },
  mounted(){
    this.init();
  },
  methods:{
    init(){
    },
    ticketDetail(goods){ // 进入详情页面
       // console.log(goods);
        this.$router.push({path: '/ticketDetail',query:{goods:goods}})
    },
  },
  props:['list']
}


</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style text="text/css" scoped>
ul {list-style-type: none;padding: 0;}
 .guess_like ul{margin-left:0.5rem;margin-right: 0.3rem;  padding-bottom: 2.8rem;}
.guess_like li{
  overflow: hidden;
  height: 9rem;
  padding-top:0.5rem;

  border-bottom: 1px solid #ccc;
}
.guess_like li .listUp{
  overflow: hidden;
}
.guess_like li img{
  width:5.7rem;
  height:7.7rem;
  float: left;
}
.guess_like li .description{
  float: left;
  width: 10.6rem;
  text-align: left;
  margin-left:0.3rem;
}
.guess_like li .description h5{
  font-size: 0.65rem;
  color:#363636;
  font-weight: 600;
  margin:0;
  line-height: 1rem;
}
.guess_like li .description h6{
  font-size: 0.6rem;
  color:#a1a1a1;
  margin-bottom:0.7rem;
}
.guess_like li .description span.onSale{
  border:0.1rem solid #e8aaa9;
  border-radius: 0.15rem;
  text-align: center;
  line-height: 0.85rem;
  color:#df4b55;
  font-size: 0.6rem;
  padding: 0.2rem;
}
.guess_like li .description span.price{
  display: block;
  font-size: 0.75rem;
  color:#e0001b;
  margin-top: 0.7rem;
}
</style>
