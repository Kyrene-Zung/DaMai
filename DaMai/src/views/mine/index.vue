<template> <div>


<div id="header">
    <mt-tab-item id="top">
    <div>
        <router-link to="set/index" class="icon iconfont icon-shezhi mui-pull-left" ></router-link>
        <router-link to="scan_code" class="icon iconfont icon-saoerweima mui-pull-right"></router-link>
        <router-link to="infor" class="icon iconfont icon-pingjia mui-pull-right "></router-link>
    </div>
    <div class="name">
        
            <router-link to="/mine/login">
                    <img :src="pt" width="110px">
            </router-link>

        <div class="huiyuan">
            <i class="icon iconfont icon-huiyuan">
                
            </i> 

            {{level}}会员

        </div>
    </div>
        <a href=""></a>
    </mt-tab-item>

 </div>

<div class="mui-card ">
    <div class="mui-card-content">
        <div class="mui-card-content-inner">
            <ul class="mui-table-view mui-grid-9">
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    {{wallat}}元
                    <p class="mui-media-body">
                        电子钱包
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    {{coupon}}张
                    <p class="mui-media-body">
                        优惠卷
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    {{integration}}分
                    <p class="mui-media-body">
                        积分
                    </p>
                </li>
            </ul>
        </div>
    </div>


</div>
<div class="mui-card">
    <div class="mui-car-header">
        大麦订单
        查看全部
    </div>
    <div class="mui-card-content">

        <div class="mui-card-content-inner">

            <ul class="mui-table-view mui-grid-9">
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-daifukuan">

                    </i>
                    <p class="mui-media-body">
                        待付款
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-daishouhuo">

                    </i>
                    <p class="mui-media-body">
                        待收货
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-pingjia">

                    </i>
                    <p class="mui-media-body">
                        待评价
                    </p>
                </li>
            </ul>
            <!--

          -->
        </div>
    </div>
</div>

<div class="mui-card">
    <div class="mui-car-header">
        其他订单
    </div>
    <div class="mui-card-content">
        <div class="mui-card-content-inner">
            <ul class="mui-table-view mui-grid-9">
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-dianying">

                    </i>
                    <p class="mui-media-body">
                        电影订单
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-94">

                    </i>
                    <p class="mui-media-body">
                        玩乐订单
                    </p>
                </li>

            </ul>
        </div>
    </div>
</div>
<div class="mui-card">
<div class="mui-car-header">
        我的票夹
    </div>
    <div class="mui-card-content">
        <div class="mui-card-content-inner">
            <ul class="mui-table-view mui-grid-9">
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-weishiyong">

                    </i>
                    <p class="mui-media-body">
                        未使用
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-fenxiangzidongzhuanru">

                    </i>
                    <p class="mui-media-body">
                        转入
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-fenxiangzidongzhuanchu">

                    </i>
                    <p class="mui-media-body">
                        转出
                    </p>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mui-card">

    <div class="mui-card-content">
        <div class="mui-card-content-inner">
            <ul class="mui-table-view mui-grid-9">
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-dizhi">

                    </i>
                    <p class="mui-media-body">
                        地址管理
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-huiyuan ">

                    </i>
                    <p class="mui-media-body">
                        会员中心
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-gerenxinxi">

                    </i>
                    <p class="mui-media-body">
                        常用观演人
                    </p>
                </li>
                <ul class="mui-table-view mui-grid-9">
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-dingyue">

                    </i>
                    <p class="mui-media-body">
                        订阅
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-shoucangshoucang">

                    </i>
                    <p class="mui-media-body">
                        收藏
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    <i class="icon iconfont icon-icon052">

                    </i>
                    <p class="mui-media-body">
                        在线客服
                    </p>
                </li>
                </ul>
            </ul>
        </div>
    </div>
</div>


        </div>

       </template>

<script type="es6">

import { Cell } from 'mint-ui'
// import { mapGetters } from 'vuex'
import {mapState, mapMutations} from 'vuex'
export default{
    data(){
        return{
            level:'黄金',
            pt:'../static/login.png',
            wallat:'0.0',
            coupon:'0.0',
            integration:'0.0'


        } 
    },
    computed:{

    },
created(){
    this.setHeadTitle('分类')
    this.setFlag(true) //显示分类页面的尾部
    this.setHeadFlag(false)
    this.setDetailHead(false)
    this.setBuyFoot(false)
    this.setMapHead(false)
  },
   methods:{
        ...mapMutations (['setHeadTitle','setMapHead','setFlag','setHeadFlag','setDetailHead','setBuyFoot']), // 映射方法
      },

}
</script>

<style ></style>
