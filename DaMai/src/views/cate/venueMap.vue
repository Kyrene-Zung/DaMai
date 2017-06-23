<template>
<transition name="rightIn">
	   <div style="background: #f2f2f2;">
   		<i class="fa fa-rss" aria-hidden="true"></i>
   		<div class="map" id="allmap">
   			
   		</div>
   		<div class="mapTab bottomBorder">
   			<ul>
   				<li>
   					<span>360</span>
   					<p>360<sup>。</sup>全景</p>
   				</li>
   				<li>
   					<span><i class="fa fa-home" aria-hidden="true"></i></span>
   					<p>场馆演出</p>
   				</li>
   				<li>
   					<span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
   					<p>查周边</p>
   				</li>
   			</ul>
   		</div>
   		<div class="venue bottomBorder">
   			<ul>
   				<li class="bottomBorder">演出场地</li>
   				<li>广州国际体育演艺中心<i class="fa fa-map-marker" aria-hidden="true"> 开创大道2666号</i></li>
   			</ul>
   		</div>
   		<div class="vueneIntroduce bottomBorder">
   			<ul>
   				<li class="bottomBorder">场馆介绍</li>
   				<li>场馆介绍场馆介绍场馆介绍场馆介绍场馆介绍场馆介绍场馆介绍场馆介绍多少个发公司的格式是否还是跟我撒谎啥</li>
   			</ul>
   		</div>
   </div>
</transition>

</template>

<script type="es6">
import {mapState, mapMutations} from 'vuex'
	export default{
		created(){
			this.setHeadTitle('场馆地图')
			this.setMapHead(true)
		    this.setDetailHead(false)
			this.setBuyFoot(false)
			// this.setFlag(false)
		    this.setHeadFlag(false)
		    this.setSeatPurchase(false)
		    //map();
		},
		mounted(){
			var map = new BMap.Map("allmap");          
			map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
			var local = new BMap.LocalSearch(map, {
				renderOptions:{map: map}
			});
			local.search(this.goodsData.venue);
		},
		computed:{
			...mapState(['goodsData'])
		},
		methods: {
			...mapMutations(['setHeadTitle','setMapHead','setFlag','setHeadFlag','setDetailHead','setBuyFoot','setSeatPurchase'])
		}

	}

</script>

<style type="text/css" scoped>
/*公共样式*/
	.bottomBorder{
		border-bottom: 1px solid #f2f2f2;
		box-shadow:0px 1px 0px #ececec;
	}
/*地图*/
	.fa-rss{
		position: absolute;
	    right: 2.0rem;
	    top: 1.7rem;
	    z-index: 3000;
	    color: #fff;
	    font-size: 1rem;
	}
	.map{
		height: 15.1rem;
		/*background-color: Red; */
		border-bottom: 1px solid #f0f2ee;
	}
	.mapTab{
		height: 4rem;
		overflow: hidden;
		width: 100%;
		margin-bottom: 0.5rem;
		background: #fff;
	}
	.mapTab ul{
		height: 3.25rem;
		margin:0.375rem 0;
	}
	.mapTab ul li{
		float: left;
		height: 3.25rem;
		width:33.333333%;
		text-align: center;
		box-sizing: border-box;
		border-right: 1px solid #f3f3f3;
		box-shadow: -1px 0px 0px #f9f9f9 inset;
		font-size: 0.65rem;
	}
	.mapTab ul li span{
		display: inline-block;
		border-radius: 100%;
		background-color: #000;
		width:2.2rem;
		height: 2.2rem;
		line-height: 2.2rem;
		color:#fff;
	}
	.mapTab ul li:nth-child(1) span{
		background-color: #23d155;
	}
	.mapTab ul li:nth-child(2) span{
		background-color: #0077ef;
	}
	.mapTab ul li:nth-child(3) span{
		background-color: #fa4111;
	}
	.mapTab ul li span i{
		font-size: 1rem;
		color:#fff;
	    line-height: 2.2rem;
	}
	.mapTab ul li p{
		color:#040404;
		font-size: 0.65rem;
	}
	.venue{
		height: 5.15rem;
		background-color: #fff;
	}

	.venue ul,.vueneIntroduce ul{
		width: 17rem;
		margin:auto;
	}
	.venue ul li:nth-child(1),.vueneIntroduce ul li:nth-child(1){
		height: 2rem;
		line-height: 2rem;
		text-align: left;
		font-size: 0.7rem;
		color:#0f0f0f;
		box-sizing: border-box;
	}
	.venue ul li:nth-child(2){
		height: 3.1rem;
		line-height: 1.8rem;
		text-align: left;
		font-size: 0.7rem;
		color:#484848;
		box-sizing: border-box;
	}
	.venue ul li i{
		display: block;
		font-size: 0.6rem;
		color:#7d7d7d;
	}
	.vueneIntroduce{
		background-color: #fff;
		overflow: hidden;
	}
	.vueneIntroduce ul li:nth-child(2){
		line-height: 1rem;
		text-align: left;
		font-size: 0.7rem;
		color:#343434;
		box-sizing: border-box;
		margin:0.7rem 0;
	}

</style>
