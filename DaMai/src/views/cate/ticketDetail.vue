<template>
<transition name="rightIn">
	<div style="background-color:#f1f5f4;padding-bottom:3.5rem;">
	 <div class="list" style="margin-top:3rem;">
		<div class="container">
		 	<div class="top">
		 		<img :src="goods.goods_pic">
		 		<div class="textPrice">
		 			<h2>{{goods.goods_title}}</h2>
		 			<div class="seatSale">
		 				<span>座</span>
		 				<span>售票中</span>
		 			</div>
		 			<span class="price"><strong>{{goods.goods_price}}元</strong></span>
		 		</div>
		 	</div>
		 	<div class="time">
		 		<mt-cell title="" icon="date" value="" style="display:inline-block"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;{{goods.show_time}}</mt-cell>
		 	</div>
		 	<div class="address">
		 		<mt-cell title="" to="/venueMap" is-link value="" icon="map" >
		 		<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;{{goods.venue}}
				</mt-cell>
				&nbsp;&nbsp;<span class="tab">开创大道2666号</span>
		 	</div>
	  </div>
	</div>
  	
	<div class="list" style="margin-top:1rem;">
		<div class="container">
		 	<div class="seat" @click="alertSeat()">
		 		<mt-cell title="">
		 		<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;查看座位图
				</mt-cell>
		 	</div>
	  </div>
	</div>

	<div class="seatPic">
		<mt-popup v-model="popupVisible" position="middle">
			<img :src="goods.goods_pic">
		</mt-popup>
	</div>

	<div class="list" style="margin-top:1rem;">
		<div class="container">
			<div class="time starTeam">
		 		<mt-cell title="明星团队" icon="date" value="" style="display:inline-block"></mt-cell>
		 	</div>
		 	<div class="starPic">
		 		<img :src="goods.goods_pic">
		 		<p class="name">黎明</p>
		 	</div>
	  </div>
	</div>

	<div class="list">
		<div class="container">
			<div class="time starTeam">
		 		<mt-cell title="项目详情" icon="date" value="" style="display:inline-block"></mt-cell>
		 	</div>
		 	<div class="itemDetail">
		 		<p>
				　　深圳公司购票地址：深圳市罗湖区人民南路3012号天安国际大厦B栋2403室</br>			　　佛山公司购票地址：佛山市禅城区季华六路3号九鼎国际2座金融中心1618室</br>
				　　广州公司购票地址：广州市越秀区东风东路753号天誉商务大厦东塔2301-2303（东峻广场马路对面））</br>								
				　　东莞公司购票地址：东莞市南城区莞太大道58号方中元美广场A1座1704房</br>			
				　　中山纪念堂购票地址：广州市越秀区东风中路259号中山纪念堂北门票房<br>
				　　全国统一购票电话：10103721/400-610-3721<br>
				　　提示：“在线选座”的顾客上门取票地址只支持到广州公司</br>
				 　　本次黎明Leon Random Ru...
				</p>
		 	</div>
		 	<div class="moreDetail">
		 		<mt-cell title="更多详情" to="/moreDetail" value="" style="display:inline-block" @click="init()"></mt-cell>
		 	</div>
	  </div>
	</div>

	<div class="list">
		<div class="container">
			<div class="time starTeam purchaseNotes">
		 		<mt-cell title="购买须知" icon="date" value="" style="display:inline-block;"></mt-cell>
		 	</div>
		 	<div class="time starTeam limitBuy">
		 		<mt-cell title="限购：" icon="date" value="" style="display:inline-block"></mt-cell>
		 		<span>在线选座系统限定6张。</span>
		 	</div>
		 	<div class="time starTeam childTip">
		 		<mt-cell title="儿童入场提示" icon="date" value="" style="display:inline-block"></mt-cell>
		 		<span>1.2米以下儿童谢绝入场（儿童项目除外），1.2米以上儿童需持票入场。</span>
		 	</div>
	  </div>
	</div>

	<div class="list">
		<div class="container">
			<mt-cell title="网友点评 (0)" to="//github.com" is-link value="" >
			</mt-cell>
		</div>
	</div>

	<div class="list">
		<div class="container">
			<mt-cell title="客服答疑 (125)" to="//github.com" is-link value="" icon="map" >
			</mt-cell>
		</div>
	</div>
	<ticketDetailFooter :goods_data="goods"></ticketDetailFooter>
