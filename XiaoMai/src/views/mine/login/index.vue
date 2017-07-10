<template>
  <div class="loginRoot">
    <div class="register"><router-link to='/mine/login/register'>注册</router-link></div>

    <div class="loginBox">
      <div class="inputPhone">
        <div class="loginContainer">
          <div class="areaNum"><span>+81</span><i class="fa fa-angle-down" aria-hidden="true"></i></div>
          <div class="phoneNum"><input type="text" name="" placeholder="请输入手机号" v-model="input_phone"></div>
        </div>
      </div>
       <div class="inputPassword">
          <div class="loginContainer">
            <div class="password"><input type="password" name="" placeholder="请输入密码" v-model="input_password"></div>
          </div>
        </div>
    </div>

    <div class="loginBtn">
      <div class="loginContainer" @click="login()">登录</div>
    </div>

    <div class="forgetQuick">
       <div class="loginContainer">
          <a href="">忘记密码</a><a href="">快速登录</a>
       </div>
    </div>

    <div class="pattnerLogin">
      <div class="loginContainer">
        <div class="pattnerTitle">
          <span></span>
          <em>使用合作网站账号登录</em>
          <span></span>
        </div>
        <ul class="pattnerLogo">
          <li><img src="../../../../static/images/S70702-18141865_03.jpg"></li>
          <li><img src="../../../../static/images/S70702-18141865_05.jpg"></li>
          <li><img src="../../../../static/images/S70702-18141865_07.jpg"></li>
          <li><img src="../../../../static/images/S70702-18141865_09.jpg"></li>
        </ul>
      </div>
    </div>
</div>
</template>

<script type="es6">
  import { Cell } from 'mint-ui'
  import { Axios } from '../../../service/config'
  import { mapMutations } from 'vuex'
  import Vue from 'vue'
  import {apiUrl} from '../../../service/config.js' 


export default{
  data(){
    return{
      input_phone:"",
      input_password:""
    }
  },
  created(){
    this.setHeadTitle('登录')
  },
  methods:{
     
    ...mapMutations(['setHeadTitle','setUserInfo','setAddressArr']),
     login(){
        Axios({
              method:"post",//post:data
              url:"/api/mobile/user/read",
              data:{
                "phone":this.input_phone,//获取当前方法的值
                "password":this.input_password,
              }
            }).then( rtnD=>{
              console.log(rtnD.data)
              if(rtnD.data['status']){
                  this.$router.push({path:'/mine/index'})
                  this.setUserInfo(rtnD.data);
                  localStorage.setItem('userInfo',JSON.stringify(rtnD.data))
                  //拿地址
                  let user_id=rtnD.data.user_id;
                    Vue.http.jsonp('api/mobile/User',{params:{user_id:user_id}}).then(rtn=>{
                          console.log(rtn.data);
                          this.setAddressArr(rtn.data);
                    })
                    this.$router.push({path:'/mine/index'})
              }else{
                  console.log("用户或密码并不存在")
              }
             })
    }
  }
}
</script>
<style lang="scss" scoped>
*{
  margin:0;
  padding: 0;
}
.loginContainer{
  margin:auto;
  width:16.8rem;
  height: 1.8rem;
}
.loginRoot{
  padding-top: 1px;
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
.loginBox{
  background-color: #fff;
  margin-top: 4.1rem;
  .inputPhone{
    border-top:1px solid #ccc;
     border-bottom:1px solid #ccc;
    .loginContainer{
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
  .inputPassword{
     border-bottom:1px solid #ccc;
    .loginContainer{
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
.loginBtn{
  margin-top: 1rem;
  .loginContainer{
    border-radius: 5px;
    height: 2.3rem;
    background-color: #ed1554;
    font-size: 0.8rem;
    color:#fff;
    text-align: center;
    line-height: 2.3rem;
  }
}
.forgetQuick{
  margin-top: 1.4rem;
  .loginContainer{
    a{
      font-size: 0.7rem;
      color:#d10228;
      &:nth-child(2){
        float: right;
      }
    }
  }
}
.pattnerLogin{
  .loginContainer{
    .pattnerTitle{
      span{
        display: inline-block;
        height: 1px;
        width: 4rem;
        background-color: #e5e6e8;
      }
      em{
        font-size: 0.6rem;
        font-style: normal;
        color:#626365;
        margin:0 1.0rem;
      }
    }
    .pattnerLogo{
      overflow: hidden;
      width: 13.3rem;
      margin:auto;
      margin-top: 1.3rem;
      li{
        height: 2.8rem;
        width: 2.8rem;
        float: left;
       margin-right: 0.7rem;
       &:nth-child(4){
        margin-right: 0;
       }
        img{
          width: 100%;
          height: 100%;
        }
      }
    }
  }
}
</style>
