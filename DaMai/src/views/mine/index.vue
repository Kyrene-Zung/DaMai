<template>
<div style="background-color：#efeff4">
    <div class="mui-card ">
    <div class="mui-card-header" style="padding:0;margin-top:35px;">
    <div id="header" style="width:100%">
    <mt-tab-item id="top">
    <!-- <div style="height:33px">
        <router-link to="set/index" class="icon iconfont icon-shezhi mui-pull-left" style="color:#000"></router-link>
        <router-link to="infor" class="icon iconfont icon-pingjia mui-pull-right " style="color:#000"></router-link>
        <router-link to="scan_code" class="icon iconfont icon-saoerweima mui-pull-right" style="color:#000"></router-link>

    </div> -->
    <div @click='login()' style="height:100px">
        <div class="headImg"> 
             <img :src="userInfo.user_photo || user_photo">
        </div>
        <div class="loginReg" v-if="!userInfo.user_ID" >
                登录\注册
        </div>
        <div style="float:left;margin-top:20px;color:#fff" v-if="userInfo.user_ID">
        <div v-if='userInfo.user_name'>{{userInfo.user_name}}</div>
            <div> {{level}}会员</div>
                <div style="float:right">账户管理 >></div>
        </div>


</div>
</mt-tab-item>

</div></div>
    <div class="mui-card-content">
        <div class="mui-card-content-inner">
            <ul class="mui-table-view mui-grid-9">
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    {{userInfo.user_wallet || user_wallet}}元
                    <p class="mui-media-body">
                        电子钱包
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    {{userInfo.user_coupon || user_coupon}}张
                    <p class="mui-media-body">
                        优惠卷
                    </p>
                </li>
                <li class="mui-table-cell mui-media mui-col-xs-1">
                    {{userInfo.user_integration || user_integration}}分
                    <p class="mui-media-body">
                        积分
                    </p>
                </li>
            </ul>
        </div>
    </div>


    </div>
    <div class="mui-card">
    <div class="mui-car-header" style="overflow:hidden" @click="damaiOrder(10)">
        <p style="color:#000 ;float:left" class="my_header">大麦订单</p>
        <p style="color:#000 ;float:right;padding-right:0.5rem;color:#8f8f8f">查看全部 ></p>
    </div>
<div class="mui-card-content">

    <div class="mui-card-content-inner">

        <ul class="mui-table-view mui-grid-9">
            <li class="mui-table-cell mui-media mui-col-xs-1" @click="damaiOrder(0)">
                <i class="icon iconfont icon-daifukuan">

                </i>
                <p class="mui-media-body">
                    待付款
                </p>
            </li>
            <li class="mui-table-cell mui-media mui-col-xs-1" @click="damaiOrder(1)">
                <i class="icon iconfont icon-daishouhuo">

                </i>
                <p class="mui-media-body">
                    待收货
                </p>
            </li>
            <li class="mui-table-cell mui-media mui-col-xs-1" @click="damaiOrder(2)">
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
        <span my_header>其他订单</span>
    </div>
    <div class="mui-card-content ">
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
    <div class="mui-car-header" style="height:30px;">
        <span class="my_header">我的票夹</span>
        <p style="color:#000 ;float:right;padding-right:0.5rem;color:#8f8f8f">查看全部 ></p>
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

    <div class="mui-card-content" style="height:165px">
        <div class="mui-card-content-inner">
            <ul class="mui-table-view mui-grid-9">
                <li class="mui-table-cell mui-media mui-col-xs-1" @click="addressDefalutl()">
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
import { mapState, mapMutations } from 'vuex'
import { Axios } from '../../service/config'
export default{
    data(){
        return{
                level:'',
                user_photo:'../static/photo.jpg',
                user_wallet:'0.0',
                user_coupon:'0.0',
                user_integration:'0.0'
        }
    },
    computed:{
        ...mapState(['userInfo'])
    },
created(){
    this.setHeadTitle('分类')
  },
   methods:{
        damaiOrder(type){
            this.$router.push({path:'/damaiOrder',query:{type:type}})
        },
        addressDefalutl(){//选择默认地址
            this.$router.push({path:'/addressMan'});
        },
        ...mapMutations (['setHeadTitle','setUserInfo']), // 映射方法

        huiyuan : function() {
            if(this.userInfo.user_ID)
            {
                if(this.userInfo.user_state == 1)
                    this.level='普通'
                if(this.userInfo.user_state == 2)
                    this.level='黄金'
                if(this.userInfo.user_state == 3)
                    this.level='钻石'
                if(this.userInfo.user_state == 4)
                    this.level='皇冠'
                if(this.userInfo.user_state == 5)
                    this.level='您还不是'
                return true;
            }
            else
                return false;
        },
        login : function () {
            if(this.userInfo.user_ID)
                 this.$router.push({path:'/mine/person'})
             else
            this.$router.push({path:'/mine/login/index'})
        }
      },

}
</script>

<style lang="scss" scoped>
    .headImg{
        width:3.3rem;
        height:3.3rem;  
        margin-left:0.6rem;
        display: inline-block;
        margin-top: 0.6rem;
        img{
            width: 100%;
            height: 100%;
            border-radius:100%;
        }
    }
    .loginReg{
         margin-top:20px;
         color:#fff;
         display: inline-block;
         vertical-align: top;
         margin:2.2rem 0 0 0.9rem;
         font-size: 0.9rem;
    }
    .mui-card{
        .mui-car-header{
            p{
                padding:0.6rem 0;
                margin:0;
                margin-left: 0.5rem;
            }
            span{
                display: inline-block;
                padding:0.6rem 0;
                margin:0;
                margin-left: 0.5rem;
            }
        }
    }
</style>
