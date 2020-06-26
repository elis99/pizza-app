import routes from 'vue-auto-routing'
import { createRouterLayout } from 'vue-router-layout'

import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const RouterLayout = createRouterLayout(layout => {
    return import('./layouts/' + layout + '.vue')
  })

export default new Router({
    hashbang: false,
    mode: 'history',
    routes: [
        {
        path: '/',
        component: RouterLayout,
        children: routes
        }
    ]
})

