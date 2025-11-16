import { createRouter, createWebHashHistory } from 'vue-router'
import Home from './Pages/Home.vue'
import Form from './Pages/Form.vue'
import Login from './Pages/Login.vue'
import Homeadmin from './Pages/Homeadmin.vue'
import Keuangan from './Pages/Keuangan.vue'
import Pengaduan from './Pages/Pengaduan.vue'
import Program from './Pages/Program.vue'
import Profile from './Pages/Profile.vue'
import Profileadmin from './Pages/Profileadmin.vue'
import Manajemenakun from './Pages/Manajemenakun.vue'

const router = createRouter({
  history: createWebHashHistory('/desapoint/'),
  routes: [
    { path: '/', name: 'Home', component: Home },
    { path: '/homeadmin', name: 'Homeadmin', component: Homeadmin, meta: { requiresAuth: true } },
    { path: '/form', name: 'Form', component: Form, meta: {requiresAuth: true} },
    { path: '/login', name: 'Login', component: Login },
    { path: '/keuangan', name: 'Keuangan', component: Keuangan },
    { path: '/pengaduan', name: 'Pengaduan', component: Pengaduan },
    { path: '/program', name: 'Program', component: Program },
    { path: '/profile', name: 'Profile', component: Profile, meta: {requiresAuth: true} },
    { path: '/profileadmin', name: 'Profileadmin', component: Profileadmin, meta: {requiresAuth: true} },
    {
      path: '/manajemen-akun',
      name: 'ManajemenAkun',
      component: () => import('./Pages/ManajemenAkun.vue')
  }
  ]
})

router.afterEach(() => {
  window.dispatchEvent(new Event('route-changed'))
})

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token')
  
  if (to.meta.requiresAuth && !token) {
    next('/login')
  } else {
    next()
  }
})


export default router