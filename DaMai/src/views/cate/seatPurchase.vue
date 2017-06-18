<template>
	<div>	
		<ticking></ticking>
		<div class="seatClick">
			<img src="">
		</div>
		<div class="bottomPull">
			<div class="allPrice" @click="downOrUp()">
				<span>全部价格</span><i class="fa fa-angle-down" aria-hidden="true"></i>
			</div>
			<ul class="priceDetail">
				<li v-for="attribute in goods_attribute">
					<i class="fa fa-archive" aria-hidden="true"></i>
					<span>{{attribute.price}}</span>元
				</li>
				<!-- <li><i class="fa fa-archive" aria-hidden="true"></i><span>1680</span>元</li>
				<li><i class="fa fa-archive" aria-hidden="true"></i><span>1680</span>元</li>
				<li><i class="fa fa-archive" aria-hidden="true"></i><span>1680</span>元</li>
				<li><i class="fa fa-archive" aria-hidden="true"></i><span>1680</span>元</li>
				<li><i class="fa fa-archive" aria-hidden="true"></i><span>1680</span>元</li> -->
			</ul>
		</div>
	</div>
</template>
<script type="es6">
import {mapMutations} from 'vuex'
import Vue from 'vue'
import {Toast} from 'mint-ui'
import ticking from '../../components/cate/tick'
	export default{
		data(){
			return{
				goods_data:[],
				goods_attribute:[]
			}
		},
		created(){
			this.setHeadTitle('选择区域')
			this.setMapHead(true)
			this.setSeatPurchase(true)
		    this.setDetailHead(false)
			this.setBuyFoot(false)
			this.setFlag(false)
		    this.setHeadFlag(false)
		},
		beforeRouteEnter(to,from,next){
			//console.log(typeof to.query.goods_data);
			next(vm=>{
				//vm.goods_data=to.query.goods_data;
				Toast("是否登录了？")
						if(typeof to.query.goods_data=='string'){ //返回上一页的时候
							//console.log(vm.itemArray);
							vm.goods_attribute=vm.attributeData	
							//vm.itemArr=vm.itemArray	
						}else{
							let goods_data=to.query.goods_data;console.log(goods_data);
							Vue.http.jsonp('api/mobile/Attribute',{params:{goods_id:goods_data.goods_id}}).then(rtn=>{
								
								vm.goods_attribute=rtn.data;
								vm.setAttributeData(vm.goods_attribute)
							})
					       // console.log(vm.goods); 			
					   }
			});
		},
		methods: {
			...mapMutations(['setHeadTitle','setMapHead','setFlag','setHeadFlag','setDetailHead','setBuyFoot','setSeatPurchase','setAttributeData']),
			downOrUp(){
				var faAngleDown=document.querySelector('.allPrice .fa');
				var bottomPull=document.querySelector('.bottomPull');
				console.log(faAngleDown.className)
				if(faAngleDown.className=='fa fa-angle-down'){
					faAngleDown.className='fa fa-angle-up';
					bottomPull.style.bottom=-2.25+'rem';
				}else{
					faAngleDown.className='fa fa-angle-down';
					bottomPull.style.bottom=0+'rem';
				}
			}
		},
		components:{
			ticking
		}
	}
</script>
<style type="text/css">
	.seatClick{
		width: 100%;
		height: 15rem;
		background-color: red;
		margin-top: 5.6rem;
	}
	.bottomPull{
		overflow: hidden;
		position: fixed;
		bottom: 0rem;
		left: 0rem;
		width: 100%;
	}
	.allPrice{
		height: 1.5rem;
		line-height: 1.5rem;
		text-align: left;
		width: 100%;
		box-sizing: border-box;
		border-top:1px solid #f6f6f6;
		box-shadow:0px -1px 0px #efefef; 
	}
	.allPrice span{
		font-size: 0.7rem;
		color:#070707;
		margin-left: 5px;
	}
	.allPrice i{
		margin-left: 13.5rem;
	}
	.priceDetail{
		overflow: hidden;
	}
	.priceDetail li{
		width: 25%;
		float: left;
		box-sizing: border-box;
		border-right: 1px solid #eef0ef;
		border-bottom: 1px solid #eef0ef;
		border-top: 1px solid #eef0ef;
		box-shadow: -1px 0px 0px  #f8f5f7 inset;
		font-size: 0.6rem;
		color: #9a9a9a;
	}
	.priceDetail li span{
		color:#181818;
	}
	.priceDetail li i{
		color:#fe0000;
		margin-left: 0.25rem;
	}
</style>
