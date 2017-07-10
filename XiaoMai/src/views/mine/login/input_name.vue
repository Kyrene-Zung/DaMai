<template>
<div>
	<div class="mui-bar mui-bar-nav">
		<mt-tab-item>
	  		<router-link to="/mine/login" class="mui-btn-link mui-pull-left">< 手机注册</router-link>
	    </mt-tab-item>
	</div>
	<form class="mui-input-group">
		  <div class="mui-input-row">
		      <input type="text" placeholder="请输入昵称" v-model="name">
		  </div>
		  <div class="mui-button-row">
		   		 <button type="button" class="mui-btn mui-btn-primary" onclick="return false;" style="padding: 6px 120px" @click="nmae()">确定</button>
		  </div>

	 </form>

</div>
       </template>

<script type="es6">
import { Cell } from 'mint-ui'
import { Axios } from '../../../service/config'//config:引用Axios

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
				name(){
						Axios({
							method:"post",
							url:"/api/user/save",
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
