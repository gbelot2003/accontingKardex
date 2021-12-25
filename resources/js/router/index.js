import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../views/Login'
import Dashboard from '../views/Dashboard'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'Login',
        component: Login,
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard,
        beforeEnter:(to, from, next) => {
            if (localStorage.getItem('isLoggedIn')){
                next()
            } else {
                next('/')
            }
        }
    },
]

const router = new VueRouter({
    base: process.env.BASE_URL,
    mode: 'history',
    routes
})

export default router
