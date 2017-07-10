<template>
	<transition name="rightIn">
		<div>
			<header class="securityHeader">
				<mt-button icon="back" @click.native="$router.go(-1)"></mt-button>
				<span>返回</span>
			</header>
			<div class="securityBody">
				<div class="securityInfo">
					<h1>安全验证</h1>
					<!-- <img src=""> -->
					<p>为了你的账号安全，本次操作需要进行验证。请将下方的图标，移动到圆形区域内</p>
				</div>
				<div class="securityOperate">
					<!-- <router-link to="/pay"></router-link> -->
<!-- 					<input type="" name="" placeholder="请输入登录密码" v-model="">
 -->					<span @click="proOrder()">点这里</span>
				</div>
			</div>
		</div>
	</transition>
</template>
<script type="es6">
import {mapState} from 'vuex'
import Vue from 'vue'
	export default{
		computed:{
			...mapState(['itemArray'])
		},
		methods:{
			proOrder(){
				//验证成功 请求后台生成生成订单编号
				//console.log(this.itemArray)
				Vue.http.jsonp('api/mobile/Order/index').then(rtn=>{
					//console.log(rtn.data)
					let user_id=JSON.parse(localStorage.getItem('userInfo')).user_id
					this.$router.push({
						path:'/pay',
						query:{
							order_num:rtn.data,
							order_detail:this.itemArray,
							user_id:user_id
						}
					});
				})
			}
		}
	}
</script>
<style lang="scss" scoped="">
	.securityHeader{
		height: 3.5rem;
		background-color: #fff;
		position: fixed;
		width: 100%;
		z-index: 30;
		.mint-button--default{
			background-color: #fff;
    		box-shadow: none;
		}
		span{
			margin-left: 0;
		    padding-top: 0.6rem;
		    font-size: 0.75rem;
		    /* vertical-align: bottom; */
		    display: inline-block;
		}
	}
	.securityBody{
		background-color: #fff;
		padding-top: 3.5rem;
		text-align: center;
		h1{
			font-size: 1.3rem;
			font-weight: 500;
			margin:1.3rem 0;
		}
		img{
			height: 74px;
			width: 64px;
		}
		p{
			font-size: 0.6rem;
			color:#000000;
			width: 310px;
			margin:auto;
			line-height: 1rem;
			margin-top: 1.1rem;
		}
	}
</style>
