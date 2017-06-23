<template>
	<div>
	<!-- 分类页面显示的头部 -->
		<div v-if="headFlag">
			<mt-header fixed :title="headTitle" >
			</mt-header>
			<div class="location" @click="location()">
				<span>广州</span>  <i class="fa fa-chevron-down" aria-hidden="true"></i>
			</div>
			
		<!--分类页面排序弹出框 -->
			<ticking></ticking>
		</div>

	<!-- 商品详情页面显示的头部 -->
		<div v-if="detailHead">
			<mt-header fixed :title="headTitle"  class="headStyle">
			</mt-header>
			<mt-button icon="back" @click.native="$router.go(-1)"></mt-button>
			<i class="fa fa-heart-o"></i>
			<i class="fa fa-paper-plane-o"></i>
		</div>
	<!-- 粉紫色头部 -->
	
		<div  v-if="mapHead" >
			<mt-header fixed :title="headTitle"  class="mapHead">
			</mt-header>
			<mt-button icon="back" @click.native="$router.go(-1)" class="mapBack"></mt-button>
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
    ...mapState(['headTitle','flag','headFlag','mapHead','detailHead']), //映射属性
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
<style type="text/css">
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
/************分类页面头部***************/
.mint-header.is-fixed{
	z-index: 3000 !important;
	background-color: #fff !important;
	height: 3.5rem;
}
.mint-header-button.is-left:before{
  color:#333;
}
.mint-header-title{
  color:#333;
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
	background-color: #e31c45!important;
}
.mint-header.mapHead.is-fixed .mint-header-title{
	color: #fff;
	margin-left: -9.5rem;
}
.mapBack .mint-button-icon{
	color: #fff ;
}

</style>
