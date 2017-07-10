 <template>
<transition name="rightIn">
	<div style="background-color:#f2f2f2!important">	
		<div class="chooseTime">
			<p>选择时间</p>
			<ul>
				<li :class="{'active':time.status}" v-for="time in timeArr" @click="chooseTime(time)">
					<span>{{time.date}}</span><br/><span>{{time.week}} {{time.time}}</span>
				</li>
				<!-- <li><span>2017-08-12</span><br/><span>周六 19:00</span></li> -->
			</ul>
		</div>

		<div class="choosePrice">
			<p>选择价格</p>
			<ul>
				<li :class="{'sellOut':!price.ticket_left,'active':isActive(price.price)}" @click="clickPrice($event,price)" v-for="price in goods_price">
				{{price.price}}
				</li>

			</ul>
		</div>
<!-- 选择不缺货票价弹出 -->
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
<!-- 选择缺货票价弹出 -->
		<mt-popup v-model="popupVisible2" position="bottom" class="outOfStock">
		 	<div class="lackHeader">
		 		<span>缺货登记</span><span @click="close()">关闭</span>
		 	</div>
		 	<div class="lackBody">
		 		<div class="lackMesg lackBorder">
		 			<div class="lackContainer">
		 				<h4>黎明Leon Random Run 2017演唱会（广州站）</h4>
		 				<p>时间：2017.08.11-2017.08.12</p>
		 				<div><span><em>{{lackPrice}}.0</em>元</span><span>暂时缺货</span></div>
		 			</div>
		 		</div>
		 		<div class="lackInput">
		 			<div class="lackContainer lackBorder">
		 				<input type="" name="" placeholder="请输入真是号码，方便我们与您联系">
		 			</div>
		 		</div>
		 		<div class="reminder">
		 			<div class="lackContainer">
		 				<p>温馨提示:我们会记录您的基本信息，待到货时我们会第一时间通知您，若始终缺货，大麦网将不做另行通知。</p>
		 			</div>
		 		</div>
		 		<div class="lackLink lackBorder">
		 			<div class="lackContainer">
		 				<div class="piaoHu">
		 					<div class="huLogo"><img src=""></div>
		 					<div class="huText">
		 						<p>没有票？登记还靠碰运气！</p>
		 						<p>去票乎看看，多档价位任你淘！</p>
		 					</div>
		 					<div class="goTao"><a href="">去淘票</a></div>
		 				</div>
		 			</div>
		 		</div>
		 		<div class="lackButton">
		 			<div class="lackContainer">提交</div>
		 		</div>
		 	</div>
		</mt-popup>		
	</div>
