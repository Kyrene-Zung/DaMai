<template>
  <div>
    <div class="mui-bar mui-bar-nav">

      <mt-tab-item>
        <router-link to="/mine/login/register" class="mui-btn mui-btn-link mui-pull-right">
         注册
       </router-link>
       <router-link to="/mine/index" class="mui-btn-link mui-pull-left">
        登录
      </router-link>
    </mt-tab-item>
  </div>
  <form class="mui-input-group" style="top: 80px;">
    <div class="mui-input-row">
      <div>
        <a href="#">+86</a>
        <input type="text" placeholder="请输入手机号" data-input-clear="5" id="input_phone" v-model="input_phone">
        <span class="mui-icon mui-icon-clear mui-hidden">
        </span>
      </div>
    </div>
    <div class="mui-input-row">
      <input icd="input_password" type="text" placeholder="请输入密码" v-model="input_password">
    </div>
    <mt-tab-item>
      <router-link to="/mine/login/forgot_password">
       忘记密码
     </router-link>
     <router-link to="/mine/login/quick_login">
      快速登录
    </router-link>
  </mt-tab-item>


  <div class="mui-button-row">
    <button type="button" class="mui-btn mui-btn-primary" onclick="return false;" style="padding: 6px 120px" @click="login()">
     登录
   </button>
 </div>

</form>
</div>
</template>

<script type="es6">
  import { Cell } from 'mint-ui'
  import { Axios } from '../../../service/config'
  import { mapMutations } from 'vuex'
  import Vue from 'vue'

export default{
  data(){
    return{
      input_phone:"",
      input_password:""
    }
  },
  methods:{
     
    ...mapMutations(['setUserInfo','setAddressArr']),
     login(){
        Axios({
              method:"post",//post:data
              url:"/api/mobile/user/read",
              params:{
                phone:this.input_phone,//获取当前方法的值
                password:this.input_password,
              }
            }).then( rtnD=>{
              console.log(rtnD.data)
              if(rtnD.data['status']){
                  this.$router.push({path:'/mine/index'})
                  this.setUserInfo(rtnD.data);
                  localStorage.setItem('userInfo',JSON.stringify(rtnD.data))
                  //拿地址
                  let user_id=rtnD.data.user_id;
                    Vue.http.jsonp('api/mobile/User',{params:{user_id:user_id}}).then(rtn=>{
                          console.log(rtn.data);
                          this.setAddressArr(rtn.data);
                          // vm.addressArr=rtn.data;
                          // for(var i=0;i<vm.addressArr.length;i++){
                          //   if(vm.addressArr[i].status==0){
                          //     vm.address=vm.addressArr[i]
                          //   }
                          // }
                    })

              }else{
                  console.log("用户或密码并不存在")
              }
             })
    }
  }
}
</script>
<style>
</style>
