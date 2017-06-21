<template>
	<div style="background-color:#f2f2f2!important">	
		<div class="chooseTime">
			<p>选择时间</p>
			<ul>
				<li class="active"><span>2017-08-11</span><br/><span>周五 19:00</span></li>
				<li><span>2017-08-12</span><br/><span>周六 19:00</span></li>
			</ul>
		</div>

		<div class="choosePrice">
			<p>选择价格</p>
			<ul>
				<li :class="{'sellOut':!attribute.ticket_left,'active':isActive(attribute.price)}" @click="clickPrice($event)" v-for="attribute in goods_attribute">
				{{attribute.price}}
				</li>

			</ul>
		</div>

			<div v-model="popupVisible" position="bottom" class="buyIt">
					<ul class="choseItem" style="display:block">  
						<li v-for="item in itemArr">
							<span class="itemPrice">{{item.price}}</span>
							<input type="button" name="" value="-" class="minus" @click="minusNum(item)">
							<span class="itemNum">{{item.num}}</span>
							<input type="button" name="" value="+" class="add" @click="addNum(item)">
							<i class="fa fa-times" aria-hidden="true" @click="clickCrow($event)"></i>
						</li>
					</ul>
					<ul class="chooseDone" v-if="popupVisible">
						<li class="left"> 
							<span class="clickShow" @click="HideOrShow($event)"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
							<span class="totle" v-model="itemArr">
								{{itemArr | totlePrice}}<em>元</em>
								<i>({{itemArr | totleNum}}张)</i>
							</span>
						</li>
						<li class="right"><router-link to="/placeOrder">选好了</router-link></li>
					</ul>
			</div>
		
	</div>