</transition>
	
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
				popupVisible2:false,
				itemArr:[],//选择购买的商品属性
				time:{},//选择购买的时间
				goods_price:[],
				lackPrice:'',
			}
		},
		computed:{
			...mapState(['priceData','itemArray','timeArr']),
		},
		created(){
			this.setHeadTitle('选择商品')
		},
		beforeRouteEnter(to,from,next){
			 //console.log(to.query);
			next(vm=>{
					if(typeof to.query.goods_data=='string'){ //返回上一页的时候
						//console.log(vm.itemArray);
						vm.goods_price=vm.priceData	
						vm.itemArr=vm.itemArray	//选择购买的商品属性
						if(vm.itemArr.length!=0) {
							vm.popupVisible=true 			
						}
					}else{
						let goods_data=to.query.goods_data;
						//获取该商品的属性：时间
						Vue.http.jsonp('/api/mobile/Attribute/goodsTime',{params:{goods_id:goods_data.goods_id}}).then(rtn=>{
							vm.setTimeArr(rtn.data)
							for(var i=0;i<rtn.data.length;i++){
								if(rtn.data[i].status==1){
									//获取默认时间
									vm.time=rtn.data[i];
									//获取默认时间的价格
									Vue.http.jsonp('/api/mobile/Attribute/goodsPrice',{params:{time_id:rtn.data[i].time_id}}).then(rtn=>{
										//console.log(rtn.data)
										vm.goods_price=rtn.data;
										vm.setPriceData(vm.goods_price)
									})
								}
							}
							
						})			
				   }
				});
		},
		watch:{
			itemArr:function (newvalue,oldvalue){//选择购买的商品属性改变时，就改变setItemArr
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
					if(totleNum>5){
						Toast('不能购买超过5张票！')
					}
					// this.num+=arr[i].num
				}
				return totleNum;
			}
		},
		methods: {
			isActive(price){ //控制选好价格提交后返回的价格样式
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
			chooseTime(time){ //点击选择时间事件请求api获取价格
				//console.log(this.time)
				this.itemArr=[] //清空选择的商品属性
				for(var i=0;i<this.timeArr.length;i++){ //去掉所有点击样式
					this.timeArr[i].status=0;
				}
				this.popupVisible=false
				this.time=time;
				// console.log(this.time)
				time.status=1;
				this.askPrice(time.time_id)
			},
			askPrice(time_id){
				Vue.http.jsonp('/api/mobile/Attribute/goodsPrice',{params:{time_id:time_id}}).then(rtn=>{
					// console.log(rtn.data)
					this.goods_price=rtn.data;
					this.setPriceData(rtn.data)
				})
			},
			//点击价格
			clickPrice(event,price){
				
				var clickItem=event.currentTarget;
				//console.log(event);
				var choosePrice=document.querySelectorAll('.choosePrice ul li')
				// var choseItem=document.querySelector('.choseItem');//以选价格列表
				//点击价格li，判断有没有sellOut样式（在渲染界面是加）
				if(clickItem.className=='sellOut'){
					this.popupVisible2=true
					this.lackPrice=price.price //缺货的价格
				}else if(clickItem.className=='active'){
					clickItem.className=""
					for(var i=0;i<this.itemArr.length;i++){
						if(clickItem.innerHTML==this.itemArr[i].price){
							this.itemArr.splice(i,1);//控制订单列表
							if(this.itemArr.length==0){
								this.popupVisible=false
							}					
						}
					}
				}else{
					//点击购买商品属性
					this.popupVisible=true
					var obj=Object.assign({},this.time,{price:price.price,num:1})
					// let obj=$.extend(this.time,{price:clickItem.innerHTML,num:1})
					this.itemArr.unshift(obj);
					// console.log(this.itemArr)
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
			//减一
			minusNum(item){
				if(item.num>1){
					item.num--
					var index=this.itemArr.indexOf(item)
					this.itemArr[index].num=item.num	
				}else{
					Toast('disabled!')
				}
			},
			//加一
			addNum(item){
				item.num++
				var index=this.itemArr.indexOf(item)
				this.itemArr[index].num=item.num
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
			},
			close(){//关闭缺货登记
				this.popupVisible2=false;
			},
			//映射方法
			...mapMutations(['setHeadTitle','setPriceData','setItemArr','setTimeArr']),
		},
		components:{
			ticking
		}
	}


</script>
<style lang="scss" scoped>
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
		line-height: 0;
	}
	.choseItem li input{
		width:1.5rem;
		height: 1.5rem;
		background-color: #e8e8e8;
		vertical-align: middle;
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
/***缺货****/
	// 公共样式
	.lackContainer{
		width: 16.8rem;
		margin:auto;
	}
	.lackBorder{
		border-bottom: 1px solid #eeeeee;
		box-shadow: 0px 1px 0px #f7f7f7;
	}
	//主样式
	.outOfStock{
		width: 100%;
		.lackHeader{
			height: 2.25rem;
			line-height: 2.25rem;
			background-color:#e31c45;
			span{
				font-size: 0.75rem;
				color:#fff;
				&:nth-child(1){
					margin-left: 0.6rem;
				}
				&:nth-child(2){
					margin-left: 12rem;
				}
			}
		}
		.lackBody{
			.lackMesg{
				h4{
					font-size: 0.75rem;
					font-weight: 500;
				    padding:0.75rem 0;
				}
				p{
					color: #494949;
					padding-bottom:0.5rem;
				}
				div{
					padding-bottom: 0.25rem;
					span{
						font-size: 0.6rem;
						color: #d40c35;
						em{
							font-style: normal;
							font-size: 0.7rem;
						}
						&:nth-child(2){
							// display: inline-block;
							// width: 
							padding:0.3rem 0.25rem;
							background-color: #494949;
							color: #fff;
							margin-left: 10rem;
						}
					}
				}
			}
			.lackInput{
				margin-top: 1rem;
				input{
					width: 100%;
					border:none;
					font-size: 0.65rem;
					padding-bottom: 0.4rem;
					padding-left: 3rem;
				}
			}
			.reminder{
				background-color: #f8f8f8;
				padding:0.5rem 0;
				p{
					color: #707070;
				}
			}
			.lackLink{
				padding: 0.75rem 0;
				.lackContainer{
					background-color:#f8f8f8; 
					.piaoHu{
						font-size: 0.6rem;
						width: 15.4rem;
						margin:auto;
						height: 2rem;
						.huLogo{
							float: left;
							height: 100%;
							width: 2rem;
							img{
								height: 100%;
								width:100%; 
							}
						}
						.huText{
							margin-left: 0.25rem;
							float: left;
							p{
								&:nth-child(1){color: #c31416;}
								&:nth-child(2){color: #010101;}
							}
						}
						.goTao{
							float: right;
							border:2px solid #eeeeee;
							border-radius: 5px;
							margin:0.5rem 0;
							a{
								font-size: 0.6rem;
								color: #c31416;
								padding:0.3rem 0.35rem;
							}
						}
					}
				}
			}
			.lackButton{
				overflow: hidden;
				padding:0.5rem 0;
				.lackContainer{
					height: 2.3rem;
					background-color: #e31c45;
					text-align: center;
					line-height: 2.3rem;
					color: #fff;
					font-size: 0.8rem;
				}
			}
		}
	}
</style>
