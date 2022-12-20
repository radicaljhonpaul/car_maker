import Vue from 'vue'
import VueRouter from 'vue-router'
import LoginView from '../views/LoginView.vue'
import store from '../store';

Vue.use(VueRouter)

const routes = [
  // Authentication
  {
    path: '/',
    name: 'Login',
    component: LoginView,
    meta: { layout: false }
  },

  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  
  {
    path: '/carlist',
    name: 'CarList',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/Car/CarList.vue'),
    meta: { requiresAuth: true, layout: 'admin' }
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
});

router.beforeEach((to, from, next) => {
  console.log(from);
  console.log(to);
  console.log(store.state.user.token);

  if (to.meta.requiresAuth && !store.state.user.token) {
      console.log("undefined ni siya");
      next({ name: "Home" });
  } else {
      next(true);
  }
});

export default router
