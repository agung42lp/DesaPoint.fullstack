import { createRouter, createWebHashHistory } from 'vue-router'
import Home from './Pages/Home.vue'
import Form from './Pages/Form.vue'
import Login from './Pages/Login.vue'


const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/form', name: 'Form', component: Form },
  { path: '/pengaduan', redirect: '/form' },
  { path: '/login', name: 'Login', component: Login }
]

const router = createRouter({
  history: createWebHashHistory('/desapoint/'),
  routes
})

export default router
