<template>
	<div class="root">
		<div class="order">
			<div class="titleBox">
				<div class="orderTitle">
					<img :src="orderDetail.goods_pic">
					<div class="goodsDetail">
						<h4>{{orderDetail.goods_title}}</h4>
						<p>时间：{{orderDetail.date}} {{orderDetail.time}}</p>
						<p>地点：{{orderDetail.venue}}</p>
					</div>
				</div>
			</div>
			<div class="orderTotle">
				<span>{{orderDetail.ticket_totle}} <em>张</em></span>
				<span>{{orderDetail.price_totle}}.00<em>元</em></span>
			</div>
		</div>

		<div class="orderMsg">
			<div class="orderContainer ">
				<div class="orderTitle borderStyle">
					<h4>订单信息</h4>
				</div>
				<ul>
					<li>
						<span>订单编号：</span><em>{{orderDetail.order_num}}</em>
					</li>
					<li>
						<span>下单时间：</span><em>{{orderDetail.create_time}}</em>
					</li>
					<li>
						<span>订单状态：</span><em style="color:#dd5f15;">1111111</em>
					</li>
				</ul>
			</div>
		</div>

		<div class="orderMsg">
			<div class="orderContainer ">
				<div class="orderTitle borderStyle">
					<h4>配送方式-快递</h4>
				</div>
				<div class="deliver">
					<div class="deliverLeft">
						<span><i class="fa fa-truck" aria-hidden="true"></i></span>
					</div>
					<div class="deliverRight">
						<p>收货人：</p>
						<p>电话：</p>
						<span>收货地址：</span>
					</div>
				</div>
			</div>
		</div>

		<div class="orderMsg">
			<div class="orderContainer ">
				<div class="orderTitle borderStyle">
					<h4>订单明细</h4>
				</div>
				<ul class="shouldPay">
					<li><span>商品金额</span><i style="color:#212121">{{orderDetail.price_totle}}.00元</i></li>
					<li><span>应付金额</span><i style="color:#da144f">{{orderDetail.price_totle}}.00元</i></li>
				</ul>
			</div>
		</div>

		<div class="contactServe">
			<div class="orderContainer">
				 <i class="fa fa-headphones" aria-hidden="true" ></i>联系客服
			</div>
		</div>
	</div>
</template>
<script type="es6">
import {mapMutations} from 'vuex'
	export default{
		data(){
			return {
				orderDetail:[]
			}
		},
		created(){
			this.setHeadTitle('订单详情')
		},
		beforeRouteEnter(to,from,next){
			console.log(to.query)
			next(vm=>{
				vm.orderDetail=to.query.order
			})
		},
		methods:{
			...mapMutations(['setHeadTitle'])
		}
	}
</script>
<style lang="scss" scoped>
.orderContainer{
	width:16.5rem;
	margin:auto;
}
.borderStyle{
	border-bottom: 1px solid #efefef;
	box-shadow: 0px 1px 0px #f7f7f7;
}
.root{
	background-color: #eef2f3;
	margin-top: 3.5rem;
	min-height: 28.5rem;
	padding-bottom: 2.5rem;
	.order{	
		padding-bottom: 0.5rem;
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
						padding:0.4rem 0 0.2rem;
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
					margin-left: 10.5rem;
				}
				em{
					font-size: 0.6rem;
					font-style: normal;
					color:#3e3e3e;
				}
			}
		}
	}

	.orderMsg{
		margin-top: 0.5rem;
		background-color: #fff;
		.orderContainer{
			.orderTitle{
				h4{
					font-size: 0.75rem;
					color:#262626;
					font-weight: 500;
					padding:0.9rem 0 0.75rem;
				}
			}
			ul{
				margin-top: 0.8rem;
				li{
					font-size: 0.7rem;
					line-height: 2rem;
					span{		
						color: #a0a0a0;
					}
					em{
						font-style: normal;
						color: #111111;
					}
				}
			}
			.deliver{
				overflow: hidden;
				.deliverLeft{
					float: left;
					width: 2.9rem;
					padding: 2rem 0;
					span{
						display: inline-block;
						width:1.1rem;
						height: 1.1rem;
						border:2px solid #989898;
						border-radius: 100%;
						line-height: 0.6rem;
						text-align: center;
						i{
							font-size: 0.6rem;
							display: inline;
							color: #989898;
						}
					}
				}
				.deliverRight{
					p{
						font-size: 0.8rem;
						color: #060606;
						line-height: 1.2rem;
					}
					span{
						font-size: 0.65rem;
					}

				}
			}
			.shouldPay{
				li{
					i{
						float: right;
						font-style: normal;
					}
				}
			}
		}
	}
	.contactServe{
		margin-top: 0.5rem;
		padding: 0.5rem 0;
		background-color: #fff;
		.orderContainer{
			font-size: 0.6rem;
			color:#656565;
			border:1px solid #efefef;
			padding:0.65rem 0;
			text-align: center;
			i{
				font-size: 0.75rem;
				color: #db0031;
				margin-right: 0.5rem;
			}
		}
	}
}
</style>
