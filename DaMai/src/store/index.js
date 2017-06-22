import Vue from 'vue'
import Vuex from 'vuex'
import actions from './actions'
import mutations from './mutations'
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    headTitle: '',
    flag: true,
    headFlag: true,
    detailHead: true,
    buyFoot: true,
    mapHead: true,
    seatPurchase: true,
    goodsData: null,
    attributeData: null,
    itemArray: [],
    userInfo: [],
    addressArr: [],
    timeArr: []
  },
  getters: {
    musicName: state => state.musicName,
    isLogin: state => state.isLogin
  },
  mutations,
  actions
})
export default store