</template>
<script type="es6">
import {mapMutations, mapState} from 'vuex'
import Vue from 'vue'
import {Toast} from 'mint-ui'
import ticking from '../../components/cate/tick'
	export default{
		data(){
			return{
				popupVisible:false,
				itemArr:[],
				// goods_data:[]
				goods_attribute:[],
				num:0,
			}
		},
		computed:{
			...mapState(['attributeData','itemArray']),
		},
		created(){
			this.setHeadTitle('选择商品')
			this.setMapHead(true)
			this.setSeatPurchase(true)
		    this.setDetailHead(false)
			this.setBuyFoot(false)
			this.setFlag(false)
		    this.setHeadFlag(false)
		},
		beforeRouteEnter(to,from,next){
			 console.log(to.query);
			next(vm=>{
					if(typeof to.query.goods_data=='string'){ //返回上一页的时候
						//console.log(vm.itemArray);
						vm.goods_attribute=vm.attributeData	
						vm.itemArr=vm.itemArray	
						if(vm.itemArr.length!=0) {
							vm.popupVisible=true 			
						}
					}else{
						let goods_data=to.query.goods_data;
						Vue.http.jsonp('api/mobile/Attribute',{params:{goods_id:goods_data.goods_id}}).then(rtn=>{
							//console.log(rtn.data);
							vm.goods_attribute=rtn.data;
							vm.setAttributeData(vm.goods_attribute)
						})
				       // console.log(vm.goods); 			
				   }
				});
			
				// next(vm=>{
				// 	console.log(vm.userInfo)
				// 	if(vm.userInfo){
				// 		if(typeof to.query.goods_data=='string'){ //返回上一页的时候
				// 			//console.log(vm.itemArray);
				// 			vm.goods_attribute=vm.attributeData	
				// 			vm.itemArr=vm.itemArray	
				// 			if(vm.itemArr.length!=0) {
				// 				vm.popupVisible=true 			
				// 			}
				// 		}else{
				// 			let goods_data=to.query.goods_data;
				// 			Vue.http.jsonp('api/mobile/Attribute',{params:{goods_id:goods_data.goods_id}}).then(rtn=>{
				// 				//console.log(rtn.data);
				// 				vm.goods_attribute=rtn.data;
				// 				vm.setAttributeData(vm.goods_attribute)
				// 			})
				// 	       // console.log(vm.goods); 			
				// 	   }
				//    }else{
				// 		Toast("是否登录了？")
				// 	}
				// });
			
		},
		watch:{
			itemArr:function (newvalue,oldvalue){
				this.setItemArr(newvalue);
				// console.log(newvalue)
			}
		},
		filters:{
			totlePrice(arr){
				let totlePrice=0;
				for(var i=0;i<arr.length;i++){
					totlePrice+=arr[i].price*arr[i].num;
					// this.num+=arr[i].num
				}
				return totlePrice;
			},
			totleNum(arr){
				let totleNum=0;
				for(var i=0;i<arr.length;i++){
					totleNum+=arr[i].num;
					// this.num+=arr[i].num
				}
				return totleNum;
			}
		},
		methods: {
			isActive(price){
				//console.log(price)
				//console.log(this.itemArr)
				for(var i=0;i<this.itemArr.length;i++){
					if(price==this.itemArr[i].price){
						//console.log(111)
						return true;
					}else{
						
					}
				}
			},
			//映射方法
			...mapMutations(['setHeadTitle','setMapHead','setFlag','setHeadFlag','setDetailHead','setBuyFoot','setSeatPurchase','setAttributeData','setItemArr']),
			//减一
			minusNum(item){
				if(item.num>1){
						item.num--;
				}else{
					Toast('disabled!')
				}
			},
			//加一
			addNum(item){
				item.num++;
			},
			//点击价格
			clickPrice(event){
				
				var clickItem=event.currentTarget;
				//console.log(event);
				var choosePrice=document.querySelectorAll('.choosePrice ul li')
				// var choseItem=document.querySelector('.choseItem');//以选价格列表
				//点击价格li，判断有没有sellOut样式（在渲染界面是加）
				if(clickItem.className=='sellOut'){
							//弹出。。。
				}else if(clickItem.className=='active'){
					clickItem.className=""
					for(var i=0;i<this.itemArr.length;i++){
						if(clickItem.innerHTML==this.itemArr[i].price){
							this.itemArr.splice(i,1);
							if(this.itemArr.length==0){
								//var chooseDone=document.querySelector('.chooseDone');
								//chooseDone.style.display="none";
								this.popupVisible=false
							}					
						}
					}
				}else{
					
						//var chooseDone=document.querySelector('.chooseDone');
						//chooseDone.style.display="block";
					this.popupVisible=true
				
					//clickItem.className="active";
					this.itemArr.unshift({price:clickItem.innerHTML,num:1});
					//console.log(this.itemArr)
				}

			},
			//点击X
			clickCrow(event){
				var clickItem=event.currentTarget.parentNode;
				var clickPrice=clickItem.querySelector('.itemPrice').innerHTML;
				var choosePrice=document.querySelectorAll('.choosePrice ul li')
				//console.log(clickPrice);
				for(var i=0;i<this.itemArr.length;i++){
						if(clickPrice==this.itemArr[i].price){
							this.itemArr.splice(i,1);
							if(this.itemArr.length==0){
								this.popupVisible=false
								// var chooseDone=document.querySelector('.chooseDone');
								// chooseDone.style.display="none";
							}					
						}
				}
				for(var j=0;j<choosePrice.length;j++){
					if(choosePrice[j].innerHTML==clickPrice){
						choosePrice[j].className="";
					}

				}

			},
			//点击隐藏/显示
			HideOrShow(event){
				var choseItem=document.querySelector('.choseItem')
				var clickItem=event.currentTarget;
				//console.log(clickItem.childNodes[0])
				if(choseItem.style.display=='none'){
					choseItem.style.display='block'
					clickItem.childNodes[0].className="fa fa-angle-down"
				}else{
					choseItem.style.display='none'
					clickItem.childNodes[0].className="fa fa-angle-up"
				}
			}
		},
		components:{
			ticking
		}
	}


