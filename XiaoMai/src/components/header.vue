<template>
	<div>
	<!-- 推荐页面显示的头部 -->
		<section v-if="$route.path=='/'" class="Rhead" id="recommand">

			<div style="margin-top:1rem;overflow:hidden" v-if="homeSearch">
				<div class="city" @click="location()">
					<span>{{searchCriteria.curCity}}</span>  
					<i class="fa fa-chevron-down" aria-hidden="true"></i>
				</div>
				<div class="mui-input-row mui-search">
					<i class="fa fa-search" aria-hidden="true"></i>
					<input type="search" class="mui-input-clear" placeholder="搜索明星、演出、赛事、场馆">
				</div>
				<i class="fa fa-commenting-o xiaoxi" aria-hidden="true"></i>
			</div>
			<div style="margin-top:1rem;overflow:hidden" id="homeSearch" v-if="!homeSearch">
				<div class="city" @click="location()">
					<span>{{searchCriteria.curCity}}</span>  
					<i class="fa fa-chevron-down" aria-hidden="true"></i>
				</div>
				<div class="mui-input-row mui-search">
					<i class="fa fa-search" aria-hidden="true"></i>
					<input type="search" class="mui-input-clear" placeholder="搜索明星、演出、赛事、场馆">
				</div>
				<i class="fa fa-commenting-o xiaoxi" aria-hidden="true"></i>
			</div>
		</section>
	<!-- 主菜单二级分类页面头部 -->
	       <transition name="rightIn">
		<div v-if="$route.path=='/singing'||$route.path=='/ranking'||$route.path=='/concert'||$route.path=='/drama'||$route.path=='/sport'||$route.path=='/parenting'||$route.path=='/q_yuan'||$route.path=='/dance'" class="Rhead" style="background:#fff;border-bottom:1px solid #f6f9f8">
			<mt-button icon="back" @click.native="$router.go(-1)" style="top:1.3rem;color:#000;"></mt-button>
			<div class="mui-input-row mui-search" style="margin-top:1.6rem;width:80%;margin-left:2.2rem;">
				<i class="fa fa-search" aria-hidden="true"></i>
    			<input type="search" class="mui-input-clear" placeholder="搜索明星、演出、赛事、场馆"
    			style="font-size:0.6rem;border-radius:5rem;height: 1.5rem;background: #f1f5f4;opacity: 0.5;color:#acb0b1;">
			</div>
		</div>
		</transition>
		<!-- 电影分类页面显示的头部 -->
		<transition name="rightIn">
			<div v-if="$route.path=='/movie'" class="Rhead" style="background:#ef0832;">
				<mt-button icon="back" @click.native="$router.go(-1)" style="top:1.3rem;color:#fff;"></mt-button>
				<mt-header fixed :title="headTitle" style="background:transparent !important;width:75%;text-align:left;margin-left:2rem;padding-top:0.5rem;" class="movieHead"></mt-header>
				<div to="/" class="city" style="float:right;margin-right:0.75rem;margin-top:1.25rem;height: 100%;">
					<span style="font-size:0.8rem;margin-right:0.25rem;">北京</span>
					<i class="fa fa-angle-down" aria-hidden="true" style="font-size:0.9rem;font-weight:100;"></i>  
					<!-- <i class="fa fa-chevron-down" aria-hidden="true" style="font-size:0.9rem;font-weight:100;"></i> -->
				</div>
			</div>
		</transition>

		<!-- 主题详细页面的头部 -->
		<transition name="rightIn">
			<div v-if="$route.path=='/star'" class="Rhead" style="background:#ef0832;">
				<mt-button icon="back" @click.native="$router.go(-1)" style="top:1.3rem;color:#fff;z-index:3005;"></mt-button>
				<mt-header fixed :title="headTitle" style="background:transparent !important;width:75%;text-align:left;margin-left:2rem;padding-top:0.5rem;color:#fff;margin-left:-2rem;"></mt-header>
				<i class="fa fa-share-alt" aria-hidden="true" style="float:right;color:#fff;margin-right:0.75rem;margin-top:1.9rem;"></i>
			</div>
		</transition>
	<!-- 分类页面显示的头部 -->
		<div v-if="$route.path=='/category'">
			<mt-header fixed :title="headTitle" >
			</mt-header>
			<div class="location" @click="location()">
				<span>{{searchCriteria.curCity}}</span>  <i class="fa fa-chevron-down" aria-hidden="true"></i>
			</div>
			
		<!--分类页面排序弹出框 -->
			<ticking></ticking>
		</div>

	<!-- 商品详情页面显示的头部 -->
		<div v-if="$route.path=='/ticketDetail'">
			<mt-header fixed :title="headTitle"  class="headStyle">
			</mt-header>
			<mt-button icon="back" @click.native="$router.go(-1)"></mt-button>
			<i class="fa fa-heart-o"></i>
			<i class="fa fa-paper-plane-o"></i>
		</div>
	<!-- 粉紫色头部 -->
		<div  v-if="$route.path=='/moreDetail'||$route.path=='/seatPurchase'||$route.path=='/buyNow'||$route.path=='/placeOrder'||$route.path=='/chooseAddress'||$route.path=='/addAddress'||$route.path=='/pay'||$route.path=='/orderDetail'||$route.path=='/addressMan'||$route.path=='/venueMap'||$route.path=='/mine/login/index'||$route.path=='/mine/login/register'||$route.path=='/mine/set/index'||$route.path=='/m_recommend'||$route.path=='/edt_recommend'" >
			<mt-header fixed :title="headTitle"  class="mapHead">
			</mt-header>
			<mt-button icon="back" @click.native="$router.go(-1)" class="pinkBack"></mt-button>
		</div>
	<!-- 大麦订单头部 -->
		<div  v-if="$route.path=='/damaiOrder'" >
			<mt-header fixed :title="headTitle"  class="mapHead">
			</mt-header>
			<mt-button icon="back" @click.native="$router.push({path:'/mine/index'})" class="pinkBack"></mt-button>
		</div>
	<!-- 个人中心头部 -->
		<div  v-if="$route.path=='/mine/index'" class="personal">
			<mt-header fixed  class="mapHead">
			</mt-header>
			<router-link to="set/index" class="icon iconfont icon-shezhi mui-pull-left" style="color:#fff;">
			</router-link>
			<router-link to="" class="icon iconfont icon-pingjia mui-pull-right " style="color:#fff"></router-link>
			<router-link to="" class="icon iconfont icon-saoerweima mui-pull-right" style="color:#fff"></router-link>
		</div>
	<!-- 账户管理页面显示的头部 -->
		<!-- <div v-if="$route.path=='/accountMan'">
			<mt-header fixed :title="headTitle"  class="headStyle">
			</mt-header>
			<mt-button icon="back" @click.native="$router.go(-1)"></mt-button>
		</div> -->
	</div>
	
