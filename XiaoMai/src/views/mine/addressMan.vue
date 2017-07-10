<template>
	<div class="rootDiv">
		<div class="addressList borderStyle"  v-for="address in addressArr"> 
			<div class="addressContainer">
				<div class="addressMes">
					<span class="deliverName">{{address.deliver_name}}</span>
					<span class="phoneNum">{{address.phone_num}}</span>
					<p class="address">{{address.province}} {{address.city}} {{address.area}} {{address.address}}</p>
				</div>	
				<div class="addressChoose">
					<input type="radio" name="addressDefault">
					<span>设置默认地址</span>
				</div>
				<div class="angleRight"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
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
		created(){
			this.setHeadTitle('选择收货地址')
		},
		computed:{
			...mapState(['addressArr'])
		},
		beforeRouteEnter(to,from,next){
			next(vm=>{
				 //拿地址
                  let user_id=JSON.parse(localStorage.getItem('userInfo')).user_id
                    Vue.http.jsonp('api/mobile/User',{params:{user_id:user_id}}).then(rtn=>{
                          vm.setAddressArr(rtn.data);
                    })
			})
		},
		methods:{
			addAddress(){
				//console.log(1111)
				this.$router.push({path: '/addAddress'})
			},
			...mapMutations(['setHeadTitle','setAddressArr'])
		}
	}
</script>
<style lang="scss" scoped>
	*{
		margin: 0;
		padding:0;
	}
	body,html{
	}
	.addressContainer{
		width:16.5rem;
		margin:auto;
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
			.addressContainer{
				position: relative;
				padding: 0.8rem 0;
				.addressMes{
					width: 14.6rem;
					word-break:break-all;
					span{
						font-size: 0.8rem;
						color:#212121;
					}
					p{
						font-size: 0.7rem;
						line-height: 0.85rem;
						padding: 0.35rem 0;
					}
				}
				.addressChoose{
					input{
						width: 1rem;
						height: 1rem;
						vertical-align: middle;
					}
					span{
						font-size: 0.65rem;
						color: #656565;
					}
				}
				.angleRight{
					position: absolute;
					right: 0;
					top: 50%;
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

