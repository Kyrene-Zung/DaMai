<template>
	<div>
	<!-- 推荐页面显示的头部 -->
		<section v-if="$route.path=='/'" class="Rhead" >

			<div style="margin-top:1rem;">
				<div class="city" @click="location()">
					<span>广州</span>  
					<i class="fa fa-chevron-down" aria-hidden="true"></i>
				</div>
				<div class="mui-input-row mui-search">
					<i class="fa fa-search" aria-hidden="true"></i>
					<input type="search" class="mui-input-clear" placeholder="搜索明星、演出、赛事、场馆">
				</div>
				<i class="fa fa-commenting-o xiaoxi" aria-hidden="true"></i>
			</div>
		</section>
	<!-- 分类页面显示的头部 -->
		<div v-if="$route.path=='/category'">
			<mt-header fixed :title="headTitle" >
			</mt-header>
			<div class="location" @click="location()">
				<span>广州</span>  <i class="fa fa-chevron-down" aria-hidden="true"></i>
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
		<div  v-if="$route.path=='/seatPurchase'||$route.path=='/buyNow'||$route.path=='/placeOrder'||$route.path=='/chooseAddress'||$route.path=='/addAddress'||$route.path=='/pay'||$route.path=='/orderDetail'||$route.path=='/addressMan'" >
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
			<router-link to="infor" class="icon iconfont icon-pingjia mui-pull-right " style="color:#fff"></router-link>
			<router-link to="scan_code" class="icon iconfont icon-saoerweima mui-pull-right" style="color:#fff"></router-link>
		</div>
	</div>
	
</template>
<script type="es6">
import ticking from '../components/cate/tick'
import Vue from 'vue'
import {mapState} from 'vuex'
export default {
  name: 'heading',
  computed: {//激活的时候
    ...mapState(['headTitle']), //映射属性
  },
  components:{
  	ticking
  },
  methods:{
  	location(){
  		this.$router.push({'path':'/location'})
  	}
  }
}

</script>
<style lang="scss" scoped>
.headStyle{
	border-bottom: 1px solid #ccc !important;
	height: 3.5rem !important;
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
.Rhead .city i{font-size: 0.3rem;margin-left:-0.3rem;}

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
