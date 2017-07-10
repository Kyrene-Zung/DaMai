<template>
	<div class="accountManRoot">
	  <div class="accountHeader">
	  	<span>账户管理</span>
	  	<mt-button icon="back" @click.native="$router.go(-1)" class="goBack"></mt-button>
	  </div>
      <div class="" style="margin-top:1rem;">
        <div class="accountList">
          <div class="accountContainer">
            <div class="cell">
              <mt-cell title="头像" to="//github.com" is-link value="1M"></mt-cell>
            </div>
          </div>
        </div>
        <div class="accountList">
          <div class="accountContainer">
            <div class="cell">
              <mt-cell title="昵称" to="//github.com" is-link value="1111"></mt-cell>
            </div>
          </div>
        </div>
        <div class="accountList">
          <div class="accountContainer">
            <div class="cell" @click="chooseGender($event)">
              <mt-cell title="性别" is-link :value="gender" ></mt-cell>
            </div>
            <mt-actionsheet :actions="actions" v-model="sheetVisible"> </mt-actionsheet>
          </div>
        </div>
        <div class="accountList">
          <div class="accountContainer">
            <div class="cell" @click="openPicker()">
              <mt-cell title="生日" is-link :value="birthday"></mt-cell>
            </div>
            <mt-datetime-picker v-model="pickerVisible" type="date" year-format="{value} 年" month-format="{value} 月" date-format="{value} 日"  ref="picker" :startDate="date" @confirm="handleConfirm">
</mt-datetime-picker>
          </div>
        </div>
      </div>

      <div class="" style="margin-top:0.5rem;">
        <div class="accountList">
          <div class="accountContainer">
            <div class="cell">
              <mt-cell title="实名认证" to="//github.com" is-link value="未认证"></mt-cell>
            </div>
          </div>
        </div>
        <div class="accountList">
          <div class="accountContainer">
            <div class="cell">
              <mt-cell title="绑定手机号" to="//github.com" is-link value="15622769865"></mt-cell>
            </div>
          </div>
        </div>
      </div>

      <div class="" style="margin-top:0.5rem;">
        <div class="accountList">
          <div class="accountContainer">
            <div class="cell">
              <mt-cell title="登录密码" to="//github.com" is-link value="修改登录密码"></mt-cell>
            </div>
          </div>
        </div>
        <div class="accountList">
          <div class="accountContainer">
            <div class="cell">
              <mt-cell title="支付密码" to="//github.com" is-link value="修改支付密码"></mt-cell>
            </div>
          </div>
        </div>
      </div>

  </div>
</template>

<script type="es6">
import { Cell } from 'mint-ui'
import { mapMutations } from 'vuex'

export default{
	data(){
		return {
			actions:[
				{name:'男',method:this.male},
				{name:'女',method:this.female}
			],
			gender:'女',
			sheetVisible:false,
			pickerVisible:'',
			date:new Date('1970'),
			birthday:'1970年01月01日'
		}
	},
	created(){
		this.setHeadTitle('账户管理')
	},
	methods:{
		chooseGender(event){
			this.sheetVisible=true;
		},
    male(){
      this.gender='男'
    },
    female(){
      this.gender='女'
    },
		openPicker() {
	        this.$refs.picker.open();
	    },
	    handleConfirm(value){
	    	var monthArr=['01月','02月','03月','04月','05月','06月','07月','08月','09月','10月','11月','12月'];
	    	var year=this.pickerVisible.getFullYear();
	    	var month=monthArr[this.pickerVisible.getMonth()];
	    	var date=this.pickerVisible.getDate()
	    	if(this.pickerVisible.getDate()<=9){
	    		date='0'+this.pickerVisible.getDate();
	    	}
	    	this.birthday=year+'年'+month+date+'日';
	    },
		...mapMutations(['setHeadTitle'])
	}
}
</script>
<style lang="scss" scoped>
  .accountContainer{
    width:17rem;
    margin:auto;
  }
  .mint-button--default{
	background-color: transparent !important;
	box-shadow: none !important;
}
  .accountManRoot{
    background-color: #eef2f3;
    min-height: 32rem;
    padding-top: 3.1rem;
    .accountHeader{
    	height: 3.5rem;
    	line-height: 3.5rem;
    	text-align: center;
    	background-color: #fff;
    	position: absolute;
    	left: 0;
    	top: 0;
    	width: 100%;
    	.goBack{
    		position: absolute;
    		left: 0;
    		top:1rem;
    	}
    }
    .accountList{
      background-color: #fff;
      .accountContainer{
         overflow: hidden;
         .v-modal{
	      	z-index: 3000!important;
	      }
        .setLogo{
          line-height: 2rem;
          img{
            height: 1.5rem;
            width: 1.5rem;
            border-radius: 100%;
            background-color: #008cc4;
            vertical-align: middle;
          }
        }
        .cell{
          
        }

      }
    }
  }
  .mint-actionsheet{
        	.mint-actionsheet-button{
        		color:#0057d1!important;
        	}
        }
</style>
