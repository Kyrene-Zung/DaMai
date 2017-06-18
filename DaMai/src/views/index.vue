<template>
  <div class="hello">
    <h1>推荐页面</h1>
  </div>
</template>

<script type="es6">
import { mapMutations} from 'vuex'

export default {
  name: 'hello',
  data () {
    return {

    }
  },
   created(){
    this.setHeadTitle('分类')
    this.setFlag(true) //不显示分类页面的尾部
    this.setHeadFlag(true) 
    this.setDetailHead(false)
    this.setBuyFoot(false)
    this.setMapHead(false)
    this.setSeatPurchase(false)
  },
  methods:{
     ...mapMutations (['setHeadTitle','setMapHead','setFlag','setHeadFlag','setDetailHead','setBuyFoot','setSeatPurchase']), // 映射方法
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
