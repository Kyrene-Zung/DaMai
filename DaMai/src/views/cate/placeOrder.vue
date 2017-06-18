<template>
	<div style="background-color:#f2f2f2;padding-top:4rem;padding-bottom: 150px;">
		<div class="order">
			<div class="titleBox">
				<div class="orderTitle">
					<img :src="goodsData.goods_pic">
					<div class="goodsDetail">
						<h4>{{goodsData.goods_title}}</h4>
						<p>时间：{{goodsData.show_time}}</p>
						<p>地点：{{goodsData.venue}}</p>
					</div>
				</div>
			</div>
			<div class="orderTotle">
				<span>{{totleTicket}} <em>张</em></span>
				<span>{{totleMoney}}<em>元</em></span>
			</div>
			<ul class="orderList">
				<li v-for="ticket in itemArray">
					<span>{{ticket.price}}</span>
					<span>X{{ticket.num}}</span>
					<span>{{ticket.price*ticket.num}}元</span>
				</li>
				<!-- <li>
					<span>1680</span>
					<span>X1111</span>
					<span>1680111元</span>
				</li>
				<li>
					<span>1680</span>
					<span>X1111</span>
					<span>1680111元</span>
				</li> -->
			</ul>
		</div>

		<div class="delivery">
			<div class="container">
				<div class="deliWay borderStyle">
					<h4>配送方式</h4>
				</div>
				<div class="margin-top:1px">
					<mt-tabbar v-model="selected">
						<mt-tab-item id="快递">												
			                <div class="circle"> <i class="fa fa-truck" aria-hidden="true"></i></div>
			                <span>快递</span>
						</mt-tab-item>
					    <mt-tab-item id="大麦网自取">  
						    <div class="circle"><i class="fa fa-id-badge" aria-hidden="true"></i></div>
							<span>大麦网自取</span>
						</mt-tab-item>
					</mt-tabbar>
					 <mt-tab-container v-model="selected" >
					 	<mt-tab-container-item id="快递" >	 	
					 		<mt-cell title="您还没有收货地址" icon="date" value="" >
					 			<div class="addAdress"  @click="addAddress()"></div>
					 		</mt-cell>
					 	</mt-tab-container-item>
					 	<mt-tab-container-item id="大麦网自取" >
					 		<div class="selfTake">
					 			<input type="" name="" placeholder="姓名">
					 			<input type="" name="" placeholder="电话">
					 		</div>
					 		<div class="selfTip">
					 			<p>111111111111111111111111111</p>
					 		</div>
					 	</mt-tab-container-item>
					 </mt-tab-container>
				</div>
			</div>
		</div>

		<div class="coupon">
		<mt-cell title="优惠券" to="/venueMap" is-link value="" ><i>（0张可用）</i></mt-cell>
		</div>

		<div class="insurance">
			<mt-cell title="订票保险" value="">
				<i style="left:3.9rem">（安心订购保险）</i>
				<input type="checkbox" name="">
			</mt-cell>
		</div>

		<div class="payWay">
			<mt-cell title="支付方式" value="">
			</mt-cell>
		</div>

		<div class="invoice">
			<mt-cell title="我要开发票" value="">
				<input type="checkbox" name="">
			</mt-cell>
		</div>

		<div class="takeNote">
				<input type="text" name="" placeholder="给大麦留言（选填，不超过50字）">
		</div>

		<div  class="deliBottom">
			<ul class="agree">
				<li>我已阅读<span>《订票服务条款》《退换货约定》《退款约定》</span></li>
				<li>票品为不记名实物，请您妥善保管，遗失不补</li>
			</ul>
			<ul class="shouldPay">
				<li class="left"> 
					<span>应付：<em>{{totleMoney}}</em> <i>元</i></span>
				</li>
				<li class="right"><router-link to="/placeOrder">同意以上协议</router-link></li>
			</ul>
		</div>
	</div>