</template>
<script type="es6">
import ticking from '../components/cate/tick'
import Vue from 'vue'
import {mapState} from 'vuex'
export default {
	data(){
		return {
			homeSearch:true
		}
	},
  name: 'heading',
  computed: {//激活的时候
    ...mapState(['headTitle','searchCriteria']), //映射属性
  },
  created(){
  	this.scroll();
  },
  components:{
  	ticking
  },
  methods:{
  	location(){
  		this.$router.push({'path':'/location'})
  	},
  	scroll(){
  		$(document).scroll(()=>{
  			// var op=0;
  			if( $(document).scrollTop()==0 ){
  				$('#recommand').css('background-color','transparent')
  				this.homeSearch=true;
  			}else{
  				// while( $(document).scrollTop()<70){
  				// 	op+=0.1
  				// 	$('#homeSearch').css('opacity',op)
  				// }
  				$('#recommand').css('background-color','#fff')
  				this.homeSearch=false;
  			}
  			
  		})
  		// console.log($('#recommand'))
  	}
  }
}

</script>
<style lang="scss" scoped>
.headStyle{
	border-bottom: 1px solid #ccc !important;
	height: 3.5rem !important;
}
@mixin keyframes($animationName){
	@keyframes #{$animationName}
	{
		@content;
	}
	@-moz-keyframes #{$animationName} /* Firefox */
	{
		@content;
	}

	@-webkit-keyframes #{$animationName} /* Safari 和 Chrome */
	{
		@content;
	}

	@-o-keyframes #{$animationName} /* Opera */
	{
		@content;
	}
}

