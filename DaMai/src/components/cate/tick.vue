<template>
	<div>
	<!-- 分类排序 -->
		<div v-if="$route.path=='/category'">
			<div class="range" v-if="" @click="clickRange()">
				<i class="fa fa-angle-double-down" aria-hidden="true" style="color:#000"></i>
			</div>

			<mt-popup  position="top"  v-model="popupVisible" class="popup">
				<mt-navbar v-model="selected" class="tabChoice">
					<mt-tab-item id="1">时间范围</mt-tab-item>
					<mt-tab-item id="2">排序方式</mt-tab-item>
					<div style="height:7.2rem;"></div>
				</mt-navbar>

				<mt-tab-container v-model="selected" class="content">
					<mt-tab-container-item id="1" class="timeRange">
						<i class="fa fa-check" aria-hidden="true"></i><div v-for="time in timeRange " @click="timeRanging(time)" class="mtCellDiv"><mt-cell :title="time" /></div>
					</mt-tab-container-item>
					<mt-tab-container-item id="2" class="rangeType">
						<i class="fa fa-check" aria-hidden="true"></i><div v-for="range in rangeType" @click="rangeTyping(range.rangeAttr)" class="mtCellDiv"><mt-cell  :title="range.rangeName" /></div>
						<!-- <mt-cell title="按更新时间" />
						<mt-cell title="按演出时间" /> -->
				   <!--  <mt-cell title="" />
				   <mt-cell title="" /> -->
				   </mt-tab-container-item>
				</mt-tab-container>
			</mt-popup>
		</div>

	<!-- 选座购买选时间 -->
		<div v-if="$route.path=='/seatPurchase'">
			<div class="pushDown"  @click="clickTriangle()">
				<div class="push">
					<span class="date">2017-08-11 周五 19:00</span><span class="triangle"></span>
				</div>
			</div>
			<mt-popup  position="top"  v-model="popupVisible" class="clickTime">
				<mt-tab-container class="time">
					<i class="fa fa-check" aria-hidden="true"></i><mt-cell :title="time.date+' '+time.week+' '+time.time" v-for="time in timeArr"/>
					<!-- <mt-cell title="2017-08-12 周六 19:00" /> -->
				</mt-tab-container>
			</mt-popup>
		</div>
	</div>

</template>

<script type="es6">
import {mapState, mapMutations} from'vuex'
import Vue from 'vue'
export default {
  name: 'ticking',
  data() {
  	return {
  		popupVisible:false,
  		selected:'1',
  		timeRange:['全部时间','今天','明天','一周内','一个月内'],
  		rangeType:[{rangeAttr:'hot',rangeName:'按热门'},{rangeAttr:'create_time',rangeName:'按更新时间'},{rangeAttr:'show_time',rangeName:'按演出时间'}],
  	}
  },
  computed: {//激活的时候
    ...mapState(['timeArr','searchCriteria']), //映射属性
  },
  methods:{
  	timeRanging(choice){ //  点击时间范围
  		this.setSearchCriteria({key:'rangeType',value:choice})
  		// console.log(this.setSearchCriteria)
  		 Vue.http.jsonp('api/mobile/Goods/search',{params:this.searchCriteria}).then(rtn =>{ 
              this.setGoodsList(rtn.data)
          });
  	},
  	rangeTyping(choice){ //  点击排序方式
  		this.setSearchCriteria({key:'rangeType',value:choice})//改变搜索条件
  		// console.log(this.setSearchCriteria)
  		 Vue.http.jsonp('api/mobile/Goods/search',{params:this.searchCriteria}).then(rtn =>{ 
              this.setGoodsList(rtn.data)
          });

  	},
  	clickRange(){ //  出现选项栏
  		if(this.popupVisible){
  			this.popupVisible=false;
  		}else{
  			this.popupVisible=true;
  			var timeRange=document.querySelectorAll('.timeRange .mtCellDiv');
  			var rangeType=document.querySelectorAll('.rangeType .mtCellDiv');
  			this.tick(timeRange,()=>{
  				this.popupVisible=false;
  				//this.$router.push({path:'/category'})
  			});
  			this.tick(rangeType,()=>{
  				this.popupVisible=false;
  				//this.$router.push({path:'/category'})
  			});
  		}
  	},
	tick(ele,fn){
		//console.log(ele)
		for(var i=0;i<ele.length;i++){
			ele[i].index=i;
			ele[i].onclick=function(){
				//console.log(this)
				var parent = this.parentNode;
				for(var j=0;j<ele.length;j++){
					//console.log(ele[j].previousSibling)
					if(ele[j].previousSibling){
						// console.log(ele[j].previousSibling)
						if(ele[j].previousSibling.nodeName=='I'){
							//console.log(ele[j].previousSibling)
							// console.log(ele[j].previousSibling.nodeName)
							parent.removeChild(ele[j].previousSibling); 
						}
					}
				}
				 var newElement=document.createElement('i');
				 newElement.className='fa fa-check';
				 newElement.ariaHidden="true";
				 newElement.style.top=14*(2*this.index+1)+20*this.index+'px';
				 parent.insertBefore(newElement, this); 

				 var date=document.querySelector('.push .date');
				 if(date){
				 	var text=this.querySelector('.mint-cell-wrapper .mint-cell-text').innerText;
				 	date.innerText=text;
				 }
				 if(fn){
				 	fn();
				 }
			}
		}
	},

  	clickTriangle(eve){ //  选座购买时点击时间打勾
  		eve=eve||event;
  		eve.stopPropagation();
  		var triangle=document.querySelector('.push .triangle');

  		if(triangle.className=='triangle rotateDown'){
  			triangle.className="triangle rotateUp";
  			this.popupVisible=false;
  		}else{
  			triangle.className="triangle rotateDown";
  			this.popupVisible=true;
  		}
  		this.documentClick();
  		var time=document.querySelectorAll('.time .mint-cell');
  		this.tick(time);
	},
	documentClick(){
		document.onclick=()=>{
			if(this.popupVisible==false){
				this.clickTriangle();
			}else{
				return;
			}
			document.onclick=null;
		}
	},
	...mapMutations(['setSearchCriteria','setGoodsList'])
  },
}
// function clickItem(){
// 	var timeRange=document.querySelectorAll('.timeRange .mint-cell');
// 	var rangeType=document.querySelectorAll('.rangeType .mint-cell');
// 	tick(timeRange);
// 	tick(rangeType);
// 	//console.log(timeRange)
// }
// function tick(ele){
// 	// console.log(ele)

