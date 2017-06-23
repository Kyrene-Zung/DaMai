<template>
  <div id="app">
    <heading></heading>

      <router-view></router-view>

    <footing v-if="$route.path=='/'||$route.path=='/category'||$route.path=='/find'||$route.path=='/mine/index'"></footing>
  </div>
</template>

<script type="es6">
import { mapState } from 'vuex'
import heading from './components/header'
import footing from './components/footer'
export default {
  name: 'app',
  data() {
    return {
      title : '',
    }
  },
  computed: {//激活的时候
    ...mapState(['headTitle']) //映射属性
  },
  components: {
    heading,
    footing,
  }
}
</script>

<style lang="scss" scoped>
@import 'assets/css/common.scss';
$aColor: #fff;

/**.h1{ @include blockText(50px,#000,left,30px)}**/

*{margin: 0;padding: 0;}
body,html{font-size: 20px;font-family: "微软雅黑"}
ul,li{list-style: none;}


</style>
