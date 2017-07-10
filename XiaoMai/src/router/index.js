import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/views/home/index'

Vue.use(Router)

let router = new Router({
  routes: [
    {
      path: '/',
      component: Home
    },
    {
      path: '/singing',
      name: 'singing',
      component: require('../views/home/singing')
    },
    {
      path: '/concert',
      name: 'concert',
      component: require('../views/home/concert')
    },
    {
      path: '/drama',
      name: 'drama',
      component: require('../views/home/drama')
    },
    {
      path: '/sport',
      name: 'sport',
      component: require('../views/home/sport')
    },
    {
      path: '/parenting',
      name: 'parenting',
      component: require('../views/home/parenting')
    },
    {
      path: '/q_yuan',
      name: 'q_yuan',
      component: require('../views/home/q_yuan')
    },
    {
      path: '/dance',
      name: 'dance',
      component: require('../views/home/dance')
    },
    {
      path: '/movie',
      name: 'movie',
      component: require('../views/home/movie')
    },
    {
      path: '/m_recommend',
      name: 'm_recommend',
      component: require('../views/home/m_recommend')
    },
    {
      path: '/edt_recommend',
      name: 'edt_recommend',
      component: require('../views/home/edt_recommend')
    },
    {
      path: '/ranking',
      name: 'ranking',
      component: require('../views/home/ranking')
    },
    {
      path: '/star',
      name: 'star',
      component: require('../views/home/star')
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
      path: '/securitySure',
      name: 'securitySure',
      component: require('../views/cate/securitySure')
    },
    {
      path: '/pay',
      name: 'pay',
      component: require('../views/cate/pay')
    },
    {
      path: '/find',
      name: 'find',
      component: require('../views/find')
    },
    {
      path: '/location',
      name: 'location',
      component: require('../views/location')
    },
    {
      path: '/damaiOrder',
      name: 'damaiOrder',
      component: require('../views/mine/order/damaiOrder'),
      meta: {
        requireLogin: true
      }
    },
    {
      path: '/orderDetail',
      name: 'orderDetail',
      component: require('../views/mine/order/orderDetail')
    },
    {
      path: '/addressMan',
      name: 'addressMan',
      component: require('../views/mine/addressMan'),
      meta: {
        requireLogin: true
      }
    },
    {
      path: '/accountMan',
      name: 'accountMan',
      component: require('../views/mine/accountMan/index'),
      meta: {
        requireLogin: true
      }
    },
    {
      path: '/mine/index',
      name: 'mine',
      component: require('../views/mine/index')
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
      next({path: '/mine/login/index'})
    }
  } else {
    next()
  }
})
export default router
