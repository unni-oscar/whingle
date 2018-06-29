import Vue from 'vue'
import Router from 'vue-router'
import helper from './components/services/helper'
import store from './store.js'
// import HelloWorld from '@/components/HelloWorld'
// import Dashboard from '../components/Dashboard'
// import About from '../components/About'
// import Profile from '../components/user/Profile'
// import ChangePassword from '../components/user/ChangePassword'
// import Contact from '../components/Contact'
// import Login from '../components/auth/Login'
// import Register from '../components/auth/Register'
// import RegisterSuccess from '../components/auth/RegisterSuccess'
// import HomePage from './components/pages/HomepageComponent'
// import PageNotFound from '../components/PageNotFound'

Vue.use(Router)

let routes = [
    {
        path: '/',
        name: 'Homepage',
        component: require('./components/pages/Homepage'),
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/about',
        name: 'About',
        component: require('./components/pages/About'),
        meta: {
          requiresAuth: false
        },
        props: { bcName: "About" }
    },
    {
        path: '/packages',
        name: 'Packages',
        component: require('./components/pages/Packages'),
        meta: {
          requiresAuth: false
        },
        props: { bcName: "Packages" }
    },
    {
        path: '/user/login',
        name: 'Login',
        component: require('./components/pages/Login'),
        meta: {
          requiresAuth: false
        }
    },
    {
        path: '/user/register',
        name: 'Register',
        component: require('./components/pages/Register'),
        meta: {
          requiresAuth: false
        }
    },
    {
        path: '/user',
       // redirect: '/user/dashboard',
        name: 'Dashboard',
        components: {
            default: require('./components/pages/Dashboard')
        },
        meta: {
          requiresAuth: true
        },
        props: { bcName: "Dashboard" },
        children: [
            {
                path: '',
                name: 'UserIndex',
                components: {
                    mainarea: require('./components/elements/UserIndex'),
                }
            },
            {
                path: 'profile',
                name: 'Profile',
                components: {
                    mainarea: require('./components/pages/Profile'),
                }
            },
            {
                path: 'change-password',
                name: 'ChangePassword',
                components: {
                    mainarea: require('./components/pages/ChangePassword'),
                }
            },
            {
                path: 'search',
                name: 'Search',
                components: {
                    mainarea: require('./components/elements/Search'),
                }
            }
            
        ]
    }
]
const router =  new Router({
  mode: 'history', // To remove # from the url
  routes,
  linkActiveClass: 'active'
})


/**
 *  Handling each route to check whether its requre login
 */
router.beforeEach((to, from, next) => {
    if (to.matched.some(m => m.meta.requiresAuth)){
        return helper.check().then(response => {

            if(!response){
                return next({ path : '/user/login?redirect=' + to.path})
            } 
            store.dispatch('setLogin')
            return next()
        })
    } 
    return next()
});

export default router;
