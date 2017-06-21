<template>
	<div style="background-color:#f2f2f2;padding-top:4rem;padding-bottom: 5rem;">
		<div class="receiveMessage">
			<form class="forming" action="" method="">
				<div>
					<label>姓名</label><input type="text" v-model="deliver_name" placeholder="请输入收货人姓名">
				</div>
				<div>
					<label>电话</label><input type="text" v-model="phone_num" placeholder="请输入收货人手机号码">	
				</div>
				<div>
					<label>省份</label><input type="text" v-model="province" placeholder="请选择">
				</div>
				<div>
					<label>城市</label><input type="text" v-model="city" placeholder="请选择">
				</div>
				<div>
					<label>区域</label><input type="text" v-model="area" placeholder="请选择">
				</div>
				<div>
					<label>地址</label><input type="text" v-model="address" placeholder="请输入收货人详细地址">
				</div>
				<div>
					<label>身份证</label><input type="text" v-model="id_num" placeholder="选填" style="width:13rem;">
				</div>
				<!-- <div>
					<input type="hidden" name="">
				</div> -->
				<div class="save">
					<input type="button" name="" value="保存" @click="addAddress()">
				</div>
			</form>
		</div>
	</div>
</template>
<script type="es6">
import {mapState, mapMutations} from 'vuex'
import { Axios } from '../../service/config'
import {Toast} from 'mint-ui'
import Vue from 'vue'
	export default{
		data(){
			return{
				deliver_name:'',
				phone_num:'',
				province:'',
				city:'',
				area:'',
				address:'',
				id_num:''
			}
		},
		computed:{
			...mapState(['userInfo'])
		},
		created(){
			this.setHeadTitle('添加收货地址')
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
				// vm.goods_data=to.query.goods_data;
			});
		},
		methods: {
			...mapMutations(['setHeadTitle','setMapHead','setFlag','setHeadFlag','setDetailHead','setBuyFoot','setSeatPurchase','setAddressArr']),
			//保存收货地址
			addAddress(){
				
				if(!this.deliver_name){
					Toast("请添加收货人姓名！")
				}else if(!this.phone_num){
					Toast("请添加收货人电话！")
				}else if(!this.address){
					Toast("请添加收货人地址！")
				}else if(!/^1\d{10}/.test(this.phone_num)){
					Toast("请填写正确的手机号码")
				}else if(this.address.length<4 ||this.address.length>40){
					Toast("详细地址的字数需为4到40字")
				}else if(!this.province||!this.city||!this.area){
					Toast("请添加区域")
				}else{
					var obj={
						deliver_name:this.deliver_name,
						phone_num:this.phone_num,
						province:this.province,
						city:this.city,
						area:this.area,
						address:this.address,
						id_num:this.id_num,
						user_id:this.userInfo.user_id
					}
					Axios({
		              method:"post",//post:data
		              url:"/api/mobile/user/addAddress",
		              params:{
		                obj
		              }
			        }).then( rtn =>{
			        		Vue.http.jsonp('api/mobile/User',{params:{user_id:this.userInfo.user_id}}).then(rtn=>{
								console.log(rtn.data);
								this.setAddressArr(rtn.data);
								// vm.setAttributeData(vm.goods_attribute)
								this.$router.go(-2)
							})
			        		
			        	})
				}
				console.log(obj)
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
	.receiveMessage{
		width:17.3rem;
		margin:auto;
		background-color: #fff;
		border:2px solid #e8eeee;
		padding-top: 1.3rem;
		// box-shadow: 0px 0px 0px #000;
		.forming{
			position: relative;
			div{
				width: 16.3rem;
				margin:auto;
				label{
					font-size: 0.7rem;
					color:#0a0a0a;
				}
				input{
					font-size: 0.75rem;
					color:#909090;
					margin-left: 0.65rem;
					border:none;
					border-bottom: 3px solid #b5b5b5;
					width: 14rem;
					&:nth-child(7){
						width: 13rem;
					}
				}
				&.save{
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
		}
		
	}
</style>
