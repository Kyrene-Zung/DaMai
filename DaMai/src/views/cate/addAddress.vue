<template>
	<div style="background-color:#f2f2f2;padding-top:4rem;padding-bottom: 5rem;">
		<div class="receiveMessage">
			<form class="forming">
				<div>
					<label>姓名</label><input type="text" name="" placeholder="请输入收货人姓名">
				</div>
				<div>
					<label>电话</label><input type="text" name="" placeholder="请输入收货人手机号码">	
				</div>
				<div>
					<label>省份</label><input type="text" name="" placeholder="请选择">
				</div>
				<div>
					<label>城市</label><input type="text" name="" placeholder="请选择">
				</div>
				<div>
					<label>区域</label><input type="text" name="" placeholder="请选择">
				</div>
				<div>
					<label>地址</label><input type="text" name="" placeholder="请输入收货人详细地址">
				</div>
				<div>
					<label>身份证</label><input type="text" name="" placeholder="选填" style="width:13rem;">
				</div>
				
				<div class="save">
					<input type="button" name="" value="保存">
				</div>
			</form>
		</div>
	</div>
</template>
<script type="es6">
import {mapMutations} from 'vuex'
	export default{
		
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
			...mapMutations(['setHeadTitle','setMapHead','setFlag','setHeadFlag','setDetailHead','setBuyFoot','setSeatPurchase']),
			//点击文档
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
