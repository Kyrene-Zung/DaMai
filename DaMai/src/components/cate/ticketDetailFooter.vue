<template>
	<div>
	<!-- 商品详情页面显示的3种尾部 -->
		<mt-tabbar style="position:fixed;"  v-show="buyFoot">
	       <mt-tab-item id="" style="flex:1 !important" class="aaaa">
	          <router-link to="/">
	           <i class="fa fa-headphones" aria-hidden="true" style="display:block;color:#d0032e;font-size:0.75rem;padding-bottom:0.25rem;"></i>
	          客服
	          </router-link>
	       </mt-tab-item>
	       <mt-tab-item id="" style="flex:2 !important;background-color:#fb8200;" class="bottom">
	        <router-link :to="{path:'/seatPurchase',query:{goods_data:goods_data}}" @click="isLogin()">选座购买</router-link>
	       </mt-tab-item>
	       <mt-tab-item id="" style="flex:2 !important;background-color:#e31c45;" class="bottom">
	         <router-link :to="{path:'/buyNow',query:{goods_data:goods_data}}"  @click="isLogin()">立即购买</router-link>
	       </mt-tab-item>
	    </mt-tabbar>

	    <mt-tabbar style="position:fixed;"  v-show="">
	       <mt-tab-item id="" style="flex:1 !important" class="aaaa">
	          <router-link to="/">
	           <i class="fa fa-headphones" aria-hidden="true" style="display:block;color:#d0032e;font-size:0.75rem;padding-bottom:0.25rem;"></i>
	          客服
	          </router-link>
	       </mt-tab-item>
	       <mt-tab-item id="" style="flex:4 !important;background-color:#fb8200;" class="bottom">
	        <router-link to="/category">选座购买</router-link>
	       </mt-tab-item>
	    </mt-tabbar>

	    <mt-tabbar style="position:fixed;"  v-show="">
	       <mt-tab-item id="" style="flex:1 !important" class="aaaa">
	          <router-link to="/">
	           <i class="fa fa-headphones" aria-hidden="true" style="display:block;color:#d0032e;font-size:0.75rem;padding-bottom:0.25rem;"></i>
	          客服
	          </router-link>
	       </mt-tab-item>
	       <mt-tab-item id="" style="flex:4 !important;background-color:#fb8200;" class="bottom">
	        <router-link :to="{path:'/category',query:{goods_data:goods_data}}">立即购买</router-link>
	       </mt-tab-item>
	    </mt-tabbar>
	    
	</div>
</template>

<script type="es6">
	import { mapState } from 'vuex'
	import {Toast} from 'mint-ui'
	export default {
	  name: 'ticketDetailFooter',
	  computed: {//激活的时候
	    ...mapState(['buyFoot']) //映射属性
	  },
	  props:['goods_data']
	}
</script>

<style type="text/css" scoped>
	.mint-tabbar a{
	    font-size: 0.8rem;
	    color: #000;
	    text-decoration: none;
	    padding: 1rem 0;
	    height: 2.8rem;
	}
	.mint-tabbar > .mint-tab-item.is-selected{
	  background-color: transparent;
	}
	.mint-tabbar > .mint-tab-item.is-selected .mint-tab-item-label a{
	  color:RED;
	} 
	.bottom.mint-tab-item a{
		color:#fff;
	}
	.aaaa.mint-tab-item  {
		padding:0.5rem 0;
	}
</style>
