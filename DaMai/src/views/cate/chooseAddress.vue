<template>
	<div class="rootDiv">
		<div class="addressList"> 

			<div class="chooseAddress borderStyle" v-for="address in addressArr">
				<div class="container">
					<div class="left">
						<div class="up">
							<span class="name">*{{address.deliver_name}}</span>
							<span class="phone">{{address.phone_num}}</span>
						</div>
						<p class="down">
							<span class="province">{{address.province}}</span>
							<span class="city">{{address.city}}</span>
							<span class="area">{{address.area}} 全境</span>
							<span class="address">{{address.address}}</span>
						</p>
					</div>
					<div class="right">
						<input type="radio" name="deliveryAddress" value=""  :checked="address.status" @click="chooseAddress(address)">
					</div>
				</div>
			</div>
			

		</div>
		<div class="add">
			<input type="button" name="" value="添加新地址" @click="addAddress()">
		</div>
	</div>
</template>
<script type="es6">
import {mapState, mapMutations} from 'vuex'
import Vue from 'vue'
	export default{
		data(){
			return{
				// addressArr:[],
			
			}
		},
		created(){
			this.setHeadTitle('选择收货地址')
			this.setMapHead(true)
			this.setSeatPurchase(true)
		    this.setDetailHead(false)
			this.setBuyFoot(false)
		    this.setHeadFlag(false)
		},
		computed:{
			...mapState(['addressArr'])
		},
		beforeRouteEnter(to,from,next){
			//console.log(to.query);
			next();
			// next(vm=>{
			// 	// let user_name=localStorage.getItem('user');//获取当前用户名
			// 	let user_id=1;
			// 	Vue.http.jsonp('api/mobile/User',{params:{user_id:user_id}}).then(rtn=>{
			// 				console.log(rtn.data);
			// 				vm.addressArr=rtn.data;
			// 				// vm.setAttributeData(vm.goods_attribute)
			// 			})
				// vm.goods_data=to.query.goods_data;
			//});
		},
		methods: {
			...mapMutations(['setHeadTitle','setMapHead','setHeadFlag','setDetailHead','setBuyFoot','setSeatPurchase']),
			addAddress(){
				//console.log(1111)
				this.$router.push({path: '/addAddress'})
			},
			chooseAddress(address){
				console.log(address);
				for(var i=0;i<this.addressArr.length;i++){
					if(this.addressArr[i]==address){
						this.addressArr[i].status=1
					}else{
						this.addressArr[i].status=0
					}
				}
				console.log(this.addressArr);
				this.$router.go(-1)
			}
		},
	}


</script>
<style lang="scss" scoped>
	*{
		margin: 0;
		padding:0;
	}
	body,html{
	}
	.borderStyle{
		border-bottom: 1px solid #ccc;
		box-sizing:border-box;
		box-shadow: 0px 1px 0px #f9f9f9;
	}
	.rootDiv{
		background-color: #fff;
		padding-top:3.5rem;
		padding-bottom: 5rem;
		.addressList{
			
			.chooseAddress{
				
				.container{
					position: relative;
					width: 16.7rem;
					margin:auto;
					padding:0.7rem  0;
					.left{
						width:15.8rem;
						height: 100%;
						.up{
							font-size: 0.8rem;
							color:#050505;
						}
						.down{
							font-size: 0.7rem;
							word-break:break-all;
						}
					}
					.right{
						width: 0.9rem;
						position: absolute;
						right: 0;
						top: 50%;
						margin-top: -0.245rem;
						input{
							width: 0.9rem;
							height: 0.9rem;
						}
					}
				}
			}
		}
		.add{
			position: fixed;
			bottom: 0px;
			left: 0px;
			width: 18rem;
			background-color: #fff;
			input{
				width:336px;
				height: 46px;
				margin:0.6rem 0.6rem;
				background-color: #ed1554;
				border:none;
				border-radius: 5px;
				color: #fff;
			}
		}
	}
	
</style>
