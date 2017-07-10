<template>
	<div class="footing">
	<!-- 分类页面显示的尾部 -->
		<mt-tabbar style="position:fixed;" v-model="selected">
	       <mt-tab-item id="tab1">
	       	<!--   <i class="fa fa-home-o" aria-hidden="true" v-if="selected=='tab1'?false:true"></i>	 -->
	       	  <i class="fa fa-home" aria-hidden="true" ></i>
	          <router-link to="/">推荐</router-link>
	       </mt-tab-item>
	       <mt-tab-item id="tab2">
	       <i class="fa fa-th-large" aria-hidden="true"></i>
	        <router-link to="/category">分类</router-link>
	       </mt-tab-item>
	       <mt-tab-item id="tab3">
	         <i class="fa fa-bullseye" aria-hidden="true"></i>
	         <router-link to="/find">发现</router-link>
	        </mt-tab-item>
	       <mt-tab-item id="tab4">
	       	 <i class="fa fa-user-o" aria-hidden="true" v-if="selected=='tab4'?false:true"></i>
	       	 <i class="fa fa-user" aria-hidden="true" v-if="selected=='tab4'?true:false"></i>	
	         <router-link to="/mine/index">我的</router-link>
	        </mt-tab-item>
	    </mt-tabbar>
	</div>
</template>

<script type="es6">
	import { mapState } from 'vuex'
	export default {
	  name: 'footing',
	  data() {
	    return {	 
	    }
	  },
	 computed:{
	    ...mapState(['selected'])
	  },
	}
</script>

<style type="text/css">
	.mint-tabbar a{
	    font-size: 0.8rem;
	    color: #000;
	    text-decoration: none;
	    /*padding: 1rem 0;*/
	    height: 2.8rem;
	}
	/*.footing .mint-tabbar > .mint-tab-item{
		color:#ccc;
	}*/
	.footing .mint-tabbar > .mint-tab-item.is-selected{
		 background-color: transparent;
	  	color:#ef1553
	}
	.footing .mint-tabbar > .mint-tab-item.is-selected a{
	  	color:#ef1553
	}
	/*.mint-tabbar > .mint-tab-item.is-selected .mint-tab-item-label a{
	  color:red;
	} 
	.bottom.mint-tab-item a{
		color:#fff;
	}
	.aaaa.mint-tab-item  {
		padding:0.5rem 0;
	}*/
	.footing i{
		display:block;
		font-size:1.2rem;
		margin-bottom:3px;
	}
</style>
