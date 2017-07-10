<template>
  <div class="carousel">
    <!-- 轮播 -->
    <mt-swipe :auto="2000">
      <mt-swipe-item v-for="lunbo in carousel">
      <router-link to="/">
        <img :src="lunbo" alt=""> 
      </router-link></mt-swipe-item>
    </mt-swipe>
  </div>
</template>

<script type="es6">
export default {
  name: 'carousel',
  data () {
    return {

    }
  },
  mounted(){
    this.init();
  },
  methods:{
    init(){
    }
  },
  props:['carousel']
}


</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style text="text/css" scoped>
/*轮播*/
.carousel{
  padding-top: 3.5rem;
}
.mint-swipe {height: 8.5rem ;}
.mint-swipe img{width: 100%;}
</style>