</template>
<script type="es6">
import {mapState,mapMutations} from 'vuex'
	export default{
		data(){
			return{
				selected:'快递',
				totleTicket:0,
				totleMoney:0
			}
		},
		created(){
			this.setHeadTitle('提交订单')
			this.setMapHead(true)
			this.setSeatPurchase(true)
		    this.setDetailHead(false)
			this.setBuyFoot(false)
			this.setFlag(false)
		    this.setHeadFlag(false)
		},
		beforeRouteEnter(to,from,next){
			//console.log(to.query);
			next(vm=>{
				//console.log(vm.itemArray)
				for(var i=0;i<vm.itemArray.length;i++){
					vm.totleTicket+=Number(vm.itemArray[i].num)
					vm.totleMoney+=Number(vm.itemArray[i].price)*Number(vm.itemArray[i].num)
				}
				// vm.goods_data=to.query.goods_data;
			});
		},
		computed:{
			...mapState(['goodsData','itemArray'])
		},
		methods: {
			...mapMutations(['setHeadTitle','setMapHead','setFlag','setHeadFlag','setDetailHead','setBuyFoot','setSeatPurchase']),
			//跳转添加收货地址
			addAddress(){
				//console.log(1111)
				this.$router.push({path: '/addAddress'})
			}
		},
	}


</script>
<style lang="scss" scoped>
	*{
		margin: 0;
		padding:0;
	}
	.borderStyle{
		border-bottom: 1px solid #f4f4f4;
		box-sizing:border-box;
		box-shadow: 0px 1px 0px #f9f9f9;
	}
// 订单情况
	.order{
		background-color: #fff;
		.titleBox{
			overflow: hidden;
			border-bottom: 1px solid #fbfbfb;
			box-shadow: 0px 1px 0px #f8f8f8;
			.orderTitle{
				overflow: hidden;
				width:16.9rem;
				margin:auto;
				img{
					width:3.85rem;
					height: 5.2rem;
					border:1px solid #f1f2f2;
					margin:0.45rem 0;
					float: left;
				}
				.goodsDetail{
					float: left;
					width: 12.5rem;
					margin-left: 0.5rem;
					h4{
						font-size: 0.8rem;
						color:#1e1e1e;
						font-weight: normal;
						padding:0.6rem 0 1.3rem;
						line-height: 0.8rem;
					}
				}
			}
		}
		.orderTotle{
			width:16.8rem;
			height: 2.8rem;
			line-height: 2.8rem;
			margin:auto;
			border-bottom:0.25rem dotted #d6d6d6;
			position: relative;
			&:before{
				content: "";
				height:0.9rem;
				width:0.9rem;
				display: block;
				position: absolute;
				background-color: #d4d4d4;
				border-radius: 100%;
				left: -1.045rem;
				top:2.2rem;
			}
			&:after{
				content: "";
				height:0.9rem;
				width:0.9rem;
				display: block;
				position: absolute;
				background-color: #d4d4d4;
				border-radius: 100%;
				right: -1.045rem;
				top:2.2rem;
			}
			span{
				font-size: 0.85rem;
				&:nth-child(1){
					color:#121212;
				}
				&:nth-child(2){
					color:#ce001d;
					margin-left: 11.5rem;
				}
				em{
					font-size: 0.6rem;
					font-style: normal;
					color:#3e3e3e;
				}
			}
		}
		.orderList{
			border-bottom: 1px solid #f8f8f8;
			box-shadow: 0px 1px 0px #efefef;
			li{
				width:17rem;
				margin:auto;
				height: 2.5rem;
				line-height: 2.5rem;
				font-size: 0.2rem;
				color:#000000;
				display: flex;
				span{
					flex:1;
					&:nth-child(1){
						// margin-left: 0.5rem;
						// width:1.6rem;
					}
					&:nth-child(2){
						text-align: center;
					}
					&:nth-child(3){
						text-align: right;
					}
				}
			}
		}
	}
