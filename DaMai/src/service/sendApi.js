import Vue from 'vue'
export const clickCate = cateID => {
  console.log(cateID)
  Vue.http.jsonp('http://localhost/0609Project/DaMai/src/api/public/mobile/cate', {params: {cateID}}).then(rtn => {
    console.log(rtn.data)
  })
}
