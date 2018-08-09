import Vue from 'vue'
import Router from 'vue-router'
import helper from './components/services/helper'
import store from './store.js'

Vue.use(Router)
// Setting the path for elements/pages folder
let elPath = './components/elements/'
let pgPath = './components/pages/'

let routes = [
    {
        path: '/', 
        name: 'Homepage',
        component: require(pgPath + 'Homepage'),
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/about',
        name: 'About',
        component: require(pgPath + 'About'),
        meta: {
          requiresAuth: false
        },
        props: { bcName: "About" }
    },
    {
        path: '/show/:id',
        name: 'ShowProfile',
        component: require(pgPath + 'ShowProfile'),
        meta: {
          requiresAuth: false
        }
    },
    {
        path: '/search',
        component: require(pgPath + 'Search'),
        meta: {
          requiresAuth: false
        },
        props: { bcName: "Search" },
        children: [
            {
                path: '',
                name: 'Search',
                components: {
                    mainarea: require(elPath + 'Search'),
                }
            }
        ]
    },
    {
        path: '/packages',
        name: 'Packages',
        component: require(pgPath + 'Packages'),
        meta: {
          requiresAuth: false
        },
        props: { bcName: "Packages" }
    },
    {
        path: '/user/login',
        name: 'Login',
        component: require(pgPath + 'Login'),
        meta: {
          requiresAuth: false
        }
    },
    {
        path: '/user/register',
        name: 'Register',
        component: require(pgPath + 'Register'),
        meta: {
          requiresAuth: false
        }
    },
    {
        path: '/user',
       // redirect: '/user/dashboard',
        components: {
            default: require(pgPath + 'Dashboard')
        },
        meta: {
          requiresAuth: true
        },
        props: { bcName: "Dashboard" },
        children: [
            {
                path: '',
                name: 'Dashboard',
                components: {
                    mainarea: require(elPath + 'UserIndex'),
                }
            },
            {
                path: 'profile',
                name: 'Profile',
                components: {
                    mainarea: require(pgPath + 'Profile'),
                }
            },
            {
                path: 'profile/edit',
                name: 'ProfileEdit',
                components: {
                    mainarea: require(pgPath + 'EditProfile'),
                }
            },
            {
                path: 'change-password',
                name: 'ChangePassword',
                components: {
                    mainarea: require(pgPath + 'ChangePassword'),
                }
            },
            {
                path: 'search',
                name: 'UserSearch',
                components: {
                    mainarea: require(elPath + 'Search'),
                }
            }
            
        ]
    },
    { 
        path: '*', 
        name: 'PageNotFound', 
        component: require(pgPath + 'PageNotFound') 
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
