import { createRouter, createWebHashHistory } from 'vue-router'
import Home from './Pages/Home.vue'
import Form from './Pages/Form.vue'
import Login from './Pages/Login.vue'
import Homeadmin from './Pages/Homeadmin.vue'
import Keuangan from './Pages/Keuangan.vue'
import Pengaduan from './Pages/Pengaduan.vue'
import Program from './Pages/Program.vue'

const router = createRouter({
  history: createWebHashHistory('/desapoint/'),
  routes: [
    { path: '/', name: 'Home', component: Home },
    { path: '/homeadmin', name: 'Homeadmin', component: Homeadmin, meta: { requiresAuth: true } },
    { path: '/form', name: 'Form', component: Form },
    { path: '/login', name: 'Login', component: Login },
    { path: '/keuangan', name: 'Keuangan', component: Keuangan },
    { path: '/pengaduan', name: 'Pengaduan', component: Pengaduan },
    { path: '/program', name: 'Program', component: Program },
  ]
})

router.afterEach(() => {
  window.dispatchEvent(new Event('route-changed'))
})

export default router