// 	for(var i=0;i<ele.length;i++){
// 		ele[i].index=i;
// 		ele[i].onclick=function(){
// 			//console.log(this)
// 			var parent = this.parentNode;
// 			for(var j=0;j<ele.length;j++){
// 				//console.log(ele[j].previousSibling)
// 				if(ele[j].previousSibling){
// 					// console.log(ele[j].previousSibling)
// 					if(ele[j].previousSibling.nodeName=='I'){
// 						//console.log(ele[j].previousSibling)
// 						// console.log(ele[j].previousSibling.nodeName)
// 						parent.removeChild(ele[j].previousSibling); 
// 					}
// 				}
// 			}
// 			 var newElement=document.createElement('i');
// 			 newElement.className='fa fa-check';
// 			 newElement.ariaHidden="true";
// 			 newElement.style.top=14*(2*this.index+1)+20*this.index+'px';
// 			 parent.insertBefore(newElement, this); 

// 			 var date=document.querySelector('.push .date');
// 			 if(date){
// 			 	var text=this.querySelector('.mint-cell-wrapper .mint-cell-text').innerText;
// 			 	date.innerText=text;
// 			 }
// 		}
// 	}
// }

</script>
<style type="text/css">
/********下拉选择框*************/
.range{
	position: fixed;
    color: #000;
    z-index: 3000;
    right: 1.25rem;
    top: 1.6rem;
}
.popup.mint-popup-top{
	width: 100%;
	display: flex;
	top:3.5rem;
}
.popup .tabChoice.mint-navbar{
	flex: 1;
	flex-direction: column;
}
.popup .tabChoice .mint-tab-item{
	display: inline;
	flex: 1;
	border-bottom: 1px solid #e1e1e1;
	color: inherit;
}
.popup .tabChoice .mint-tab-item:nth-child(3),.popup .tabChoice .mint-tab-item:nth-child(4),.popup .tabChoice .mint-tab-item:nth-child(5){
		border-bottom: none;
}
.popup .tabChoice.mint-navbar .mint-tab-item.is-selected{
   color: #c50139;
   border-bottom: none;
   background:#f1f5f4;
}
.popup .content.mint-tab-container{
	flex: 2;
	height: 12rem;
	background-color: #f1f5f4;
	position: relative;
}
.popup .content.mint-tab-container .mint-cell{
	background-color: #f1f5f4;
}
.fa-check{
	position: absolute;
	right: 1rem;
	top: 0.7rem;
	font-size: 0.6rem;
	color:#c9164d;
	z-index: 3000;
}
/*选座购买下拉样式*/
.clickTime.mint-popup-top{
	width: 100%;
	top:5.5rem;
	text-align: center;
}
/*.clickTime .mint-tab-container.time {
	display: flex;
	flex-direction: column;
}*/
.clickTime .mint-tab-container.time .mint-tab-container-wrap{
	width: 100%;
	display: flex;
	flex-direction: column;
}
.clickTime .time {
	position: relative;
}
.clickTime .time .mint-cell .mint-cell-text{
	 color: #cb0645;
    font-size: 0.6rem;
}
.clickTime .time i{
	font-size: 0.6rem;
}
/*选座购买头部点击样式*/
.push{
	height: 2rem;
	padding-top: 0.5rem;
	box-sizing: border-box;
	border-bottom: 1px solid #d694b2;
	box-shadow: 0px 1px 0px #ead6d8;
	position: relative;
	z-index: 3000;
	background-color: #fff;
}
.push span{
	color:#cb0645;
	font-size: 0.6rem;
}
.push span.triangle{
/*	border-top:4px solid #cd093a;*/
	border-right: 0.3rem solid transparent;
	border-bottom: 0.4rem solid #cd093a;
	border-left: 0.3rem solid transparent;
    margin-left: 0.25rem;
    margin-top: -2.4rem;
    display: inline-block;
}
.pushDown{
	margin-top: 70px;
    text-align: center;
}
.rotateDown{
	transform: rotate(180deg);
/*	transition: 0.3s*/
}
.rotateUp{
	transform: rotate(0deg);
/*	transition: 0.3s*/
}
</style>
