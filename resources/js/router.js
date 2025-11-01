import { createRouter, createWebHashHistory } from 'vue-router'
import Home from './Pages/Home.vue'
import Form from './Pages/Form.vue'
import Login from './Pages/Login.vue'
import Homeadmin from './Pages/Homeadmin.vue'

const router = createRouter({
  history: createWebHashHistory('/desapoint/'),
  routes: [
    { path: '/', name: 'Home', component: Home },
    { path: '/homeadmin', name: 'Homeadmin', component: Homeadmin },
    { path: '/form', name: 'Form', component: Form },
    { path: '/pengaduan', redirect: '/form' },
    { path: '/login', name: 'Login', component: Login }
  ]
})

export default router
