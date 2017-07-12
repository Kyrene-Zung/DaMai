<template>
	<div class="order">
		<mt-navbar v-model="active" >
			<mt-tab-item :id="10">全部</mt-tab-item>
			<mt-tab-item :id="0">待付款</mt-tab-item>
			<mt-tab-item :id="1">待收货</mt-tab-item>
			<mt-tab-item :id="2">待评价</mt-tab-item>
		</mt-navbar>
		<mt-tab-container v-model="active" swipeable>
			<mt-tab-container-item :id="10"> <!-- 全部分类 -->
				<div class="orderBox"  v-for="order in orderArr" @click="orderDetail(order)">
					<div class="orderContainer">
						<div class="orderTitle orderBorder">
							<div class="orderNum">
								<i class="fa fa-file-text-o" aria-hidden="true"></i>
								<span>{{order.order_num}}</span>
							</div>
							<div class="orderStatus" v-if="order.status==0?true:false">等待付款</div>
							<div class="orderStatus" v-if="order.status==1?true:false">等待收货</div>
							<div class="orderStatus" v-if="order.status==2?true:false">等待评价</div>
						</div>
						<div class="orderMesg">
							<img :src="order.goods_pic">
							<div class="orderContent">
								<h4>{{order.goods_title}}</h4>
								<p>演出时间：2017-08-11 19:00</p>
								<p>订单金额：<span>{{order.price_totle}}.00<i>元</i></span></p>
								<p>票品数量：{{order.ticket_totle}}</p>
							</div>
						</div>
					</div>
				</div>
				
			</mt-tab-container-item>
			<mt-tab-container-item :id="id" v-for="id in [0,1,2]"> <!-- 其他分类 -->
				<div class="orderBox"  v-for="order in orderArr">
					<div class="orderContainer">
						<div class="orderTitle orderBorder">
							<div class="orderNum">
								<i class="fa fa-file-text-o" aria-hidden="true"></i>
								<span>{{order.order_num}}</span>
							</div>
							<div class="orderStatus" v-if="order.status==0?true:false">等待付款</div>
							<div class="orderStatus" v-if="order.status==1?true:false">等待收货</div>
							<div class="orderStatus" v-if="order.status==2?true:false">等待评价</div>
						</div>
						<div class="orderMesg">
							<img :src="order.goods_pic">
							<div class="orderContent">
								<h4>{{order.goods_title}}</h4>
								<p>演出时间：2017-08-11 19:00</p>
								<p>订单金额：<span>{{order.price_totle}}.00<i>元</i></span></p>
								<p>票品数量：{{order.ticket_totle}}</p>
							</div>
						</div>
					</div>
				</div>
			</mt-tab-container-item>
		</mt-tab-container>
	</div>
</template>
<script type="es6">
import {mapMutations} from 'vuex'
import Vue from 'vue'
	export default{
		data(){
			return{
				active:10,
				orderArr:[]
			}
		},
		created(){
				this.setHeadTitle('大麦订单')
		},
		beforeRouteEnter(to,from,next){ //请求全部
			console.log(to.query.type)
			
			next(vm=>{
				vm.active=to.query.type;
				let user_id=JSON.parse(localStorage.getItem('userInfo')).user_id;
				Vue.http.jsonp('/api/mobile/Order/getOrder',{params:{user_id:user_id,status:vm.active}}).then(rtn=>{
					//console.log(rtn.data)
					vm.orderArr=rtn.data;
				})
			})
		},
		watch:{
			active:function(value,oldvalue){
				// console.log(value)
				let user_id=JSON.parse(localStorage.getItem('userInfo')).user_id;
				Vue.http.jsonp('/api/mobile/Order/getOrder',{params:{user_id:user_id,status:value}}).then(rtn=>{
					//console.log(rtn.data)
					this.orderArr=rtn.data;
				})
			}
		},
		methods:{
			orderDetail(order){
				console.log(order)
				this.$router.push({path:'/orderDetail',query:{order:order}})
			},
			// askOrderApi(value){
			// 	let user_id=JSON.parse(localStorage.getItem('userInfo')).user_id;
			// 	Vue.http.jsonp('/api/mobile/Order/getOrder',{params:{user_id:user_id,status:value}}).then(rtn=>{
			// 		//console.log(rtn.data)
			// 		this.orderArr=rtn.data;
			// 	})
			// },
			...mapMutations(['setHeadTitle'])
		}
	}
</script>
<style lang="scss" scoped>
	.orderContainer{
		width: 16.8rem;
		margin:auto;
	}
	.orderBorder{
		border-bottom: 1px solid #f3f3f3;
		box-shadow: 0px 1px 0px #f9f9f9;
	}
	.order{
		
		padding-top: 3.5rem;
		.mint-navbar{
			    position: fixed;
			    width: 100%;
			    z-index: 30;
			.mint-tab-item{
				color: #4a4a4a;
			}
			.mint-tab-item.is-selected{
		      color:#cb134a;
		      border-bottom: 1px solid #e0002f;
		      box-sizing: border-box;
		    }
		}
		.mint-tab-container{
			.mint-tab-container-item{
				margin-top: 2rem;
				background-color: #e6e6e6;
				padding-bottom: 5.1rem;
				min-height: 26.2rem;
			}
			.orderBox{
				background-color: #fff;
				margin-top: 0.5rem;
				.orderContainer{
				.orderTitle{
					overflow: hidden;
					padding:0.5rem 0;
					.orderNum{
						float: left;
						i{font-size: 0.7rem;color: #b7b7b7;}
						span{font-size: 0.6rem;color: #2b2b2b}
					}
					.orderStatus{
						float: right;
						color: #cf1850;
						font-size: 0.6rem;
					}
				}
				.orderMesg{
					overflow: hidden;
					padding:0.6rem 0;
					img{
						height: 6.6rem;
						width: 5rem;
						float: left;
					}
					.orderContent{
						height: 6.6rem;
						width: 10.8rem;
						float: left;
						margin-left: 0.5rem;
						h4{
							font-size: 0.8rem;
							font-weight: 500;
						}
						p{
							color: #000;
							span{
								font-size: 0.7rem;
								color:#c51b40;
								i{
									font-style: normal;
									font-size: 0.6rem;
								}
							}
						}
					}
				}
			}
			}
			
		}
	}
</style>
