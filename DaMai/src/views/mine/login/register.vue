<template>
<div>
	<div class="mui-bar mui-bar-nav">
		<mt-tab-item>
	  		<router-link to="/mine/login" class="mui-btn-link mui-pull-left">手机注册</router-link>
	    </mt-tab-item>
	</div>
	<form class="mui-input-group">
		  <div class="mui-input-row" style="top:50px;height: 200px">
		      <a href="#" style="width: 50%">+86 ∨</a>
		      <input type="text" placeholder="请输入手机号" v-model="phone">
		      <input type="text" placeholder="请输入验证码" v-model="ma">
		      <input type="password" placeholder="请输入6-16位密码" v-model="password">
		  </div>
		  <div>
		    	<input type="checkbox">我已阅读并同意<span style="color: blue">大麦网会员服务条款</span>
		  </div>

		  <div class="mui-button-row">
		   		 <button type="button" class="mui-btn mui-btn-primary" onclick="return false;" style="padding: 6px 120px" @click="register()">注册</button>
		  </div>

	 </form>

</div>
       </template>

<script type="es6">
import { Cell } from 'mint-ui'
import { Axios } from '../../../service/config.js'//config:引用Axios

// import { mapGetters } from 'vuex'

	export default{
			data(){
				return{
					phone:"",
					ma:"",
					password:"",
				}
			},methods:
			{
				register(){
						Axios({
							method:"post",
							url:"/api/mobile/user/save",
							data:{
								phone:this.phone,//获取当前方法的值
								password:this.password
							}
				})
				this.$router.push({path:'/mine/login/index'})
			}
	}
}
</script>
<style >
</style>
