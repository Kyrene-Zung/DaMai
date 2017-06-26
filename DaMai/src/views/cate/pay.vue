<template>
		<mt-popup v-model="popupVisible" position="bottom" class="pay">
			<header class="payHeader payBorder">
				<div class="payContainer">
					<span class="payClose" @click="payClose()">X</span>
					<img src="">
					<span class="payTitle">付款详情</span>
					<i class="fa fa-question-circle-o" aria-hidden="true"></i>
					</div>
			</header>
			<div class="mesgList">
				<div class="payContainer">
					<mt-cell title="订单信息" value="说明文字" ></mt-cell>
					<mt-cell title="支付宝账号" value="说明文字" class="payBorder"></mt-cell>
					<mt-cell title="付款方式" value="说明文字" class="payBorder" to="//github.com" is-link></mt-cell>
				</div>
			</div>
			<div class="needPay">
				<div class="payContainer">
					<span class="payText">需付款</span>
					<span class="totlePay">1680.00元</span>
				</div>
			</div>
			<div class="surePay">
				<div class="payContainer" @click="surePay()">确认付款</div>
			</div>
		</mt-popup>
</template>
<script type="es6">
import {mapMutations} from 'vuex'
import Vue from 'vue'
	export default{
		data(){
			return{
				popupVisible:true,
				orderMessage:null
			}
		},
		created(){
			this.setHeadTitle('支付')
		},
		beforeRouteEnter(to,from,next){
			// console.log(to.query)
			next(vm=>{
				vm.orderMessage=to.query
			})
		},
		methods:{
			payClose(){ //取消订单 默认状态为0
				this.popupVisible=false;
				Vue.http.jsonp('api/mobile/Order/proOrder',{params:{orderMessage:this.orderMessage}})
				.then(rtn=>{
					if(rtn.data){//插入数据库成功
						this.$router.push({path:'/damaiOrder'})
					}
				})
				
			},
			surePay(){//确认支付
				console.log('确认支付')
			},
			...mapMutations(['setHeadTitle'])
		}
	}
</script>
<style lang="scss" scoped="">
	.payContainer{
		width: 16.5rem;
		margin:auto;
	}
	.payBorder{
		border-bottom: 1px solid #e3e3e3;
		box-shadow: 0px 1px 0px #f0f0f0;
	}
	.pay{
		width: 100%;
		.payHeader{
			.payContainer{
				padding:0.5rem 0;				
				.payClose{
					font-size: 0.75rem;
					color:#727272;
				}
				img{
					width: 1rem;
					height: 1rem;
					vertical-align: middle;
					margin-left: 5rem;
				}
				.payTitle{
					font-size: 0.9rem;
					color:#000;
					font-weight: 500;
					margin-left: 0.25rem;
				}
				i{
					margin-left: 4.0rem;
					color:#318fc8;
					font-size: 1rem;
				}
			}
		}
		.needPay{
			.payContainer{
				padding:1.2rem 0 4.5rem;
				.payText{
					font-size: 0.75rem;
					color: #0e0e0e;
				}
				.totlePay{
					font-size: 1rem;
					float: right;
				}
			}
		}
		.surePay{
			.payContainer{
				height: 2.25rem;
				line-height: 2.25rem;
				color:#fff;
				font-size: 1rem;
				text-align: center;
				background-color: #1e91e1;
				border-radius: 5px;
				margin-bottom: 1rem;
			}
		}
	}
</style>
