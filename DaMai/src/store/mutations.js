export default {
  setHeadTitle (state, title) {
    state.headTitle = title // 设置头部标题等于传过来的标题
  },
  // setFlag (state, flag) {
  //   state.flag = flag // 设置三个主tab
  // },
  setBuyFoot (state, buyFoot) {
    state.buyFoot = buyFoot // 设置详细页面购买尾部
  },
  setHeadFlag (state, headFlag) {
    state.headFlag = headFlag // 设置显示不同的头部，进入分类详细页头部样式改变
  },
  setDetailHead (state, detailHead) {
    state.detailHead = detailHead // 设置显示不同的头部，进入分类详细页头部样式改变
  },
  setMapHead (state, mapHead) {
    state.mapHead = mapHead // 设置显示不同的头部，进入场馆地图页头部样式改变
  },
  setSeatPurchase (state, seatPurchase) {
    state.seatPurchase = seatPurchase
  },
  setGoodsData (state, goodsData) {
    state.goodsData = goodsData
    console.log(state.goodsData)
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
    console.log(state.userInfo)
  },
  setAddressArr (state, addressArr) {
    state.addressArr = addressArr
    console.log(state.addressArr)
  },
  setTimeArr (state, timeArr) {
    state.timeArr = timeArr
    console.log(state.timeArr)
  }
}