// 配送方式
	.delivery{
		background-color: #fff;
		margin-top: 0.5rem;
		border-top: 1px solid #f8f8f8;
		box-shadow: 0px -1px 0px #f0f0f0;
		.container{
			width:17.1rem;
			margin:0 auto;
			.deliWay{
				height: 2.8rem;
				h4{
					font-size: 0.8rem;
					color:#000;
					line-height: 2.8rem;
				}
			}
			.mint-tabbar{
				position: relative;
				display: -webkit-inline-box;
				// padding-bottom: 0.5rem;
				height: 3.9rem;
				background-image: none;
				.mint-tab-item{
					// height: 100%;
					flex:0;
					width:4.4rem;
					text-align: center;
					padding:0;
					margin:0.55rem 0;
					padding: 0.5rem 0;
					.mint-tab-item-icon{
						width: 0;
						height: 0;
						margin:0;
					}
					.mint-tab-item-label{
						height: 100%!important;
						width: 100%;
						overflow: hidden;
						.circle{
							height: 1rem;
							width: 1rem;
							line-height: none;
							border:2px solid #a1a1a1;
							border-radius: 100%;
							margin:auto;
							margin-bottom: 0.3rem;
							i{
								font-size: 0.6rem;
								color:#a1a1a1;
							}
						}
						span{
							display: inline-block;
							font-size: 0.65rem;
							color: #272727;
						}
					}
					&.is-selected{
						padding: 0;
						background-color: #fff;
						.mint-tab-item-label{
							height: 100%;
							display: flex;
							flex-direction: column;
							color:#fff;
							.circle{
								border:none;
								background-color: #96d763;
								height: 1.75rem;
								width: 1.75rem;
								text-align: center;
								line-height: 1.75rem;
								i{
									color:#fff;
									border-radius: 100%;
									background-color: #96d763;
									padding:0.2rem;
									border:2px solid #fff;
								}
							}
						}
					}
				}
			}
			.mint-tab-container{
				
				border-top: 1px solid #000;
				.mint-tab-container-wrap{
					.mint-tab-container-item{
						.mint-cell{
							padding-bottom: 0.5rem;
							position: relative;
							.addAdress{
								position: absolute;
								width: 0;
							    height: 0;
							    border-bottom: 8px solid #919191;
							    border-left: 8px solid transparent;
								right: 3px;
								bottom: 0.6rem;
							}

						}
						.selfTake{
							input{
								width: 100%;
								border:none;
								border-bottom: 1px solid #ccc;
								height: 2.2rem
							}
						}
						.selfTip{
							margin-top: 1rem;
						}
					}
				}	
				
			}
		}
	}

//优惠券
	.coupon{
		margin-top: 0.5rem;
		font-size: 0.75rem;
		font-weight: bold;
		position: relative;
		.mint-cell{
			.mint-cell-wrapper{
				.mint-cell-title{
					.mint-cell-text{
						
					}
				}
			}
		}
		i{
			position: absolute;
			left: 3.3rem;
		    font-size: 0.6rem;
		    font-style: normal;
		}
	}
	.insurance{
		@extend .coupon;
	}
	.payWay{
		@extend .coupon;
	}
	.takeNote{
		background-color: #fff;
		margin-top: 0.5rem;
		text-align: center;
		input{
			width:90%;
			border:none;
			border-bottom: 1px solid #ccc;
			font-size: 0.6rem;
		}
	}
// 尾部
	.deliBottom{
		overflow: hidden;
		position: fixed;
		bottom: 0rem;
		left: 0rem;
		width: 100%;
		background-color: #fff;

		.agree{
			overflow: hidden;
			padding-bottom: 0.65rem;
			li{
				font-size: 0.6rem;
				color:#797979;
				margin-left: 0.7rem;
				padding-top:0.5rem;
				span{
					color:#2693ea;
				}
			}
		}
		.shouldPay{
			height: 2.5rem;
			line-height: 2.5rem;
			overflow: hidden;
			border:1px solid #f0f0f0;
			box-shadow: 0px -1px 0px #f7f7f7;
			li{
				width: 50%;
				height: 100%;
				float: left;
				font-size: 0.6rem;
				color: #9a9a9a;
				&.left{
					span{
						font-size: 0.7rem;
						margin-left: 0.75rem;
						color:#131313;
					}
					em{
						font-size: 0.75rem;
						font-style: normal;
						color: #cf0026;
						margin-left: 0.5rem;
					}
					i{
						font-size: 0.2rem;
						font-style: normal;
						color:#131313;
					}
				}
				&.right{
					background-color: #e31c47;
					font-size: 0.7rem;
					text-align: center;
				}
				a{
					color:#fff;
				}
			}					
		}
	}
	.invoice{
		@extend .insurance;
	}
	
</style>
