export default {
  setHeadTitle (state, title) {
    state.headTitle = title // 设置头部标题等于传过来的标题
  },
  setGoodsData (state, goodsData) {
    state.goodsData = goodsData
    // console.log(state.goodsData)
  },
  setPriceData (state, priceData) {
    state.priceData = priceData
    // console.log(state.priceData)
  },
  setItemArr (state, itemArray) {
    state.itemArray = itemArray
    // console.log(state.itemArray)
  },
  setUserInfo (state, userInfo) {
    state.userInfo = userInfo
    // console.log(state.userInfo)
  },
  setAddressArr (state, addressArr) {
    state.addressArr = addressArr
    // console.log(state.addressArr)
  },
  setTimeArr (state, timeArr) {
    state.timeArr = timeArr
    // console.log(state.timeArr)
  },
  // 分类页面
  setSearchCriteria (state, obj) {
    // console.log(obj)
    state.searchCriteria[obj.key] = obj.value
    // console.log(state.searchCriteria)
  },
  setGoodsList (state, goodsList) {
    // console.log(goodsList)
    state.goodsList = goodsList
    // console.log(state.goodsList)
  }
}