</script>
<style type="text/css" scoped>
	*{
		margin: 0;
		padding:0;
	}
	body,html{
		background-color:#f2f2f2!important;
	}

	.chooseTime{
		width:100%;
		overflow: hidden;
		border-top:1px solid #f2f2f2;
		box-shadow: 0px -1px 0px #ededed;
		margin-top: 5rem;
		padding-bottom: 0.5rem;
		border-bottom: 1px solid #f2f2f2;
		box-shadow: 0px 1px 0px #ededed;
		box-sizing:border-box;
		margin-bottom: 0.5rem;
		background-color: #fff;
	}
	.chooseTime p,.choosePrice p{
		font-size: 0.65rem;
		color:#000;
		text-align: left;
		margin-left: 0.4rem;
		margin-top: 0.8rem;
	}
	.chooseTime ul li,.choosePrice ul li{
		width: 5.1rem;
		height: 2.5rem;
		font-size: 0.6rem;
		color:#000;
		line-height: 1.0rem;
		background-color: #fff;
		box-sizing: border-box;
		border:2px solid #ccc;
		float: left;
		margin-left: 0.5rem;
		text-align: center;
	}
	.chooseTime ul li span:nth-child(1){
		display: inline-block;
    	margin-top: 5px;
	}
	.chooseTime ul li.active,.choosePrice ul li.active{
		border:none;
		color:#fff;
		background-color: #e30231
	}

	.choosePrice{
		background-color: #fff;
		overflow: hidden;
		padding-bottom: 0.5rem;
	}
	.choosePrice ul li{
		line-height: 2.5rem;
		margin-bottom: 0.5rem;
	}
	.choosePrice ul li.sellOut{
		background-color: #fbfbfb;
		color:#cfcfcf;
	}

	.seatClick{
		width: 100%;
		height: 15rem;
		background-color: red;
		margin-top: 5.6rem;
	}
	.buyIt{
		overflow: hidden;
		position: fixed;
		bottom: 0rem;
		left: 0rem;
		width: 100%;
		background-color: #fff;
	}
	.choseItem{
		max-height: 6rem;
		overflow-y: scroll;
	}
	::-webkit-scrollbar{width:0px}
	::-moz-scrollbar{width:0px}
	.choseItem li {
		margin:0.25rem 0;
	}
	.choseItem li span.itemPrice{
		font-size: 0.6rem;
		color:#1b1b1b;
		margin-left: 0.3rem;
		display: inline-block;
		width: 1rem;
	}
	.choseItem li input{
		width:1.5rem;
		height: 1.5rem;
		background-color: #e8e8e8;
	}
	.choseItem li input.minus{
		margin-left: 7.25rem;
	}
	.choseItem li span.itemNum{
		width:3rem;
		height: 1.5rem;
		background-color: #e8e8e8;
		display: inline-block;
		text-align: center;
		font-size: 0.7rem;
		color:#000;
		line-height: 1.5rem;
		margin:0 0.25rem;
	}
	.choseItem li i{
		font-size: 0.75rem;
		color: #000;
		font-weight: normal;
		margin-left: 0.75rem;
	}
	.chooseDone{
/*		display: none;
*/		height: 2.5rem;
		line-height: 2.5rem;
		overflow: hidden;
		border:1px solid #f0f0f0;
		box-shadow: 0px -1px 0px #f7f7f7;
	}

	.chooseDone li{
		width: 50%;
		height: 100%;
		float: left;
		font-size: 0.6rem;
		color: #9a9a9a;
	}
	.chooseDone li span{
		color:#181818;
	}
	.chooseDone li.left span.clickShow{
		height: 1rem;
		width:1rem;
		display: inline-block;
		border:1px solid #d4325f;
		border-radius: 50%;
		vertical-align: middle;
   		margin-top: -0.25rem;
   		position: relative;
   		margin:0 0.5rem;
	}
	.chooseDone li.left span.clickShow i{
		position: absolute;
		color:#fe0000;
		margin-left: 0.25rem;
		top:0.15rem;
	}
	.chooseDone li.left span.totle{
		padding:0.25rem 0 0.25rem 0.5rem;
		border-left: 1px solid #dadada;
		color:#d60032;
		font-size: 0.7rem;
	}
	.chooseDone li.left span.totle em{
		font-size: 0.8rem;
		font-style: normal;
	}
	.chooseDone li.left span.totle i{
		font-style: normal;
		margin-left: 0.55rem;
		color:#0a0a0a;
	}
	.chooseDone li.right{
		background-color: #e31c47;
		font-size: 0.7rem;
		text-align: center;
	}
	.chooseDone li.right a{
		color:#fff;
	}
</style>
