<template>
  <div class="settingsRoot">
      <div class="setList">
        <div class="settingsContainer">
          <div class="setLogo"><img src="../../../../static/photo.jpg"></div>
          <div class="cell">
            <mt-cell title="验证码查询" to="//github.com" is-link value=""></mt-cell>
          </div>
        </div>
      </div>

      <div class="" style="margin-top:0.5rem;">
        <div class="setList">
          <div class="settingsContainer">
            <div class="setLogo"><img src="../../../../static/photo.jpg"></div>
            <div class="cell">
              <mt-cell title="清空缓存" to="//github.com" value="1M"></mt-cell>
            </div>
          </div>
        </div>
        <div class="setList">
          <div class="settingsContainer">
            <div class="setLogo"><img src="../../../../static/photo.jpg"></div>
            <div class="cell">
              <mt-cell title="验证码查询" to="//github.com" is-link value=""></mt-cell>
            </div>
          </div>
        </div>
        <div class="setList">
          <div class="settingsContainer">
            <div class="setLogo"><img src="../../../../static/photo.jpg"></div>
            <div class="cell">
              <mt-cell title="验证码查询" to="//github.com" is-link value=""></mt-cell>
            </div>
          </div>
        </div>
      </div>

      <div class="" style="margin-top:0.5rem;">
        <div class="setList">
          <div class="settingsContainer">
            <div class="setLogo"><img src="../../../../static/photo.jpg"></div>
            <div class="cell">
              <mt-cell title="清空缓存" to="//github.com" is-link value=""></mt-cell>
            </div>
          </div>
        </div>
        <div class="setList">
          <div class="settingsContainer">
            <div class="setLogo"><img src="../../../../static/photo.jpg"></div>
            <div class="cell">
              <mt-cell title="验证码查询" to="//github.com" is-link value=""></mt-cell>
            </div>
          </div>
        </div>
        <div class="setList">
          <div class="settingsContainer">
            <div class="setLogo"><img src="../../../../static/photo.jpg"></div>
            <div class="cell">
              <mt-cell title="客服电话" to="//github.com" value="1010-3721"></mt-cell>
            </div>
          </div>
        </div>
      </div>

      <div class="quitBtn"  @click="quit()" v-if="userInfo">
        <div class="settingsContainer">退出登录</div>
      </div>
  </div>
</template>

<script type="es6">
import { Cell } from 'mint-ui'
import { mapState,mapMutations } from 'vuex'

export default{
  created(){
    this.setHeadTitle('设置')
  },
  computed:{
    ...mapState(['userInfo'])
  },
  methods:{
    quit(){
      // console.log(111)
      localStorage.clear()
      this.setUserInfo('')
      this.$router.push({path:'/mine/index'})
    },
    ...mapMutations(['setHeadTitle','setUserInfo'])
  }
}
</script>
<style lang="scss" scoped>
  .settingsContainer{
    width:17rem;
    margin:auto;
  }
  .settingsRoot{
    background-color: #eef2f3;
    min-height: 27.5rem;
    margin-top:70px;
    .setList{
      background-color: #fff;
      .settingsContainer{
         overflow: hidden;
         display: flex;
        .setLogo{
          flex:1;
          line-height: 2rem;
          img{
            height: 1.5rem;
            width: 1.5rem;
            border-radius: 100%;
            background-color: #008cc4;
            vertical-align: middle;
          }
        }
        .cell{
          flex:7.5;
          
        }
      }
    }

    .quitBtn{
      margin-top: 1rem;
      .settingsContainer{
        border-radius: 5px;
        height: 2.3rem;
        background-color: #ed1554;
        font-size: 0.8rem;
        color:#fff;
        text-align: center;
        line-height: 2.3rem;
      }
    }
  }
</style>
