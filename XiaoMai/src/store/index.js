import Vue from 'vue'
import Vuex from 'vuex'
import actions from './actions'
import mutations from './mutations'
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    headTitle: '',
    selected: 'tab1', // 设置尾部tab
    editorRecommend: [], // 小编推荐
    hotRecommend: [], // 热门推荐
    guessLike: [], // 猜你喜欢
    goodsData: null,
    priceData: null,
    itemArray: [],
    userInfo: [],
    addressArr: [],
    timeArr: [],
    goodsList: [],
// 分类页面
    searchCriteria: {curCity: '广州', curCate: 0, timeRange: '全部时间', rangeWay: 'hot'}
    // 搜索条件：城市(当前定位城市)，分类(全部分类)，时间范围(全部时间)，排序方式(按热门)
  },
  getters: {
    musicName: state => state.musicName,
    isLogin: state => state.isLogin
  },
  mutations,
  actions
})
export default store
