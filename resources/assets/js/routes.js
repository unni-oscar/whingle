import Vue from 'vue'
import Router from 'vue-router'
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

export default new Router({
  mode: 'history', // Remove # from the url
  routes: [
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
        path: '/user',
       // redirect: '/user/dashboard',
        name: 'Dashboard',
        component: require('./components/pages/Dashboard'),
        meta: {
          requiresAuth: false
        },
        props: { bcName: "Dashboard" },
        children: [
            {
                path: '',
                name: 'ChangePassword',
                components: {
                    mainarea: require('./components/pages/ChangePassword'),
                }
            },
            {
                path: 'profile',
                name: 'Profile',
                components: {
                    mainarea: require('./components/pages/Profile'),
                }
            }
            
        ]
    },
    // {
    //   path: '/user',
    //   name: 'Dashboard',
    //   component: Dashboard,
    //   meta: {
    //     requiresAuth: true
    //   },
    //   children: [
    //     {
    //       path: 'profile',
    //       name: 'Profile',
    //       components: {
    //         mainarea: Profile
    //       }
    //     },
    //     {
    //       path: 'change-password',
    //       name: 'ChangePassword',
    //       components: {
    //         mainarea: ChangePassword
    //       }
    //     }
    //   ]
    // },
    // {
    //   path: '/contact',
    //   name: 'Contact',
    //   component: Contact
    // },
    // {
    //   path: '/about',
    //   name: 'About',
    //   component: About
    // },
    // {
    //   path: '/login',
    //   name: 'Login',
    //   component: Login
    // },
    // {
    //   path: '/register',
    //   name: 'Register',
    //   component: Register
    // },
    // {
    //   path: '/register-success',
    //   name: 'RegisterSuccess',
    //   component: RegisterSuccess
    // },
    // { path: '*', name: 'PageNotFound', component: PageNotFound }
  ]
})
