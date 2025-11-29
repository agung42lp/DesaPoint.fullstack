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
import Manajemenakun from './Pages/ManajemenAkun.vue'

const router = createRouter({
  history: createWebHashHistory('/desapoint/'),
  routes: [
    { path: '/', name: 'Home', component: Home },
    { path: '/homeadmin', name: 'Homeadmin', component: Homeadmin, meta: { requiresAuth: true }, role: 'admin' },
    { path: '/form', name: 'Form', component: Form },
    { path: '/login', name: 'Login', component: Login },
    { path: '/keuangan', name: 'Keuangan', component: Keuangan, meta: { requiresAuth: true }, role: 'admin' },
    { path: '/pengaduan', name: 'Pengaduan', component: Pengaduan, meta: { requiresAuth: true }, role: 'admin' },
    { path: '/program', name: 'Program', component: Program, meta: { requiresAuth: true }, role: 'admin' },
    { path: '/profile', name: 'Profile', component: Profile, meta: {requiresAuth: true}, role: 'admin' },
    { path: '/profileadmin', name: 'Profileadmin', component: Profileadmin, meta: {requiresAuth: true}, role: 'admin' },
    {
      path: '/manajemen-akun',
      name: 'ManajemenAkun',
      component: Manajemenakun, meta: {requiresAuth: true}
  }
  ]
})

router.afterEach(() => {
  window.dispatchEvent(new Event('route-changed'))
})

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token')
  const user = JSON.parse(localStorage.getItem('user') || '{}')

  if (to.meta.requiresAuth && !token) {
    return next('/login')
  }

  if (to.meta.role && to.meta.role !== user.role) {
    return next('/')
  }

  next()
})


export default router