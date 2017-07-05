<template>	
	<transition name="rightIn">
		<div style="background-color:#f1f5f4">
			<div class="cityList">
				<mt-index-list :show-indicator="false"><!-- 点击右边字母左边跳到相应字母位置 -->
				<!-- 头部 -->
					<header class="header">
						<mt-button icon="back" @click.native="$router.go(-1)"></mt-button>
						<input type="search" name="" class="searchCity" placeholder="请输入城市名称">
					</header>
				<!-- 当前城市标题 -->
					<div class="curTitle"><span>当前城市</span></div>
					<div class="currentCity borderStyle">
						<div class="curLeft"><span>广州</span></div>
						<div class="curRight">
							<i class="fa fa-globe" aria-hidden="true"></i>
							<span>重新定位</span>
						</div>
					</div>
				<!-- 热门城市 -->
					<div class="hotCity boxStyle">
						<div class="container">
							<div class="titleCity">
								<span>热门城市</span>
							</div>
							<ul>
								<li>北京</li>
								<li>北京</li>
								<li>北京</li>
								<li>北京</li>
								<li>北京</li>
								<li>北京</li>
							</ul>
						</div>
					</div>
				<!-- 热门城市标题 -->
					<div class="allCity boxStyle">
						<div class="container">
							<div class="titleCity">
								<span>全部城市</span>
							</div>
						</div>
					</div>
				<!-- 全部城市 -->
				<mt-index-section :index="city.area" v-for="city in cityList">
					<div  @click="chooseCity(cities)"  v-for="cities in city.cities">
						<mt-cell :title="cities"></mt-cell>
					</div>
				</mt-index-section>
		</mt-index-list>
	</div>
</div>
</transition>
</template>

<script type="es6">
	import {mapState, mapMutations} from 'vuex'
	import Vue from 'vue'
	export default{
		data(){
			return{
				cityList:[
				{area:'A',cities:['澳门']},
				{area:'B',cities:['北京','北海']},
				{area:'C',cities:['北京','北海']},
				{area:'D',cities:['北京','北海']},
				{area:'E',cities:['北京','北海']},
				{area:'F',cities:['北京','北海']},
				{area:'G',cities:['广州','北海']},
				]
			}
		},
		created(){
			this.setHeadTitle('')
		  },
		computed:{
			...mapState(['searchCriteria'])
		},
		methods:{
		  	chooseCity(city){
		  		// console.log(city)
		  		this.setSearchCriteria({key:'curCity',value:city})
		  		 // console.log(this.searchCriteria)
		  		 Vue.http.jsonp('api/mobile/Goods/search',{params:this.searchCriteria}).then(rtn =>{ 
		  		 	// console.log(rtn.data)
		              this.setGoodsList(rtn.data)
		              this.$router.push({path:'/category'})
		         });
		  		
		  	},
			...mapMutations (['setHeadTitle','setSearchCriteria','setGoodsList']), // 映射方法
		}
	}
</script>

<style scoped lang="scss">
// 公共样式
.borderStyle{
	border-bottom: 1px solid #f3f5f4;
	border-top: 1px solid #f3f5f4;
}
.titleCity{
	padding:0.9rem 0;
	span{
		font-size: 0.8rem;
		color:#1e1818;
		padding-left:0.3rem;
		border-left: 1px solid #dc8794;
		box-shadow: none none none -1px 0px 0px #dd183c;
		margin:0;
	}
}
.boxStyle{
	background-color: #fff;
	margin:0.5rem 0;
}
.container{
	width:16.5rem;
	margin:auto;
}
.mint-button--default{
	background-color: #fff;
	box-shadow:none; 
	margin-top: 0.75rem;
}
	// 盒子样式
	.header{
		border-bottom: 1px solid #ccc !important;
		height: 3.5rem;
		background-color: #fff;
		position: fixed;
		width: 100%;
		z-index: 30;
		line-height: 70px;
		.searchCity{
			width:15rem;
			padding:0.4rem 0 0.4rem 0.5rem;
			
			text-align: left;
			border-radius: 1rem;
			font-size: 0.6rem;
		}
	}
	.curTitle{
		span{
			font-size: 0.6rem;
			color: #838685;
			margin:3.9rem 0 0.4rem 0.8rem;
			display: inline-block;
		}

	}
	.currentCity{
		background-color: #fff;
		overflow: hidden;
		margin:0.4rem 0;
		div{
			font-size: 0.65rem;
			color: #252525;
			padding:0.7rem 0;
			&.curLeft{
				float: left;
				margin-left: 0.8rem;
			}
			&.curRight{
				float: right;
				margin-right: 0.75rem;
			}
		}
	}
	.hotCity{
		
		ul{
			overflow: hidden;
			li{
				padding:0.3rem 0.7rem;
				border:1px solid #d4c9c9;
				box-shadow: 0 0 1px #fafafa;
				float: left;
				border-radius: 20px;
				margin-right: 0.4rem;
				margin-bottom: 0.7rem;
				font-size: 0.7rem;
			}
		}

	}
	.cityList{
		.mint-indexlist{
			overflow: inherit!important;
			position: static!important;
		}
	}
</style>