</div>
</transition>
	

</template>

<script type="es6">
import { mapMutations, mapState} from 'vuex'
import ticketDetailFooter from '../../components/cate/ticketDetailFooter'

export default{
  data(){
  	return {
  		popupVisible:false,
  		goods:[]
  	}
  },
  computed: {//激活的时候
    ...mapState(['goodsData']), //映射属性
  },
  created () {
    this.setHeadTitle('项目介绍') 
    this.setDetailHead(true)
    this.setBuyFoot(true)
    // this.setFlag(false) //不显示分类页面的尾部
    this.setHeadFlag(false)  // 映射方法,进入该页面显示不同的头部
    this.setMapHead(false)
    this.setSeatPurchase(false)
  },
  methods: {
    ...mapMutations(['setFlag','setHeadFlag','setHeadTitle','setBuyFoot','setDetailHead','setMapHead','setSeatPurchase','setGoodsData']), // 映射方法
    alertSeat(){
    	this.popupVisible=true;
    },
  },
  beforeRouteEnter(to ,from,next){
  	//console.log(to.query.goods);
  	next(vm => {
  		//console.log(typeof to.query.goods);
  		if(typeof to.query.goods=='string'){ //返回上一页的时候
  			vm.goods=vm.goodsData
  			
  		}else{
	        vm.goods=to.query.goods 
	        vm.setGoodsData(vm.goods)
	       // console.log(vm.goods); 			
  		}
	  })
  },
  components:{
  	ticketDetailFooter
  }
}
</script>

<style type="text/css" scoped>
	.seatPic .mint-popup{
		width: 100%;
		height: 12.5rem;
	}
	.seatPic img{
		width: 100%;
		height: 12.5rem;
	}
	.list{
		background-color: #fff;
		margin-bottom: 0.35rem;
		margin-top: 1rem;
	}
	.container{
		width:16.3rem;
		margin:auto;
		text-align: left;
	}
	.container .top{
		overflow: hidden;
		padding-top: 1.3rem;
	}
	.container .top img{
		width: 6.5rem;
		height: 8.67rem;
		float: left;
	}
	.container .top .textPrice{
		width: 9.1rem;
		float: right;
		text-align: left;
	}
	.container .top .textPrice h2{
	  font-size: 0.85rem;
	  color:#131313;
	  font-weight: 500;
	}
	.container .top .textPrice .seatSale{
		margin-top: 2.5rem;
	}
	.container .top .textPrice .seatSale span{
		border-width: 2px;
		border-style: solid;
		font-size: 0.6rem;
		padding:0.2rem;
		border-radius: 5px;
	}
	.container .top .textPrice .seatSale span:nth-child(1){
		border-color: #de2157;
		color:#de2157;
	}
	.container .top .textPrice .seatSale span:nth-child(2){
		border-color: #dd4b4f;
		color:#dd4b4f;
	}
	.container .top .textPrice .price{
	  display: block;
	  font-size: 0.75rem;
	  color:#e0001b;
	  margin-top: 0.85rem;
	}
	.container .time .fa-calendar:before,.container .address .fa-map-marker{
	    content: "\F073";
	    font-size: 0.85rem;
	}
	.container .address .tab{
		font-size: 0.6rem;
		color:#949494;
	}
	.container .starTeam{
		border-bottom: 1px solid #ccc;
	}
	.container .starPic{
		overflow: hidden;
		width: 4rem;
		margin:0.7rem 0;
	}
	.container .starPic img{
		width: 4rem;
		height: 4rem;
		border-radius: 100%;
	}
	.container .name{
		width: 100%;
		text-align: center;
		color:#0f0f15;
		font-size: 0.6rem;
	}
	.mint-cell:last-child{
		background-image: none;
	}
	.itemDetail p{
		font-size: 0.6rem;
		color:#0f0f0f;
		line-height: 1.4rem;
	}
	.moreDetail{
		text-align: center;
	}
	.childTip.starTeam{
		border-bottom: none;
	}
	.childTip span,.limitBuy span{
		font-size: 0.6rem;
		color:#050505;
		display: inherit;
	}

</style>
