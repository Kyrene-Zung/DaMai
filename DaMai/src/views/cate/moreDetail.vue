<template>
<transition name="rightIn">
	<div class="projectBrief">
		<div class="container">

			<div class="brief">
				<h3>基本信息</h3>
				<div>
					<p>演出时间</p>
					<p>2017.08.11-2017.08.12</p>
				</div>
				<div>
					<p>入场时间</p>
					<p>以现场为准</p>
				</div>
				<div>
					<p>限购</p>
					<p>在线选座系统限定6张。</p>
				</div>
				<div>
					<p>配送公告</p>
					<p>11号场次：5月29日起支持上门自取，5月26日起开始配送。</p>
					<p>12号场次：6月1日起支持上门自取，5月31日起开始配送。</p>
				</div>
				<div>
					<p>儿童入场提示</p>
					<p>1.2米以下儿童谢绝入场（儿童项目除外），1.2米以上儿童需持票入场。</p>
				</div>
				<div>
					<p>演出场馆</p>
					<p>广州国际体育演艺中心</p>
				</div>
				<div>
					<p>演出时长</p>
					<p>以现场为准</p>
				</div>
				<div>
					<p>开票时间</p>
					<p>2017.08.11-2017.08.12</p>
				</div>
			</div>
			<div class="brief">
				<h3>温馨提示</h3>
				<div>
					<p>支付限额</p>
					<p>部分银行支付可能有一定限额，请提前检查银行卡的限额，或可充值至大麦电子钱包进行支付。</p>
				</div>
				<div>
					<p>付款时效提醒</p>
					<p>购票下单成功后需在15分钟内完成支付，未支付成功的订单，将在下单15分钟后系统自动取消，所选价位将自动释放后重新点亮，大家可及时刷新购票页面进行购买。</p>
				</div>
				<div>
					<p>缺货登记提醒</p>
					<p>所需票价若为灰色，说明已经售完。您可以在当前页面进行缺货登记，后期如果有票会以短信形式及时通知。</p>
				</div>
				<div>
					<p>发票说明</p>
					<p>自2016年5月1日起，凡在大麦网购票需获取发票的客户，烦请您在项目演出前按照增值税税法相关规定提供我们必要的发票信息，演出结束后将统一由项目主办单位开具增值税发票，发票开出后我们将及时通知您收取方式，演出结束后将不支持开具发票申请，由此给您造成的不便我们深表歉意，感谢您的理解与支持！</p>
				</div>
				<div>
					<p>演出前配送</p>
					<p>演出前三天不支持快递配送，未开通电子票项目可选择上门自取，开通电子票项目可选购电子票。</p>
				</div>
			</div>
			<div class="brief">
				<h3>温馨提示</h3>
				<div>
					<p>支付限额</p>
					<p>部分银行支付可能有一定限额，请提前检查银行卡的限额，或可充值至大麦电子钱包进行支付。</p>
				</div>
				<div>
					<p>付款时效提醒</p>
					<p>购票下单成功后需在15分钟内完成支付，未支付成功的订单，将在下单15分钟后系统自动取消，所选价位将自动释放后重新点亮，大家可及时刷新购票页面进行购买。</p>
				</div>
				<div>
					<p>缺货登记提醒</p>
					<p>所需票价若为灰色，说明已经售完。您可以在当前页面进行缺货登记，后期如果有票会以短信形式及时通知。</p>
				</div>
				<div>
					<p>发票说明</p>
					<p>自2016年5月1日起，凡在大麦网购票需获取发票的客户，烦请您在项目演出前按照增值税税法相关规定提供我们必要的发票信息，演出结束后将统一由项目主办单位开具增值税发票，发票开出后我们将及时通知您收取方式，演出结束后将不支持开具发票申请，由此给您造成的不便我们深表歉意，感谢您的理解与支持！</p>
				</div>
				<div>
					<p>演出前配送</p>
					<p>演出前三天不支持快递配送，未开通电子票项目可选择上门自取，开通电子票项目可选购电子票。</p>
				</div>
			</div>

		</div>
	</div>
</transition>
	
</template>
<script type="es6">
import {mapMutations} from 'vuex'
	export default{
		created(){
			this.setHeadTitle('项目简介')
			this.setMapHead(true)
		    this.setDetailHead(false)
			this.setBuyFoot(false)
			this.setFlag(false)
		    this.setHeadFlag(false)
		    this.setSeatPurchase(false)
		},
		methods: {
			...mapMutations(['setHeadTitle','setMapHead','setFlag','setHeadFlag','setDetailHead','setBuyFoot','setSeatPurchase'])
		}

	}
	function changeZindex(){
		var faRss=document.querySelector('.fa.fa-rss');
		console.log(faRss);
		faRss.style.zIndex=2000;
	}
</script>
<style type="text/css" scoped>

	.projectBrief .container{
		width:16.3rem;
		margin:auto;
		text-align: left;
	}
	.projectBrief .brief{
		padding-top: 2rem;
	}
	.projectBrief .brief h3{
		font-size: 0.9rem;
		color:#000;
		margin-bottom: 1.2rem;
	}
	.projectBrief .brief p{
		margin-bottom: 0px;
		font-size: 0.85rem;
		color:#181818;
		line-height: 1.35rem;
	}
</style>
