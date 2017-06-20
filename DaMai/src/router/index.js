import Vue from 'vue'
import Router from 'vue-router'
import index from '@/views/index'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'index',
      component: index
    },
    {
      path: '/category',
      name: 'category',
      component: require('../views/cate/category')
    },
    {
      path: '/ticketDetail',
      name: 'ticketDetail',
      component: require('../views/cate/ticketDetail')
    },
    {
      path: '/venueMap',
      name: 'venueMap',
      component: require('../views/cate/venueMap')
    },
    {
      path: '/moreDetail',
      name: 'moreDetail',
      component: require('../views/cate/moreDetail')
    },
    {
      path: '/seatPurchase',
      name: 'seatPurchase',
      component: require('../views/cate/seatPurchase')
    },
    {
      path: '/buyNow',
      name: 'buyNow',
      component: require('../views/cate/buyNow')
    },
    {
      path: '/placeOrder',
      name: 'placeOrder',
      component: require('../views/cate/placeOrder')
    },
    {
      path: '/chooseAddress',
      name: 'chooseAddress',
      component: require('../views/cate/chooseAddress')
    },
    {
      path: '/addAddress',
      name: 'addAddress',
      component: require('../views/cate/addAddress')
    },
    {
      path: '/mine',
      name: 'mine',
      component: require('../views/mine')
    },
    {
      path: '/find',
      name: 'find',
      component: require('../views/find')
    }
  ]
})
