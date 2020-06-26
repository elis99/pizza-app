import Vue from 'vue'
import Router from 'vue-router'
import Home from './components/Home/Home.vue'
import Login from './components/Login/Login.vue'
import MyOrders from './components/MyOrders/MyOrders.vue'



// Pages
// const Error404 = () => import('./views/Pages/404.vue')
// const Error500 = () => import('./views/Pages/500.vue')

Vue.use(Router)

let router = new Router({
    mode: 'history',
    // base: process.env.BASE_URL,
    routes: [{
        path: '/',
        component: Home
    },{
        path: '/login',
        component: Login
    },{
        path: '/my-orders',
        component: MyOrders
    }]
})

// router.beforeEach((to, from, next) => {
//     if (to.matched.some(record => record.meta.requiresAuth)) {
//         if (!localStorage.getItem('access_token')) {
//             next({
//                 path: '/auth/login',
//                 redirect: to.fullPath
//             });
//         }
//     }
//     next();
// });

export default router;