#homeSearch{
	
	background-color: #fff;
	// opacity: 0;
	// animation: move 3s;
	// @include keyframes(move) { 
	// 	0% { background: transparent; } 
	// 	50%{background: #f3f3f3; }
	// 	100% { background: #fff; } 
	// }
	.city{
		color:#000;
	}
	input{
		background-color: #f5f5f5;
	}
	.xiaoxi{
		color:#000;
	}
}
/*********定位********/
.location{
	z-index: 3001;
	position: fixed;
	left: 0.75rem;
	top:1.5rem;
}
.location span{
	font-size: 0.7rem;
	color:#1f1f1f;
}
.location i{
	font-size: 0.3rem;
	color:#2d2d2d;
}
/********下拉图标*************/
.range{
	z-index: 3001;
	position: fixed;
	right: 0.75rem;
	top: 1.5rem;
}
.range i{
	font-size: 0.9rem;
	color:#2d2d2d;
}
/* 推荐页面头部 */
.Rhead{
	background: transparent;
	height: 3.5rem;
	width: 100%;
	position: fixed;
	top:0;
	z-index: 3000;
}
.Rhead .city{float: left;color:#000;height: 0;margin-left:0.5rem;margin-top:0.5rem;color:#fff;}
.Rhead .city span{font-size: 0.7rem;}
.Rhead .city i{font-size: 0.3rem;}

.Rhead .mui-search{
	z-index: 3001;
    width: 70%;
    float: left;
    margin-left: 3.25rem;
    margin-top: -0.2rem;
}
.Rhead .mui-search i{color:#acb0b1;position: absolute;top:0.3rem;left:1.5rem;font-size: 0.8rem;}
.Rhead div input{
	font-size:0.6rem;
	height: 2rem;
	border-radius:5rem;
	height: 1.5rem;
	background: #fff;
	opacity: 0.5;
	color:#acb0b1;
}	
.Rhead .xiaoxi{
	z-index: 3001;
	float: right;
	margin-right:0.5rem;
	color:#fff;
}

/************分类页面头部***************/
.mint-header.is-fixed{
	z-index: 3000 !important;
	background-color: #fff !important;
	height: 3.5rem;
	color: #000;
}
.mint-header-button.is-left:before{
  color:#333;
}
.mint-header.is-fixed .mint-header-title{
  color:#000;
  padding-top: 0.6rem;
  font-size: 0.9rem !important;
}

/*商品详情页面显示的头部*/
.mint-button--normal{
	position: fixed !important;
    left: 0px !important;
    top: 1.0rem !important;
    color:#000;
    z-index:3000;
}
.mint-button--default{
	background-color: transparent !important;
	box-shadow: none !important;
}
.fa-heart-o {
    content: "\F08A";
    position: absolute;
    right: 2.5rem;
    top: 1.7rem;
    z-index: 3000;
}
.fa-paper-plane-o{
	position: absolute;
    right: 0.75rem;
    top: 1.7rem;
    z-index: 3000;
}
/*场馆地图头部 */
.mint-header.mapHead.is-fixed{
	background-color: #ed1554!important;
}
.mapBack .mint-button-icon{
	color:#fff!important;
}

.personal{
	a{
		position: fixed;
		z-index: 3000;
		top:2rem;
		&:nth-child(2){	
			left:0.5rem;
		}
		&:nth-child(3){
			right: 0.6rem;
		}
		&:nth-child(4){
			
			right: 2.2rem;
		}
	}
}
</style>
