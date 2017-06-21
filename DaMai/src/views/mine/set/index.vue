<template>
<div>
        <mt-tab-item>
	         <router-link to="/mine/index">
	              返回
	         </router-link>
	      </mt-tab-item>
              <h1>这里是设置页面</h1>
              <div>
              <mt-tab-item>
                  <router-link to="/mine/set/verification_code">
                      验证码查询
                  </router-link>
                </mt-tab-item>

                </div>
              <div>
                  <a>清理缓存</a>
                  <a>检查更新</a>
        <mt-tab-item>
	         <router-link to="/mine/set/feedback">
	              意见反馈
	         </router-link>
	      </mt-tab-item>

              </div>
              <div>
                <mt-tab-item>
                	         <router-link to="/mine/set/help">
                	              帮助中心
                	         </router-link>
                	      </mt-tab-item>
                	      <mt-tab-item>
                                        	         <router-link to="/mine/set/about">
                                        	              关于大麦
                                        	         </router-link>
                                        	      </mt-tab-item>
                                        	      <a>客服电话</a>
              </div>
        </div>
       </template>

<script type="es6">
import { Cell } from 'mint-ui'
// import { mapGetters } from 'vuex'

	export default{

	}
</script>
<style >
</style>
