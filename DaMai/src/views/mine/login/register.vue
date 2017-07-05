<template>
	<div class="registerRoot">
		<div class="registerBox">
			<div class="inputPhone">
				<div class="registerContainer">
					<div class="areaNum"><span>+81</span><i class="fa fa-angle-down" aria-hidden="true"></i></div>
					<div class="phoneNum"><input type="text" name="" placeholder="请输入手机号"></div>
				</div>
			</div>
			<div class="inputSureCode">
				<div class="registerContainer">
					<div class="sureCode"><input type="password" name="" placeholder="请输入验证码"></div>
					<div class="getSureCode"><span>获取验证码</span></div>
				</div>
			</div>
			<div class="inputPassword">
				<div class="registerContainer">
					<div class="password"><input type="password" name="" placeholder="请输入6-16密码"></div>
				</div>
			</div>
		</div>
		<div class="readDeal">
			<div class="registerContainer">
				<i class="fa fa-angle-down" aria-hidden="true"></i>
				<span>我已阅读并同意<em>大麦网会员服务条款</em></span>
			</div>
		</div>
		<div class="registerBtn">
			<div class="registerContainer">注册</div>
		</div>

	</div>
</template>

<script type="es6">
import { mapMutations } from 'vuex'
import { Axios } from '../../../service/config.js'//config:引用Axios
export default{
	data(){
		return{
			phone:"",
			ma:"",
			password:"",
		}
	},
	created(){
		this.setHeadTitle('手机注册')
	},
	methods:{
		register(){
			Axios({
				method:"post",
				url:"/api/mobile/user/save",
				data:{
								phone:this.phone,//获取当前方法的值
								password:this.password
							}
						})
			this.$router.push({path:'/mine/register/index'})
		},
		...mapMutations(['setHeadTitle'])
	}
}
</script>
<style lang="scss" scoped>
*{
  margin:0;
  padding: 0;
}
.registerContainer{
  margin:auto;
  width:16.8rem;
  height: 1.8rem;
}
.registerRoot{
  padding-top:1px;
  min-height: 32rem;
  background-color: #f0f1f3;
}
.register{
  position: fixed;
 
  font-size: 0.7rem;
  z-index: 3000;
  right: 0.8rem;
  top: 1.5rem;
  a{
     color: #fff;
  }
}
.registerBox{
  background-color: #fff;
  margin-top: 4.1rem;
  .inputPhone{
    border-top:1px solid #ccc;
     border-bottom:1px solid #ccc;
    .registerContainer{
      overflow: hidden;
      padding:0.4rem 0;
      height: 3rem;
      line-height:2rem;
      .areaNum{
        width: 3rem;
        height: 100%; 
        box-sizing:border-box;
        border-right:1px solid #f7f7f7;
        box-shadow: 1px 0px 0px #f0f0f0;
        float: left;
        span{
          font-size: 0.7rem;
          color:#171717;
        }
        i{
          font-size: 0.6rem;
          color:#878787;
          margin-left: 0.75rem;
        }
      }
      .phoneNum{
        margin-left: 0.75rem;
        float: left;
        input{
          font-size: 0.7rem;
          border:none;
          color:#9e9e9e;
        }
      }
    }
  }
  .inputSureCode{
     border-bottom:1px solid #ccc;
    .registerContainer{
      overflow: hidden;
      padding:0.4rem 0;
       height: 3rem;
      line-height: 2rem;
      .sureCode{
        height: 100%;
        float: left;
        input{
          padding:0;
          margin:0;
          font-size: 0.7rem;
          border:none;
          color:#9e9e9e;
          height: 100%;
        }
      }
      .getSureCode{
      	float: right;
      	border:1px solid #e0163e;
      	border-radius: 5px;
      	font-size: 0.25rem;
      	span{
      		padding:0 0.5rem;
      		color: #e0163e
      	}
      }
    }
  }
  .inputPassword{
     border-bottom:1px solid #ccc;
    .registerContainer{
      overflow: hidden;
      padding:0.4rem 0;
       height: 3rem;
      line-height: 2rem;
      .password{
        height: 100%;
        input{
          padding:0;
          margin:0;
          font-size: 0.7rem;
          border:none;
          color:#9e9e9e;
          height: 100%;
        }
      }
    }
  }
}
.readDeal{
	margin: 1rem 0 1.8rem;
	.registerContainer{
		i{
			font-size: 0.9rem;
			color:#ce0028
		}
		span{
			font-size: 0.6rem;
			color:#1e1f21;
			em{
				font-style: normal;
				color: #0044cd;
			}
		}
	}
}
.registerBtn{
  margin-top: 1rem;
  .registerContainer{
    border-radius: 5px;
    height: 2.3rem;
    background-color: #ed1554;
    font-size: 0.8rem;
    color:#fff;
    text-align: center;
    line-height: 2.3rem;
  }
}
</style>
