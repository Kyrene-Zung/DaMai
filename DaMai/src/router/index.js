import Vue from 'vue'
import Router from 'vue-router'
import index from '@/views/index'

Vue.use(Router)

let router = new Router({
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
      component: require('../views/cate/seatPurchase'),
      meta: {
        requireLogin: true
      }
    },
    {
      path: '/buyNow',
      name: 'buyNow',
      component: require('../views/cate/buyNow'),
      meta: {
        requireLogin: true
      }
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
      path: '/find',
      name: 'find',
      component: require('../views/find')
    },
    {
      path: '/mine/index',
      name: 'mine',
      component: require('../views/mine/index')
    },
    {
      path: '/mine/infor',
      name: 'mine_infor',
      component: require('../views/mine/infor')
    },
    {
      path: '/mine/scan_code',
      name: 'mine_scan_code',
      component: require('../views/mine/scan_code')
    },
    {
      path: '/mine/login',
      name: 'login',
      component: require('../views/mine/login')
    },
    {
      path: '/mine/login/index',
      name: 'login_index',
      component: require('../views/mine/login/index')
    },
    {
      path: '/mine/login/register',
      name: 'login_register',
      component: require('../views/mine/login/register')
    },
    {
      path: '/mine/comment',
      name: 'comment',
      component: require('../views/mine/comment')
    },
    {
      path: '/mine/set/index',
      name: 'set_index',
      component: require('../views/mine/set/index')
    },
    {
      path: '/mine/set/verification_code',
      name: 'set_verification_code',
      component: require('../views/mine/set/verification_code')
    },
    {
      path: '/mine/set/feedback',
      name: 'set_feedback',
      component: require('../views/mine/set/feedback')
    },
    {
      path: '/mine/set/about',
      name: 'set_about',
      component: require('../views/mine/set/about')
    },
    {
      path: '/mine/set/help',
      name: 'set_help',
      component: require('../views/mine/set/help')
    }
  ]
})

router.beforeEach((to, from, next) => {
  // console.log(to)
  if (to.meta.requireLogin) {
    let userInfo = localStorage.getItem('userInfo')
    // console.log(userInfo)
    if (userInfo) {
      next()
    } else {
      next({path: 'mine/login/index'})
    }
  } else {
    next()
  }
})
export default router
